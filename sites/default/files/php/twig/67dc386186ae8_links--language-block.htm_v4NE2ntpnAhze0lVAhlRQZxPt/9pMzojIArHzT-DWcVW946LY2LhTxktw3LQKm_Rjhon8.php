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

/* themes/custom/cfc/templates/language/links--language-block.html.twig */
class __TwigTemplate_74cd8586caf68507addc4db678c47426 extends Template
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
        // line 36
        yield "
";
        // line 68
        if (($context["links"] ?? null)) {
            // line 69
            yield "<button class=\"btn btn-secondary dropdown-toggle\" type=\"button\" data-bs-toggle=\"dropdown\" aria-expanded=\"false\">
\t\t";
            // line 70
            if ((($context["language_id"] ?? null) == "fr")) {
                // line 71
                yield "\t\t\t<img src=\"/themes/custom/cfc/CFC/assets/images/fr.png\" alt=\"French Flag\" style=\"width: 20px; height: 14px;\"/> Fr
\t\t";
            } elseif ((            // line 72
($context["language_id"] ?? null) == "en")) {
                // line 73
                yield "\t\t\t<img src=\"/themes/custom/cfc/CFC/assets/images/en.png\" alt=\"English Flag\" style=\"width: 20px; height: 14px;\"/> En
\t\t";
            } elseif ((            // line 74
($context["language_id"] ?? null) == "ar")) {
                // line 75
                yield "\t\t\t<img src=\"/themes/custom/cfc/CFC/assets/images/ar.png\" alt=\"Arabic Flag\" style=\"width: 20px; height: 14px;\"/> Ar
\t\t";
            } else {
                // line 77
                yield "\t\t\t";
                yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, ($context["language_name"] ?? null), "html", null, true);
                yield "
\t\t";
            }
            // line 79
            yield "\t\t";
            // line 89
            yield "\t</button>
\t<ul class=\"dropdown-menu\">
\t\t";
            // line 91
            $context['_parent'] = $context;
            $context['_seq'] = CoreExtension::ensureTraversable(($context["links"] ?? null));
            foreach ($context['_seq'] as $context["key"] => $context["item"]) {
                // line 92
                yield "\t\t\t";
                if (($context["key"] != ($context["language_id"] ?? null))) {
                    // line 93
                    yield "\t\t\t\t<li>
\t\t\t\t\t";
                    // line 94
                    if (($context["key"] == "fr")) {
                        // line 95
                        yield "\t\t\t\t\t\t<img src=\"/themes/custom/cfc/CFC/assets/images/fr.png\" alt=\"French Flag\" style=\"width: 20px; height: 14px;\"/> ";
                        yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, CoreExtension::getAttribute($this->env, $this->source, $context["item"], "link", [], "any", false, false, true, 95), "html", null, true);
                        yield "
\t\t\t\t\t";
                    } elseif ((                    // line 96
$context["key"] == "en")) {
                        // line 97
                        yield "\t\t\t\t\t\t<img src=\"/themes/custom/cfc/CFC/assets/images/en.png\" alt=\"English Flag\" style=\"width: 20px; height: 14px;\"/> ";
                        yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, CoreExtension::getAttribute($this->env, $this->source, $context["item"], "link", [], "any", false, false, true, 97), "html", null, true);
                        yield "
\t\t\t\t\t";
                    } elseif ((                    // line 98
$context["key"] == "ar")) {
                        // line 99
                        yield "\t\t\t\t\t\t<img src=\"/themes/custom/cfc/CFC/assets/images/ar.png\" alt=\"Arabic Flag\" style=\"width: 20px; height: 14px;\"/> ";
                        yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, CoreExtension::getAttribute($this->env, $this->source, $context["item"], "link", [], "any", false, false, true, 99), "html", null, true);
                        yield "
\t\t\t\t\t";
                    } else {
                        // line 101
                        yield "\t\t\t\t\t\t";
                        yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, CoreExtension::getAttribute($this->env, $this->source, $context["item"], "link", [], "any", false, false, true, 101), "html", null, true);
                        yield "
\t\t\t\t\t";
                    }
                    // line 103
                    yield "\t\t\t\t</li>
