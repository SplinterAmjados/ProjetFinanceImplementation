<?php
namespace Finance\BackOfficeBundle\DataFixtures\ORM;
use Finance\BackOfficeBundle\Entity\Compte;

use Finance\BackOfficeBundle\Entity\ClientPhysique;

use Finance\BackOfficeBundle\Entity\ClientMoral;

use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;

class ClientsMorales implements FixtureInterface {
	
	
	public function load(ObjectManager $manager) {
		
		$client = new ClientMoral();
		$gerant = new ClientPhysique();
		$gerant->setAdresse("Adresse gerant 1")->setCodePostal(2362)->setNcin("07136249")
		->setDateCreation(new \DateTime("NOW"))->setVille("Tunis")
		->setTel("20362126")->setPrenom("Yessine")->setNom("Ammar");
		
		$client->setAdresse("Rue X Charguia 1")
		->setCodePostal(2010)
		->setDateCreation(new \DateTime("NOW"))
		->setTel("71421622")
		->setVille("ArianaEl mourouj")
		->setIdSoc("XCDDE25")
		->setGerant($gerant)
		->setRaisonSocial("Talan Tunisie");
		$manager->persist($client);
		
		$client1 = new ClientMoral();
		$gerant1 = new ClientPhysique();
		$gerant1->setAdresse("Adresse gerant 2")->setCodePostal(26962)->setNcin("07636249")
		->setDateCreation(new \DateTime("NOW"))->setVille("Arian")
		->setTel("28362126")->setPrenom("Med Ali")->setNom("Remli");
		
		$client1->setAdresse("Rue de la terre Lac2")
		->setCodePostal(1026)
		->setDateCreation(new \DateTime("NOW"))
		->setTel("55336620")
		->setVille("Tunis")
		->setIdSoc("PSDS125")
		->setGerant($gerant1)
		->setRaisonSocial("Vermeg");
		$manager->persist($client1);
		
		$client2 = new ClientMoral();
		$gerant2 = new ClientPhysique();
		$gerant2->setAdresse("Adresse gerant 3")->setCodePostal(26962)->setNcin("06136249")
		->setDateCreation(new \DateTime("NOW"))->setVille("Ben Arouss")
		->setTel("58362126")->setPrenom("Majdi")->setNom("Razi");
		
		$client2->setAdresse("Rue 9rib lel fac")
		->setCodePostal(2074)
		->setDateCreation(new \DateTime("NOW"))
		->setTel("71022622")
		->setVille("Ariana")
		->setIdSoc("PMLS125")
		->setGerant($gerant2)
		->setRaisonSocial("LineData");
		$manager->persist($client2);
		
		$client3 = new ClientMoral();
		$gerant3 = new ClientPhysique();
		$gerant3->setAdresse("Adresse gerant 4")->setCodePostal(2602)->setNPasseport("0CSF713QS6249ZZ")
		->setDateCreation(new \DateTime("NOW"))->setVille("Sousse")
		->setTel("68362126")->setPrenom("Fares")->setNom("Jemli");
		
		$client3->setAdresse("Win el kochkk")
		->setCodePostal(2074)
		->setDateCreation(new \DateTime("NOW"))
		->setTel("71462622")
		->setVille("Ben Arouss")
		->setIdSoc("OLDS125")
		->setGerant($gerant3)
		->setRaisonSocial("Societe. Nouira");
		$manager->persist($client3);
		
		
		
		// ****** Création des comptes  ******* //
		
		$compte = new Compte();
		$compte->setActive(true)->setDateCreation(new \DateTime("NOW"))
		->setSolde(1000)->setType("CC")->addProprietaire($client)
		->setNumCompte("21321452665478925145");
		$manager->persist($compte);
		
		$compte1 = new Compte();
		$compte1->setActive(true)->setDateCreation(new \DateTime("NOW"))
		->setSolde(100000.900)->setType("CC")->addProprietaire($client)
		->setNumCompte("21123452665478925145");
		$manager->persist($compte1);
		
		$compte2 = new Compte();
		$compte2->setActive(true)->setDateCreation(new \DateTime("NOW"))
		->setSolde(50000.100)->setType("CC")->addProprietaire($client1)
		->setNumCompte("15921452665478925685");
		$manager->persist($compte2);
		
		$compte3 = new Compte();
		$compte3->setActive(true)->setDateCreation(new \DateTime("NOW"))
		->setSolde(150000.163)->setType("CC")->addProprietaire($client2)
		->setNumCompte("26921452665478925685");
		$manager->persist($compte3);
		
		$compte4 = new Compte();
		$compte4->setActive(true)->setDateCreation(new \DateTime("NOW"))
		->setSolde(200000.620)->setType("CC")->addProprietaire($client3)
		->setNumCompte("12398745665478925685");
		$manager->persist($compte4);
		
		
		$manager->flush();

	}

}
