<?php

/* ::base.html.twig */
class __TwigTemplate_db6666460998f07c77a11aa24b549cc6e1ba392d5d23c990a075c62005441542 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
            'navigation' => array($this, 'block_navigation'),
            'accueil' => array($this, 'block_accueil'),
            'g_clients' => array($this, 'block_g_clients'),
            'g_comptes' => array($this, 'block_g_comptes'),
            'g_credits' => array($this, 'block_g_credits'),
            'content' => array($this, 'block_content'),
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 1
        echo "<!DOCTYPE html>
<html>
<head>
    <title>Mon site - Authentification</title>
    <meta http-equiv=\"Content-Type\" content=\"text/html; charset=utf-8\"/>
    <link rel=\"stylesheet\" href=\"";
        // line 6
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/financebackoffice/css/sites.css"), "html", null, true);
        echo "\" type=\"text/css\"/>
    <link rel='stylesheet' type='text/css'  href=\"";
        // line 7
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/financebackoffice/css/fancybox.css"), "html", null, true);
        echo "\"/>
    <link rel='stylesheet' type='text/css' href=\"";
        // line 8
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/financebackoffice/css/main_style.css"), "html", null, true);
        echo "\" title='wsite-theme-css'/>
    <link rel='stylesheet' type='text/css' href=\"";
        // line 9
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/financebackoffice/css/style.css"), "html", null, true);
        echo "\" title='wsite-theme-css'/>
    <link href=\"";
        // line 10
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/financebackoffice/css/css.css"), "html", null, true);
        echo "\" rel='stylesheet'     type='text/css'/>
    <link href=\"";
        // line 11
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/financebackoffice/jqueryui/jquery-ui.min.css"), "html", null, true);
        echo "\" rel=\"stylesheet\" type=\"text/css\">
    <style type='text/css'>
        .wsite-elements.wsite-not-footer div.paragraph, .wsite-elements.wsite-not-footer p, .wsite-elements.wsite-not-footer .product-block .product-title, .wsite-elements.wsite-not-footer .product-description, .wsite-elements.wsite-not-footer .wsite-form-field label, .wsite-elements.wsite-not-footer .wsite-form-field label, #wsite-content div.paragraph, #wsite-content p, #wsite-content .product-block .product-title, #wsite-content .product-description, #wsite-content .wsite-form-field label, #wsite-content .wsite-form-field label, .blog-sidebar div.paragraph, .blog-sidebar p, .blog-sidebar .wsite-form-field label, .blog-sidebar .wsite-form-field label {
        }

        #wsite-content div.paragraph, #wsite-content p, #wsite-content .product-block .product-title, #wsite-content .product-description, #wsite-content .wsite-form-field label, #wsite-content .wsite-form-field label, .blog-sidebar div.paragraph, .blog-sidebar p, .blog-sidebar .wsite-form-field label, .blog-sidebar .wsite-form-field label {
        }

        .wsite-elements.wsite-footer div.paragraph, .wsite-elements.wsite-footer p, .wsite-elements.wsite-footer .product-block .product-title, .wsite-elements.wsite-footer .product-description, .wsite-elements.wsite-footer .wsite-form-field label, .wsite-elements.wsite-footer .wsite-form-field label {
        }

        .wsite-elements.wsite-not-footer h2, .wsite-elements.wsite-not-footer .product-long .product-title, .wsite-elements.wsite-not-footer .product-large .product-title, .wsite-elements.wsite-not-footer .product-small .product-title, #wsite-content h2, #wsite-content .product-long .product-title, #wsite-content .product-large .product-title, #wsite-content .product-small .product-title, .blog-sidebar h2 {
        }

        #wsite-content h2, #wsite-content .product-long .product-title, #wsite-content .product-large .product-title, #wsite-content .product-small .product-title, .blog-sidebar h2 {
        }

        .wsite-elements.wsite-footer h2, .wsite-elements.wsite-footer .product-long .product-title, .wsite-elements.wsite-footer .product-large .product-title, .wsite-elements.wsite-footer .product-small .product-title {
        }

        #wsite-title {
        }

        .wsite-menu-default a {
        }

        .wsite-menu a {
        }

        .wsite-image div, .wsite-caption {
        }

        .galleryCaptionInnerText {
        }

        .fancybox-title {
        }

        .wslide-caption-text {
        }

        .wsite-phone {
        }

        .wsite-headline {
        }

        .wsite-headline-paragraph {
        }

        .wsite-button-inner {
        }

        .wsite-not-footer blockquote, #wsite-com-product-tab blockquote {
        }

        .wsite-footer blockquote {
        }

        .blog-header h2 a {
        }

        #wsite-content h2.wsite-product-title {
        }

        .wsite-product .wsite-product-price a {
        }
        
      
    </style>

  </head>
<body class='no-header-page wsite-theme-light wsite-page-index'>
<div id=\"header-wrap\">
    <div class=\"container\">
        <table id=\"header\">
            <tr>
                <td id=\"logo\"><span class='wsite-logo'><a href='index.html'><span
                        id=\"wsite-title\">Mon site</span></a></span></td>
            </tr>
        </table>
    </div>
    <!-- end container -->
