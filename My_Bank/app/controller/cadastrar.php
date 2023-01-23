<?php

include_once '../assets/elementos/head_home.php';

$dbuser = $_ENV['MYSQL_USER'];
$dbpass = $_ENV['MYSQL_PASS'];

// Conexão com o banco de dados via PDO
try {
    $pdo = new PDO("mysql:host=mysql;dbname=ist", $dbuser, $dbpass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

} catch (PDOException $e) {
    echo 'Error: ' . $e->getMessage();
}
// Aqui são definidas as variáveis vindas do formulário
$nome=$_POST["nome"];
$cpf=$_POST["cpf"];
$endereco=$_POST["endereco"];

// Aqui é executado a inserção no banco de dados
$stmt = $pdo->prepare('INSERT INTO pessoas (nome, cpf, endereco) VALUES(:nome,:cpf, :endereco)');
$stmt->bindParam(":nome",$nome);
$stmt->bindParam(":cpf",$cpf);
$stmt->bindParam(":endereco",$endereco);
if($stmt->execute()):
    echo "Cadastrado com Sucesso!";
else:
    echo "Erro ao inserir :/";
endif;