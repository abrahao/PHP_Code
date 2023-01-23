<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
</head>
<body>
    <?php
    $arrayIds = [];
    if (filter_input(INPUT_POST, 'btnSubmit', FILTER_UNSAFE_RAW)) {
        $checkboxChecked = filter_input(INPUT_POST, 'ckUsuarios', FILTER_SANITIZE_NUMBER_INT, FILTER_REQUIRE_ARRAY);
        foreach ($checkboxChecked as $ck) {
            $arrayIds[] = $ck;
        }
    }
    ?>
    <div>
            <form method="POST">
        <label for="">
            <input type="checkbox" name="ckUsuarios[]" value="1" id="">
            Lula
        </label>
        <br>

        <label for="">
            <input type="checkbox" name="ckUsuarios[]" value="2" id="">
            Bolsonaro
        </label>
        <br>

        <label for="">
            <input type="checkbox" name="ckUsuarios[]" value="3" id="">
            Ciro Gomes
        </label>
        <br>
        <input type="submit" value="Salvar" name="btnSubmit">
    </form>
    </div>
    <br>
    <div>
          <?php
    for ($i=0; $i < count($arrayIds); $i++) { 
        echo  'ID - '. $arrayIds[$i];
        echo '<br>';
    }
    ?>  
    </div>

</body>
</html>