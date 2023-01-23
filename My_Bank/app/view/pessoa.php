<?php
// Chama os elementos de cabeçalho
require_once '../assets/elementos/head_pessoa.php';
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
    <h2>Cadastro de Pessoa</h2>
    <form action="../controller/cadastrar.php" method="POST">
        <label>Nome
            <input type="text" name="nome" id="nome" required>
        </label>

        <label>CPF
            <input type="text" name="cpf" id="cpf" required>
        </label>

        <label>Endereço
            <input type="text" name="endereco" id="endereco">
        </label>

        <input type="submit" value="salvar" />
    </form>
</div>

<?php
$dbuser = $_ENV['MYSQL_USER'];
$dbpass = $_ENV['MYSQL_PASS'];

$pdo = new PDO("mysql:host=mysql;dbname=ist", $dbuser, $dbpass);
$statement = $pdo->prepare("SELECT * FROM pessoas");
$statement->execute();
$pessoas = $statement->fetchAll(PDO::FETCH_OBJ);

echo '<table>';
echo '<tr>';
echo    '<th>ID</th>';
echo    '<th>Nome</th>';
echo    '<th>CPF</th>';
echo    '<th>Endereco</th>';
echo    '<th>Ação</th>';
echo    '<th></th>';
echo  '</tr>';
echo  '<tr>';

foreach ($pessoas as $pessoa) {
    echo "<tr>";
    echo "<td>" . $pessoa->id . "</td>";
    echo "<td>" . $pessoa->nome . "</td>";
    echo "<td>" . $pessoa->cpf . "</td>";
    echo "<td>" . $pessoa->endereco . "</td>";
    echo "<td><a href='../controller/deletar.php?id=$pessoa->id' class='remove'>Remover</a></td>";
    echo "<td><a href='./atualizar.php?id=$pessoa->id&nome=$pessoa->nome&cpf=$pessoa->cpf&endereco=$pessoa->endereco' class='edit'>Editar</a></td>";
}
echo "</tr>";
echo "</table>";
?>
<!-- <a href="./"></a> -->