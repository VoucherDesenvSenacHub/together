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

    public function registrarUsuario($nome, $cpf, $telefone, $email, $senha)
    {
        $sql = "INSERT INTO usuarios (nome, cpf, telefone, email, senhas) VALUES (
            :nome, :cpf, :telefone, :email, :senha)";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':nome', $nome);
        $stmt->bindParam(':cpf', $cpf);
        $stmt->bindParam(':cpf', $telefone);
        $stmt->bindParam(':cpf', $email);
        $stmt->bindParam(':senha', var: password_hash($senha, PASSWORD_BCRYPT));

        return $stmt->execute();
    }

    public function findUsuarioByEmail($email)
    {
        $sql = "SELECT * FROM usuarios WHERE email = :email";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':email', $email);
        $stmt->execute();

        return $stmt->fetch(PDO::FETCH_ASSOC);
    }


    public function editarUsuario($id, $nome, $telefone, $email, $cpf, $tipo_perfil, $id_imagem_de_perfil)
    {
        $sql = "UPDATE usuarios 
                SET nome = :nome, 
                    telefone = :telefone, 
                    email = :email, 
                    cpf = :cpf, 
                    tipo_perfil = :tipo_perfil,
                    id_imagem_de_perfil = :id_imagem_de_perfil
                WHERE id = :id";

        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':nome', $nome);
        $stmt->bindParam(':telefone', $telefone);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':cpf', $cpf);
        $stmt->bindParam(':tipo_perfil', $tipo_perfil);
        $stmt->bindParam(':id_imagem_de_perfil', $id_imagem_de_perfil, PDO::PARAM_INT);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);

        return $stmt->execute();
    }

    public function buscarUsuarioId($idUsuario)
    {
        $sql = "SELECT * 
                FROM usuarios u
                LEFT JOIN imagens i ON u.id_imagem_de_perfil = i.id
                WHERE u.id = :id";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':id', $idUsuario, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function buscarEnderecoIdPorUsuarioId($idUsuario)
    {
        $query = "SELECT id_endereco FROM usuarios WHERE id = :id LIMIT 1";

        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':id', $idUsuario);
        $stmt->execute();

        $result = $stmt->fetch();
        return $result ? $result['id_endereco'] : null;
    }
}
