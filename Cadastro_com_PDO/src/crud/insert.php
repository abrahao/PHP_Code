<?php

declare(strict_types=1);

$pdo = require('../connect.php');

$sql = "INSERT INTO cadastro(personal_name, number_phone, email) VALUES (?, ?, ?)";

$prepare = $pdo->prepare($sql);
$prepare->bindParam(1, $_POST['personal_name']);
$prepare->bindParam(2, $_POST['number_phone']);
$prepare->bindParam(3, $_POST['email']);

$prepare->execute();

echo "Registrado!";

header("Refresh: 2;url=../../index.php");
