<?php

namespace App\Form;

use App\Entity\Book;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class BookType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('title', null,[
                'attr'=> [
                    'placeholder' => 'Titre',
                    'label' => 'Titre'
                ]
            ])
            ->add('dateOfPublication', null,[
                'attr'=> [
                    'placeholder' => 'Date de publication',
                    'label' => 'Date de publication'
                ]
            ])
            ->add('img')
            ->add('author', null,[
                'attr'=> [
                    'placeholder' => 'Auteur',
                    'label' => 'Auteur (Prenom Nom)'
                ]
            ])
            ->add('editor', null, [
                'attr'=> [
                    'placeholder' => 'Editeur',
                    'label' => 'Editeur'
                ]
            ])
            ->add('category', null, [
                'attr'=> [
                    'placeholder' => 'Catégorie',
                    'label' => 'Catégorie'
                ]
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Book::class,
        ]);
    }
}

