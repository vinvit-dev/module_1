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

/* modules/custom/vinvit/templates/cats-list.html.twig */
class __TwigTemplate_ff3fc29b3165e81a8e6f810eec93ccab14ce4ae80c7721265c66f781f22d1b40 extends \Twig\Template
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
<section class=\"cats-list-admin\">
  <table class=\"cats-list-table\">
    <tr>
      <th>Check</th>
      <th>Cat image</th>
      <th>Cat name</th>
      <th>Email</th>
      <th>Pub. date</th>
      <th>Edit</th>
      <th>Delete</th>
    </tr>
    ";
        // line 13
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["cats_list"] ?? null));
        foreach ($context['_seq'] as $context["_key"] => $context["cat"]) {
            // line 14
            echo "      <tr>
        <td>
          <input type=\"checkbox\" name=\"cat-selected\" data-id=\"";
            // line 16
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, $context["cat"], "id", [], "any", false, false, true, 16), 16, $this->source), "html", null, true);
            echo "\" class=\"cat-checkbox\">
        </td>
        <td>
          <a class=\"cat-image-link\" target=\"_blank\" href=\"";
            // line 19
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, $context["cat"], "cat_image", [], "any", false, false, true, 19), 19, $this->source), "html", null, true);
            echo "\">
            <img src=\"";
            // line 20
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, $context["cat"], "cat_image", [], "any", false, false, true, 20), 20, $this->source), "html", null, true);
            echo "\" alt=\"cat image\" class=\"cat-image\" width=\"100px\">
          </a>
        </td>
        <td>
          <p class=\"cat-name\" >";
            // line 24
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, $context["cat"], "cat_name", [], "any", false, false, true, 24), 24, $this->source), "html", null, true);
            echo "</p>
        </td>
        <td>
          <p class=\"cat-email\">";
            // line 27
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, $context["cat"], "email", [], "any", false, false, true, 27), 27, $this->source), "html", null, true);
            echo "</p>
        </td>
        <td>
          <p class=\"cat-pubdate\">";
            // line 30
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, $context["cat"], "date", [], "any", false, false, true, 30), 30, $this->source), "html", null, true);
            echo "</p>
        </td>
        <td>
          <a class=\"use-ajax edit\" data-dialog-type=\"modal\" href=\"/vinvit/cats/edit/";
            // line 33
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, $context["cat"], "id", [], "any", false, false, true, 33), 33, $this->source), "html", null, true);
            echo "\">Edit</a>
        </td>
        <td>
          <a class=\"use-ajax delete\" data-dialog-type=\"modal\" href=\"/vinvit/cats/delete/";
            // line 36
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, $context["cat"], "id", [], "any", false, false, true, 36), 36, $this->source), "html", null, true);
            echo "\">Delete</a>
        </td>
      </tr>
    ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['cat'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 40
        echo "  </table>
</section>
";
    }

    public function getTemplateName()
    {
        return "modules/custom/vinvit/templates/cats-list.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  114 => 40,  104 => 36,  98 => 33,  92 => 30,  86 => 27,  80 => 24,  73 => 20,  69 => 19,  63 => 16,  59 => 14,  55 => 13,  39 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("<p class=\"page-description\">{{ markup }}</p>
<section class=\"cats-list-admin\">
  <table class=\"cats-list-table\">
    <tr>
      <th>Check</th>
      <th>Cat image</th>
      <th>Cat name</th>
      <th>Email</th>
      <th>Pub. date</th>
      <th>Edit</th>
      <th>Delete</th>
    </tr>
    {% for cat in cats_list %}
      <tr>
        <td>
          <input type=\"checkbox\" name=\"cat-selected\" data-id=\"{{ cat.id }}\" class=\"cat-checkbox\">
        </td>
        <td>
          <a class=\"cat-image-link\" target=\"_blank\" href=\"{{ cat.cat_image }}\">
            <img src=\"{{ cat.cat_image }}\" alt=\"cat image\" class=\"cat-image\" width=\"100px\">
          </a>
        </td>
        <td>
          <p class=\"cat-name\" >{{ cat.cat_name }}</p>
        </td>
        <td>
          <p class=\"cat-email\">{{ cat.email }}</p>
        </td>
        <td>
          <p class=\"cat-pubdate\">{{ cat.date }}</p>
        </td>
        <td>
          <a class=\"use-ajax edit\" data-dialog-type=\"modal\" href=\"/vinvit/cats/edit/{{ cat.id }}\">Edit</a>
        </td>
        <td>
          <a class=\"use-ajax delete\" data-dialog-type=\"modal\" href=\"/vinvit/cats/delete/{{ cat.id }}\">Delete</a>
        </td>
      </tr>
    {% endfor %}
  </table>
</section>
", "modules/custom/vinvit/templates/cats-list.html.twig", "/var/www/module1/web/modules/custom/vinvit/templates/cats-list.html.twig");
    }
    
    public function checkSecurity()
    {
        static $tags = array("for" => 13);
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
