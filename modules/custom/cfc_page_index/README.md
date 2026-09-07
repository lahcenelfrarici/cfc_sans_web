# CFC Page Index

Makes the **visible text of every page** searchable through the existing
"Search content" view — including headings and copy that only live in Twig
templates or in blocks placed in page regions (which the standard Search API
content index cannot see).

## How it works

* A Search API datasource, **"Site pages (CFC)"** (`cfc_page`), is added to the
  `default_index` index.
* On install / weekly cron / when the settings form is saved, the module
  **crawls the site**: starting from the front page and the site menus it
  follows same-site links up to `max_pages`, fetching each page over **real
  HTTP** (`base_url` + path) so every page renders in full isolation.
* For every page it stores the visible text (with the site header, footer,
  breadcrumb, hidden pop-up dialogs, `<script>`/`<style>`, `display:none`,
  `[hidden]`, `aria-hidden` and configured "hidden" classes removed), the
  title, a preview image and the URL, in the `cfc_page_index.pages` key-value
  store (survives `drush cache:rebuild`).
* The **"Search content" view fulltext filter is switched to `phrase` parse
  mode**, so a search for `Join a leading business` returns only pages that
  contain that phrase — not every page that happens to share the words. This
  also applies to node results.
* Each search hit links to **its own page**. The theme
  (`cfc_preprocess_views_view_unformatted()` in the `cfc` theme) renders a
  uniform card: a hit that is a node gets the rich node card (image, date,
  body excerpt), any other page gets a plain card. A page is de-duplicated
  against its own node result.

Node pages are crawled too (their region blocks are the point), but the
`entity:node` datasource still provides the richer node cards; the duplicate is
dropped at display time.

## Configuration

`Administration › Configuration › Search and metadata › CFC Page Index`
(`/admin/config/search/cfc-page-index`)

| Setting | Meaning |
|---|---|
| Site base URL | **Required.** Absolute URL the crawler fetches from (e.g. `https://www.example.com`). Cron/Drush have no request host of their own. |
| Content types to skip | Nodes of these types (default: news, rapports, events, article) are left to the standard content datasource, so a search matches the article body — not the "latest news" carousels that repeat on every page. Their links are still followed. |
| Crawl the site | Follow links from the seeds + menus. Off = index only the exact seed paths. |
| Maximum pages to crawl | Safety cap (default 150). |
| Seed / explicit page paths | Crawl starting points (or the whole list when crawling is off). |
| Languages | Language codes each page is indexed in. |
| Hidden CSS classes | Extra classes whose text must not be indexed. |

## Deploying to another environment

Deploy the code (this module folder + the `cfc` theme changes), then:

```
drush en cfc_page_index                          # first time only
drush updatedb                                   # if it was already enabled
drush cset cfc_page_index.settings base_url "https://REAL-SITE-URL"
drush cr
drush search-api:index default_index             # or wait for cron
```

Everything in the back office is applied automatically and idempotently by
`hook_install()` / the update hooks (via `PageIndexManager`):

* `search_api.index.default_index` — adds the `cfc_page` datasource and its
  fields, adds the node `body` field, wires `page_title` / `page_content` into
  the fulltext processors, extends `rendered_item` to every node bundle, and
  removes the `entity:block_content` datasource.
* `views.view.search_content` — sets the fulltext filter to `phrase` parse mode
  and adds the "current interface language" filter.

No manual back-office steps and no contrib modules are required. The first
`drush cron` / `drush search-api:index` runs the crawl (a few minutes for ~150
pages) and populates the results.

On Windows/Laragon only, the CLI and web keep separate compiled containers, so
also run:

```
drush sql:query "TRUNCATE cache_container"
drush sql:query "DELETE FROM cache_bootstrap WHERE cid = 'container'"
drush cr
```

To force a re-crawl at any time: save the settings form, or

```
drush php:eval "\Drupal::service('cfc_page_index.manager')->refresh();"
drush search-api:index default_index
```

## Known limitations

* The crawl renders every page, so it is slow (~1–2 s per page). It runs
  weekly on cron; the extracted text is kept in the `cfc_page_index.pages`
  key-value store (not a cache bin) between crawls, so `drush cache:rebuild`
  does not wipe it.
* Text shown only by client-side JavaScript is not captured.
* A page indexed in a language it has no translation for is skipped.
* Pages whose `<title>` / headings are not translated show an English title in
  French results — that is a content-translation gap on the site, not here.
* The site's `hp_slider` block logs a pre-existing "Recursive rendering"
  warning while any page is rendered (including during the crawl); unrelated to
  this module.
* On this Windows/Laragon setup the CLI and the web server keep **separate**
  compiled service containers, so after changing this module's `services.yml`
  or class signatures you must clear the shared container cache, not just run
  `drush cr`:

  ```
  drush sql:query "TRUNCATE cache_container"
  drush sql:query "DELETE FROM cache_bootstrap WHERE cid = 'container'"
  drush cr
  ```
