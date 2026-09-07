<?php

declare(strict_types=1);

namespace Drupal\cfc_page_index\Form;

use Drupal\cfc_page_index\PageIndexManager;
use Drupal\Core\Form\ConfigFormBase;
use Drupal\Core\Form\FormStateInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;

/**
 * Configures which pages have their visible text indexed for search.
 */
final class SettingsForm extends ConfigFormBase {

  public function __construct(
    $config_factory,
    private readonly PageIndexManager $manager,
  ) {
    parent::__construct($config_factory);
  }

  /**
   * {@inheritdoc}
   */
  public static function create(ContainerInterface $container): static {
    return new static(
      $container->get('config.factory'),
      $container->get('cfc_page_index.manager'),
    );
  }

  /**
   * {@inheritdoc}
   */
  protected function getEditableConfigNames(): array {
    return ['cfc_page_index.settings'];
  }

  /**
   * {@inheritdoc}
   */
  public function getFormId(): string {
    return 'cfc_page_index_settings';
  }

  /**
   * {@inheritdoc}
   */
  public function buildForm(array $form, FormStateInterface $form_state): array {
    $config = $this->config('cfc_page_index.settings');

    $form['base_url'] = [
      '#type' => 'url',
      '#title' => $this->t('Site base URL'),
      '#description' => $this->t('Absolute URL the crawler fetches pages from, e.g. <code>https://www.example.com</code>. Required — cron and Drush have no request host of their own.'),
      '#default_value' => (string) $config->get('base_url'),
      '#placeholder' => \Drupal::request()->getSchemeAndHttpHost(),
    ];

    $form['crawl'] = [
      '#type' => 'checkbox',
      '#title' => $this->t('Crawl the site'),
      '#description' => $this->t('Follow same-site links from the seed pages and the site menus. Turn this off to index only the exact paths listed below.'),
      '#default_value' => (bool) $config->get('crawl'),
    ];

    $form['max_pages'] = [
      '#type' => 'number',
      '#title' => $this->t('Maximum pages to crawl'),
      '#min' => 1,
      '#max' => 2000,
      '#default_value' => (int) ($config->get('max_pages') ?: 150),
      '#states' => ['visible' => [':input[name="crawl"]' => ['checked' => TRUE]]],
    ];

    $form['excluded_node_types'] = [
      '#type' => 'textfield',
      '#title' => $this->t('Content types to skip'),
      '#description' => $this->t('Comma-separated machine names. Nodes of these types are not indexed by the crawler (their body is already searchable, and crawling them pulls in the "latest news" widgets). Their links are still followed.'),
      '#default_value' => implode(', ', (array) $config->get('excluded_node_types')),
    ];

    $form['paths'] = [
      '#type' => 'textarea',
      '#title' => $this->t('Seed / explicit page paths'),
      '#description' => $this->t('One internal path per line, starting with "/". These are the crawl starting points (or, with crawling off, the only pages indexed). Node pages are skipped — they are already searchable. Example: <code>/</code>'),
      '#default_value' => implode("\n", (array) $config->get('paths')),
      '#rows' => 6,
    ];

    $form['langcodes'] = [
      '#type' => 'textfield',
      '#title' => $this->t('Languages'),
      '#description' => $this->t('Comma-separated language codes to index each page in.'),
      '#default_value' => implode(', ', (array) $config->get('langcodes')),
    ];

    $form['hidden_classes'] = [
      '#type' => 'textarea',
      '#title' => $this->t('Hidden CSS classes'),
      '#description' => $this->t('One class name per line. Text inside an element carrying one of these classes is not indexed (in addition to inline <code>display:none</code> / <code>visibility:hidden</code>, the <code>hidden</code> attribute and <code>aria-hidden="true"</code>).'),
      '#default_value' => implode("\n", (array) $config->get('hidden_classes')),
      '#rows' => 4,
    ];

    $known = $this->manager->discoveredPaths();
    $form['discovered'] = [
      '#type' => 'details',
      '#title' => $this->t('Currently indexed pages (@count)', ['@count' => count($known)]),
      '#open' => FALSE,
      'list' => [
        '#theme' => 'item_list',
        '#items' => $known ?: [$this->t('None yet — save this form, then run cron or "drush search-api:index".')],
      ],
    ];

    return parent::buildForm($form, $form_state);
  }

  /**
   * {@inheritdoc}
   */
  public function submitForm(array &$form, FormStateInterface $form_state): void {
    $paths = $this->splitLines($form_state->getValue('paths'));
    $paths = array_values(array_unique(array_map(
      static fn (string $p): string => '/' . ltrim($p, '/'),
      $paths,
    ))) ?: ['/'];

    $langcodes = array_values(array_filter(array_map(
      'trim',
      explode(',', (string) $form_state->getValue('langcodes')),
    ))) ?: ['en'];

    $this->config('cfc_page_index.settings')
      ->set('base_url', rtrim(trim((string) $form_state->getValue('base_url')), '/'))
      ->set('excluded_node_types', array_values(array_filter(array_map(
        'trim',
        explode(',', (string) $form_state->getValue('excluded_node_types')),
      ))))
      ->set('crawl', (bool) $form_state->getValue('crawl'))
      ->set('max_pages', (int) $form_state->getValue('max_pages') ?: 150)
      ->set('paths', $paths)
      ->set('langcodes', $langcodes)
      ->set('hidden_classes', $this->splitLines($form_state->getValue('hidden_classes')))
      ->save();

    $this->manager->refresh();
    $this->messenger()->addStatus($this->t('Settings saved. The page list will be rebuilt and re-indexed on the next cron run, or immediately with <code>drush search-api:index</code>.'));

    parent::submitForm($form, $form_state);
  }

  /**
   * Splits a textarea value into a clean list of non-empty trimmed lines.
   */
  private function splitLines(mixed $value): array {
    $lines = preg_split('/\R/', (string) $value) ?: [];
    return array_values(array_filter(array_map('trim', $lines), static fn (string $l): bool => $l !== ''));
  }

}
