<?php

namespace Finance\BackOfficeBundle\Controller;

use Symfony\Component\Serializer\Serializer;

use Symfony\Component\Serializer\Normalizer\GetSetMethodNormalizer;

use Symfony\Component\Serializer\Encoder\JsonEncoder;

use Symfony\Component\HttpFoundation\Response;

use Finance\BackOfficeBundle\Form\ClientMoralType;
use Finance\BackOfficeBundle\Form\ClientPhysiqueType;
use Finance\BackOfficeBundle\Entity\ClientMoral;

use Finance\BackOfficeBundle\Entity\ClientPhysique;

use Symfony\Component\HttpFoundation\Request;

use Finance\BackOfficeBundle\Helpers\FilterAndPaginator;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class ClientsController extends Controller {

	/**
	 * @Route("/clients_index" , name="clients_index")
	 */
	public function indexAction() {
		$limit = $this->container->getParameter('nbreParPage');

		$paginator = new FilterAndPaginator($this->get("session"), $limit);

		$clients = $this->getDoctrine()->getManager()
				->getRepository("FinanceBackOfficeBundle:Client")
				->filter($paginator->createPaginator($this->getRequest()));

		return $this
				->render("FinanceBackOfficeBundle:Clients:index.html.twig",
						array("clients" => $clients, "paginator" => $paginator));
	}

	/**
	 * @Route("/new_client",name="new_client")
	 * @Method("get")
	 */
	public function newAction() {
		return $this->render("FinanceBackOfficeBundle:Clients:new.html.twig");
	}

	/**
	 * @Route("/new_client_physique",name="new_client_physique")
	 */
	public function newClientPhysique() {

		$villes = $this->get('CitiesService')->getVilles();
		$request = $this->getRequest();
		$client = new ClientPhysique();
		$form = $this->createForm(new ClientPhysiqueType($villes), $client);
		$erreurs = array();

		if ($request->getMethod() == "POST") {
			$form->handleRequest($request);
			if ($form->isValid()) {
				if ($client->getNcin() == null	&& $client->getNPasseport() == null) {
					$erreurs[] = "Vous devez indiquer soit un ncin ou n° de passeport";
				}

				if (count($erreurs) == 0) {
					$this->get('session')->set('new_client', $client);
					return $this
							->render(
									"FinanceBackOfficeBundle:Clients:new_recap.html.twig",
									array("client" => $client));
				}

			}//End isValid()
 		else {
 			$errors = $this->get('validator')->validate($client);
 			foreach($errors as $e)
 			{
 				$erreurs[] = $e->getMessage();
 			}			 			
			}
		}//End Post
		return $this
				->render(
						"FinanceBackOfficeBundle:Clients:new_client_physique.html.twig",
						array("erreurs" => $erreurs,
								"form" => $form->createView()));
	}

	/**
	 * @Route("/new_client_moral",name="new_client_moral")
	 */
	public function newClientMoral() {
		$villes = $this->get('CitiesService')->getVilles();
		$request = $this->getRequest();
		$client = new ClientMoral();
		$form = $this->createForm(new ClientMoralType($villes), $client);
		$erreurs = array();

		if ($request->getMethod() == "POST") {
			$form->handleRequest($request);
			if ($form->isValid()) {				
				$this->get('session')->set('new_client', $client);
				return $this
						->render(
								"FinanceBackOfficeBundle:Clients:new_recap.html.twig",
								array("client" => $client));

			}//End isValid()
 			else {
 			$errors = $this->get('validator')->validate($client);
 			foreach($errors as $e)
 			{
 				$erreurs[] = $e->getMessage();
 			}
			}
		}//End Post
		return $this
				->render(
						"FinanceBackOfficeBundle:Clients:new_client_moral.html.twig",
						array("erreurs" => $erreurs,
								"form" => $form->createView()));
	}

	/**
	 * @Route("/confirm_new_client",name="confirm_new_client")
	 */
	public function confirm_new_client() {
		if ($this->get('session')->has('new_client')) {
			$client = $this->get('session')->get('new_client');
			$client->setDateCreation(new \DateTime("NOW"))
					->setAgence("Agence INSAT");
			if ($client->getType() == 'physique') {
				if ($client->getNcin() != null)
					$client->setLogin($client->getNcin())
							->setPassword($client->getNcin());
				else
					$client->setLogin($client->getNPasseport())
							->setPassword($client->getNPasseport());
			} else {
				$client->setLogin($client->getIdSoc())
						->setPassword($client->getIdSoc());
			}
			$manager = $this->getDoctrine()->getManager();
			$manager->persist($client);
			$manager->flush();
		}

		return $this->redirect($this->generateUrl("clients_index"));
	}

	/**
	 * @Route("/details_client/{id}", name="details_client")
	 */
	public function getDetailsClient($id) {
		$client = $this->getDoctrine()
				->getRepository("FinanceBackOfficeBundle:Client")->find($id);
		if ($client instanceof ClientPhysique) {
			return $this
					->render(
							"FinanceBackOfficeBundle:Clients:details_client_phy_ajax.html.twig",
							array("client" => $client));
		} else {
			return $this
					->render(
							"FinanceBackOfficeBundle:Clients:details_client_moral_ajax.html.twig",
							array("client" => $client));
		}
	}

	
	/**
	 * @Route("/edit_client_physique/{id}",name="edit_client_physique")
	 */
	public function editClientPhysique($id)
	{
		$client= $this->getDoctrine()->getRepository("FinanceBackOfficeBundle:ClientPhysique")->find($id);
		if ($client == null )
		{
			throw new Exception("Not Found Entity");
		}
		
		$villes = $this->get('CitiesService')->getVilles();
		$request = $this->getRequest();
		$form = $this->createForm(new ClientPhysiqueType($villes), $client);
		$erreurs = array();
		
		if ($request->getMethod() == "POST") {
			$form->handleRequest($request);
			if ($form->isValid()) {
				if ($client->getNcin() == null	&& $client->getNPasseport() == null) {
					$erreurs[] = "Vous devez indiquer soit un ncin ou n° de passeport";
				}
		
				if (count($erreurs) == 0) {
					$this->getDoctrine()->getManager()->persist($client);
					$this->getDoctrine()->getManager()->flush();
					return $this->redirect($this->generateUrl("clients_index"));
				}
		
			}//End isValid()
			else {
				$errors = $this->get('validator')->validate($client);
				foreach($errors as $e)
				{
					$erreurs[] = $e->getMessage();
				}
			}
		}//End Post
		return $this
		->render(
				"FinanceBackOfficeBundle:Clients:edit_client_phy.html.twig",
				array("id" => $id,
						"erreurs" => $erreurs,
						"form" => $form->createView()));		
		
	}
	
	/**
	 * @Route("/edit_client_moral/{id}",name="edit_client_moral")
	 */
	public function editClientMoral($id)
	{
		$client= $this->getDoctrine()->getRepository("FinanceBackOfficeBundle:ClientMoral")->find($id);
		if ($client == null )
		{
			throw new \Exception("Not Found Entity");
		}
		
		$villes = $this->get('CitiesService')->getVilles();
		$request = $this->getRequest();
		$form = $this->createForm(new ClientMoralType($villes), $client);
		$erreurs = array();
		
		if ($request->getMethod() == "POST") {
			$form->handleRequest($request);
			if ($form->isValid()) {
				if (count($erreurs) == 0) {
					$this->getDoctrine()->getManager()->persist($client);
					$this->getDoctrine()->getManager()->flush();
					return $this->redirect($this->generateUrl("clients_index"));
				}
		
			}//End isValid()
			else {
				$errors = $this->get('validator')->validate($client);
				foreach($errors as $e)
				{
					$erreurs[] = $e->getMessage();
				}
			}
		}//End Post
		return $this
		->render(
				"FinanceBackOfficeBundle:Clients:edit_client_moral.html.twig",
				array("client" => $client,
					  "erreurs" => $erreurs,
					  "form" => $form->createView()));
	}
	
	/**
	 * 
	 * @Route("modifier_gerant/{id}",name="modifier_gerant")
	 */
	public function modifierGerantAction($id)
	{
		$client= $this->getDoctrine()->getRepository("FinanceBackOfficeBundle:ClientMoral")->find($id);
		if ($client == null )
		{
			throw new \Exception("Not Found Entity");
		}
		
		return $this->render("FinanceBackOfficeBundle:Clients:modification_gerant.html.twig",
				array("client"=>$client, "erreurs" => array()));
	}
	
	/**
	 *
	 * @Route("desaffecter_gerant/{id}",name="desaffecter_gerant")
	 */
	public function desaffecterGerantAction($id)
	{
		$client= $this->getDoctrine()->getRepository("FinanceBackOfficeBundle:ClientMoral")->find($id);
		if ($client == null )
		{
			throw new \Exception("Not Found Entity");
		}
	
		$client->setGerant(NULL);
		$this->getDoctrine()->getManager()->flush();
		
		return $this->render("FinanceBackOfficeBundle:Clients:modification_gerant.html.twig",
				array("client"=>$client,"erreurs" => array()));
	}
	
	/**
	 * 
	 * @Route("/affecter_gerant/{idSoc}",name="affecter_gerant")
	 * @Method("POST")
	 */
	public function affecterGerant($idSoc)
	{
		$erreurs = array();
		$id_gerant = $this->getRequest()->request->get('gerant');	
		$gerant = $this->getDoctrine()->getRepository("FinanceBackOfficeBundle:ClientPhysique")->find($id_gerant);
		if ($gerant == null)
		{
			$erreurs[] = "Gérant introuvable ";
		}
		$societe = $this->getDoctrine()->getRepository("FinanceBackOfficeBundle:ClientMoral")->find($idSoc);
		if ($societe== null)
		{
			throw new \Exception("Entity Not Found");
		}
		
		if (count($erreurs) == 0 )
		{
		$societe->setGerant($gerant);
		$this->getDoctrine()->getManager()->flush();
		}
		
		return $this->render("FinanceBackOfficeBundle:Clients:modification_gerant.html.twig",
				array("client"=>$societe, "erreurs" => $erreurs));
	
	}
	
	/**
	 * @Route("/get_gerants",name="get_gerants_json")
	 */
	public function getGerant()
	{
		$start_with = $this->getRequest()->request->get('start_With') ;
		
		$clients = $this->getDoctrine()->getRepository("FinanceBackOfficeBundle:ClientPhysique")->findGerantStartWith($start_with);
		
		$encoder = new JsonEncoder();
		$normalizer = new GetSetMethodNormalizer();
		$normalizer->setIgnoredAttributes(array('password','comptes','dateCreation'));
		$serializer = new Serializer(array($normalizer), array($encoder));
		return new Response($serializer->serialize($clients,'json'));
	}
	
}
