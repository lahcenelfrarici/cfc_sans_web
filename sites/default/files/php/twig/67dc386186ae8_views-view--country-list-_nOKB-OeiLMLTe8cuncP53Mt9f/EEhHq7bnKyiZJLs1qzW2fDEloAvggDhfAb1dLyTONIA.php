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

/* themes/custom/cfc/templates/view/country_list/views-view--country-list--block.html.twig */
class __TwigTemplate_b5d8742269505e2e57cd1037e0e4391e extends Template
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
        // line 1
        yield "<section class=\"filter--pays-elements\" id=\"filter-verticale\">
\t<div class=\"title-primary-sc mb-3\">
\t\t<h2>";
        // line 3
        yield $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar(t("Discover our community of members"));
        yield "</h2>
\t</div>
\t<div class=\"container\" id=\"five_box_two_colon\">
\t\t<div class=\"filters\">

\t\t\t<div class=\"custom-select\" id=\"country-select\">
\t\t\t\t<div class=\"select-selected\" data-value=\"all\">
\t\t\t\t\t<img src=\"/themes/custom/cfc/CFC/assets/images/mdi_world.png\" alt=\"US Flag\"/>
\t\t\t\t\t<span>";
        // line 11
        yield $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar(t("All countries"));
        yield "</span>
\t\t\t\t</div>

\t\t\t\t<div class=\"select-items\">
\t\t\t\t\t<div data-value=\"all\">
\t\t\t\t\t\t<img src=\"/themes/custom/cfc/CFC/assets/images/mdi_world.png\" alt=\"World\"/>
\t\t\t\t\t\t<span>All countries</span>
\t\t\t\t\t</div>
\t\t\t\t\t";
        // line 19
        yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, ($context["rows"] ?? null), "html", null, true);
        yield "
\t\t\t\t</div>

\t\t\t</div>


\t\t\t";
        // line 25
        yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, views_embed_view("all_industries", "block_1"), "html", null, true);
        yield "

\t\t\t<div class=\"search--bar-1\">
\t\t\t\t<input type=\"text\" id=\"searchFilter\" placeholder=\"Search by name\">
\t\t\t\t<svg xmlns=\"http://www.w3.org/2000/svg\" width=\"23\" height=\"23\" viewbox=\"0 0 23 23\" fill=\"none\">
\t\t\t\t\t<path d=\"M9.93178 2.875C8.53608 2.875 7.17173 3.28887 6.01125 4.06428C4.85076 4.83969 3.94628 5.94181 3.41217 7.23127C2.87806 8.52072 2.73831 9.93961 3.0106 11.3085C3.28288 12.6774 3.95498 13.9348 4.94189 14.9217C5.92879 15.9086 7.18619 16.5807 8.55507 16.853C9.92395 17.1252 11.3428 16.9855 12.6323 16.4514C13.9218 15.9173 15.0239 15.0128 15.7993 13.8523C16.5747 12.6918 16.9886 11.3275 16.9886 9.93178C16.9884 8.06024 16.2449 6.26539 14.9215 4.94201C13.5982 3.61864 11.8033 2.87512 9.93178 2.875Z\" stroke=\"black\" stroke-miterlimit=\"10\"/>
\t\t\t\t\t<path d=\"M15.1963 15.1953L20.1247 20.1237\" stroke=\"black\" stroke-miterlimit=\"10\" stroke-linecap=\"round\"/>
\t\t\t\t</svg>
\t\t\t</div>
\t\t</div>
\t\t<div id=\"no-members-message\" class=\"hidden\">
\t\t\t<svg xmlns=\"http://www.w3.org/2000/svg\" width=\"95\" height=\"95\" viewbox=\"0 0 95 95\" fill=\"none\">
\t\t\t\t<path d=\"M53.4377 33.6484L33.646 53.4401M33.646 33.6484L53.4377 53.4401\" stroke=\"url(#paint0_linear_6507_14111)\" stroke-width=\"8\" stroke-linecap=\"round\" stroke-linejoin=\"round\"/>
\t\t\t\t<path d=\"M43.5417 75.2083C61.0307 75.2083 75.2083 61.0307 75.2083 43.5417C75.2083 26.0526 61.0307 11.875 43.5417 11.875C26.0526 11.875 11.875 26.0526 11.875 43.5417C11.875 61.0307 26.0526 75.2083 43.5417 75.2083Z\" stroke=\"url(#paint1_linear_6507_14111)\" stroke-width=\"8\" stroke-linecap=\"round\" stroke-linejoin=\"round\"/>
\t\t\t\t<path d=\"M83.1248 83.1224L66.104 66.1016\" stroke=\"url(#paint2_linear_6507_14111)\" stroke-width=\"8\" stroke-linecap=\"round\" stroke-linejoin=\"round\"/>
\t\t\t\t<defs>
\t\t\t\t\t<linearGradient id=\"paint0_linear_6507_14111\" x1=\"33.646\" y1=\"43.5443\" x2=\"51.6058\" y2=\"41.5524\" gradientunits=\"userSpaceOnUse\">
\t\t\t\t\t\t<stop stop-color=\"#009681\"/>
\t\t\t\t\t\t<stop offset=\"1\" stop-color=\"#007565\"/>
\t\t\t\t\t</linearGradient>
\t\t\t\t\t<linearGradient id=\"paint1_linear_6507_14111\" x1=\"11.875\" y1=\"43.5417\" x2=\"69.3464\" y2=\"37.1678\" gradientunits=\"userSpaceOnUse\">
\t\t\t\t\t\t<stop stop-color=\"#009681\"/>
\t\t\t\t\t\t<stop offset=\"1\" stop-color=\"#007565\"/>
\t\t\t\t\t</linearGradient>
\t\t\t\t\t<linearGradient id=\"paint2_linear_6507_14111\" x1=\"66.104\" y1=\"74.612\" x2=\"81.5494\" y2=\"72.899\" gradientunits=\"userSpaceOnUse\">
\t\t\t\t\t\t<stop stop-color=\"#009681\"/>
\t\t\t\t\t\t<stop offset=\"1\" stop-color=\"#007565\"/>
\t\t\t\t\t</linearGradient>
\t\t\t\t</defs>
\t\t\t</svg>
\t\t\t<p>
\t\t\t\tIt looks like there are no members in this industry and country right now.<br>
\t\t\t\tCheck back later to explore new additions to our community!</p>
        ";
        // line 61
        yield "        ";
        // line 64
        yield "\t\t\t<div class=\"btn--pls\">
