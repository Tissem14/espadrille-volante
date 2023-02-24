<?php

namespace App\Controller\Admin;

use App\Entity\User;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\EmailField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TelephoneField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;


class UserCrudController extends AbstractCrudController
{

    // i want create an function to hash password
    public function hashPassword($password)
    {
        $password = password_hash($password, PASSWORD_BCRYPT);
        return $password;
    }
    public static function getEntityFqcn(): string
    {
        return User::class;
    }


    public function configureFields(string $pageName): iterable
    {
        return [
            TextField::new('lastName'),
            TextField::new('firstName'),
            EmailField::new('email'),
            TelephoneField::new('phone'),
            TextField::new('password')
                ->setFormTypeOption('empty_data', $this->hashPassword('password')) // Permet de hasher le mot de passe
                ->HideOnIndex(), // Permet de cacher le mot de passe dans la liste des utilisateurs (index)
        ];
    }
}
