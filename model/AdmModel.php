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

    public function filtrarOngs($nome_ong = '', $data_inicio = null, $data_fim = null)
    {
        $sql = "SELECT id, razao_social, dt_criacao, status_validacao, ativo
            FROM ongs
            WHERE status_validacao = 'aprovado'";

        $params = [];

        if (!empty($nome_ong)) {
            $sql .= " AND razao_social LIKE :nome_ong";
            $params[':nome_ong'] = '%' . $nome_ong . '%';
        }

        if (!empty($data_inicio) && !empty($data_fim)) {
            $sql .= " AND dt_criacao BETWEEN :data_inicio AND :data_fim";
            $params[':data_inicio'] = $data_inicio;
            $params[':data_fim'] = $data_fim;
        }

        $sql .= " ORDER BY dt_criacao DESC";

        $stmt = $this->conn->prepare($sql);

        foreach ($params as $param => $value) {
            $stmt->bindValue($param, $value);
        }

        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }


    public function filtrarUsuarios($nome_usuario = '', $data_inicio = null, $data_fim = null)
    {
        $sql = "SELECT id, nome, dt_criacao, ativo
                FROM usuarios
                WHERE ativo = 1"; // Assumindo que '1' significa ativo.

        $params = [];

        if (!empty($nome_usuario)) {
            $sql .= " AND nome LIKE :nome_usuario";
            $params[':nome_usuario'] = '%' . $nome_usuario . '%';
        }

        if (!empty($data_inicio) && !empty($data_fim)) {
            $sql .= " AND dt_criacao BETWEEN :data_inicio AND :data_fim";
            $params[':data_inicio'] = $data_inicio;
            $params[':data_fim'] = $data_fim;
        }

        $sql .= " ORDER BY dt_criacao DESC";

        $stmt = $this->conn->prepare($sql);

        foreach ($params as $param => $value) {
            $stmt->bindValue($param, $value);
        }

        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function filtroUsuariosCadastradosByDataCadastro($data_inicio = NULL, $data_fim = NULL)
    {
        if (!is_null($data_inicio) && !is_null($data_fim)) {
            $sql = "SELECT id, nome, dt_criacao, ativo
                    FROM usuarios
                    WHERE dt_criacao BETWEEN :data_inicio AND :data_fim
                    ORDER BY dt_criacao DESC";

            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(':data_inicio', $data_inicio);
            $stmt->bindParam(':data_fim', $data_fim);
        } else {
            $sql = "SELECT id, nome, dt_criacao, ativo
                    FROM usuarios
                    ORDER BY dt_criacao DESC";

            $stmt = $this->conn->prepare($sql);
        }

        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function listarUsuarios()
    {
        try {
            $sql = "SELECT id, nome, dt_criacao FROM usuarios ORDER BY id ASC";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute();

            return $stmt->fetchAll(PDO::FETCH_ASSOC);

        } catch (PDOException $e) {
            // Registra erro no log
            error_log("Erro ao listar usuários: " . $e->getMessage());
            return []; // retorna um array vazio para evitar quebra do sistema
        }
    }

}


// ===== Configuração da paginação da listagem =====
$porPagina = 15;
$pagina = isset($_GET['pagina']) ? (int) $_GET['pagina'] : 1;
$pagina = max(1, $pagina); // nunca menor que 1
$offset = ($pagina - 1) * $porPagina;
