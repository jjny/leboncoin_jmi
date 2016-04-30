<?php 

// src/UserBundle/Form/RegistrationType.php

namespace UserBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\DateType;

class RegistrationType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
        ->add('civilite', ChoiceType::class, array(
            'choices' => array('Madame' => 'madame', 'Monsieur' => 'monsieur'),
            'expanded' => true
        ))
        ->add('naissance', DateType::class)
        ->add('adresse')
        ->add('postal')
        ->add('ville')
        ->add('telephone')
        ->add('projet')
        ->add('attentes')
        // ->add('fonction')
        ->add('fonction', ChoiceType::class, array(
            'choices' => array('BAC' => 'bac', 'BAC+2' => 'bac2', 'BAC+3' => 'bac3', 'BAC+5' => 'bac5')
        ))
        ->add('csp', ChoiceType::class, array(
            'choices' => array('BAC' => 'bac', 'BAC+2' => 'bac2', 'BAC+3' => 'bac3', 'BAC+5' => 'bac5')
        ))
        ->add('experience')
        ->add('etudes', ChoiceType::class, array(
            'choices' => array('BAC' => 'bac', 'BAC+2' => 'bac2', 'BAC+3' => 'bac3', 'BAC+5' => 'bac5')
        ))
        ->add('de_nom')
        ->add('de_postal')
        ->add('de_ville')
        ->add('de_taille', ChoiceType::class, array(
            'choices' => array('BAC' => 'bac', 'BAC+2' => 'bac2', 'BAC+3' => 'bac3', 'BAC+5' => 'bac5')
        ))
        ;
    }

    public function getParent()
    {
        return 'FOS\UserBundle\Form\Type\RegistrationFormType';

        // Or for Symfony < 2.8
        // return 'fos_user_registration';
    }

    public function getBlockPrefix()
    {
        return 'app_user_registration';
    }

    // For Symfony 2.x
    public function getName()
    {
        return $this->getBlockPrefix();
    }
}