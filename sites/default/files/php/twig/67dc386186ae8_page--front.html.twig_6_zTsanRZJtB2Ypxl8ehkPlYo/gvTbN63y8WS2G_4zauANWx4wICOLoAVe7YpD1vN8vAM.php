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

/* themes/custom/cfc/templates/system/page--front.html.twig */
class __TwigTemplate_d58209a2578c5dc19b64bfa66e1aea28 extends Template
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
        yield from $this->loadTemplate("@cfc/partials/header.html.twig", "themes/custom/cfc/templates/system/page--front.html.twig", 49)->unwrap()->yield($context);
        // line 50
        yield "
<main
\tid=\"main-content\">

\t";
        // line 55
        yield "\t";
        yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, Drupal\twig_tweak\TwigTweakExtension::drupalEntity("block", "cfc_hpslider"), "html", null, true);
        yield "

\t";
        // line 57
        yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, Drupal\twig_tweak\TwigTweakExtension::drupalEntity("block", "cfc_videobannerhp"), "html", null, true);
        yield "

\t";
        // line 59
        yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, Drupal\twig_tweak\TwigTweakExtension::drupalEntity("block", "cfc_cfcataglance"), "html", null, true);
        yield "

\t";
        // line 61
        yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, Drupal\twig_tweak\TwigTweakExtension::drupalEntity("block", "cfc_cfcanaturalmagnetforregionalinvestment"), "html", null, true);
        yield "
\t";
        // line 62
        yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, views_embed_view("country_list", "block_1"), "html", null, true);
        yield "
\t";
        // line 63
        yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, Drupal\twig_tweak\TwigTweakExtension::drupalEntity("block", "cfc_unlockthepotentialofafrica"), "html", null, true);
        yield "
\t";
        // line 65
        yield "\t<!-- Modal structure for showing country facts sheet -->
\t<div class=\"showing_modal_pop_up\" id=\"member-modal\" style=\"display: none;\">
    <div class=\"modal-content\">
\t\t\t<span class=\"close\">&times;</span>
\t\t\t<h2>Access the country facts sheet</h2>
\t\t\t<p>If you are a CFC member, please enter your access code:</p>
\t\t\t<div class=\"modal__flixible\">
\t\t\t\t<input type=\"password\" id=\"access-password\" placeholder=\"Access password\">
\t\t\t\t<button id=\"download-btn\" >
\t\t\t\t\t<a id=\"download-link\" href=\"\" target=\"_blank\" download>Download
\t\t\t\t\t\t<svg xmlns=\"http://www.w3.org/2000/svg\" width=\"20\" height=\"27\" viewbox=\"0 0 20 27\" fill=\"none\">
\t\t\t\t\t\t\t<path d=\"M11.0605 26.5452C10.7792 26.8264 10.3978 26.9844 10 26.9844C9.60228 26.9844 9.22082 26.8264 8.93953 26.5452L0.454026 18.0597C0.310761 17.9213 0.196488 17.7558 0.117874 17.5728C0.0392605 17.3898 -0.00211889 17.193 -0.00384962 16.9938C-0.00558034 16.7946 0.0323726 16.5971 0.107794 16.4128C0.183215 16.2284 0.294595 16.0609 0.435434 15.9201C0.576273 15.7793 0.74375 15.6679 0.928095 15.5925C1.11244 15.517 1.30996 15.4791 1.50913 15.4808C1.7083 15.4825 1.90513 15.5239 2.08813 15.6025C2.27114 15.6812 2.43666 15.7954 2.57503 15.9387L8.50003 21.8637L8.50003 1.9992C8.50003 1.60137 8.65806 1.21984 8.93937 0.938534C9.22067 0.65723 9.6022 0.499195 10 0.499195C10.3979 0.499195 10.7794 0.65723 11.0607 0.938534C11.342 1.21984 11.5 1.60137 11.5 1.9992L11.5 21.8637L17.425 15.9387C17.7079 15.6655 18.0868 15.5143 18.4801 15.5177C18.8734 15.5211 19.2496 15.6789 19.5278 15.957C19.8059 16.2351 19.9636 16.6113 19.967 17.0046C19.9705 17.3979 19.8193 17.7768 19.546 18.0597L11.0605 26.5452Z\" fill=\"#007565\"/>
\t\t\t\t\t\t</svg>
\t\t\t\t\t</a>
\t\t\t\t</button>
\t\t\t</div>
\t\t\t<p id=\"error-message\" style=\"display: none; color: red;\">";
        // line 81
        yield $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar(t("Wrong password, please try again."));
        yield "</p>
