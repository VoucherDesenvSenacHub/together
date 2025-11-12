<?php
require_once __DIR__ . "/../config/database.php";

class DoacaoModel
{
    private $conn;

    public function __construct()
    {
        $database = new Database();
        $this->conn = $database->conectar();
    }

    // Buscar doações com paginação
    public function BuscarDoacoesPorID(int $idUsuario, ?int $pagina = null, int $tamanhoPagina = 15)
    {
        if ($pagina === null) {
            // busca total (sem paginação)
            $query = "SELECT O.id, D.dt_doacao, O.razao_social, D.valor 
                      FROM doacoes D 
                      JOIN ongs O ON O.id = D.id_ong 
                      JOIN usuarios U ON U.id = D.id_usuario 
                      WHERE U.id = :id 
                      ORDER BY D.dt_doacao DESC";

            $stmt = $this->conn->prepare($query);
            $stmt->bindParam(':id', $idUsuario, PDO::PARAM_INT);
        } else {
            // busca paginada
            $offset = ($pagina - 1) * $tamanhoPagina;
            $query = "SELECT DATE_FORMAT(D.dt_doacao, '%d/%m/%Y') as dt_doacao, 
                             O.razao_social, 
                             D.valor 
                      FROM doacoes D 
                      JOIN ongs O ON O.id = D.id_ong 
                      JOIN usuarios U ON U.id = D.id_usuario 
                      WHERE U.id = :id 
                      ORDER BY D.dt_doacao DESC 
                      LIMIT :tamanhoPagina OFFSET :offset";

            $stmt = $this->conn->prepare($query);
            $stmt->bindParam(':id', $idUsuario, PDO::PARAM_INT);
            $stmt->bindParam(':tamanhoPagina', $tamanhoPagina, PDO::PARAM_INT);
            $stmt->bindParam(':offset', $offset, PDO::PARAM_INT);
        }

        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function filtrarDoacao(int $userid, string $nome_ong = "", ?string $data_inicio = null, ?string $data_fim = null)
    {

        $sql = "SELECT D.id, D.dt_doacao, O.razao_social, D.valor, D.codigo_transacao 
            FROM doacoes D
            JOIN ongs O ON O.id = D.id_ong
            JOIN usuarios U ON U.id = D.id_usuario
            WHERE U.id = :userid";

        $params = [':userid' => $userid];

        if (!empty($nome_ong)) {
            $sql .= " AND O.razao_social LIKE :nome_ong";
            $params[':nome_ong'] = '%' . $nome_ong . '%';
        }

        if (!is_null($data_inicio) && !is_null($data_fim)) {
            $sql .= " AND D.dt_doacao BETWEEN :data_inicio AND :data_fim";
            $params[':data_inicio'] = $data_inicio;
            $params[':data_fim'] = $data_fim;
        }

        $sql .= " ORDER BY D.dt_doacao DESC";

        $stmt = $this->conn->prepare($sql);
        foreach ($params as $key => $value) {
            $stmt->bindValue($key, $value);
        }

        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }


    public function SalvarDoacao(
        int $idUser,
        int $idOng,
        float $valor,
        bool $anon,
        string $metodo,
        string $status,
        string $descricao,
        string $codigoTran,
        string $bandCartao,
        string $lastDig
    ) {
        try {
            $query = "INSERT INTO doacoes (id_usuario, id_ong, valor, anonimo, metodo_pagamento, status, descricao, codigo_transacao, bandeira_cartao, ultimos_digitos)
                        VALUES (:idUser, :idOng, :valor, :anon, :metodo, :status, :descricao, :codigoTran, :bandCartao, :lastDig)";
            $stmt = $this->conn->prepare($query);
            $stmt->bindParam(':idUser', $idUser, PDO::PARAM_INT);
            $stmt->bindParam(':idOng', $idOng, PDO::PARAM_INT);
            $stmt->bindParam(':valor', $valor);
            $stmt->bindParam(':anon', $anon, PDO::PARAM_BOOL);
            $stmt->bindParam(':metodo', $metodo, PDO::PARAM_STR);
            $stmt->bindParam(':status', $status, PDO::PARAM_STR);
            $stmt->bindParam(':descricao', $descricao, PDO::PARAM_STR);
            $stmt->bindParam(':codigoTran', $codigoTran, PDO::PARAM_STR);
            $stmt->bindParam(':bandCartao', $bandCartao, PDO::PARAM_STR);
            $stmt->bindParam(':lastDig', $lastDig, PDO::PARAM_STR);
            $stmt->execute();
            return true;
        } catch (PDOException $e) {
            error_log("Erro ao registrar doação: " . $e->getMessage());
            return false;
        }
    }

    public function somarDoacoesRecebidasPorId($id_ong)
    {
        $query = "SELECT SUM(valor) AS total_doacoes
            FROM doacoes 
            WHERE status = 'APROVADO' 
            AND id_ong = :id_ong";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam('id_ong', $id_ong);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC)['total_doacoes'];
    }

    public function contarDoacoesOngs($id_ong)
    {
        try {
            $query = "SELECT COUNT(*) AS total 
            FROM doacoes d 
            WHERE d.status = 'APROVADO' 
            AND d.id_ong = :id_ong 
            ORDER BY d.dt_doacao ASC";

            $stmt = $this->conn->prepare($query);
            $stmt->bindValue(':id_ong', $id_ong, PDO::PARAM_INT);
            $stmt->execute();

            $resultado = $stmt->fetch(PDO::FETCH_ASSOC);
            return (int)$resultado['total'];
        } catch (Exception $e) {
            return 0;
        }
    }

}
