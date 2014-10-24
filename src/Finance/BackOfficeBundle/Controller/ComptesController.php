<?php
namespace Finance\BackOfficeBundle\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;


class ComptesController extends Controller {

	
	/**
	 * @Route("/comptes_index", name="comptes_index")
	 */
	public function indexAction()
	{
	return $this->render("FinanceBackOfficeBundle:Comptes:index.html.twig");
	}
	
	/**
	 * @Route("/new_compte",name="new_compte")
	 * @Method("get")
	 */
	public function newAction()
	{
		return $this->render("FinanceBackOfficeBundle:Comptes:new.html.twig");
	}
	
}
