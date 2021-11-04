<?php

namespace App\Form;

use App\Entity\Category;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;

class SearchType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('category', EntityType::class, [
                'label' => 'Catégorie',
                "class" => Category::class,
                'choice_label' => 'name',
                "multiple" => true,
                'required' => false

            ])

            ->add('name',  TextType::class, [
                'label' => 'Nom réalisateur',
                'required' => false
            ])

            ->add('title',  TextType::class, [
                'label' => 'Titre du film',
                'required' => false
            ])

            ->add(
                'duree', IntegerType::class,
                [
                    'label' => 'Durée maximum (en minutes)',
                    'required' => false
                ]
            )
            ->add('save', SubmitType::class, [
                'attr' => [
                    'class' => 'btn btn-theme',
                    'label' => 'Valider'
                ],
            ]);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            // Configure your form options here
        ]);
    }
}
