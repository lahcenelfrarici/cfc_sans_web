<?php

declare(strict_types=1);

namespace Drupal\cfc_page_index\Plugin\search_api\datasource;

use Drupal\cfc_page_index\PageTextExtractor;
use Drupal\Core\Config\ConfigFactoryInterface;
use Drupal\Core\Language\LanguageInterface;
use Drupal\Core\Plugin\ContainerFactoryPluginInterface;
use Drupal\Core\StringTranslation\TranslatableMarkup;
use Drupal\Core\TypedData\ComplexDataInterface;
use Drupal\Core\TypedData\DataDefinition;
use Drupal\Core\TypedData\MapDataDefinition;
use Drupal\Core\TypedData\TypedDataManagerInterface;
use Drupal\Core\Url;
use Drupal\search_api\Attribute\SearchApiDatasource;
use Drupal\search_api\Datasource\DatasourcePluginBase;
use Symfony\Component\DependencyInjection\ContainerInterface;

/**
 * Represents configured site pages as Search API items.
 *
 * Each item is one (path, language) pair. Its indexable text is the visible
 * text of the fully rendered page, so headings and copy that only live in Twig
 * templates become searchable.
 *
 * The annotation below is kept alongside the PHP attribute so the plugin is
 * still discovered on older Search API releases whose datasource manager only
 * scans annotations (e.g. 8.x-1.35); newer releases use the attribute.
 *
 * @SearchApiDatasource(
 *   id = "cfc_page",
 *   label = @Translation("Site pages (CFC)"),
 *   description = @Translation("Visible text of configured pages, including text that only exists in templates."),
 * )
 */
#[SearchApiDatasource(
  id: 'cfc_page',
  label: new TranslatableMarkup('Site pages (CFC)'),
  description: new TranslatableMarkup('Visible text of configured pages, including text that only exists in templates.'),
)]
final class PageDatasource extends DatasourcePluginBase implements ContainerFactoryPluginInterface {

  private ConfigFactoryInterface $configFactory;
  private PageTextExtractor $extractor;
  private TypedDataManagerInterface $typedDataManager;
  private \Drupal\cfc_page_index\PageDiscovery $discovery;

  /**
   * {@inheritdoc}
   */
  public static function create(ContainerInterface $container, array $configuration, $plugin_id, $plugin_definition) {
    $instance = new static($configuration, $plugin_id, $plugin_definition);
    $instance->configFactory = $container->get('config.factory');
    $instance->extractor = $container->get('cfc_page_index.extractor');
    $instance->typedDataManager = $container->get('typed_data_manager');
    $instance->discovery = $container->get('cfc_page_index.discovery');
    return $instance;
  }

  /**
   * {@inheritdoc}
   */
  public function getPropertyDefinitions() {
    return [
      'title' => DataDefinition::create('string')->setLabel(new TranslatableMarkup('Title (searched)')),
      'label' => DataDefinition::create('string')->setLabel(new TranslatableMarkup('Title (display)')),
      'content' => DataDefinition::create('string')->setLabel(new TranslatableMarkup('Visible text')),
      'excerpt' => DataDefinition::create('string')->setLabel(new TranslatableMarkup('Excerpt')),
      'image' => DataDefinition::create('string')->setLabel(new TranslatableMarkup('Image URL')),
      'url' => DataDefinition::create('string')->setLabel(new TranslatableMarkup('URL')),
      'path' => DataDefinition::create('string')->setLabel(new TranslatableMarkup('Source path')),
      'langcode' => DataDefinition::create('string')->setLabel(new TranslatableMarkup('Language')),
    ];
  }

  /**
   * {@inheritdoc}
   */
  public function getItemIds($page = NULL) {
    // Few pages: return everything on the first page, nothing afterwards.
    if ($page !== NULL && $page > 0) {
      return NULL;
    }

    // The item id list ("en:/path") comes straight from the last crawl. Never
    // crawl from here: getItemIds() is called on many requests. The crawl runs
    // from PageIndexManager::refresh() (install, settings form, weekly cron).
    $ids = $this->discovery->getCachedItemIds();

    if (!$ids) {
      // Nothing crawled yet: fall back to the configured seed paths.
      $settings = $this->configFactory->get('cfc_page_index.settings');
      $langcodes = array_filter(array_map('trim', (array) $settings->get('langcodes')))
        ?: [LanguageInterface::LANGCODE_NOT_SPECIFIED];
      foreach ((array) $settings->get('paths') ?: ['/'] as $path) {
        $path = $this->discovery->normalize($path);
        if ($path === NULL) {
          continue;
        }
        foreach ($langcodes as $langcode) {
          $ids[] = $this->buildId($path, $langcode);
        }
      }
    }

    return $ids ?: NULL;
  }

