<?php

require_once __DIR__ . '../config/database.php';

class PdfUtil
{
    private $conn;

    public function __construct() {
        $database = new Database();
        $this->conn = $database->conectar();
    }


    public function procurarHistoricoDoacao($idDoacao)
    {
        $sql = "SELECT D.codigo_transacao, D.dt_doacao, U.nome, D.ultimos_digitos, D.valor 
                FROM doacoes D JOIN usuarios U ON D.id_usuario = U.id 
                WHERE D.id = :idDoacao LIMIT 1";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':idDoacao', $idDoacao);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}