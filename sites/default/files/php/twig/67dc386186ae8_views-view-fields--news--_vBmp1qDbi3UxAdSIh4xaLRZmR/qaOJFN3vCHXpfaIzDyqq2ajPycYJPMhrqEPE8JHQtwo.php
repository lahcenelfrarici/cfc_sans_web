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

/* themes/custom/cfc/templates/view/news/views-view-fields--news--block.html.twig */
class __TwigTemplate_2f254d74e9488da198718957e3467732 extends Template
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
        // line 23
        yield "
";
        // line 24
        $context["youtubeUrl"] = Twig\Extension\CoreExtension::striptags(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, ($context["fields"] ?? null), "title", [], "any", false, false, true, 24), "content", [], "any", false, false, true, 24));
        // line 25
        $context["publishDate"] = Twig\Extension\CoreExtension::capitalize($this->env->getCharset(), $this->env->getFilter('format_date')->getCallable()($this->extensions['Twig\Extension\CoreExtension']->formatDate(CoreExtension::getAttribute($this->env, $this->source, ($context["field_date"] ?? null), "raw", [], "any", false, false, true, 25), "U"), "custom", "F Y"));
        // line 26
        yield "<div class=\"article\" data-title=\"";
        yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, Twig\Extension\CoreExtension::trim(($context["youtubeUrl"] ?? null)), "html", null, true);
        yield "\">
\t<div class=\"articles-img\">
\t\t<img src=\"";
        // line 28
        yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->extensions['Drupal\Core\Template\TwigExtension']->getFileUrl(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, ($context["row"] ?? null), "_entity", [], "any", false, false, true, 28), "field_image_news", [], "any", false, false, true, 28), "entity", [], "any", false, false, true, 28), "fileuri", [], "any", false, false, true, 28)), "html", null, true);
        yield "\" alt=\"Casablanca Finance City (CFC) took part\">
\t</div>
\t<div class=\"article-title\">";
        // line 30
        yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, ($context["fields"] ?? null), "title", [], "any", false, false, true, 30), "content", [], "any", false, false, true, 30), "html", null, true);
        yield "</div>
\t<div class=\"article-date\">
\t\t<svg xmlns=\"http://www.w3.org/2000/svg\" width=\"26\" height=\"27\" viewbox=\"0 0 26 27\" fill=\"none\">
\t\t\t<g clip-path=\"url(#clip0_4698_14065)\">
\t\t\t\t<path d=\"M7.3749 0.71875C7.61625 0.71875 7.84771 0.814625 8.01837 0.985283C8.18902 1.15594 8.2849 1.3874 8.2849 1.62875V3.33045H18.057V1.64045C18.057 1.3991 18.1529 1.16764 18.3235 0.996983C18.4942 0.826325 18.7257 0.73045 18.967 0.73045C19.2083 0.73045 19.4398 0.826325 19.6105 0.996983C19.7811 1.16764 19.877 1.3991 19.877 1.64045V3.33045H23.4C24.0893 3.33045 24.7505 3.6042 25.238 4.09151C25.7256 4.57883 25.9997 5.23981 26 5.92915V24.12C25.9997 24.8094 25.7256 25.4704 25.238 25.9577C24.7505 26.445 24.0893 26.7188 23.4 26.7188H2.6C1.91066 26.7188 1.24954 26.445 0.761982 25.9577C0.274425 25.4704 0.000344669 24.8094 0 24.12L0 5.92915C0.000344669 5.23981 0.274425 4.57883 0.761982 4.09151C1.24954 3.6042 1.91066 3.33045 2.6 3.33045H6.4649V1.62745C6.46524 1.38633 6.56127 1.1552 6.73189 0.984823C6.90251 0.814446 7.13378 0.71875 7.3749 0.71875ZM1.82 10.7833V24.12C1.82 24.2225 1.84018 24.3239 1.87937 24.4185C1.91857 24.5132 1.97603 24.5992 2.04846 24.6716C2.12089 24.744 2.20687 24.8015 2.30151 24.8407C2.39614 24.8799 2.49757 24.9 2.6 24.9H23.4C23.5024 24.9 23.6039 24.8799 23.6985 24.8407C23.7931 24.8015 23.8791 24.744 23.9515 24.6716C24.024 24.5992 24.0814 24.5132 24.1206 24.4185C24.1598 24.3239 24.18 24.2225 24.18 24.12V10.8015L1.82 10.7833ZM8.6671 19.7234V21.8892H6.5V19.7234H8.6671ZM14.0829 19.7234V21.8892H11.9171V19.7234H14.0829ZM19.5 19.7234V21.8892H17.3329V19.7234H19.5ZM8.6671 14.5533V16.7191H6.5V14.5533H8.6671ZM14.0829 14.5533V16.7191H11.9171V14.5533H14.0829ZM19.5 14.5533V16.7191H17.3329V14.5533H19.5ZM6.4649 5.14915H2.6C2.49757 5.14915 2.39614 5.16932 2.30151 5.20852C2.20687 5.24772 2.12089 5.30518 2.04846 5.37761C1.97603 5.45004 1.91857 5.53602 1.87937 5.63066C1.84018 5.72529 1.82 5.82672 1.82 5.92915V8.96465L24.18 8.98285V5.92915C24.18 5.82672 24.1598 5.72529 24.1206 5.63066C24.0814 5.53602 24.024 5.45004 23.9515 5.37761C23.8791 5.30518 23.7931 5.24772 23.6985 5.20852C23.6039 5.16932 23.5024 5.14915 23.4 5.14915H19.877V6.35685C19.877 6.5982 19.7811 6.82966 19.6105 7.00032C19.4398 7.17098 19.2083 7.26685 18.967 7.26685C18.7257 7.26685 18.4942 7.17098 18.3235 7.00032C18.1529 6.82966 18.057 6.5982 18.057 6.35685V5.14915H8.2849V6.34515C8.2849 6.5865 8.18902 6.81796 8.01837 6.98862C7.84771 7.15928 7.61625 7.25515 7.3749 7.25515C7.13355 7.25515 6.90209 7.15928 6.73143 6.98862C6.56077 6.81796 6.4649 6.5865 6.4649 6.34515V5.14915Z\" fill=\"#929292\"/>
\t\t\t</g>
\t\t\t<defs>
\t\t\t\t<clipPath id=\"clip0_4698_14065\">
\t\t\t\t\t<rect width=\"26\" height=\"26\" fill=\"white\" transform=\"translate(0 0.71875)\"/>
\t\t\t\t</clipPath>
\t\t\t</defs>
\t\t</svg>
\t\t";
        // line 42
        yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, ($context["fields"] ?? null), "field_date", [], "any", false, false, true, 42), "content", [], "any", false, false, true, 42), "html", null, true);
        yield "</div>
