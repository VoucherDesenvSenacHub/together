<?php
session_start();
require_once __DIR__ . '/../model/UsuarioModel.php';



// Verifica se o usuário está logado
if (!isset($_SESSION['id']) || !isset($_SESSION['perfil'])) {
    $_SESSION['type'] = 'error';
    $_SESSION['message'] = 'Você precisa estar logado para se voluntariar.';
    header('Location: /together/view/pages/login.php');
    exit;
}


if ($_SESSION['perfil'] !== 'Usuario') {
    $_SESSION['type'] = 'error';
    $_SESSION['message'] = 'Apenas usuários podem se voluntariar.';
    header('Location: /together/index.php');
    exit;
}       


if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['action']) && $_POST['action'] === 'voluntariar') {
    
    $id_usuario = $_SESSION['id'];
    $id_ong = isset($_POST['id_ong']) ? intval($_POST['id_ong']) : null;
    
 
    if (!$id_ong || $id_ong <= 0) {
        $_SESSION['type'] = 'error';
        $_SESSION['message'] = 'ONG inválida.';
        header('Location: ' . $_SERVER['HTTP_REFERER']);
        exit;
    }
    
 
    $usuarioModel = new UsuarioModel();
    
    
    $resultado = $usuarioModel->registrarVoluntario($id_usuario, $id_ong);
    
 
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
    
  
    header('Location: /together/view/pages/visaoSobreaOng.php?id=' . $id_ong);
    exit;
    
} else {
   
    header('Location: /together/index.php');
    exit;
}