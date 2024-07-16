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

/* @help_topics/forum.configuring.html.twig */
class __TwigTemplate_46967fcece36f7c4d5977c20afabefc6 extends Template
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
        $context["forum_concept_topic"] = $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar($this->extensions['Drupal\help\HelpTwigExtension']->getTopicLink("forum.concept"));
        // line 7
        $context["settings_link_text"] = ('' === $tmp = \Twig\Extension\CoreExtension::captureOutput((function () use (&$context, $macros, $blocks) {
            yield t("Settings", array());
            return; yield '';
        })())) ? '' : new Markup($tmp, $this->env->getCharset());
        // line 8
        $context["settings_link"] = $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar($this->extensions['Drupal\help\HelpTwigExtension']->getRouteLink($this->sandbox->ensureToStringAllowed(($context["settings_link_text"] ?? null), 8, $this->source), "forum.settings"));
        // line 9
        $context["overview_link_text"] = ('' === $tmp = \Twig\Extension\CoreExtension::captureOutput((function () use (&$context, $macros, $blocks) {
            yield t("Forums", array());
            return; yield '';
        })())) ? '' : new Markup($tmp, $this->env->getCharset());
        // line 10
        $context["overview_link"] = $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar($this->extensions['Drupal\help\HelpTwigExtension']->getRouteLink($this->sandbox->ensureToStringAllowed(($context["overview_link_text"] ?? null), 10, $this->source), "forum.overview"));
        // line 11
        $context["index_link_text"] = ('' === $tmp = \Twig\Extension\CoreExtension::captureOutput((function () use (&$context, $macros, $blocks) {
            yield t("Forums", array());
            return; yield '';
        })())) ? '' : new Markup($tmp, $this->env->getCharset());
        // line 12
        $context["index_link"] = $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar($this->extensions['Drupal\help\HelpTwigExtension']->getRouteLink($this->sandbox->ensureToStringAllowed(($context["index_link_text"] ?? null), 12, $this->source), "forum.index"));
        // line 13
        yield "<h2>";
        yield t("Goal", array());
        yield "</h2>
<p>";
        // line 14
        yield t("Configure settings for forums, and set up forum structure.", array());
        yield "</p>
<h2>";
        // line 15
        yield t("Steps", array());
        yield "</h2>
<ol>
  <li>";
        // line 17
        yield t("In the <em>Manage</em> administrative menu, navigate to <em>Structure</em> &gt; <em>Forums</em> &gt; <em>@settings_link</em>.", array("@settings_link" => ($context["settings_link"] ?? null), ));
        yield "</li>
  <li>";
        // line 18
        yield t("Choose the desired settings for <em>Hot topic threshold</em>, <em>Topics per page</em>, and <em>Default order</em>. Click <em>Save configuration</em> if you have made any changes.", array());
        yield "</li>
  <li>";
        // line 19
        yield t("In the <em>Manage</em> administrative menu, navigate to <em>Structure</em> &gt; <em>@overview_link</em>.", array("@overview_link" => ($context["overview_link"] ?? null), ));
        yield "</li>
  <li>";
        // line 20
        yield t("Decide on the hierarchy of containers and forums you want for your site; see @forum_concept_topic for an overview of forum hierarchy.", array("@forum_concept_topic" => ($context["forum_concept_topic"] ?? null), ));
        yield "</li>
  <li>";
        // line 21
        yield t("Create the containers that you want in your forum hierarchy, starting at the top level, if any. To create a container, click <em>Add container</em>, enter the container name and optionally other settings, and click <em>Save</em>.", array());
        yield "</li>
  <li>";
        // line 22
        yield t("Create the forums that you want in your forum hierarchy, starting at the top level. To create a forum, click <em>Add forum</em> and enter the forum name. If your hierarchy has this forum inside a container or another forum, select the parent forum/container in the <em>Parent</em> field. Review and/or edit the other settings, and click <em>Save</em>.", array());
        yield "</li>
  <li>";
        // line 23
        yield t("Optionally, delete the provided <em>General discussion</em> forum, if you do not want this forum to be available on your site.", array());
        yield "</li>
  <li>";
        // line 24
        yield t("Review and/or edit the permissions related to forums. The administrative permission for editing the forum settings is in the <em>Forum</em> module section of the permissions page, and administrative permissions for editing the forum hierarchy are in the <em>Taxonomy</em> module section. The user permissions for creating forum topics are in the <em>Node</em> module section, and for commenting on topics are in the <em>Comment</em> module section.", array());
        yield "</li>
  <li>";
        // line 25
        yield t("Add links to the main <em>@index_link</em> page (path: <em>/forum</em>), and optionally to individual forum pages, to navigation menus on your site, so that users can find the forums.", array("@index_link" => ($context["index_link"] ?? null), ));
        yield "</li>
</ol>";
        return; yield '';
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName()
    {
        return "@help_topics/forum.configuring.html.twig";
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
        return array (  109 => 25,  105 => 24,  101 => 23,  97 => 22,  93 => 21,  89 => 20,  85 => 19,  81 => 18,  77 => 17,  72 => 15,  68 => 14,  63 => 13,  61 => 12,  56 => 11,  54 => 10,  49 => 9,  47 => 8,  42 => 7,  40 => 6,);
    }

    public function getSourceContext()
    {
        return new Source("", "@help_topics/forum.configuring.html.twig", "/opt/drupal/web/modules/contrib/forum/help_topics/forum.configuring.html.twig");
    }
    
    public function checkSecurity()
    {
        static $tags = array("set" => 6, "trans" => 7);
        static $filters = array("escape" => 17);
        static $functions = array("render_var" => 6, "help_topic_link" => 6, "help_route_link" => 8);

        try {
            $this->sandbox->checkSecurity(
                ['set', 'trans'],
                ['escape'],
                ['render_var', 'help_topic_link', 'help_route_link'],
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
