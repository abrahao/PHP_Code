<?php

use App\Core\Model;

class Cliente{
    public $id;
    public $nomeCliente;
    public $placaCarro;
    public $dataHoraEntrada;
    public $dataHoraSaida;
    public $valoTotal;
    public $precoId;
 
    public function listarTodos(){
        $sql = " SELECT * FROM cliente ORDER BY id DESC ";

        $stmt = Model::getConn()->prepare($sql);
        $stmt->execute();

        if ($stmt->rowCount() > 0) {
            $resultado = $stmt->fetchAll(PDO::FETCH_OBJ);
            return $resultado;
        } else {
            return [];
        }
    }
    public function inserir(){
        $sql = " INSERT INTO cliente(nome_cliente, placa_carro, data_hora_entrada, preco_id )
         VALUES(?, ?, ?, ?) ";
        $stmt = Model::getConn()->prepare($sql);
        $stmt->bindValue(1, $this->nomeCliente); 
        $stmt->bindValue(2, $this->placaCarro); 
        $stmt->bindValue(3, $this->dataHoraEntrada);     
        $stmt->bindValue(4, $this->precoId); 
    
        if ($stmt->execute()) {
            $this->id = Model::getConn()->lastInsertId();
            return $this;
        } else {
            print_r($stmt->errorInfo());
            return null;
        }
        
    }
}