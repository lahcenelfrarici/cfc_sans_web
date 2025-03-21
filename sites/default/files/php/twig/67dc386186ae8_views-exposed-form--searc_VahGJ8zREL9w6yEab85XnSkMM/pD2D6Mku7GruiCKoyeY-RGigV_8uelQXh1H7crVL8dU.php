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

/* themes/custom/cfc/templates/form/views-exposed-form--search-content-block-1.html.twig */
class __TwigTemplate_5526c89fdbda3efb6524210cf4de2852 extends Template
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
        // line 14
        if ( !Twig\Extension\CoreExtension::testEmpty(($context["q"] ?? null))) {
            // line 15
            yield "\t";
            // line 19
            yield "\t";
            yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, ($context["q"] ?? null), "html", null, true);
            yield "
";
        }
        // line 21
        yield "
";
        // line 35
        yield "<form ";
        yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, ($context["attributes"] ?? null), "html", null, true);
        yield ">
    ";
        // line 36
        yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, CoreExtension::getAttribute($this->env, $this->source, ($context["form"] ?? null), "form_build_id", [], "any", false, false, true, 36), "html", null, true);
        yield "
    ";
        // line 37
        yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, CoreExtension::getAttribute($this->env, $this->source, ($context["form"] ?? null), "form_id", [], "any", false, false, true, 37), "html", null, true);
        yield "
    ";
        // line 38
        yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, CoreExtension::getAttribute($this->env, $this->source, ($context["form"] ?? null), "form_token", [], "any", false, false, true, 38), "html", null, true);
        yield "

    <!-- Render the search input -->
    <div class=\"search-wrapper\">
        ";
        // line 42
        yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, CoreExtension::getAttribute($this->env, $this->source, ($context["form"] ?? null), "keys", [], "any", false, false, true, 42), "html", null, true);
        yield "
    </div>

    <!-- Render the submit button -->
    <div class=\"btn\">
        ";
        // line 47
        yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, ($context["form"] ?? null), "actions", [], "any", false, false, true, 47), "submit", [], "any", false, false, true, 47), "html", null, true);
        yield "
    </div>
</form>

";
        $this->env->getExtension('\Drupal\Core\Template\TwigExtension')
            ->checkDeprecations($context, ["q", "attributes", "form"]);        yield from [];
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName(): string
    {
        return "themes/custom/cfc/templates/form/views-exposed-form--search-content-block-1.html.twig";
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
        return array (  85 => 47,  77 => 42,  70 => 38,  66 => 37,  62 => 36,  57 => 35,  54 => 21,  48 => 19,  46 => 15,  44 => 14,);
    }

    public function getSourceContext(): Source
    {
        return new Source("{#
/**
 * @file
 * Default theme implementation of a views exposed form.
 *
 * Available variables:
 * - form: A render element representing the form.
 *
 * @see template_preprocess_views_exposed_form()
 *
 * @ingroup themeable
 */
#}
{% if q is not empty %}
\t{#
\t    This ensures that, if clean URLs are off, the 'q' is added first,
\t    as a hidden form element, so that it shows up first in the POST URL.
\t  #}
\t{{ q }}
{% endif %}

{# <form {{ attributes }}>
\t{{ form.form_build_id }}
\t{{ form.form_id }}

\t{{ form.search }}



<div class=\"btn\">
\t{{ form.actions.submit }}
</div>

{{ form.form_token }}</form> #}
<form {{ attributes }}>
    {{ form.form_build_id }}
    {{ form.form_id }}
    {{ form.form_token }}

    <!-- Render the search input -->
    <div class=\"search-wrapper\">
        {{ form.keys }}
    </div>

    <!-- Render the submit button -->
    <div class=\"btn\">
        {{ form.actions.submit }}
    </div>
</form>

", "themes/custom/cfc/templates/form/views-exposed-form--search-content-block-1.html.twig", "C:\\laragon\\www\\cfc_2026\\themes\\custom\\cfc\\templates\\form\\views-exposed-form--search-content-block-1.html.twig");
    }
    
    public function checkSecurity()
    {
        static $tags = ["if" => 14];
        static $filters = ["escape" => 19];
        static $functions = [];

        try {
            $this->sandbox->checkSecurity(
                ['if'],
                ['escape'],
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
