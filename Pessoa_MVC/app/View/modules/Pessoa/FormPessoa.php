<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro</title>
</head>
<style>
    label, input{
        display: block;
    }
</style>
<body>
    <fieldset>
        <legend>Cadastro de Pessoa</legend>
        <form action="/pessoa/form/save" method="POST">
            <input type="hidden" value="<?= $model->id ?>">
        <label for="nome">Nome</label>
        <input type="text" name="nome" id="nome" value="<?= $model->nome ?>">

        <label for="cpf">CPF</label>
        <input type="number" name="cpf" id="cpf" value="<?= $model->cpf ?>">

        <label for="data_nascimento">Data de Nascimento</label>
        <input type="date" name="data_nascimento" id="data_nascimento" value="<?= $model->data_nascimento ?>">

        <button type="submit">Salvar</button>
    </form>
    </fieldset>
    
</body>
</html>