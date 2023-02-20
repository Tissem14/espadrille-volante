<?php

namespace App\Controller;

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

}
