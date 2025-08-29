<?php 
require_once __DIR__. "/../config/database.php";

class BuscarOngsEmAnaliseModel {
    private $conn;

    public function __construct() {
        $database = new Database();
        $this->conn = $database->conectar();
    }

    public function BuscarOngsEmAnalise($dataInicio = null, $dataFim = null, $pesquisa = null){
        $query = "SELECT 
                    id, 
                    dt_fundacao, 
                    razao_social, 
                    'Em análise...' AS status_validacao
                  FROM ongs
                  WHERE status_validacao IS NULL";

        $params = [];

        if ($dataInicio) {
            $query .= " AND dt_fundacao >= :dataInicio";
            $params[':dataInicio'] = $dataInicio;
        }

        if ($dataFim) {
            $query .= " AND dt_fundacao <= :dataFim";
            $params[':dataFim'] = $dataFim;
        }

        if ($pesquisa) {
            $query .= " AND razao_social LIKE :pesquisa";
            $params[':pesquisa'] = "%$pesquisa%";
        }

        $query .= " ORDER BY dt_fundacao DESC"; // opcional, ordenar por data

        $stmt = $this->conn->prepare($query);
        $stmt->execute($params);

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
