<?php

/* main.html */
class __TwigTemplate_be06d3e3238f959e123d39e2f18f158b6383fc9d932920b18c9eaf86c2080c65 extends Twig_Template
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
        echo "<!doctype html>
<html lang=\"ru\">
<head>
    <meta charset=\"UTF-8\">
    <title>FirstCMS</title>
</head>
<body>

    <div style=\"color: red;\">";
        // line 9
        echo twig_escape_filter($this->env, (isset($context["content"]) ? $context["content"] : null), "html", null, true);
        echo "</div>
</body>
</html>";
    }

    public function getTemplateName()
    {
        return "main.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  29 => 9,  19 => 1,);
    }
}
/* <!doctype html>*/
/* <html lang="ru">*/
/* <head>*/
/*     <meta charset="UTF-8">*/
/*     <title>FirstCMS</title>*/
/* </head>*/
/* <body>*/
/* */
/*     <div style="color: red;">{{ content }}</div>*/
/* </body>*/
/* </html>*/
