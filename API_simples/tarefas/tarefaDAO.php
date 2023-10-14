<?php
class TarefaDAO {
    private $conn;
    private $table_name = "tasks";

    public function __construct($db) {
        $this->conn = $db;
    }

    // Listar todas as tarefas
    public function listarTarefas() {
        $query = "SELECT * FROM " . $this->table_name;
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt;
    }

    // Criar uma nova tarefa
    public function criarTarefa($tarefa) {
        $query = "INSERT INTO " . $this->table_name . " (title, description, completed) VALUES (:title, :description, :completed)";
        $stmt = $this->conn->prepare($query);
        $tarefa->title = htmlspecialchars(strip_tags($tarefa->title));
        $tarefa->description = htmlspecialchars(strip_tags($tarefa->description));
        
        // Converter o valor de 'completed' para um inteiro (0 para false, 1 para true)
        $completed = $tarefa->completed ? 1 : 0;
        
        $stmt->bindParam(":title", $tarefa->title);
        $stmt->bindParam(":description", $tarefa->description);
        
        // Use PDO::PARAM_INT para o campo 'completed'
        $stmt->bindParam(":completed", $completed, PDO::PARAM_INT);
        
        if ($stmt->execute()) {
            return true;
        }
        return false;
    }
    
    // Atualizar uma tarefa
    public function atualizarTarefa(Tarefa $tarefa) {
        $query = "UPDATE tasks SET title = :title, description = :description, completed = :completed WHERE id = :id";
    
        // Bind os parâmetros
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(":id", $tarefa->id);
        $stmt->bindParam(":title", $tarefa->title);
        $stmt->bindParam(":description", $tarefa->description);
    
        // Converter o valor de 'completed' para um inteiro (0 para false, 1 para true)
        $completed = $tarefa->completed ? 1 : 0;
        $stmt->bindParam(":completed", $completed);
    
        // Execute a consulta
        if ($stmt->execute()) {
            return true;
        } else {
            return false;
        }
    }
    

    // Excluir uma tarefa por ID
    public function excluirTarefa($id) {
        $query = "DELETE FROM " . $this->table_name . " WHERE id = ?";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(1, $id);
        if ($stmt->execute()) {
            return true;
        }
        return false;
    }

    // Obter uma tarefa pelo ID
    public function getTarefaById($id) {
        $query = "SELECT * FROM " . $this->table_name . " WHERE id = ?";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(1, $id);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
}
