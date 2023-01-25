<?php

namespace App\Controller;

use App\Entity\Categoria;
use Doctrine\ORM\EntityManagerInterface;
use Exception;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class CategoriaController extends AbstractController{


    #[Route("/categoria", name:"categoria_index")]
    public function index(EntityManagerInterface $em): Response{

        $categoria = new Categoria();
        $categoria->setDescricaocategoria("Informatica");

        $msg = " ";

        try {
            $em->persist($categoria); //salva a persistencia em nivel de memoria
            $em->flush(); //persiste no bd
            $msg = "categoria cadastrada!";
        } catch (Exception $e) {
            $msg = "Erro";
        }
        return new Response("<h1>" .$msg. "</h1>");

    }
}