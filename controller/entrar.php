<?php
session_start();
require_once __DIR__ . "/../model/LoginModel.php";

try {
    // Verifica se a requisão é post
    if ($_SERVER["REQUEST_METHOD"] !== "POST") {
        http_response_code(405); // Método não permitido
        throw new Exception("Método inválido para esta requisição");
    }

    // Verifica bloqueio
    if (isset($_SESSION['LoginBloqueado']) && time() < $_SESSION['LoginBloqueado']) {
        $restante = $_SESSION['LoginBloqueado'] - time();
        http_response_code(429); // Muitas tentativas
        throw new Exception("Muitas tentativas de login. Tente novamente em {$restante} segundos.");
    }

    // Pega o email e a senha do usuario
    $email = trim($_POST['email'] ?? '');
    $senha = trim($_POST['senha'] ?? '');

    // Verifica se os campos estão vazios
    if (empty($email) || empty($senha)) {
        http_response_code(400);
        throw new Exception("Preencha todos os campos");
    }

    // valida se o usuario está enviando um email
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        http_response_code(400);
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
            http_response_code(429);
            throw new Exception("Muitas tentativas inválidas. Aguarde 2 minutos para tentar novamente.");
        }

        http_response_code(401);
        throw new Exception("Email ou senha incorretos");
    }

    // Login bem-sucedido → reset tentativas
    $_SESSION['LoginTentativas'] = 0;
    unset($_SESSION['LoginBloqueado']);

    $_SESSION['id'] = $usuarioLogin['id'];
    $_SESSION['email'] = $usuarioLogin['email'];

    http_response_code(200);
    header('Location: ../index.php');
    exit();

} catch (Exception $e) {
    if (http_response_code() === 200) {
        http_response_code(500);
    }
    $_SESSION['erro_login'] = $e->getMessage();
    header('Location: ../view/pages/login.php');
    echo $e;
    exit();
}
?>