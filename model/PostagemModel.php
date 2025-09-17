<?php
require_once __DIR__ . '/../config/database.php';

class PostagemModel
{
    private $conn;

    public function __construct()
    {
        $database = new Database();
        $this->conn = $database->conectar();
    }

    public function criar($titulo, $descricao, $link, $idImagem, $idOng)
    {
        $sql = "INSERT INTO postagens (titulo, dt_postagem, descricao, link, id_imagem, id_ong) 
                VALUES (:titulo, NOW(), :descricao, :link, :id_imagem, :id_ong)";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':titulo', $titulo);
        $stmt->bindParam(':descricao', $descricao);
        $stmt->bindParam(':link', $link);
        $stmt->bindParam(':id_imagem', $idImagem);
        $stmt->bindParam(':id_ong', $idOng);
        return $stmt->execute();
    }

    public function getAll()
    {
        $sql = "SELECT p.id, p.titulo, p.dt_postagem, p.descricao,
                       p.link, i.caminho AS imagem, o.nome AS ong
                FROM postagens p
                LEFT JOIN imagens i ON p.id_imagem = i.id
                LEFT JOIN ongs o ON p.id_ong = o.id
                ORDER BY p.dt_postagem DESC";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getById($id)
    {
        $sql = "SELECT * FROM postagens WHERE id = :id";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function atualizar($id, $titulo, $descricao, $link, $idImagem)
    {
        $sql = "UPDATE postagens 
                SET titulo = :titulo, descricao = :descricao, link = :link, id_imagem = :id_imagem 
                WHERE id = :id";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':id', $id);
        $stmt->bindParam(':titulo', $titulo);
        $stmt->bindParam(':descricao', $descricao);
        $stmt->bindParam(':link', $link);
        $stmt->bindParam(':id_imagem', $idImagem);
        return $stmt->execute();
    }

    public function deletar($id)
    {
        $sql = "DELETE FROM postagens WHERE id = :id";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':id', $id);
        return $stmt->execute();
    }
}
