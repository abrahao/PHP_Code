<?php

error_reporting(error_reporting() & ~E_NOTICE & ~E_WARNING);


require 'config/database.php';
require 'tarefas/tarefa.php';
require 'tarefas/tarefaDAO.php';
require './auth/token.php';

// Conecta ao banco de dados
$db = new PDO("mysql:host={$host};dbname={$db_name}", $username, $password);
$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

// Cria uma instância do TarefaDAO
$tarefaDAO = new TarefaDAO($db);
$key = "minha_chave";
$auth = new AuthJWT($key);

// Roteamento
if ($_SERVER['REQUEST_METHOD'] === 'GET' && preg_match('#^/api-tarefas/tarefas$#', $_SERVER['REQUEST_URI'])) {
    $token = $_SERVER['HTTP_AUTHORIZATION'] ?? null;

    if ($token) {
        $dados = $auth->verificarToken($token);
        if ($dados) {
            // Listar todas as tarefas
            $tarefas = $tarefaDAO->listarTarefas();
            $tarefas_array = array();

            while ($row = $tarefas->fetch(PDO::FETCH_ASSOC)) {
                $tarefa = new Tarefa($row['id'], $row['title'], $row['description'], $row['completed']);
                array_push($tarefas_array, $tarefa->toArray());
            }

            echo json_encode($tarefas_array);
        } else {
            http_response_code(401);
            echo json_encode(array("message" => "Acesso não autorizado."));
        }
    } else {
        http_response_code(401);
        echo json_encode(array("message" => "Token JWT ausente."));
    }
} elseif ($_SERVER['REQUEST_METHOD'] === 'POST' && preg_match('#^/api-tarefas/tarefas$#', $_SERVER['REQUEST_URI'])) {
    $token = $_SERVER['HTTP_AUTHORIZATION'] ?? null;

    if ($token) {
        $dados = $auth->verificarToken($token);
        if ($dados) {
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
        } else {
            http_response_code(401);
            echo json_encode(array("message" => "Acesso não autorizado."));
        }
    } else {
        http_response_code(401);
        echo json_encode(array("message" => "Token JWT ausente."));
    }
} elseif (preg_match('#^/api-tarefas/tarefas/(\d+)$#', $_SERVER['REQUEST_URI'], $matches) && $_SERVER['REQUEST_METHOD'] === 'GET') {
    $token = $_SERVER['HTTP_AUTHORIZATION'] ?? null;

    if ($token) {
        $dados = $auth->verificarToken($token);
        if ($dados) {
            // Listar uma tarefa específica por ID
            $tarefaId = $matches[1];
            $tarefa = $tarefaDAO->getTarefaById($tarefaId);

            if ($tarefa) {
                echo json_encode($tarefa->toArray());
            } else {
                http_response_code(404);
                echo json_encode(array("message" => "Tarefa não encontrada."));
            }
        } else {
            http_response_code(401);
            echo json_encode(array("message" => "Acesso não autorizado."));
        }
    } else {
        http_response_code(401);
        echo json_encode(array("message" => "Token JWT ausente."));
    }
} elseif (preg_match('#^/api-tarefas/tarefas/(\d+)$#', $_SERVER['REQUEST_URI'], $matches) && $_SERVER['REQUEST_METHOD'] === 'PUT') {
    $token = $_SERVER['HTTP_AUTHORIZATION'] ?? null;

    if ($token) {
        $dados = $auth->verificarToken($token);
        if ($dados) {
            // Atualizar uma tarefa específica por ID
            $tarefaId = $matches[1];
            $data = json_decode(file_get_contents("php://input"));

            // Converter o valor de 'completed' para um booleano
            $data->completed = (strtolower($data->completed) === 'true');

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
            http_response_code(401);
            echo json_encode(array("message" => "Acesso não autorizado."));
        }
    } else {
        http_response_code(401);
        echo json_encode(array("message" => "Token JWT ausente."));
    }
} elseif (preg_match('#^/api-tarefas/tarefas/(\d+)$#', $_SERVER['REQUEST_URI'], $matches) && $_SERVER['REQUEST_METHOD'] === 'DELETE') {
    $token = $_SERVER['HTTP_AUTHORIZATION'] ?? null;

    if ($token) {
        $dados = $auth->verificarToken($token);
        if ($dados) {
            // Excluir uma tarefa específica por ID
            $tarefaId = $matches[1];

            if ($tarefaDAO->excluirTarefa($tarefaId)) {
                echo json_encode(array("message" => "Tarefa excluída com sucesso."));
            } else {
                http_response_code(503);
                echo json_encode(array("message" => "Não foi possível excluir a tarefa."));
            }
        } else {
            http_response_code(401);
            echo json_encode(array("message" => "Acesso não autorizado."));
        }
    } else {
        http_response_code(401);
        echo json_encode(array("message" => "Token JWT ausente."));
    }
} else {
    http_response_code(404);
    echo json_encode(array("message" => "Rota não encontrada."));
}
