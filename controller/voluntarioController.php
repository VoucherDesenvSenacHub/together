<?php
session_start();

require_once __DIR__ . '/../model/UsuarioModel.php';
require_once __DIR__ . '/../model/OngModel.php'; 



// Verifica se o usuário está logado
if (!isset($_SESSION['id']) || !isset($_SESSION['perfil'])) {
    $_SESSION['type'] = 'erro';
    $_SESSION['message'] = 'Você precisa estar logado para se voluntariar.';
    header('Location: /together/view/pages/login.php');
    exit;
}

// Verifica se é um usuário ou ong 
if ($_SESSION['perfil'] === 'Administrador') {
    $_SESSION['type'] = 'erro';
    $_SESSION['message'] = 'Administradores não podem se voluntariar.';
    header('Location: /together/index.php');
    exit;
}

// Verifica se foi enviado via POST
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['action']) && $_POST['action'] === 'voluntariar') {
    
    $id_usuario = $_SESSION['id'];
    $id_ong = isset($_POST['id_ong']) ? intval($_POST['id_ong']) : null;
    
    // Validação 
    if (!$id_ong || $id_ong <= 0) {
        $_SESSION['type'] = 'erro';
        $_SESSION['message'] = 'ONG inválida.';
        $redirect = $_SERVER['HTTP_REFERER'] ?? '/together/index.php';
        header('Location: ' . $redirect);
        exit;
    }
    
    // Impede que a ONG se voluntarie para si mesma
    if ($_SESSION['perfil'] === 'Ong') {
        $ongModelTmp = new OngModel();
        // método verificarUsuarioTemOng está no OngModel
        $dadosOngDoUsuario = $ongModelTmp->verificarUsuarioTemOng($id_usuario);
        $idOngDoUsuario = isset($dadosOngDoUsuario['id_ong']) ? intval($dadosOngDoUsuario['id_ong']) : null;

        if ($idOngDoUsuario && $idOngDoUsuario === $id_ong) {
            $_SESSION['type'] = 'erro';
            $_SESSION['message'] = 'Uma ONG não pode se voluntariar para si mesma.';
            header('Location: /together/view/pages/visaoSobreaOng.php?id=' . $id_ong);
            exit;
        }
    }
    
    
    $usuarioModel = new UsuarioModel();
    
    $resultado = $usuarioModel->registrarVoluntario($id_usuario, $id_ong);
    
    // Trata o resultado
    if ($resultado === true) {
        $_SESSION['type'] = 'sucesso';
        $_SESSION['message'] = 'Solicitação de voluntariado enviada com sucesso! Aguarde a aprovação da ONG.';
    } elseif ($resultado === 'ja_voluntario') {
        $_SESSION['type'] = 'erro';
        $_SESSION['message'] = 'Você já é voluntário desta ONG.';
    } elseif ($resultado === 'solicitacao_pendente') {
        $_SESSION['type'] = 'erro';
        $_SESSION['message'] = 'Você já possui uma solicitação pendente para esta ONG.';
    } else {
        $_SESSION['type'] = 'erro';
        $_SESSION['message'] = 'Erro ao enviar solicitação. Tente novamente mais tarde.';
    }
    
    // Redireciona de volta para a página da ONG
    header('Location: /together/view/pages/visaoSobreaOng.php?id=' . $id_ong);
    exit;
    
} else {
    // Se não for POST, redireciona para home
    header('Location: /together/index.php');
    exit;
}
