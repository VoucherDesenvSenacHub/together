<?php
require_once __DIR__ . '/../config/database.php';

class ImagemModel {
    private $conn;

    public function __construct() {
        $db = new Database();
        $this->conn = $db->conectar();
    }

    // Salva imagem e retorna o ID gerado
    public function salvar($caminho, $nome_enviado, $nome_original) {
        $sql = "INSERT INTO imagens (nome_enviado, nome_original, caminho) 
                VALUES (:nome_enviado, :nome_original, :caminho)";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([
            ':nome_enviado' => $nome_enviado,
            ':nome_original' => $nome_original,
            ':caminho' => $caminho
        ]);
        return $this->conn->lastInsertId();
    }

}
?>
