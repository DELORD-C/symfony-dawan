<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;

class ChanceController
{
    public function nombre(): Response
    {
        $nombre = random_int(0, 100);

        return new Response(
          "<html lang='fr'><body>Nombre chance : $nombre</body></html>"
        );
    }

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