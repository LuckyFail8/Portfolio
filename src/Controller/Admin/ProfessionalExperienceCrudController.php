<?php

namespace App\Controller\Admin;

use App\Entity\ProfessionalExperience;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class ProfessionalExperienceCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return ProfessionalExperience::class;
    }

    public function configureCrud(Crud $crud): Crud
    {
        return $crud
            ->setEntityLabelInPlural('Experiences professionnelles')
            ->setEntityLabelInSingular('Experience professionnelle')
            ->setPageTitle('index', 'Portfolio - Mes Experiences professionnelles');
    }


    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id')
                ->hideOnForm(),
            DateField::new('start_date')
                ->setLabel('Date de debut'),
            DateField::new('end_date')
                ->setLabel('Date de fin'),
            TextField::new('position')
                ->setLabel('Poste'),
            TextField::new('company')
                ->setLabel('Entreprise'),
            TextEditorField::new('description')
                ->hideOnIndex(),
        ];
    }
}
