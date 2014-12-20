<?php

namespace Finance\BackOfficeBundle\Controller;

use Finance\BackOfficeBundle\Entity\Compte;

use Finance\BackOfficeBundle\Entity\Client;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

use Symfony\Component\Security\Core\SecurityContext;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;


class DefaultController extends Controller
{
	/**
	 * @Route("/test")
	 */
	public function testAction()
	{
		return $this->render("FinanceBackOfficeBundle:Default:test.html.twig");
	}
	
	
	/**
	 * @Route("/",name="accueil")
	 * @param unknown_type $name
	 */
    public function indexAction()
    {
    	
    	$newClients = $this->getDoctrine()->getRepository("FinanceBackOfficeBundle:Client")
    					->findBy(array(),array('dateCreation' => 'DESC'),5);
    	
    	$newComptes = $this->getDoctrine()->getRepository("FinanceBackOfficeBundle:Compte")
    	->findBy(array(),array('dateCreation' => 'DESC'),5);
    	
    	$i = 0 ;
    	$j = 0 ;
    	while($i<5 && $j<5)
    	{
    		if ($newClients[$i]->getDateCreation() >= $newComptes[$j]->getDateCreation() )
    		{
    			$actualites[] = $this->getActualite($newClients[$i]) ;
    			$i++ ;	
    		}else 
    		{
    			$actualites[] = $this->getActualite($newComptes[$j]);
    			$j++;
    		}
    	}
    	
    	for ($k = $i; $k<count($newClients) ; $k++)
    	{
    		$actualites[] = $this->getActualite($newClients[$k]) ;
    	}
    	
    	for ($k = $j; $k< count($newComptes) ; $k++)
    	{
    	$actualites[] = $this->getActualite($newComptes[$k]) ;
    	}
    	
        return $this->render('FinanceBackOfficeBundle:Default:index.html.twig',array('actualites' => $actualites));
    }
    
    
    private function getActualite($objet)
    {
    	if ($objet instanceof Client)
    	{
    		return "[".$objet->getDateDeCreation()."] Nouveau Client ".$objet->getNomPrenomOuRSocial() ;
    	}elseif($objet instanceof Compte)
    	{
    		return "[".$objet->getDateDeCreation()."] Ouverture d'un nouveau Compte ".$objet->getNumCompte() ;
    		
    	}
    	return "";
    }
    
    /**
     * @Route("/login",name="login")
     */
    public function loginAction()
    {    
    	//return $this->render("FinanceBackOfficeBundle:reports:detail_client_report.html.twig");
    	
    	$request = $this->getRequest();
    	$session = $request->getSession();
    	// get the login error if there is one
    	if ($request->attributes->has(SecurityContext::AUTHENTICATION_ERROR)) {
    		$error = $request->attributes->get(SecurityContext::AUTHENTICATION_ERROR);
    	} else {
    		$error = $session->get(SecurityContext::AUTHENTICATION_ERROR);
    		$session->remove(SecurityContext::AUTHENTICATION_ERROR);
    	}
    	return $this->render('FinanceBackOfficeBundle:Default:authentification.html.twig', array(
    			// last username entered by the user
    			'last_username' => $session->get(SecurityContext::LAST_USERNAME),
    			'error'         => $error,
    	));
    }
    
}
