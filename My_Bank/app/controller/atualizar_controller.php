<?php

include_once '../assets/elementos/head_home.php';


$dbuser = $_ENV['MYSQL_USER'];
$dbpass = $_ENV['MYSQL_PASS'];

$id = $_GET['id'];
$nome = $_GET['nome'];
$cpf = $_GET['cpf'];
$endereco = $_GET['endereco'];

$pdo = new PDO("mysql:host=mysql;dbname=ist", $dbuser, $dbpass);
$sql = ('UPDATE pessoas SET nome = :nome WHERE id = :id');
// $id = ':id';
// $nome = ':nome';

$stmt = $pdo->prepare($sql);
$stmt -> bindParam(':nome', $nome);
$stmt -> bindParam(':id', $id);

if ($stmt->execute()) {
    echo 'Atualizado!';
}else{
    echo 'Erro ao salvar/';
}
echo $id;