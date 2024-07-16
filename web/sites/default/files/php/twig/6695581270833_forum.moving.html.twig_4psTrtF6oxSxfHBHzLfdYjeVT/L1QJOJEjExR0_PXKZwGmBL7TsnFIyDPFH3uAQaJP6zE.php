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

/* @help_topics/forum.moving.html.twig */
class __TwigTemplate_17786141deeac841e4cbc74a51c96517 extends Template
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
        $this->sandbox = $this->env->getExtension(SandboxExtension::class);
        $this->checkSecurity();
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 6
        $context["index_link_text"] = ('' === $tmp = \Twig\Extension\CoreExtension::captureOutput((function () use (&$context, $macros, $blocks) {
            yield t("Forums", array());
            return; yield '';
        })())) ? '' : new Markup($tmp, $this->env->getCharset());
        // line 7
        $context["index_link"] = $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar($this->extensions['Drupal\help\HelpTwigExtension']->getRouteLink($this->sandbox->ensureToStringAllowed(($context["index_link_text"] ?? null), 7, $this->source), "forum.index"));
        // line 8
        yield "<h2>";
        yield t("Goal", array());
        yield "</h2>
<p>";
        // line 9
        yield t("Move a forum topic and all of its comments to a new forum.", array());
        yield "</p>
<h2>";
        // line 10
        yield t("Steps", array());
        yield "</h2>
<ol>
  <li>";
        // line 12
        yield t("Starting from @index_link (path: <em>/forums</em>), navigate to the forum that currently contains the topic.", array("@index_link" => ($context["index_link"] ?? null), ));
        yield "</li>
  <li>";
        // line 13
        yield t("Locate the topic within the forum, and click on the title to view the topic.", array());
        yield "</li>
  <li>";
        // line 14
        yield t("Click <em>Edit</em>.", array());
        yield "</li>
  <li>";
        // line 15
        yield t("In the <em>Forums</em> field, select the new forum that you want the topic to move to.", array());
        yield "</li>
  <li>";
        // line 16
        yield t("Check <em>Leave shadow copy</em> to create a link in the original forum pointing to the new location.", array());
        yield "</li>
  <li>";
        // line 17
        yield t("Click <em>Save</em>.", array());
        yield "</li>
</ol>";
        return; yield '';
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName()
    {
        return "@help_topics/forum.moving.html.twig";
    }

    /**
     * @codeCoverageIgnore
     */
    public function isTraitable()
    {
        return false;
    }

    /**
     * @codeCoverageIgnore
     */
    public function getDebugInfo()
    {
        return array (  81 => 17,  77 => 16,  73 => 15,  69 => 14,  65 => 13,  61 => 12,  56 => 10,  52 => 9,  47 => 8,  45 => 7,  40 => 6,);
    }

    public function getSourceContext()
    {
        return new Source("", "@help_topics/forum.moving.html.twig", "/opt/drupal/web/modules/contrib/forum/help_topics/forum.moving.html.twig");
    }
    
    public function checkSecurity()
    {
        static $tags = array("set" => 6, "trans" => 6);
        static $filters = array("escape" => 12);
        static $functions = array("render_var" => 7, "help_route_link" => 7);

        try {
            $this->sandbox->checkSecurity(
                ['set', 'trans'],
                ['escape'],
                ['render_var', 'help_route_link'],
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
