<?php
session_start();

require_once __DIR__ . "/../model/LoginModel.php";
require_once __DIR__ . "/../controller/EmailController.php";

use App\Controllers\EmailController;

try {
    $erros = [];
    if ($_SERVER['REQUEST_METHOD'] !== "POST") {
        $_SESSION['type'] = 'erro';
        $_SESSION['message'] = "Método inválido para esta requisição";
        header('Location: ../view/pages/login.php');
        exit;
    }

    $email = trim($_POST['email'] ?? '');

    if (empty($email)) {
        $erros[] = "O campo e-mail é obrigatório!";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $erros[] = "Informe um e-mail válido!";
    }

    if (!empty($erros)) {
        throw new Exception(implode("<br>", $erros));
    }

    $loginModel = new LoginModel();


    // Gera e salva o token
    $token = $loginModel->salvarToken($email);

    // Monta o link e o corpo do e-mail
    $link = "http://localhost/together/view/pages/redefinirSenha.php?token={$token}";
    $assunto = "Redefinição de Senha - Together";
    $mensagem = "
    <h2>Olá!</h2>
    <p>Recebemos uma solicitação para redefinir sua senha.</p>
    <p>Clique abaixo para criar uma nova senha:</p>
    <a href='{$link}' target='_blank'>Redefinir minha senha</a>
    <p><small>Este link é válido por 1 hora.</small></p>
    ";

    // Envia o e-mail (chamando o EmailController → EmailService → EmailUtil)
    $emailController = new EmailController();
    $emailController->enviar($email, $assunto, $mensagem);

    $_SESSION['type'] = 'sucesso';
    $_SESSION['message'] = "Se esse e-mail estiver cadastrado, enviamos um link para redefinir a senha.";
    header('Location: ../view/pages/login.php');
    exit;
    
    // Se o e-mail não existir, apenas exibe a mensagem genérica
    if (!$loginModel->VerificarEmailExistente($email)) {
        $_SESSION['type'] = 'sucesso';
        $_SESSION['message'] = "Se esse e-mail estiver cadastrado, enviamos um link para redefinir a senha.";
        header('Location: ../view/pages/login.php');
        exit;
    }

} catch (Exception $e) {
    $_SESSION['type'] = 'erro';
    $_SESSION['message'] = $e->getMessage();
    header('Location: ../view/pages/esqueceuSenha.php');
    exit;
}
