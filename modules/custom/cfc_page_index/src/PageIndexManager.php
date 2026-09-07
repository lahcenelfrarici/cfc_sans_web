<?php

declare(strict_types=1);

namespace Drupal\cfc_page_index;

use Drupal\search_api\Entity\Index;
use Drupal\search_api\IndexInterface;
use Drupal\search_api\Item\Field;

/**
 * Wires the "cfc_page" datasource into the shared Search API content index.
 *
 * All of this is idempotent so it is safe to run whether the index was set up
 * by hand or by this module.
 */
final class PageIndexManager {

  /**
   * The Search API index this module plugs into.
   */
  public const INDEX_ID = 'default_index';

  /**
   * Fulltext processors the page fields are added to.
   */
  private const FULLTEXT_PROCESSORS = [
    'html_filter', 'ignorecase', 'tokenizer', 'transliteration', 'stopwords',
  ];

  /**
   * Fields this module owns: id => [property path, type, label].
   */
  private const FIELDS = [
    // Fulltext (searched). Each property path is used by exactly one field so
    // Search API can retrieve the display values without them colliding.
    'page_title' => ['title', 'text', 'Page title'],
    'page_content' => ['content', 'text', 'Page text'],
    // Retrieved for display only.
    'page_label' => ['label', 'string', 'Page title (display)'],
    'page_excerpt' => ['excerpt', 'string', 'Page excerpt'],
    'page_image' => ['image', 'string', 'Page image'],
    'page_url' => ['url', 'string', 'Page URL'],
  ];

  public function __construct(
    private readonly PageDiscovery $discovery,
    private readonly PageTextExtractor $extractor,
  ) {}

  /**
   * Adds the datasource, fields and processor wiring. Idempotent.
   */
  public function install(): void {
    $index = $this->index();
    if (!$index) {
      return;
    }

    if (!in_array('cfc_page', $index->getDatasourceIds(), TRUE)) {
      $datasource = \Drupal::getContainer()
        ->get('plugin.manager.search_api.datasource')
        ->createInstance('cfc_page', ['#index' => $index]);
      $index->addDatasource($datasource);
    }

    foreach (self::FIELDS as $id => [$property_path, $type, $label]) {
      $field = $index->getField($id);
      if ($field) {
        // Correct a field that an earlier module version created differently.
        $field->setType($type);
        $field->setPropertyPath($property_path);
        $field->setLabel((string) $label);
        continue;
      }
      $field = new Field($index, $id);
      $field->setType($type);
      $field->setPropertyPath($property_path);
      $field->setDatasourceId('cfc_page');
      $field->setLabel((string) $label);
      $index->addField($field);
    }

    foreach (self::FULLTEXT_PROCESSORS as $processor_id) {
      if (!$index->isValidProcessor($processor_id)) {
        continue;
      }
      $processor = $index->getProcessor($processor_id);
      $config = $processor->getConfiguration();
      if (isset($config['fields']) && is_array($config['fields'])) {
        foreach (['page_title', 'page_content'] as $field_id) {
          if (!in_array($field_id, $config['fields'], TRUE)) {
            $config['fields'][] = $field_id;
          }
        }
        $processor->setConfiguration($config);
      }
    }

    $this->coverAllNodeBundlesInRenderedItem($index);

    $index->save();

    $this->configureSearchView();

    $this->refresh();
  }

  /**
   * Removes this module's datasource and fields. Idempotent.
   */
  public function uninstall(): void {
    $index = $this->index();
    if (!$index) {
      return;
    }

    foreach (array_keys(self::FIELDS) as $field_id) {
      if ($index->getField($field_id)) {
        $index->removeField($field_id);
      }
    }

    foreach (self::FULLTEXT_PROCESSORS as $processor_id) {
      if (!$index->isValidProcessor($processor_id)) {
        continue;
      }
      $processor = $index->getProcessor($processor_id);
      $config = $processor->getConfiguration();
      if (isset($config['fields']) && is_array($config['fields'])) {
        $config['fields'] = array_values(array_diff($config['fields'], ['page_title', 'page_content']));
        $processor->setConfiguration($config);
      }
    }

    if (in_array('cfc_page', $index->getDatasourceIds(), TRUE)) {
      $index->removeDatasource('cfc_page');
    }

    $index->save();
  }

  /**
   * Removes the "entity:block_content" datasource (blocks are covered by the
   * page crawl, which links to the page where the block is shown). Idempotent.
   */
  public function removeBlockContentDatasource(): void {
    $index = $this->index();
    if (!$index || !in_array('entity:block_content', $index->getDatasourceIds(), TRUE)) {
      return;
    }
    foreach ($index->getFields() as $id => $field) {
      if ($field->getDatasourceId() === 'entity:block_content') {
        $index->removeField($id);
      }
    }
    $index->removeDatasource('entity:block_content');
    $index->save();
    $index->reindex();
  }

