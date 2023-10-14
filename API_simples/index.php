<?php
require 'config/database.php';
require 'tarefas/tarefa.php';
require 'tarefas/tarefaDAO.php';

// Conecte-se ao banco de dados
$db = new PDO("mysql:host={$host};dbname={$db_name}", $username, $password);
$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

// Crie uma instância do TarefaDAO
$tarefaDAO = new TarefaDAO($db);

// Roteamento
if ($_SERVER['REQUEST_METHOD'] === 'GET' && preg_match('#^/api-tarefas/tarefas$#', $_SERVER['REQUEST_URI'])) {
    // Listar todas as tarefas
    $tarefas = $tarefaDAO->listarTarefas();
    $tarefas_array = array();

    while ($row = $tarefas->fetch(PDO::FETCH_ASSOC)) {
        $tarefa = new Tarefa($row['id'], $row['title'], $row['description'], $row['completed']);
        array_push($tarefas_array, $tarefa->toArray());
    }

    echo json_encode($tarefas_array);
} elseif ($_SERVER['REQUEST_METHOD'] === 'POST' && preg_match('#^/api-tarefas/tarefas$#', $_SERVER['REQUEST_URI'])) {
    // Criar uma nova tarefa
    $data = json_decode(file_get_contents("php://input"));

    $tarefa = new Tarefa(null, $data->title, $data->description, $data->completed);

    if ($tarefa->validate()) {
        if ($tarefaDAO->criarTarefa($tarefa)) {
            http_response_code(201);
            echo json_encode(array("message" => "Tarefa criada com sucesso."));
        } else {
            http_response_code(503);
            echo json_encode(array("message" => "Não foi possível criar a tarefa."));
        }
    } else {
        http_response_code(400);
        echo json_encode(array("message" => "Dados de tarefa inválidos."));
    }
} elseif (preg_match('#^/api-tarefas/tarefas/(\d+)$#', $_SERVER['REQUEST_URI'], $matches) && $_SERVER['REQUEST_METHOD'] === 'GET') {
    // Listar uma tarefa específica por ID
    $tarefaId = $matches[1];
    $tarefa = $tarefaDAO->getTarefaById($tarefaId);

    if ($tarefa) {
        echo json_encode($tarefa->toArray());
    } else {
        http_response_code(404);
        echo json_encode(array("message" => "Tarefa não encontrada."));
    }
} elseif (preg_match('#^/api-tarefas/tarefas/(\d+)$#', $_SERVER['REQUEST_URI'], $matches) && $_SERVER['REQUEST_METHOD'] === 'PUT') {
    // Atualizar uma tarefa específica por ID
    $tarefaId = $matches[1];
    $data = json_decode(file_get_contents("php://input"));

    // Recupere a tarefa existente pelo ID
    $tarefaExistente = $tarefaDAO->getTarefaById($tarefaId);

    if ($tarefaExistente) {
        // Mantenha o ID original
        $tarefa = new Tarefa($tarefaId, $data->title, $data->description, $data->completed);

        if ($tarefa->validate()) {
            if ($tarefaDAO->atualizarTarefa($tarefa)) {
                echo json_encode(array("message" => "Tarefa atualizada com sucesso."));
            } else {
                http_response_code(503);
                echo json_encode(array("message" => "Não foi possível atualizar a tarefa."));
            }
        } else {
            http_response_code(400);
            echo json_encode(array("message" => "Dados de tarefa inválidos."));
        }
    } else {
        http_response_code(404);
        echo json_encode(array("message" => "Tarefa não encontrada."));
    }
} elseif (preg_match('#^/api-tarefas/tarefas/(\d+)$#', $_SERVER['REQUEST_URI'], $matches) && $_SERVER['REQUEST_METHOD'] === 'DELETE') {
    // Excluir uma tarefa específica por ID
    $tarefaId = $matches[1];

    if ($tarefaDAO->excluirTarefa($tarefaId)) {
        echo json_encode(array("message" => "Tarefa excluída com sucesso."));
    } else {
        http_response_code(503);
        echo json_encode(array("message" => "Não foi possível excluir a tarefa."));
    }
} else {
    http_response_code(404);
    echo json_encode(array("message" => "Rota não encontrada."));
}
?>
