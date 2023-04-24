<?php

class Produto{

    private $id;
    private $nome;
    private $descricao;

    public function getNome(){
        return $this->nome;
    }
    public function getDescricao(){
        return $this->descricao;
    } 

    public function setNome($nome){
        $this->nome = $nome;
    }
    public function setDescricao($descricao){
        $this->descricao = $descricao;
    }
}