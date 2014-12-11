<?php
namespace Finance\BackOfficeBundle\Controller;

use Finance\BackOfficeBundle\Entity\Transaction;

use Symfony\Component\HttpFoundation\Session\Session;

use Finance\BackOfficeBundle\Entity\Compte;

use Symfony\Component\Serializer\Serializer;

use Symfony\Component\Serializer\Normalizer\GetSetMethodNormalizer;

use Symfony\Component\Serializer\Encoder\JsonEncoder;

use Symfony\Component\HttpFoundation\Response;

use Finance\BackOfficeBundle\Helpers\FilterAndPaginator;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;


class ComptesController extends Controller {

	
	/**
	 * @Route("/comptes_index", name="comptes_index")
	 */
	public function indexAction()
	{
		
	$limit = $this->container->getParameter('nbreParPage');		
	$paginator = new FilterAndPaginator($this->get("session"),$limit);

	$comptes = $this->getDoctrine()
		->getManager()
		->getRepository("FinanceBackOfficeBundle:Compte")
		->filter($paginator->createPaginator($this->getRequest())); 
	
	
	return $this->render("FinanceBackOfficeBundle:Comptes:index.html.twig",
			array( 'comptes' => $comptes , 'paginator' => $paginator )
			);
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
	 * @Method("post")
	 */
	public function new2Action()
	{
		
		$props = $this->getRequest()->request->get('proprietaires');
		$t =  $this->getRequest()->request->get('type');		
		if ($t == 'epargne') $type = 'CE' ; else $type = 'CC' ;	
		$compte = new Compte();
		$compte->setType($type);		
		$clients = array();
		foreach($props as $p)
		{
			$clients[] = $this->getDoctrine()->getRepository("FinanceBackOfficeBundle:ClientPhysique")->find($p);
		}
		$compte->setProprietaires($clients);
		$compte->generateNumCompte();
		$compte->setActive(false)->setDateCreation(new \DateTime("NOW"))->setSolde(0);
		$manager = $this->getDoctrine()->getManager() ;		
		$manager->persist($compte);
		$manager->flush();				
		return $this->render("FinanceBackOfficeBundle:Comptes:new2.html.twig",array('compte' => $compte));
	}
	
	/**
	 * @Route("/confirm_new_account/{id}", name = "confim_ajout_compte")
	 * 
	 */
	public function new3Action($id)
	{
		
		$compte = $this->getDoctrine()->getRepository("FinanceBackOfficeBundle:Compte")->findOneByNumCompte($id);
		$compte->setActive(true)->setDateCreation(new \DateTime("NOW")) ;
		
		$manager = $this->getDoctrine()->getManager() ;

		$manager->persist($compte);
		$manager->flush();
		return $this->redirect($this->generateUrl('comptes_index'));
	}
	
	
	/**
	 * 
	 * @Route("/details_compte/{id}",name="details_compte")
	 */
	public function getDetails($id)
	{
		$compte = $this->getDoctrine()->getRepository("FinanceBackOfficeBundle:Compte")->find($id);
	
		return $this->render("FinanceBackOfficeBundle:Comptes:details_compte_ajax.html.twig",array('compte' => $compte));
			
	}
	
	/**
	 * @Route("/get_physiques_clients_json" , name ="get_physiques_clients_json")
	 */
	public function getPhysiquesClientJsonAction()
	{
		$start_with = $this->getRequest()->request->get('start_With') ;
		
		$clients = $this->getDoctrine()->getRepository("FinanceBackOfficeBundle:ClientPhysique")->findClientsStartWith($start_with);

		$encoder = new JsonEncoder();
		$normalizer = new GetSetMethodNormalizer();
		$normalizer->setIgnoredAttributes(array('password','comptes','dateCreation'));
		$serializer = new Serializer(array($normalizer), array($encoder));
		return new Response($serializer->serialize($clients,'json'));
		
	}
	
	//Ajouter des contraintes sur action : debit ou credit
	/**
	 * @Route("/transaction/{action}/{numCompte}", name="debiterCrediter")
	 */
	public function debitcrediterAction($action,$numCompte)
	{
		$compte = $this->getDoctrine()->getRepository("FinanceBackOfficeBundle:Compte")->findOneByNumCompte($numCompte);
		$erreurs = array();
		
		
		if ($this->getRequest()->getMethod() == "POST")
		{
			$transaction = new Transaction();
			$montant = $this->getRequest()->request->get('montant');
			if (is_numeric($montant))
			{
				$montant = (float) $montant ;
				if ($action == "debit")
				{
					if ($montant <= $compte->getSolde())
					{
					
					$compte->debit($montant);
					$transaction->setCompte($compte)->setDate(new \DateTime("NOW"))->setMontant($montant)->setType("Retrait")->setDetails("");
					$this->getDoctrine()->getManager()->persist($compte);
					$this->getDoctrine()->getManager()->persist($transaction);
					$this->getDoctrine()->getManager()->flush();
					}else
					{
						$erreurs[] = 'Le solde est insuffisant';
					}
				}else
				{
					$compte->credit($montant);
					$transaction->setCompte($compte)->setDate(new \DateTime("NOW"))->setMontant($montant)->setType("Versement")->setDetails("");
					$this->getDoctrine()->getManager()->persist($compte);
					$this->getDoctrine()->getManager()->persist($transaction);
					$this->getDoctrine()->getManager()->flush();
				}
			}else
			{
				$erreurs[] = 'Le montant doit être numérique';
			}	
			
			if (count($erreurs) == 0 )
			{
				// return recu
				
				$html = $this->renderView("FinanceBackOfficeBundle:Comptes:recu.pdf.twig");
				
				return new Response(
   					 $this->get('knp_snappy.pdf')->getOutputFromHtml($html),
    				 200,
    				 array(
       					 'Content-Type'          => 'application/pdf',
        				 'Content-Disposition'   => 'attachment; filename="file.pdf"'
  				  )
					);
			}
			
		}
		return $this->render("FinanceBackOfficeBundle:Comptes:debit_credit_compte.html.twig",array("compte"=>$compte , "action" => $action , "erreurs" => $erreurs));
	}
	
	
}
