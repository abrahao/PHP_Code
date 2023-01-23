<?php

include_once '../assets/elementos/head_home.php';

$dbuser = $_ENV['MYSQL_USER'];
$dbpass = $_ENV['MYSQL_PASS'];
$id = $_GET['id'];;

try {
    $pdo = new PDO("mysql:host=mysql;dbname=ist", $dbuser, $dbpass);
  $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

  $stmt = $pdo->prepare('DELETE FROM pessoas WHERE id = :id');
  $stmt->bindParam(':id', $id);
  $stmt->execute();

  echo "Excluído com sucesso!";
} catch(PDOException $e) {
  echo 'Error: ' . $e->getMessage();
}
