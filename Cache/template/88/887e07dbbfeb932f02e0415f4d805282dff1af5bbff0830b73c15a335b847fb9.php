<?php

/* layout/app.twig */
class __TwigTemplate_b4b79f30fb6f04575d2f0fec9e337cbb0248dd44c9101b4f8a6e9f6084de4937 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
            'title' => array($this, 'block_title'),
            'content' => array($this, 'block_content'),
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 1
        echo "<!doctype html>
<html lang=\"ru\">
<head>
    <meta charset=\"UTF-8\">
    <title>";
        // line 5
        $this->displayBlock('title', $context, $blocks);
        echo "</title>
</head>
<body>

<div style=\"color: red;\">
    ";
        // line 10
        $this->displayBlock('content', $context, $blocks);
        // line 13
        echo "</div>
</body>
</html>";
    }

    // line 5
    public function block_title($context, array $blocks = array())
    {
        echo "FirstCMS";
    }

    // line 10
    public function block_content($context, array $blocks = array())
    {
        // line 11
        echo "        ";
        echo twig_escape_filter($this->env, (isset($context["content"]) ? $context["content"] : null), "html", null, true);
        echo "
    ";
    }

    public function getTemplateName()
    {
        return "layout/app.twig";
    }

    public function getDebugInfo()
    {
        return array (  52 => 11,  49 => 10,  43 => 5,  37 => 13,  35 => 10,  27 => 5,  21 => 1,);
    }
}
/* <!doctype html>*/
/* <html lang="ru">*/
/* <head>*/
/*     <meta charset="UTF-8">*/
/*     <title>{% block title %}FirstCMS{% endblock %}</title>*/
/* </head>*/
/* <body>*/
/* */
/* <div style="color: red;">*/
/*     {% block content %}*/
/*         {{ content }}*/
/*     {% endblock %}*/
/* </div>*/
/* </body>*/
/* </html>*/
