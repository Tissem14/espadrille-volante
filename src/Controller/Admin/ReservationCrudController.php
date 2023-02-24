<?php

namespace App\Controller\Admin;

use App\Entity\Reservation;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateField;
use EasyCorp\Bundle\EasyAdminBundle\Field\EmailField;
use EasyCorp\Bundle\EasyAdminBundle\Field\NumberField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TelephoneField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class ReservationCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Reservation::class;
    }


    public function configureFields(string $pageName): iterable
    {
        return [
            DateField::new('dateDebut'),
            DateField::new('dateFin'),
            AssociationField::new('logement'),
            TelephoneField::new('phone'),
            TextField::new('lastName'),
            TextField::new('firstName'),
            EmailField::new('email'),
            NumberField::new('nbrAdulte'),
            NumberField::new('nbrEnfant'),
        ];
    }

}
