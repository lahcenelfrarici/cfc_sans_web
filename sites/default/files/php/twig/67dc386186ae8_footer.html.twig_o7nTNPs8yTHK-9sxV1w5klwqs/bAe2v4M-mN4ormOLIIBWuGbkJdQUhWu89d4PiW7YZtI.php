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

/* @cfc/partials/footer.html.twig */
class __TwigTemplate_04ace6dcd9f6a983408c65a282a32f3b extends Template
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
        // line 2
        yield "<section class=\"contact---us\" id=\"contact---us\">
\t<div
\t\tclass=\"contact-container\">
\t\t<!-- Left Form Section -->
\t\t<div class=\"contact-form\">
\t\t\t<h3>";
        // line 7
        yield $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar(t("I am interested in getting in touch with Casablanca Finance City"));
        yield "</h3>

\t\t\t<div class=\"web__form_dr\">
\t\t\t\t";
        // line 10
        yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, Drupal\twig_tweak\TwigTweakExtension::drupalEntity("block", "cfc_webform"), "html", null, true);
        yield "
\t\t\t</div>
\t\t</div>

\t\t<!-- Right Image Section -->
\t\t<div class=\"contact-image\">
\t\t\t<img src=\"/themes/custom/cfc/CFC/assets/images/contatc-img.png\" alt=\"Office\"/>
\t\t</div>
\t</div>
</section>
";
        // line 21
        yield "<section class=\"section---filter-block\">
\t";
        // line 22
        yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, views_embed_view("news", "block_1"), "html", null, true);
        yield "
</section>

<!-- Section Footer-->

<footer class=\"bg-dark text-light py-5\">
\t<div class=\"container\">
\t\t<div
\t\t\tclass=\"row\">
\t\t\t<!-- Copyright -->
\t\t\t<div class=\"text-center mb-4\">
\t\t\t\t<p class=\"mb-0\">
\t\t\t\t\t";
        // line 34
        yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, Drupal\twig_tweak\TwigTweakExtension::drupalEntity("block", "cfc_copyright"), "html", null, true);
        yield "</p>
\t\t\t</div>
\t\t\t<!-- Logo and Social Links -->
\t\t\t<div class=\"col-md-4 \">
\t\t\t\t";
        // line 38
        yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, Drupal\twig_tweak\TwigTweakExtension::drupalEntity("block", "cfc_logofooter"), "html", null, true);
        yield "

\t\t\t\t";
        // line 40
        yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, Drupal\twig_tweak\TwigTweakExtension::drupalEntity("block", "cfc_socialmedia"), "html", null, true);
        yield "


\t\t\t</div>

\t\t\t<!-- Stay Updated -->
\t\t\t<div class=\"col-md-4\">
\t\t\t\t<h5>";
        // line 47
        yield $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar(t("Stay Updated"));
        yield "</h5>
\t\t\t\t";
        // line 48
        yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, Drupal\twig_tweak\TwigTweakExtension::drupalEntity("block", "cfc_stayupdated"), "html", null, true);
        yield "
\t\t\t\t<form class=\"d-flex mt-3\">
\t\t\t\t\t<input type=\"email\" class=\"form-control rounded-pill\" placeholder=\"Email..\" required=\"\">
\t\t\t\t\t<button type=\"submit\" class=\"form--news\">";
        // line 51
        yield $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar(t("Subscribe"));
        yield "
\t\t\t\t\t\t<i class=\"fas fa-arrow-right ms-2\"></i>
\t\t\t\t\t</button>
\t\t\t\t</form>
\t\t\t</div>

\t\t\t<!-- Quick Links -->
\t\t\t<div class=\"col-md-4\">

\t\t\t\t";
        // line 60
        yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, Drupal\twig_tweak\TwigTweakExtension::drupalEntity("block", "cfc_quicklinks"), "html", null, true);
        yield "
\t\t\t</div>
\t\t</div>


\t</div>
</footer>
";
        yield from [];
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName(): string
    {
        return "@cfc/partials/footer.html.twig";
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
        return array (  132 => 60,  120 => 51,  114 => 48,  110 => 47,  100 => 40,  95 => 38,  88 => 34,  73 => 22,  70 => 21,  57 => 10,  51 => 7,  44 => 2,);
    }

    public function getSourceContext(): Source
    {
        return new Source("{# Section Footer #}
<section class=\"contact---us\" id=\"contact---us\">
\t<div
\t\tclass=\"contact-container\">
\t\t<!-- Left Form Section -->
\t\t<div class=\"contact-form\">
\t\t\t<h3>{{'I am interested in getting in touch with Casablanca Finance City'|t}}</h3>

\t\t\t<div class=\"web__form_dr\">
\t\t\t\t{{ drupal_entity('block','cfc_webform') }}
\t\t\t</div>
\t\t</div>

\t\t<!-- Right Image Section -->
\t\t<div class=\"contact-image\">
\t\t\t<img src=\"/themes/custom/cfc/CFC/assets/images/contatc-img.png\" alt=\"Office\"/>
\t\t</div>
\t</div>
</section>
{#  #}
<section class=\"section---filter-block\">
\t{{ drupal_view('news','block_1') }}
</section>

<!-- Section Footer-->

<footer class=\"bg-dark text-light py-5\">
\t<div class=\"container\">
\t\t<div
\t\t\tclass=\"row\">
\t\t\t<!-- Copyright -->
\t\t\t<div class=\"text-center mb-4\">
\t\t\t\t<p class=\"mb-0\">
\t\t\t\t\t{{ drupal_entity('block','cfc_copyright') }}</p>
\t\t\t</div>
\t\t\t<!-- Logo and Social Links -->
\t\t\t<div class=\"col-md-4 \">
\t\t\t\t{{ drupal_entity('block','cfc_logofooter') }}

\t\t\t\t{{ drupal_entity('block','cfc_socialmedia') }}


\t\t\t</div>

\t\t\t<!-- Stay Updated -->
\t\t\t<div class=\"col-md-4\">
\t\t\t\t<h5>{{ 'Stay Updated'|t }}</h5>
\t\t\t\t{{ drupal_entity('block','cfc_stayupdated') }}
\t\t\t\t<form class=\"d-flex mt-3\">
\t\t\t\t\t<input type=\"email\" class=\"form-control rounded-pill\" placeholder=\"Email..\" required=\"\">
\t\t\t\t\t<button type=\"submit\" class=\"form--news\">{{'Subscribe'|t}}
\t\t\t\t\t\t<i class=\"fas fa-arrow-right ms-2\"></i>
\t\t\t\t\t</button>
\t\t\t\t</form>
\t\t\t</div>

\t\t\t<!-- Quick Links -->
\t\t\t<div class=\"col-md-4\">

\t\t\t\t{{ drupal_entity('block','cfc_quicklinks') }}
\t\t\t</div>
\t\t</div>


\t</div>
</footer>
", "@cfc/partials/footer.html.twig", "C:\\laragon\\www\\cfc_2026\\themes\\custom\\cfc\\templates\\partials\\footer.html.twig");
    }
    
    public function checkSecurity()
    {
        static $tags = [];
        static $filters = ["t" => 7, "escape" => 10];
        static $functions = ["drupal_entity" => 10, "drupal_view" => 22];

        try {
            $this->sandbox->checkSecurity(
                [],
                ['t', 'escape'],
                ['drupal_entity', 'drupal_view'],
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
