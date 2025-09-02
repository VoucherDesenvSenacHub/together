<?php
require_once __DIR__ . '/../config/database.php';

class VisualizarUsuarioModel
{
    private $conn;
    protected $tabela = "usuarios";

    public function __construct()
    {
        $database = new Database();
        $this->conn = $database->conectar();
    }

    // lista todos os usuários
    public function DataNomeUsuario(): array
    {
        try {
            $query = "SELECT dt_criacao, nome 
                      FROM {$this->tabela} 
                      WHERE tipo_perfil = 'Usuario'";
            $stmt = $this->conn->prepare($query);

            if (!$stmt->execute()) {
                throw new Exception("Falha ao executar consulta.");
            }

            return $stmt->fetchAll(PDO::FETCH_ASSOC);

        } catch (PDOException $e) {
            $_SESSION['erro'] = "Erro no banco: " . $e->getMessage();
            return [];

        } catch (Exception $e) {
            $_SESSION['erro'] = $e->getMessage();
            return [];
        }
    }

    // contar total de usuários (para paginação)
    public function contarUsuarios(): int
    {
        $query = "SELECT COUNT(*) as total FROM {$this->tabela} WHERE tipo_perfil = 'Usuario'";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        return $row['total'] ?? 0;
    }

    // listar usuários com limite e offset (para paginação)
    public function listarUsuariosPaginado(int $limite, int $offset): array
    {
        $query = "SELECT dt_criacao, nome 
                  FROM {$this->tabela} 
                  WHERE tipo_perfil = 'Usuario' 
                  ORDER BY dt_criacao DESC 
                  LIMIT :limite OFFSET :offset";
        $stmt = $this->conn->prepare($query);
        $stmt->bindValue(':limite', $limite, PDO::PARAM_INT);
        $stmt->bindValue(':offset', $offset, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
