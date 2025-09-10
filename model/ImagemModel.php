<?php

require_once __DIR__ . '/../config/database.php';

class ImagemModel
{
    private $conn;
    private $tabela = "imagens";

    public function __construct()
    {
        $database = new Database();
        $this->conn = $database->conectar();
    }

    public function criar($nome_enviado, $nome_original, $caminho) {
        $query = "INSERT INTO $this->tabela (nome_enviado, nome_original, caminho) VALUES (:nome_enviado, :nome_original, :caminho)";
        $stmt = $this->conn->prepare($query);
        
        // utilizar dentro do execulte no lugar de bindparam

        return $stmt->execute([
            ':nome_enviado' => $nome_enviado,
            ':nome_original' => $nome_original,
            ':caminho'=> $caminho
        ]);
    }

    public function listar() {
        $query = "SELECT * FROM $this->tabela ORDER BY data_envio DESC";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();

        return $stmt->fetchAll();
    }

    public function buscarPorId($id) {
        $query = "SELECT * FROM $this->tabela WHERE id = :id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':id',$id);
        $stmt->execute();

        return $stmt->fetch();
    }
}
