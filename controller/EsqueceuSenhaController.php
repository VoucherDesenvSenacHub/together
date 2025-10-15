<?php
session_start();

require_once __DIR__ . "/../model/LoginModel.php";
require_once __DIR__ . "/../controller/EmailController.php";
require_once __DIR__ . "/../vendor/autoload.php";

use App\Controllers\EmailController;


try {
    $erros = [];

    // Verifica método da requisição
    if ($_SERVER['REQUEST_METHOD'] !== "POST") {
        $_SESSION['type'] = 'erro';
        $_SESSION['message'] = "Método inválido para está requisição";
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

    // Se houver erros, exibe
    if (!empty($erros)) {
        throw new Exception(implode("<br>", $erros));
    }

    $loginModel = new LoginModel();

    // Se o e-mail existir, envia o e-mail
    if ($loginModel->VerificarEmailExistente($email)) {
        $assunto = "Redefinição de Senha - Together";
        $mensagem = "
            <h2>Olá!</h2>
            <p>Recebemos uma solicitação para redefinir sua senha.</p>
            <p>Clique abaixo para criar uma nova senha:</p>
            <a href='http://localhost/together/view/pages/redefinirSenha.php' target='_blank'>Redefinir minha senha</a>
        ";

        $emailController = new EmailController();
        $emailController->enviar($email, $assunto, $mensagem);
    }

    // Mensagem genérica
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
