<?php
require_once __DIR__ . "/../model/OngModel.php";
session_start();

if ($_SERVER['REQUEST_METHOD'] === "POST") {
    $ongModel = new OngModel();
    $id_voluntario = $_POST['id_voluntario'];

    if ($_POST['action'] === 'aceitar') {
        $ongModel->atualizarStatusVoluntario($id_voluntario, 'aprovado');
        $_SESSION['type'] = 'sucesso';
        $_SESSION['message'] = 'Voluntário aprovado!';
        header("Location: /together/view/pages/Ong/validacaoVoluntario.php");
        exit;
    } elseif ($_POST['action'] === 'recusar') {
        $_SESSION['type'] = 'sucesso';
        $_SESSION['message'] = 'Voluntário rejeitado!';
        $ongModel->atualizarStatusVoluntario($id_voluntario, 'rejeitado');
        header("Location: /together/view/pages/Ong/validacaoVoluntario.php");
        exit;
    }
}
