<?php
session_start();
require_once __DIR__ . "/../model/LoginModel.php";

try {
    $erros = [];
    if ($_SERVER['REQUEST_METHOD'] !== "POST") {
        $_SESSION['type'] = 'erro';
        $_SESSION['message'] = "Método inválido para esta requisição";
        header('Location: ../view/pages/login.php');
        exit;
    }

    if (!isset($_POST['email']) || empty(trim($_POST['email']))) {
        $erros[] = "O campo e-mail é obrigatório!";
    }

    $email = trim($_POST['email']);

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $erros[] = "Informe um e-mail válido!";
    }

    // verfica se existe erro e exibe ao usuario
    if (!empty($erros)) {
        throw new Exception(implode("<br>", $erros));
    }

    $loginModel = new LoginModel();

    // verifica se o e-mail existe no banco
    if (!$loginModel->VerificarEmailExistente($email)) {
        $_SESSION['type'] = 'sucesso';
        $_SESSION['message'] = "Se esse e-mail estiver cadastrado, enviamos um link para redefinir a senha.";
        header('Location: ../view/pages/login.php');
        exit;
    }

    $loginModel->salvarToken($email);

} catch (Exception $e) {
    $_SESSION['type'] = 'erro';
    $_SESSION['message'] = $e->getMessage();
    header('Location: ../view/pages/esqueceuSenha.php');
    exit();

}


?>