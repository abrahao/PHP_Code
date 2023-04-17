<h1>Listar Usuários</h1>

<?php
$sql = "SELECT * FROM usuarios";
$res = $conn->query($sql);
$qtd = $res->num_rows;



?>