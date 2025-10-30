<?php
require_once __DIR__ . "/../model/OngModel.php";

if ($_SERVER['REQUEST_METHOD'] === "POST") {
    $ongModel = new OngModel();
    $id_voluntario = $_POST['id_voluntario'];

    if ($_POST['action'] === 'aceitar') {
        $ongModel->atualizarStatusVoluntario($id_voluntario, 'aprovado');
        
    } elseif ($_POST['action'] === 'recusar') {
        $ongModel->atualizarStatusVoluntario($id_voluntario, 'rejeitado');
    }
}