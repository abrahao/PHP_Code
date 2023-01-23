<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <title>Cadastro para testar o PDO</title>
  <link rel="stylesheet" href="../../assets/style.css">
  <style type="text/css">
    .errorMsg {
      border: 1px solid red;
    }

    .message {
      color: red;
      font-weight: bold;
    }
  </style>
</head>
<?php
if (isset($_POST['Salvar'])) {

  $idcadastro = trim($_POST["idcadastro"]);
  $number_phone = trim($_POST["number_phone"]);
  $email = trim($_POST["email"]);

  if ($idcadastro == "") {
    $errorMsg =  "Erro: Você não adicionou um nome";
    $code = "1";
  }
   elseif ($number_phone == "") {
    $errorMsg =  "Erro: Entre com um número";
    $code = "2";
  }
  //check if the number field is numeric
  elseif (is_numeric(trim($number_phone)) == false) {
    $errorMsg =  "Erro: Entre com números válidos.";
    $code = "2";
  } 
  elseif (strlen($number_phone) < 10) {
    $errorMsg =  "Erro : Telefone tem que conter no mínimo 10 digitos";
    $code = "2";
  }
  // //check if email field is empty
  elseif ($email == "") {
    $errorMsg =  "Erro: Você não adicionou um email";
    $code = "3";
  } //check for valid email 
  elseif (!preg_match("/^[_\.0-9a-zA-Z-]+@([0-9a-zA-Z][0-9a-zA-Z-]+\.)+[a-zA-Z]{2,6}$/i", $email)) {
    $errorMsg = 'Erro: Você nao entrou com email válido';
    $code = "3";
  }
   else {
    echo "Sucesso";
    //final code will execute here.
  }
}
?>

<body>
  
  <?php if (isset($errorMsg)) {
    echo "<p class='message'>" . $errorMsg . "</p>";
  } ?>
<?php
require __DIR__ . '../../assets/header2.php';
?>
  <form name="registration" id="registration" method="post" action="./crud/delete.php">
    <table width="300" border="0" align="center" cellpadding="4" cellspacing="1">
      <tr>
        <td>Id:</td>
        <td><input name="idcadastro" type="number" id="idcadastro" value="<?php if (isset($idcadastro)) {
                                                                      echo $idcadastro;
                                                                    } ?>" <?php if (isset($code) && $code == 1) {
                                                                                    echo "class=errorMsg";
                                                                                  } ?>></td>
      </tr>
      
      <tr>
        <td></td>
        <td><input type="submit" name="Submit" value="Submit"></td>
      </tr>
    </table>
  </form>

</body>

</html>