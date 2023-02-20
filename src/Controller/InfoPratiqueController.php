<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class InfoPratiqueController extends AbstractController
{
    #[Route('/info/pratique', name: 'app_info_pratique')]
    public function index(): Response
    {
        return $this->render('info_pratique/index.html.twig', [
            'controller_name' => 'InfoPratiqueController',
        ]);
    }
}