</div>
<!-- end header-wrap -->

<div style=\"witdh : 100% ; background: #fff; \">
<div class=\"container\">
     
     ";
        // line 100
        $this->displayBlock('navigation', $context, $blocks);
        // line 138
        echo "

<div id=\"main-wrap\">
    <div class=\"container\">
        <div id='wsite-content' class='wsite-elements wsite-not-footer'>

        ";
        // line 144
        $this->displayBlock('content', $context, $blocks);
        // line 147
        echo "   
        
</div>
        
    </div>
    <!-- end container -->
</div>
<!-- end main-wrap -->

<div id=\"footer-wrap\" style=\"height: 100px; position: relative ;  bottom: 0px;\">
    <div class=\"container\">
        Projet Finance Système d'information Bancaire 2014-2015
    </div>
    <!-- end container -->
</div>
<!-- end footer-wrap -->
<script src='";
        // line 163
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/financebackoffice/js/jquery-1.9.1.js"), "html", null, true);
        echo "'></script>
<script src='";
        // line 164
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/financebackoffice/jqueryui/jquery-ui.js"), "html", null, true);
        echo "'></script>
<script src='";
        // line 165
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/financebackoffice/js/scripts.js"), "html", null, true);
        echo "'></script>
<script>
    \$('.show_button').click(function()
            {
showWithScaleEffect('.details_box');
            }
    );
</script>
</body>
</html>
";
    }

    // line 100
    public function block_navigation($context, array $blocks = array())
    {
        // line 101
        echo "                   
<div class=\"bar_nav_main\">
 
                        <div class=\"option_level1\" ><a href=\"";
        // line 104
        echo $this->env->getExtension('routing')->getPath("accueil");
        echo "\" class=\"";
        $this->displayBlock('accueil', $context, $blocks);
        echo " \">Accueil</a></div>
\t\t\t\t\t\t<span class=\"separateur\">/</span>
                        <div class=\"option_level1\"   >
                            <a class=\"";
        // line 107
        $this->displayBlock('g_clients', $context, $blocks);
        echo " \" href=\"";
        echo $this->env->getExtension('routing')->getPath("clients_index");
        echo "\">Gestion des Clients</a>

                                    <div class=\"dropDownList\">
                                        <a href=\"";
        // line 110
        echo $this->env->getExtension('routing')->getPath("new_client");
        echo "\">Créer un client</a>
                                    </div>
                            
                        </div>
\t\t\t\t\t\t<span class=\"separateur\">/</span>
                        <div class=\"option_level1\"  >
                            <a href=\"";
        // line 116
        echo $this->env->getExtension('routing')->getPath("comptes_index");
        echo "\" class=\"";
        $this->displayBlock('g_comptes', $context, $blocks);
        echo " \">Gestion des Comptes</a>

                            <div class=\"dropDownList\">
                                    <div>
                                        <a href=\"";
        // line 120
        echo $this->env->getExtension('routing')->getPath("new_compte");
        echo "\">Créer un Compte</a>
                                    </div>
                            </div>
                        </div>
\t\t\t\t\t\t<span class=\"separateur\">/</span>
                        <div class=\"option_level1\"  >
                            <a class=\"";
        // line 126
        $this->displayBlock('g_credits', $context, $blocks);
        echo " \" href=\"";
        echo $this->env->getExtension('routing')->getPath("credits_index");
        echo "\">Gestion des Crédits</a>
                            <div class=\"dropDownList\">
                                    <div>
                                        <a href=\"";
        // line 129
        echo $this->env->getExtension('routing')->getPath("new_credit");
        echo "\">Créer un Cédit</a>
                                    </div>
                            </div>
                        </div>
                    </div>
</div>
</div>

";
    }

    // line 104
    public function block_accueil($context, array $blocks = array())
    {
        echo " ";
    }

    // line 107
    public function block_g_clients($context, array $blocks = array())
    {
        echo " ";
    }

    // line 116
    public function block_g_comptes($context, array $blocks = array())
    {
        echo " ";
    }

    // line 126
    public function block_g_credits($context, array $blocks = array())
    {
        echo " ";
    }

    // line 144
    public function block_content($context, array $blocks = array())
    {
        // line 145
        echo "    
        
     ";
    }

    public function getTemplateName()
    {
        return "::base.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  296 => 145,  293 => 144,  287 => 126,  281 => 116,  275 => 107,  269 => 104,  256 => 129,  248 => 126,  239 => 120,  230 => 116,  221 => 110,  213 => 107,  205 => 104,  200 => 101,  197 => 100,  182 => 165,  178 => 164,  174 => 163,  156 => 147,  154 => 144,  146 => 138,  144 => 100,  52 => 11,  48 => 10,  44 => 9,  40 => 8,  36 => 7,  32 => 6,  25 => 1,);
    }
}
