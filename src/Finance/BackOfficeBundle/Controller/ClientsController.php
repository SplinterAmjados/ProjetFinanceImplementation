<?php



namespace Finance\BackOfficeBundle\Controller;

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
	public function indexAction()
	{	
		$limit = $this->container->getParameter('nbreParPage');
		
		$paginator = new FilterAndPaginator($this->get("session"),$limit);
		
		$clients = $this->getDoctrine()
		->getManager()
		->getRepository("FinanceBackOfficeBundle:Client")
		->filter($paginator->createPaginator($this->getRequest()));
		
		return $this->render("FinanceBackOfficeBundle:Clients:index.html.twig",
				array("clients"=>$clients,
						"paginator" => $paginator
						));
	}
	
	/**
	 * @Route("/new_client",name="new_client")
	 * @Method("get")
	 */
	public function newAction()
	{
		$form_moral = $this->createForm(new ClientMoralType(),new ClientMoral());
		
		$form_physique = $this->createForm(new ClientPhysiqueType(),new ClientPhysique());
		
		return $this->render("FinanceBackOfficeBundle:Clients:new.html.twig",
				array("form_moral" => $form_moral->createView(),
					  "form_physique" => $form_physique->createView()
						)
				);
	}
	
	/**
	 * @Route("/new_client_2",name="new_client_2")
	 * @Method("POST")
	 */
	public function new2Action(Request $request)
	{
		
		if ( $request->request->get('natureClient') )
		{
			$client = new ClientPhysique();
			$form = $this->createForm(new ClientPhysiqueType(),$client);
			$form->handleRequest($request);
		}else
		{
			$client = new ClientMoral();
			$form = $this->createForm(new ClientMoralType(),$client);
			$form->handleRequest($request);
		}
		
		return $this->render("FinanceBackOfficeBundle:Clients:new2.html.twig");
	}
	
	
	/**
	 * @Route("/details_client/{id}", name="details_client")
	 */
	public function getDetailsClient($id)
	{
		$client = $this->getDoctrine()->getRepository("FinanceBackOfficeBundle:Client")->find($id);
		if ($client instanceof ClientPhysique )
		{
		return $this->render("FinanceBackOfficeBundle:Clients:details_client_phy_ajax.html.twig",array("client" => $client));
		}
		else
		{
		return $this->render("FinanceBackOfficeBundle:Clients:details_client_moral_ajax.html.twig",array("client" => $client));		
		}
	}
	

}
