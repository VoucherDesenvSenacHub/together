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

        $stmt->execute([
            ':nome_enviado' => $nome_enviado,
            ':nome_original' => $nome_original,
            ':caminho'=> $caminho
        ]);
        
        return $this->conn->lastInsertId();
    }

    public function buscarImagemPorId($id) {
        $query = "SELECT * FROM $this->tabela  WHERE id=:id";
        $stmt = $this->conn->prepare($query);
        $stmt->execute([
            ':id' => $id
        ]);

        return $stmt->fetch();
    }

   public function buscarImagemPorIdPagina($id) {
        $query = "SELECT i.* FROM $this->tabela i INNER JOIN paginas p ON i.id = p.id_imagem WHERE p.id = :id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':id',$id);
        $stmt->execute();
        return $stmt->fetch();
    }

    public function atualizar($id, $nome_enviado, $nome_original, $caminho) {
        $query = "UPDATE imagens SET nome_enviado = :nome_enviado, nome_original = :nome_original, caminho = :caminho WHERE id = :id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':nome_enviado', $nome_enviado);
        $stmt->bindParam(':nome_original', $nome_original);
        $stmt->bindParam(':caminho', $caminho);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        return $stmt->execute();
    }
}
