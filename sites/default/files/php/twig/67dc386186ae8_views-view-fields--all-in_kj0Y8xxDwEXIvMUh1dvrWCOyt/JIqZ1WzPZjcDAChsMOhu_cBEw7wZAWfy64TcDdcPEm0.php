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

/* themes/custom/cfc/templates/view/all_industries/views-view-fields--all-industries--block.html.twig */
class __TwigTemplate_eb80714f7754e1da593dfcb8973420c7 extends Template
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
        yield "
";
        // line 29
        $context["youtubeUrl"] = Twig\Extension\CoreExtension::striptags(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, ($context["fields"] ?? null), "field_name_industries", [], "any", false, false, true, 29), "content", [], "any", false, false, true, 29));
        // line 30
        yield "<div data-category=\"";
        yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, Twig\Extension\CoreExtension::trim(($context["youtubeUrl"] ?? null)), "html", null, true);
        yield "\">
\t\t\t\t\t\t\t<span>";
        // line 31
        yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, ($context["fields"] ?? null), "field_name_industries", [], "any", false, false, true, 31), "content", [], "any", false, false, true, 31), "html", null, true);
        yield "</span>
\t\t\t\t\t\t</div>
";
        $this->env->getExtension('\Drupal\Core\Template\TwigExtension')
            ->checkDeprecations($context, ["fields"]);        yield from [];
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName(): string
    {
        return "themes/custom/cfc/templates/view/all_industries/views-view-fields--all-industries--block.html.twig";
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
        return array (  54 => 31,  49 => 30,  47 => 29,  44 => 28,);
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

{% set youtubeUrl = fields.field_name_industries.content|raw|striptags %}
<div data-category=\"{{ youtubeUrl|trim }}\">
\t\t\t\t\t\t\t<span>{{fields.field_name_industries.content }}</span>
\t\t\t\t\t\t</div>
", "themes/custom/cfc/templates/view/all_industries/views-view-fields--all-industries--block.html.twig", "C:\\laragon\\www\\cfc_2026\\themes\\custom\\cfc\\templates\\view\\all_industries\\views-view-fields--all-industries--block.html.twig");
    }
    
    public function checkSecurity()
    {
        static $tags = ["set" => 29];
        static $filters = ["striptags" => 29, "raw" => 29, "escape" => 30, "trim" => 30];
        static $functions = [];

        try {
            $this->sandbox->checkSecurity(
                ['set'],
                ['striptags', 'raw', 'escape', 'trim'],
                [],
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
