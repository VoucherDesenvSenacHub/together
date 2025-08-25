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
            $query = "SELECT dt_nascimento, nome FROM {$this->tabela} WHERE tipo_perfil = 'Adminstrador'";
            $stmt = $this->conn->prepare($query);

            if (!$stmt->execute()) {
                // Se não executar, lança exceção
                throw new Exception("Falha ao executar consulta.");
            }

            return $stmt->fetchAll(PDO::FETCH_ASSOC);

        } catch (PDOException $e) {
            $_SESSION['erro'] = "Erro no banco" . $e->getMessage();
            return [];

        } catch (Exception $e) {
            $_SESSION['erro'] = $e->getMessage();
            return [];
        }
    }

}
