<?php

declare(strict_types=1);

namespace Drupal\cfc_page_index;

use Drupal\Core\Config\ConfigFactoryInterface;
use Drupal\Core\KeyValueStore\KeyValueFactoryInterface;
use Drupal\Core\KeyValueStore\KeyValueStoreInterface;
use Drupal\Core\Language\LanguageInterface;
use Drupal\Core\Language\LanguageManagerInterface;
use Drupal\Core\Url;
use GuzzleHttp\ClientInterface;
use Masterminds\HTML5;
use Psr\Log\LoggerInterface;
use Symfony\Component\HttpFoundation\RequestStack;

/**
 * Renders a site page and extracts its visible text.
 *
 * The extracted title / text / image is kept in the key-value store (not a
 * cache bin) so that "drush cache:rebuild" does not wipe it — the search
 * results list reads this copy at display time and must never re-render a page.
 */
final class PageTextExtractor {

  /**
   * Legacy cache tag (kept so existing invalidations are harmless).
   */
  public const CACHE_TAG = 'cfc_page_index';

  private readonly KeyValueStoreInterface $store;

  public function __construct(
    private readonly ClientInterface $httpClient,
    private readonly LanguageManagerInterface $languageManager,
    KeyValueFactoryInterface $key_value,
    private readonly ConfigFactoryInterface $configFactory,
    private readonly LoggerInterface $logger,
    private readonly RequestStack $requestStack,
  ) {
    $this->store = $key_value->get('cfc_page_index.pages');
  }

  /**
   * Removes every stored page copy (called on a full re-crawl).
   */
  public function clearAll(): void {
    $this->store->deleteAll();
  }

  /**
   * Returns the visible text of a page.
   *
   * @param string $path
   *   Internal, language-neutral path starting with "/" (e.g. "/" or "/about").
   * @param string $langcode
   *   Language to render the page in.
   *
   * @return array|null
   *   ['title' => string, 'text' => string, 'url' => string] or NULL when the
   *   page could not be rendered.
   */
  public function extract(string $path, string $langcode, bool $allow_render = TRUE): ?array {
    $key = $langcode . ':' . $path;
    $stored = $this->store->get($key);
    if ($stored !== NULL) {
      return $stored ?: NULL;
    }

    // Rendering a full page means running an HTTP sub-request. That is fine
    // during indexing (cron / drush) but must never happen while another page
    // is already being rendered, so at display time we return a lightweight
    // stub (the caller falls back to the values Search API already stored).
    if (!$allow_render) {
      return [
        'title' => '',
        'text' => '',
        'headings' => '',
        'image' => '',
        'url' => $this->pathToUrl($path, $langcode) ?? $path,
      ];
    }

    $page = $this->doExtract($path, $langcode);
    $result = $page === NULL ? NULL : [
      'title' => $page['title'],
      'text' => $page['text'],
      'headings' => $page['headings'] ?? '',
      'image' => $page['image'] ?? '',
      'url' => $page['url'],
    ];

    $this->store->set($key, $result ?? []);

    return $result;
  }

  /**
   * Renders a page and returns title, text, url and outbound link paths.
   *
   * Used by the crawler; always performs the HTTP sub-request and stores the
   * result so the following index run does not render the page again.
   *
   * @return array|null
   *   ['title', 'text', 'headings', 'image', 'url', 'links' => string[]] or NULL.
   */
  public function fetchPage(string $path, string $langcode): ?array {
    $page = $this->doExtract($path, $langcode);

    $this->store->set($langcode . ':' . $path, $page === NULL ? [] : [
      'title' => $page['title'],
      'text' => $page['text'],
      'headings' => $page['headings'] ?? '',
      'image' => $page['image'] ?? '',
      'url' => $page['url'],
    ]);

    return $page;
  }

  /**
   * Fetches a page over real HTTP and parses it.
   *
   * A genuine request (not an in-process sub-request) is used so each page is
   * rendered in full isolation — an in-process sub-request leaks the previous
   * page's render context and returns the same body for every path.
   */
  private function doExtract(string $path, string $langcode): ?array {
    $localised = $this->pathToUrl($path, $langcode);
    if ($localised === NULL) {
      return NULL;
    }

    $base = rtrim($this->baseUrl(), '/');
    if ($base === '' || str_contains($base, '://default')) {
      $this->logger->error('CFC Page Index: no base URL configured. Set one at /admin/config/search/cfc-page-index.');
      return NULL;
    }
    $absolute = $base . $localised;
    $host = parse_url($base, PHP_URL_HOST);

    try {
      $response = $this->httpClient->request('GET', $absolute, [
        'timeout' => 90,
        'connect_timeout' => 15,
        'http_errors' => FALSE,
        'allow_redirects' => TRUE,
        'headers' => array_filter([
          'Host' => filter_var($host, FILTER_VALIDATE_IP) ? $this->configuredHost() : NULL,
          'User-Agent' => 'CFC Page Index crawler',
        ]),
      ]);
    }
    catch (\Throwable $e) {
      $this->logger->warning('Fetching @url failed: @msg', ['@url' => $absolute, '@msg' => $e->getMessage()]);
      return NULL;
    }

    if ($response->getStatusCode() !== 200) {
      $this->logger->warning('Fetching @url returned HTTP @code.', [
        '@url' => $absolute,
        '@code' => $response->getStatusCode(),
      ]);
      return NULL;
    }

    $html = (string) $response->getBody();
    if ($html === '') {
      return NULL;
    }
    $url = $localised;

    [$title, $text, $links, $image, $headings] = $this->htmlToText($html, $path === '/');
    if ($text === '') {
      return NULL;
    }

    return [
      'title' => $title !== '' ? $title : $path,
      'text' => $text,
      'headings' => $headings,
      'image' => $image,
      'url' => $url,
      'links' => $links,
    ];
  }

