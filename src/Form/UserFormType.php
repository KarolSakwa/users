<?php

namespace App\Form;

use App\Entity\User;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class UserFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('name', null, [
                'label' => false,
                'attr' => [
                    'placeholder' => 'Imię i nazwisko',
                    'class' => 'form-control-lg'
                ]
            ])
            ->add('username', null, [
                'label' => false,
                'attr' => [
                    'placeholder' => 'Nazwa użytkownika',
                    'class' => 'form-control-lg'
                ]
            ])
            ->add('email', EmailType::class, [
                'label' => false,
                'attr' => [
                    'placeholder' => 'Adres e-mail',
                    'class' => 'form-control-lg'
                ]
            ])
            ->add('street', null, [
                'label' => false,
                'attr' => [
                    'placeholder' => 'Ulica',
                    'class' => 'form-control-lg'
                ]
            ])
            ->add('suite', null, [
                'label' => false,
                'attr' => [
                    'placeholder' => 'Apartament',
                    'class' => 'form-control-lg'
                ]
            ])
            ->add('city', null, [
                'label' => false,
                'attr' => [
                    'placeholder' => 'Miasto',
                    'class' => 'form-control-lg'
                ]
            ])
            ->add('zipcode', null, [
                'label' => false,
                'attr' => [
                    'placeholder' => 'Kod pocztowy',
                    'class' => 'form-control-lg'
                ]
            ])
            ->add('lat', null, [
                'label' => false,
                'attr' => [
                    'placeholder' => 'Szerokość geograficzna',
                    'class' => 'form-control-lg'
                ]
            ])
            ->add('lng', null, [
                'label' => false,
                'attr' => [
                    'placeholder' => 'Długość geograficzna',
                    'class' => 'form-control-lg'
                ]
            ])
            ->add('phone', null, [
                'label' => false,
                'attr' => [
                    'placeholder' => 'Telefon',
                    'class' => 'form-control-lg'
                ]
            ])
            ->add('website', null, [
                'label' => false,
                'attr' => [
                    'placeholder' => 'Strona internetowa',
                    'class' => 'form-control-lg'
                ]
            ])
            ->add('companyName', null, [
                'label' => false,
                'attr' => [
                    'placeholder' => 'Nazwa firmy',
                    'class' => 'form-control-lg'
                ]
            ])
            ->add('companyCatchPhrase', null, [
                'label' => false,
                'attr' => [
                    'placeholder' => 'Motto firmy',
                    'class' => 'form-control-lg'
                ]
            ])
            ->add('companyBs', null, [
                'label' => false,
                'attr' => [
                    'placeholder' => 'BS firmy',
                    'class' => 'form-control-lg'
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
