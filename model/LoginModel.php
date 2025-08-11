<?php
// model/LoginModel.php
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

    public function login($email, $senha)
    {
        $sql = "SELECT id, email, senha FROM usuarios WHERE email = :email AND senha = :senha LIMIT 1";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindValue(':email', $email, PDO::PARAM_STR);
        $stmt->bindValue(':senha', $senha, PDO::PARAM_STR);
        $stmt->execute();

        if ($stmt->rowCount() > 0) {
            $usuario = $stmt->fetch(PDO::FETCH_ASSOC);

            // Inicia a sessão
            if (session_status() === PHP_SESSION_NONE) {
                session_start();
            }
            $_SESSION['usuario_id'] = $usuario['id'];
            $_SESSION['usuario_email'] = $usuario['email'];

            return true; // Login bem-sucedido
        } else {
            return false; // Email ou senha incorretos
        }
    }
}




