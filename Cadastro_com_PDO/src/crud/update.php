<?php

declare(strict_types=1);

$pdo = require('../connect.php');

$idcadastro = $_POST['idcadastro'];
$personal_name = $_POST['personal_name'];
$number_phone = $_POST['number_phone'];
$email = $_POST['email'];

$sql = "UPDATE cadastro SET personal_name=?, number_phone=?, email=? WHERE idcadastro=?";
$stmt= $pdo->prepare($sql);
$stmt->execute([$personal_name, $number_phone, $email, $idcadastro]);

echo "Atualizado!";

header("Refresh: 2;url=../../index.php");