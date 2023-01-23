<?php

include_once '../assets/elementos/head_home.php';

$dbuser = $_ENV['MYSQL_USER'];
$dbpass = $_ENV['MYSQL_PASS'];

$id = $_POST['id'];
$nome = $_GET['nome'];
$cpf = $_GET['cpf'];
$endereco = $_GET['endereco'];

$pdo = new PDO("mysql:host=mysql;dbname=ist", $dbuser, $dbpass);
$statement = $pdo->prepare("SELECT * FROM pessoas");
$statement->execute();
$pessoas = $statement->fetchAll(PDO::FETCH_OBJ);
?>
<style>
    .card {
        box-shadow: 1px 1px 15px rgb(183, 181, 181);
        padding: 15px;
        margin: 50px;
        margin-left: 30%;
        margin-right: 30%;
        border-radius: 5px;

        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        text-align: left;
    }

    table {
        box-shadow: 1px 1px 15px rgb(183, 181, 181);
        padding: 15px;
        margin: 50px;
        margin-right: 10%;
        margin-left: 10%;
        border-radius: 5px;

        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        text-align: left;
    }

    th,
    td {
        padding: 10px;
        text-align: center;
        color: black;
    }


    tr:hover:nth-child(1n) {
        background-color: #D5D1D1;
        color: #fff;
    }

    a {
        color: black;
        text-decoration: none;
    }

    .remove:hover {
        color: red;
    }

    .edit:hover {
        color: orange;
    }
</style>
<div class="card">
    <h2>Atualizar Pessoa</h2>
    <form action="../controller/atualizar_controller.php?id=$pessoa->id'" method="POST">
        <label>Nome
            <input type="text" name="nome" id="nome" value="<?php echo $nome = $_GET['nome'];?>">
        </label>

        <label>CPF
            <input type="text" name="cpf" id="cpf" value="<?php echo $cpf = $_GET['cpf'];?>">
        </label>

        <label>Endereço
            <input type="text" name="endereco" id="endereco" value="<?php echo $endereco = $_GET['endereco']; ?>">
        </label>

        <input type="submit" value="Atualizar" />
    </form>
</div>