\t\t\t<div class=\"wrapper-text-click\" id=\"not-member-btn\">
\t\t\t\t";
        // line 83
        yield $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar(t("I’m not a CFC member"));
        yield "
\t\t\t</div>
\t\t</div>
\t</div>

\t<!-- Non-Member Modal -->
\t<div class=\"showing_modal_pop_up\" id=\"non-member-modal\" style=\"display: none;\">
\t\t<div class=\"modal-content\">
\t\t\t<span class=\"close\">&times;</span>
\t\t\t<h2>Access the country facts sheet</h2>
\t\t\t<p>If you are not a CFC member, please enter your details:</p>
\t\t\t<div class=\"modal__flixible\">
\t\t\t<div class=\"form__formualaire\">
\t\t\t\t\t\t";
        // line 100
        yield "                     ";
        yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, Drupal\twig_tweak\TwigTweakExtension::drupalEntity("block", "cfc_webform_3"), "html", null, true);
        yield "
\t\t\t\t\t</div>
\t\t\t</div>
\t\t\t<div class=\"wrapper-text-click\" id=\"already-member-btn\">
\t\t\t\tI’m already a CFC member
\t\t\t</div>
\t\t</div>
\t</div>


\t<section class=\"investment african_insights\">
\t\t<div class=\"container\">
\t\t\t<div class=\"title-primary-sc mb-3\">
\t\t\t\t<h2>";
        // line 113
        yield $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar(t("Stay updated with African insights"));
        yield "</h2>
\t\t\t\t<div class=\"paragraph--african_insights\">
\t\t\t\t\t<p>
\t\t\t\t\t\t";
        // line 116
        yield $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar(t("Access up-to-date information on Africas markets and data, uncover business opportunities through country
            fact sheets, news, sector reports, expert insights, articles, and podcasts."));
        // line 117
        yield "
\t\t\t\t\t</p>
\t\t\t\t</div>
\t\t\t</div>

\t\t\t";
        // line 122
        yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, Drupal\twig_tweak\TwigTweakExtension::drupalEntity("block", "cfc_stayupdatedwithafricaninsights"), "html", null, true);
        yield "

\t\t</div>
\t</section>
\t";
        // line 127
        yield "\t";
        yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, Drupal\twig_tweak\TwigTweakExtension::drupalEntity("block", "cfc_moroccoanafricanpioneerandatrustedpartnerforgrowth"), "html", null, true);
        yield "
\t";
        // line 128
        yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, Drupal\twig_tweak\TwigTweakExtension::drupalEntity("block", "cfc_areyoueligibletogetthecfcstatus"), "html", null, true);
        yield "


\t";
        // line 132
        yield "
\t";
        // line 133
        yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, views_embed_view("news", "block_2"), "html", null, true);
        yield "


\t";
        // line 154
        yield "
