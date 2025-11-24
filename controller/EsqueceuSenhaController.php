<?php

use App\Services\EmailService;
session_start();
require_once __DIR__ . "/../model/LoginModel.php";
require_once __DIR__ . "/../services/EmailService.php";

try {
    $erros = [];

    
    if ($_SERVER['REQUEST_METHOD'] !== "POST") {
        $_SESSION['type'] = 'erro';
        $_SESSION['message'] = "Método inválido para esta requisição.";
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

    
    if ($loginModel->VerificarEmailExistente($email)) {

        $url = $_ENV["BASE_URL"];

       
        $token = $loginModel->gerarTokenRedefinicao($email);

       
        $link = "{$url}/together/view/pages/redefinirSenha.php?token={$token}";

        $emailService = new EmailService();
        $emailService->enviarEmailRedefinirSenha($email, $link);

    }

   
    $_SESSION['type'] = 'sucesso';
    $_SESSION['message'] = "Se esse e-mail estiver cadastrado, enviamos um link para redefinir a senha.";
    header('Location: ../view/pages/login.php');
    exit;

} catch (Exception $e) {
    $_SESSION['type'] = 'erro';
    $_SESSION['message'] = 'Erro ao validar senha';
    header('Location: ../view/pages/esqueceuSenha.php');
    exit;
}