<?php

use App\Services\EmailService;

require_once __DIR__ . "/../model/OngModel.php";
require_once __DIR__ . "/../services/EmailService.php";
session_start();

if ($_SERVER['REQUEST_METHOD'] === "POST") {
    $ongModel = new OngModel();
    $emailService = new EmailService();
    $id_voluntario = $_POST['id_voluntario'];

    if ($_POST['action'] === 'aceitar') {
        $ongModel->atualizarStatusVoluntario($id_voluntario, 'aprovado');
        $_SESSION['type'] = 'sucesso';
        $_SESSION['message'] = 'Voluntário aprovado!';
        $emailService->enviarEmailVoluntarioAprovado('luanmendesmoura091207@gmail.com', $_POST['razao_social']);
        header("Location: /together/view/pages/Ong/validacaoVoluntario.php");
        exit;
    } elseif ($_POST['action'] === 'recusar') {
        $ongModel->atualizarStatusVoluntario($id_voluntario, 'rejeitado');
        $_SESSION['type'] = 'sucesso';
        $_SESSION['message'] = 'Voluntário rejeitado!';
        $emailService->enviarEmailVoluntarioRejeitado('luanmendesmoura091207@gmail.com', $_POST['razao_social']);
        header("Location: /together/view/pages/Ong/validacaoVoluntario.php");
        exit;
    }
}
