<?php

namespace App\Form;

use App\Entity\Property;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class FilterType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('type', ChoiceType::class, [
                'label' => false,
                'required' => false,
                'placeholder' => 'Type de bien',
                'choices' => [
                    'Appartement' => 'Appartement',
                    'Maison' => 'Maison',
                    'Appartement ou maison' => 'Appartement ou maison',
                ],
            ])


            ->add('priceMin', IntegerType::class, [
                'label' => false,
                'required' => false,
                'attr' => ['placeholder' => 'Prix min', 'min' => 0, 'inputmode' => 'numeric'],
            ])
            ->add('priceMax', IntegerType::class, [
                'label' => false,
                'required' => false,
                'attr' => ['placeholder' => 'Prix max', 'min' => 0, 'inputmode' => 'numeric'],
            ])

            ->add('surfaceMin', IntegerType::class, [
                'label' => false,
                'required' => false,
                'attr' => ['placeholder' => 'Surface min', 'min' => 0, 'inputmode' => 'numeric'],
            ])
            ->add('surfaceMax', IntegerType::class, [
                'label' => false,
                'required' => false,
                'attr' => ['placeholder' => 'Surface max', 'min' => 0, 'inputmode' => 'numeric'],
            ])


            ->add('roomsMin', IntegerType::class, [
                'label' => false,
                'required' => false,
                'attr' => ['placeholder' => 'Pièces min', 'min' => 0, 'inputmode' => 'numeric'],
            ])
            ->add('roomsMax', IntegerType::class, [
                'label' => false,
                'required' => false,
                'attr' => ['placeholder' => 'Pièces max', 'min' => 0, 'inputmode' => 'numeric'],
            ])


            ->add('bedroomsMin', IntegerType::class, [
                'label' => false,
                'required' => false,
                'attr' => ['placeholder' => 'Chambres min', 'min' => 0, 'inputmode' => 'numeric'],
            ])
            ->add('bedroomsMax', IntegerType::class, [
                'label' => false,
                'required' => false,
                'attr' => ['placeholder' => 'Chambres max', 'min' => 0, 'inputmode' => 'numeric'],
            ])


            ->add('energyClass', ChoiceType::class, [
                'label' => false,
                'required' => false,
                'placeholder' => 'DPE',
                'choices' => [
                    'A' => 'A',
                    'B' => 'B',
                    'C' => 'C',
                    'D' => 'D',
                    'E' => 'E',
                    'F' => 'F',
                    'G' => 'G',
                ],
            ])

            ->add('town', TextType::class, [
                'label' => false,
                'required' => false,
                'attr' => ['placeholder' => 'Ville de recherche'],
                'empty_data' => '',
                'trim' => true,
            ])

            ->add('Filtrer', SubmitType::class)
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Property::class,
        ]);
    }
}
