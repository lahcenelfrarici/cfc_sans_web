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

/* themes/custom/cfc/templates/view/news/views-view--news--block.html.twig */
class __TwigTemplate_7b49b4c37c8d91bf9511e62515ff000a extends Template
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
        // line 17
        yield "<div class=\"container\">
    <div class=\"title-primary-sc mb-3\">
        <h2>What’s up in CFC?</h2>
    </div>
    <div class=\"card---filter\">
        <div class=\"filter\" id=\"filter\">
            <!-- Alphabet buttons will be dynamically generated here -->
        </div>
        <div class=\"articles owl-carousel\" id=\"articles\">
            ";
        // line 26
        yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, ($context["rows"] ?? null), "html", null, true);
        yield " <!-- Replace this with your actual article items -->
        </div>
    </div>
</div>
";
        $this->env->getExtension('\Drupal\Core\Template\TwigExtension')
            ->checkDeprecations($context, ["rows"]);        yield from [];
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName(): string
    {
        return "themes/custom/cfc/templates/view/news/views-view--news--block.html.twig";
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
        return array (  55 => 26,  44 => 17,);
    }

    public function getSourceContext(): Source
    {
        return new Source("{# <div class=\"container\" id=\"alpha-champs\">
  <div class=\"title-primary-sc mb-3\">
    <h2>{{'What’s up in CFC?'|t}}</h2>
  </div>
  <div class=\"card---filter\">
    <div class=\"filter\" id=\"filter\"></div>
    <div class=\"articles-container\">
      <div class=\"articles articles-slider\" id=\"articles\">
        {{ rows }}
      </div>
    </div>
    <div class=\"pagination-container\">
      <div class=\"slider-dots\" id=\"slider-dots\"></div>
    </div>
  </div>
</div> #}
<div class=\"container\">
    <div class=\"title-primary-sc mb-3\">
        <h2>What’s up in CFC?</h2>
    </div>
    <div class=\"card---filter\">
        <div class=\"filter\" id=\"filter\">
            <!-- Alphabet buttons will be dynamically generated here -->
        </div>
        <div class=\"articles owl-carousel\" id=\"articles\">
            {{ rows }} <!-- Replace this with your actual article items -->
        </div>
    </div>
</div>
", "themes/custom/cfc/templates/view/news/views-view--news--block.html.twig", "C:\\laragon\\www\\cfc_2026\\themes\\custom\\cfc\\templates\\view\\news\\views-view--news--block.html.twig");
    }
    
    public function checkSecurity()
    {
        static $tags = [];
        static $filters = ["escape" => 26];
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
