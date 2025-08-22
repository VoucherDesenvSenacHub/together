<?php

require_once __DIR__ . '/../config/database.php';

class UsuarioModel
{
    private $conn;
    protected $tabela = "usuarios";

    public function __construct()
    {
        $database = new Database();
        $this->conn = $database->conectar();
    }

    public function DataNomeUsuario()
    {
        try {
            $query = "SELECT dt_nascimento, nome FROM $this->tabela WHERE tipo_perfil = 'Usuario'";
            $stmt = $this->conn->prepare($query);
            $stmt->execute();

            return $stmt->fetchAll(PDO::FETCH_ASSOC);

        } catch (Exception $e) {

            echo "Erro na consulta DataNomeUsuario: " . $e->getMessage();
            return [];
        }
    }
}

?>