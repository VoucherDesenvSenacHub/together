<?php 
require_once __DIR__. "/../config/database.php";

class DoacaoModel {
    private $conn;

    public function __construct() {
        $database = new Database();
        $this->conn = $database->conectar();
    }

    // Buscar doações com paginação
    public function BuscarDoacoesPorID(int $idUsuario, ?int $pagina = null, int $tamanhoPagina = 15){
        if($pagina === null){
            // busca total (sem paginação)
            $query = "SELECT D.dt_doacao, O.razao_social, D.valor 
                      FROM doacoes D 
                      JOIN ongs O ON O.id = D.id_ong 
                      JOIN usuarios U ON U.id = D.id_usuario 
                      WHERE U.id = :id 
                      ORDER BY D.dt_doacao DESC";

            $stmt = $this->conn->prepare($query);
            $stmt->bindParam(':id', $idUsuario, PDO::PARAM_INT);
        } else {
            // busca paginada
            $offset = ($pagina - 1) * $tamanhoPagina;
            $query = "SELECT DATE_FORMAT(D.dt_doacao, '%d/%m/%Y') as dt_doacao, 
                             O.razao_social, 
                             D.valor 
                      FROM doacoes D 
                      JOIN ongs O ON O.id = D.id_ong 
                      JOIN usuarios U ON U.id = D.id_usuario 
                      WHERE U.id = :id 
                      ORDER BY D.dt_doacao DESC 
                      LIMIT :tamanhoPagina OFFSET :offset";
            
            $stmt = $this->conn->prepare($query);
            $stmt->bindParam(':id', $idUsuario, PDO::PARAM_INT);
            $stmt->bindParam(':tamanhoPagina', $tamanhoPagina, PDO::PARAM_INT);
            $stmt->bindParam(':offset', $offset, PDO::PARAM_INT);
        }
        
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
