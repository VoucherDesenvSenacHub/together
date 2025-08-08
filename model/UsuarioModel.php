<?php 

require_once '../config/database.php';

class UsuarioModel {
    private $conn;

    public function __construct() {
        $database = new Database();
        $this->conn = $database->conectar();
    }

    public function registrarUsuario($nome, $cpf, $telefone, $email, $senha ) {
        $sql = "INSERT INTO usuarios (nome, cpf, telefone, email, senhas) VALUES (
            :nome, :cpf, :telefone, :email, :senha)";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':nome', $nome);
        $stmt->bindParam(':cpf', $cpf);
        $stmt->bindParam(':telefone', $telefone);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':senha', var: password_hash($senha, PASSWORD_BCRYPT));
        
        return $stmt->execute();
    }

    public function findUsuarioByEmail($email) {
        $sql = "SELECT * FROM usuarios WHERE email = :email";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':email', $email);
        $stmt->execute();
        
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function findUsuarioByCpf($cpf) {
        $sql = "SELECT * FROM usuarios WHERE cpf = :cpf";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':cpf', $cpf);
        $stmt->execute();
        
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
}