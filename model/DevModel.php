<?php

require_once __DIR__ . '/../config/database.php';


class DevModel{
    private $conn;
    public function __construct() {
        $database = new Database();
        $this->conn = $database->conectar();
    }

    public function devBuscarTudo(){
        $sql = "SELECT * FROM devs";
        $stmt = $this->conn->prepare($sql);
        $stmt ->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

};

$devModel = new DevModel();
$devList = $devModel->devBuscarTudo();

$vetor = [];

foreach ($devList as $dev) {
    $vetor[] = [
        "nome" => $dev["nome"],
        "linkedin" => $dev["linkedin"],
        "github" => $dev["github"],
        "imagem" => $dev["imagem"]
    ];
}