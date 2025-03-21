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

/* themes/custom/cfc/templates/view/news/views-view--news--block-2.html.twig */
class __TwigTemplate_49816ea5a423b66f10d695d2b706c56c extends Template
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
  <section class=\"banner_status_slider\">
    <div class=\"title-primary-sc mb-3\">
      <h2>";
        // line 17
        yield $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar(t("What’s up in CFC?"));
        yield "</h2>
    </div>
    <div class=\"owl\">
      <div class=\"owl-carousel owl-theme\">

         ";
        // line 22
        yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, ($context["rows"] ?? null), "html", null, true);
        yield "

      </div>
    </div>

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
        return "themes/custom/cfc/templates/view/news/views-view--news--block-2.html.twig";
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
        return array (  61 => 22,  53 => 17,  48 => 14,  44 => 11,);
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

  <section class=\"banner_status_slider\">
    <div class=\"title-primary-sc mb-3\">
      <h2>{{'What’s up in CFC?'|t }}</h2>
    </div>
    <div class=\"owl\">
      <div class=\"owl-carousel owl-theme\">

         {{ rows }}

      </div>
    </div>

  </section>
", "themes/custom/cfc/templates/view/news/views-view--news--block-2.html.twig", "C:\\laragon\\www\\cfc_2026\\themes\\custom\\cfc\\templates\\view\\news\\views-view--news--block-2.html.twig");
    }
    
    public function checkSecurity()
    {
        static $tags = [];
        static $filters = ["t" => 17, "escape" => 22];
        static $functions = [];

        try {
            $this->sandbox->checkSecurity(
                [],
                ['t', 'escape'],
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
