<?php

declare(strict_types=1);

namespace Drupal\cfc_page_index;

use Drupal\Core\Config\ConfigFactoryInterface;
use Drupal\Core\Language\LanguageManagerInterface;
use Drupal\Core\Menu\MenuLinkTreeInterface;
use Drupal\Core\Menu\MenuTreeParameters;
use Drupal\Core\Path\PathValidatorInterface;
use Drupal\Core\State\StateInterface;
use Psr\Log\LoggerInterface;

/**
 * Discovers the list of non-node pages whose text should be searchable.
 *
 * Starting from the configured seed paths and the site menus, it follows
 * same-site links until it has visited up to "max_pages" URLs. Paths that
 * resolve to a node are skipped: those are already covered by the standard
 * Search API content datasource.
 */
final class PageDiscovery {

  private const STATE_KEY = 'cfc_page_index.discovered_paths';

  /**
   * Path prefixes that are never indexed.
   */
  private const EXCLUDED_PREFIXES = [
    '/admin', '/user', '/node/add', '/comment', '/cfcadmin', '/cfc-admin',
    '/search/', '/media/', '/taxonomy/term/', '/system/', '/ajax/', '/api/',
    '/sites/', '/core/', '/themes/', '/modules/', '/libraries/', '/rest/',
    '/webform/', '/batch', '/entity_reference_autocomplete',
  ];

  /**
   * File extensions that are never indexed.
   */
  private const EXCLUDED_EXTENSIONS = [
    'pdf', 'zip', 'doc', 'docx', 'xls', 'xlsx', 'ppt', 'pptx', 'csv',
    'jpg', 'jpeg', 'png', 'gif', 'svg', 'webp', 'ico', 'mp4', 'mp3', 'json', 'xml',
  ];

  public function __construct(
    private readonly PageTextExtractor $extractor,
    private readonly ConfigFactoryInterface $configFactory,
    private readonly StateInterface $state,
    private readonly LanguageManagerInterface $languageManager,
    private readonly PathValidatorInterface $pathValidator,
    private readonly MenuLinkTreeInterface $menuTree,
    private readonly LoggerInterface $logger,
  ) {}

  /**
   * Rebuilds and stores the search-item id list. Triggers a crawl.
   *
   * Only PageIndexManager::refresh() should call this (module install, the
   * settings form, weekly cron). Everywhere else use getCachedItemIds().
   *
   * @return string[]
   *   Fully-qualified item ids, e.g. "en:/about".
   */
  public function rebuild(): array {
    $settings = $this->configFactory->get('cfc_page_index.settings');
    $seeds = array_filter(array_map('trim', (array) $settings->get('paths'))) ?: ['/'];
    $langcodes = array_filter(array_map('trim', (array) $settings->get('langcodes')))
      ?: [$this->languageManager->getDefaultLanguage()->getId()];

    if (!$settings->get('crawl')) {
      $paths = array_values(array_filter(array_map([$this, 'normalize'], $seeds)));
    }
    else {
      $paths = $this->crawl($seeds, (int) ($settings->get('max_pages') ?: 150));
    }

    // Keep only (language, path) pairs that actually render.
    $default = $this->languageManager->getDefaultLanguage()->getId();
    $ids = [];
    foreach ($paths as $path) {
      foreach ($langcodes as $langcode) {
        // The default language was already fetched during the crawl.
        if ($langcode === $default || $this->extractor->fetchPage($path, $langcode) !== NULL) {
          $ids[] = $langcode . ':' . $path;
        }
      }
    }
    sort($ids);

    $this->state->set(self::STATE_KEY, $ids);
    $this->logger->info('CFC Page Index discovered @pages pages (@ids searchable items).', [
      '@pages' => count($paths),
      '@ids' => count($ids),
    ]);

    return $ids;
  }

  /**
   * Returns the stored item id list without ever triggering a crawl.
   *
   * Kept in State (not cache) so "drush cache:rebuild" does not wipe it.
   *
   * @return string[]
   */
  public function getCachedItemIds(): array {
    return (array) $this->state->get(self::STATE_KEY, []);
  }

  /**
   * The distinct language-neutral paths currently indexed (for the admin UI).
   *
   * @return string[]
   */
  public function getCachedPaths(): array {
    $paths = [];
    foreach ($this->getCachedItemIds() as $id) {
      $parts = explode(':', $id, 2);
      $paths[$parts[1] ?? '/'] = TRUE;
    }
    return array_keys($paths);
  }

