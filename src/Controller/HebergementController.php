<?php

namespace App\Controller;

use App\Entity\Logement;
use App\Form\ReservationType;
use App\Repository\LogementRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/hebergement')]
class HebergementController extends AbstractController
{
    #[Route('/', name: 'app_hebergement')]
    public function index(): Response
    {
        return $this->render('hebergement/index.html.twig', [
        ]);
    }

    #[Route('/mobilehome', name: 'app_hebergement_mobilehome')]
    public function mobilehome(LogementRepository $logementRepository): Response
    {
        $mobilehome = $logementRepository->mobilehome();
        //dd($mobilehome);
        return $this->render('hebergement/mobilehome/index.html.twig', [
            'mobilehomes' => $mobilehome,
        ]);
    }

    #[Route('/caravane', name: 'app_hebergement_caravane')]
    public function caravane(LogementRepository $logementRepository): Response
    {
        $caravane = $logementRepository->caravane();
        //dd($caravane);
        return $this->render('hebergement/caravane/index.html.twig', [
            'caravanes' => $caravane,
        ]);
    }

    #[Route('/emplacement', name: 'app_hebergement_emplacement')]
    public function emplacement(LogementRepository $logementRepository): Response
    {
        $emplacement = $logementRepository->emplacement();
        //dd($emplacement);
        return $this->render('hebergement/emplacement/index.html.twig', [
            'emplacements' => $emplacement,
        ]);
    }

    #[Route('/reservation/{id}', name: 'app_hebergement_reservation')]
    public function reservation(Logement $logement): Response
    {
        $form = $this->createForm(ReservationType::class, $reservation); // On crée le formulaire
        $form->handleRequest($request); // On récupère les données du formulaire
        // On vérifie que les valeurs entrées sont correctes
        if ($form->isSubmitted() && $form->isValid()) {
            $em->persist($article); // On enregistre l'article
            $em->flush(); // On enregistre en base de données
            // On redirige vers la page de visualisation de l'article nouvellement créé
            return $this->redirectToRoute('/'); // Redirection vers la page d'accueil, par exemple
        }
        return $this->renderForm('/create.html.twig', [
            'form' => $form,
        ]);
    }

}
