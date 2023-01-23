<?php

declare(strict_types=1);

$pdo = null;

$servername = "localhost";
$username = "root";
$password = "root";

try {
    $pdo = new PDO("mysql:host=$servername;dbname=test", $username, $password);
} catch (Exception $e) {
    echo $e->getMessage();
    die();
}

return $pdo;