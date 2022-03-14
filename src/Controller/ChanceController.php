<?php

namespace App\Controller;

//ic ion importe les composants qu'on utilise dans le controller
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Response;

class ChanceController
{

    //On utilise annotation plutôt que le système de routing classque (config/routes.yaml)
    /**
     * @Route("/chance/nombre")
     */
    public function nombre(): Response //On précise le type de donnée retournée pour une meilleure compréhension du debug
    {
        $nombre = random_int(0, 100);

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