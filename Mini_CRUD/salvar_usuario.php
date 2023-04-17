<?php

switch ($_REQUEST["acao"]) {
    case 'cadastrar':
        $nome = $_POST['nome'];
        $email = $_POST['email'];
        $senha = md5($_POST['senha']);
        $nascimento = $_POST['nascimento'];

        $sql = "INSERT INTO usuarios (nome, email, senha, nascimento)
        values('{$nome}', '{$email}', '{$senha}', '{$nascimento}')";

        $res = $conn->query($sql);

        if ($res == true) {
            print "<script>alert('Usuário Cadastrado')</script>";
            print "<script>location.href='?page=listar'</script>";
        } else {
            print "<script>alert('erro ao Cadastrar')</script>";
            print "<script>location.href='?page=listar'</script>";
        }

        break;
    case 'editar':
        $nome = $_POST['nome'];
        $email = $_POST['email'];
        $senha = md5($_POST['senha']);
        $nascimento = $_POST['nascimento'];

        $sql = "UPDATE usuarios SET 
        nome = '{$nome}',
        email = '{$email}',
        senha = md5('{$senha}'),
        nascimento = '{$nascimento}' 
        WHERE id=" . $_REQUEST['id'];

        $res = $conn->query($sql);

        if ($res == true) {
            print "<script>alert('Editado com Sucesso!')</script>";
            print "<script>location.href='?page=listar'</script>";
        } else {
            print "<script>alert('erro ao Editar')</script>";
            print "<script>location.href='?page=cadastrar'</script>";
        }

        break;
    case 'excluir':
        # code...
        break;
    default:
        # code...
        break;
}
