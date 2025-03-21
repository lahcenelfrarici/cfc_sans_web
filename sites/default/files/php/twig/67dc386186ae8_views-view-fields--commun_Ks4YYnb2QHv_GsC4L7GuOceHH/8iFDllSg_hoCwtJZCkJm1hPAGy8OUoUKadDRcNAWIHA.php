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

/* themes/custom/cfc/templates/view/community_of_members/views-view-fields--community-of-members--block.html.twig */
class __TwigTemplate_04751dbf136a31016e0344eda51fd978 extends Template
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
        // line 28
        $context["industrieseUrl"] = Twig\Extension\CoreExtension::striptags(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, ($context["fields"] ?? null), "field_all_industries", [], "any", false, false, true, 28), "content", [], "any", false, false, true, 28));
        // line 29
        $context["country_payseUrl"] = Twig\Extension\CoreExtension::striptags(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, ($context["fields"] ?? null), "field_country_pays", [], "any", false, false, true, 29), "content", [], "any", false, false, true, 29));
        // line 30
        $context["Url_link"] = Twig\Extension\CoreExtension::striptags(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, ($context["fields"] ?? null), "field_members_links", [], "any", false, false, true, 30), "content", [], "any", false, false, true, 30));
        // line 31
        yield "<div class=\"member\" data-country=\"";
        yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, Twig\Extension\CoreExtension::trim(($context["country_payseUrl"] ?? null)), "html", null, true);
        yield "\" data-category=\"";
        yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, Twig\Extension\CoreExtension::trim(($context["industrieseUrl"] ?? null)), "html", null, true);
        yield "\">
\t\t\t\t\t<div class=\"img--pays-el\"><img src=\"";
        // line 32
        yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->extensions['Drupal\Core\Template\TwigExtension']->getFileUrl(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, ($context["row"] ?? null), "_entity", [], "any", false, false, true, 32), "field_image_member", [], "any", false, false, true, 32), "entity", [], "any", false, false, true, 32), "fileuri", [], "any", false, false, true, 32)), "html", null, true);
        yield "\"></div>
\t\t\t\t\t<div class=\"parnet--title\">";
        // line 33
        yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, ($context["fields"] ?? null), "title", [], "any", false, false, true, 33), "content", [], "any", false, false, true, 33), "html", null, true);
        yield "<div class=\"link--arrow-ps\">
\t\t\t\t\t\t\t";
        // line 39
        yield "               <a href=\"";
        yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, Twig\Extension\CoreExtension::trim(($context["Url_link"] ?? null)), "html", null, true);
        yield "\" target=\"_blank\" rel=\"noopener noreferrer\">
    <svg xmlns=\"http://www.w3.org/2000/svg\" width=\"38\" height=\"38\" viewBox=\"0 0 38 38\" fill=\"none\">
      <path d=\"M7.12477 20.5815H25.4693L18.3443 27.7065L20.5831 29.9453L31.5303 18.9981L20.5831 8.05098L18.3443 10.2898L25.4693 17.4148H7.12477V20.5815Z\" fill=\"#00677F\"/>
    </svg>
  </a>
\t\t\t\t\t\t</div>
\t\t\t\t\t</div>
\t\t\t\t</div>
";
        $this->env->getExtension('\Drupal\Core\Template\TwigExtension')
            ->checkDeprecations($context, ["fields", "row"]);        yield from [];
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName(): string
    {
        return "themes/custom/cfc/templates/view/community_of_members/views-view-fields--community-of-members--block.html.twig";
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
        return array (  65 => 39,  61 => 33,  57 => 32,  50 => 31,  48 => 30,  46 => 29,  44 => 28,);
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
{# {% set youtubeUrl = fields.field_country_name.content|raw|striptags %}
<div data-value=\"{{ youtubeUrl|trim }}\">
\t<img src=\"{{ file_url(row._entity.field_flag_image.entity.fileuri) }}\" alt=\"{{ row.content['#country_name'] }}\" width=\"20\" height=\"15\"/>
\t<span>{{fields.field_country_name.content }}</span>
</div> #}
{% set industrieseUrl = fields.field_all_industries.content|raw|striptags %}
{% set country_payseUrl = fields.field_country_pays.content|raw|striptags %}
{% set Url_link = fields.field_members_links.content|raw|striptags %}
<div class=\"member\" data-country=\"{{ country_payseUrl|trim }}\" data-category=\"{{ industrieseUrl|trim }}\">
\t\t\t\t\t<div class=\"img--pays-el\"><img src=\"{{ file_url(row._entity.field_image_member.entity.fileuri) }}\"></div>
\t\t\t\t\t<div class=\"parnet--title\">{{fields.title.content }}<div class=\"link--arrow-ps\">
\t\t\t\t\t\t\t{# <a href=\"#\">
\t\t\t\t\t\t\t\t<svg xmlns=\"http://www.w3.org/2000/svg\" width=\"38\" height=\"38\" viewbox=\"0 0 38 38\" fill=\"none\">
\t\t\t\t\t\t\t\t\t<path d=\"M7.12477 20.5815H25.4693L18.3443 27.7065L20.5831 29.9453L31.5303 18.9981L20.5831 8.05098L18.3443 10.2898L25.4693 17.4148H7.12477V20.5815Z\" fill=\"#00677F\"/>
\t\t\t\t\t\t\t\t</svg>
\t\t\t\t\t\t\t</a> #}
               <a href=\"{{ Url_link|trim }}\" target=\"_blank\" rel=\"noopener noreferrer\">
    <svg xmlns=\"http://www.w3.org/2000/svg\" width=\"38\" height=\"38\" viewBox=\"0 0 38 38\" fill=\"none\">
      <path d=\"M7.12477 20.5815H25.4693L18.3443 27.7065L20.5831 29.9453L31.5303 18.9981L20.5831 8.05098L18.3443 10.2898L25.4693 17.4148H7.12477V20.5815Z\" fill=\"#00677F\"/>
    </svg>
  </a>
\t\t\t\t\t\t</div>
\t\t\t\t\t</div>
\t\t\t\t</div>
", "themes/custom/cfc/templates/view/community_of_members/views-view-fields--community-of-members--block.html.twig", "C:\\laragon\\www\\cfc_2026\\themes\\custom\\cfc\\templates\\view\\community_of_members\\views-view-fields--community-of-members--block.html.twig");
    }
    
    public function checkSecurity()
    {
        static $tags = ["set" => 28];
        static $filters = ["striptags" => 28, "raw" => 28, "escape" => 31, "trim" => 31];
        static $functions = ["file_url" => 32];

        try {
            $this->sandbox->checkSecurity(
                ['set'],
                ['striptags', 'raw', 'escape', 'trim'],
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
