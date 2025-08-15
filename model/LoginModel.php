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

    public function Login($email, $senha)
    {
        $sql = "SELECT id, email, senha FROM {$this->tabela} WHERE email = :email LIMIT 1";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindValue(':email', $email, PDO::PARAM_STR);
        $stmt->execute();

        // Busca o usuário
        $usuario = $stmt->fetch(PDO::FETCH_ASSOC);

        // Se encontrou e a senha confere
        if ($usuario && password_verify($senha, $usuario['senha'])) {
            // Remove a senha do retorno
            unset($usuario['senha']);
            // Converte para objeto e retorna
            return (object) $usuario;
        }

        return false; // Email não encontrado ou senha incorreta
    }

}
