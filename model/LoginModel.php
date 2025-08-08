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
        $sql = "SELECT senha FROM $this->tabela WHERE email = :email";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(":email", $email);
        $stmt->bindParam(":senha", $senha);
        $stmt->execute();

        // if ($stmt->rowCount() > 0) {
        //     $usuario = $stmt->fetch(PDO::FETCH_ASSOC);
        //     $hash = $usuario['senha'];

        //     if (password_verify($senha, $hash)) {
        //         return true; // Senha confere
        //     }
        // }
        // return false;
    }

}

?>