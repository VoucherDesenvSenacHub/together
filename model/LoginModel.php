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
        $token = bin2hex(random_bytes(32)); // token seguro

        // Atualiza o token e a expiração diretamente no SQL usando DATE_ADD
        $sql = "UPDATE {$this->tabela}
            SET token_redefinicao = ?, token_expira = DATE_ADD(NOW(), INTERVAL 1 HOUR)
            WHERE email = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([$token, $email]);

        return $token;
    }


    // Valida token de redefinição
    public function validarToken($token)
    {
        $sql = "SELECT email FROM {$this->tabela}
                WHERE token_redefinicao = ? AND token_expira > NOW()
                LIMIT 1";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([$token]);
        return $stmt->fetchColumn() ?: false;
    }

    // Redefine a senha e remove token
    public function redefinirSenha($email, $novaSenhaHash)
    {
        try {
            $this->conn->beginTransaction();

            $sql = "UPDATE {$this->tabela}
                    SET senha = ?, token_redefinicao = NULL, token_expira = NULL
                    WHERE email = ?";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute([$novaSenhaHash, $email]);

            $this->conn->commit();
            return true;
        } catch (Exception $e) {
            $this->conn->rollBack();
            return false;
        }
    }

    public function buscarSenhaAtual($email)
    {
        $sql = "SELECT senha FROM {$this->tabela} WHERE email = ? LIMIT 1";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([$email]);
        return $stmt->fetchColumn() ?: null;
    }
}
