<?php
require_once __DIR__ . '/../config/database.php';

class OngModel
{
    private $conn;

    public function __construct()
    {
        $this->conn = (new Database())->conectar();
    }

    // olhar se precisa adicionar email
    public function registrarOng($id_usuario, $razao_social, $cnpj, $telefone, $id_categoria, $logradouro, $numero, $cep, $complemento, $bairro, $cidade, $estado)
    {
        try {
            $this->conn->beginTransaction();

            $sqlEndereco = "INSERT INTO enderecos (logradouro, numero, cep, complemento, bairro, cidade, estado) VALUES (:logradouro, :numero, :cep, :complemento, :bairro, :cidade, :estado)";
            $stmt = $this->conn->prepare($sqlEndereco);
            $stmt->execute([
                ':logradouro' => $logradouro,
                ':numero' => $numero,
                ':cep' => $cep,
                ':complemento' => $complemento,
                ':bairro' => $bairro,
                ':cidade' => $cidade,
                ':estado' => $estado
            ]);
            $id_endereco = $this->conn->lastInsertId();

            $sqlOng = "INSERT INTO ongs (id_usuario, razao_social, cnpj, telefone, id_endereco, id_categoria, id_imagem_de_perfil) VALUES (:id_usuario, :razao_social, :cnpj,:telefone, :id_endereco, :id_categoria)";
            $stmt = $this->conn->prepare($sqlOng);
            $stmt->execute([
                ':id_usuario' => $id_usuario,
                ':razao_social' => $razao_social,
                ':cnpj' => $cnpj,
                ':telefone' => $telefone,
                ':id_endereco' => $id_endereco,
                ':id_categoria' => $id_categoria
            ]);

            $this->conn->commit();
            return true;
        } catch (Exception $e) {
            $this->conn->rollBack();
            throw $e;
        }
    }

    public function verificaExisteDadosOng($cnpj, $razao_social, $telefone, $email)
    {
        // Validando se existe o email na tb ongs, mas nao sei se vai existir email na tabela ongs, perguntar para o rhyan 

        // $stmt = $this->conn->prepare("SELECT COUNT(*) as total FROM ongs WHERE cnpj = :cnpj or razao_social = :razao_social or telefone = :telefone or email = :email ");

        $stmt = $this->conn->prepare("SELECT COUNT(*) as total FROM ongs WHERE cnpj = :cnpj or razao_social = :razao_social or telefone = :telefone");

        $stmt->execute([
            ':cnpj' => $cnpj,
            ':razao_social' => $razao_social,
            ':telefone' => $telefone,
            // ':email' => $email
        ]);

        $res = $stmt->fetch(PDO::FETCH_ASSOC);
        return $res['total'] > 0;
    }

    public function verificaExisteCepOng($cep)
    {
        $stmt = $this->conn->prepare("SELECT COUNT(*) as total FROM enderecos WHERE cep = :cep");
        $stmt->execute([
            ':cep' => $cep,
        ]);

        $res = $stmt->fetch(PDO::FETCH_ASSOC);
        return $res['total'] > 0;
    }
}
