<?php

use Twig\Environment;
use Twig\Error\LoaderError;
use Twig\Error\RuntimeError;
use Twig\Extension\SandboxExtension;
use Twig\Markup;
use Twig\Sandbox\SecurityError;
use Twig\Sandbox\SecurityNotAllowedTagError;
use Twig\Sandbox\SecurityNotAllowedFilterError;
use Twig\Sandbox\SecurityNotAllowedFunctionError;
use Twig\Source;
use Twig\Template;

/* themes/custom/cats/templates/vinvit/cats.html.twig */
class __TwigTemplate_313c753080f506f600191970a068035074d8db53a936cec510c0f0d21eefbdcc extends \Twig\Template
{
    private $source;
    private $macros = [];

    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        $this->parent = false;

        $this->blocks = [
        ];
        $this->sandbox = $this->env->getExtension('\Twig\Extension\SandboxExtension');
        $this->checkSecurity();
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 1
        echo "<p class=\"page-description\">";
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["markup"] ?? null), 1, $this->source), "html", null, true);
        echo "</p>

<section class=\"add_cats_form\">
  ";
        // line 4
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["add_form"] ?? null), 4, $this->source), "html", null, true);
        echo "
</section>


<section class=\"cat-list\">
  <h2 cat-list_title>Cats list</h2>
  ";
        // line 10
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["cats"] ?? null));
        foreach ($context['_seq'] as $context["_key"] => $context["cat"]) {
            // line 11
            echo "    <div class=\"cat\">
      <img src=\"";
            // line 12
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, $context["cat"], "cat_image", [], "any", false, false, true, 12), 12, $this->source), "html", null, true);
            echo "\" alt=\"";
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, $context["cat"], "cat_name", [], "any", false, false, true, 12), 12, $this->source), "html", null, true);
            echo "-image\" width=\"300px\" class=\"cat_image\">
      <div class=\"cat_name\">";
            // line 13
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, $context["cat"], "cat_name", [], "any", false, false, true, 13), 13, $this->source), "html", null, true);
            echo "</div>
      <div class=\"email\">";
            // line 14
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, $context["cat"], "email", [], "any", false, false, true, 14), 14, $this->source), "html", null, true);
            echo "</div>
      <div class=\"date\">";
            // line 15
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, $context["cat"], "date", [], "any", false, false, true, 15), 15, $this->source), "html", null, true);
            echo "</div>
    </div>
  ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['cat'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 18
        echo "</section>
";
    }

    public function getTemplateName()
    {
        return "themes/custom/cats/templates/vinvit/cats.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  85 => 18,  76 => 15,  72 => 14,  68 => 13,  62 => 12,  59 => 11,  55 => 10,  46 => 4,  39 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("<p class=\"page-description\">{{ markup }}</p>

<section class=\"add_cats_form\">
  {{ add_form }}
</section>


<section class=\"cat-list\">
  <h2 cat-list_title>Cats list</h2>
  {% for cat in cats %}
    <div class=\"cat\">
      <img src=\"{{ cat.cat_image }}\" alt=\"{{ cat.cat_name }}-image\" width=\"300px\" class=\"cat_image\">
      <div class=\"cat_name\">{{ cat.cat_name }}</div>
      <div class=\"email\">{{ cat.email }}</div>
      <div class=\"date\">{{ cat.date }}</div>
    </div>
  {% endfor %}
</section>
", "themes/custom/cats/templates/vinvit/cats.html.twig", "/var/www/module1/web/themes/custom/cats/templates/vinvit/cats.html.twig");
    }
    
    public function checkSecurity()
    {
        static $tags = array("for" => 10);
        static $filters = array("escape" => 1);
        static $functions = array();

        try {
            $this->sandbox->checkSecurity(
                ['for'],
                ['escape'],
                []
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
