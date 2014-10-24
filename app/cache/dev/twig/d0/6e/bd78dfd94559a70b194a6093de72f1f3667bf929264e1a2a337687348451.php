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
        echo "<h1>Liste des Clients</h1>
<br>
<div class=\"filtrage\">
<h3>Critères</h3>
<form>
<table>
<tr>
<td>
Nom/Raison Social<br>
<input type=\"text\" placeholder=\"Nom/R.Social\">
</td>
<td>
NCIN<br>
<input type=\"text\" placeholder=\"Ncin Client\">
</td>
<td>
Ville<br>
<input type=\"text\" placeholder=\"Ville\">
</td>
</tr>

<tr>
<td>
N° Compte<br>
<input type=\"text\" placeholder=\"Id Compte\">
</td>
<td>

</td>
<td>
<input type=\"submit\" value=\"Filtrer\">
</td>
</tr>

</table>
</form>
</div>

<div class=\"CSSTable\">
<table>
<tr>
<td>Id Client</td>
<td>Nom/R.Social</td>
<td>Adresse</td>
<td>Tél</td>
<td>Comptes</td>
<td width=\"70px\">Actions</td>
</tr>

<tr>
<td>07179349</td>
<td>Amjed NOUIRA</td>
<td>33 Rue de holland El mourouj</td>
<td>55335102</td>
<td>
<ul>
<li>CE : 001380012365865</li>
<li>CC : 21321452665478925145</li>
</ul>
</td>
<td>
<div class=\"show_button\"></div>
<div class=\"edit_button\"></div>
</td>
</tr>

<tr>
<td>06548732</td>
<td>Mariem Nfaidh</td>
<td>50 Rue de paris, Raoued</td>
<td>20152364</td>
<td>
<ul>
<li>CE : 001380019365884</li>
</ul>
</td>
<td>
<div class=\"show_button\"></div>
<div class=\"edit_button\"></div>
</td>
</tr>
</table>
</div>
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
