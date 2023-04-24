<?php

include_once('../Conexao/Conexao.php');
include_once('../Model/Produto.php');
include_once('../DAO/ProdutoDAO.php');

$produto = new Produto();
$produtodao = new ProdutoDAO();

$dadosInseridos = filter_input_array(INPUT_POST);

if (isset($_POST['cadastrar'])) {
    $produto->setNome($dadosInseridos['nome']);
    $produto->setDescricao($dadosInseridos['descricao']);

    $produtodao->create($produto);

    header('Location: ../');
}