<?php

namespace App\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\FormBuilderInterface;

class AuthorType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name', TextareaType::class, [
                'label' => 'form.labels.email',
                'attr' => [
                    'placeholder' => 'Name',
                ],
                'row_attr' => [
                    'class' => 'form-floating',
                ],
            ])
            ->add('save', SubmitType::class, [
                'label' => 'Modifier',
                'attr' => [
                    'class' => 'btn btn-primary'
                ]
            ]);
    }
}