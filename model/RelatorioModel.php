<?php

require_once __DIR__ . '/../config/database.php';

class RelatorioModel
{
    private $conn;

    public function __construct()
    {
        $database = new Database();
        $this->conn = $database->conectar();
    }

    public function buscarDoacao($idDoacao) 
    {
        // retornar junto a ong 
        $sql = "SELECT D.codigo_transacao, D.dt_doacao, U.nome, D.ultimos_digitos, D.valor 
                FROM doacoes D 
                JOIN usuarios U ON D.id_usuario = U.id
                JOIN ongs O ON D.id_ong = O.id
                WHERE D.id = :idDoacao 
                LIMIT 1";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':idDoacao', $idDoacao);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
}