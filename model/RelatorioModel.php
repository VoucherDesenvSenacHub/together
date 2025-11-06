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
        try
        {
            $sql = "SELECT D.codigo_transacao, D.dt_doacao, U.nome, D.ultimos_digitos, D.valor, O.razao_social, O.cnpj, O.telefone
                FROM doacoes D 
                JOIN usuarios U ON D.id_usuario = U.id
                JOIN ongs O ON D.id_ong = O.id
                WHERE D.id = :idDoacao 
                LIMIT 1
            ";

            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(':idDoacao', $idDoacao);
            $stmt->execute();
            return $stmt->fetch(PDO::FETCH_ASSOC);
        }
        catch(Exception $e)
        {
            error_log('Erro ao fazer a busca: '. $e->getMessage());
        }
    }

    public function buscarDoacoesOng($idOng, ){
         try
        {
            $sql = "SELECT D.dt_doacao, U.nome, D.valor, O.razao_social
                FROM doacoes D
                JOIN ongs O
                ON O.id = :idOng
                JOIN usuarios U
                ON D.id_usuario = U.id
                ORDER BY D.dt_doacao DESC
            ";

            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(':idOng', $idOng);
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        }
        catch(Exception $e)
        {
            error_log('Erro ao fazer a busca: '. $e->getMessage());
        }
    }
}