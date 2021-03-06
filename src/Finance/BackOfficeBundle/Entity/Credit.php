<?php

namespace Finance\BackOfficeBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Credit
 *
 * @ORM\Table()
 * @ORM\Entity
 */
class Credit
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var integer
     *
     * @ORM\Column(name="type", type="integer")
     */
    private $type;

    /**
     * @var float
     *
     * @ORM\Column(name="montant", type="float")
     */
    private $montant;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date_credit", type="date")
     */
    private $dateCredit;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date_derniere_echeance", type="date")
     */
    private $dateDerniereEcheance;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date_premiere_echeance", type="date")
     */
    private $datePremiereEcheance;

    /**
     * @var float
     *
     * @ORM\Column(name="tranche", type="float")
     */
    private $tranche;

    /**
     * @var float
     *
     * @ORM\Column(name="tauxInteret", type="float")
     */
    private $tauxInteret;

    /**
     * @var string
     *
     * @ORM\Column(name="autreDetails", type="text" , nullable= true)
     */
    private $autreDetails;

	/**
	 * 
	 * @ORM\ManyToOne(targetEntity="Compte" , inversedBy="credits")
	 */
    private $compte ;
    
    
    public static $types = array (
    		1 => 'I. Acquisition de terrain',
    		2 => 'I. Acquisition d\'un logement',
    		3 => 'V. Achat d\'une véhicule',
    		5 => 'Consomation',
    		6 => 'Investissement'
    		);
    
    
    
    public function getDateDerniereEcheanceSimple()
    {
    	return $this->dateDerniereEcheance->format("d/M/Y");
    }
    
    public function getDatePremiereEcheanceSimple()
    {
    	return $this->datePremiereEcheance->format("d/M/Y");
    }
    
    public function getDateCreditSimple()
    {
    	return $this->dateCredit->format("d/M/Y");
    }
    
    public function getTypes()
    {
    	return self::$types;
    }
    
    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set type
     *
     * @param integer $type
     * @return Credit
     */
    public function setType($type)
    {
        $this->type = $type;

        return $this;
    }

    /**
     * Get type
     *
     * @return integer 
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * Set montant
     *
     * @param float $montant
     * @return Credit
     */
    public function setMontant($montant)
    {
        $this->montant = $montant;

        return $this;
    }

    /**
     * Get montant
     *
     * @return float 
     */
    public function getMontant()
    {
        return $this->montant;
    }

    /**
     * Set dateCredit
     *
     * @param \DateTime $dateCredit
     * @return Credit
     */
    public function setDateCredit($dateCredit)
    {
        $this->dateCredit = $dateCredit;

        return $this;
    }

    /**
     * Get dateCredit
     *
     * @return \DateTime 
     */
    public function getDateCredit()
    {
        return $this->dateCredit;
    }

    /**
     * Set dateDerniereEcheance
     *
     * @param \DateTime $dateDerniereEcheance
     * @return Credit
     */
    public function setDateDerniereEcheance($dateDerniereEcheance)
    {
        $this->dateDerniereEcheance = $dateDerniereEcheance;

        return $this;
    }

    /**
     * Get dateDerniereEcheance
     *
     * @return \DateTime 
     */
    public function getDateDerniereEcheance()
    {
        return $this->dateDerniereEcheance;
    }

    /**
     * Set datePremiereEcheance
     *
     * @param \DateTime $datePremiereEcheance
     * @return Credit
     */
    public function setDatePremiereEcheance($datePremiereEcheance)
    {
        $this->datePremiereEcheance = $datePremiereEcheance;

        return $this;
    }

    /**
     * Get datePremiereEcheance
     *
     * @return \DateTime 
     */
    public function getDatePremiereEcheance()
    {
        return $this->datePremiereEcheance;
    }

    /**
     * Set tranche
     *
     * @param float $tranche
     * @return Credit
     */
    public function setTranche($tranche)
    {
        $this->tranche = $tranche;

        return $this;
    }

    /**
     * Get tranche
     *
     * @return float 
     */
    public function getTranche()
    {
        return $this->tranche;
    }

    /**
     * Set tauxInteret
     *
     * @param float $tauxInteret
     * @return Credit
     */
    public function setTauxInteret($tauxInteret)
    {
        $this->tauxInteret = $tauxInteret;

        return $this;
    }

    /**
     * Get tauxInteret
     *
     * @return float 
     */
    public function getTauxInteret()
    {
        return $this->tauxInteret;
    }

    /**
     * Set autreDetails
     *
     * @param string $autreDetails
     * @return Credit
     */
    public function setAutreDetails($autreDetails)
    {
        $this->autreDetails = $autreDetails;

        return $this;
    }

    /**
     * Get autreDetails
     *
     * @return string 
     */
    public function getAutreDetails()
    {
        return $this->autreDetails;
    }

    /**
     * Set compte
     *
     * @param \Finance\BackOfficeBundle\Entity\Compte $compte
     * @return Credit
     */
    public function setCompte(\Finance\BackOfficeBundle\Entity\Compte $compte = null)
    {
        $this->compte = $compte;

        return $this;
    }

    /**
     * Get compte
     *
     * @return \Finance\BackOfficeBundle\Entity\Compte 
     */
    public function getCompte()
    {
        return $this->compte;
    }
}
