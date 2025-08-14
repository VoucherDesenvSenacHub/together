<?php
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

    public function login($email, $senha): bool
    {
        // Busca só pelo email
        $sql = "SELECT id, email, senha FROM usuarios WHERE email = :email LIMIT 1";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindValue(':email', $email, PDO::PARAM_STR);
        $stmt->execute();


        if ($stmt->rowCount() > 0) {
            $usuario = $stmt->fetch(PDO::FETCH_ASSOC);

            // Verifica o hash
            if (password_verify($senha, $usuario['senha'])) {
             
                return true;
            } else {
                return false; // Senha incorreta
            }
        } else {
            return false; // Email não encontrado
        }
    }
}
