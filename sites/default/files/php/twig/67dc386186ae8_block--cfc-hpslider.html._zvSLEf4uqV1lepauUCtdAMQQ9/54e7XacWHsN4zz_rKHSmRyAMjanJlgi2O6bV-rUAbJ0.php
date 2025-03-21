<?php

use Twig\Environment;
use Twig\Error\LoaderError;
use Twig\Error\RuntimeError;
use Twig\Extension\CoreExtension;
use Twig\Extension\SandboxExtension;
use Twig\Markup;
use Twig\Sandbox\SecurityError;
use Twig\Sandbox\SecurityNotAllowedTagError;
use Twig\Sandbox\SecurityNotAllowedFilterError;
use Twig\Sandbox\SecurityNotAllowedFunctionError;
use Twig\Source;
use Twig\Template;
use Twig\TemplateWrapper;

/* themes/custom/cfc/templates/block/block--cfc-hpslider.html.twig */
class __TwigTemplate_a2dc1d95c399659303dbd9a667563276 extends Template
{
    private Source $source;
    /**
     * @var array<string, Template>
     */
    private array $macros = [];

    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        $this->parent = false;

        $this->blocks = [
        ];
        $this->sandbox = $this->extensions[SandboxExtension::class];
        $this->checkSecurity();
    }

    protected function doDisplay(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        // line 37
        yield "
";
        // line 54
        yield "  <!-- Slider Section -->
  <section class=\"slider\">
    <div class=\"slider-overlay\"></div>

    ";
        // line 61
        if (CoreExtension::getAttribute($this->env, $this->source, ($context["content"] ?? null), "field_video", [], "any", false, false, true, 61)) {
            // line 62
            yield "  <div class=\"slider-video\">
    ";
            // line 63
            $context['_parent'] = $context;
            $context['_seq'] = CoreExtension::ensureTraversable((($_v0 = CoreExtension::getAttribute($this->env, $this->source, ($context["content"] ?? null), "field_video", [], "any", false, false, true, 63)) && is_array($_v0) || $_v0 instanceof ArrayAccess && in_array($_v0::class, CoreExtension::ARRAY_LIKE_CLASSES, true) ? ($_v0["#items"] ?? null) : CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, ($context["content"] ?? null), "field_video", [], "any", false, false, true, 63), "#items", [], "array", false, false, true, 63)));
            foreach ($context['_seq'] as $context["_key"] => $context["item"]) {
                // line 64
                yield "      ";
                $context["video_url"] = Drupal\twig_tweak\TwigTweakExtension::fileUrlFilter(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, $context["item"], "entity", [], "any", false, false, true, 64), "field_media_video_file", [], "any", false, false, true, 64), "entity", [], "any", false, false, true, 64), "uri", [], "any", false, false, true, 64), "value", [], "any", false, false, true, 64));
                // line 65
                yield "      <video class=\"slider-video\" autoplay muted loop playsinline preload=\"metadata\">
        <source src=\"";
                // line 66
                yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, ($context["video_url"] ?? null), "html", null, true);
                yield "\" type=\"video/mp4\">
      </video>
    ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_key'], $context['item'], $context['_parent']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 69
            yield "  </div>
";
        }
        // line 71
        yield "
    <!-- <img class=\"slider-video\" src=\"./assets/images/slider-1.png\"> -->

    <div class=\"slider-content\">
      <h1 class=\"display-4 fw-bold\">";
        // line 75
        yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, CoreExtension::getAttribute($this->env, $this->source, ($context["content"] ?? null), "field_titre_slider", [], "any", false, false, true, 75), "html", null, true);
        yield "</h1>
 ";
        // line 76
        yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, CoreExtension::getAttribute($this->env, $this->source, ($context["content"] ?? null), "body", [], "any", false, false, true, 76), "html", null, true);
        yield "
      <div class=\"search-filter\">
        ";
        // line 84
        yield "   ";
        // line 90
        yield "          ";
        // line 96
        yield "             ";
        // line 102
        yield "        <div id=\"form__drupal_sb\">
          ";
        // line 103
        yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, Drupal\twig_tweak\TwigTweakExtension::drupalEntity("block", "cfc_exposedformsearch_contentblock_1"), "html", null, true);
        yield "

        </div>

        <div class=\"sugg--btn\">
          <div>
            <p class=\"mt-2\">";
        // line 109
        yield $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar(t("Suggested"));
        yield ":</p>
          </div>
          <div>
            ";
        // line 120
        yield "              \t";
        yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, Drupal\twig_tweak\TwigTweakExtension::drupalEntity("block", "cfc_menubannerhp"), "html", null, true);
        yield "
          </div>
        </div>
      </div>
    </div>
  </section>

