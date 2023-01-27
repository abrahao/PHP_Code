<?php

namespace App\Controller;

use App\Entity\Produto;
use App\Form\ProdutoType;
use App\Repository\CategoriaRepository;
use Doctrine\ORM\EntityManagerInterface;
use Exception;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;


class ProdutoController extends AbstractController{


    /**
     * @Route("/produto", name="produto_index");
     */ 
    public function index(EntityManagerInterface $em, CategoriaRepository $categoriaRepository):Response{

        $categoria = $categoriaRepository->find(1);

        $produto = new Produto();
        $produto->setNomeproduto ("Monitor");
        $produto->setValor(1000);
        $produto->setCategoria($categoria);
        $msg = "";

        try {
            $em->persist($produto);
            $em->flush();
            $msg = "Cadastrado!";

        } catch (Exception $e) {
            $msg = "Erro";
        }
        return new Response("<h1>". $msg ."</h1>");
    }


      /**
     * @Route("/produto/adicionar", name="produto_adicionar")
     */ 
    public function adicionar(): Response{
        $form = $this->createForm(ProdutoType::class);
        $data['titulo'] = "Adicionar nova produto";
        $data['form'] = $form;

        return $this->renderForm('/produto/form.html.twig', $data);
    }
     
}