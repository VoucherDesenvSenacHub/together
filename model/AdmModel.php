<?php

require_once __DIR__ . '/../config/database.php';

class AdmModel
{
    private $conn;

    public function __construct()
    {
        $database = new Database();
        $this->conn = $database->conectar();
    }


    public function findPatrocinadoresBySearch($nome_patrocinador)
    {
        $sql = "SELECT nome FROM patrocinadores WHERE nome LIKE :nome_patrocinador";
        $stmt = $this->conn->prepare($sql);
        $nome_patrocinador = '%' . $nome_patrocinador . '%';
        $stmt->bindParam(':nome_patrocinador', $nome_patrocinador);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    
    public function findUsuarioBySearch($nome_usuario){
        $sql = "SELECT dt_criacao nome WHERE nome LIKE :nome_usuario";
        $stmt = $this->conn->prepare($sql);
        $nome_usuario = '%' . $nome_usuario . '%';
        $stmt->bindParam(':nome_usuario', $nome_usuario);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function findOngBySearch($nome_ong)
    {
        $sql = "SELECT razao_social, dt_fundacao, status_validacao FROM ongs WHERE razao_social LIKE :nome_ong";
        $stmt = $this->conn->prepare($sql);
        $nome_ong = '%' . $nome_ong . '%';
        $stmt->bindParam(':nome_ong', $nome_ong);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    
    
}