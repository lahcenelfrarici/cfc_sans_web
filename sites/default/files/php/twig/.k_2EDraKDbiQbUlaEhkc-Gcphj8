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

/* themes/custom/cfc/templates/system/page--404.html.twig */
class __TwigTemplate_b9fe5e81c5bbf5838f5f6b3b506462e0 extends Template
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
        // line 48
        yield "
";
        // line 49
        yield from $this->loadTemplate("@cfc/partials/header.html.twig", "themes/custom/cfc/templates/system/page--404.html.twig", 49)->unwrap()->yield($context);
        // line 50
        yield "
<!-- 404 -->
<div class=\"container container-md mb-5 pb-6 pt-6\">
    <div class=\"container\">
        <div class=\"row\">
            <div class=\"col-lg-12 text-center\">
                <div class=\"all-404\">
                    <div class=\"font-weight-bold display-2 text-primary\">
                        404
                    </div>

                    <div class=\"mt-3\">
                        <h1 class=\"h2\">
                            ";
        // line 63
        yield $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar(t("Erreur 404 - Page non trouvée"));
        yield "
                        </h1>
                    </div>

                    <div class=\"mt-5\">
                        <div class=\"actualites-events-btn\">
                            <a class=\"btn btn-light\" href=\"";
        // line 69
        yield $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar($this->extensions['Drupal\Core\Template\TwigExtension']->getUrl("<front>"));
        yield "\">
                                <i class=\"fa-solid fa-angle-left\"></i>
                                <span> ";
        // line 71
        yield $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar(t("Retour à la page d'accueil"));
        yield " </span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- 404 -->

";
        // line 82
        yield from $this->loadTemplate("@cfc/partials/footer.html.twig", "themes/custom/cfc/templates/system/page--404.html.twig", 82)->unwrap()->yield($context);
        yield from [];
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName(): string
    {
        return "themes/custom/cfc/templates/system/page--404.html.twig";
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
        return array (  92 => 82,  78 => 71,  73 => 69,  64 => 63,  49 => 50,  47 => 49,  44 => 48,);
    }

    public function getSourceContext(): Source
    {
        return new Source("{#
/**
 * @file
 * Default theme implementation to display a single page.
 *
 * The doctype, html, head and body tags are not in this template. Instead they
 * can be found in the html.html.twig template in this directory.
 *
 * Available variables:
 *
 * General utility variables:
 * - base_path: The base URL path of the Drupal installation. Will usually be
 *   \"/\" unless you have installed Drupal in a sub-directory.
 * - is_front: A flag indicating if the current page is the front page.
 * - logged_in: A flag indicating if the user is registered and signed in.
 * - is_admin: A flag indicating if the user has permission to access
 *   administration pages.
 *
 * Site identity:
 * - front_page: The URL of the front page. Use this instead of base_path when
 *   linking to the front page. This includes the language domain or prefix.
 *
 * Page content (in order of occurrence in the default page.html.twig):
 * - messages: Status and error messages. Should be displayed prominently.
 * - node: Fully loaded node, if there is an automatically-loaded node
 *   associated with the page and the node ID is the second argument in the
 *   page's path (e.g. node/12345 and node/12345/revisions, but not
 *   comment/reply/12345).
 *
 * Regions:
 * - page.header: Items for the header region.
 * - page.primary_menu: Items for the primary menu region.
 * - page.secondary_menu: Items for the secondary menu region.
 * - page.highlighted: Items for the highlighted content region.
 * - page.help: Dynamic help text, mostly for admin pages.
 * - page.content: The main content of the current page.
 * - page.sidebar_first: Items for the first sidebar.
 * - page.sidebar_second: Items for the second sidebar.
 * - page.footer: Items for the footer region.
 * - page.breadcrumb: Items for the breadcrumb region.
 *
 * @see template_preprocess_page()
 * @see html.html.twig
 *
 * @ingroup themeable
 */
#}

{% include \"@cfc/partials/header.html.twig\" %}

<!-- 404 -->
<div class=\"container container-md mb-5 pb-6 pt-6\">
    <div class=\"container\">
        <div class=\"row\">
            <div class=\"col-lg-12 text-center\">
                <div class=\"all-404\">
                    <div class=\"font-weight-bold display-2 text-primary\">
                        404
                    </div>

                    <div class=\"mt-3\">
                        <h1 class=\"h2\">
                            {{ \"Erreur 404 - Page non trouvée\"|t }}
                        </h1>
                    </div>

                    <div class=\"mt-5\">
                        <div class=\"actualites-events-btn\">
                            <a class=\"btn btn-light\" href=\"{{url('<front>')}}\">
                                <i class=\"fa-solid fa-angle-left\"></i>
                                <span> {{ \"Retour à la page d'accueil\"|t }} </span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- 404 -->

{% include \"@cfc/partials/footer.html.twig\" %}
", "themes/custom/cfc/templates/system/page--404.html.twig", "C:\\laragon\\www\\cfc_2026\\themes\\custom\\cfc\\templates\\system\\page--404.html.twig");
    }
    
    public function checkSecurity()
    {
        static $tags = ["include" => 49];
        static $filters = ["t" => 63];
        static $functions = ["url" => 69];

        try {
            $this->sandbox->checkSecurity(
                ['include'],
                ['t'],
                ['url'],
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
