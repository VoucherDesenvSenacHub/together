<?php 
require_once __DIR__. "/../config/database.php";

class BuscarOngsEmAnaliseModel {
    private $conn;

    public function __construct() {
        $database = new Database();
        $this->conn = $database->conectar();
    }

    public function contarOngsEmAnalise($dataInicio = null, $dataFim = null, $pesquisa = null) {
        $query = "SELECT COUNT(*) FROM ongs WHERE status_validacao = 'pendente'";
        $params = [];

        if ($dataInicio) {
            $query .= " AND dt_criacao >= :dataInicio";
            $params[':dataInicio'] = $dataInicio;
        }

        if ($dataFim) {
            $query .= " AND dt_criacao <= :dataFim";
            $params[':dataFim'] = $dataFim;
        }

        if ($pesquisa) {
            $query .= " AND razao_social LIKE :pesquisa";
            $params[':pesquisa'] = "%$pesquisa%";
        }

        $stmt = $this->conn->prepare($query);

        foreach ($params as $key => &$val) {
            $stmt->bindParam($key, $val);
        }

        $stmt->execute();
        return $stmt->fetchColumn();
    }

    public function BuscarOngsEmAnalise($dataInicio = null, $dataFim = null, $pesquisa = null, $pagina = 1, $itensPorPagina = 6) {
        $offset = ($pagina - 1) * $itensPorPagina;

        $query = "SELECT 
                    id, 
                    dt_criacao, 
                    razao_social, 
                    'Em análise...' AS status_validacao
                  FROM ongs
                  WHERE status_validacao = 'pendente'";

        $params = [];

        if ($dataInicio) {
            $query .= " AND dt_criacao >= :dataInicio";
            $params[':dataInicio'] = $dataInicio;
        }

        if ($dataFim) {
            $query .= " AND dt_criacao <= :dataFim";
            $params[':dataFim'] = $dataFim;
        }

        if ($pesquisa) {
            $query .= " AND razao_social LIKE :pesquisa";
            $params[':pesquisa'] = "%$pesquisa%";
        }

        $query .= " LIMIT :limit OFFSET :offset";

        $stmt = $this->conn->prepare($query);

        foreach ($params as $key => &$val) {
            $stmt->bindParam($key, $val);
        }
        $stmt->bindValue(':limit', $itensPorPagina, PDO::PARAM_INT);
        $stmt->bindValue(':offset', $offset, PDO::PARAM_INT);

        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
