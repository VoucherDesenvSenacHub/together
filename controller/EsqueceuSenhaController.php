<?php

use App\Services\EmailService;
session_start();
require_once __DIR__ . "/../model/LoginModel.php";
require_once __DIR__ . "/../services/EmailService.php";

try {
    $erros = [];

    // Verifica método da requisição
    if ($_SERVER['REQUEST_METHOD'] !== "POST") {
        $_SESSION['type'] = 'erro';
        $_SESSION['message'] = "Método inválido para esta requisição.";
        header('Location: ../view/pages/login.php');
        exit;
    }

    // Captura e valida o e-mail
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

    // Verifica se o e-mail existe no banco
    if ($loginModel->VerificarEmailExistente($email)) {

        $url = $_ENV["BASE_URL"];

        // Armazena o token no banco (com validade de 1h)
        $token = $loginModel->gerarTokenRedefinicao($email);

        // Monta o link com o token
        $link = "{$url}/together/view/pages/redefinirSenha.php?token={$token}";

        $emailService = new EmailService();
        $emailService->enviarEmailRedefinirSenha($email, $link);

    }

    // Mensagem genérica (por segurança)
    $_SESSION['type'] = 'sucesso';
    $_SESSION['message'] = "Se esse e-mail estiver cadastrado, enviamos um link para redefinir a senha.";
    header('Location: ../view/pages/login.php');
    exit;

} catch (Exception $e) {
    $_SESSION['type'] = 'erro';
    $_SESSION['message'] = $e->getMessage();
    header('Location: ../view/pages/esqueceuSenha.php');
    exit;
}