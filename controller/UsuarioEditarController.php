<?php
session_start();
require_once "../model/UsuarioModel.php";
require_once "../model/ImagemModel.php";

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
        header("Location: ../../../view/pages/Usuario/editarInformacoes.php");
        exit;
    }

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $_SESSION['mensagem'] = "E-mail inválido.";
        header("Location: ../../../view/pages/Usuario/editarInformacoes.php");
        exit;
    }

    if (!preg_match('/^\d{10,11}$/', $telefone)) {
        $_SESSION['mensagem'] = "Telefone inválido. Deve conter 10 ou 11 dígitos.";
        header("Location: ../../../view/pages/Usuario/editarInformacoes.php");
        exit;
    }

    // =====================
    // Upload de imagem
    // =====================
    if (isset($_FILES['file']) && $_FILES['file']['error'] === UPLOAD_ERR_OK) {
        $arquivoTmp = $_FILES['file']['tmp_name'];
        $nomeOriginal = $_FILES['file']['name'];
        $ext = strtolower(pathinfo($nomeOriginal, PATHINFO_EXTENSION));
        $novoNome = uniqid('img_', true) . '.' . $ext;

        $diretorio = __DIR__ . '/../../uploads/';
        if (!is_dir($diretorio)) mkdir($diretorio, 0755, true);

        $caminhoFinal = $diretorio . $novoNome;

        if (move_uploaded_file($arquivoTmp, $caminhoFinal)) {
            $caminhoBanco = 'uploads/' . $novoNome;
            $id_imagem = $modelImagem->salvar($caminhoBanco, $novoNome, $nomeOriginal);
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

    header("Location: ../view/pages/Usuario/editarInformacoes.php");
    exit;
}
?>
