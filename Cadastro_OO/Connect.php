<?php
$servername = "localhost";
$username = "root";
$password = "root";
$database = "cadastro_simples";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $database);

// Check connection
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}
?>