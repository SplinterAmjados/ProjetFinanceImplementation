<?php

namespace Finance\BackOfficeBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Token
 *
 * @ORM\Table()
 * @ORM\Entity
 */
class Token
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
     * @var string
     *
     * @ORM\Column(name="value", type="string", length=100)
     */
    private $value;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="dateCreation", type="datetime")
     */
    private $dateCreation;

    /**
     * @var boolean
     *
     * @ORM\Column(name="valide", type="boolean")
     */
    private $valide;

    /**
     * @var string
     *
     * @ORM\Column(name="ipInit", type="string", length=30)
     */
    private $ipInit;


    /**
     * 
     * @ORM\ManyToOne(targetEntity="Client")
     */
    private $client ;
    
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
     * Set value
     *
     * @param string $value
     * @return Token
     */
    public function setValue($value)
    {
        $this->value = $value;

        return $this;
    }

    /**
     * Get value
     *
     * @return string 
     */
    public function getValue()
    {
        return $this->value;
    }

    /**
     * Set dateCreation
     *
     * @param \DateTime $dateCreation
     * @return Token
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
     * Set valide
     *
     * @param boolean $valide
     * @return Token
     */
    public function setValide($valide)
    {
        $this->valide = $valide;

        return $this;
    }

    /**
     * Get valide
     *
     * @return boolean 
     */
    public function getValide()
    {
        return $this->valide;
    }

    /**
     * Set ipInit
     *
     * @param string $ipInit
     * @return Token
     */
    public function setIpInit($ipInit)
    {
        $this->ipInit = $ipInit;

        return $this;
    }

    /**
     * Get ipInit
     *
     * @return string 
     */
    public function getIpInit()
    {
        return $this->ipInit;
    }

    /**
     * Set client
     *
     * @param \Finance\BackOfficeBundle\Entity\Client $client
     * @return Token
     */
    public function setClient(\Finance\BackOfficeBundle\Entity\Client $client = null)
    {
        $this->client = $client;

        return $this;
    }

    /**
     * Get client
     *
     * @return \Finance\BackOfficeBundle\Entity\Client 
     */
    public function getClient()
    {
        return $this->client;
    }
}
