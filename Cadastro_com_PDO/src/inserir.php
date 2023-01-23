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

  $personal_name = trim($_POST["personal_name"]);
  $number_phone = trim($_POST["number_phone"]);
  $email = trim($_POST["email"]);

  if ($personal_name == "") {
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
  <form name="registration" id="registration" method="post" action="./crud/insert.php">
    <table width="300" border="0" align="center" cellpadding="4" cellspacing="1">
      <tr>
        <td>Nome:</td>
        <td><input name="personal_name" type="text" id="personal_name" value="<?php if (isset($personal_name)) {
                                                                      echo $personal_name;
                                                                    } ?>" <?php if (isset($code) && $code == 1) {
                                                                                    echo "class=errorMsg";
                                                                                  } ?>></td>
      </tr>
      <tr>
        <td>Telefone: </td>
        <td><input name="number_phone" type="text" id="number_phone" value="<?php if (isset($number_phone)) {
                                                                          echo $number_phone;
                                                                        } ?>" <?php if (isset($code) && $code == 2) {
                                                                                        echo "class=errorMsg";
                                                                                      } ?>></td>
      </tr>
      <tr>
        <td> Email: </td>
        <td><input name="email" type="text" id="email" value="<?php if (isset($email)) {
                                                                        echo $email;
                                                                      } ?>" <?php if (isset($code) && $code == 3) {
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