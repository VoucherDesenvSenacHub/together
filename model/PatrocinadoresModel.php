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
        $sql = "SELECT  i.caminho FROM patrocinadores p  INNER JOIN imagens i ON i.id = p.id_imagem_icon";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

}