\t\t\t";
                }
                // line 105
                yield "\t\t";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['key'], $context['item'], $context['_parent']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 106
            yield "\t</ul>";
        }
        $this->env->getExtension('\Drupal\Core\Template\TwigExtension')
            ->checkDeprecations($context, ["links", "language_id", "language_name"]);        yield from [];
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName(): string
    {
        return "themes/custom/cfc/templates/language/links--language-block.html.twig";
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
        return array (  128 => 106,  122 => 105,  118 => 103,  112 => 101,  106 => 99,  104 => 98,  99 => 97,  97 => 96,  92 => 95,  90 => 94,  87 => 93,  84 => 92,  80 => 91,  76 => 89,  74 => 79,  68 => 77,  64 => 75,  62 => 74,  59 => 73,  57 => 72,  54 => 71,  52 => 70,  49 => 69,  47 => 68,  44 => 36,);
    }

    public function getSourceContext(): Source
    {
        return new Source("{#
/**
 * @file
 * Default theme implementation for a set of links.
 *
 * Available variables:
 * - attributes: Attributes for the UL containing the list of links.
 * - links: Links to be output.
 *   Each link will have the following elements:
 *   - link: (optional) A render array that returns a link. See
 *     template_preprocess_links() for details how it is generated.
 *   - text: The link text.
 *   - attributes: HTML attributes for the list item element.
 *   - text_attributes: (optional) HTML attributes for the span element if no
 *     'url' was supplied.
 * - heading: (optional) A heading to precede the links.
 *   - text: The heading text.
 *   - level: The heading level (e.g. 'h2', 'h3').
 *   - attributes: (optional) A keyed list of attributes for the heading.
 *   If the heading is a string, it will be used as the text of the heading and
 *   the level will default to 'h2'.
 *
 *   Headings should be used on navigation menus and any list of links that
 *   consistently appears on multiple pages. To make the heading invisible use
 *   the 'visually-hidden' CSS class. Do not use 'display:none', which
 *   removes it from screen readers and assistive technology. Headings allow
 *   screen reader and keyboard only users to navigate to or skip the links.
 *   See http://juicystudio.com/article/screen-readers-display-none.php and
 *   http://www.w3.org/TR/WCAG-TECHS/H42.html for more information.
 *
 * @see template_preprocess_links()
 *
 * @ingroup themeable
 */
#}

{# {% if links -%}
\t<button class=\"btn btn-secondary dropdown-toggle\" type=\"button\" data-bs-toggle=\"dropdown\" aria-expanded=\"false\">
\t\t{% if language_id == 'fr' %}
\t\t\tFr
\t\t{% elseif language_id == 'en' %}
\t\t\tEn
\t\t{% else %}
\t\t\t{{ language_name }}
\t\t{% endif %}
\t\t<svg xmlns=\"http://www.w3.org/2000/svg\" width=\"6\" height=\"6\" viewbox=\"0 0 6 6\" fill=\"none\">
\t\t\t<g clip-path=\"url(#clip0_48_134)\">
\t\t\t\t<path d=\"M4.14329 0.630312C4.30663 0.470313 4.49829 0.371979 4.71829 0.335313C4.92163 0.301979 5.11996 0.326146 5.31329 0.407813C5.50663 0.489479 5.66329 0.615313 5.78329 0.785313C5.90996 0.965312 5.97329 1.17031 5.97329 1.40031V4.24031C5.97329 4.43698 5.92496 4.61781 5.82829 4.78281C5.73163 4.94781 5.60079 5.07865 5.43579 5.17531C5.27079 5.27198 5.08996 5.32031 4.89329 5.32031H1.98829C1.75496 5.32031 1.54829 5.25531 1.36829 5.12531C1.19829 5.00531 1.07246 4.84615 0.990792 4.64781C0.909126 4.44948 0.886626 4.24865 0.923292 4.04531C0.963292 3.82531 1.06663 3.63365 1.23329 3.47031L4.14329 0.630312Z\" fill=\"white\"></path>
\t\t\t</g>
\t\t\t<defs>
\t\t\t\t<clipPath id=\"clip0_48_134\">
\t\t\t\t\t<rect width=\"5.08\" height=\"5\" fill=\"white\" transform=\"matrix(1 0 0 -1 0.90625 5.32031)\"></rect>
\t\t\t\t</clipPath>
\t\t\t</defs>
\t\t</svg>
\t</button>
\t<ul class=\"dropdown-menu\">
\t\t{% for key, item in links %}
\t\t\t{% if key != language_id %}
\t\t\t\t<li>
\t\t\t\t\t{{ item.link }}
\t\t\t\t</li>
\t\t\t{% endif %}
\t\t{% endfor %}

\t</ul>
{%- endif %} #}
{% if links -%}
\t<button class=\"btn btn-secondary dropdown-toggle\" type=\"button\" data-bs-toggle=\"dropdown\" aria-expanded=\"false\">
\t\t{% if language_id == 'fr' %}
\t\t\t<img src=\"/themes/custom/cfc/CFC/assets/images/fr.png\" alt=\"French Flag\" style=\"width: 20px; height: 14px;\"/> Fr
\t\t{% elseif language_id == 'en' %}
\t\t\t<img src=\"/themes/custom/cfc/CFC/assets/images/en.png\" alt=\"English Flag\" style=\"width: 20px; height: 14px;\"/> En
\t\t{% elseif language_id == 'ar' %}
\t\t\t<img src=\"/themes/custom/cfc/CFC/assets/images/ar.png\" alt=\"Arabic Flag\" style=\"width: 20px; height: 14px;\"/> Ar
\t\t{% else %}
\t\t\t{{ language_name }}
\t\t{% endif %}
\t\t{# <svg xmlns=\"http://www.w3.org/2000/svg\" width=\"6\" height=\"6\" viewbox=\"0 0 6 6\" fill=\"none\">
\t\t\t<g clip-path=\"url(#clip0_48_134)\">
\t\t\t\t<path d=\"M4.14329 0.630312C4.30663 0.470313 4.49829 0.371979 4.71829 0.335313C4.92163 0.301979 5.11996 0.326146 5.31329 0.407813C5.50663 0.489479 5.66329 0.615313 5.78329 0.785313C5.90996 0.965312 5.97329 1.17031 5.97329 1.40031V4.24031C5.97329 4.43698 5.92496 4.61781 5.82829 4.78281C5.73163 4.94781 5.60079 5.07865 5.43579 5.17531C5.27079 5.27198 5.08996 5.32031 4.89329 5.32031H1.98829C1.75496 5.32031 1.54829 5.25531 1.36829 5.12531C1.19829 5.00531 1.07246 4.84615 0.990792 4.64781C0.909126 4.44948 0.886626 4.24865 0.923292 4.04531C0.963292 3.82531 1.06663 3.63365 1.23329 3.47031L4.14329 0.630312Z\" fill=\"white\"></path>
\t\t\t</g>
\t\t\t<defs>
\t\t\t\t<clipPath id=\"clip0_48_134\">
\t\t\t\t\t<rect width=\"5.08\" height=\"5\" fill=\"white\" transform=\"matrix(1 0 0 -1 0.90625 5.32031)\"></rect>
\t\t\t\t</clipPath>
\t\t\t</defs>
\t\t</svg> #}
\t</button>
\t<ul class=\"dropdown-menu\">
\t\t{% for key, item in links %}
\t\t\t{% if key != language_id %}
\t\t\t\t<li>
\t\t\t\t\t{% if key == 'fr' %}
\t\t\t\t\t\t<img src=\"/themes/custom/cfc/CFC/assets/images/fr.png\" alt=\"French Flag\" style=\"width: 20px; height: 14px;\"/> {{ item.link }}
\t\t\t\t\t{% elseif key == 'en' %}
\t\t\t\t\t\t<img src=\"/themes/custom/cfc/CFC/assets/images/en.png\" alt=\"English Flag\" style=\"width: 20px; height: 14px;\"/> {{ item.link }}
\t\t\t\t\t{% elseif key == 'ar' %}
\t\t\t\t\t\t<img src=\"/themes/custom/cfc/CFC/assets/images/ar.png\" alt=\"Arabic Flag\" style=\"width: 20px; height: 14px;\"/> {{ item.link }}
\t\t\t\t\t{% else %}
\t\t\t\t\t\t{{ item.link }}
\t\t\t\t\t{% endif %}
\t\t\t\t</li>
\t\t\t{% endif %}
\t\t{% endfor %}
\t</ul>
{%- endif %}
", "themes/custom/cfc/templates/language/links--language-block.html.twig", "C:\\laragon\\www\\cfc_2026\\themes\\custom\\cfc\\templates\\language\\links--language-block.html.twig");
    }
    
    public function checkSecurity()
    {
        static $tags = ["if" => 68, "for" => 91];
        static $filters = ["escape" => 77];
        static $functions = [];

        try {
            $this->sandbox->checkSecurity(
                ['if', 'for'],
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
