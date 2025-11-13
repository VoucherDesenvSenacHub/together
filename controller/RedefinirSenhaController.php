<?php
session_start();
require_once __DIR__ . "/../model/LoginModel.php";
require_once __DIR__ . '/../services/ValidarSenhaService.php';


try {
    if ($_SERVER["REQUEST_METHOD"] !== "POST") {
        throw new Exception("Método inválido.");
    }

    if (!isset($_SESSION['email_redefinicao'])) {
        throw new Exception("Sessão de redefinição inválida ou expirada. Solicite novamente.");
    }

    $email = $_SESSION['email_redefinicao'];
    $senha = trim($_POST['senha'] ?? '');
    $confirmar = trim($_POST['confirmar_senha'] ?? '');

    $erros = [];

    $erroSenha = ValidarSenhaService::validarSenha($senha, $confirmar);

    $loginModel = new LoginModel();
    $senhaAtual = $loginModel->buscarSenhaAtual($email);

    if ($senhaAtual && password_verify($senha, $senhaAtual)) {
        $erros[] = "A nova senha não pode ser igual à atual.";
    }

    if ($erroSenha !== true) {
        $_SESSION['type'] = 'erro';
        $_SESSION['message'] = $erroSenha;
        $token = $_POST['token'] ?? '';
        header("Location: /together/view/pages/redefinirSenha.php?token=" . urlencode($token));
        exit;
    }

    if (!empty($erros)) {
        throw new Exception(implode("<br>", $erros));
    }

    $novaSenhaHash = password_hash($senha, PASSWORD_DEFAULT);
    $redefiniu = $loginModel->redefinirSenha($email, $novaSenhaHash);

    if (!$redefiniu) {
        throw new Exception("Erro ao redefinir a senha. Tente novamente.");
    }

    unset($_SESSION['email_redefinicao']);
    $_SESSION['type'] = 'sucesso';
    $_SESSION['message'] = "Senha redefinida com sucesso!";
    header("Location: ../view/pages/login.php");
    exit;
} catch (Exception $e) {
    $_SESSION['type'] = 'erro';
    $_SESSION['message'] = 'Erro ao validar senha';
    $token = $_POST['token'] ?? '';
    header("Location: /together/view/pages/redefinirSenha.php?token=" . urlencode($token));
    exit;
}