  /**
   * {@inheritdoc}
   */
  public function loadMultiple(array $ids) {
    $definition = MapDataDefinition::create()
      ->setPropertyDefinition('title', DataDefinition::create('string'))
      ->setPropertyDefinition('label', DataDefinition::create('string'))
      ->setPropertyDefinition('content', DataDefinition::create('string'))
      ->setPropertyDefinition('excerpt', DataDefinition::create('string'))
      ->setPropertyDefinition('image', DataDefinition::create('string'))
      ->setPropertyDefinition('url', DataDefinition::create('string'))
      ->setPropertyDefinition('path', DataDefinition::create('string'))
      ->setPropertyDefinition('langcode', DataDefinition::create('string'));

    // Only render pages when we are not already inside a render (i.e. during
    // indexing, not while displaying search results).
    $allow_render = !\Drupal::service('renderer')->hasRenderContext();

    $items = [];
    foreach ($ids as $id) {
      [$langcode, $path] = $this->parseId($id);
      $data = $this->extractor->extract($path, $langcode, $allow_render);
      if (!$data) {
        continue;
      }
      $body = trim((string) $data['text']);
      $headings = trim((string) ($data['headings'] ?? ''));
      $items[$id] = $this->typedDataManager->create($definition, [
        'title' => $data['title'],
        'label' => $data['title'],
        // Headings repeated up front so a heading match ranks the page higher.
        'content' => $headings !== '' ? $headings . '. ' . $headings . '. ' . $body : $body,
        'excerpt' => mb_substr($body, 0, 300),
        'image' => $data['image'] ?? '',
        'url' => $data['url'],
        'path' => $path,
        'langcode' => $langcode,
      ]);
    }
    return $items;
  }

  /**
   * {@inheritdoc}
   */
  public function getItemId(ComplexDataInterface $item) {
    $path = $this->propertyValue($item, 'path');
    $langcode = $this->propertyValue($item, 'langcode') ?: LanguageInterface::LANGCODE_NOT_SPECIFIED;
    return $path === NULL ? NULL : $this->buildId($path, $langcode);
  }

  /**
   * {@inheritdoc}
   */
  public function getItemLabel(ComplexDataInterface $item) {
    return $this->propertyValue($item, 'title');
  }

  /**
   * {@inheritdoc}
   */
  public function getItemUrl(ComplexDataInterface $item) {
    $url = $this->propertyValue($item, 'url');
    if (!$url) {
      return NULL;
    }
    try {
      return Url::fromUserInput(parse_url($url, PHP_URL_PATH) ?: '/');
    }
    catch (\Exception) {
      return NULL;
    }
  }

  /**
   * {@inheritdoc}
   */
  public function getItemLanguage(ComplexDataInterface $item) {
    return $this->propertyValue($item, 'langcode') ?: LanguageInterface::LANGCODE_NOT_SPECIFIED;
  }

  /**
   * {@inheritdoc}
   */
  public function getViewModes($bundle = NULL) {
    // A non-empty list keeps the Search API Views row plugin from discarding
    // our rows; the actual markup is produced in the theme preprocess.
    return ['default' => (string) new TranslatableMarkup('Default')];
  }

  /**
   * {@inheritdoc}
   */
  public function viewItem(ComplexDataInterface $item, $view_mode, $langcode = NULL) {
    // Non-empty so Views does not treat the result set as empty; the real card
    // is built in cfc_preprocess_views_view_unformatted().
    return ['#markup' => ' '];
  }

  /**
   * {@inheritdoc}
   */
  public function viewMultipleItems(array $items, $view_mode, $langcode = NULL) {
    return array_map(static fn () => ['#markup' => ' '], $items);
  }

  /**
   * {@inheritdoc}
   */
  public function calculateDependencies() {
    return ['config' => ['cfc_page_index.settings']];
  }

  /**
   * Builds a stable item id from a path and language.
   */
  private function buildId(string $path, string $langcode): string {
    return $langcode . ':' . $path;
  }

  /**
   * Splits an item id back into [langcode, path].
   */
  private function parseId(string $id): array {
    $parts = explode(':', $id, 2);
    return [$parts[0], $parts[1] ?? '/'];
  }

  /**
   * Reads a scalar sub-property from a ComplexData item.
   */
  private function propertyValue(ComplexDataInterface $item, string $name): ?string {
    try {
      $value = $item->get($name)->getValue();
      return is_scalar($value) ? (string) $value : NULL;
    }
    catch (\Exception) {
      return NULL;
    }
  }

}
