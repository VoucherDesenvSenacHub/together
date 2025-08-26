<?php
require_once __DIR__ . '/../config/database.php';

class OngModel
{
    private $conn;

    public function __construct()
    {
        $this->conn = (new Database())->conectar();
    }

    public function registrarOng($id_usuario, $razao_social, $cnpj, $logradouro, $numero, $cep, $complemento, $bairro, $cidade, $estado, $id_categoria)
    {
        try {
            $this->conn->beginTransaction();

            $sqlEndereco = "INSERT INTO enderecos (logradouro, numero, cep, complemento, bairro, cidade, estado)
                            VALUES (:logradouro, :numero, :cep, :complemento, :bairro, :cidade, :estado)";
            $stmt = $this->conn->prepare($sqlEndereco);
            $stmt->execute([
                ':logradouro'=>$logradouro, ':numero'=>$numero, ':cep'=>$cep, ':complemento'=>$complemento,
                ':bairro'=>$bairro, ':cidade'=>$cidade, ':estado'=>$estado
            ]);
            $id_endereco = $this->conn->lastInsertId();

            $sqlOng = "INSERT INTO ongs (id_usuario, razao_social, cnpj, dt_criacao, status_validacao, ativo, id_endereco, id_categoria)
                        VALUES (:id_usuario, :razao_social, :cnpj, NOW(), 'pendente', 1, :id_endereco, :id_categoria)";
            $stmt = $this->conn->prepare($sqlOng);
            $stmt->execute([
                ':id_usuario'=>$id_usuario, ':razao_social'=>$razao_social, ':cnpj'=>$cnpj,
                ':id_endereco'=>$id_endereco, ':id_categoria'=>$id_categoria
            ]);

            $this->conn->commit();
            return true;
        } catch (Exception $e) {
            $this->conn->rollBack();
            throw $e;
        }
    }

    public function existeCnpj($cnpj)
    {
        $stmt = $this->conn->prepare("SELECT COUNT(*) as total FROM ongs WHERE cnpj = :cnpj");
        $stmt->execute([':cnpj'=>$cnpj]);
        $res = $stmt->fetch(PDO::FETCH_ASSOC);
        return $res['total'] > 0;
    }
}
