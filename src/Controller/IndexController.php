<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
class IndexController
{
    /**
     * @Route("/")
     */
    public function home() : Response
    {
        return new Response(
            "<html lang='en'><body>Hello World !</body></html>"
        );
    }
}