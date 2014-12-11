<?php
namespace Finance\BackOfficeBundle\Helpers;


use Symfony\Component\HttpFoundation\Session\Session;

use Symfony\Component\HttpFoundation\Request;

class FilterAndPaginator {
	
	private $session ;
	
	public $criteres ;
	
	public $page ;
	
	public $limit ;
	
	
	
	public function __construct(Session $session,$limit)
	{
		$this->limit = $limit ;
		$this->page = $session->get('page',0) ;
		$this->criteres = $session->get('criteres',array());
		$this->session = $session ;
		
	}
	
	public function createPaginator(Request $request)
	{
		
		if ($request->getMethod() == "POST")
		{
			
			$this->criteres = array();
			foreach ( $request->request->getIterator() as $key => $value )
			{
				$this->criteres[$key] = $value ;
			}
			$this->page = 0 ;
		}else
		{
			if ($request->query->has('page') && $request->query->get('page') >= 0)
			{
				
				$this->page = $request->query->get('page');
			}else 
			{
				$this->criteres = array();
				$this->page = 0 ;
			}
		}
		$this->session->set('page',$this->page);
		$this->session->set('criteres',$this->criteres);
		return $this ;
	} 
	
	public function getNbrePage()
	{
		if ($this->session->has('nbrePage'))
		{
			return $this->session->get('nbrePage') ;
		}else
		{
			throw new \Exception("Exception : Nombre de Pages est inconnu");
		}
	}
	
	public function setNbrePage($n)
	{
		$this->session->set('nbrePage', $n);
	}

}
