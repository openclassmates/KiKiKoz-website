<?php

/* config.html.twig */
class __TwigTemplate_2e79a84946304b13894950bd29d4ad4c26caf9404a6b9a2f3d68755117772f57 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("partials/base.html.twig", "config.html.twig", 1);
        $this->blocks = array(
            'stylesheets' => array($this, 'block_stylesheets'),
            'javascripts' => array($this, 'block_javascripts'),
            'titlebar' => array($this, 'block_titlebar'),
            'content_top' => array($this, 'block_content_top'),
            'content' => array($this, 'block_content'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "partials/base.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 3
        $context["config_slug"] = $this->getAttribute(($context["uri"] ?? null), "basename", array());
        // line 4
        $context["isInfo"] = (($context["config_slug"] ?? null) == "info");
        // line 6
        $context["title"] = (($this->env->getExtension('Grav\Plugin\Admin\AdminTwigExtension')->tuFilter("PLUGIN_ADMIN.CONFIGURATION") . ": ") . $this->env->getExtension('Grav\Plugin\Admin\AdminTwigExtension')->tuFilter(("PLUGIN_ADMIN." . twig_upper_filter($this->env, ($context["config_slug"] ?? null)))));
        // line 8
        if ( !($context["isInfo"] ?? null)) {
            // line 9
            $context["data"] = $this->getAttribute(($context["admin"] ?? null), "data", array(0 => ("config/" . ($context["config_slug"] ?? null))), "method");
        }
        // line 1
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 12
    public function block_stylesheets($context, array $blocks = array())
    {
        // line 13
        echo "    ";
        $this->getAttribute(($context["assets"] ?? null), "addCss", array(0 => (($context["theme_url"] ?? null) . "/css/codemirror/codemirror.css")), "method");
        // line 14
        echo "    ";
        $this->displayParentBlock("stylesheets", $context, $blocks);
        echo "
";
    }

    // line 17
    public function block_javascripts($context, array $blocks = array())
    {
        // line 18
        echo "    ";
        $this->displayParentBlock("javascripts", $context, $blocks);
        echo "
";
    }

    // line 21
    public function block_titlebar($context, array $blocks = array())
    {
        // line 22
        echo "    <div class=\"button-bar\">
        <a class=\"button\" href=\"";
        // line 23
        echo twig_escape_filter($this->env, ($context["base_url"] ?? null), "html", null, true);
        echo "\"><i class=\"fa fa-reply\"></i> ";
        echo twig_escape_filter($this->env, $this->env->getExtension('Grav\Plugin\Admin\AdminTwigExtension')->tuFilter("PLUGIN_ADMIN.BACK"), "html", null, true);
        echo "</a>
        <button class=\"button\" type=\"submit\" name=\"task\" value=\"save\" form=\"blueprints\"><i class=\"fa fa-check\"></i> ";
        // line 24
        echo twig_escape_filter($this->env, $this->env->getExtension('Grav\Plugin\Admin\AdminTwigExtension')->tuFilter("PLUGIN_ADMIN.SAVE"), "html", null, true);
        echo "</button>
    </div>
    <h1><i class=\"fa fa-fw fa-wrench\"></i> ";
        // line 26
        echo twig_escape_filter($this->env, $this->env->getExtension('Grav\Plugin\Admin\AdminTwigExtension')->tuFilter("PLUGIN_ADMIN.CONFIGURATION"), "html", null, true);
        echo " - ";
        echo twig_escape_filter($this->env, $this->env->getExtension('Grav\Plugin\Admin\AdminTwigExtension')->tuFilter(("PLUGIN_ADMIN." . twig_upper_filter($this->env, ($context["config_slug"] ?? null)))), "html", null, true);
        echo "</h1>
";
    }

    // line 29
    public function block_content_top($context, array $blocks = array())
    {
        // line 30
        echo "
    <div class=\"alert notice\">";
        // line 31
        echo twig_escape_filter($this->env, $this->env->getExtension('Grav\Plugin\Admin\AdminTwigExtension')->tuFilter("PLUGIN_ADMIN.SAVE_LOCATION"), "html", null, true);
        echo ": <b>";
        echo twig_escape_filter($this->env, twig_replace_filter($this->getAttribute($this->getAttribute(($context["data"] ?? null), "file", array()), "filename", array()), array(($context["base_path"] ?? null) => "")), "html", null, true);
        echo "</b></div>
    <div class=\"form-tabs\">
        <div class=\"tabs-nav\">

            ";
        // line 35
        if ($this->env->getExtension('Grav\Common\Twig\TwigExtension')->authorize(array(0 => "admin.configuration_system", 1 => "admin.super"))) {
            // line 36
            echo "            <a ";
            if ((($context["config_slug"] ?? null) == "system")) {
                echo "class=\"active\"";
            }
            echo " href=\"";
            echo twig_escape_filter($this->env, ($context["base_url_relative"] ?? null), "html", null, true);
            echo "/config/system\">
                <span>";
            // line 37
            echo twig_escape_filter($this->env, $this->env->getExtension('Grav\Plugin\Admin\AdminTwigExtension')->tuFilter("PLUGIN_ADMIN.SYSTEM"), "html", null, true);
            echo "</span>
            </a>
            ";
        }
        // line 40
        echo "
            ";
        // line 41
        if ($this->env->getExtension('Grav\Common\Twig\TwigExtension')->authorize(array(0 => "admin.configuration_site", 1 => "admin.super"))) {
            // line 42
            echo "            <a ";
            if ((($context["config_slug"] ?? null) == "site")) {
                echo "class=\"active\"";
            }
            echo " href=\"";
            echo twig_escape_filter($this->env, ($context["base_url_relative"] ?? null), "html", null, true);
            echo "/config/site\">
                <span>";
            // line 43
            echo twig_escape_filter($this->env, $this->env->getExtension('Grav\Plugin\Admin\AdminTwigExtension')->tuFilter("PLUGIN_ADMIN.SITE"), "html", null, true);
            echo "</span>
            </a>
            ";
        }
        // line 46
        echo "
            ";
        // line 47
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable($this->getAttribute(($context["admin"] ?? null), "configurations", array()));
        foreach ($context['_seq'] as $context["_key"] => $context["configuration"]) {
            // line 48
            echo "                ";
            if ($this->env->getExtension('Grav\Common\Twig\TwigExtension')->authorize(array(0 => ("admin.configuration_" . $context["configuration"]), 1 => "admin.super"))) {
                // line 49
                echo "                    ";
                $context["current_blueprints"] = $this->getAttribute($this->getAttribute($this->getAttribute(($context["admin"] ?? null), "data", array(0 => ("config/" . $context["configuration"])), "method"), "blueprints", array()), "toArray", array(), "method");
                // line 50
                echo "                    ";
                if ((((($context["configuration"] != "system") && ($context["configuration"] != "site")) &&  !$this->getAttribute($this->getAttribute(($context["current_blueprints"] ?? null), "form", array()), "hidden", array())) &&  !twig_test_empty($this->getAttribute($this->getAttribute(($context["current_blueprints"] ?? null), "form", array()), "fields", array())))) {
                    // line 51
                    echo "                        <a ";
                    if ((($context["config_slug"] ?? null) == $context["configuration"])) {
                        echo "class=\"active\"";
                    }
                    echo " href=\"";
                    echo twig_escape_filter($this->env, ($context["base_url_relative"] ?? null), "html", null, true);
                    echo "/config/";
                    echo twig_escape_filter($this->env, $context["configuration"], "html", null, true);
                    echo "\">
                            <span>";
                    // line 52
                    echo twig_escape_filter($this->env, $this->env->getExtension('Grav\Common\Twig\TwigExtension')->inflectorFilter("human", $this->env->getExtension('Grav\Plugin\Admin\AdminTwigExtension')->tuFilter($context["configuration"])), "html", null, true);
                    echo "</span>
                        </a>
                    ";
                }
                // line 55
                echo "                ";
            }
            // line 56
            echo "            ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['configuration'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 57
        echo "
            ";
        // line 58
        if ($this->env->getExtension('Grav\Common\Twig\TwigExtension')->authorize(array(0 => "admin.configuration_info", 1 => "admin.super"))) {
            // line 59
            echo "            <a ";
            if ((($context["config_slug"] ?? null) == "info")) {
                echo "class=\"active\"";
            }
            echo " href=\"";
            echo twig_escape_filter($this->env, ($context["base_url_relative"] ?? null), "html", null, true);
            echo "/config/info\">
                <span>";
            // line 60
            echo twig_escape_filter($this->env, $this->env->getExtension('Grav\Plugin\Admin\AdminTwigExtension')->tuFilter("PLUGIN_ADMIN.INFO"), "html", null, true);
            echo "</span>
            </a>
            ";
        }
        // line 63
        echo "
        </div>
    </div>
";
    }

    // line 68
    public function block_content($context, array $blocks = array())
    {
        // line 69
        echo "    ";
        if ($this->env->getExtension('Grav\Common\Twig\TwigExtension')->authorize(array(0 => ("admin.configuration_" . ($context["config_slug"] ?? null)), 1 => "admin.super"))) {
            // line 70
            echo "        ";
            if (($context["isInfo"] ?? null)) {
                // line 71
                echo "            <div id=\"phpinfo\">
                ";
                // line 72
                echo $this->getAttribute(($context["admin"] ?? null), "phpinfo", array());
                echo "
            </div>
        ";
            } else {
                // line 75
                echo "            ";
                $this->loadTemplate("partials/blueprints.html.twig", "config.html.twig", 75)->display(array_merge($context, array("blueprints" => $this->getAttribute(($context["data"] ?? null), "blueprints", array()), "data" => ($context["data"] ?? null))));
                // line 76
                echo "        ";
            }
            // line 77
            echo "    ";
        }
        // line 78
        echo "    ";
        $this->loadTemplate("partials/modal-changes-detected.html.twig", "config.html.twig", 78)->display($context);
    }

    public function getTemplateName()
    {
        return "config.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  240 => 78,  237 => 77,  234 => 76,  231 => 75,  225 => 72,  222 => 71,  219 => 70,  216 => 69,  213 => 68,  206 => 63,  200 => 60,  191 => 59,  189 => 58,  186 => 57,  180 => 56,  177 => 55,  171 => 52,  160 => 51,  157 => 50,  154 => 49,  151 => 48,  147 => 47,  144 => 46,  138 => 43,  129 => 42,  127 => 41,  124 => 40,  118 => 37,  109 => 36,  107 => 35,  98 => 31,  95 => 30,  92 => 29,  84 => 26,  79 => 24,  73 => 23,  70 => 22,  67 => 21,  60 => 18,  57 => 17,  50 => 14,  47 => 13,  44 => 12,  40 => 1,  37 => 9,  35 => 8,  33 => 6,  31 => 4,  29 => 3,  11 => 1,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Twig_Source("", "config.html.twig", "/home/tchappui/sites/openclassmates.io/kikikoz/user/plugins/admin/themes/grav/templates/config.html.twig");
    }
}
