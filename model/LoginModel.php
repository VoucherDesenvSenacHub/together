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

        $usuario = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($usuario && password_verify($senha, $usuario['senha'])) {
            unset($usuario['senha']);
            return (object) $usuario;
        }

        return false;
    }

    public function VerificarEmailExistente($email)
    {
        $email = trim($email);
        $sql = "SELECT 1 FROM {$this->tabela} WHERE LOWER(email) = LOWER(?) LIMIT 1";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([$email]);
        return $stmt->fetchColumn() !== false;
    }

    // Gera token de redefinição e salva na própria tabela usuarios
    public function gerarTokenRedefinicao($email)
    {
        $tokenGerado = bin2hex(random_bytes(32));
        error_log('Token gerado para ' . $email . ': ' . $tokenGerado);

        date_default_timezone_set('America/Sao_Paulo');
        $expira = date('Y-m-d H:i:s', strtotime('+1 hour')); // expira em 1h

        $sql = "UPDATE {$this->tabela} SET token_redefinicao = ?, token_expira = ? WHERE email = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([$tokenGerado, $expira, $email]);

        error_log('Resultado da atualização do token para ' . $email . ': ' . $stmt->rowCount() . ' linhas afetadas.');

        return $tokenGerado;
    }

    // Valida token e retorna o email se válido
    public function validarToken(string $token): ?string
    {
        $stmt = $this->conn->prepare("SELECT email FROM usuarios WHERE token_redefinicao = :token AND token_expira > NOW() LIMIT 1");
        $stmt->execute(['token' => $token]);
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        return $result['email'] ?? null;
    }

    // Redefine a senha e remove token
    public function redefinirSenha(string $email, string $novaSenhaHash): bool
    {
        $stmt = $this->conn->prepare("
            UPDATE usuarios 
            SET senha = :senha, token_redefinicao = NULL, token_expira = NULL
            WHERE email = :email
        ");
        return $stmt->execute([
            'senha' => $novaSenhaHash,
            'email' => $email
        ]);
    }

    public function buscarSenhaAtual(string $email): ?string
    {
        $stmt = $this->conn->prepare("SELECT senha FROM usuarios WHERE email = :email LIMIT 1");
        $stmt->execute(['email' => $email]);
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        return $result['senha'] ?? null;
    }
    private function limparTokenExpirado(string $email): void
    {
        $sql = "UPDATE {$this->tabela}
            SET token_redefinicao = NULL, token_expira = NULL
            WHERE email = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([$email]);
        error_log("[limparTokenExpirado] limpo token para {$email}, linhas afetadas: " . $stmt->rowCount());
    }
}


