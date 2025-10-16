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

        $token = bin2hex(random_bytes(32));

        // Armazena o token no banco (com validade de 1h)
        $loginModel->gerarTokenRedefinicao($email);

        // Monta o link com o token
        $link = "http://localhost/together/view/pages/redefinirSenha.php?token={$token}";

        // 4️⃣ Cria o conteúdo do e-mail
        $assunto = "Redefinição de Senha - Together";
        $mensagem = "
            <h2>Olá!</h2>
            <p>Recebemos uma solicitação para redefinir sua senha.</p>
            <p>Clique no link abaixo para criar uma nova senha. Esse link é válido por 1 hora.</p>
            <p><a href='{$link}' target='_blank'>Redefinir minha senha</a></p>
            <br>
            <p>Se você não solicitou a redefinição, ignore este e-mail.</p>
        ";

        // 5️⃣ Envia o e-mail
        $emailController = new EmailController();
        $emailController->enviar($email, $assunto, $mensagem);
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
