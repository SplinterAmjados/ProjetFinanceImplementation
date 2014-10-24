<?php

/* FinanceBackOfficeBundle:Default:test.html.twig */
class __TwigTemplate_19ac112a010223a813da4d8545fac22673ff8727e9af01adaa730be60cc56ba1 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = $this->env->loadTemplate("::base.html.twig");

        $this->blocks = array(
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
    public function block_content($context, array $blocks = array())
    {
        // line 5
        echo "

    
            <!-- Ceci est un formulaire -->
            >> Exemple Formulaire <<
            <div>
                <form enctype=\"multipart/form-data\" action=\"http://www.weebly.com/weebly/apps/formSubmit.php\"
                      method=\"POST\" id=\"form-164789185493390342\">
                    <div  class=\"wsite-form-container\" style=\"margin-top:10px;\">
                        <ul class=\"formlist\" >
                            <h2 class=\"wsite-content-title\" style=\"text-align:left;\">Authentification<br/><br/></h2>

                            <div>
                                <div class=\"wsite-form-field\" style=\"margin:5px 0px 10px 0px;\">
                                    <label class=\"wsite-form-label\">Identifiant <span
                                            class=\"form-required\">*</span></label>

                                    <div class=\"wsite-form-input-container\">
                                        <input class=\"wsite-form-input wsite-input wsite-input-width-200px\" type=\"text\"
                                               name=\"_u828898480334910181\"/>
                                    </div>
                                </div>
                            </div>
                        </ul>
                    </div>

                    <div style=\"text-align:left; margin-top:10px; margin-bottom:10px;\">

                        <input type='submit' style='position:absolute;top:0;left:-9999px;width:1px;height:1px'/><a
                            class='wsite-button'
                            onclick=\"document.getElementById('form-164789185493390342').submit()\"><span
                            class='wsite-button-inner'>Soumettre</span></a>
                    </div>
                </form>
            </div>

            <!-- Ceci est un tableau -->
            >> Exemple Tableau ! mettre dans une < div class=\"CSSTable\"> < /div > votre tableau , la première ligne
            désigne<br>
            les entêtes des colonnes <<
            >> Cliquer sur détails pour ouvrir DetailsBox <<
            <br><br>

            <div class=\"CSSTable\">
                <table>
                    <tr>
                        <td width=\"20%\">
                            Nom Client/Raison Social
                        </td>
                        <td width=\"20%\">
                            Identifiant Client
                        </td>
                        <td width=\"40%\">
                            Adresse
                        </td>
                        <td>
                            Tél
                        </td>
                        <td>
                            Actions
                        </td>
                    </tr>
                    <tr>
                        <td width=\"20%\">
                            Amjed NOUIRA
                        </td>
                        <td width=\"20%\">
                            01254788
                        </td>
                        <td width=\"40%\">
                            33 Rue de holland El mourouj4
                        </td>
                        <td>
                            55335102
                        </td>
                        <td>
                            <div class=\"show_button\"></div>
                        </td>
                    </tr>
                    <tr>
                        <td width=\"20%\">
                            Mariem Nfaidh
                        </td>
                        <td width=\"20%\">
                            236514282
                        </td>
                        <td width=\"40%\">
                            55 Rue de Paris Raoued
                        </td>
                        <td>
                            22001214
                        </td>
                        <td>
                            <div class=\"show_button\"></div>
                        </td>
                    </tr>
                </table>
            </div>

      

        <!-- L'envellope du detailsBox se constitue de 4 div comme suit -->
        <div class=\"details_box\">
            <div >
                <div class=\"close_details_box_button clickable\"></div>
                <div class=\"details\">
                    <!-- Details Data Here ! -->

                    <h2>Détails du Crédit</h2>
                    <br>
                    <br>
                    <table class=\"details_table\">
                        <tr>
                            <td>Num.</td>
                            <td>CSD515PF3</td>
                        </tr>
                        <tr>
                            <td>Id. Compte</td>
                            <td>C0011584</td>
                        </tr>
                        <tr>
                            <td>Titulaire du compte</td>
                            <td><a href=\"\">Amjed NOUIRA</a></td>
                        </tr>
                        <tr>
                            <td>Type</td>
                            <td>Immobilier</td>
                        </tr>
                        <tr>
                            <td>Date de la création</td>
                            <td>01/02/2010</td>
                        </tr>
                        <tr>
                            <td>Derniére date d'échéance</td>
                            <td>03/10/2020</td>
                        </tr>
                        <tr>
                            <td>Montant (Dt)</td>
                            <td>
                                30 200
                            </td>
                        </tr>
                        <tr>
                            <td>
                                Taux d'intêret
                            </td>
                            <td>
                                1,2%
                            </td>
                        </tr>
                        <tr>
                            <td>
                                Montant payé (Dt)
                            </td>
                            <td>
                                4 200
                            </td>
                        </tr>
                        <tr>
                            <td>
                                Montant Restant (Dt)
                            </td>
                            <td>
                                31 000
                            </td>
                        </tr>
                    </table>
                    <br>
                    <button>Modifier</button>

                </div>
            </div>
        </div>

<br><br>

>> Les Bouttons <<
<br><br>
        Modification boutton : <div class=\"edit_button\"></div>

<br><br><br><br>
        Print boutton : <div class=\"print_button\"></div>

<br><br><br><br>
        Show (détails) boutton : <div class=\"show_button\"></div>

";
    }

    public function getTemplateName()
    {
        return "FinanceBackOfficeBundle:Default:test.html.twig";
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
