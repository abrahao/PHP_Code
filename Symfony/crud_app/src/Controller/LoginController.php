<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;

class LoginController extends AbstractController
{
    #[Route('/login', name: 'login')]
    public function index(AuthenticationUtils $authUtils): Response
    {
        // Pegar erro do login
        $erro = $authUtils->getLastAuthenticationError();

        // Pegar o ultimo email informado pelo usuario
        $lastUsername = $authUtils->getLastUsername();

        return $this->render('login/index.html.twig', [
            'erro' => $erro,
            'lastUsername'=> $lastUsername
        ]);
    }
}
