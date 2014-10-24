<?php

/* FinanceBackOfficeBundle:Default:index.html.twig */
class __TwigTemplate_5034acc60bbac233ec9ad064f2d674036f6eda8f010fd3475a9b8595f92c5685 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = $this->env->loadTemplate("::base.html.twig");

        $this->blocks = array(
            'accueil' => array($this, 'block_accueil'),
            'content' => array($this, 'block_content'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "::base.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 4
    public function block_accueil($context, array $blocks = array())
    {
        // line 5
        echo "active
";
    }

    // line 8
    public function block_content($context, array $blocks = array())
    {
        // line 9
        echo "<h3>Accueil </h3>
";
    }

    public function getTemplateName()
    {
        return "FinanceBackOfficeBundle:Default:index.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  40 => 9,  37 => 8,  32 => 5,  29 => 4,);
    }
}
