<?php

namespace Finance\BackOfficeBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class ClientMoralType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
        	->add('adresse')
        	->add('ville','choice')
        	->add('codePostal')
        	->add('tel')
            ->add('raisonSocial')
            ->add('idSoc')
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
