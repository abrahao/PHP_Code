<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class TesteController extends AbstractController{

    #[Route("/teste")]
    public function teste(){
        return new Response("<H1>Teste</H1>");
    }
}