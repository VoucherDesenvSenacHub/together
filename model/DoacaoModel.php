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
    public function BuscarDoacoesPorID(int $idUsuario, ?int $pagina = null, int $tamanhoPagina = 15){
        if($pagina === null){
            $query = "SELECT D.dt_doacao, O.razao_social, D.valor FROM doacoes D JOIN ongs O ON O.id = D.id_ong JOIN usuarios U ON U.id = D.id_usuario WHERE U.id = :id";
            $stmt = $this->conn->prepare($query);
            $stmt->bindParam(':id', $idUsuario);
        }else{
            $offset = ($pagina - 1) * $tamanhoPagina;
            $query = "SELECT D.dt_doacao, O.razao_social, D.valor FROM doacoes D JOIN ongs O ON O.id = D.id_ong JOIN usuarios U ON U.id = D.id_usuario WHERE U.id = :id LIMIT :tamanhoPagina OFFSET :offset";
            $stmt = $this->conn->prepare($query);
            $stmt->bindParam(':id', $idUsuario);
            $stmt->bindParam(':tamanhoPagina', $tamanhoPagina, PDO::PARAM_INT);
            $stmt->bindParam(':offset', $offset, PDO::PARAM_INT);
        }
        
        $stmt->execute();
        return $stmt->fetchAll();
    }
}