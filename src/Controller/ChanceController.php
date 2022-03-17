<?php

namespace App\Controller;

//ici on importe les composants qu'on utilise dans le controller
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Contracts\Translation\TranslatorInterface;

class ChanceController extends AbstractController
{

    //On utilise annotation plutôt que le système de routing classique (config/routes.yaml)
    /**
     * @Route("/chance/nombre/{min}/{max}")
     */
    public function nombre(int $min = 0, int $max = 100): Response //On précise le type de donnée retournée pour une meilleure compréhension du debug
    {
        //Une méthode de controller DOIT renvoyer un objet de type Response
        return $this->render(
            'base.html.twig', //1er paramètre :chemin de notre template
            [
                'titre' => 'Nombre chance',
                'content' => 'Nombre chance : ' . random_int($min, $max)
            ] //2e paramètre (optionnel) : tableau associatif de variables que l'on souhaite passer au template
        );
    }

    /**
     * @Route("/chance/jour")
     */
    public function jour(TranslatorInterface $translator) : Response
    {
        $jours = [
            $translator->trans('Lundi'),
            'Mardi',
            'Mercredi',
            'Jeudi',
            'Vendredi',
            'Samedi',
            'Dimanche'
        ];

        return $this->render(
            'base.html.twig', //1er paramètre :chemin de notre template
            [
                'titre' => 'Jour de chance',
                'content' => "Jour de chance : " . $jours[array_rand($jours)]
            ] //2e paramètre (optionnel) : tableau associatif de variables que l'on souhaite passer au template
        );
    }
}