</main>
";
        // line 156
        yield from $this->loadTemplate("@cfc/partials/footer.html.twig", "themes/custom/cfc/templates/system/page--front.html.twig", 156)->unwrap()->yield($context);
        yield from [];
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName(): string
    {
        return "themes/custom/cfc/templates/system/page--front.html.twig";
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
        return array (  186 => 156,  182 => 154,  176 => 133,  173 => 132,  167 => 128,  162 => 127,  155 => 122,  148 => 117,  145 => 116,  139 => 113,  122 => 100,  106 => 83,  101 => 81,  83 => 65,  79 => 63,  75 => 62,  71 => 61,  66 => 59,  61 => 57,  55 => 55,  49 => 50,  47 => 49,  44 => 48,);
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
* \"/\" unless you have installed Drupal in a sub-directory.
* - is_front: A flag indicating if the current page is the front page.
* - logged_in: A flag indicating if the user is registered and signed in.
* - is_admin: A flag indicating if the user has permission to access
* administration pages.
*
* Site identity:
* - front_page: The URL of the front page. Use this instead of base_path when
* linking to the front page. This includes the language domain or prefix.
*
* Page content (in order of occurrence in the default page.html.twig):
* - messages: Status and error messages. Should be displayed prominently.
* - node: Fully loaded node, if there is an automatically-loaded node
* associated with the page and the node ID is the second argument in the
* page's path (e.g. node/12345 and node/12345/revisions, but not
* comment/reply/12345).
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

<main
\tid=\"main-content\">