";
        $this->env->getExtension('\Drupal\Core\Template\TwigExtension')
            ->checkDeprecations($context, ["content"]);        yield from [];
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName(): string
    {
        return "themes/custom/cfc/templates/block/block--cfc-hpslider.html.twig";
    }

    /**
     * @codeCoverageIgnore
     */
    public function isTraitable(): bool
    {
        return false;
    }

    /**
     * @codeCoverageIgnore
     */
    public function getDebugInfo(): array
    {
        return array (  120 => 120,  114 => 109,  105 => 103,  102 => 102,  100 => 96,  98 => 90,  96 => 84,  91 => 76,  87 => 75,  81 => 71,  77 => 69,  68 => 66,  65 => 65,  62 => 64,  58 => 63,  55 => 62,  53 => 61,  47 => 54,  44 => 37,);
    }

    public function getSourceContext(): Source
    {
        return new Source("{#
/**
 * @file
 * Default theme implementation for a menu block.
 *
 * Available variables:
 * - plugin_id: The ID of the block implementation.
 * - label: The configured label of the block if visible.
 * - configuration: A list of the block's configuration values.
 *   - label: The configured label for the block.
 *   - label_display: The display settings for the label.
 *   - provider: The module or other provider that provided this block plugin.
 *   - Block plugin specific settings will also be stored here.
 * - in_preview: Whether the plugin is being rendered in preview mode.
 * - content: The content of this block.
 * - attributes: HTML attributes for the containing element.
 *   - id: A valid HTML ID and guaranteed unique.
 * - title_attributes: HTML attributes for the title element.
 * - content_attributes: HTML attributes for the content element.
 * - title_prefix: Additional output populated by modules, intended to be
 *   displayed in front of the main title tag that appears in the template.
 * - title_suffix: Additional output populated by modules, intended to be
 *   displayed after the main title tag that appears in the template.
 *
 * Headings should be used on navigation menus that consistently appear on
 * multiple pages. When this menu block's label is configured to not be
 * displayed, it is automatically made invisible using the 'visually-hidden' CSS
 * class, which still keeps it visible for screen-readers and assistive
 * technology. Headings allow screen-reader and keyboard only users to navigate
 * to or skip the links.
 * See http://juicystudio.com/article/screen-readers-display-none.php and
 * http://www.w3.org/TR/WCAG-TECHS/H42.html for more information.
 *
 * @ingroup themeable
 */
#}

{# <section class=\"section--slider\">
    <div class=\"slider-main\">
        <div class=\"wrapper-slider\">
            {{ content.field_image_banner }}
        </div>
    </div>
    <div class=\"paragraph-wrapper\">
        <div class=\"container\">
            {{ content.field_title}}
            {{ content.field_body }}
            <div class=\"wrapper_btn\">
                {{ content.field_link }}
            </div>
        </div>
    </div>
</section> #}
  <!-- Slider Section -->
  <section class=\"slider\">
    <div class=\"slider-overlay\"></div>

    {# <video class=\"slider-video\" autoplay muted loop playsinline preload=\"metadata\">
      <source src=\"here video name field field_video\" type=\"video/mp4\">
    </video> #}
{% if content.field_video %}
  <div class=\"slider-video\">
    {% for item in content.field_video['#items'] %}
      {% set video_url = item.entity.field_media_video_file.entity.uri.value|file_url %}
      <video class=\"slider-video\" autoplay muted loop playsinline preload=\"metadata\">
        <source src=\"{{ video_url }}\" type=\"video/mp4\">
      </video>
    {% endfor %}
  </div>
{% endif %}

    <!-- <img class=\"slider-video\" src=\"./assets/images/slider-1.png\"> -->

    <div class=\"slider-content\">
      <h1 class=\"display-4 fw-bold\">{{ content.field_titre_slider}}</h1>
 {{ content.body }}
      <div class=\"search-filter\">
        {# <form class=\"d-flex align-items-center\">
          <input type=\"text\" class=\"form-control form-control-lg\" placeholder=\"Search...\">
          <button type=\"submit\" class=\"btn\">
            <i class=\"fas fa-search\"></i>
          </button>
        </form> #}
   {# <form class=\"d-flex align-items-center\">
          <input type=\"text\" class=\"form-control form-control-lg\" placeholder=\"Search...\">
          <button type=\"submit\" class=\"btn\">
            <i class=\"fas fa-search\"></i>
          </button>
        </form> #}
          {# <form class=\"d-flex align-items-center\">
          <input type=\"text\" class=\"form-control form-control-lg\" placeholder=\"Search...\">
          <button type=\"submit\" class=\"btn\">
            <i class=\"fas fa-search\"></i>
          </button>
        </form> #}
             {# <form class=\"d-flex align-items-center\">
          <input type=\"text\" class=\"form-control form-control-lg\" placeholder=\"Search...\">
          <button type=\"submit\" class=\"btn\">
            <i class=\"fas fa-search\"></i>
          </button>
        </form> #}
        <div id=\"form__drupal_sb\">
          {{ drupal_entity('block','cfc_exposedformsearch_contentblock_1') }}

        </div>

        <div class=\"sugg--btn\">
          <div>
            <p class=\"mt-2\">{{'Suggested'|t}}:</p>
          </div>
          <div>
            {# <div class=\"menu_banner_link\">
              <button class=\"btn btn-outline-light\"><a href=\"/become-a-member\">How to become a member?</a></button>
              <button class=\"btn btn-outline-light\"><a href=\"/whats_on.html\">Upcoming CFC events</a></button>
              <button class=\"btn btn-outline-light\"><a href=\"/africa_insights.html\">Africa economic
                  insights</a></button>
              <button class=\"btn btn-outline-light\"><a href=\"/Doing businesss.html\">Doing business</a></button>
              <button class=\"btn btn-outline-light\"><a href=\"#filter-verticale\">CFC members</a></button>
            </div> #}
              \t{{ drupal_entity('block','cfc_menubannerhp') }}
          </div>
        </div>
      </div>
    </div>
  </section>

", "themes/custom/cfc/templates/block/block--cfc-hpslider.html.twig", "C:\\laragon\\www\\cfc_2026\\themes\\custom\\cfc\\templates\\block\\block--cfc-hpslider.html.twig");
    }
    
    public function checkSecurity()
    {
        static $tags = ["if" => 61, "for" => 63, "set" => 64];
        static $filters = ["file_url" => 64, "escape" => 66, "t" => 109];
        static $functions = ["drupal_entity" => 103];

        try {
            $this->sandbox->checkSecurity(
                ['if', 'for', 'set'],
                ['file_url', 'escape', 't'],
                ['drupal_entity'],
                $this->source
            );
        } catch (SecurityError $e) {
            $e->setSourceContext($this->source);

            if ($e instanceof SecurityNotAllowedTagError && isset($tags[$e->getTagName()])) {
                $e->setTemplateLine($tags[$e->getTagName()]);
            } elseif ($e instanceof SecurityNotAllowedFilterError && isset($filters[$e->getFilterName()])) {
                $e->setTemplateLine($filters[$e->getFilterName()]);
            } elseif ($e instanceof SecurityNotAllowedFunctionError && isset($functions[$e->getFunctionName()])) {
                $e->setTemplateLine($functions[$e->getFunctionName()]);
            }

            throw $e;
        }

    }
}
