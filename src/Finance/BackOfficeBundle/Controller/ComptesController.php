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
	
	/**
	 * @Route("/new_compte_2",name="new_compte_2")
	 * @Method("get")
	 */
	public function new2Action()
	{
		return $this->render("FinanceBackOfficeBundle:Comptes:new2.html.twig");
	}
	
	/**
	 * @Route("/new_compte_3",name="new_compte_3")
	 * @Method("get")
	 */
	public function new3Action()
	{
		return $this->render("FinanceBackOfficeBundle:Comptes:new3.html.twig");
	}
	
}
