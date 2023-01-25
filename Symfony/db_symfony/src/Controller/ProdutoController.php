<?php

namespace App\Controller;

use App\Entity\Produto;
use App\Repository\CategoriaRepository;
use Doctrine\ORM\EntityManagerInterface;
use Exception;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ProdutoController extends AbstractController{

    #[Route("/produto", name:"produto_index" )]
    public function index(EntityManagerInterface $em, CategoriaRepository $categoriaRepository): Response{
        $categoria = $categoriaRepository->find(1); //id da categoria
        $produto = new Produto();
        $produto->setNomeproduto("Notebook");
        $produto->setValor(3000);
        $produto->setCategoria($categoria);

        $msg = " ";

        try {
            $em->persist($produto); //salva a persistencia em nivel de memoria
            $em->flush(); //persiste no bd
            $msg = "Produto cadastrada!";
        } catch (Exception  $e) {
            $msg = "Erro";
        }
        return new Response("<h1>" .$msg. "</h1>");
    }

}