  /**
   * Clears cached page text / page list and queues a full re-index of pages.
   */
  public function refresh(): void {
    // Drop the stored page copies; the crawl below re-fills them.
    $this->extractor->clearAll();

    // Crawl the site again (this is the only place a crawl is triggered).
    // rebuild() returns raw ids ("en:/path"); Search API works with the
    // datasource-prefixed form ("cfc_page/en:/path").
    $new = array_map(
      static fn (string $id): string => 'cfc_page/' . $id,
      $this->discovery->rebuild(),
    );

    $index = $this->index();
    if (!$index || !in_array('cfc_page', $index->getDatasourceIds(), TRUE)) {
      return;
    }

    // Reconcile the tracker with the fresh id list. rebuildTracker() is
    // unreliable for a non-entity datasource whose items carry a language, so
    // the diff is applied by hand.
    $db = \Drupal::database();
    $known = $db->select('search_api_item', 't')
      ->fields('t', ['item_id'])
      ->condition('index_id', self::INDEX_ID)
      ->condition('datasource', 'cfc_page')
      ->execute()
      ->fetchCol();

    // Also catch rows left in the backend with no tracker entry (id format
    // changes across module versions).
    if ($db->schema()->tableExists('search_api_db_' . self::INDEX_ID)) {
      $orphans = $db->select('search_api_db_' . self::INDEX_ID, 'b')
        ->fields('b', ['item_id'])
        ->condition('item_id', 'cfc_page/%', 'LIKE')
        ->execute()
        ->fetchCol();
      $stale = array_values(array_diff($orphans, $new, $known));
      if ($stale) {
        $index->getServerInstance()->deleteItems($index, $stale);
      }
    }

    $removed = array_values(array_diff($known, $new));
    $added = array_values(array_diff($new, $known));
    $kept = array_values(array_intersect($known, $new));

    $tracker = $index->getTrackerInstance();
    if ($removed) {
      // Drop stale rows from the search backend immediately, then untrack.
      $index->getServerInstance()->deleteItems($index, $removed);
      $tracker->trackItemsDeleted($removed);
    }
    if ($added) {
      $tracker->trackItemsInserted($added);
    }
    if ($kept) {
      $tracker->trackItemsUpdated($kept);
    }
  }

  /**
   * Applies this module's two changes to the "Search content" view:
   *  - phrase parse mode, so a multi-word search matches the exact phrase only;
   *  - a "current interface language" filter, so an English search never
   *    returns French hits and vice versa.
   * Idempotent.
   */
  private function configureSearchView(): void {
    $view = \Drupal::configFactory()->getEditable('views.view.search_content');
    if (!$view || $view->isNew()) {
      return;
    }

    foreach (['default', 'page_1', 'block_1'] as $display) {
      $key = "display.$display.display_options.filters.search_api_fulltext.parse_mode";
      if ($view->get($key) !== NULL) {
        $view->set($key, 'phrase');
      }
    }

    $filter_key = 'display.default.display_options.filters.search_api_language';
    if ($view->get('display.default.display_options.filters') !== NULL
      && $view->get($filter_key) === NULL) {
      $view->set($filter_key, [
        'id' => 'search_api_language',
        'table' => 'search_api_index_default_index',
        'field' => 'search_api_language',
        'relationship' => 'none',
        'group_type' => 'group',
        'admin_label' => '',
        'plugin_id' => 'search_api_language',
        'operator' => 'in',
        'value' => ['***LANGUAGE_language_interface***' => '***LANGUAGE_language_interface***'],
        'group' => 1,
        'exposed' => FALSE,
        'expose' => [
          'operator_id' => '',
          'label' => '',
          'description' => '',
          'use_operator' => FALSE,
          'operator' => 'search_api_language_op',
          'operator_limit_selection' => FALSE,
          'operator_list' => [],
          'identifier' => 'search_api_language',
          'required' => FALSE,
          'remember' => FALSE,
          'multiple' => FALSE,
          'remember_roles' => ['authenticated' => 'authenticated'],
          'reduce' => FALSE,
        ],
        'is_grouped' => FALSE,
        'group_info' => [
          'label' => '',
          'description' => '',
          'identifier' => '',
          'optional' => TRUE,
          'widget' => 'select',
          'multiple' => FALSE,
          'remember' => FALSE,
          'default_group' => 'All',
          'default_group_multiple' => [],
          'group_items' => [],
        ],
      ]);
    }

    $view->save();
  }

  /**
   * Makes the "rendered_item" field cover every node bundle, not just the two
   * (article, page) the Database Search Defaults module ships. Without this a
   * search never matches text that a content type shows only through its
   * rendered output (paragraphs, layout fields, referenced content).
   */
  private function coverAllNodeBundlesInRenderedItem(IndexInterface $index): void {
    $field = $index->getField('rendered_item');
    if (!$field) {
      return;
    }
    $bundles = array_keys(\Drupal::service('entity_type.bundle.info')->getBundleInfo('node'));
    if (!$bundles) {
      return;
    }
    $config = $field->getConfiguration();
    $config['view_mode']['entity:node'] ??= [];
    $changed = FALSE;
    foreach ($bundles as $bundle) {
      if (($config['view_mode']['entity:node'][$bundle] ?? NULL) !== 'search_index') {
        $config['view_mode']['entity:node'][$bundle] = 'search_index';
        $changed = TRUE;
      }
    }
    if ($changed) {
      $field->setConfiguration($config);
    }
  }

  /**
   * The path list currently cached for the crawler (no crawl is triggered).
   *
   * @return string[]
   */
  public function discoveredPaths(): array {
    return $this->discovery->getCachedPaths();
  }

  /**
   * Loads the target index.
   */
  private function index(): ?IndexInterface {
    return Index::load(self::INDEX_ID);
  }

}
