<?php

namespace App\Form;

use App\Entity\User;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\Length;
use Symfony\Component\Validator\Constraints\NotBlank;

class RegistrationFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('email', EmailType::class, [
                'label' => 'form.labels.email',
                'attr' => [
                    'autocomplete' => 'new-password',
                    'placeholder' => 'form.labels.email',
                ],
                'row_attr' => [
                    'class' => 'form-floating',
                ]
            ])
            ->add('plainPassword', PasswordType::class, [
                'label' => 'form.labels.password',
                'mapped' => false,
                'attr' => [
                    'autocomplete' => 'new-password',
                    'placeholder' => 'form.labels.password'
                ],
                'row_attr' => [
                    'class' => 'form-floating',
                ],
                'constraints' => [
                    new NotBlank([
                        'message' => 'errors.fill',
                    ]),
                    new Length([
                        'min' => 4,
                        'minMessage' => 'errors.length',
                        'max' => 4096,
                    ]),
                ],
            ])
            ->add('save', SubmitType::class, [
                'label' => 'form.title.signUp',
                'attr' => [
                    'class' => 'w-100 btn btn-lg btn-primary mt-3'
                ]
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => User::class,
        ]);
    }
}
