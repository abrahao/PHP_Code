<?php
$servername = "localhost";
$username = "root";
$password = "";
$bd = "app";

$conn = new mysqli($servername, $username, $password);

if ($conn->connect_error) {
    die("Conexão falhou");
}
echo "Conexão bem sucedida!";

$conn->close();