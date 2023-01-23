<?php
require_once '../assets/elementos/head_conta.php';
require_once '../assets/elementos/header.php';

?>

<style>
    .card {
        box-shadow: 1px 1px 15px rgb(183, 181, 181);
        padding: 15px;
        margin: 50px;
        margin-left: 35%;
        margin-right: 35%;
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
        margin-right: 20%;
        margin-left: 20%;
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
<h2>Cadastro de Movimentação</h2>

<form action="">
        <div class="nome">
        <label for="">Pessoa</label>
            <select name="pessoas_select" required>
                <option>Selecione</option>
                <?php

                $dbuser = $_ENV['MYSQL_USER'];
                $dbpass = $_ENV['MYSQL_PASS'];

                $pdo = new PDO("mysql:host=mysql;dbname=ist", $dbuser, $dbpass);
                
                $statement = $pdo->prepare("SELECT * FROM pessoas
                INNER JOIN contas
                ON pessoas.id = contas.idcontas;");
                $statement->execute();
                $pessoas = $statement->fetchAll(PDO::FETCH_OBJ);


                foreach ($pessoas as $pessoa) {  ?>
                    <option value="<?php echo $pessoa->id ?>">
                    <?php echo $pessoa->nome ?> - <?php echo $pessoa->cpf ?></option> <?php
} ?>
            </select>
        </div>

        <div>
            <br>
            <label for="">Número da Conta</label>
            <select name="contas_select" required>
                <option>Selecione</option>
                <?php

                $dbuser = $_ENV['MYSQL_USER'];
                $dbpass = $_ENV['MYSQL_PASS'];

                $pdo = new PDO("mysql:host=mysql;dbname=ist", $dbuser, $dbpass);
                $statement = $pdo->prepare("SELECT * FROM contas
                JOIN pessoas ON pessoas.id = contas.idcontas");
                $statement->execute();
                $pessoas = $statement->fetchAll(PDO::FETCH_OBJ);

                foreach ($pessoas as $pessoa) {  ?>
                    <option value="<?php 
                    echo $pessoa->id ?>">
                    <?php echo $pessoa->numConta ?></option> <?php
} ?>
            </select>
        </div>
        <div>
            <br>
            <label for="">Valor</label>
            <input type="number" name="endereco" id="endereco">
        </div>
        <div>
            <br>
            <label for="">Depositar/Retirar
                <select name="" id="">
                <option value="">Selecione</option>
                <option value="">Depositar</option>
                <option value="">Retirar</option>
            </select>
            </label>
            
        </div>
        <input class="btn" type="submit" value="Salvar">
    </form>
</div>

<?php
$dbuser = $_ENV['MYSQL_USER'];
$dbpass = $_ENV['MYSQL_PASS'];

$pdo = new PDO("mysql:host=mysql;dbname=ist", $dbuser, $dbpass);
$statement = $pdo->prepare("SELECT * FROM pessoas
INNER JOIN contas
ON pessoas.id = contas.idcontas;");
$statement->execute();
$contas = $statement->fetchAll(PDO::FETCH_OBJ);

echo '<table>';
echo '<tr>';
echo    '<th>Data</th>';
echo    '<th>Valor</th>';
echo  '</tr>';
echo  '<tr>';

foreach ($contas as $conta) {
    echo "<tr>";
    echo "<td>" . "</td>";
    echo "<td>" . "</td>";
}
echo "</tr>";
echo "</table>";
?>
