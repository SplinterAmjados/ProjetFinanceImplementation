<?php

namespace Finance\BackOfficeBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class ClientMoralType extends AbstractType
{
	
	private $villes ;
	
	public function __construct($villes)
	{
		$this->villes = $villes;
		return $this;
	}
	
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
        	->add('adresse')
        	->add('ville','choice',array('choices' => $this->villes))
        	->add('codePostal')
        	->add('tel')
            ->add('raisonSocial')
            ->add('idSoc')
            ->add('dateFondation','date', array('input'  => 'datetime','widget' => 'single_text'))
            
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Finance\BackOfficeBundle\Entity\ClientMoral'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'finance_backofficebundle_clientmoral';
    }
}