  /**
   * Breadth-first crawl.
   *
   * @return string[]
   */
  private function crawl(array $seeds, int $max_pages): array {
    $langcode = $this->languageManager->getDefaultLanguage()->getId();

    $queue = [];
    foreach (array_merge($seeds, $this->menuPaths()) as $candidate) {
      $path = $this->normalize($candidate);
      if ($path !== NULL) {
        $queue[$path] = TRUE;
      }
    }
    $queue = array_keys($queue);

    $excluded_types = array_filter(array_map(
      'trim',
      (array) $this->configFactory->get('cfc_page_index.settings')->get('excluded_node_types'),
    ));

    $visited = [];
    $indexable = [];

    while ($queue !== [] && count($visited) < $max_pages) {
      $path = array_shift($queue);
      if (isset($visited[$path])) {
        continue;
      }
      $visited[$path] = TRUE;

      $page = $this->extractor->fetchPage($path, $langcode);
      if ($page === NULL) {
        continue;
      }

      // A crawled page is searchable and links to itself. Landing-page nodes
      // are kept (their region blocks are not in the content index), but
      // article-style nodes (news, reports, events…) are left to the standard
      // content datasource so a search matches the article body, not the
      // "latest news" widgets that repeat on every page. Their links are still
      // followed.
      if (!$this->isExcludedNode($path, $excluded_types)) {
        $indexable[$path] = TRUE;
      }

      foreach ($page['links'] ?? [] as $href) {
        $next = $this->normalize($href);
        if ($next !== NULL && !isset($visited[$next]) && !in_array($next, $queue, TRUE)) {
          $queue[] = $next;
        }
      }
    }

    $paths = array_keys($indexable);
    sort($paths);
    return $paths;
  }

  /**
   * Paths taken from the site's menus.
   *
   * @return string[]
   */
  private function menuPaths(): array {
    $paths = [];
    $parameters = (new MenuTreeParameters())->onlyEnabledLinks();

    foreach (['main', 'footer', 'account'] as $menu_name) {
      foreach ($this->menuTree->load($menu_name, $parameters) as $element) {
        try {
          $url = $element->link->getUrlObject();
          if ($url->isRouted() && !in_array($url->getRouteName(), ['<nolink>', '<none>'], TRUE)) {
            $path = $this->normalize($url->toString());
            if ($path !== NULL) {
              $paths[] = $path;
            }
          }
        }
        catch (\Exception) {
          // Skip unresolvable links.
        }
      }
    }

    return $paths;
  }

  /**
   * Normalizes an href to an internal, language-neutral path, or NULL.
   */
  public function normalize(string $href): ?string {
    $href = trim($href);
    if ($href === '' || str_starts_with($href, '#') || str_starts_with($href, 'mailto:') || str_starts_with($href, 'tel:')) {
      return NULL;
    }

    // Absolute URL: keep only if it points at this site.
    if (preg_match('#^https?://#i', $href)) {
      $host = parse_url($href, PHP_URL_HOST);
      $request = \Drupal::requestStack()->getCurrentRequest();
      $local_host = $request ? $request->getHost() : NULL;
      if ($host === NULL || ($local_host !== NULL && strcasecmp($host, $local_host) !== 0)) {
        return NULL;
      }
      $href = parse_url($href, PHP_URL_PATH) ?: '/';
    }

    // Drop query string and fragment.
    $href = strtok($href, '?#');
    if ($href === FALSE || $href === '') {
      return NULL;
    }

    if (!str_starts_with($href, '/')) {
      return NULL;
    }

    $href = rawurldecode($href);

    // Strip a leading language prefix (/en, /fr, …).
    foreach (array_keys($this->languageManager->getLanguages()) as $lc) {
      if ($href === '/' . $lc || str_starts_with($href, '/' . $lc . '/')) {
        $href = substr($href, strlen($lc) + 1);
        break;
      }
    }
    if ($href === '' || $href === '/') {
      return '/';
    }
    $href = '/' . trim($href, '/');

    foreach (self::EXCLUDED_PREFIXES as $prefix) {
      if ($href === $prefix || str_starts_with($href, rtrim($prefix, '/') . '/')) {
        return NULL;
      }
    }

    $extension = strtolower(pathinfo($href, PATHINFO_EXTENSION));
    if ($extension !== '' && in_array($extension, self::EXCLUDED_EXTENSIONS, TRUE)) {
      return NULL;
    }

    return $this->isRoutable($href) ? $href : NULL;
  }

  /**
   * Whether a path is routable at all.
   */
  private function isRoutable(string $path): bool {
    if ($path === '/') {
      return TRUE;
    }
    $url = $this->pathValidator->getUrlIfValidWithoutAccessCheck($path);
    return $url && $url->isRouted();
  }

  /**
   * Whether a path is a node of a content type that the crawler must skip.
   */
  private function isExcludedNode(string $path, array $excluded_types): bool {
    if ($path === '/' || $excluded_types === []) {
      return FALSE;
    }
    $url = $this->pathValidator->getUrlIfValidWithoutAccessCheck($path);
    if (!$url || $url->getRouteName() !== 'entity.node.canonical') {
      return FALSE;
    }
    $node = \Drupal::entityTypeManager()->getStorage('node')->load($url->getRouteParameters()['node']);
    return $node && in_array($node->bundle(), $excluded_types, TRUE);
  }

}
