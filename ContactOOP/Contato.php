<?php

final class Contato
{
    private $nome;
    private $email;
    private $mensagem;
    public function __construct($nome, $email, $mensagem)
    {
        $this->nome = $nome;
        $this->email = $email;
        $this->mensagem = $mensagem;
    }

    public function exibirMensagem(){
        $mensagemFormatada = "Mensagem de: " . $this->nome  . "\n";
        $mensagemFormatada .= "Email: " . $this->email . "\n";
        $mensagemFormatada .= "Mensagem " . $this->mensagem . "\n";

        echo nl2br($mensagemFormatada);
    }
}
