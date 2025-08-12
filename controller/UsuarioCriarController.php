<?php

echo "Foi enviado";
var_dump($_POST);
echo "<br><br>";
if($_SERVER['REQUEST_METHOD'] === 'POST') {
    require_once __DIR__ . '/../model/UsuarioModel.php';
    $usuarioModel = new UsuarioModel();

    $nome = $_POST['nome'];
    $cpf = $_POST['cpf'];
    $telefone = $_POST['telefone'];
    $email = $_POST['email'];
    $senha = $_POST['senha'];
    $confirmarSenha = $_POST['confirmar_senha'];

    if ($usuarioModel->findUsuarioByEmail($email)) {
        return header("Location: ../view/pages/criarConta.php?error=email_existe");
    }

    if ($usuarioModel->findUsuarioByCpf($cpf)) {
        return header("Location: ../view/pages/criarConta.php?error=cpf_existe");
    }

    if (empty($nome) || empty($cpf) || empty($telefone) || empty($email) || empty($senha)) {
        return header("Location: ../view/pages/criarConta.php?error=empty_fields");
    }

    if (strlen($nome) > 50) {
        return header("Location: ../view/pages/criarConta.php?error=nome_tamanho_excedido");
    }

    if (strlen($cpf) !== 11 || !is_numeric($cpf)) {
        return header("Location: ../view/pages/criarConta.php?error=cpf_invalido");
    }

    if (strlen($telefone) < 10 || strlen($telefone) > 18 || !is_numeric($telefone)) {
        return header("Location: ../view/pages/criarConta.php?error=telefone_invalido");
    }

    if (strlen($email) > 50) {
        return header("Location: ../view/pages/criarConta.php?error=email_invalido");
    }  
    
    if (strlen($senha) > 60 || strlen($senha) < 4) {
        return header("Location: ../view/pages/criarConta.php?error=senha_invalida");
    }
    
    if ($senha !== $confirmarSenha) {
        return header("Location: ../view/pages/criarConta.php?error=password_mismatch");
    }

    if ($usuarioModel->registrarUsuarioComEndereco(
        $nome, $cpf, $telefone, $email, $senha,
         '',0, '', '', '', '', '')) {
        echo "Usuário registrado com sucesso!";
        header("Location: ../view/pages/login.php");
        exit;
    } else {
        echo "Erro ao registrar usuário.";
    }
} else {
    return header("Location: ../view/pages/criarConta.php?error=invalid_request");
}