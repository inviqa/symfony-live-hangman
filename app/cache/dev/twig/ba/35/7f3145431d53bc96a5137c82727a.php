<?php

/* SensioHangmanBundle:Game:index.html.twig */
class __TwigTemplate_ba357f3145431d53bc96a5137c82727a extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = $this->env->loadTemplate("SensioHangmanBundle::layout.html.twig");

        $this->blocks = array(
            'title' => array($this, 'block_title'),
            'body' => array($this, 'block_body'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "SensioHangmanBundle::layout.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 3
    public function block_title($context, array $blocks = array())
    {
        // line 5
        echo "Hangman Game";
    }

    // line 9
    public function block_body($context, array $blocks = array())
    {
        // line 10
        echo "
    <h2>Guess the mysterious word</h2>

        <p class=\"attempts\">
            You still have ";
        // line 14
        echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "game"), "remainingAttempts"), "html", null, true);
        echo " remaining attempts.
        </p>

        <ul class=\"word_letters\">
            ";
        // line 18
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable($this->getAttribute($this->getContext($context, "game"), "wordLetters"));
        foreach ($context['_seq'] as $context["_key"] => $context["letter"]) {
            // line 19
            echo "                <li class=\"letter ";
            echo (($this->getAttribute($this->getContext($context, "game"), "isLetterFound", array(0 => $this->getContext($context, "letter")), "method")) ? ("guessed") : ("hidden"));
            echo "\">
                    ";
            // line 20
            echo twig_escape_filter($this->env, (($this->getAttribute($this->getContext($context, "game"), "isLetterFound", array(0 => $this->getContext($context, "letter")), "method")) ? ($this->getContext($context, "letter")) : ("?")), "html", null, true);
            echo "
                </li>
            ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['letter'], $context['_parent'], $context['loop']);
        $context = array_merge($_parent, array_intersect_key($context, $_parent));
        // line 23
        echo "        </ul>

        <br class=\"clearfix\" />

        <p class=\"attempts\">
            <a href=\"";
        // line 28
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("game_reset"), "html", null, true);
        echo "\">Reset the game</a>
        </p>

        <br class=\"clearfix\" />

    <h2>Try a letter</h2>

        <ul>
            ";
        // line 36
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable(range("A", "Z"));
        foreach ($context['_seq'] as $context["_key"] => $context["letter"]) {
            // line 37
            echo "                <li class=\"letter\">
                    <a href=\"";
            // line 38
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("play_letter", array("letter" => $this->getContext($context, "letter"))), "html", null, true);
            echo "\">
                        ";
            // line 39
            echo twig_escape_filter($this->env, $this->getContext($context, "letter"), "html", null, true);
            echo "
                    </a>
                </li>
            ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['letter'], $context['_parent'], $context['loop']);
        $context = array_merge($_parent, array_intersect_key($context, $_parent));
        // line 43
        echo "        </ul>

    <h2>Try a word</h2>

        <form action=\"";
        // line 47
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("play_word"), "html", null, true);
        echo "\" method=\"post\">
            <p>
                <label for=\"word\">Word:</label>
                <input type=\"text\" name=\"word\"/>
                <button type=\"submit\">Let me guess...</button>
            </p>
        </form>

";
    }

    public function getTemplateName()
    {
        return "SensioHangmanBundle:Game:index.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  113 => 47,  107 => 43,  97 => 39,  93 => 38,  90 => 37,  86 => 36,  75 => 28,  68 => 23,  59 => 20,  54 => 19,  50 => 18,  43 => 14,  37 => 10,  34 => 9,  30 => 5,  27 => 3,);
    }
}
