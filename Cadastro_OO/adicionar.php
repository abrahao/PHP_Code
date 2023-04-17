<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Form</title>
</head>

<body>

    <div class="container mt-5">
        <div class="mb-3 row">
            <label for="staticNome" class="col-sm-2 col-form-label">Nome</label>
            <div class="col-sm-4">
                <input type="text" class="form-control" id="inputNome">
            </div>
        </div>
        <div class="mb-3 row">
            <label for="inputidade" class="col-sm-2 col-form-label">Idade</label>
            <div class="col-sm-4">
                <input type="number" class="form-control" id="inputidade">
            </div>
        </div>
        <button class="btn btn-primary" type="submit">Salvar</button>
    </div>


</body>

</html>