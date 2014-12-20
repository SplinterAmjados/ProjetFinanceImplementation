<?php

namespace Finance\BackOfficeBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Notification
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Finance\BackOfficeBundle\Repository\NotificationRepository")
 */
class Notification
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
     * @ORM\Column(name="message", type="string", length=100)
     */
    private $message;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date", type="datetime")
     */
    private $date;


    /**
     * @var string
     *
     * @ORM\Column(name="type", type="string", length=50)
     */
    private  $type;
    
    
    /**
     * 
     * @ORM\ManyToOne(targetEntity="Compte",inversedBy="notifications" , cascade = {"persist"})
     */
    private $compte;
    
    
    
    public static function getNotificationFromTransaction(Transaction $t)
    {
    	$n = new Notification();
    	$n->setDate(new \DateTime("NOW"))
    	->setCompte($t->getCompte()) ;
    	if ($t->getType()== 'Retrait')
    	{
    		
    		$n->setType('retrait')->setMessage("Retrait ".
    				$t->getMontant().
    				" Dt [".$t->getDate()->format("d/m/Y H:i:s")."] Compte : ".
    				$t->getCompte()->getNumCompte());
    			
    	}else
    	{
    		$n->setType('versement')->setMessage("Versement ".
    				$t->getMontant().
    				" Dt [".$t->getDate()->format("d/m/Y H:i:s")."] Compte : ".
    				$t->getCompte()->getNumCompte());
    	}
    	
    	return $n;
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
     * Set message
     *
     * @param string $message
     * @return Notification
     */
    public function setMessage($message)
    {
        $this->message = $message;

        return $this;
    }

    /**
     * Get message
     *
     * @return string 
     */
    public function getMessage()
    {
        return $this->message;
    }

    /**
     * Set date
     *
     * @param \DateTime $date
     * @return Notification
     */
    public function setDate($date)
    {
        $this->date = $date;

        return $this;
    }

    /**
     * Get date
     *
     * @return \DateTime 
     */
    public function getDate()
    {
        return $this->date;
    }

    /**
     * Set type
     *
     * @param string $type
     * @return Notification
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
     * Set compte
     *
     * @param \Finance\BackOfficeBundle\Entity\Compte $compte
     * @return Notification
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
