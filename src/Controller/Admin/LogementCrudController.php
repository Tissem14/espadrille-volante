<?php

namespace App\Controller\Admin;

use App\Entity\Logement;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

// Cette class permet de créer un CRUD pour la table Logement
// Dans cette derniere j'affiche les champs suivants : infoLogement, owner, img, description
class LogementCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Logement::class;
    }


    public function configureFields(string $pageName): iterable
    {
        return [
            AssociationField::new('infoLogement'), // AssociationField permet de faire une jointure avec la table infoLogement, dans cette derniere j'affiche uniquement le nom du logement et le prix
            AssociationField::new('owner'), // J'affiche le nom du proprietaire
            TextField::new('img'), // J'affiche l'image
            TextEditorField::new('description'), // J'affiche la description
        ];
    }

}
