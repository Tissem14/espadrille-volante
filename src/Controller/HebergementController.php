<?php

namespace App\Controller;

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
    public function mobilehome(LogementRepository $mobilehome): Response
    {
        // Je décide de trouver les logements par leurs info_logement_id (1,2,3,4)
        $mobilehomes = $mobilehome->findByInfoLogement('infoLogement','1,2,3,4');
        return $this->render('hebergement/mobilehome/index.html.twig', [
            'mobile_homes' => $mobilehomes
        ]);
    }

    #[Route('/caravane', name: 'app_hebergement_caravane')]
    public function caravane(): Response
    {
        return $this->render('hebergement/caravane/index.html.twig', [
        ]);
    }

    #[Route('/emplacement', name: 'app_hebergement_emplacement')]
    public function emplacement(): Response
    {
        return $this->render('hebergement/emplacement/index.html.twig', [
        ]);
    }

    #[Route('/reservation', name: 'app_hebergement_reservation')]
    public function reservation(): Response
    {
        return $this->render('hebergement/reservation/index.html.twig', [
        ]);
    }

    #[Route('/detail', name: 'app_hebergement_detail')]
    public function detail(): Response
    {
        return $this->render('hebergement/detail/index.html.twig', [
        ]);
    }
}
