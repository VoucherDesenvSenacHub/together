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

    public function registrarOng(
        $id_usuario,
        $razao_social,
        $cnpj,
        $dt_fundacao,
        $logradouro,
        $numero,
        $cep,
        $complemento,
        $bairro,
        $cidade,
        $estado,
        $id_categoria
    ) {
        // cadastra endereço
        $sqlEndereco = "INSERT INTO enderecos (
                        logradouro, numero, cep, complemento, bairro, cidade, estado
                    ) VALUES (
                        :logradouro, :numero, :cep, :complemento, :bairro, :cidade, :estado
                    )";
        $stmtEndereco = $this->conn->prepare($sqlEndereco);
        $stmtEndereco->execute([
            ':logradouro' => $logradouro,
            ':numero' => $numero,
            ':cep' => $cep,
            ':complemento' => $complemento,
            ':bairro' => $bairro,
            ':cidade' => $cidade,
            ':estado' => $estado
        ]);
        $id_endereco = $this->conn->lastInsertId();

        // data de criação é agora
        $dt_criacao = date('Y-m-d H:i:s');

        // cadastra ONG
        $sqlOng = "INSERT INTO ongs (
                    id_usuario, razao_social, cnpj, dt_fundacao, dt_criacao,
                    status_validacao, ativo, id_endereco, id_categoria, id_imagem_de_perfil
                ) VALUES (
                    :id_usuario, :razao_social, :cnpj, :dt_fundacao, :dt_criacao,
                    'pendente', 1, :id_endereco, :id_categoria, NULL
                )";

        $stmtOng = $this->conn->prepare($sqlOng);
        return $stmtOng->execute([
            ':id_usuario' => $id_usuario,
            ':razao_social' => $razao_social,
            ':cnpj' => $cnpj,
            ':dt_fundacao' => $dt_fundacao,
            ':dt_criacao' => $dt_criacao,
            ':id_endereco' => $id_endereco,
            ':id_categoria' => $id_categoria
        ]);
    }


    public function editarOng(
        $id,
        $razao_social,
        $cnpj,
        $dt_fundacao,
        $dt_criacao,
        $id_categoria,
        $id_imagem_de_perfil = null
    ) {
        $sql = "UPDATE ongs 
                SET razao_social = :razao_social, 
                    cnpj = :cnpj, 
                    dt_fundacao = :dt_fundacao, 
                    dt_criacao = :dt_criacao,
                    id_categoria = :id_categoria,
                    id_imagem_de_perfil = :id_imagem_de_perfil
                WHERE id = :id";

        $stmt = $this->conn->prepare($sql);
        return $stmt->execute([
            ':razao_social' => $razao_social,
            ':cnpj' => $cnpj,
            ':dt_fundacao' => $dt_fundacao,
            ':dt_criacao' => $dt_criacao,
            ':id_categoria' => $id_categoria,
            ':id_imagem_de_perfil' => $id_imagem_de_perfil,
            ':id' => $id
        ]);
    }

    public function buscarOngPorId($idOng)
    {
        $sql = "SELECT o.*, e.*, i.caminho as imagem
                FROM ongs o
                LEFT JOIN enderecos e ON o.id_endereco = e.id
                LEFT JOIN imagens i ON o.id_imagem_de_perfil = i.id
                WHERE o.id = :id";

        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':id', $idOng, PDO::PARAM_INT);
        $stmt->execute();

        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function cnpjExiste($cnpj, $idOng = null)
    {
        $sql = "SELECT COUNT(*) as total FROM ongs WHERE cnpj = :cnpj";
        if ($idOng) {
            $sql .= " AND id <> :id";
        }

        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':cnpj', $cnpj);
        if ($idOng) {
            $stmt->bindParam(':id', $idOng, PDO::PARAM_INT);
        }

        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        return $result['total'] > 0;
    }
}
