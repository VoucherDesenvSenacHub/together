<?php
require_once __DIR__ . '/../config/database.php';

class VisualizarOngModel
{
    private $conn;
    protected $tabela = "usuarios"; // assume que Ongs estão na tabela 'usuarios'

    public function __construct()
    {
        $database = new Database();
        $this->conn = $database->conectar();
    }

    // lista todas as Ongs
    public function ListarOngCadastradas(): array
    {
        try {
            $query = "SELECT dt_cadastro, nome FROM {$this->tabela} WHERE tipo_perfil = 'Ong'";
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

    // contar total de Ongs (para paginação)
    public function contarOngs(): int
    {
        $query = "SELECT COUNT(*) as total FROM {$this->tabela} WHERE tipo_perfil = 'Ong'";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        return $row['total'] ?? 0;
    }

    // listar Ongs com limite e offset (para paginação)
    public function listarOngsPaginado(int $limite, int $offset): array
    {
        $query = "SELECT dt_cadastro, nome 
                  FROM {$this->tabela} 
                  WHERE tipo_perfil = 'Ong' 
                  ORDER BY dt_cadastro DESC 
                  LIMIT :limite OFFSET :offset";
        $stmt = $this->conn->prepare($query);
        $stmt->bindValue(':limite', $limite, PDO::PARAM_INT);
        $stmt->bindValue(':offset', $offset, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
