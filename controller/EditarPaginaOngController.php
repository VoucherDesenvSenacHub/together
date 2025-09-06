<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    require_once __DIR__ . "/../model/OngModel.php";
    session_start();

    $ongModel = new OngModel();

    $erros = validarUrls();
    if (empty($erros)) {
        validarEdicaoOng();
        exit;
    } else {
        foreach ($erros as $erro) {
            $_SESSION['type'] = 'erro';
            $_SESSION['message'] = $erro;
            header('Location: /together/view/pages/Ong/editarPaginaOng.php');
            exit;
        }
    }
}

function validarEdicaoOng()
{
    require_once __DIR__ . "/../model/OngModel.php";
    $ongModel = new OngModel();

    $ongModel->editarPaginaOng($_SESSION['id'], $_POST['titulo'], $_POST['subtitulo'], $_POST['descricao'], $_POST['facebook'], $_POST['instagram'], $_POST['twitter']);

    header('Location: /together/view/pages/Ong/editarPaginaOng.php');

}

function validarUrls()
{
    $erros = [];
    $campos = ['Facebook', 'Instagram', 'X'];

    foreach ($campos as $campo) {
        if (!empty($_POST[$campo])) {
            if (!filter_var($_POST[$campo], FILTER_VALIDATE_URL)) {
                $erros[] = "URL do " . $campo . " é inválida";
            } else if (!@get_headers($_POST[$campo])) {
                $erros[] = "URL do " . $campo . " não responde";
            }
        }
    }
    return $erros;
}
