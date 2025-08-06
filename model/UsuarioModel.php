<?php 

require_once '../config/database.php';

class UsuarioModel {
    private $conn;

    public function __construct() {
        $database = new Database();
        $this->conn = $database->conectar();
    }


    // id int not null auto_increment,
    // nome varchar(60) not null,
    // cpf varchar(14) not null,
    // data_nascimento date,
    // foto_de_perfil text,
    // telefone varchar(16) not null,
    // email varchar(50) not null primary key,
    // senha varchar(8) not null,
    // ativo bool,
    // id_endereco int,
    // foreign key(id_endereco) references enderecos(id)

    public function registrarUsuario($nome, $cpf, $telefone, $email, $senha ) {
        $sql = "INSERT INTO usuarios (nome, cpf, telefone, email, senhas) VALUES (
            :nome, :cpf, :telefone, :email, :senha)";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':nome', $nome);
        $stmt->bindParam(':cpf', $cpf);
        $stmt->bindParam(':cpf', $telefone);
        $stmt->bindParam(':cpf', $email);
        $stmt->bindParam(':senha', password_hash($senha, PASSWORD_BCRYPT));
        
        return $stmt->execute();
    }

    public function findUsuarioByEmail($email) {
        $sql = "SELECT * FROM usuarios WHERE email = :email";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':email', $email);
        $stmt->execute();
        
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
}