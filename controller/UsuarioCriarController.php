<?php
session_start();

try{

    if($_SERVER['REQUEST_METHOD'] === 'POST') {
        require_once __DIR__ . '/../model/UsuarioModel.php';
        $usuarioModel = new UsuarioModel();
    
        $nome = $_POST['nome'];
        $cpf = $_POST['cpf'];
        $telefone = $_POST['telefone'];
        $email = $_POST['email'];
        $senha = $_POST['senha'];
        $confirmarSenha = $_POST['confirmar_senha'];
    
        if (empty($nome) || empty($cpf) || empty($telefone) || empty($email) || empty($senha)) {
            throw new Exception("Todos os campos são obrigatórios.");
        }
    
        if ($usuarioModel->findUsuarioByEmail($email)) {
            throw new Exception("Email já cadastrado.");
        }
    
        if ($usuarioModel->findUsuarioByCpf($cpf)) {
            throw new Exception("CPF já cadastrado.");
        }
    
        if (strlen($nome) > 50) {
            throw new Exception("Nome muito longo. Máximo 50 caracteres.");
        }
    
        if (strlen($cpf) !== 11 || !is_numeric($cpf)) {
            throw new Exception("CPF inválido. Deve ter 11 dígitos numéricos.");
        }
    
        if (strlen($telefone) < 10 || strlen($telefone) > 18 || !is_numeric($telefone)) {
            throw new Exception("Telefone inválido. Deve ter entre 10 e 18 dígitos numéricos.");
        }
    
        if (strlen($email) > 50) {
            throw new Exception("Email muito longo. Máximo 50 caracteres.");
        }  
        
        if (strlen($senha) > 60 || strlen($senha) < 3) {
            throw new Exception("Senha deve ter entre 3 e 60 caracteres.");
        }
        
        if ($senha !== $confirmarSenha) {
            throw new Exception("As senhas não coincidem.");
        }
    
        if ($usuarioModel->registrarUsuarioComEndereco(
            $nome, $cpf, '1970-01-01', $telefone, $email, $senha,
             '',0, '', '', '', '', '')) {
            echo "Usuário registrado com sucesso!";
            header("Location: ../view/pages/login.php");
            exit;
        } else {
            echo "Erro ao registrar usuário.";
        }
    } else {
        throw new Exception("Método inválido para esta requisição");
    }
} catch (Exception $e) {
    // Tratar exceção
    $_SESSION['erro'] = $e->getMessage();
    header('Location: ../view/pages/criarConta.php');
    exit();
}