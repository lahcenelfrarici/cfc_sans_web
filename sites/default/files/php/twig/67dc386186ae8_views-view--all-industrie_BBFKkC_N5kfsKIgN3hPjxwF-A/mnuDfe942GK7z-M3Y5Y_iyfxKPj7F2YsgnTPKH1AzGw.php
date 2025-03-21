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

/* themes/custom/cfc/templates/view/all_industries/views-view--all-industries--block.html.twig */
class __TwigTemplate_78b3a957afe6fc90fa9966a0af627462 extends Template
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
        // line 11
        yield "

";
        // line 14
        yield "

\t\t\t\t<div class=\"custom-select\" id=\"industry-select\">
\t\t\t\t\t<div class=\"select-selected\" data-category=\"all\">
\t\t\t\t\t\t<span>All industries</span>
\t\t\t\t\t</div>
\t\t\t\t\t<div class=\"select-items\">
              <div data-category=\"all\">
      <span>All industries</span>
    </div>
             ";
        // line 24
        yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, ($context["rows"] ?? null), "html", null, true);
        yield "
\t\t\t\t\t</div>
\t\t\t\t</div>
";
        $this->env->getExtension('\Drupal\Core\Template\TwigExtension')
            ->checkDeprecations($context, ["rows"]);        yield from [];
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName(): string
    {
        return "themes/custom/cfc/templates/view/all_industries/views-view--all-industries--block.html.twig";
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
        return array (  60 => 24,  48 => 14,  44 => 11,);
    }

    public function getSourceContext(): Source
    {
        return new Source("{# <div class=\"select-items\">


 {{ rows }}
</div>
 <div class=\"select-items\">
    {{ rows }}
</div>

{{ dump(content) }} #}


{# ********* #}


\t\t\t\t<div class=\"custom-select\" id=\"industry-select\">
\t\t\t\t\t<div class=\"select-selected\" data-category=\"all\">
\t\t\t\t\t\t<span>All industries</span>
\t\t\t\t\t</div>
\t\t\t\t\t<div class=\"select-items\">
              <div data-category=\"all\">
      <span>All industries</span>
    </div>
             {{ rows }}
\t\t\t\t\t</div>
\t\t\t\t</div>
", "themes/custom/cfc/templates/view/all_industries/views-view--all-industries--block.html.twig", "C:\\laragon\\www\\cfc_2026\\themes\\custom\\cfc\\templates\\view\\all_industries\\views-view--all-industries--block.html.twig");
    }
    
    public function checkSecurity()
    {
        static $tags = [];
        static $filters = ["escape" => 24];
        static $functions = [];

        try {
            $this->sandbox->checkSecurity(
                [],
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
