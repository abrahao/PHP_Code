<?php
$host = "localhost";
$db_name = "tarefas";
$username = "root";
$password = "";

try {
    $db = new PDO("mysql:host={$host};dbname={$db_name}", $username, $password);
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $exception) {
    echo "Erro de conexão: " . $exception->getMessage();
}