  /**
   * The site base URL to crawl (settings override, else the current request).
   */
  private function baseUrl(): string {
    $configured = trim((string) $this->configFactory->get('cfc_page_index.settings')->get('base_url'));
    if ($configured !== '') {
      return $configured;
    }
    $request = $this->requestStack->getCurrentRequest();
    return $request ? $request->getSchemeAndHttpHost() : '';
  }

  /**
   * Host header to send when the base URL is an IP address.
   */
  private function configuredHost(): ?string {
    $request = $this->requestStack->getCurrentRequest();
    return $request ? $request->getHost() : NULL;
  }

  /**
   * Builds the localized, root-relative URL for an internal path.
   *
   * Returns NULL when the page has no version in the requested language (the
   * generated URL then lacks the expected language prefix).
   */
  private function pathToUrl(string $path, string $langcode): ?string {
    $language = $this->languageManager->getLanguage($langcode);
    if (!$language) {
      return NULL;
    }
    try {
      $url = $path === '/'
        ? Url::fromRoute('<front>', [], ['language' => $language])->toString()
        : Url::fromUserInput($path, ['language' => $language])->toString();
    }
    catch (\Exception $e) {
      $this->logger->warning('Cannot build URL for path @path: @msg', [
        '@path' => $path,
        '@msg' => $e->getMessage(),
      ]);
      return NULL;
    }

    // When every language is URL-prefixed, a URL without the "/{langcode}"
    // prefix means this content has no translation in that language.
    $prefixes = $this->configFactory->get('language.negotiation')->get('url.prefixes') ?? [];
    $prefix = $prefixes[$langcode] ?? NULL;
    if ($prefix && !str_starts_with(ltrim($url, '/') . '/', $prefix . '/')) {
      return NULL;
    }

    return $url;
  }

