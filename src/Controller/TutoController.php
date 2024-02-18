<?php

namespace App\Controller;

use App\Entity\Tuto;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;


class TutoController extends AbstractController
{

    #[Route('/tuto', name: 'tuto_')]

    #[Route('/', name: 'index')]
    public function index(): Response
    {
        return $this->render('tuto/index.html.twig', [
            'controller_name' => 'TutoController',
        ]);
    }

    #[Route('/{slug}', name: 'details_')]
    public function details(Tuto $tuto): Response
    {
        // dd($tuto->getTitre());
        return $this->render('tuto/details.html.twig', compact('tuto'));
    }
}
