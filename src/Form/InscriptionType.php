<?php

namespace App\Form;

use App\Entity\User;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class InscriptionType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('username', null,[
                'attr' => [
                    'placeholder' => 'Nom d\'utilisateur',
                    'label' => 'Nom d\'utilisateur'
                ],
            ])
            ->add('password', PasswordType::class, [
                'attr' => [
                    'placeholder' => 'Mot de passe',
                    'label' => 'Mot de passe'
                ],
            ])
            ->add('verifyPassword', PasswordType::class, [
                'attr' => [
                    'placeholder' => 'Re saisir du mot de passe',
                    'label' => 'Re saisir du mot de passe'
                ],
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
