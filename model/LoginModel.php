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
        $sql = "SELECT id,tipo_perfil, email, senha FROM {$this->tabela} WHERE email = :email LIMIT 1";
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

    // Verifica se o email existe no banco
    public function VerificarEmailExistente($email)
    {
        $sql = "SELECT 1 FROM usuarios where email = ? LIMIT 1";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([$email]);
        return $stmt->fetchColumn() !== false;
    }

    // Salvar token de redefinição de senha
    public function salvarToken($email)
    {
        // Gera um token aleatório seguro
        $token = bin2hex(random_bytes(32)); // 64 caracteres hexadecimais

        // Define validade, ex: 1 hora a partir de agora
        $validade = date('Y-m-d H:i:s', strtotime('+1 hour'));

        // Insere ou atualiza o token para este email
        $sql = "INSERT INTO senha_tokens (email, token, validade) 
            VALUES (?, ?, ?)
            ON DUPLICATE KEY UPDATE token = VALUES(token), validade = VALUES(validade)";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([$email, $token, $validade]);

        return $token; // retorna para enviar no e-mail
    }
}
