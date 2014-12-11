<?php
namespace Finance\BackOfficeBundle\Controller;

use Finance\BackOfficeBundle\Services\ValidateRestTokenService;

use Finance\BackOfficeBundle\Entity\Token;

use Symfony\Component\Serializer\Serializer;
use Symfony\Component\Serializer\Encoder\XmlEncoder;
use Symfony\Component\Serializer\Encoder\JsonEncoder;
use Symfony\Component\Serializer\Normalizer\GetSetMethodNormalizer;

use Symfony\Component\HttpFoundation\Response;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;


class ClientRestController extends Controller {
	
	
	/**
	 * @param $login string 
	 * @param $jeton string
	 * @return json if it's ok you get  the details of the client , else you get code = 0 
	 * 
	 * @Route("/rest/client/{login}/{token}",name="get_json_client")
	 * @Method("GET")
	 */
	public function getClientAction($login,$token)
	{
		$validateToken = $this->get('tokenValidatorService');		
		$valide_token = $validateToken->validate($login, $token);
		
		if ($valide_token){
		$encoder = new JsonEncoder();
		$normalizer = new GetSetMethodNormalizer();
		$normalizer->setIgnoredAttributes(array('password','comptes','id','dateCreation'));
		$serializer = new Serializer(array($normalizer), array($encoder));		
		$client = $this->getDoctrine()->getRepository("FinanceBackOfficeBundle:Client")->findByLogin($login);		
		return new Response($serializer->serialize($client,'json'));
		}
		$reponse['code'] = '0' ;
		return new Response(json_encode($reponse));
	
	}
	
	/**
	 * @param $login string
	 * @param $pw : The password hached md5() once
	 * @return json if it's ok you get  code = 1 et token = the_generated_token , else you get code = 0 
	 * 
	 * @Route("/rest/login/{login}/{pw}",name="rest_login")
	 * @Method("GET")
	 */
	public function loginJsonAction($login,$pw)
	{
		$client = $this->getDoctrine()->getRepository("FinanceBackOfficeBundle:Client")->findOneByLogin($login);
		
		if ($client != null)
		{
			if ($client->getPassword() == md5($pw) )
			{
				$token = new Token();
				$token->setClient($client)
					  ->setDateCreation(new \DateTime("NOW"))
					  ->setValide(true)
					  ->setIpInit($this->getRequest()->server->get('REMOTE_ADDR'))
					  ->setValue($token->getIpInit()."*".$token->getDateCreation()->format("YmdHis")."*".$login);
				
				$this->getDoctrine()->getManager()->persist($token);
				$this->getDoctrine()->getManager()->flush();
				
				//Ok
				$reponse['token'] = $token->getValue();
				$reponse['code'] = '1';
				return new Response(json_encode($reponse));
			}
		}
	//Not Ok
	$reponse['code'] = '0';
	$reponse['token'] = "";
	return new Response(json_encode($reponse));
	}

	
	
	
	/**
	 * @Route("/rest/comptes/{login}/{token}")
	 * @Method("GET")
	 */
	public function getComptes($login,$token)
	{
		$validateToken = $this->get('tokenValidatorService');
		$valide_token = $validateToken->validate($login, $token);
		
		
		if ($valide_token)
		{		
			$comptes = $this->getDoctrine()->getRepository("FinanceBackOfficeBundle:Compte")->findByLogin($login) ;			
			$encoder = new JsonEncoder();
			$normalizer = new GetSetMethodNormalizer();
			$normalizer->setIgnoredAttributes(array('id','dateCreation','proprietaires','transactions','credits'));
			$serializer = new Serializer(array($normalizer), array($encoder));
			
			return new Response($serializer->serialize($comptes,'json'));
		}
		else
		{
			$reponse['code'] = '0' ;
			return new Response(json_encode($reponse));
		}
		
			
	}


	/**
	 * @Route("/rest/transactions/{login}/{numCompte}/{token}")
	 * @Method("GET")
	 */
	public function getTransactions($login,$numCompte,$token)
	{
		$validateToken = $this->get('tokenValidatorService');
		$valide_token = $validateToken->validate($login, $token);
		
		
		if ($valide_token)
		{
			$compte = $this->getDoctrine()->getRepository("FinanceBackOfficeBundle:Compte")->findOneByNumCompte($numCompte) ;
			
			if ($compte == null)
			{
				
				$reponse['code'] = '0' ;
				return new Response(json_encode($reponse));
			}
			
			foreach ($compte->getProprietaires() as $pro)
			{
				if ($pro->getLogin() == $login)
				{
					break ;
				}
				$reponse['code'] = '0' ;
				return new Response(json_encode($reponse));
			}
			
			$transactions = $this->getDoctrine()->getRepository("FinanceBackOfficeBundle:Transaction")->findByCompte($compte) ;
			$encoder = new JsonEncoder();
			$normalizer = new GetSetMethodNormalizer();
			$normalizer->setIgnoredAttributes(array('id','date','compte'));
			$serializer = new Serializer(array($normalizer), array($encoder));
				
			return new Response($serializer->serialize($transactions,'json'));
		}
		else
		{
			$reponse['code'] = '0' ;
			return new Response(json_encode($reponse));
		}
	}


	/**
	 * @Route("/rest/credits/{login}/{numCompte}/{token}")
	 * @Method("GET")
	 */
	public function getCredits($login,$numCompte,$token)
	{
		$validateToken = $this->get('tokenValidatorService');
		$valide_token = $validateToken->validate($login, $token);
		
		if ($valide_token)
		{
			$compte = $this->getDoctrine()->getRepository("FinanceBackOfficeBundle:Compte")->findOneByNumCompte($numCompte) ;
				
			if ($compte == null)
			{
		
				$reponse['code'] = '0' ;
				return new Response(json_encode($reponse));
			}
				
			foreach ($compte->getProprietaires() as $pro)
			{
				if ($pro->getLogin() == $login)
				{
					break ;
				}
				$reponse['code'] = '0' ;
				return new Response(json_encode($reponse));
			}
				
			$credits = $this->getDoctrine()->getRepository("FinanceBackOfficeBundle:Credit")->findByCompte($compte) ;
			$encoder = new JsonEncoder();
			$normalizer = new GetSetMethodNormalizer();
			$normalizer->setIgnoredAttributes(array('compte','datePremiereEcheance','dateDerniereEcheance','dateCredit','types'));
			$serializer = new Serializer(array($normalizer), array($encoder));
		
			return new Response($serializer->serialize($credits,'json'));
		}
		else
		{
			$reponse['code'] = '0' ;
			return new Response(json_encode($reponse));
		}
		
	}
	

}
