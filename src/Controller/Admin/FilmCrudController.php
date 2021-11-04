<?php

namespace App\Controller\Admin;

use App\Entity\Film;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\Field;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IntegerField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextareaField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use Vich\UploaderBundle\Form\Type\VichFileType;
use Vich\UploaderBundle\Form\Type\VichImageType;

class FilmCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Film::class;
    }


    public function createEntity(string $entityFqcn): Film
    {
        $this->denyAccessUnlessGranted('ROLE_SUPER_ADMIN');
        return new Film();
    }


    public function configureFields(string $pageName): iterable
    {
        $this->denyAccessUnlessGranted('ROLE_SUPER_ADMIN');
        return [
            TextField::new('name', 'Titre du film'),
            TextEditorField::new('resume', 'Résumé'),
            TextField::new('realisateur', 'Realisateur'),
            TextField::new('bandeAnnonce', "Lien Youtube de la bande d'annonce"),
            IntegerField::new('duree', 'Durée'),
            AssociationField::new('category', 'Categories')->autocomplete(),
            TextareaField::new('imageFile', 'Affiche du film')->setFormType(VichFileType::class)->onlyOnForms(),
        ];
    }

}
