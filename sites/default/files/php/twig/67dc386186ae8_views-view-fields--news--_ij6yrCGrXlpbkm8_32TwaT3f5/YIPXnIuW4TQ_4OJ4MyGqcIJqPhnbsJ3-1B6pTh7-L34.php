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

/* themes/custom/cfc/templates/view/news/views-view-fields--news--block-2.html.twig */
class __TwigTemplate_d7a58f7988ee80dfa97b28d1bbb704b3 extends Template
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
<div class=\"item\">
\t<div class=\"sc--mg-slider--wrapper\">
\t\t<div class=\"wrapper-slider---img\">
\t\t\t<img src=\"";
        // line 27
        yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->extensions['Drupal\Core\Template\TwigExtension']->getFileUrl(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, ($context["row"] ?? null), "_entity", [], "any", false, false, true, 27), "field_image_news", [], "any", false, false, true, 27), "entity", [], "any", false, false, true, 27), "fileuri", [], "any", false, false, true, 27)), "html", null, true);
        yield "\">
\t\t</div>
\t\t<div class=\"element--slider-item\">
\t\t\t<h2>";
        // line 30
        yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, ($context["fields"] ?? null), "title", [], "any", false, false, true, 30), "content", [], "any", false, false, true, 30), "html", null, true);
        yield "</h2>
\t\t\t";
        // line 32
        yield "
\t\t\t<div class=\"btn--pls\">
\t\t\t\t<a class=\"\" href=\"";
        // line 34
        yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->extensions['Drupal\Core\Template\TwigExtension']->getPath("entity.node.canonical", ["node" => CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, ($context["row"] ?? null), "_entity", [], "any", false, false, true, 34), "nid", [], "any", false, false, true, 34), "value", [], "any", false, false, true, 34)]), "html", null, true);
        yield "\" target=\"_blank\">
\t\t\t\t\t<span>";
        // line 35
        yield $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar(t("Read more"));
        yield "</span>
