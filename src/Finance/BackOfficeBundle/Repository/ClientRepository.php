<?php
namespace Finance\BackOfficeBundle\Repository;

use Doctrine\ORM\Query\Expr\Join;

use Finance\BackOfficeBundle\Helpers\FilterAndPaginator;

use Doctrine\ORM\EntityRepository;




class ClientRepository extends EntityRepository
{

	
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
					case 'ville' : $query->andWhere(' c.ville = :ville ')->setParameter('ville',$value) ;  break ;
					case 'id_compte' : $query->join('c.comptes','co', Join::WITH , 'co.numCompte like :id_compte' )->setParameter('id_compte', $value.'%'); break ;
					case 'nature_client' : if ( $value == 'client_moral' ){
						$query->select('cl')->from('FinanceBackOfficeBundle:ClientMoral','cl')->andWhere("cl.id = c.id") ;
					}elseif( $value == 'client_physique' ){
						$query->select('cl')->from('FinanceBackOfficeBundle:ClientPhysique','cl')->andWhere("cl.id = c.id") ;
					}
					; break ;					
					case 'nom_client' : $query->andWhere('cl.nom like :nom')->setParameter('nom', $value.'%'); break ;
					case 'prenom_client' : $query->andWhere('cl.prenom like :prenom')->setParameter('prenom', $value.'%'); break ;
					case 'ncin_client' : $query->andWhere('cl.ncin = :ncin')->setParameter('ncin', $value); break ;
					case 'raison_social' : $query->andWhere('cl.raisonSocial like :rs')->setParameter('rs', $value.'%'); break ;
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
