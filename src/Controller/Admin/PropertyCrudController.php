<?php

namespace App\Controller\Admin;

use App\Entity\Property;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\BooleanField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ChoiceField;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateField;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateTimeField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use EasyCorp\Bundle\EasyAdminBundle\Field\NumberField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextareaField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class PropertyCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Property::class;
    }


    public function configureFields(string $pageName): iterable
    {
        return [
            TextField::new('title'),
            TextareaField::new('description'),
            ChoiceField::new('type')->setChoices([
                'Maison' => 'Maison',
                'Appartement' => 'Appartement',
                'Maison ou Appartement' => 'Maison ou appartement'
            ]),
            NumberField::new('price'),
            NumberField::new('surface'),
            NumberField::new('rooms'),
            NumberField::new('bedrooms'),
            ChoiceField::new('energy_class')->setChoices([
                'A' => 'A',
                'B' => 'B',
                'C' => 'C',
                'D' => 'D',
                'E' => 'E',
                'F' => 'F',
                'G' => 'G'
            ]),
            BooleanField::new('is_published'),
            TextField::new('town'),
            DateTimeField::new('createdAt')->hideOnForm(),
            ImageField::new('main_photo')->setBasePath('public/images')->setUploadDir('public/images/annonces')
        ];
    }
}
