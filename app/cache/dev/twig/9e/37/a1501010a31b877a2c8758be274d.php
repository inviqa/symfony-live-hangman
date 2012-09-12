<?php

/* SensioHangmanBundle::layout.html.twig */
class __TwigTemplate_9e37a1501010a31b877a2c8758be274d extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
            'title' => array($this, 'block_title'),
            'stylesheets' => array($this, 'block_stylesheets'),
            'body' => array($this, 'block_body'),
            'javascripts' => array($this, 'block_javascripts'),
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 1
        echo "<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv=\"Content-Type\" content=\"text/html; charset=utf-8\" />
        <title>";
        // line 5
        $this->displayBlock('title', $context, $blocks);
        echo "</title>
        ";
        // line 6
        $this->displayBlock('stylesheets', $context, $blocks);
        // line 7
        echo "        <link href=\"http://fonts.googleapis.com/css?family=Arvo\" rel=\"stylesheet\" type=\"text/css\" />
        <link rel=\"stylesheet\" type=\"text/css\" href=\"";
        // line 8
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/sensiohangman/css/style.css"), "html", null, true);
        echo "\" />
        <link rel=\"shortcut icon\" href=\"";
        // line 9
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("favicon.ico"), "html", null, true);
        echo "\" />
    </head>
    <body>
        <div id=\"wrapper\">
            <div id=\"header\">
                <div id=\"logo\">
                    <h1>
                        <a href=\"";
        // line 16
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("homepage"), "html", null, true);
        echo "\">Hangman</a>
                    </h1>
                </div>
                <div id=\"menu\">
                    <ul>
                        <li class=\"first current_page_item\">
                            <a href=\"";
        // line 22
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("homepage"), "html", null, true);
        echo "\">Homepage</a>
                        </li>
                        <li>
                            <a href=\"";
        // line 25
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("registration"), "html", null, true);
        echo "\">Register</a>
                        </li>
                        <li>
                            <a href=\"#\">Login</a>
                        </li>
                        <li>
                            <a href=\"#\">Top10</a>
                        </li>
                    </ul>
                    <br class=\"clearfix\" />
                </div>
            </div>

            <div id=\"page\">
                <div id=\"content\">
                    ";
        // line 40
        $this->displayBlock('body', $context, $blocks);
        // line 41
        echo "                </div>
                <div id=\"sidebar\">
                    <h3>Last Games</h3>
                    <div class=\"date-list\">
                        <ul class=\"list date-list\">

                            <li class=\"first\"><span class=\"date\">Jan 13</span> <a href=\"#\">Ultrices quisque molestie</a></li>
                            <li><span class=\"date\">Jan 7</span> <a href=\"#\">Neque dolor eget</a></li>
                            <li><span class=\"date\">Jan 1</span> <a href=\"#\">Sollicitudin interdum</a></li>
                            <li class=\"last\"><span class=\"date\">Dec 26</span> <a href=\"#\">Varius dignissim</a></li>

                        </ul>
                    </div>
                    <h3>Last players</h3>
                    <p>
                        Urna dis suscipit lorem sed luctus. Elementum suspendisse tempus fermentum ornare libero phasellus nibh conseuqat dolore.
                    </p>
                </div>
                <br class=\"clearfix\" />
            </div>
        </div>

        ";
        // line 63
        $this->displayBlock('javascripts', $context, $blocks);
        // line 64
        echo "    </body>
</html>";
    }

    // line 5
    public function block_title($context, array $blocks = array())
    {
        echo "The Hangman Workshop";
    }

    // line 6
    public function block_stylesheets($context, array $blocks = array())
    {
    }

    // line 40
    public function block_body($context, array $blocks = array())
    {
    }

    // line 63
    public function block_javascripts($context, array $blocks = array())
    {
    }

    public function getTemplateName()
    {
        return "SensioHangmanBundle::layout.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  132 => 63,  127 => 40,  122 => 6,  116 => 5,  111 => 64,  109 => 63,  85 => 41,  83 => 40,  65 => 25,  40 => 9,  36 => 8,  33 => 7,  31 => 6,  21 => 1,  113 => 47,  107 => 43,  97 => 39,  93 => 38,  90 => 37,  86 => 36,  75 => 28,  68 => 23,  59 => 22,  54 => 19,  50 => 16,  43 => 14,  37 => 10,  34 => 9,  30 => 5,  27 => 5,);
    }
}
