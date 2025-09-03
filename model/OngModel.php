<?php

require_once __DIR__ . '/../config/database.php';

class OngModel
{
    private $conn;
    public function __construct()
    {
        $database = new Database();
        $this->conn = $database->conectar();
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

    public function findVoluntarioBySearch($nome_usuario)
    {
        $sql = "SELECT V.dt_associacao, U.nome
                      FROM voluntarios V 
                      JOIN usuarios U ON U.id = V.id_usuario 
                      WHERE U.nome
                      LIKE :nome_usuario
                      ORDER BY V.dt_associacao DESC";

        $stmt = $this->conn->prepare($sql);
        $nome_usuario = '%' . $nome_usuario . '%';
        $stmt->bindParam(':nome_usuario', $nome_usuario);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);

    }

    public function findDonorSearch($nome_doador)
    {
        $sql = "SELECT D.dt_doacao, U.nome, D.valor
                      FROM doacoes D 
                      JOIN usuarios U ON U.id = D.id_usuario 
                      WHERE U.nome
                      LIKE :nome_doador
                      ORDER BY D.dt_doacao DESC";

        $stmt = $this->conn->prepare($sql);
        $nome_doador = '%' . $nome_doador . '%';
        $stmt->bindParam(':nome_doador', $nome_doador);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function filtroDataHoraDoacoes($data_inicio, $data_fim)
    {
        $sql = "SELECT D.dt_doacao, U.nome, D.valor
                      FROM doacoes D 
                      JOIN usuarios U ON U.id = D.id_usuario 
                      WHERE D.dt_doacao BETWEEN :data_inicio AND :data_fim
                      ORDER BY D.dt_doacao DESC";

        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':data_inicio', $data_inicio);
        $stmt->bindParam(':data_fim', $data_fim);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}

