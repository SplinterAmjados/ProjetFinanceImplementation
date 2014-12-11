<?php
namespace Finance\BackOfficeBundle\Entity;
use Doctrine\ORM\Mapping as ORM;


/**
 * 
 * @author Splinter
 * @ORM\Entity(repositoryClass="Finance\BackOfficeBundle\Repository\ClientPhysiqueRepository")
 * @ORM\Table(name="clients_physiques")
 */

class ClientPhysique extends Client {

	/**
	 * @var string
     *
     * @ORM\Column(name="nom", type="string")
	 */
	private $nom ;
	
	/**
	 * @var string
	 *
	 * @ORM\Column(name="prenom", type="string")
	 */
	private $prenom ;
	

	/**
	 * 
	 * @var string
	 * @ORM\Column(name="ncin", type="string" , length=8 , nullable=true)
	 */
	private $ncin;
	
	/**
	 *
	 * @var string
	 * @ORM\Column(name="npasseport", type="string" , length = 20 , nullable=true)
	 */
	private $nPasseport;
	
	
	
	/**
	 * @ORM\Column(name="fonction", type="string" , length = 50 )
	 */
	private $fonction;
	
	/**
	 * @ORM\Column(name="etablissement",type="string", length = 100 )
	 * @var unknown_type
	 */
	private $etablissement;
	
	/**
	 *
	 * @ORM\Column(name="nationnalite", type="string" , length = 30 )
	 */
	private $nationnalite ;
	
	/**
	 *
	 * @ORM\Column(name="date_naissance", type="date" )
	 */
	private $dateNaissance ;
	
	public function getNomPrenomOuRSocial()
	{
		return $this->nom." ".$this->prenom ;
	}
	
	public function getRealIdClient()
	{
		if ($this->ncin != NULL) return $this->ncin ;
		elseif ($this->nPasseport != null ) return $this->nPasseport ;
		return "n-a" ;
	}
	
    /**
     * Set nom
     *
     * @param string $nom
     * @return ClientPhysique
     */
    public function setNom($nom)
    {
        $this->nom = $nom;

        return $this;
    }

    /**
     * Get nom
     *
     * @return string 
     */
    public function getNom()
    {
        return $this->nom;
    }

    /**
     * Set prenom
     *
     * @param string $prenom
     * @return ClientPhysique
     */
    public function setPrenom($prenom)
    {
        $this->prenom = $prenom;

        return $this;
    }

    /**
     * Get prenom
     *
     * @return string 
     */
    public function getPrenom()
    {
        return $this->prenom;
    }
    
   

    /**
     * Set ncin
     *
     * @param string $ncin
     * @return ClientPhysique
     */
    public function setNcin($ncin)
    {
        $this->ncin = $ncin;

        return $this;
    }

    /**
     * Get ncin
     *
     * @return string 
     */
    public function getNcin()
    {
        return $this->ncin;
    }

    /**
     * Set nPasseport
     *
     * @param string $nPasseport
     * @return ClientPhysique
     */
    public function setNPasseport($nPasseport)
    {
        $this->nPasseport = $nPasseport;

        return $this;
    }

    /**
     * Get nPasseport
     *
     * @return string 
     */
    public function getNPasseport()
    {
        return $this->nPasseport;
    }

    /**
     * Set fonction
     *
     * @param string $fonction
     * @return ClientPhysique
     */
    public function setFonction($fonction)
    {
        $this->fonction = $fonction;

        return $this;
    }

    /**
     * Get fonction
     *
     * @return string 
     */
    public function getFonction()
    {
        return $this->fonction;
    }

    /**
     * Set etablissement
     *
     * @param string $etablissement
     * @return ClientPhysique
     */
    public function setEtablissement($etablissement)
    {
        $this->etablissement = $etablissement;

        return $this;
    }

    /**
     * Get etablissement
     *
     * @return string 
     */
    public function getEtablissement()
    {
        return $this->etablissement;
    }

    /**
     * Set nationnalite
     *
     * @param string $nationnalite
     * @return ClientPhysique
     */
    public function setNationnalite($nationnalite)
    {
        $this->nationnalite = $nationnalite;

        return $this;
    }

    /**
     * Get nationnalite
     *
     * @return string 
     */
    public function getNationnalite()
    {
        return $this->nationnalite;
    }

    /**
     * Set dateNaissance
     *
     * @param \DateTime $dateNaissance
     * @return ClientPhysique
     */
    public function setDateNaissance($dateNaissance)
    {
        $this->dateNaissance = $dateNaissance;

        return $this;
    }

    /**
     * Get dateNaissance
     *
     * @return \DateTime 
     */
    public function getDateNaissance()
    {
        return $this->dateNaissance;
    }
}
