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
        $sql = "SELECT  p.nome, p.dt_criacao, p.dt_validade, p.rede_social, p.ativo,i.caminho, i.id FROM patrocinadores p  INNER JOIN imagens i ON i.id = p.id_imagem_icon";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    public function buscaPatrocinadoresPorNome($nome){
        $query = "SELECT p.nome, p.dt_criacao, p.dt_validade, p.rede_social, p.ativo, i.id,i.caminho FROM patrocinadores p  WHERE p.nome LIKE '%:nome%' ";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(":nome", $nome);
        $stmt->execute();
        return $stmt->fetchAll();
    }
}