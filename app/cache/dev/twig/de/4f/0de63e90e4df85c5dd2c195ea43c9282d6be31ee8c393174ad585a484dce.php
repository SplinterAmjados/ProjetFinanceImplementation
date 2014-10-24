<?php

/* FinanceBackOfficeBundle:Credits:index.html.twig */
class __TwigTemplate_de4f0de63e90e4df85c5dd2c195ea43c9282d6be31ee8c393174ad585a484dce extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = $this->env->loadTemplate("::base.html.twig");

        $this->blocks = array(
            'g_credits' => array($this, 'block_g_credits'),
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
    public function block_g_credits($context, array $blocks = array())
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
        echo "<h3>Liste des Crédits</h3>
";
    }

    public function getTemplateName()
    {
        return "FinanceBackOfficeBundle:Credits:index.html.twig";
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
