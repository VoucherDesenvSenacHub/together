<?php
session_start();
require_once "../model/UsuarioModel.php";
require_once "../model/ImagemModel.php";
require_once __DIR__ . "/../controller/UploadController.php";
require_once __DIR__ . "/../controller/EnderecoController.php";

$modelUsuario = new UsuarioModel();
$modelImagem = new ImagemModel();


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    
    $id = $_SESSION['id'] ?? null;
    $nome = trim($_POST['nome'] ?? '');
    $dt_nascimento = $_POST['dt_nascimento'];
    $telefone = preg_replace('/\D/', '', $_POST['telefone'] ?? '');
    $email = trim($_POST['email'] ?? '');
    $cpf = preg_replace('/\D/', '', $_POST['cpf'] ?? '');
    $idImagem = null; // inicializa
    
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $_SESSION['type'] = 'erro';
        $_SESSION['message'] = "E-mail inválido.";
        header("Location: /together/view/pages/editarInformacoes.php");
        exit;
    }

    if (!preg_match('/^\d{10,11}$/', $telefone)) {
        $_SESSION['type'] = 'erro';
        $_SESSION['message'] = "Telefone inválido. Deve conter 10 ou 11 dígitos.";
        header("Location: /together/view/pages/editarInformacoes.php");
        exit;
    }

    $idImagem = $_POST['id_imagem'];
    if (isset($_FILES['file']) && $_FILES['file']['error'] === UPLOAD_ERR_OK) {
        $upload = new UploadController();
        $idImagem = $upload->processar($_FILES['file'], $idImagem, 'usuarios');
        if ($idImagem === false) {
            header('Location: /together/view/pages/editarInformacoes.php');
            exit;
        }
    }

    $idEnderecoUsuario = $modelUsuario->buscarUsuarioId($id)['id_endereco'];
    $enderecoController = new EnderecoController();
    $idEndereco = $enderecoController->atualizarEndereco($idEnderecoUsuario, $_POST['logradouro'], $_POST['numero'], $_POST['cep'], $_POST['complemento'], $_POST['bairro'], $_POST['cidade'], $_POST['estado']); 

    $resultado = $modelUsuario->editarUsuario(
        $id,
        $nome,
        $dt_nascimento,
        $telefone,
        $email,
        $idEndereco,
        $idImagem
    );

    if ($resultado === 'telefone_duplicado') {
        $_SESSION['type'] = 'erro';
        $_SESSION['message'] = "Telefone já cadastrado!";
    } elseif ($resultado === true) {
        $_SESSION['type'] = 'sucesso';
        $_SESSION['message'] = "Dados atualizados com sucesso!";
    } else {
        $_SESSION['type'] = 'erro';
        $_SESSION['message'] = "Erro: $resultado";
    }

    header("Location: /together/view/pages/editarInformacoes.php");
    exit;
}
