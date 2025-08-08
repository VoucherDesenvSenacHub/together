<?php

// realiza a  conexão com o banco
require_once __DIR__ . "/../config/database.php";

class LoginModel
{
    protected $conn;

    protected $tabela = "usuarios";

    public function __construct()
    {
        $db = new Database();
        $this->conn = $db->conectar();
    }

    public function LoginModelUsuario($email, $senha)
    {
        $sql = "SELECT * FROM $this->tabela WHERE email = :email LIMIT 1";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(":email", $email);
        $stmt->execute();

        if ($stmt->rowCount() > 0) {
            $usuario = $stmt->fetch(PDO::FETCH_ASSOC);
            $hash = $usuario['senha'];

            if (password_verify($senha, $hash)) {
                return $usuario; // retorna todos os dados do usuário
            }
        }
        return false;
    }

}

?>