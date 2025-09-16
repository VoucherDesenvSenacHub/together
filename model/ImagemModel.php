<?php
require_once __DIR__ . '/../config/database.php';

class ImagemModel {
    private $conn;

    public function __construct($conn) {
        $this->conn = $conn;  // <- recebe a conexão via controller
    }

    public function salvar($nome_enviado, $nomeOriginal, $caminho) {
        $sql = "INSERT INTO imagens (nome_enviado, nome_original, caminho) 
                VALUES (:nome_enviado, :nome_original, :caminho)";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([
            ':nome_enviado' => $nome_enviado,
            ':nome_original' => $nomeOriginal,
            ':caminho' => $caminho
        ]);
    }
}
