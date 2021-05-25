<?php

namespace App\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;

class MemberType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('name', TextType::class,[
                'label'=> 'Nom de l\'Argonaute',
                'attr'=>[
                    'placeholder'=>'Charalampos',
                ]
                ])
            ->add('send', SubmitType::class,[
                'label'=>'Envoyer',])
        ;
    }
}