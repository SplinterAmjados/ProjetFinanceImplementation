<?php
namespace Finance\BackOfficeBundle\Entity;
use Doctrine\ORM\Mapping as ORM;


/**
 * 
 * @author Splinter
 * @ORM\Entity(repositoryClass="Finance\BackOfficeBundle\Repository\ClientMoralRepository")
 * @ORM\Table(name="clients_morals")
 */

class ClientMoral extends Client {

	/**
	 * @var string
     *
     * @ORM\Column(name="raison_social", type="string")
	 */
	private $raisonSocial ;

	/**
	 * 
	 * @var string
	 * @ORM\Column(name="id_soc", type="string")
	 */
	private $idSoc ;
	
	/**
	 * @ORM\OneToOne(targetEntity="ClientPhysique" , cascade={"persist"} )
	 */
	private $gerant ;
    
	/**
	 * @ORM\Column(name="date_fondation" , type="date" )
	 * @var unknown_type
	 */
	private $dateFondation ;
	
	public function getNomPrenomOuRSocial()
	{
		return $this->raisonSocial ;
	}
	
	public function getRealIdClient()
	{
		return $this->idSoc != NULL ? $this->idSoc : "n-a";
	}

    /**
     * Set raisonSocial
     *
     * @param string $raisonSocial
     * @return ClientMoral
     */
    public function setRaisonSocial($raisonSocial)
    {
        $this->raisonSocial = $raisonSocial;

        return $this;
    }

    /**
     * Get raisonSocial
     *
     * @return string 
     */
    public function getRaisonSocial()
    {
        return $this->raisonSocial;
    }

    /**
     * Set idSoc
     *
     * @param string $idSoc
     * @return ClientMoral
     */
    public function setIdSoc($idSoc)
    {
        $this->idSoc = $idSoc;

        return $this;
    }

    /**
     * Get idSoc
     *
     * @return string 
     */
    public function getIdSoc()
    {
        return $this->idSoc;
    }

    /**
     * Set gerant
     *
     * @param \Finance\BackOfficeBundle\Entity\ClientPhysique $gerant
     * @return ClientMoral
     */
    public function setGerant(\Finance\BackOfficeBundle\Entity\ClientPhysique $gerant = null)
    {
        $this->gerant = $gerant;

        return $this;
    }

    /**
     * Get gerant
     *
     * @return \Finance\BackOfficeBundle\Entity\ClientPhysique 
     */
    public function getGerant()
    {
        return $this->gerant;
    }

    /**
     * Set dateFondation
     *
     * @param \Date $dateFondation
     * @return ClientMoral
     */
    public function setDateFondation(\Date $dateFondation)
    {
        $this->dateFondation = $dateFondation;

        return $this;
    }

    /**
     * Get dateFondation
     *
     * @return \Date 
     */
    public function getDateFondation()
    {
        return $this->dateFondation;
    }
}
