<?php

declare(strict_types=1);

$pdo = require('../connect.php');

$idcadastro = $_POST['idcadastro'];

$pdo->prepare("DELETE FROM cadastro WHERE idcadastro=?")->execute([$idcadastro]);

echo "Excluido!";

header("Refresh: 2;url=../../index.php");