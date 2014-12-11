<?php
namespace Finance\BackOfficeBundle\Repository;


use Finance\BackOfficeBundle\Helpers\FilterAndPaginator;

use Doctrine\ORM\Query\Expr\Join;

use Doctrine\ORM\EntityRepository;

class CompteRepository extends EntityRepository {

	public function findByLogin($login)
	{
		$qb = $this->createQueryBuilder("c")
			 ->join("c.proprietaires", "p" , Join::WITH , "p.login = :login")
			 ->setParameter("login", $login) ;		
		return $qb->getQuery()->execute();			 
	}
	
	
	public function filter(FilterAndPaginator $paginator)
	{
		$query = $this->createQueryBuilder('c') ;
		// Construction de la requete $query
		foreach($paginator->criteres as $key => $value)
		{
			if ($value != NULL && trim($value) != '' )
			{
				switch($key)
				{
					case 'num_compte' : $query->andWhere('c.numCompte = :numCompte')->setParameter('numCompte', $value);break ;
					//case 'id_titulaire' : $query->join('c.proprietaires','p',Join::WITH , 'p.ncin = :id_titulaire')->setParameter('id_titulaire', $value);break ;
					case 'solde_min' : $query->andWhere('c.solde >= :solde_min')->setParameter('solde_min', $value); break ;
					case 'solde_max' : $query->andWhere('c.solde <= :solde_max')->setParameter('solde_max', $value); break ;
					case 'type' :$type = null ;
								if ($value == 'epargne') $type = 'CE' ;
								if ($value == 'courant' ) $type ='CC';
								if ($type != null)
								{
								$query->andWhere('c.type = :type')->setParameter('type', $type) ;
								}
								break;
				}
			}
		}
		//Recupération du résultat dans $result
		
		$result = $query->setMaxResults($paginator->limit)
		->setFirstResult($paginator->page * $paginator->limit)
		->getQuery()->execute();
		
		//Recupération du nombre de page total satisfisant la requete dans $nbrePages
		$n = (int)  $query->select('count(c)')->setFirstResult(0)->setMaxResults(null)->getQuery()->getSingleScalarResult();
		$nbrePages = (int) ($n / $paginator->limit);
		if($n % $paginator->limit > 0) $nbrePages++;
		$paginator->setNbrePage($nbrePages);
		
		//Return
		return $result ;
	}
	
}
