<?php

require_once __DIR__ . '/../config/database.php';

class UsuarioModel
{
    private $conn;

    public function __construct()
    {
        $database = new Database();
        $this->conn = $database->conectar();
    }

    public function registrarUsuarioComEndereco(
        $nome,
        $cpf,
        $telefone,
        $email,
        $senha,
        $logradouro,
        $numero,
        $bairro,
        $cidade,
        $estado,
        $cep,
        $complemento
    ) {
        try {
            $this->conn->beginTransaction();
            $sqlEndereco = "INSERT INTO enderecos (logradouro, numero, bairro, cidade, estado, cep, complemento)
                        VALUES (:logradouro, :numero, :bairro, :cidade, :estado, :cep, :complemento)";
            $stmtEndereco = $this->conn->prepare($sqlEndereco);
            $stmtEndereco->bindParam(':logradouro', $logradouro);
            $stmtEndereco->bindParam(':numero', $numero);
            $stmtEndereco->bindParam(':cep', $cep);
            $stmtEndereco->bindParam(':complemento', $complemento);
            $stmtEndereco->bindParam(':bairro', $bairro);
            $stmtEndereco->bindParam(':cidade', $cidade);
            $stmtEndereco->bindParam(':estado', $estado);
            $stmtEndereco->execute();

            $enderecoId = $this->conn->lastInsertId();

            $sqlUsuario = "INSERT INTO usuarios (nome, cpf, telefone, email, senha, id_endereco, ativo, tipo_perfil)
                       VALUES (:nome, :cpf, :telefone, :email, :senha, :id_endereco, true, 'PESSOAL')";
            $stmtUsuario = $this->conn->prepare($sqlUsuario);
            $stmtUsuario->bindParam(':nome', $nome);
            $stmtUsuario->bindParam(':cpf', $cpf);
            $stmtUsuario->bindParam(':telefone', $telefone);
            $stmtUsuario->bindParam(':email', $email);
            $senhaHash = password_hash($senha, PASSWORD_BCRYPT);
            $stmtUsuario->bindParam(':senha', $senhaHash);
            $stmtUsuario->bindParam(':id_endereco', $enderecoId);

            $stmtUsuario->execute();

            $this->conn->commit();
            return true;
            
        } catch (PDOException $e) {
            $this->conn->rollBack();
            echo "Erro ao registrar usuário: " . $e->getMessage();
            return false;
        }

    }

    public function findUsuarioByEmail($email)
    {
        $sql = "SELECT * FROM usuarios WHERE email = :email";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':email', $email);
        $stmt->execute();

        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function findUsuarioByCpf($cpf)
    {
        $sql = "SELECT * FROM usuarios WHERE cpf = :cpf";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':cpf', $cpf);
        $stmt->execute();

        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
    // Encontrar usuário por CPF
}
