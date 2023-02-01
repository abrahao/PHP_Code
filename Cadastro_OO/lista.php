<!doctype html>
<html lang="pt-BR">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <title>CRUD PHP</title>
</head>
<body>
  
    <div class="container mt-4">

        <?php include('./Connect.php'); ?>

        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Detalhes do aluno
                            <a href="pessoa-create.php" class="btn btn-primary float-end">Adicionar Aluno</a>
                        </h4>
                    </div>
                    <div class="card-body">

                        <table class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Nome</th>
                                    <th>idade</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                    $query = "SELECT * FROM pessoa";
                                    $query_run = mysqli_query($conn, $query);

                                    if(mysqli_num_rows($query_run) > 0)
                                    {
                                        foreach($query_run as $pessoa)
                                        {
                                            ?>
                                            <tr>
                                                <td><?= $pessoa['id']; ?></td>
                                                <td><?= $pessoa['nome']; ?></td>
                                                <td><?= $pessoa['idade']; ?></td>
                                                
                                            </tr>
                                            <?php
                                        }
                                    }
                                    else
                                    {
                                        echo "<h5> Nenhum aluno cadastrado </h5>";
                                    }
                                ?>
                                
                            </tbody>
                        </table>

                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>