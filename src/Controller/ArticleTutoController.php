<?php

namespace App\Controller;

use App\Entity\ArticleTuto;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/articleTuto', name: 'articleTuto_')]
class ArticleTutoController extends AbstractController
{

    #[Route('/{slug}', name: 'list')]
    public function list(ArticleTuto $articleTuto): Response
    {
   
        return $this->render('articleTuto/list.html.twig', compact('tuto'));
    }
}
