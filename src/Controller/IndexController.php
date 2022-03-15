<?php

namespace App\Controller;

use App\Repository\AuthorRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class IndexController extends AbstractController
{
    /**
     * @Route("/")
     */
    public function home() : Response
    {
        return $this->render(
            'index.html.twig', //1er paramètre :chemin de notre template
            [
                'titre' => 'Accueil',
                'nombre' => 50
            ] //2e paramètre (optionnel) : tableau associatif de variables que l'on souhaite passer au template
        );
    }


}