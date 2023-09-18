<?php

namespace App\Controller\Admin;

use App\Entity\Project;
use App\Form\ImageType;
use App\Form\TechnologyType;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\CollectionField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IntegerField;

class ProjectCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Project::class;
    }

    public function configureCrud(Crud $crud): Crud
    {
        return $crud
            ->setEntityLabelInPlural('Projets')
            ->setEntityLabelInSingular('Projet')
            ->setPageTitle('index', 'Portfolio - Mes projets');
    }


    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id')
                ->hideOnForm(),
            TextField::new('name')
                ->setLabel('Nom du projet'),
            IntegerField::new('ranking')
                ->setLabel('Rang'),
            TextEditorField::new('description')
                ->hideOnIndex(),
            TextField::new('website_link')
                ->setLabel('Lien du site'),
            TextField::new('repository_link')
                ->setLabel('Lien du repository'),
            CollectionField::new('technology')
                ->setEntryType(TechnologyType::class)
                ->setLabel('Technologies')
                ->allowAdd(true)
                ->allowDelete(true),
            CollectionField::new('image')
                ->setEntryType(ImageType::class)
                ->setLabel('Images'),

        ];
    }
}
