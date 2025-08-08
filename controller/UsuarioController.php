<?php

echo "Foi enviado";
var_dump($_POST);
if($_SERVER['REQUEST_METHOD'] === 'POST') {
    require_once __DIR__ . '../model/UsuarioModel.php';
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
    
    if ($senha !== $confirmarSenha) {
        return header("Location: ../view/pages/criarConta.php?error=password_mismatch");
    }

    if ($usuarioModel->registrarUsuario($nome, $cpf, $telefone, $email, $senha)) {
        echo "Usuário registrado com sucesso!";
        header("Location: ../view/pages/login.php");
        exit;
    } else {
        echo "Erro ao registrar usuário.";
    }
} else {
    return header("Location: ../view/pages/criarConta.php?error=invalid_request");
}