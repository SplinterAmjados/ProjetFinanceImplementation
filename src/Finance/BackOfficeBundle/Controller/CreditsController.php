<?php



namespace Finance\BackOfficeBundle\Controller;
use Finance\BackOfficeBundle\Form\CreditType;
use Finance\BackOfficeBundle\Entity\Credit;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

class CreditsController extends Controller {

	/**
	 * @Route("/credits_index", name="credits_index")
	 */
	public function indexAction()
	{
		
	$credits = $this->getDoctrine()->getRepository("FinanceBackOfficeBundle:Credit")->findAll();	
		
	return $this->render("FinanceBackOfficeBundle:Credits:index.html.twig",array("credits" => $credits));
	}
	
	/**
	 * @Route("/new_credit",name="new_credit")
	 */
	public function newAction()
	{
		$erreurs = array();
		if ($this->getRequest()->getMethod() == "POST")
		{
			$numCompte = $this->getRequest()->request->get('numCompte');
			$compte = $this->getDoctrine()->getRepository("FinanceBackOfficeBundle:Compte")->findOneByNumCompte($numCompte);
			
			if( $compte != null )
			{
				return $this->redirect($this->generateUrl("new_credit_2",array('numCompte' => $numCompte)));
			}
			else {
				$erreurs[] = "Ce Compte n'existe pas";
			}
		}
		
		
		return $this->render("FinanceBackOfficeBundle:Credits:new.html.twig",array("erreurs" => $erreurs));
	}
	
	/**
	 * @Route("/new_credit_2/{numCompte}",name="new_credit_2")
	 */
	public function new2Action($numCompte)
	{
		
		$credit = new Credit();
		$form = $this->createForm(new CreditType(),$credit) ;
		
		if ($this->getRequest()->getMethod() == "POST")
		{
			$form->handleRequest($this->getRequest());
			
			if ($form->isValid())
			{
				$compte = $this->getDoctrine()->getRepository('FinanceBackOfficeBundle:Compte')->findOneByNumCompte($numCompte);
				$credit->setCompte($compte);
				$this->get('session')->set('credit_'.$numCompte,$credit);
				return $this->render("FinanceBackOfficeBundle:Credits:new3.html.twig", array('credit' => $credit ));
			}
			else
			{
				//var_dump("Form invalide");
				//var_dump($form->getErrorsAsString());
				//Form Invalid
			}
			
		}
		
		return $this->render("FinanceBackOfficeBundle:Credits:new2.html.twig",array("form"=>$form->createView()));
	
	}
	
	/**
	 * @Route("/confirm_credit/{numCompte}",name="confim_new_credit")
	 * @Method("POST")
	 */
	public function new3Action($numCompte)
	{
			$compte = $this->getDoctrine()->getRepository('FinanceBackOfficeBundle:Compte')->findOneByNumCompte($numCompte);
			$credit = $this->get('session')->get('credit_'.$numCompte);
			$credit->setCompte($compte)->setDateCredit(new \DateTime("NOW"));
			$this->getDoctrine()->getManager()->persist($credit);
			$this->getDoctrine()->getManager()->flush();
			$this->get('session')->remove('credit_'.$numCompte);
			return $this->redirect($this->generateUrl("credits_index"));
		
	}
	
	/**
	 * @Route("/details_credits/{id}",name="details_credit")
	 * @param unknown_type $id
	 */
	public function detailsCredit($id)
	{
		$credit = $this->getDoctrine()->getRepository("FinanceBackOfficeBundle:Credit")->find($id);
		return $this->render("FinanceBackOfficeBundle:Credits:details.html.twig",array("credit" => $credit));
	}
	
}
