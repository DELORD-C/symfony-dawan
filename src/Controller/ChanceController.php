<?php

namespace App\Controller;

//ici on importe les composants qu'on utilise dans le controller
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Response;

class ChanceController
{

    //On utilise annotation plutôt que le système de routing classique (config/routes.yaml)
    /**
     * @Route("/chance/nombre/{min}/{max}")
     */
    public function nombre(int $min = 0, int $max = 100): Response //On précise le type de donnée retournée pour une meilleure compréhension du debug
    {
        $nombre = random_int($min, $max);

        //Une méthode de controller DOIT renvoyer un objet de type Response
        return new Response(
          "<html lang='fr'><body>Nombre chance : $nombre</body></html>"
        );
    }

    /**
     * @Route("/chance/jour")
     */
    public function jour() : Response
    {
        $jours = [
            'Lundi',
            'Mardi',
            'Mercredi',
            'Jeudi',
            'Vendredi',
            'Samedi',
            'Dimanche'
        ];

        return new Response(
            "<html lang='fr'><body>Jour de chance : " . $jours[array_rand($jours)] . "</body></html>"
        );
    }
}