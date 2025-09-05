<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    require_once __DIR__ . "/../model/OngModel.php";
    session_start();

    $ongModel = new OngModel();
    validarUrl();
    // $ongModel->editarPaginaOng($_SESSION['id'], $_POST['titulo'], $_POST['subtitulo'], $_POST['descricao'], $_POST['facebook'], $_POST['instagram'], $_POST['twitter']);
} else {
}

function validarUrl()
{
    if (filter_var($_POST['facebook'], FILTER_VALIDATE_URL) && filter_var($_POST['instagram'], FILTER_VALIDATE_URL) && filter_var($_POST['twitter'], FILTER_VALIDATE_URL)) {
        if (@get_headers($_POST['facebook']) && @get_headers($_POST['instagram']) && @get_headers($_POST['twitter'])) {
            $_SESSION['type'] = 'sucesso';
            $_SESSION['message'] = 'Url válida';
            header('Location: /together/view/pages/Ong/editarPaginaOng.php');
            exit;
            // sucesso
        } else {
            $_SESSION['type'] = 'erro';
            $_SESSION['message'] = 'Url inválida 111';
            header('Location: /together/view/pages/Ong/editarPaginaOng.php');
            exit;
        }
    }
    $_SESSION['type'] = 'erro';
    $_SESSION['message'] = 'Url inválida 222';
    header('Location: /together/view/pages/Ong/editarPaginaOng.php');
    exit;
}