\t{#  #}
\t{{ drupal_entity('block','cfc_hpslider') }}

\t{{ drupal_entity('block','cfc_videobannerhp') }}

\t{{ drupal_entity('block','cfc_cfcataglance') }}

\t{{ drupal_entity('block','cfc_cfcanaturalmagnetforregionalinvestment') }}
\t{{ drupal_view('country_list','block_1') }}
\t{{ drupal_entity('block','cfc_unlockthepotentialofafrica') }}
\t{#  #}
\t<!-- Modal structure for showing country facts sheet -->
\t<div class=\"showing_modal_pop_up\" id=\"member-modal\" style=\"display: none;\">
    <div class=\"modal-content\">
\t\t\t<span class=\"close\">&times;</span>
\t\t\t<h2>Access the country facts sheet</h2>
\t\t\t<p>If you are a CFC member, please enter your access code:</p>
\t\t\t<div class=\"modal__flixible\">
\t\t\t\t<input type=\"password\" id=\"access-password\" placeholder=\"Access password\">
\t\t\t\t<button id=\"download-btn\" >
\t\t\t\t\t<a id=\"download-link\" href=\"\" target=\"_blank\" download>Download
\t\t\t\t\t\t<svg xmlns=\"http://www.w3.org/2000/svg\" width=\"20\" height=\"27\" viewbox=\"0 0 20 27\" fill=\"none\">
\t\t\t\t\t\t\t<path d=\"M11.0605 26.5452C10.7792 26.8264 10.3978 26.9844 10 26.9844C9.60228 26.9844 9.22082 26.8264 8.93953 26.5452L0.454026 18.0597C0.310761 17.9213 0.196488 17.7558 0.117874 17.5728C0.0392605 17.3898 -0.00211889 17.193 -0.00384962 16.9938C-0.00558034 16.7946 0.0323726 16.5971 0.107794 16.4128C0.183215 16.2284 0.294595 16.0609 0.435434 15.9201C0.576273 15.7793 0.74375 15.6679 0.928095 15.5925C1.11244 15.517 1.30996 15.4791 1.50913 15.4808C1.7083 15.4825 1.90513 15.5239 2.08813 15.6025C2.27114 15.6812 2.43666 15.7954 2.57503 15.9387L8.50003 21.8637L8.50003 1.9992C8.50003 1.60137 8.65806 1.21984 8.93937 0.938534C9.22067 0.65723 9.6022 0.499195 10 0.499195C10.3979 0.499195 10.7794 0.65723 11.0607 0.938534C11.342 1.21984 11.5 1.60137 11.5 1.9992L11.5 21.8637L17.425 15.9387C17.7079 15.6655 18.0868 15.5143 18.4801 15.5177C18.8734 15.5211 19.2496 15.6789 19.5278 15.957C19.8059 16.2351 19.9636 16.6113 19.967 17.0046C19.9705 17.3979 19.8193 17.7768 19.546 18.0597L11.0605 26.5452Z\" fill=\"#007565\"/>
\t\t\t\t\t\t</svg>
\t\t\t\t\t</a>
\t\t\t\t</button>
\t\t\t</div>
\t\t\t<p id=\"error-message\" style=\"display: none; color: red;\">{{'Wrong password, please try again.'|t}}</p>
\t\t\t<div class=\"wrapper-text-click\" id=\"not-member-btn\">
\t\t\t\t{{'I’m not a CFC member'|t}}
\t\t\t</div>
\t\t</div>
\t</div>

\t<!-- Non-Member Modal -->
\t<div class=\"showing_modal_pop_up\" id=\"non-member-modal\" style=\"display: none;\">
\t\t<div class=\"modal-content\">
\t\t\t<span class=\"close\">&times;</span>
\t\t\t<h2>Access the country facts sheet</h2>
\t\t\t<p>If you are not a CFC member, please enter your details:</p>
\t\t\t<div class=\"modal__flixible\">
\t\t\t<div class=\"form__formualaire\">
\t\t\t\t\t\t{# <input type=\"text\" id=\"first_name\" placeholder=\"First name\">
\t\t\t\t\t\t<input type=\"text\" id=\"last_name\" placeholder=\"Last name\">
\t\t\t\t\t\t<input type=\"text\" id=\"company_item\" placeholder=\"Company\">
\t\t\t\t\t\t<input type=\"email\" id=\"email-address\" placeholder=\"Email address\"> #}
                     {{ drupal_entity('block','cfc_webform_3') }}
\t\t\t\t\t</div>
\t\t\t</div>
\t\t\t<div class=\"wrapper-text-click\" id=\"already-member-btn\">
\t\t\t\tI’m already a CFC member
\t\t\t</div>
\t\t</div>
\t</div>


\t<section class=\"investment african_insights\">
\t\t<div class=\"container\">
\t\t\t<div class=\"title-primary-sc mb-3\">
\t\t\t\t<h2>{{'Stay updated with African insights'|t }}</h2>
\t\t\t\t<div class=\"paragraph--african_insights\">
\t\t\t\t\t<p>
\t\t\t\t\t\t{{'Access up-to-date information on Africas markets and data, uncover business opportunities through country
            fact sheets, news, sector reports, expert insights, articles, and podcasts.'|t }}
\t\t\t\t\t</p>
\t\t\t\t</div>
\t\t\t</div>

\t\t\t{{ drupal_entity('block','cfc_stayupdatedwithafricaninsights') }}

\t\t</div>
\t</section>
\t{# Unlock the potential of Africa #}
\t{{ drupal_entity('block','cfc_moroccoanafricanpioneerandatrustedpartnerforgrowth') }}
\t{{ drupal_entity('block','cfc_areyoueligibletogetthecfcstatus') }}


\t{# {{ drupal_view('country_list','block_1') }} #}

\t{{ drupal_view('news','block_2') }}


\t{# <section class=\"contact---us\" id=\"contact---us\">
\t\t<div
\t\t\tclass=\"contact-container\">
\t\t\t<!-- Left Form Section -->
\t\t\t<div class=\"contact-form\">
\t\t\t\t<h3>{{'I am interested in getting in touch with Casablanca Finance City'|t}}</h3>

\t\t\t\t<div class=\"web__form_dr\">
\t\t\t\t            {{ drupal_entity('block','cfc_webform') }}
\t\t\t\t</div>
\t\t\t</div>

\t\t\t<!-- Right Image Section -->
\t\t\t<div class=\"contact-image\">
\t\t\t\t<img src=\"/themes/custom/cfc/CFC/assets/images/contatc-img.png\" alt=\"Office\"/>
\t\t\t</div>
\t\t</div>
\t</section> #}

</main>
{% include \"@cfc/partials/footer.html.twig\" %}
", "themes/custom/cfc/templates/system/page--front.html.twig", "C:\\laragon\\www\\cfc_2026\\themes\\custom\\cfc\\templates\\system\\page--front.html.twig");
    }
    
    public function checkSecurity()
    {
        static $tags = ["include" => 49];
        static $filters = ["escape" => 55, "t" => 81];
        static $functions = ["drupal_entity" => 55, "drupal_view" => 62];

        try {
            $this->sandbox->checkSecurity(
                ['include'],
                ['escape', 't'],
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
