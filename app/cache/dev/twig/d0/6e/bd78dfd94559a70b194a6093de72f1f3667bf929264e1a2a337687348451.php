<?php

/* FinanceBackOfficeBundle:Clients:index.html.twig */
class __TwigTemplate_d06ebd78dfd94559a70b194a6093de72f1f3667bf929264e1a2a337687348451 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = $this->env->loadTemplate("::base.html.twig");

        $this->blocks = array(
            'g_clients' => array($this, 'block_g_clients'),
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

    // line 3
    public function block_g_clients($context, array $blocks = array())
    {
        // line 4
        echo "
active

";
    }

    // line 9
    public function block_content($context, array $blocks = array())
    {
        // line 10
        echo "<h3>Liste des Clients</h3>
";
    }

    public function getTemplateName()
    {
        return "FinanceBackOfficeBundle:Clients:index.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  42 => 10,  39 => 9,  32 => 4,  29 => 3,);
    }
}
