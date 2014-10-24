<?php

/* FinanceBackOfficeBundle:Comptes:index.html.twig */
class __TwigTemplate_0fc71a9a0a62c37f6a3310865181f5b0f5248606ffbe2b290bafe12f24141a09 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = $this->env->loadTemplate("::base.html.twig");

        $this->blocks = array(
            'g_comptes' => array($this, 'block_g_comptes'),
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
    public function block_g_comptes($context, array $blocks = array())
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
        echo "<h3>Liste des Comptes</h3>
";
    }

    public function getTemplateName()
    {
        return "FinanceBackOfficeBundle:Comptes:index.html.twig";
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
