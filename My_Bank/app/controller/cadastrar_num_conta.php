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
$numConta=$_POST["numConta"];
$id_pessoa=$_POST["pessoas_select"];

// Aqui é executado a inserção no banco de dados
$stmt = $pdo->prepare('INSERT INTO contas (numConta, id_pessoa) VALUES(:numConta,:id_pessoa)');
$stmt->bindParam(":numConta",$numConta);
$stmt->bindParam(":id_pessoa",$id_pessoa);

if($stmt->execute()):
    echo "Número de conta criado com sucesso!";
    // header('location: ../index.php');
else:
    echo "Erro ao inserir :/";
endif;