<?php

require_once __DIR__ . '../config/database.php';

class PdfUtil
{
    private $conn;

    public function __construct() {
        $database = new Database();
        $this->conn = $database->conectar();
    }


    public function procurarHistoricoDoacao($idUsuario)
    {
        $sql = "SELECT D.codigo_transacao, D.dt_doacao, U.nome, D.ultimos_digitos, D.valor 
                FROM doacoes D JOIN usuarios U ON D.id_usuario = U.id 
                WHERE id_usuario = :idUsuario";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':idUsuario', $idUsuario);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}