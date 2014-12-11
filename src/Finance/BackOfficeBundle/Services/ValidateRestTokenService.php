<?php

namespace Finance\BackOfficeBundle\Services;

use Symfony\Component\HttpFoundation\RequestStack;

use Doctrine\ORM\EntityManager;

class ValidateRestTokenService {

	private $_em ;
	
	private $requestStack ;
	
	public function __construct(EntityManager $em,RequestStack $request)
	{
		$this->_em = $em ;
		$this->requestStack = $request ;
	}
	
	
	public function validate($login,$jeton)
	{
		$token = $this->_em->getRepository("FinanceBackOfficeBundle:Token")->findOneByValue($jeton);
		$valide_token = true ;
		
		if ($token == null)
		{
			$valide_token = false ;
		}else
		{
			if ($token->getIpInit() != $this->requestStack->getCurrentRequest()->server->get('REMOTE_ADDR'))
			{
				
				$valide_token = false ;
			}else
			{
				if($login != $token->getClient()->getLogin())
				{
					$valide_token = false ;
				}
			}
		}
		
		return $valide_token ;
	}
	
}