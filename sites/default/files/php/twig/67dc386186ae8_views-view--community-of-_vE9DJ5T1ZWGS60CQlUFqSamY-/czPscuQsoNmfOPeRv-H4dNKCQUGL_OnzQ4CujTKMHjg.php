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

/* themes/custom/cfc/templates/view/community_of_members/views-view--community-of-members--block.html.twig */
class __TwigTemplate_ccecb689704e85e2efc34675a14b1900 extends Template
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
        yield "\t\t\t<div class=\"members\">
  ";
        // line 15
        yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, ($context["rows"] ?? null), "html", null, true);
        yield "
\t\t\t\t";
        // line 27
        yield "\t\t\t\t";
        // line 182
        yield "\t\t\t</div>
";
        $this->env->getExtension('\Drupal\Core\Template\TwigExtension')
            ->checkDeprecations($context, ["rows"]);        yield from [];
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName(): string
    {
        return "themes/custom/cfc/templates/view/community_of_members/views-view--community-of-members--block.html.twig";
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
        return array (  57 => 182,  55 => 27,  51 => 15,  48 => 14,  44 => 11,);
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
\t\t\t<div class=\"members\">
  {{ rows }}
\t\t\t\t{# <div class=\"member\" data-country=\"United States\" data-category=\"multinational\">
\t\t\t\t\t<div class=\"img--pays-el\"><img src=\"./assets/images/l-1.png\"></div>
\t\t\t\t\t<div class=\"parnet--title\">Middle East & Africa 1<div class=\"link--arrow-ps\">
\t\t\t\t\t\t\t<a href=\"#\">
\t\t\t\t\t\t\t\t<svg xmlns=\"http://www.w3.org/2000/svg\" width=\"38\" height=\"38\" viewbox=\"0 0 38 38\" fill=\"none\">
\t\t\t\t\t\t\t\t\t<path d=\"M7.12477 20.5815H25.4693L18.3443 27.7065L20.5831 29.9453L31.5303 18.9981L20.5831 8.05098L18.3443 10.2898L25.4693 17.4148H7.12477V20.5815Z\" fill=\"#00677F\"/>
\t\t\t\t\t\t\t\t</svg>
\t\t\t\t\t\t\t</a>
\t\t\t\t\t\t</div>
\t\t\t\t\t</div>
\t\t\t\t</div> #}
\t\t\t\t{# <div class=\"member\" data-country=\"United States\" data-category=\"multinational\">
\t\t\t\t\t<div class=\"img--pays-el\"><img src=\"./assets/images/l-1.png\"></div>
\t\t\t\t\t<div class=\"parnet--title\">Middle East & Africa 2<div class=\"link--arrow-ps\">
\t\t\t\t\t\t\t<a href=\"#\">
\t\t\t\t\t\t\t\t<svg xmlns=\"http://www.w3.org/2000/svg\" width=\"38\" height=\"38\" viewbox=\"0 0 38 38\" fill=\"none\">
\t\t\t\t\t\t\t\t\t<path d=\"M7.12477 20.5815H25.4693L18.3443 27.7065L20.5831 29.9453L31.5303 18.9981L20.5831 8.05098L18.3443 10.2898L25.4693 17.4148H7.12477V20.5815Z\" fill=\"#00677F\"/>
\t\t\t\t\t\t\t\t</svg>
\t\t\t\t\t\t\t</a>
\t\t\t\t\t\t</div>
\t\t\t\t\t</div>
\t\t\t\t</div>

\t\t\t\t<div class=\"member\" data-country=\"Africa\" data-category=\"banks\">
\t\t\t\t\t<div class=\"img--pays-el\"><img src=\"./assets/images/l-2.png\"></div>
\t\t\t\t\t<div class=\"parnet--title\">Bank of Africa 3<div class=\"link--arrow-ps\">
\t\t\t\t\t\t\t<a href=\"#\">
\t\t\t\t\t\t\t\t<svg xmlns=\"http://www.w3.org/2000/svg\" width=\"38\" height=\"38\" viewbox=\"0 0 38 38\" fill=\"none\">
\t\t\t\t\t\t\t\t\t<path d=\"M7.12477 20.5815H25.4693L18.3443 27.7065L20.5831 29.9453L31.5303 18.9981L20.5831 8.05098L18.3443 10.2898L25.4693 17.4148H7.12477V20.5815Z\" fill=\"#00677F\"/>
\t\t\t\t\t\t\t\t</svg>
\t\t\t\t\t\t\t</a>
\t\t\t\t\t\t</div>
\t\t\t\t\t</div>
\t\t\t\t</div>
\t\t\t\t<div class=\"member\" data-country=\"France\" data-category=\"law\">
\t\t\t\t\t<div class=\"img--pays-el\"><img src=\"./assets/images/l-2.png\"></div>
\t\t\t\t\t<div class=\"parnet--title\">law dddd<div class=\"link--arrow-ps\">
\t\t\t\t\t\t\t<a href=\"#\">
\t\t\t\t\t\t\t\t<svg xmlns=\"http://www.w3.org/2000/svg\" width=\"38\" height=\"38\" viewbox=\"0 0 38 38\" fill=\"none\">
\t\t\t\t\t\t\t\t\t<path d=\"M7.12477 20.5815H25.4693L18.3443 27.7065L20.5831 29.9453L31.5303 18.9981L20.5831 8.05098L18.3443 10.2898L25.4693 17.4148H7.12477V20.5815Z\" fill=\"#00677F\"/>
\t\t\t\t\t\t\t\t</svg>
\t\t\t\t\t\t\t</a>
\t\t\t\t\t\t</div>
\t\t\t\t\t</div>
\t\t\t\t</div>
\t\t\t\t<div class=\"member\" data-country=\"United States\" data-category=\"law\">
\t\t\t\t\t<div class=\"img--pays-el\"><img src=\"./assets/images/l-3.png\"></div>
\t\t\t\t\t<div class=\"parnet--title\">Baker & McKenzie 4<div class=\"link--arrow-ps\">
\t\t\t\t\t\t\t<a href=\"#\">
\t\t\t\t\t\t\t\t<svg xmlns=\"http://www.w3.org/2000/svg\" width=\"38\" height=\"38\" viewbox=\"0 0 38 38\" fill=\"none\">
\t\t\t\t\t\t\t\t\t<path d=\"M7.12477 20.5815H25.4693L18.3443 27.7065L20.5831 29.9453L31.5303 18.9981L20.5831 8.05098L18.3443 10.2898L25.4693 17.4148H7.12477V20.5815Z\" fill=\"#00677F\"/>
\t\t\t\t\t\t\t\t</svg>
\t\t\t\t\t\t\t</a>
\t\t\t\t\t\t</div>
\t\t\t\t\t</div>
\t\t\t\t</div>
\t\t\t\t<div class=\"member\" data-country=\"France\" data-category=\"asset\">
\t\t\t\t\t<div class=\"img--pays-el\"><img src=\"./assets/images/l-4.png\"></div>
\t\t\t\t\t<div class=\"parnet--title\">Africa 50 5<div class=\"link--arrow-ps\">
\t\t\t\t\t\t\t<a href=\"#\">
\t\t\t\t\t\t\t\t<svg xmlns=\"http://www.w3.org/2000/svg\" width=\"38\" height=\"38\" viewbox=\"0 0 38 38\" fill=\"none\">
\t\t\t\t\t\t\t\t\t<path d=\"M7.12477 20.5815H25.4693L18.3443 27.7065L20.5831 29.9453L31.5303 18.9981L20.5831 8.05098L18.3443 10.2898L25.4693 17.4148H7.12477V20.5815Z\" fill=\"#00677F\"/>
\t\t\t\t\t\t\t\t</svg>
\t\t\t\t\t\t\t</a>
\t\t\t\t\t\t</div>
\t\t\t\t\t</div>
\t\t\t\t</div>
\t\t\t\t<div class=\"member\" data-country=\"United States\" data-category=\"multinational\">
\t\t\t\t\t<div class=\"img--pays-el\"><img src=\"./assets/images/l-5.png\"></div>
\t\t\t\t\t<div class=\"parnet--title\">The Boston Consulting Group 6<div class=\"link--arrow-ps\">
\t\t\t\t\t\t\t<a href=\"#\">
\t\t\t\t\t\t\t\t<svg xmlns=\"http://www.w3.org/2000/svg\" width=\"38\" height=\"38\" viewbox=\"0 0 38 38\" fill=\"none\">
\t\t\t\t\t\t\t\t\t<path d=\"M7.12477 20.5815H25.4693L18.3443 27.7065L20.5831 29.9453L31.5303 18.9981L20.5831 8.05098L18.3443 10.2898L25.4693 17.4148H7.12477V20.5815Z\" fill=\"#00677F\"/>
\t\t\t\t\t\t\t\t</svg>
\t\t\t\t\t\t\t</a>
\t\t\t\t\t\t</div>
\t\t\t\t\t</div>
\t\t\t\t</div>
\t\t\t\t<div class=\"member\" data-country=\"United States\" data-category=\"multinational\">
\t\t\t\t\t<div class=\"img--pays-el\"><img src=\"./assets/images/l-1.png\"></div>
\t\t\t\t\t<div class=\"parnet--title\">Middle East & Africa 7<div class=\"link--arrow-ps\">
\t\t\t\t\t\t\t<a href=\"#\">
\t\t\t\t\t\t\t\t<svg xmlns=\"http://www.w3.org/2000/svg\" width=\"38\" height=\"38\" viewbox=\"0 0 38 38\" fill=\"none\">
\t\t\t\t\t\t\t\t\t<path d=\"M7.12477 20.5815H25.4693L18.3443 27.7065L20.5831 29.9453L31.5303 18.9981L20.5831 8.05098L18.3443 10.2898L25.4693 17.4148H7.12477V20.5815Z\" fill=\"#00677F\"/>
\t\t\t\t\t\t\t\t</svg>
\t\t\t\t\t\t\t</a>
\t\t\t\t\t\t</div>
\t\t\t\t\t</div>
\t\t\t\t</div>
\t\t\t\t<div class=\"member\" data-country=\"United States\" data-category=\"multinational\">
\t\t\t\t\t<div class=\"img--pays-el\"><img src=\"./assets/images/l-1.png\"></div>
\t\t\t\t\t<div class=\"parnet--title\">Middle East & Africa 8<div class=\"link--arrow-ps\">
\t\t\t\t\t\t\t<a href=\"#\">
\t\t\t\t\t\t\t\t<svg xmlns=\"http://www.w3.org/2000/svg\" width=\"38\" height=\"38\" viewbox=\"0 0 38 38\" fill=\"none\">
\t\t\t\t\t\t\t\t\t<path d=\"M7.12477 20.5815H25.4693L18.3443 27.7065L20.5831 29.9453L31.5303 18.9981L20.5831 8.05098L18.3443 10.2898L25.4693 17.4148H7.12477V20.5815Z\" fill=\"#00677F\"/>
\t\t\t\t\t\t\t\t</svg>
\t\t\t\t\t\t\t</a>
\t\t\t\t\t\t</div>
\t\t\t\t\t</div>
\t\t\t\t</div>
\t\t\t\t<div class=\"member\" data-country=\"Africa\" data-category=\"banks\">
\t\t\t\t\t<div class=\"img--pays-el\"><img src=\"./assets/images/l-2.png\"></div>
\t\t\t\t\t<div class=\"parnet--title\">Bank of Africa 9<div class=\"link--arrow-ps\">
\t\t\t\t\t\t\t<a href=\"#\">
\t\t\t\t\t\t\t\t<svg xmlns=\"http://www.w3.org/2000/svg\" width=\"38\" height=\"38\" viewbox=\"0 0 38 38\" fill=\"none\">
\t\t\t\t\t\t\t\t\t<path d=\"M7.12477 20.5815H25.4693L18.3443 27.7065L20.5831 29.9453L31.5303 18.9981L20.5831 8.05098L18.3443 10.2898L25.4693 17.4148H7.12477V20.5815Z\" fill=\"#00677F\"/>
\t\t\t\t\t\t\t\t</svg>
\t\t\t\t\t\t\t</a>
\t\t\t\t\t\t</div>
\t\t\t\t\t</div>
\t\t\t\t</div>
\t\t\t\t<div class=\"member\" data-country=\"United States\" data-category=\"law\">
\t\t\t\t\t<div class=\"img--pays-el\"><img src=\"./assets/images/l-3.png\"></div>
\t\t\t\t\t<div class=\"parnet--title\">Baker & McKenzie 10<div class=\"link--arrow-ps\">
\t\t\t\t\t\t\t<a href=\"#\">
\t\t\t\t\t\t\t\t<svg xmlns=\"http://www.w3.org/2000/svg\" width=\"38\" height=\"38\" viewbox=\"0 0 38 38\" fill=\"none\">
\t\t\t\t\t\t\t\t\t<path d=\"M7.12477 20.5815H25.4693L18.3443 27.7065L20.5831 29.9453L31.5303 18.9981L20.5831 8.05098L18.3443 10.2898L25.4693 17.4148H7.12477V20.5815Z\" fill=\"#00677F\"/>
\t\t\t\t\t\t\t\t</svg>
\t\t\t\t\t\t\t</a>
\t\t\t\t\t\t</div>
\t\t\t\t\t</div>
\t\t\t\t</div>
\t\t\t\t<div class=\"member\" data-country=\"France\" data-category=\"asset\">
\t\t\t\t\t<div class=\"img--pays-el\"><img src=\"./assets/images/l-4.png\"></div>
\t\t\t\t\t<div class=\"parnet--title\">Africa 50 11<div class=\"link--arrow-ps\">
\t\t\t\t\t\t\t<a href=\"#\">
\t\t\t\t\t\t\t\t<svg xmlns=\"http://www.w3.org/2000/svg\" width=\"38\" height=\"38\" viewbox=\"0 0 38 38\" fill=\"none\">
\t\t\t\t\t\t\t\t\t<path d=\"M7.12477 20.5815H25.4693L18.3443 27.7065L20.5831 29.9453L31.5303 18.9981L20.5831 8.05098L18.3443 10.2898L25.4693 17.4148H7.12477V20.5815Z\" fill=\"#00677F\"/>
\t\t\t\t\t\t\t\t</svg>
\t\t\t\t\t\t\t</a>
\t\t\t\t\t\t</div>
\t\t\t\t\t</div>
\t\t\t\t</div>
\t\t\t\t<div class=\"member\" data-country=\"United States\" data-category=\"multinational\">
\t\t\t\t\t<div class=\"img--pays-el\"><img src=\"./assets/images/l-5.png\"></div>
\t\t\t\t\t<div class=\"parnet--title\">The Boston Consulting Group 12<div class=\"link--arrow-ps\">
\t\t\t\t\t\t\t<a href=\"#\">
\t\t\t\t\t\t\t\t<svg xmlns=\"http://www.w3.org/2000/svg\" width=\"38\" height=\"38\" viewbox=\"0 0 38 38\" fill=\"none\">
\t\t\t\t\t\t\t\t\t<path d=\"M7.12477 20.5815H25.4693L18.3443 27.7065L20.5831 29.9453L31.5303 18.9981L20.5831 8.05098L18.3443 10.2898L25.4693 17.4148H7.12477V20.5815Z\" fill=\"#00677F\"/>
\t\t\t\t\t\t\t\t</svg>
\t\t\t\t\t\t\t</a>
\t\t\t\t\t\t</div>
\t\t\t\t\t</div>
\t\t\t\t</div>
\t\t\t\t<div class=\"member\" data-country=\"United States\" data-category=\"services\">
\t\t\t\t\t<div class=\"img--pays-el\"><img src=\"./assets/images/l-6.png\"></div>
\t\t\t\t\t<div class=\"parnet--title\">Mastercard 13<div class=\"link--arrow-ps\">
\t\t\t\t\t\t\t<a href=\"#\">
\t\t\t\t\t\t\t\t<svg xmlns=\"http://www.w3.org/2000/svg\" width=\"38\" height=\"38\" viewbox=\"0 0 38 38\" fill=\"none\">
\t\t\t\t\t\t\t\t\t<path d=\"M7.12477 20.5815H25.4693L18.3443 27.7065L20.5831 29.9453L31.5303 18.9981L20.5831 8.05098L18.3443 10.2898L25.4693 17.4148H7.12477V20.5815Z\" fill=\"#00677F\"/>
\t\t\t\t\t\t\t\t</svg>
\t\t\t\t\t\t\t</a>
\t\t\t\t\t\t</div>
\t\t\t\t\t</div>
\t\t\t\t</div>
\t\t\t\t<div class=\"member\" data-country=\"United States\" data-category=\"services\">
\t\t\t\t\t<div class=\"img--pays-el\"><img src=\"./assets/images/l-7.png\"></div>
\t\t\t\t\t<div class=\"parnet--title\">Deloitte 14<div class=\"link--arrow-ps\">
\t\t\t\t\t\t\t<a href=\"#\">
\t\t\t\t\t\t\t\t<svg xmlns=\"http://www.w3.org/2000/svg\" width=\"38\" height=\"38\" viewbox=\"0 0 38 38\" fill=\"none\">
\t\t\t\t\t\t\t\t\t<path d=\"M7.12477 20.5815H25.4693L18.3443 27.7065L20.5831 29.9453L31.5303 18.9981L20.5831 8.05098L18.3443 10.2898L25.4693 17.4148H7.12477V20.5815Z\" fill=\"#00677F\"/>
\t\t\t\t\t\t\t\t</svg>
\t\t\t\t\t\t\t</a>
\t\t\t\t\t\t</div>
\t\t\t\t\t</div>
\t\t\t\t</div> #}
\t\t\t</div>
", "themes/custom/cfc/templates/view/community_of_members/views-view--community-of-members--block.html.twig", "C:\\laragon\\www\\cfc_2026\\themes\\custom\\cfc\\templates\\view\\community_of_members\\views-view--community-of-members--block.html.twig");
    }
    
    public function checkSecurity()
    {
        static $tags = [];
        static $filters = ["escape" => 15];
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
