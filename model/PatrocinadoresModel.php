<?php

require_once __DIR__ . '/../config/database.php';

class PatrocinadoresModel
{
    private $conn;
    public function __construct()
    {
        $database = new Database();
        $this->conn = $database->conectar();
    }
    public function findPatrocinadores()
    {
        $sql = "SELECT p.id, p.nome, p.dt_criacao, p.rede_social, p.ativo,i.caminho, i.id as id_imagem FROM patrocinadores p  INNER JOIN imagens i ON i.id = p.id_imagem_icon WHERE p.ativo = :ativo";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([
            ":ativo" => true
        ]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function buscaPatrocinadoresPorNome($nome)
    {
        $query = "SELECT p.id, p.nome, p.dt_criacao, p.rede_social, p.ativo, i.id as id_imagem, i.caminho FROM patrocinadores p INNER JOIN imagens i ON i.id = p.id_imagem_icon WHERE p.nome LIKE :nome AND p.ativo = :ativo";
        $stmt = $this->conn->prepare($query);
        $stmt->bindValue(":nome", "%$nome%");
        $stmt->bindValue(":ativo", true);
        $stmt->execute();
        return $stmt->fetchAll();
    }

    public function cadastrarPatrocinador($nome, $rede_social, $id_imagem_icon)
    {
        try {
            $query = "INSERT INTO patrocinadores (nome, rede_social, ativo, id_imagem_icon) VALUES (:nome, :rede_social, :ativo, :id_imagem_icon)";
            $stmt = $this->conn->prepare($query);

            $stmt->execute([
                ':nome' => $nome,
                ':rede_social' => $rede_social,
                ':ativo' => true,
                ':id_imagem_icon' => $id_imagem_icon
            ]);

            return [
                'response' => true
            ];
        } catch (Exception $e) {
            return [
                'response' => false,
                'messageErro' => $e->getMessage()
            ];
        }
    }

    public function editarPatrocinadores($id, $nome, $rede_social, $id_imagem_icon)
    {
        try {
            $query = "UPDATE patrocinadores SET nome = :nome, rede_social = :rede_social, id_imagem_icon = :id_imagem_icon WHERE id = :id";
            $stmt = $this->conn->prepare($query);

            $stmt->execute([
                ':id' => $id,
                ':nome' => $nome,
                ':rede_social' => $rede_social,
                ':id_imagem_icon' => $id_imagem_icon
            ]);

            return [
                'response' => true
            ];
        } catch (Exception $e) {
            return [
                'response' => false,
                'messageErro' => $e->getMessage()
            ];
        }
    }

    public function desativarPatrocinador($id)
    {
        try {
            $query = "UPDATE patrocinadores SET ativo = :desativar WHERE id = :id";
            $stmt = $this->conn->prepare($query);
            $stmt->execute([
                ':id' => $id,
                ':desativar' => false
            ]);

            return [
                'response' => true
            ];
        } catch (Exception $e) {
            return [
                'response' => false,
                'messageErro' => $e->getMessage()
            ];
        }
    }

    public function buscarPatrocinadorPorId($id)
    {
        $query = "SELECT p.id, p.nome, p.rede_social, i.id as id_imagem FROM patrocinadores p INNER JOIN imagens i ON i.id = p.id_imagem_icon WHERE p.id = :id AND p.ativo = :ativo";
        $stmt = $this->conn->prepare($query);
        $stmt->execute([
            ':id' => $id,
            ':ativo' => true
        ]);
        return $stmt->fetch();
    }
}
