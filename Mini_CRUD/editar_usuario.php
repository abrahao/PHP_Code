<h1>Editar Usuário</h1>
<?php
$sql = "SELECT * FROM usuarios WHERE id=".$_REQUEST['id'];
$res = $conn->query($sql);
$row = $res->fetchObject()
?>
<form action="?page=salvar" method="POST">
    <input type="hidden" name="acao" value="editar">
    <input type="hidden" name="id" value="<?php print $row->id ?> ">

    <div class="mb-3">
        <label class="form-label">Nome </label>
        <input type="text" class="form-control" id="nome" name="nome" value="<?= $row->nome ?>">
    </div>
    <div class="mb-3">
        <label class="form-label">E-mail</label>
        <input type="email" class="form-control" id="email" name="email" value="<?= $row->email ?>">
    </div>
    <div class="mb-3">
        <label class="form-label" >Senha</label>
        <input type="password" class="form-control" id="senha" name="senha" value="<?= $row->senha ?>">
    </div>
    <div class="mb-3">
        <label class="form-label">data de Nascimento</label>
        <input type="date" class="form-control" id="nascimento" name="nascimento" value="<?= $row->nascimento  ?>">
    </div>

    <button type="submit" class="btn btn-primary ">Editar</button>
</form>