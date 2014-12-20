<?php

namespace Finance\BackOfficeBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Compte
 *
 * @ORM\Table(name="comptes")
 * @ORM\Entity(repositoryClass="Finance\BackOfficeBundle\Repository\CompteRepository")
 */
class Compte
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
     * @ORM\Column(name="num_compte", type="string", length=20)
     */
    private $numCompte ;
    
    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date_creation", type="datetime")
     */
    private $dateCreation;

    /**
     * @var float
     *
     * @ORM\Column(name="solde", type="float")
     */
    private $solde;

    /**
     * @var string
     *
     * @ORM\Column(name="type", type="string", length=50)
     */
    private $type;

    /**
     * @var boolean
     *
     * @ORM\Column(name="active", type="boolean")
     */
    private $active;

    /**
     * @ORM\ManyToMany(targetEntity="Client", inversedBy="comptes" )
     */
    private $proprietaires ;
    
    
    /**
     * 
     * @ORM\OneToMany(targetEntity="Notification" , mappedBy="notifications");
     */
    private $notifications;
    
    public function debit($montant)
    {
    	$this->setSolde($this->getSolde()-$montant);
    	return $this ;
    }
    
    
    public function credit($montant)
    {
    	$this->setSolde($this->getSolde()+$montant);
    	return $this ;
    }
    
    public function generateNumCompte()
    {
    	$date = new \DateTime("NOW") ;
    	$num = $date->format('YmdHis');   	
    	$id = $this->proprietaires[0]->getId() ;
    	$num = $num.substr($id,0,2);
    	
    	if ($this->type == 'CE')  $num = str_pad($num,15,'0') ;
    	else $num = str_pad($num,20,'0') ;
    	
    	$this->numCompte = $num ;
    }
    
    /**
     * @ORM\OneToMany(targetEntity="Transaction",mappedBy="compte")
     */
    private $transactions;
    
    public function getDateDeCreation()
    {
    	return $this->dateCreation->format("Y/m/d H:i:s");
    }
    
    /**
     * @ORM\OneToMany(targetEntity="Credit", mappedBy="compte" , cascade = {"persist"})
     */
    private $credits;
    
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
     * @return Compte
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
     * Set solde
     *
     * @param float $solde
     * @return Compte
     */
    public function setSolde($solde)
    {
        $this->solde = $solde;

        return $this;
    }

    /**
     * Get solde
     *
     * @return float 
     */
    public function getSolde()
    {
        return $this->solde;
    }

    /**
     * Set type
     *
     * @param string $type
     * @return Compte
     */
    public function setType($type)
    {
        $this->type = $type;

        return $this;
    }

    /**
     * Get type
     *
     * @return string 
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * Set active
     *
     * @param boolean $active
     * @return Compte
     */
    public function setActive($active)
    {
        $this->active = $active;

        return $this;
    }

    /**
     * Get active
     *
     * @return boolean 
     */
    public function getActive()
    {
        return $this->active;
    }
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->proprietaires = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add proprietaires
     *
     * @param \Finance\BackOfficeBundle\Entity\Client $proprietaires
     * @return Compte
     */
    public function addProprietaire(\Finance\BackOfficeBundle\Entity\Client $proprietaires)
    {
        $this->proprietaires[] = $proprietaires;

        return $this;
    }

    /**
     * Remove proprietaires
     *
     * @param \Finance\BackOfficeBundle\Entity\Client $proprietaires
     */
    public function removeProprietaire(\Finance\BackOfficeBundle\Entity\Client $proprietaires)
    {
        $this->proprietaires->removeElement($proprietaires);
    }

    /**
     * Get proprietaires
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getProprietaires()
    {
        return $this->proprietaires;
    }
    
    /**
     * Set proprietaires
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function setProprietaires($proprietaires)
    {
    	$this->proprietaires = $proprietaires;
    	return $this ;
    }

    /**
     * Add transactions
     *
     * @param \Finance\BackOfficeBundle\Entity\Transaction $transactions
     * @return Compte
     */
    public function addTransaction(\Finance\BackOfficeBundle\Entity\Transaction $transactions)
    {
        $this->transactions[] = $transactions;

        return $this;
    }

    /**
     * Remove transactions
     *
     * @param \Finance\BackOfficeBundle\Entity\Transaction $transactions
     */
    public function removeTransaction(\Finance\BackOfficeBundle\Entity\Transaction $transactions)
    {
        $this->transactions->removeElement($transactions);
    }

    /**
     * Get transactions
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getTransactions()
    {
        return $this->transactions;
    }

    /**
     * Set numCompte
     *
     * @param string $numCompte
     * @return Compte
     */
    public function setNumCompte($numCompte)
    {
        $this->numCompte = $numCompte;

        return $this;
    }

    /**
     * Get numCompte
     *
     * @return string 
     */
    public function getNumCompte()
    {
        return $this->numCompte;
    }

    /**
     * Add credits
     *
     * @param \Finance\BackOfficeBundle\Entity\Credit $credits
     * @return Compte
     */
    public function addCredit(\Finance\BackOfficeBundle\Entity\Credit $credits)
    {
        $this->credits[] = $credits;

        return $this;
    }

    /**
     * Remove credits
     *
     * @param \Finance\BackOfficeBundle\Entity\Credit $credits
     */
    public function removeCredit(\Finance\BackOfficeBundle\Entity\Credit $credits)
    {
        $this->credits->removeElement($credits);
    }

    /**
     * Get credits
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getCredits()
    {
        return $this->credits;
    }

    /**
     * Add notifications
     *
     * @param \Finance\BackOfficeBundle\Entity\Notification $notifications
     * @return Compte
     */
    public function addNotification(\Finance\BackOfficeBundle\Entity\Notification $notifications)
    {
        $this->notifications[] = $notifications;

        return $this;
    }

    /**
     * Remove notifications
     *
     * @param \Finance\BackOfficeBundle\Entity\Notification $notifications
     */
    public function removeNotification(\Finance\BackOfficeBundle\Entity\Notification $notifications)
    {
        $this->notifications->removeElement($notifications);
    }

    /**
     * Get notifications
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getNotifications()
    {
        return $this->notifications;
    }
}
