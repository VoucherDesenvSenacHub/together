<?php
require_once __DIR__ . '/../config/database.php';

class CategoriaOngModel {
    private $conn;

    public function __construct() {
        $database = new Database();
        $this->conn = $database->conectar(); // PDO
    }

    public function getAll() {
        $sql = "SELECT nome FROM categorias_ongs ORDER BY nome ASC";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();

        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

        $lista = [];
        if ($result) {
            foreach ($result as $row) {
                $lista[] = $row['nome'];
            }
        }

        return $lista;
    }
}
?>
