<h1>Listar Usuários</h1>

<?php
$sql = "SELECT * FROM usuarios";
$res = $conn->query($sql);
$qtd = $res->rowCount();

if ($qtd > 0) {
?>
<table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">nome</th>
      <th scope="col">E-mail</th>
      <th scope="col">Data de Nascimento</th>
    </tr>
  </thead>
  <tbody>
    <?php while ($row = $res->fetchObject()) { ?>
    <tr>
      <th scope="row"><?= $row->id ?></th>
      <td><?= $row->nome ?></td>
      <td><?= $row->email?></td>
      <td><?= $row->nascimento?></td>
    </tr>
  </tbody>
  <?php } 
}?>
</table>