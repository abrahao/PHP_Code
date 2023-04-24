<?php

class ProdutoDAO{
    
    public function create(Produto $produto){
        try {
            $sql = 'INSERT INTO produto(nome, descricao) VALUES(:nome, :descricao)';
            $q_sql = Conexao::getConexao()->prepare($sql);
            $q_sql->bindValue('nome', $produto->getNome());
            $q_sql->bindValue('descricao', $produto->getDescricao());

            return $q_sql->execute();
        } catch (Exception $e) {
            echo 'Erro ao cadastrar '.$e;
        }
    }
}