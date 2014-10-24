<?php

namespace Finance\BackOfficeBundle\Controller;

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
        return $this->render('FinanceBackOfficeBundle:Default:index.html.twig');
    }
    
    
    /**
     * @Route("/login",name="login")
     */
    public function loginAction()
    {    
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
