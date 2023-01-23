<?php

include_once '../assets/elementos/head_home.php';

$dbuser = $_ENV['MYSQL_USER'];
$dbpass = $_ENV['MYSQL_PASS'];
$idcontas = $_GET['idcontas'];;

try {
    $pdo = new PDO("mysql:host=mysql;dbname=ist", $dbuser, $dbpass);
  $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

  $stmt = $pdo->prepare('DELETE FROM contas WHERE idcontas = :idcontas');
  $stmt->bindParam(':idcontas', $idcontas);
  $stmt->execute();

  echo "Conta excluída com sucesso!";
} catch(PDOException $e) {
  echo 'Error: ' . $e->getMessage();
}