  /**
   * Turns a full HTML document into [title, visible plain text, link paths].
   *
   * @param bool $is_front
   *   TRUE for the front page, where the hero slider is real content and is
   *   kept; on every other page it is stripped as a rendering artifact.
   */
  private function htmlToText(string $html, bool $is_front = FALSE): array {
    $hidden_classes = (array) $this->configFactory
      ->get('cfc_page_index.settings')
      ->get('hidden_classes');

    $document = (new HTML5(['disable_html_ns' => TRUE]))->loadHTML($html);
    $xpath = new \DOMXPath($document);

    // Page title: <title> (minus the trailing " | Site name"), then <h1>.
    $title = '';
    foreach ($xpath->query('//title') as $node) {
      $title = trim($node->textContent);
      break;
    }
    if ($title === '') {
      foreach ($xpath->query('//h1') as $node) {
        $title = trim($node->textContent);
        break;
      }
    }
    $title = preg_replace('/\s*[|\x{2013}\x{2014}-]\s*[^|\x{2013}\x{2014}-]{1,40}$/u', '', $title) ?: $title;

    // Collect same-origin link hrefs before anything is stripped.
    $links = [];
    foreach ($xpath->query('//a[@href]') as $node) {
      if ($node instanceof \DOMElement) {
        $links[] = $node->getAttribute('href');
      }
    }

    // Preview image: first real content image inside <main>/<article>, skipping
    // header, footer, modal and popup areas and decorative assets.
    $image = '';
    $img_query = '//main//img[@src] | //article//img[@src]';
    foreach ($xpath->query($img_query) as $node) {
      if (!$node instanceof \DOMElement) {
        continue;
      }
      $src = $node->getAttribute('src');
      if ($src === '' || str_contains($src, 'data:')
        || preg_match('#(logo|icon|placeholder|loading|sprite|popup|modal|avatar)#i', $src)) {
        continue;
      }
      // Reject if any ancestor looks like chrome / an overlay.
      $skip = FALSE;
      for ($p = $node->parentNode; $p instanceof \DOMElement; $p = $p->parentNode) {
        $cls = strtolower($p->getAttribute('class') . ' ' . $p->getAttribute('id'));
        if (preg_match('#(modal|popup|overlay|header|footer|menu|nav|cookie|slider|banner)#', $cls)) {
          $skip = TRUE;
          break;
        }
      }
      if (!$skip) {
        $image = $src;
        break;
      }
    }

    // Drop everything that never produces visible text.
    $this->removeNodes($xpath->query('//script | //style | //head | //noscript | //template | //svg | //iframe'));

    // Drop the elements that repeat on every page (site header, footer,
    // breadcrumb, and the pop-up dialogs that are hidden until opened), so a
    // search matches a page's own content, not the chrome.
    $this->removeNodes($xpath->query(
      '//*[@id="header"] | //*[@id="footer"]'
      . ' | //*[starts-with(@id, "block-cfc-main-menu")]'
      . ' | //*[starts-with(@id, "block-cfc-quicklinks")]'
      . ' | //*[starts-with(@id, "block-cfc-header")]'
      . ' | //*[starts-with(@id, "block-cfc-footer")]'
      . ' | //nav[@aria-label="breadcrumb"] | //*[contains(@class, "breadcrumb")]'
      . ' | //*[@role="dialog"] | //dialog'
      . ' | //*[contains(@class, "showing_modal_pop_up")]'
      . ' | //*[contains(@class, "modal__")]'
      . ' | //*[contains(@class, " modal ")]'
      . ' | //*[contains(@class, "modal-")]'
      . ' | //*[contains(@class, "pop_up")]'
      . ' | //*[contains(@id, "modal")]'
      . ' | //*[contains(@class, "cookie")]'
    ));

    // On a non-front page also drop the hero banner and the carousels that
    // repeat the "latest news" / testimonials on many pages — a search there
    // should match the page's own copy, not a teaser list. The front page
    // keeps its hero slider and section carousels as genuine content.
    if (!$is_front) {
      $this->removeNodes($xpath->query(
        '//*[@id="banner-title"]'
        . ' | //*[@id="articles"]'
        . ' | //*[contains(@class, "owl-carousel")]'
        . ' | //*[contains(@class, "card---filter")]'
        . ' | //*[contains(@class, "three_block_news")]'
        . ' | //*[contains(@class, "list--news")]'
        . ' | //*[contains(@class, "hear_it_from_our_community")]'
      ));
    }

    // Drop hidden elements.
    $this->removeNodes($xpath->query('//*[@hidden] | //*[@aria-hidden="true"]'));
    $this->removeNodes($xpath->query('//*[contains(translate(@style, " ", ""), "display:none")]'));
    $this->removeNodes($xpath->query('//*[contains(translate(@style, " ", ""), "visibility:hidden")]'));
    foreach ($hidden_classes as $class) {
      $class = trim($class);
      if ($class === '') {
        continue;
      }
      $needle = ' ' . $class . ' ';
      $this->removeNodes($xpath->query('//*[contains(concat(" ", normalize-space(@class), " "), ' . $this->xpathLiteral($needle) . ')]'));
    }

    // Headings (after chrome removal) — weighted by repeating them at the front.
    $headings = [];
    $context = $xpath->query('//main')->item(0) ?? $xpath->query('//body')->item(0);
    if ($context !== NULL) {
      foreach ($xpath->query('.//h1 | .//h2 | .//h3', $context) as $node) {
        $h = trim($node->textContent);
        if ($h !== '') {
          $headings[] = $h;
        }
      }
    }

    $raw = $context !== NULL ? $context->textContent : $document->textContent;
    $text = trim(preg_replace('/\s+/u', ' ', (string) $raw) ?? '');
    $heading_text = trim(preg_replace('/\s+/u', ' ', implode('. ', array_slice($headings, 0, 20))) ?? '');

    // Make the image URL root-relative when it points at this site.
    if ($image !== '' && preg_match('#^https?://#i', $image)) {
      $request = \Drupal::requestStack()->getCurrentRequest();
      if ($request && str_starts_with($image, $request->getSchemeAndHttpHost())) {
        $image = substr($image, strlen($request->getSchemeAndHttpHost()));
      }
    }

    return [$title, $text, $links, $image, $heading_text];
  }

  /**
   * Removes every node in a DOMNodeList from its document.
   */
  private function removeNodes(\DOMNodeList $nodes): void {
    // Iterate over a static copy: removing mutates the live list.
    $list = [];
    foreach ($nodes as $node) {
      $list[] = $node;
    }
    foreach ($list as $node) {
      $node->parentNode?->removeChild($node);
    }
  }

  /**
   * Quotes a string for safe use as an XPath string literal.
   */
  private function xpathLiteral(string $value): string {
    if (!str_contains($value, "'")) {
      return "'" . $value . "'";
    }
    if (!str_contains($value, '"')) {
      return '"' . $value . '"';
    }
    $parts = explode("'", $value);
    return "concat('" . implode("', \"'\", '", $parts) . "')";
  }

}
