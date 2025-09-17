<?php
session_start();
require_once "../model/UsuarioModel.php";
require_once "../model/ImagemModel.php";
require_once "../config/database.php"; // <- importa a conexão

// cria conexão
$db = new Database();
$conn = $db->conectar();

// passa conexão para os models
$model1 = new UsuarioModel($conn);
$model2 = new ImagemModel($conn);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['id'] ?? null;
    $nome = trim($_POST['nome'] ?? '');
    $telefone = preg_replace('/\D/', '', $_POST['telefone'] ?? '');
    $email = trim($_POST['email'] ?? '');
    $cpf = preg_replace('/\D/', '', $_POST['cpf'] ?? '');
    $tipo_perfil = $_POST['tipo_perfil'] ?? '';
    $id_imagem = null;

    // 1️⃣ Validações
    if (empty($nome) || strlen($nome) < 10) {
        $_SESSION['mensagem'] = "Nome deve ter pelo menos 10 caracteres.";
        header("Location: ../../../view/pages/Usuario/editarInformacoes.php");
        exit;
    }

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $_SESSION['mensagem'] = "E-mail inválido.";
        header("Location: ../../../view/pages/Usuario/editarInformacoes.php");
        exit;
    }

    if (!preg_match('/^\d{10,11}$/', $telefone)) {
        $_SESSION['mensagem'] = "Telefone inválido. Deve ter 10 ou 11 dígitos.";
        header("Location: ../../../view/pages/Usuario/editarInformacoes.php");
        exit;
    }

    // 2️⃣ Upload de imagem
    if (isset($_FILES['file']) && $_FILES['file']['error'] === UPLOAD_ERR_OK) {
        $arquivoTmp = $_FILES['file']['tmp_name'];
        $nomeOriginal = $_FILES['file']['name'];
        $ext = strtolower(pathinfo($nomeOriginal, PATHINFO_EXTENSION));
        $novoNome = uniqid('img_', true) . '.' . $ext;

        $diretorio = __DIR__ . '/../../uploads/';
        if (!is_dir($diretorio))
            mkdir($diretorio, 0755, true);
        $caminhoFinal = $diretorio . $novoNome;

        if (move_uploaded_file($arquivoTmp, $caminhoFinal)) {
            $caminhoBanco = 'uploads/' . $novoNome;
            $id_imagem = $model2->salvar($caminhoBanco, $novoNome, $nomeOriginal);
        }
    }

    // 3️⃣ Atualiza usuário
    $resultado = $model1->editarUsuario($id, $nome, $telefone, $email, $cpf, $tipo_perfil, $id_imagem);

    if ($resultado === 'cpf_duplicado') {
        $_SESSION['mensagem'] = "CPF já cadastrado!";
    } elseif ($resultado === 'telefone_duplicado') {
        $_SESSION['mensagem'] = "Telefone já cadastrado!";
    } elseif ($resultado === true) {
        $_SESSION['mensagem'] = "Dados atualizados com sucesso!";
    } else {
        $_SESSION['mensagem'] = "Erro: $resultado";
    }

    header("Location: /together/view/pages/Usuario/editarInformacoes.php");
    exit;
}
