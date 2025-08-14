<?php
session_start();
require_once __DIR__ . "/../model/LoginModel.php";

try {
    // Verifica se a requisão é post
    if ($_SERVER["REQUEST_METHOD"] !== "POST") {
    // Método não permitido
        throw new Exception("Método inválido para esta requisição");
    }

    // Verifica bloqueio
    if (isset($_SESSION['LoginBloqueado']) && time() < $_SESSION['LoginBloqueado']) {
        $restante = $_SESSION['LoginBloqueado'] - time();
    // Muitas tentativas
        throw new Exception("Muitas tentativas de login. Tente novamente em {$restante} segundos.");
    }

    // Pega o email e a senha do usuario
    $email = trim($_POST['email'] ?? '');
    $senha = trim($_POST['senha'] ?? '');

    // Verifica se os campos estão vazios
    if (empty($email) || empty($senha)) {
        
        throw new Exception("Preencha todos os campos");
    }

    // valida se o usuario está enviando um email
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
       
        throw new Exception("Informe um email válido");
    }

    // executa a função de login
    $loginModel = new LoginModel();
    $usuarioLogin = $loginModel->login($email, $senha);

    // faz a verificação dos dados com o banco.
    if (!$usuarioLogin) {
        // Incrementa tentativas
        $_SESSION['LoginTentativas'] = ($_SESSION['LoginTentativas'] ?? 0) + 1;

        if ($_SESSION['LoginTentativas'] >= 5) {
            $_SESSION['LoginBloqueado'] = time() + 120; // 2 minutos de bloqueio
            $_SESSION['LoginTentativas'] = 0; // zera contador
           
            throw new Exception("Muitas tentativas inválidas. Aguarde 2 minutos para tentar novamente.");
        }


        
    }

    // Login bem-sucedido → reset tentativas
    $_SESSION['LoginTentativas'] = 0;
    unset($_SESSION['LoginBloqueado']);

    $_SESSION['id'] = $usuarioLogin['id'];
    $_SESSION['email'] = $usuarioLogin['email'];

    
   

} catch (Exception $e) {
    $_SESSION['erro_login'] = $e->getMessage();
    header('Location: ../view/pages/login.php');
    exit();
}
?>