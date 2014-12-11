<?php
namespace Finance\BackOffice\FataFixtures\ORM;

use Finance\BackOfficeBundle\Entity\ClientPhysique;

use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Finance\BackOfficeBundle\Entity\Compte;

class ClientsPhysiques implements FixtureInterface {

	
	public function load(ObjectManager $manager)
	{
		
		$client = new ClientPhysique();
		$client->setAdresse("33 Rue de Holland")
				->setCodePostal(2068)
				->setDateCreation(new \DateTime("NOW"))	
				->setTel("71471622")
				->setVille("El mourouj")
				->setNcin("07179349")
				->setNom("Nouira")
				->setPrenom("Amjed");
		$manager->persist($client);	
		
		$client1 = new ClientPhysique();
		$client1->setAdresse("301 Rue de Paris")
		->setCodePostal(2074)
		->setDateCreation(new \DateTime("NOW"))
		->setTel("71462622")
		->setVille("Ben Arous")
		->setNcin("07279349")
		->setNom("Salah")
		->setPrenom("Med");
		$manager->persist($client1);
		
		$client2 = new ClientPhysique();
		$client2->setAdresse("Appart1 Résidence el Amél")
		->setCodePostal(2074)
		->setDateCreation(new \DateTime("NOW"))
		->setTel("71462622")
		->setVille("Ben Arous")
		->setNcin("07136549")
		->setNom("Ammar")
		->setPrenom("Med Ali");
		$manager->persist($client2);
		
		$client3 = new ClientPhysique();
		$client3->setAdresse("Avenu Suisse")
		->setCodePostal(2074)
		->setDateCreation(new \DateTime("NOW"))
		->setTel("71462622")
		->setVille("Tunis")
		->setNom("Berrais")
		->setNcin("02379349")
		->setPrenom("Amin");
		$manager->persist($client3);
		
				
		
		
		// ****** Création des comptes  ******* //
		
		$compte = new Compte();
		$compte->setActive(true)->setDateCreation(new \DateTime("NOW"))->setNumCompte("96325452665478925685")
		->setSolde(10000.520)->setType("CC")->addProprietaire($client)->addProprietaire($client2);
		$manager->persist($compte);
		
		$compte1 = new Compte();
		$compte1->setActive(true)->setDateCreation(new \DateTime("NOW"))->setNumCompte("452665478925685")
		->setSolde(5000.900)->setType("CE")->addProprietaire($client);
		$manager->persist($compte1);
		
		$compte2 = new Compte();
		$compte2->setActive(true)->setDateCreation(new \DateTime("NOW"))->setNumCompte("35791452665478925685")
		->setSolde(50000.100)->setType("CC")->addProprietaire($client2);
		$manager->persist($compte2);
		
		$compte3 = new Compte();
		$compte3->setActive(true)->setDateCreation(new \DateTime("NOW"))->setNumCompte("12963452665478925685")
		->setSolde(600.163)->setType("CC")->addProprietaire($client3);
		$manager->persist($compte3);
		
		
		$manager->flush();
		
	}
	
	
}
