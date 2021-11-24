<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\Form;

use App\Entity\Contact;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

/**
 * Description of ContactType
 *
 * @author Monica Tevy Sen
 */
class ContactType extends AbstractType {
    
    public function buildForm(FormBuilderInterface $builder, array $options) {
        $builder
            ->add('nom', TextType::class)
            ->add('email', TextType::class)
            ->add('message', TextareaType::class)
            ->add('submit', SubmitType::class, [
                'label' => 'Envoyer'
            ])
        ;
    }
    
    public function configureOptions(OptionsResolver $resolver) {
        $resolver->setDefaults([
            'data_class' => Contact::class,
        ]);
    }
}
