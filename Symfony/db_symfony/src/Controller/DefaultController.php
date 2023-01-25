<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DefaultController extends AbstractController{

    #[Route('/default', name: 'app_default')]
    public function default(): Response{
        return new Response("<h1>Default</h1>");
    }

}