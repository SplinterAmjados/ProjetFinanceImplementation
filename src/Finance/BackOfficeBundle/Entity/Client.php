<?php

namespace Finance\BackOfficeBundle\Entity;

use Doctrine\ORM\Mapping\MappedSuperclass;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert ;
/**
 * 
 * @author Splinter
 * @ORM\Entity(repositoryClass="Finance\BackOfficeBundle\Repository\ClientRepository")
 * @ORM\Table(name="clients")
 * @ORM\InheritanceType("JOINED")
 * @ORM\DiscriminatorColumn(name="type", type="string")
 * @ORM\DiscriminatorMap( {"client_moral" = "ClientMoral", "client_physique" = "ClientPhysique"} )
 */
abstract class Client
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
     * @var \DateTime
     *
     * @ORM\Column(name="date_creation", type="datetime")
     */
    private $dateCreation;

    /**
     * @var string
     *
     * @ORM\Column(name="adresse", type="string", length=255)
     * @Assert\NotBlank(message="Vous devez indiquer votre adresse")
     */
    private $adresse;

    /**
     * @var string
     *
     * @ORM\Column(name="ville", type="string", length=100)
     * @Assert\NotBlank(message="Vous devez indiquer votre ville")
     */
    private $ville;

    /**
     * @var integer
     *
     * @ORM\Column(name="code_postal", type="integer")
     * @Assert\NotBlank(message="Vous devez indiquer votre code postal")
     */
    private $codePostal;

    /**
     * @var string
     *
     * @ORM\Column(name="tel", type="string", length=12)
     * @Assert\NotBlank(message="Vous devez indiquer votre numéro de téléphone")
     * @Assert\Type(type="long",message="Numéro de téléphone est invalide")
     * @Assert\Length(min="8",minMessage="Numéro de téléphone doit comporter au moins 8 chiffres")
     */
    private $tel;

    /**
     * @var string
     *
     * @ORM\Column(name="login", type="string", length=10)
     */
    private $login;
    
    /**
     * @var string
     *
     * @ORM\Column(name="password", type="string", length=50)
     */
    private $password;
    
    /**
     * @ORM\ManyToMany(targetEntity="Compte", mappedBy="proprietaires" )
     * @ORM\JoinTable(name="clients_comptes")
     */
    private $comptes ;
    

    /**
     * 
     * @ORM\Column(name="agence",type="string" , length = 50 )
     * 
     */
    private $agence;

    
    
    
    abstract public function getNomPrenomOuRSocial();
    
    abstract public function getRealIdClient();
    
    public function getDateDeCreation()
    {
    	return $this->dateCreation->format("Y/m/d H:i:s");
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
     * Set dateCreation
     *
     * @param \DateTime $dateCreation
     * @return Client
     */
    public function setDateCreation($dateCreation)
    {
        $this->dateCreation = $dateCreation;

        return $this;
    }

    /**
     * Get dateCreation
     *
     * @return \DateTime 
     */
    public function getDateCreation()
    {
        return $this->dateCreation;
    }

    /**
     * Set adresse
     *
     * @param string $adresse
     * @return Client
     */
    public function setAdresse($adresse)
    {
        $this->adresse = $adresse;

        return $this;
    }

    /**
     * Get adresse
     *
     * @return string 
     */
    public function getAdresse()
    {
        return $this->adresse;
    }

    /**
     * Set ville
     *
     * @param string $ville
     * @return Client
     */
    public function setVille($ville)
    {
        $this->ville = $ville;

        return $this;
    }

    /**
     * Get ville
     *
     * @return string 
     */
    public function getVille()
    {
        return $this->ville;
    }

    /**
     * Set codePostal
     *
     * @param integer $codePostal
     * @return Client
     */
    public function setCodePostal($codePostal)
    {
        $this->codePostal = $codePostal;

        return $this;
    }

    /**
     * Get codePostal
     *
     * @return integer 
     */
    public function getCodePostal()
    {
        return $this->codePostal;
    }

    /**
     * Set tel
     *
     * @param string $tel
     * @return Client
     */
    public function setTel($tel)
    {
        $this->tel = $tel;

        return $this;
    }

    /**
     * Get tel
     *
     * @return string 
     */
    public function getTel()
    {
        return $this->tel;
    }
    
   
    
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->comptes = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add comptes
     *
     * @param \Finance\BackOfficeBundle\Entity\Compte $comptes
     * @return Client
     */
    public function addCompte(\Finance\BackOfficeBundle\Entity\Compte $comptes)
    {
        $this->comptes[] = $comptes;

        return $this;
    }

    /**
     * Remove comptes
     *
     * @param \Finance\BackOfficeBundle\Entity\Compte $comptes
     */
    public function removeCompte(\Finance\BackOfficeBundle\Entity\Compte $comptes)
    {
        $this->comptes->removeElement($comptes);
    }

    /**
     * Get comptes
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getComptes()
    {
        return $this->comptes;
    }

    /**
     * Set login
     *
     * @param string $login
     * @return Client
     */
    public function setLogin($login)
    {
        $this->login = $login;

        return $this;
    }

    /**
     * Get login
     *
     * @return string 
     */
    public function getLogin()
    {
        return $this->login;
    }

    /**
     * Set password
     *
     * @param string $password
     * @return Client
     */
    public function setPassword($password)
    {
        $this->password = $password;

        return $this;
    }

    /**
     * Get password
     *
     * @return string 
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * Set agence
     *
     * @param string $agence
     * @return Client
     */
    public function setAgence($agence)
    {
        $this->agence = $agence;

        return $this;
    }

    /**
     * Get agence
     *
     * @return string 
     */
    public function getAgence()
    {
        return $this->agence;
    }


   
}
