<?php

namespace App\Form;

use App\Entity\Reservation;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ReservationType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {

        // Cette ligne permet de récupérer la date du jour, en format DateTime, et de la stocker dans la variable $dateDebut, si la date du jour est inférieur à la date de début de la réservation, alors on prend le 05/05/2023, sinon on prend la date de début de la réservation.
        $dateDebut = DateTime::createFromFormat('d-m-Y', '05-05-2023') > new DateTime();('now') ? DateTime::createFromFormat('d-m-Y', '05-05-2023') : new DateTime();
        // Cette ligne permet de récupérer la date du jour, en format DateTime, et de la stocker dans la variable $dateFin, si la date du jour est inférieur à la date du 05/05/2023, alors on prends la date du 05/05/2023 + 2 semaines. Sinon on prend la date début + 1 semaines.
        $dateFin = DateTime::createFromFormat('d-m-Y', '05-05-2023') > new DateTime();('now') ? DateTime::createFromFormat('d-m-Y', '05-05-2023')->modify('+1 week') : DateTime::createFromFormat('d-m-Y', $dateDebut)->modify('+1 week');

        $builder
            ->add('lastName')
            ->add('firstName')
            ->add('phone')
            ->add('email')
            ->add('nbrAdulte')
            ->add('nbrEnfant')

            // On ajoute le champ dateDebut
            ->add('dateDebut', DateType::class, [
                // On indique que le champ dateDebut doit être un champ de type date
                'widget' => 'single_text',
                // On indique que le champ dateDebut doit être égal à la date du jour
                'data' => $dateDebut,
                //  On indique que le champ dateDebut est relié à la propriété dateDebut de l'entité Reservation
                'property_path' => 'dateDebut',
                // On ajoute des contraintes
                'constraints' => [
                    // Le champ ne peut pas être vide, sinon on affiche le message
                    new NotBlank([
                        'message' => 'Veuillez saisir une date de début.',
                    ]),
                    // La date de fin doit être inférieur à la date de fin de la réservation
                    new LessThan([
                        'propertyPath' => 'dateFin',
                    ]),
                ],
            ])

            // On ajoute le champ dateFin
            ->add('dateFin', DateType::class, [
                // On indique que le champ dateFin doit être un champ de type date
                'widget' => 'single_text',
                // On indique que le champ dateFin doit être égal à la date de début + 1 semaine
                'data' => $dateFin,
                // On indique que le champ dateFin est relié à la propriété dateFin de l'entité Reservation
                'property_path' => 'dateFin',
                // On ajoute des contraintes
                'constraints' => [
                    // Le champ ne peut pas être vide, sinon on affiche le message
                    new NotBlank([
                        'message' => 'Veuillez saisir une date de fin.',
                    ]),
                    // La date de fin doit être supérieur à la date de début
                    new GreaterThan([
                        'propertyPath' => 'dateDebut',
                    ]),
                ],
            ])

            ->add('logement')
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Reservation::class,
        ]);
    }

    //
}
