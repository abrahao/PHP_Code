<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista Pessoas</title>
</head>
<body>
    <table border="1">
        <tr>
            <th></th>
            <th>ID</th>
            <th>Nome</th>
            <th>CPF</th>
            <th>Data de Nascimento</th>
            <th>Atualizar</th>
        </tr>
        <?php foreach ($model->rows as $item): ?>
        <tr>
        <td><a href="/pessoa/delete?id=<?= $item->id ?>">X</a></td>
            <td><?= $item->id ?></td>
            <td><?= $item->nome ?></td>
            <td><?= $item->cpf ?></td>
            <td><?= $item->data_nascimento ?></td>
            <td><a href="/pessoa/form?id=<?= $item->id ?>">Ver</a></td>
        </tr>
        <?php endforeach ?>
        
        <?php
            if (count($model->rows)==0): ?>
                <tr>
                    <td colspan="5">Nenhum registro encontrado</td>
                </tr>
                <?php endif ?>
    </table>
</body>
</html>