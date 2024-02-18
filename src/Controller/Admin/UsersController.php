<?php


namespace App\Controller\Admin;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;


#[Route('/admin/utilisateur', name: 'admin_utilisteur_')]

class UtilisateurController extends AbstractController
{
    #[Route('/', name: 'index')]
    public function index(): Response
    {
        return $this->render('admin/utilisateur/index.html.twig', [
            'controller_name' => 'adminstration de l\'utilisateur',
        ]);
    }
}