\t\t\t\t<a class=\"\" href=\"";
        // line 65
        yield $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar($this->extensions['Drupal\Core\Template\TwigExtension']->getPath("entity.node.canonical", ["node" => 101]));
        yield "\">
\t\t\t\t\t<span>Become a Member</span>
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
\t\t";
        // line 84
        yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, views_embed_view("community_of_members", "block_1"), "html", null, true);
        yield "

\t\t<!-- arrows wrapper -->
\t\t<div class=\"slider-navigation\">
\t\t\t<button class=\"slick-prev\">Previous</button>
\t\t\t<div class=\"slick-dots-container\"></div>
\t\t\t<button class=\"slick-next\">Next</button>
\t\t</div>

\t</div>
</section>
";
        $this->env->getExtension('\Drupal\Core\Template\TwigExtension')
            ->checkDeprecations($context, ["rows"]);        yield from [];
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName(): string
    {
        return "themes/custom/cfc/templates/view/country_list/views-view--country-list--block.html.twig";
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
        return array (  142 => 84,  120 => 65,  117 => 64,  115 => 61,  79 => 25,  70 => 19,  59 => 11,  48 => 3,  44 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("<section class=\"filter--pays-elements\" id=\"filter-verticale\">
\t<div class=\"title-primary-sc mb-3\">
\t\t<h2>{{'Discover our community of members'|t }}</h2>
\t</div>
\t<div class=\"container\" id=\"five_box_two_colon\">
\t\t<div class=\"filters\">

\t\t\t<div class=\"custom-select\" id=\"country-select\">
\t\t\t\t<div class=\"select-selected\" data-value=\"all\">
\t\t\t\t\t<img src=\"/themes/custom/cfc/CFC/assets/images/mdi_world.png\" alt=\"US Flag\"/>
\t\t\t\t\t<span>{{'All countries'|t }}</span>
\t\t\t\t</div>

\t\t\t\t<div class=\"select-items\">
\t\t\t\t\t<div data-value=\"all\">
\t\t\t\t\t\t<img src=\"/themes/custom/cfc/CFC/assets/images/mdi_world.png\" alt=\"World\"/>
\t\t\t\t\t\t<span>All countries</span>
\t\t\t\t\t</div>
\t\t\t\t\t{{ rows }}
\t\t\t\t</div>

\t\t\t</div>


\t\t\t{{ drupal_view('all_industries','block_1') }}

\t\t\t<div class=\"search--bar-1\">
\t\t\t\t<input type=\"text\" id=\"searchFilter\" placeholder=\"Search by name\">
\t\t\t\t<svg xmlns=\"http://www.w3.org/2000/svg\" width=\"23\" height=\"23\" viewbox=\"0 0 23 23\" fill=\"none\">
\t\t\t\t\t<path d=\"M9.93178 2.875C8.53608 2.875 7.17173 3.28887 6.01125 4.06428C4.85076 4.83969 3.94628 5.94181 3.41217 7.23127C2.87806 8.52072 2.73831 9.93961 3.0106 11.3085C3.28288 12.6774 3.95498 13.9348 4.94189 14.9217C5.92879 15.9086 7.18619 16.5807 8.55507 16.853C9.92395 17.1252 11.3428 16.9855 12.6323 16.4514C13.9218 15.9173 15.0239 15.0128 15.7993 13.8523C16.5747 12.6918 16.9886 11.3275 16.9886 9.93178C16.9884 8.06024 16.2449 6.26539 14.9215 4.94201C13.5982 3.61864 11.8033 2.87512 9.93178 2.875Z\" stroke=\"black\" stroke-miterlimit=\"10\"/>
\t\t\t\t\t<path d=\"M15.1963 15.1953L20.1247 20.1237\" stroke=\"black\" stroke-miterlimit=\"10\" stroke-linecap=\"round\"/>
\t\t\t\t</svg>
\t\t\t</div>
\t\t</div>
\t\t<div id=\"no-members-message\" class=\"hidden\">
\t\t\t<svg xmlns=\"http://www.w3.org/2000/svg\" width=\"95\" height=\"95\" viewbox=\"0 0 95 95\" fill=\"none\">
\t\t\t\t<path d=\"M53.4377 33.6484L33.646 53.4401M33.646 33.6484L53.4377 53.4401\" stroke=\"url(#paint0_linear_6507_14111)\" stroke-width=\"8\" stroke-linecap=\"round\" stroke-linejoin=\"round\"/>
\t\t\t\t<path d=\"M43.5417 75.2083C61.0307 75.2083 75.2083 61.0307 75.2083 43.5417C75.2083 26.0526 61.0307 11.875 43.5417 11.875C26.0526 11.875 11.875 26.0526 11.875 43.5417C11.875 61.0307 26.0526 75.2083 43.5417 75.2083Z\" stroke=\"url(#paint1_linear_6507_14111)\" stroke-width=\"8\" stroke-linecap=\"round\" stroke-linejoin=\"round\"/>
\t\t\t\t<path d=\"M83.1248 83.1224L66.104 66.1016\" stroke=\"url(#paint2_linear_6507_14111)\" stroke-width=\"8\" stroke-linecap=\"round\" stroke-linejoin=\"round\"/>
\t\t\t\t<defs>
\t\t\t\t\t<linearGradient id=\"paint0_linear_6507_14111\" x1=\"33.646\" y1=\"43.5443\" x2=\"51.6058\" y2=\"41.5524\" gradientunits=\"userSpaceOnUse\">
\t\t\t\t\t\t<stop stop-color=\"#009681\"/>
\t\t\t\t\t\t<stop offset=\"1\" stop-color=\"#007565\"/>
\t\t\t\t\t</linearGradient>
\t\t\t\t\t<linearGradient id=\"paint1_linear_6507_14111\" x1=\"11.875\" y1=\"43.5417\" x2=\"69.3464\" y2=\"37.1678\" gradientunits=\"userSpaceOnUse\">
\t\t\t\t\t\t<stop stop-color=\"#009681\"/>
\t\t\t\t\t\t<stop offset=\"1\" stop-color=\"#007565\"/>
\t\t\t\t\t</linearGradient>
\t\t\t\t\t<linearGradient id=\"paint2_linear_6507_14111\" x1=\"66.104\" y1=\"74.612\" x2=\"81.5494\" y2=\"72.899\" gradientunits=\"userSpaceOnUse\">
\t\t\t\t\t\t<stop stop-color=\"#009681\"/>
\t\t\t\t\t\t<stop offset=\"1\" stop-color=\"#007565\"/>
\t\t\t\t\t</linearGradient>
\t\t\t\t</defs>
\t\t\t</svg>
\t\t\t<p>
\t\t\t\tIt looks like there are no members in this industry and country right now.<br>
\t\t\t\tCheck back later to explore new additions to our community!</p>
        {# <p>
\t\t\t\tIt looks like there are no members in this industry and country right now.<br>
\t\t\t\tCheck back later to explore new additions to our community!</p> #}
        {# <p>
\t\t\t\tIt looks like there are no members in this industry and country right now.<br>
\t\t\t\tCheck back later to explore new additions to our community!</p> #}
\t\t\t<div class=\"btn--pls\">
\t\t\t\t<a class=\"\" href=\"{{ path('entity.node.canonical', {'node': 101}) }}\">
\t\t\t\t\t<span>Become a Member</span>
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
\t\t{{ drupal_view('community_of_members','block_1') }}

\t\t<!-- arrows wrapper -->
\t\t<div class=\"slider-navigation\">
\t\t\t<button class=\"slick-prev\">Previous</button>
\t\t\t<div class=\"slick-dots-container\"></div>
\t\t\t<button class=\"slick-next\">Next</button>
\t\t</div>

\t</div>
</section>
", "themes/custom/cfc/templates/view/country_list/views-view--country-list--block.html.twig", "C:\\laragon\\www\\cfc_2026\\themes\\custom\\cfc\\templates\\view\\country_list\\views-view--country-list--block.html.twig");
    }
    
    public function checkSecurity()
    {
        static $tags = [];
        static $filters = ["t" => 3, "escape" => 19];
        static $functions = ["drupal_view" => 25, "path" => 65];

        try {
            $this->sandbox->checkSecurity(
                [],
                ['t', 'escape'],
                ['drupal_view', 'path'],
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
