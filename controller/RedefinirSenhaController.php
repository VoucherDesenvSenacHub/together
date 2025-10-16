<?php
session_start();
require_once __DIR__ . "/../model/LoginModel.php";

try {
    $erros = [];

    if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
        $erros[] = "Método inválido para esta requisição.";
    }

    // Verifica sessão
    if (!isset($_SESSION['email_redefinicao'])) {
        throw new Exception("Sessão expirada ou inválida. Solicite a redefinição novamente.");
    }

    $email = $_SESSION['email_redefinicao'];
    $senha = trim($_POST['senha'] ?? '');
    $confirmar = trim($_POST['confirmarSenha'] ?? '');

    $loginModel = new LoginModel();
    $senhaAtualCriptografada = $loginModel->buscarSenhaAtual($email);

    if (!$senhaAtualCriptografada) {
        throw new Exception("Usuário não encontrado.");
    }

    // --- Validações de senha ---
    if (empty($senha) || empty($confirmar)) {
        $erros[] = "Preencha todos os campos.";
    }
    if (strlen($senha) < 8) {
        $erros[] = "A nova senha deve ter no mínimo 8 caracteres.";
    }
    if ($senha !== $confirmar) {
        $erros[] = "As senhas digitadas não coincidem.";
    }
    if (password_verify($senha, $senhaAtualCriptografada)) {
        $erros[] = "A nova senha não pode ser igual à atual.";
    }

    if (!empty($erros)) {
        throw new Exception(implode("<br>", $erros));
    }

    // Redefine a senha
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
    $_SESSION['message'] = $e->getMessage();
    header("Location: ../view/pages/redefinirSenha.php");
    exit;
}
