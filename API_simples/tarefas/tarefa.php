<?php
class Tarefa {
    public $id;
    public $title;
    public $description;
    public $completed;

    // Construtor
    public function __construct($id, $title, $description, $completed) {
        $this->id = $id;
        $this->title = $title;
        $this->description = $description;
        $this->completed = (bool)$completed;
    }

    // Converter a tarefa em um array associativo
    public function toArray() {
        return array(
            "id" => $this->id,
            "title" => $this->title,
            "description" => $this->description,
            "completed" => $this->completed
        );
    }

    // Definir as propriedades da tarefa
    public function setProperties($title, $description, $completed) {
        $this->title = $title;
        $this->description = $description;
        $this->completed = (bool)$completed;
    }

    // Validar se os dados da tarefa são válidos
    public function validate() {
        if (empty($this->title) || strlen($this->title) > 255) {
            return false;
        }

        if (strlen($this->description) > 1000) {
            return false;
        }

        return true;
    }
}
