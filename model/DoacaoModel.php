<?php 

require_once __DIR__. "/../config/database.php";

class DoacaoModel {
    private $conn;
    private float $_valor;
    private bool $_anonimo;
    private DateTime $_dtDoacao;
    private int $_idUsuario;
    private int $_idOng;

    public function __construct() {
        $database = new Database();
        $this->conn = $database->conectar();
    }

    // paginar
    public function BuscarDoacoesPorID(int $idUsuario){
        $query = "SELECT D.dt_doacao, O.razao_social, D.valor FROM doacoes D JOIN ongs O ON O.id = D.id_ong JOIN usuarios U ON U.id = D.id_usuario WHERE U.id = :id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':id', $idUsuario);
        $stmt->execute();
        return $stmt->fetchAll();
    }
}