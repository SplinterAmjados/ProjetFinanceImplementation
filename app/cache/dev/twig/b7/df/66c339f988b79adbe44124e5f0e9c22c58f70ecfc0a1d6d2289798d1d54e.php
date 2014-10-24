<?php

/* FinanceBackOfficeBundle:Credits:new.html.twig */
class __TwigTemplate_b7df66c339f988b79adbe44124e5f0e9c22c58f70ecfc0a1d6d2289798d1d54e extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = $this->env->loadTemplate("FinanceBackOfficeBundle:Credits:index.html.twig");

        $this->blocks = array(
            'content' => array($this, 'block_content'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "FinanceBackOfficeBundle:Credits:index.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 3
    public function block_content($context, array $blocks = array())
    {
        // line 4
        echo "<h3>Ajouter un crédit </h3>
";
    }

    public function getTemplateName()
    {
        return "FinanceBackOfficeBundle:Credits:new.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  31 => 4,  28 => 3,);
    }
}
