<?php

namespace App\Controller;

use App\Entity\Encyclopedie;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/encyclopedie', name: 'encyclopedie_')]
class EncyclopedieController extends AbstractController
{
    #[Route('/', name: 'index')]
    public function index(): Response
    {
        return $this->render('encyclopedie/index.html.twig');
    }

    #[Route('/{slug}', name: 'details')]
    public function details(Encyclopedie $encyclopedie): Response
    {
         dd($encyclopedie);
        return $this->render('encyclopedie/details.html.twig');
    }
}
