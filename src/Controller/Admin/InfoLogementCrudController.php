<?php

namespace App\Controller\Admin;

use App\Entity\InfoLogement;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class InfoLogementCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return InfoLogement::class;
    }

    /*
    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id'),
            TextField::new('title'),
            TextEditorField::new('description'),
        ];
    }
    */
}
