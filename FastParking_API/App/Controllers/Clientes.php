<?php
use App\Core\Controller;

class Clientes extends Controller{

    public function index(){
        $clienteModel = $this->model("Cliente");

        $registros = $clienteModel->listarTodos();

        echo json_encode($registros, JSON_UNESCAPED_UNICODE);
    }

    public function store(){
        $novoPreco = $this->getRequestBody();
        $clienteModel = $this->model("Cliente");
        $clienteModel->nomeCliente = $novoPreco->nome_cliente;
        $clienteModel->placaCarro = $novoPreco->placa_carro;
        $clienteModel->dataHoraEntrada = $novoPreco->data_hora_entrada;

        //Pegar o ultimo preco inserido
        $precoModel = $this->model("Preco");
        $ultimoPreco = $precoModel->getUltimoInserido();
        $clienteModel->precoId = $ultimoPreco->id;
        $clienteModel = $clienteModel->inserir();

        if ($precoModel) {
            http_response_code(201);
            echo json_encode($precoModel);
        } else {
            http_response_code(500);
            echo json_encode(["erro" => "Problemas ao inserir o preco"]);
        }
        
    }
}