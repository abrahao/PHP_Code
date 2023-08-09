<?php

include './Contato.php';

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $mensagem = $_POST['mensagem'];
}

$contato = new Contato($nome, $email, $mensagem);
$contato->exibirMensagem();