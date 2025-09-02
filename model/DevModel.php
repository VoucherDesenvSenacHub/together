<?php

require_once __DIR__ . '/../config/database.php';


class DevModel{
    private $conn;
    public function __construct() {
        $database = new Database();
        $this->conn = $database->conectar();
    }

    public function devBuscar($nome){
        $sql = "SELECT * FROM devs WHERE nome = :nome";
        $stmt = $this->conn->prepare($sql);
        $stmt ->bindParam("", $nome, PDO::PARAM_STR);
        $stmt ->execute();
    }

    public function devBuscarTudo(){
        $sql = "SELECT * FROM devs";
        $stmt = $this->conn->prepare($sql);
        $stmt ->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

};