<?php

namespace Finance\BackOfficeBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class ClientsController extends Controller {
	
	
	/**
	 * @Route("/clients_index" , name="clients_index")
	 */
	public function indexAction()
	{
		return $this->render("FinanceBackOfficeBundle:Clients:index.html.twig");
	}
	
	/**
	 * @Route("/new_client",name="new_client")
	 * @Method("get")
	 */
	public function newAction()
	{
		return $this->render("FinanceBackOfficeBundle:Clients:new.html.twig");
	}

}
