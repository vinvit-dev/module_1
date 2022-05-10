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

";
        // line 7
        if (($context["cats"] ?? null)) {
            // line 8
            echo "  <h2 class=\"cat-list_title\">Cats list</h2>
";
        }
        // line 10
        echo "<section class=\"cat-list\">
  ";
        // line 11
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["cats"] ?? null));
        foreach ($context['_seq'] as $context["_key"] => $context["cat"]) {
            // line 12
            echo "    <div class=\"cat\">
      <a href=\"";
            // line 13
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, $context["cat"], "cat_image", [], "any", false, false, true, 13), 13, $this->source), "html", null, true);
            echo "\" class=\"cat-img-link\">
        <img src=\"";
            // line 14
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, $context["cat"], "cat_image", [], "any", false, false, true, 14), 14, $this->source), "html", null, true);
            echo "\" alt=\"";
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, $context["cat"], "cat_name", [], "any", false, false, true, 14), 14, $this->source), "html", null, true);
            echo "-image\" width=\"300px\" class=\"cat_image\">
      </a>
      <div class=\"sec-col\">
        <div class=\"cat-data\">
          <div class=\"cat-name\">";
            // line 18
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, $context["cat"], "cat_name", [], "any", false, false, true, 18), 18, $this->source), "html", null, true);
            echo "</div>
          <div class=\"cat-email\">";
            // line 19
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, $context["cat"], "email", [], "any", false, false, true, 19), 19, $this->source), "html", null, true);
            echo "</div>
          <div class=\"cat-date\">";
            // line 20
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, $context["cat"], "date", [], "any", false, false, true, 20), 20, $this->source), "html", null, true);
            echo "</div>
        </div>
        ";
            // line 22
            if (twig_get_attribute($this->env, $this->source, ($context["user"] ?? null), "hasPermission", [0 => "access to edit cats list"], "method", false, false, true, 22)) {
                // line 23
                echo "          <div class=\"cat-actions\">
            <a class=\"use-ajax edit\" data-dialog-type=\"modal\" href=\"/vinvit/cats/edit/";
                // line 24
                echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, $context["cat"], "id", [], "any", false, false, true, 24), 24, $this->source), "html", null, true);
                echo "\">Edit</a>
            <a class=\"use-ajax delete\" data-dialog-type=\"modal\" href=\"/vinvit/cats/delete/";
                // line 25
                echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, $context["cat"], "id", [], "any", false, false, true, 25), 25, $this->source), "html", null, true);
                echo "\">Delete</a>
          </div>
        ";
            }
            // line 28
            echo "      </div>
    </div>
  ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['cat'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 31
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
        return array (  117 => 31,  109 => 28,  103 => 25,  99 => 24,  96 => 23,  94 => 22,  89 => 20,  85 => 19,  81 => 18,  72 => 14,  68 => 13,  65 => 12,  61 => 11,  58 => 10,  54 => 8,  52 => 7,  46 => 4,  39 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("<p class=\"page-description\">{{ markup }}</p>

<section class=\"add_cats_form\">
  {{ add_form }}
</section>

{% if cats %}
  <h2 class=\"cat-list_title\">Cats list</h2>
{% endif %}
<section class=\"cat-list\">
  {% for cat in cats %}
    <div class=\"cat\">
      <a href=\"{{ cat.cat_image }}\" class=\"cat-img-link\">
        <img src=\"{{ cat.cat_image }}\" alt=\"{{ cat.cat_name }}-image\" width=\"300px\" class=\"cat_image\">
      </a>
      <div class=\"sec-col\">
        <div class=\"cat-data\">
          <div class=\"cat-name\">{{ cat.cat_name }}</div>
          <div class=\"cat-email\">{{ cat.email }}</div>
          <div class=\"cat-date\">{{ cat.date }}</div>
        </div>
        {% if user.hasPermission('access to edit cats list') %}
          <div class=\"cat-actions\">
            <a class=\"use-ajax edit\" data-dialog-type=\"modal\" href=\"/vinvit/cats/edit/{{ cat.id }}\">Edit</a>
            <a class=\"use-ajax delete\" data-dialog-type=\"modal\" href=\"/vinvit/cats/delete/{{ cat.id }}\">Delete</a>
          </div>
        {% endif %}
      </div>
    </div>
  {% endfor %}
</section>
", "themes/custom/cats/templates/vinvit/cats.html.twig", "/var/www/module1/web/themes/custom/cats/templates/vinvit/cats.html.twig");
    }
    
    public function checkSecurity()
    {
        static $tags = array("if" => 7, "for" => 11);
        static $filters = array("escape" => 1);
        static $functions = array();

        try {
            $this->sandbox->checkSecurity(
                ['if', 'for'],
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