</div>
";
        $this->env->getExtension('\Drupal\Core\Template\TwigExtension')
            ->checkDeprecations($context, ["fields", "field_date", "row"]);        yield from [];
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName(): string
    {
        return "themes/custom/cfc/templates/view/news/views-view-fields--news--block.html.twig";
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
        return array (  77 => 42,  62 => 30,  57 => 28,  51 => 26,  49 => 25,  47 => 24,  44 => 23,);
    }

    public function getSourceContext(): Source
    {
        return new Source("{#
/**
 * @file
 * Default theme implementation for a single field in a view.
 *
 * Available variables:
 * - view: The view that the field belongs to.
 * - field: The field handler that can process the input.
 * - row: The raw result of the database query that generated this field.
 * - output: The processed output that will normally be used.
 *
 * When fetching output from the row this construct should be used:
 * data = row[field.field_alias]
 *
 * The above will guarantee that you'll always get the correct data, regardless
 * of any changes in the aliasing that might happen if the view is modified.
 *
 * @see template_preprocess_views_view_field()
 *
 * @ingroup themeable
 */
#}

{% set youtubeUrl = fields.title.content|raw|striptags %}
{% set publishDate = field_date.raw|date('U')|format_date('custom', 'F Y')|capitalize %}
<div class=\"article\" data-title=\"{{ youtubeUrl|trim }}\">
\t<div class=\"articles-img\">
\t\t<img src=\"{{ file_url(row._entity.field_image_news.entity.fileuri) }}\" alt=\"Casablanca Finance City (CFC) took part\">
\t</div>
\t<div class=\"article-title\">{{fields.title.content }}</div>
\t<div class=\"article-date\">
\t\t<svg xmlns=\"http://www.w3.org/2000/svg\" width=\"26\" height=\"27\" viewbox=\"0 0 26 27\" fill=\"none\">
\t\t\t<g clip-path=\"url(#clip0_4698_14065)\">
\t\t\t\t<path d=\"M7.3749 0.71875C7.61625 0.71875 7.84771 0.814625 8.01837 0.985283C8.18902 1.15594 8.2849 1.3874 8.2849 1.62875V3.33045H18.057V1.64045C18.057 1.3991 18.1529 1.16764 18.3235 0.996983C18.4942 0.826325 18.7257 0.73045 18.967 0.73045C19.2083 0.73045 19.4398 0.826325 19.6105 0.996983C19.7811 1.16764 19.877 1.3991 19.877 1.64045V3.33045H23.4C24.0893 3.33045 24.7505 3.6042 25.238 4.09151C25.7256 4.57883 25.9997 5.23981 26 5.92915V24.12C25.9997 24.8094 25.7256 25.4704 25.238 25.9577C24.7505 26.445 24.0893 26.7188 23.4 26.7188H2.6C1.91066 26.7188 1.24954 26.445 0.761982 25.9577C0.274425 25.4704 0.000344669 24.8094 0 24.12L0 5.92915C0.000344669 5.23981 0.274425 4.57883 0.761982 4.09151C1.24954 3.6042 1.91066 3.33045 2.6 3.33045H6.4649V1.62745C6.46524 1.38633 6.56127 1.1552 6.73189 0.984823C6.90251 0.814446 7.13378 0.71875 7.3749 0.71875ZM1.82 10.7833V24.12C1.82 24.2225 1.84018 24.3239 1.87937 24.4185C1.91857 24.5132 1.97603 24.5992 2.04846 24.6716C2.12089 24.744 2.20687 24.8015 2.30151 24.8407C2.39614 24.8799 2.49757 24.9 2.6 24.9H23.4C23.5024 24.9 23.6039 24.8799 23.6985 24.8407C23.7931 24.8015 23.8791 24.744 23.9515 24.6716C24.024 24.5992 24.0814 24.5132 24.1206 24.4185C24.1598 24.3239 24.18 24.2225 24.18 24.12V10.8015L1.82 10.7833ZM8.6671 19.7234V21.8892H6.5V19.7234H8.6671ZM14.0829 19.7234V21.8892H11.9171V19.7234H14.0829ZM19.5 19.7234V21.8892H17.3329V19.7234H19.5ZM8.6671 14.5533V16.7191H6.5V14.5533H8.6671ZM14.0829 14.5533V16.7191H11.9171V14.5533H14.0829ZM19.5 14.5533V16.7191H17.3329V14.5533H19.5ZM6.4649 5.14915H2.6C2.49757 5.14915 2.39614 5.16932 2.30151 5.20852C2.20687 5.24772 2.12089 5.30518 2.04846 5.37761C1.97603 5.45004 1.91857 5.53602 1.87937 5.63066C1.84018 5.72529 1.82 5.82672 1.82 5.92915V8.96465L24.18 8.98285V5.92915C24.18 5.82672 24.1598 5.72529 24.1206 5.63066C24.0814 5.53602 24.024 5.45004 23.9515 5.37761C23.8791 5.30518 23.7931 5.24772 23.6985 5.20852C23.6039 5.16932 23.5024 5.14915 23.4 5.14915H19.877V6.35685C19.877 6.5982 19.7811 6.82966 19.6105 7.00032C19.4398 7.17098 19.2083 7.26685 18.967 7.26685C18.7257 7.26685 18.4942 7.17098 18.3235 7.00032C18.1529 6.82966 18.057 6.5982 18.057 6.35685V5.14915H8.2849V6.34515C8.2849 6.5865 8.18902 6.81796 8.01837 6.98862C7.84771 7.15928 7.61625 7.25515 7.3749 7.25515C7.13355 7.25515 6.90209 7.15928 6.73143 6.98862C6.56077 6.81796 6.4649 6.5865 6.4649 6.34515V5.14915Z\" fill=\"#929292\"/>
\t\t\t</g>
\t\t\t<defs>
\t\t\t\t<clipPath id=\"clip0_4698_14065\">
\t\t\t\t\t<rect width=\"26\" height=\"26\" fill=\"white\" transform=\"translate(0 0.71875)\"/>
\t\t\t\t</clipPath>
\t\t\t</defs>
\t\t</svg>
\t\t{{ fields.field_date.content}}</div>
</div>
", "themes/custom/cfc/templates/view/news/views-view-fields--news--block.html.twig", "C:\\laragon\\www\\cfc_2026\\themes\\custom\\cfc\\templates\\view\\news\\views-view-fields--news--block.html.twig");
    }
    
    public function checkSecurity()
    {
        static $tags = ["set" => 24];
        static $filters = ["striptags" => 24, "raw" => 24, "capitalize" => 25, "format_date" => 25, "date" => 25, "escape" => 26, "trim" => 26];
        static $functions = ["file_url" => 28];

        try {
            $this->sandbox->checkSecurity(
                ['set'],
                ['striptags', 'raw', 'capitalize', 'format_date', 'date', 'escape', 'trim'],
                ['file_url'],
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
