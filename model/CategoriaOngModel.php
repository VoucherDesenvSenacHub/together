<?php
require_once __DIR__ . '/../config/database.php';

class CategoriaOngModel
{
    private $conn;

    public function __construct()
    {
        $database = new Database();
        $this->conn = $database->conectar(); // PDO
    }

    public function getAll()
    {
        $sql = "SELECT id, nome FROM categorias_ongs ORDER BY nome ASC";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();

        // fetchAll já retorna um array associativo com id e nome de cada linha
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
