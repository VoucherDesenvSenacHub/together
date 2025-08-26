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
