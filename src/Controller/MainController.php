<?php

namespace App\Controller;

use App\Repository\EncyclopedieRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class MainController extends AbstractController
{
    #[Route('/', name: 'main')]
    public function index(EncyclopedieRepository $encyclopedieRepository): Response
    {
        return $this->render('main/index.html.twig', [

            'encyclopedie' => $encyclopedieRepository->findBy([], 
            ['id_encyclopedie' => 'asc'])
        ]);
    }
}
