<?php
session_start();
require_once "../model/UsuarioModel.php";
require_once "../model/ImagemModel.php";
require_once __DIR__ . "/../controller/UploadController.php";


$modelUsuario = new UsuarioModel();
$modelImagem = new ImagemModel();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $id = $_POST['id'] ?? null;
    $nome = trim($_POST['nome'] ?? '');
    $telefone = preg_replace('/\D/', '', $_POST['telefone'] ?? '');
    $email = trim($_POST['email'] ?? '');
    $cpf = preg_replace('/\D/', '', $_POST['cpf'] ?? '');
    $id_imagem = null; // inicializa

    // =====================
    // Validações simples
    // =====================
    if (empty($nome) || strlen($nome) < 10) {
        $_SESSION['mensagem'] = "Nome deve ter pelo menos 10 caracteres.";
        header("Location: /together/view/pages/Usuario/editarInformacoes.php");
        exit;
    }

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $_SESSION['mensagem'] = "E-mail inválido.";
        header("Location: /together/view/pages/Usuario/editarInformacoes.php");
        exit;
    }

    if (!preg_match('/^\d{10,11}$/', $telefone)) {
        $_SESSION['mensagem'] = "Telefone inválido. Deve conter 10 ou 11 dígitos.";
        header("Location: /together/view/pages/Usuario/editarInformacoes.php");
        exit;
    }

    // =====================
    // Processa upload da imagem

    $idImagem = $_POST['id_imagem'];
    if (isset($_FILES['file']) && $_FILES['file']['error'] === UPLOAD_ERR_OK) {
        $upload = new UploadController();
        $idImagem = $upload->processar($_FILES['file'], $idImagem, 'usuarios');
        if ($idImagem === false) {
            header('Location: /together/view/pages/Usuario/editarInformacoes.php');
            exit;
        }
    }
    
    // =====================
    // Atualiza usuário
    // =====================
    $resultado = $modelUsuario->editarUsuario(
        $id,
        $nome,
        $telefone,
        $email,
        $cpf,
        $id_imagem // se for null, não altera a imagem
    );

    // =====================
    // Mensagens de feedback
    // =====================
    if ($resultado === 'telefone_duplicado') {
        $_SESSION['mensagem'] = "Telefone já cadastrado!";
    } elseif ($resultado === true) {
        $_SESSION['mensagem'] = "Dados atualizados com sucesso!";
    } else {
        $_SESSION['mensagem'] = "Erro: $resultado";
    }

    header("Location: /together/view/pages/Usuario/editarInformacoes.php");
    exit;
}
?>