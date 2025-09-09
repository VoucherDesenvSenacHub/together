<?php

require_once __DIR__ . '/../config/database.php';

class AdmModel
{
    private $conn;

    public function __construct()
    {
        $database = new Database();
        $this->conn = $database->conectar();
    }


    public function findPatrocinadoresBySearch($nome_patrocinador)
    {
        $sql = "SELECT nome FROM patrocinadores WHERE nome LIKE :nome_patrocinador";
        $stmt = $this->conn->prepare($sql);
        $nome_patrocinador = '%' . $nome_patrocinador . '%';
        $stmt->bindParam(':nome_patrocinador', $nome_patrocinador);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function findUsuarioBySearch($nome_usuario)
    {
        $sql = "SELECT dt_criacao nome WHERE nome LIKE :nome_usuario";
        $stmt = $this->conn->prepare($sql);
        $nome_usuario = '%' . $nome_usuario . '%';
        $stmt->bindParam(':nome_usuario', $nome_usuario);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function findOngBySearch($nome_ong)
    {
        $sql = "SELECT razao_social, dt_fundacao, status_validacao FROM ongs WHERE razao_social LIKE :nome_ong";
        $stmt = $this->conn->prepare($sql);
        $nome_ong = '%' . $nome_ong . '%';
        $stmt->bindParam(':nome_ong', $nome_ong);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // funcao para a pagina de visualizacao do adm
    public function ListarUsuariosCadastrados($perfil): array
    {
        try {
            $query = "SELECT id, dt_criacao, nome FROM usuarios WHERE tipo_perfil = '$perfil'";
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

    // contar total de usuarios (para paginação)
    public function contarUsuarios($perfil): int
    {
        $query = "SELECT COUNT(*) as total FROM usuarios WHERE tipo_perfil = '$perfil'";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        return $row['total'] ?? 0;
    }

    // listar Ongs com limite e offset (para paginação)
    public function listarUsuariosPaginado(int $limite, int $offset, $perfil): array
    {
        $query = "SELECT id, dt_criacao, nome 
                  FROM usuarios 
                  WHERE tipo_perfil = '$perfil' 
                  ORDER BY dt_criacao DESC 
                  LIMIT :limite OFFSET :offset";
        $stmt = $this->conn->prepare($query);
        $stmt->bindValue(':limite', $limite, PDO::PARAM_INT);
        $stmt->bindValue(':offset', $offset, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function buscarOngPorId($id)
    {
        $query = "SELECT 
                    o.id, 
                    o.razao_social AS nome, 
                    o.telefone, 
                    o.cnpj, 
                    o.dt_criacao AS data_fundacao,
                    u.email,
                    e.cep, 
                    e.logradouro, 
                    e.complemento, 
                    e.bairro, 
                    e.numero, 
                    e.cidade
                FROM 
                    ongs o
                INNER JOIN 
                    enderecos e ON o.id_endereco = e.id
                INNER JOIN 
                    usuarios u ON o.id_usuario = u.id
                LEFT JOIN 
                    imagens i ON o.id_imagem_de_perfil = i.id
                WHERE 
                    o.id = :id";

        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }




}

// ===== Configuração da paginação da listagem =====
$porPagina = 15;
$pagina = isset($_GET['pagina']) ? (int) $_GET['pagina'] : 1;
$pagina = max(1, $pagina); // nunca menor que 1
$offset = ($pagina - 1) * $porPagina;


