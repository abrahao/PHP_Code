<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrao 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">

    <title>Mini CRUD</title>
</head>

<body>
    <div class="container">
        <?php include_once('parts/navbar.php');
        include_once('database/config.php');
        ?>
        <div class="row">
            <div class="col mt-5">
                <?php
                switch (@$_REQUEST['page']) {
                    case 'novo':
                        include('./crud/novo_usuario.php');
                        break;
                    case 'listar':
                        include('./crud/listar_usuarios.php');
                        break;
                    case 'salvar':
                        include('./crud/salvar_usuario.php');
                        break;
                    case 'editar':
                        include('./crud/editar_usuario.php');
                        break;
                    default:
                        print "<h1>Aplicando os conhecimentos de PHP e MySQL</h1>";
                        break;
                }
                ?>
            </div>
        </div>
    </div>


</body>

</html>