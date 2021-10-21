<?php

namespace App\Controller\Admin;

use App\Entity\User;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class UserCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return User::class;
    }

    public function createEntity(string $entityFqcn): User
    {
        $this->denyAccessUnlessGranted('ROLE_SUPER_ADMIN');
        $user = new User();
        return $user;
    }

    public function configureFields(string $pageName): iterable
    {
        $this->denyAccessUnlessGranted('ROLE_SUPER_ADMIN');

        return [
            IdField::new('id'),
            TextField::new('email'),
        ];
    }

}
