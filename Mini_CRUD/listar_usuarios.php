<h1>Listar Usuários</h1>

<?php
$sql = "SELECT * FROM usuarios";
$res = $conn->query($sql);
$qtd = $res->rowCount();

if ($qtd > 0) {
?>
<table class="table table-striped table-hover" style="text-align: center;">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">nome</th>
      <th scope="col">E-mail</th>
      <th scope="col">Data de Nascimento</th>
      <th scope="col">Ação</th>

    </tr>
  </thead>
  <tbody style="text-align: center;">
    <?php while ($row = $res->fetchObject()) { ?>
    <tr>
      <th scope="row"><?= $row->id ?></th>
      <td><?= $row->nome ?></td>
      <td><?= $row->email?></td>
      <td><?= $row->nascimento?></td>
      <td>
      <button type="button" class="btn btn-warning" onclick="location.href='?page=editar&id=<?= $row->id ?>'">Editar</button>
      <button type="button" class="btn btn-danger" onclick="location.href='?page=excluir&id=<?= $row->id ?>'">Excluir</button>
      </td>
    </tr>
  </tbody>
  <?php } 
}?>
</table>