<?php

/* FinanceBackOfficeBundle:Comptes:new.html.twig */
class __TwigTemplate_ea4c9a589146546fb55e586a00a9e169d3c379b7278954720e0694fdccc37c79 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = $this->env->loadTemplate("FinanceBackOfficeBundle:Comptes:index.html.twig");

        $this->blocks = array(
            'content' => array($this, 'block_content'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "FinanceBackOfficeBundle:Comptes:index.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 3
    public function block_content($context, array $blocks = array())
    {
        // line 4
        echo "<h3>Ajouter un compte </h3>
";
    }

    public function getTemplateName()
    {
        return "FinanceBackOfficeBundle:Comptes:new.html.twig";
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
