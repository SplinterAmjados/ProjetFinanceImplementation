<?php

/* FinanceBackOfficeBundle:Clients:new.html.twig */
class __TwigTemplate_40cd55115e9a3ef0d49a9a3f3ba7ca0a3124694b3c51af2ad74112b4f6817755 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = $this->env->loadTemplate("FinanceBackOfficeBundle:Clients:index.html.twig");

        $this->blocks = array(
            'content' => array($this, 'block_content'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "FinanceBackOfficeBundle:Clients:index.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 4
    public function block_content($context, array $blocks = array())
    {
        // line 5
        echo "<h3>Ajouter un client</h3>

";
    }

    public function getTemplateName()
    {
        return "FinanceBackOfficeBundle:Clients:new.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  31 => 5,  28 => 4,);
    }
}
