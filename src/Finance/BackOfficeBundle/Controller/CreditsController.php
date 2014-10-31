<?php

namespace Finance\BackOfficeBundle\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

class CreditsController extends Controller {

	/**
	 * @Route("/credits_index", name="credits_index")
	 */
	public function indexAction()
	{
	return $this->render("FinanceBackOfficeBundle:Credits:index.html.twig");
	}
	
	/**
	 * @Route("/new_credit",name="new_credit")
	 * @Method("get")
	 */
	public function newAction()
	{
		return $this->render("FinanceBackOfficeBundle:Credits:new.html.twig");
	}
	
	/**
	 * @Route("/new_credit_2",name="new_credit_2")
	 * @Method("get")
	 */
	public function new2Action()
	{
		return $this->render("FinanceBackOfficeBundle:Credits:new2.html.twig");
	}
	
}
