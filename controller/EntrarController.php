<?php
session_start();
require_once __DIR__ . "/../model/LoginModel.php";


try {
    
    if ($_SERVER["REQUEST_METHOD"] !== "POST") {
        throw new Exception("Método inválido para esta requisição");
    }

    
    if (isset($_SESSION['loginBloqueado']) && time() < $_SESSION['loginBloqueado']) {
        $restante = $_SESSION['loginBloqueado'] - time();
        
        throw new Exception("Muitas tentativas de login.");
    }

   
    $email = trim($_POST['email'] ?? '');
    $senha = trim($_POST['senha'] ?? '');

    
    if (empty($email) || empty($senha)) {

        throw new Exception("Preencha todos os campos");
    }

    
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {

        throw new Exception("Informe um email válido");
    }

    
    $loginModel = new LoginModel();
    $usuarioLogin = $loginModel->Login($email, $senha);

    if (!$usuarioLogin) {
        
        $_SESSION['loginTentativas'] = ($_SESSION['loginTentativas'] ?? 0) + 1;

        if ($_SESSION['loginTentativas'] >= 5) {
            $_SESSION['loginBloqueado'] = time() + 120; // 2 minutos
            $_SESSION['loginTentativas'] = 0;
            throw new Exception("Muitas tentativas de login.");
        }

        throw new Exception("Email ou senha incorretos.");
    } else {
        
        $_SESSION['id'] = $usuarioLogin->id;
        $_SESSION['perfil'] = $usuarioLogin->tipo_perfil;

        
        $_SESSION['loginTentativas'] = 0;
        unset($_SESSION['loginBloqueado']);

        header('Location: ../index.php');
        exit();
    }
} catch (Exception $e) {
    $_SESSION['erro'] = $e->getMessage();
    header('Location: ../view/pages/login.php');
    exit();
}
?>