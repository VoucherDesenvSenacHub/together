<?php
session_start();
require_once __DIR__ . "/../model/LoginModel.php";

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $emailForm = trim($_POST['emailForm'] ?? '');
    $senhaForm = trim($_POST['senhaForm'] ?? '');

    if (!empty($emailForm) && !empty($senhaForm)) {
        $loginModel = new LoginModel();
        $usuarioLogin = $loginModel->login($emailForm, $senhaForm);

        if ($usuarioLogin) {
            // Guarda informações do usuário na sessão
            $_SESSION['id'] = $usuarioLogin['id'];     // ID do usuário
            $_SESSION['email'] = $usuarioLogin['email'];

            header('Location: ../index.php');
            exit();
        } else {
            $_SESSION['erro_login'] = "Email ou senha incorretos";
            header('Location: ../view/pages/login.php');
            exit();
        }
    } else {
        $_SESSION['erro_login'] = "Preencha todos os campos";
        header('Location: ../view/pages/login.php');
        exit();
    }
}
