<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD - POO</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">

</head>

<body>
    <h1>Cadastro de Produtos</h1>
    <form action="./Controller/ProdutoController.php" method="post">
        <input type="text" name="nome" id="nome" placeholder="Nome">
        <input type="text" name="descricao" id="descricao" placeholder="Descrição">

        <button class="btn btn-primary" type="submit" name="cadastrar">Cadastrar</button>

    </form>
</body>

</html>