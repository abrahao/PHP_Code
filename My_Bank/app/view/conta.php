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
    <h2>Cadastro de Conta</h2>

    <form method="POST" action="../controller/cadastrar_num_conta.php?id=$pessoas_select">
        <div class="pessoa">
            <label for="">Pessoa</label>
            <select name="pessoas_select" required>
                <option>Selecione</option>
                <?php

                $dbuser = $_ENV['MYSQL_USER'];
                $dbpass = $_ENV['MYSQL_PASS'];

                $pdo = new PDO("mysql:host=mysql;dbname=ist", $dbuser, $dbpass);
                $statement = $pdo->prepare("SELECT * FROM pessoas");
                $statement->execute();
                $pessoas = $statement->fetchAll(PDO::FETCH_OBJ);


                foreach ($pessoas as $pessoa) {  ?>
                    <option value="<?php echo $pessoa->id ?>">
                    <?php echo $pessoa->nome ?> - <?php echo $pessoa->cpf ?></option> <?php
} ?>
            </select>
        </div>
        <div class="numConta">
            <label for="">Número da Conta</label>
            <input type="text" name="numConta" id="numConta" required>
        </div>
        <div>
            <input class="btn" type="submit" value="Salvar">
        </div>
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
echo    '<th>Nome</th>';
echo    '<th>CPF</th>';
echo    '<th>Número da Conta</th>';
echo    '<th>Ação</th>';
echo    '<th></th>';
echo  '</tr>';
echo  '<tr>';

foreach ($contas as $conta) {
    $conta->idcontas; 
    echo "<tr>";
    echo "<td>" . $conta->nome . "</td>";
    echo "<td>" . $conta->cpf . "</td>";
    echo "<td>" . $conta->numConta . "</td>";
    echo "<td><a href='../controller/deletar_conta.php?idcontas=$conta->idcontas' class='remove'>Remover</a></td>";
    echo "<td><a href='' class='edit'>Editar</a></td>";
}
echo "</tr>";
echo "</table>";
?>
