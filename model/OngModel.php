<?php

require_once __DIR__ . '/../config/database.php';

class OngModel
{
    private $conn;
    public function __construct()
    {
        $database = new Database();
        $this->conn = $database->conectar();
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

    public function findVoluntarioBySearch($nome_usuario)
    {
        $sql = "SELECT V.dt_associacao, U.nome
                      FROM voluntarios V 
                      JOIN usuarios U ON U.id = V.id_usuario 
                      WHERE U.nome
                      LIKE :nome_usuario
                      ORDER BY V.dt_associacao DESC";

        $stmt = $this->conn->prepare($sql);
        $nome_usuario = '%' . $nome_usuario . '%';
        $stmt->bindParam(':nome_usuario', $nome_usuario);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);

    }

    public function findDonorSearch($nome_doador)
    {
        $sql = "SELECT D.dt_doacao, U.nome, D.valor
                      FROM doacoes D 
                      JOIN usuarios U ON U.id = D.id_usuario 
                      WHERE U.nome
                      LIKE :nome_doador
                      ORDER BY D.dt_doacao DESC";

        $stmt = $this->conn->prepare($sql);
        $nome_doador = '%' . $nome_doador . '%';
        $stmt->bindParam(':nome_doador', $nome_doador);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function registrarDadosOng($id_usuario, $razao_social, $cnpj, $telefone, $id_categoria)
    {
        try {
            // Inicia a transação
            $this->conn->beginTransaction();

            // Insere endereço vazio
            $queryEndereco = "INSERT INTO enderecos (logradouro, numero, cep, complemento, bairro, cidade, estado) VALUES ('', 0, '', '', '', '', '')";
            $stmt = $this->conn->prepare($queryEndereco);
            $stmt->execute();
            $id_endereco = $this->conn->lastInsertId();

            // Insere a ONG vinculada ao endereço
            $queryOng = "INSERT INTO ongs (id_usuario, razao_social, cnpj, telefone, id_endereco, id_categoria) VALUES (:id_usuario, :razao_social, :cnpj, :telefone, :id_endereco, :id_categoria)";
            $stmt = $this->conn->prepare($queryOng);
            $stmt->bindParam(':id_usuario', $id_usuario);
            $stmt->bindParam(':razao_social', $razao_social);
            $stmt->bindParam(':cnpj', $cnpj);
            $stmt->bindParam(':telefone', $telefone);
            $stmt->bindParam(':id_endereco', $id_endereco);
            $stmt->bindParam(':id_categoria', $id_categoria);
            $stmt->execute();

            // Confirma transação
            $this->conn->commit();
            return [
                'response' => true,
                'id_endereco' => $id_endereco
            ];
        } catch (Exception $e) {
            // Em caso de erro, desfaz tudo
            $this->conn->rollBack();
            return [
                'response' => false,
                'erro' => $e->getMessage()
            ];
        }
    }

    public function editarEnderecoOng($id_endereco, $logradouro, $numero, $cep, $complemento, $bairro, $cidade, $estado)
    {
        try {
            $query = "UPDATE enderecos SET logradouro=:logradouro, numero=:numero, cep=:cep, complemento=:complemento, bairro=:bairro,  cidade=:cidade, estado=:estado WHERE id = :id";

            $stmt = $this->conn->prepare($query);
            $stmt->bindParam(':id', $id_endereco);
            $stmt->bindParam(':logradouro', $logradouro);
            $stmt->bindParam(':numero', $numero);
            $stmt->bindParam(':cep', $cep);
            $stmt->bindParam(':complemento', $complemento);
            $stmt->bindParam(':bairro', $bairro);
            $stmt->bindParam(':cidade', $cidade);
            $stmt->bindParam(':estado', $estado);
            $stmt->execute();
            return [
                'response' => true
            ];
        } catch (Exception $e) {
            return [
                'response' => false,
                'erro' => $e->getMessage()
            ];
        }
    }

    public function verificaExisteDadosOng($cnpj, $razao_social, $telefone)
    {
        $stmt = $this->conn->prepare("SELECT COUNT(*) as total FROM ongs WHERE cnpj = :cnpj or razao_social = :razao_social or telefone = :telefone");

        $stmt->execute([
            ':cnpj' => $cnpj,
            ':razao_social' => $razao_social,
            ':telefone' => $telefone,
        ]);

        $res = $stmt->fetch(PDO::FETCH_ASSOC);
        return $res['total'] > 0;
    }

    public function verificarUsuarioTemOng($id)
    {
        $query = "SELECT o.razao_social
        FROM usuarios u
        INNER JOIN ongs o ON o.id_usuario = u.id
        WHERE u.id = :id";

        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC) ? true : false;
    }
}
