<?php

namespace Finance\BackOfficeBundle\Form;

use Finance\BackOfficeBundle\Entity\Credit;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class CreditType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('type','choice',array('choices' => Credit::$types ))
            ->add('montant','number')
            ->add('dateDerniereEcheance','date', array('input'  => 'datetime','widget' => 'single_text'))
            ->add('datePremiereEcheance','date' , array('input'  => 'datetime','widget' => 'single_text'))
            ->add('tranche','number')
            ->add('tauxInteret','number')
            ->add('autreDetails','textarea' , array ( 'required' => false))
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Finance\BackOfficeBundle\Entity\Credit'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'finance_backofficebundle_credit';
    }
}
