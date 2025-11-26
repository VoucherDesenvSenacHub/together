<?php
session_start();

require_once __DIR__ . '/../model/UsuarioModel.php';
require_once __DIR__ . '/../model/OngModel.php'; 




if (!isset($_SESSION['id']) || !isset($_SESSION['perfil'])) {
    $_SESSION['type'] = 'erro';
    $_SESSION['message'] = 'Você precisa estar logado para se voluntariar.';
    header('Location: /together/view/pages/login.php');
    exit;
}

if ($_SESSION['perfil'] === 'Administrador') {
    $_SESSION['type'] = 'erro';
    $_SESSION['message'] = 'Administradores não podem se voluntariar.';
    header('Location: /together/index.php');
    exit;
}


if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['action']) && $_POST['action'] === 'voluntariar') {
    
    $id_usuario = $_SESSION['id'];
    $id_ong = isset($_POST['id_ong']) ? intval($_POST['id_ong']) : null;
    

    if (!$id_ong || $id_ong <= 0) {
        $_SESSION['type'] = 'erro';
        $_SESSION['message'] = 'ONG inválida.';
        $redirect = $_SERVER['HTTP_REFERER'] ?? '/together/index.php';
        header('Location: ' . $redirect);
        exit;
    }
    
    if ($_SESSION['perfil'] === 'Ong') {
        $ongModelTmp = new OngModel();
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
    
    if ($resultado === true) {
        $_SESSION['type'] = 'sucesso';
        $_SESSION['message'] = 'Solicitação de voluntariado enviada com sucesso! Aguarde a aprovação da ONG.';
    } elseif ($resultado === 'ja_voluntario') {
        $_SESSION['type'] = 'erro';
        $_SESSION['message'] = 'Você já é voluntário desta ONG.';
    } elseif ($resultado === 'solicitacao_pendente') {
        $_SESSION['type'] = 'erro';
        $_SESSION['message'] = 'Você já possui uma solicitação pendente para esta ONG.';
    } elseif ($resultado === 'rejeitado') {
        $_SESSION['type'] = 'erro';
        $_SESSION['message'] = 'Você foi rejeitado para esta ONG.';
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
