<?php

/* partials/nav.html.twig */
class __TwigTemplate_cc2eadc54a5dac0294687f7bfb545110466130f44d553a1cd7ad488c7348afb2 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 1
        if ($this->env->getExtension('Grav\Common\Twig\TwigExtension')->authorize(array(0 => "admin.login", 1 => "admin.super"))) {
            // line 2
            echo "    <nav id=\"admin-sidebar\" data-quickopen=\"";
            echo ((($this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute(($context["config"] ?? null), "plugins", array()), "admin", array()), "sidebar", array()), "activate", array()) == "hover")) ? ("true") : ("false"));
            echo "\" data-quickopen-delay=\"";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute(($context["config"] ?? null), "plugins", array()), "admin", array()), "sidebar", array()), "hover_delay", array()), "html", null, true);
            echo "\">
        ";
            // line 3
            if (($this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute(($context["config"] ?? null), "plugins", array()), "admin", array()), "sidebar", array()), "activate", array()) != "hover")) {
                // line 4
                echo "            <div id=\"open-handle\" data-sidebar-toggle><i class=\"fa fa-angle-double-right\"></i></div>
        ";
            }
            // line 6
            echo "
        <div id=\"admin-logo\">
            ";
            // line 8
            $this->loadTemplate("partials/logo.html.twig", "partials/nav.html.twig", 8)->display($context);
            // line 9
            echo "        </div>

        ";
            // line 11
            $this->loadTemplate("partials/nav-user-details.html.twig", "partials/nav.html.twig", 11)->display($context);
            // line 12
            echo "
        <div class=\"admin-menu-wrapper\">
            <ul id=\"admin-menu\">
                <li class=\"";
            // line 15
            echo (((($context["location"] ?? null) == "dashboard")) ? ("selected") : (""));
            echo "\">
                    <a href=\"";
            // line 16
            echo twig_escape_filter($this->env, ($context["base_url_relative"] ?? null), "html", null, true);
            echo "\"><i class=\"fa fa-fw fa-th\"></i><em>";
            echo twig_escape_filter($this->env, $this->env->getExtension('Grav\Plugin\Admin\AdminTwigExtension')->tuFilter("PLUGIN_ADMIN.DASHBOARD"), "html", null, true);
            echo "</em></a>
                </li>
                ";
            // line 18
            if ($this->env->getExtension('Grav\Common\Twig\TwigExtension')->authorize(array(0 => "admin.configuration", 1 => "admin.super"))) {
                // line 19
                echo "                    <li class=\"";
                echo (((((($context["location"] ?? null) == "system") || (($context["location"] ?? null) == "site")) || (($context["location"] ?? null) == "config"))) ? ("selected") : (""));
                echo "\">
                        <a href=\"";
                // line 20
                echo twig_escape_filter($this->env, ($context["base_url_relative"] ?? null), "html", null, true);
                echo "/config/system\"><i class=\"fa fa-fw fa-wrench\"></i><em>";
                echo twig_escape_filter($this->env, $this->env->getExtension('Grav\Plugin\Admin\AdminTwigExtension')->tuFilter("PLUGIN_ADMIN.CONFIGURATION"), "html", null, true);
                echo "</em></a>
                    </li>
                ";
            }
            // line 23
            echo "                ";
            if ($this->env->getExtension('Grav\Common\Twig\TwigExtension')->authorize(array(0 => "admin.pages", 1 => "admin.super"))) {
                // line 24
                echo "                    <li class=\"";
                echo (((($context["location"] ?? null) == "pages")) ? ("selected") : (""));
                echo "\">
                        <a href=\"";
                // line 25
                echo twig_escape_filter($this->env, ($context["base_url_relative"] ?? null), "html", null, true);
                echo "/pages\">
                            <i class=\"fa fa-fw fa-file-text-o\"></i>
                            <em>";
                // line 27
                echo twig_escape_filter($this->env, $this->env->getExtension('Grav\Plugin\Admin\AdminTwigExtension')->tuFilter("PLUGIN_ADMIN.PAGES"), "html", null, true);
                echo "</em>
                            <span class=\"badges\">
                                <span class=\"badge count\">";
                // line 29
                echo twig_escape_filter($this->env, $this->getAttribute(($context["admin"] ?? null), "pagesCount", array()), "html", null, true);
                echo "</span>
                            </span>
                        </a>
                    </li>
                ";
            }
            // line 34
            echo "                ";
            if ($this->getAttribute($this->getAttribute(($context["grav"] ?? null), "twig", array()), "plugins_hooked_nav", array())) {
                // line 35
                echo "                    ";
                $context['_parent'] = $context;
                $context['_seq'] = twig_ensure_traversable($this->getAttribute($this->getAttribute(($context["grav"] ?? null), "twig", array()), "plugins_hooked_nav", array()));
                foreach ($context['_seq'] as $context["label"] => $context["item"]) {
                    // line 36
                    echo "                        ";
                    if ($this->env->getExtension('Grav\Common\Twig\TwigExtension')->authorize(array(0 => (($this->getAttribute($context["item"], "authorize", array())) ? ($this->getAttribute($context["item"], "authorize", array())) : (("admin." . (($this->getAttribute($context["item"], "location", array())) ? ($this->getAttribute($context["item"], "location", array())) : ($this->getAttribute($context["item"], "route", array())))))), 1 => "admin.super"))) {
                        // line 37
                        echo "                            <li class=\"";
                        echo (((($context["location"] ?? null) == (($this->getAttribute($context["item"], "location", array())) ? ($this->getAttribute($context["item"], "location", array())) : ($this->getAttribute($context["item"], "route", array()))))) ? ("selected") : (""));
                        echo "\">
                                <a href=\"";
                        // line 38
                        echo twig_escape_filter($this->env, ($context["base_url_relative"] ?? null), "html", null, true);
                        echo "/";
                        echo twig_escape_filter($this->env, (($this->getAttribute($context["item"], "route", array())) ? ($this->getAttribute($context["item"], "route", array())) : ($this->getAttribute($context["item"], "location", array()))), "html", null, true);
                        echo "\">
                                    <i class=\"fa fa-fw ";
                        // line 39
                        echo twig_escape_filter($this->env, $this->getAttribute($context["item"], "icon", array()), "html", null, true);
                        echo "\"></i>
                                    <em>";
                        // line 40
                        echo twig_escape_filter($this->env, $this->env->getExtension('Grav\Plugin\Admin\AdminTwigExtension')->tuFilter($context["label"]), "html", null, true);
                        echo "</em>
                                </a>
                            </li>
                        ";
                    }
                    // line 44
                    echo "                    ";
                }
                $_parent = $context['_parent'];
                unset($context['_seq'], $context['_iterated'], $context['label'], $context['item'], $context['_parent'], $context['loop']);
                $context = array_intersect_key($context, $_parent) + $_parent;
                // line 45
                echo "                ";
            }
            // line 46
            echo "                ";
            if ($this->env->getExtension('Grav\Common\Twig\TwigExtension')->authorize(array(0 => "admin.plugins", 1 => "admin.super"))) {
                // line 47
                echo "                    <li class=\"";
                echo (((($context["location"] ?? null) == "plugins")) ? ("selected") : (""));
                echo "\">
                        <a href=\"";
                // line 48
                echo twig_escape_filter($this->env, ($context["base_url_relative"] ?? null), "html", null, true);
                echo "/plugins\">
                            <i class=\"fa fa-fw fa-plug\"></i>
                            <em>";
                // line 50
                echo twig_escape_filter($this->env, $this->env->getExtension('Grav\Plugin\Admin\AdminTwigExtension')->tuFilter("PLUGIN_ADMIN.PLUGINS"), "html", null, true);
                echo "</em>
                            <span class=\"badges\">
                                <span class=\"badge updates\"></span>
                                <span class=\"badge count\">";
                // line 53
                echo twig_escape_filter($this->env, twig_length_filter($this->env, $this->getAttribute(($context["admin"] ?? null), "plugins", array())), "html", null, true);
                echo "</span>
                            </span>
                        </a>
                    </li>
                ";
            }
            // line 58
            echo "                ";
            if ($this->env->getExtension('Grav\Common\Twig\TwigExtension')->authorize(array(0 => "admin.themes", 1 => "admin.super"))) {
                // line 59
                echo "                    <li class=\"";
                echo (((($context["location"] ?? null) == "themes")) ? ("selected") : (""));
                echo "\">
                        <a href=\"";
                // line 60
                echo twig_escape_filter($this->env, ($context["base_url_relative"] ?? null), "html", null, true);
                echo "/themes\">
                            <i class=\"fa fa-fw fa-tint\"></i>
                            <em>";
                // line 62
                echo twig_escape_filter($this->env, $this->env->getExtension('Grav\Plugin\Admin\AdminTwigExtension')->tuFilter("PLUGIN_ADMIN.THEMES"), "html", null, true);
                echo "</em>
                            <span class=\"badges\">
                                <span class=\"badge updates\"></span>
                                <span class=\"badge count\">";
                // line 65
                echo twig_escape_filter($this->env, twig_length_filter($this->env, $this->getAttribute(($context["admin"] ?? null), "themes", array())), "html", null, true);
                echo "</span>
                            </span>
                        </a>
                    </li>
                ";
            }
            // line 70
            echo "                ";
            if ($this->env->getExtension('Grav\Common\Twig\TwigExtension')->authorize(array(0 => "admin.tools", 1 => "admin.super"))) {
                // line 71
                echo "                    <li class=\"";
                echo (((($context["location"] ?? null) == "tools")) ? ("selected") : (""));
                echo "\">
                        <a href=\"";
                // line 72
                echo twig_escape_filter($this->env, ($context["base_url_relative"] ?? null), "html", null, true);
                echo "/tools\">
                            <i class=\"fa fa-fw fa-briefcase\"></i>
                            <em>";
                // line 74
                echo twig_escape_filter($this->env, $this->env->getExtension('Grav\Plugin\Admin\AdminTwigExtension')->tuFilter("PLUGIN_ADMIN.TOOLS"), "html", null, true);
                echo "</em>
                        </a>
                    </li>
                ";
            }
            // line 78
            echo "
                ";
            // line 79
            try {
                $this->loadTemplate("nav-pro.html.twig", "partials/nav.html.twig", 79)->display($context);
            } catch (Twig_Error_Loader $e) {
                // ignore missing template
            }

            // line 80
            echo "
                <li>
                    <a href=\"";
            // line 82
            echo twig_escape_filter($this->env, $this->getAttribute(($context["uri"] ?? null), "addNonce", array(0 => (((($context["base_url_relative"] ?? null) . "/task") . $this->getAttribute($this->getAttribute(($context["config"] ?? null), "system", array()), "param_sep", array())) . "logout"), 1 => "logout-form", 2 => "logout-nonce"), "method"), "html", null, true);
            echo "\"><i class=\"fa fa-fw fa-sign-out\"></i><em>";
            echo twig_escape_filter($this->env, $this->env->getExtension('Grav\Plugin\Admin\AdminTwigExtension')->tuFilter("PLUGIN_ADMIN.LOGOUT"), "html", null, true);
            echo "</em></a>
                </li>
            </ul>
        </div>
    </nav>
";
        }
    }

    public function getTemplateName()
    {
        return "partials/nav.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  233 => 82,  229 => 80,  222 => 79,  219 => 78,  212 => 74,  207 => 72,  202 => 71,  199 => 70,  191 => 65,  185 => 62,  180 => 60,  175 => 59,  172 => 58,  164 => 53,  158 => 50,  153 => 48,  148 => 47,  145 => 46,  142 => 45,  136 => 44,  129 => 40,  125 => 39,  119 => 38,  114 => 37,  111 => 36,  106 => 35,  103 => 34,  95 => 29,  90 => 27,  85 => 25,  80 => 24,  77 => 23,  69 => 20,  64 => 19,  62 => 18,  55 => 16,  51 => 15,  46 => 12,  44 => 11,  40 => 9,  38 => 8,  34 => 6,  30 => 4,  28 => 3,  21 => 2,  19 => 1,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Twig_Source("", "partials/nav.html.twig", "/home/tchappui/sites/openclassmates.io/kikikoz/user/plugins/admin/themes/grav/templates/partials/nav.html.twig");
    }
}
