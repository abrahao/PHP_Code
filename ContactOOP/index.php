<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Contact</title>
</head>

<body>
    <div class="container">
        <h3>Contato</h3>
        <form action="processar_formulario.php" method="POST">
            <label for="nome">Nome</label>
            <input type="text" name="nome" id="nome"><br>

            <label for="email">E-mail</label>
            <input type="email" name="email" id="email"><br>

            <label for="mensagem">mensagem</label><br>
            <textarea name="mensagem" id="mensagem" cols="23" rows="10"></textarea><br>

            <button type="submit">Enviar</button>

        </form>
    </div>

</body>

</html>