\t\t\t\t\t<svg xmlns=\"http://www.w3.org/2000/svg\" width=\"48\" height=\"48\" viewbox=\"0 0 48 48\" fill=\"none\">
\t\t\t\t\t\t<g clip-path=\"url(#clip0_4948_4128)\">
\t\t\t\t\t\t\t<path d=\"M40.7279 22.5873C41.1028 22.9623 41.3135 23.4709 41.3135 24.0013C41.3135 24.5316 41.1028 25.0402 40.7279 25.4153L29.4139 36.7293C29.2294 36.9203 29.0087 37.0727 28.7647 37.1775C28.5207 37.2823 28.2583 37.3375 27.9927 37.3398C27.7271 37.3421 27.4638 37.2915 27.218 37.1909C26.9722 37.0903 26.7489 36.9418 26.5611 36.7541C26.3733 36.5663 26.2248 36.343 26.1243 36.0972C26.0237 35.8514 25.9731 35.588 25.9754 35.3225C25.9777 35.0569 26.0329 34.7945 26.1377 34.5505C26.2425 34.3065 26.3949 34.0858 26.5859 33.9013L34.4859 26.0013H7.9999C7.46947 26.0013 6.96076 25.7906 6.58569 25.4155C6.21062 25.0404 5.9999 24.5317 5.9999 24.0013C5.9999 23.4708 6.21062 22.9621 6.58569 22.5871C6.96076 22.212 7.46947 22.0013 7.9999 22.0013H34.4859L26.5859 14.1013C26.2216 13.7241 26.02 13.2189 26.0246 12.6945C26.0291 12.1701 26.2395 11.6684 26.6103 11.2976C26.9811 10.9268 27.4827 10.7165 28.0071 10.7119C28.5315 10.7074 29.0367 10.9089 29.4139 11.2733L40.7279 22.5873Z\" fill=\"url(#paint0_linear_4948_4128)\"></path>
\t\t\t\t\t\t</g>
\t\t\t\t\t\t<defs>
\t\t\t\t\t\t\t<linearGradient id=\"paint0_linear_4948_4128\" x1=\"23.6567\" y1=\"37.3398\" x2=\"25.6881\" y2=\"13.0491\" gradientunits=\"userSpaceOnUse\">
\t\t\t\t\t\t\t\t<stop stop-color=\"#009681\"></stop>
\t\t\t\t\t\t\t\t<stop offset=\"1\" stop-color=\"#007565\"></stop>
\t\t\t\t\t\t\t</linearGradient>
\t\t\t\t\t\t\t<clipPath id=\"clip0_4948_4128\">
\t\t\t\t\t\t\t\t<rect width=\"48\" height=\"48\" fill=\"white\" transform=\"matrix(0 -1 -1 0 48 48)\"></rect>
\t\t\t\t\t\t\t</clipPath>
\t\t\t\t\t\t</defs>
\t\t\t\t\t</svg>
\t\t\t\t</a>
\t\t\t</div>
\t\t</div>
\t</div>
</div>
";
        $this->env->getExtension('\Drupal\Core\Template\TwigExtension')
            ->checkDeprecations($context, ["row", "fields"]);        yield from [];
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName(): string
    {
        return "themes/custom/cfc/templates/view/news/views-view-fields--news--block-2.html.twig";
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
        return array (  68 => 35,  64 => 34,  60 => 32,  56 => 30,  50 => 27,  44 => 23,);
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

<div class=\"item\">
\t<div class=\"sc--mg-slider--wrapper\">
\t\t<div class=\"wrapper-slider---img\">
\t\t\t<img src=\"{{ file_url(row._entity.field_image_news.entity.fileuri) }}\">
\t\t</div>
\t\t<div class=\"element--slider-item\">
\t\t\t<h2>{{fields.title.content }}</h2>
\t\t\t{# <p>{{fields.body.content }}</p> #}

\t\t\t<div class=\"btn--pls\">
\t\t\t\t<a class=\"\" href=\"{{ path('entity.node.canonical', {'node':row._entity.nid.value}) }}\" target=\"_blank\">
\t\t\t\t\t<span>{{'Read more'|t}}</span>
\t\t\t\t\t<svg xmlns=\"http://www.w3.org/2000/svg\" width=\"48\" height=\"48\" viewbox=\"0 0 48 48\" fill=\"none\">
\t\t\t\t\t\t<g clip-path=\"url(#clip0_4948_4128)\">
\t\t\t\t\t\t\t<path d=\"M40.7279 22.5873C41.1028 22.9623 41.3135 23.4709 41.3135 24.0013C41.3135 24.5316 41.1028 25.0402 40.7279 25.4153L29.4139 36.7293C29.2294 36.9203 29.0087 37.0727 28.7647 37.1775C28.5207 37.2823 28.2583 37.3375 27.9927 37.3398C27.7271 37.3421 27.4638 37.2915 27.218 37.1909C26.9722 37.0903 26.7489 36.9418 26.5611 36.7541C26.3733 36.5663 26.2248 36.343 26.1243 36.0972C26.0237 35.8514 25.9731 35.588 25.9754 35.3225C25.9777 35.0569 26.0329 34.7945 26.1377 34.5505C26.2425 34.3065 26.3949 34.0858 26.5859 33.9013L34.4859 26.0013H7.9999C7.46947 26.0013 6.96076 25.7906 6.58569 25.4155C6.21062 25.0404 5.9999 24.5317 5.9999 24.0013C5.9999 23.4708 6.21062 22.9621 6.58569 22.5871C6.96076 22.212 7.46947 22.0013 7.9999 22.0013H34.4859L26.5859 14.1013C26.2216 13.7241 26.02 13.2189 26.0246 12.6945C26.0291 12.1701 26.2395 11.6684 26.6103 11.2976C26.9811 10.9268 27.4827 10.7165 28.0071 10.7119C28.5315 10.7074 29.0367 10.9089 29.4139 11.2733L40.7279 22.5873Z\" fill=\"url(#paint0_linear_4948_4128)\"></path>
\t\t\t\t\t\t</g>
\t\t\t\t\t\t<defs>
\t\t\t\t\t\t\t<linearGradient id=\"paint0_linear_4948_4128\" x1=\"23.6567\" y1=\"37.3398\" x2=\"25.6881\" y2=\"13.0491\" gradientunits=\"userSpaceOnUse\">
\t\t\t\t\t\t\t\t<stop stop-color=\"#009681\"></stop>
\t\t\t\t\t\t\t\t<stop offset=\"1\" stop-color=\"#007565\"></stop>
\t\t\t\t\t\t\t</linearGradient>
\t\t\t\t\t\t\t<clipPath id=\"clip0_4948_4128\">
\t\t\t\t\t\t\t\t<rect width=\"48\" height=\"48\" fill=\"white\" transform=\"matrix(0 -1 -1 0 48 48)\"></rect>
\t\t\t\t\t\t\t</clipPath>
\t\t\t\t\t\t</defs>
\t\t\t\t\t</svg>
\t\t\t\t</a>
\t\t\t</div>
\t\t</div>
\t</div>
</div>
", "themes/custom/cfc/templates/view/news/views-view-fields--news--block-2.html.twig", "C:\\laragon\\www\\cfc_2026\\themes\\custom\\cfc\\templates\\view\\news\\views-view-fields--news--block-2.html.twig");
    }
    
    public function checkSecurity()
    {
        static $tags = [];
        static $filters = ["escape" => 27, "t" => 35];
        static $functions = ["file_url" => 27, "path" => 34];

        try {
            $this->sandbox->checkSecurity(
                [],
                ['escape', 't'],
                ['file_url', 'path'],
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
