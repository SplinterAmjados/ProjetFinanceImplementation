<?php

namespace Finance\BackOfficeBundle\Repository;

use Doctrine\ORM\EntityRepository;

/**
 * ClientPhysiqueRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class ClientPhysiqueRepository extends EntityRepository
{
	
	public function findClientsStartWith($start_with)
	{
		
		$qb = $this->createQueryBuilder('c')
				->orWhere('c.nom like :start')
				->orWhere('c.prenom like :start')
				->orWhere('c.ncin like :start')
				->orWhere('c.nPasseport like :start')
				->setParameter('start', $start_with.'%')
				->getQuery();
		
		return $qb->execute();
	}
	
}