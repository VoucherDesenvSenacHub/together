<?php
require_once __DIR__ . "/../model/OngModel.php";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    session_start();

    $erros = validarUrls();
    if (!validarExistenciaPaginaOng()) {
        criarPaginaOng();
        exit;
    } elseif (empty($erros)) {
        validarEdicaoOng();
        exit;
    } else {
        foreach ($erros as $erro) {
            $_SESSION['type'] = 'erro';
            $_SESSION['message'] = $erro;
            header('Location: /together/view/pages/ong/editarPaginaOng.php');
            exit;
        }
    }
}

function validarExistenciaPaginaOng()
{
    $ongModel = new OngModel();
    $validarExiste = $ongModel->verificarSeExistePaginaPorIdUsuario($_SESSION['id']);
    return (bool) $validarExiste;
}

function criarPaginaOng()
{
    $ongModel = new OngModel();

    $idImagem = !empty($_POST['id_imagem']) ? $_POST['id_imagem'] : null;
    if (isset($_FILES['file']) && $_FILES['file']['error'] === UPLOAD_ERR_OK) {
        $upload = new UploadController();
        $idImagem = $upload->processar($_FILES['file'], $idImagem, 'paginasOng');
        if ($idImagem === false) {
            header('Location: /together/view/pages/ong/editarPaginaOng.php');
            exit;
        }
    }

    $resultado = $ongModel->criarPaginaOng(
        $_POST['subtitulo'],
        $_POST['descricao'],
        $_POST['Facebook'],
        $_POST['Instagram'],
        $_POST['X'],
        $idImagem,
        $_SESSION['id'],
    );

    if (!$resultado) {
        $_SESSION['type'] = 'erro';
        $_SESSION['message'] = 'Erro ao editar informações da página!';
        header('Location: /together/view/pages/ong/editarPaginaOng.php');
        exit;
    } else {
        $_SESSION['type'] = 'sucesso';
        $_SESSION['message'] = 'Dados da ONG atualizados com sucesso!';
        header('Location: /together/view/pages/visaoSobreaOng.php');
        exit;
    }
}

function validarEdicaoOng()
{
    $erros = [];
    $campos = ['subtitulo', 'descricao'];
    foreach ($campos as $campo) {
        if (empty($_POST[$campo])) {
            $erros[] = "O campo {$campo} é obrigatório!";
        }
    }
    if (!empty($erros)) {
        $_SESSION['type'] = 'erro';
        $_SESSION['message'] = implode("<br>", $erros);
        header('Location: /together/view/pages/Ong/editarPaginaOng.php');
        exit;
    } else {
        require_once __DIR__ . "/../model/OngModel.php";
        require_once __DIR__ . "/../model/ImagemModel.php";
        require_once __DIR__ . "/../controller/UploadController.php";

        $ongModel = new OngModel();
        $idImagem = !empty($_POST['id_imagem']) ? $_POST['id_imagem'] : null;

       
        if (isset($_FILES['file']) && $_FILES['file']['error'] === UPLOAD_ERR_OK) {
            $upload = new UploadController();
            $idImagem = $upload->processar($_FILES['file'], $idImagem, 'paginasOng');
            if ($idImagem === false) {
                header('Location: /together/view/pages/ong/editarPaginaOng.php');
                exit;
            }
        }

        $resultado = $ongModel->editarPaginaOng(
            $_SESSION['id'],
            $_POST['subtitulo'],
            $_POST['descricao'],
            $_POST['Facebook'],
            $_POST['Instagram'],
            $_POST['X'],
            $idImagem
        );

        if (!$resultado) {
            $_SESSION['type'] = 'erro';
            $_SESSION['message'] = 'Erro ao editar informações da página!';
            header('Location: /together/view/pages/ong/editarPaginaOng.php');
            exit;
        } else {
            $_SESSION['type'] = 'sucesso';
            $_SESSION['message'] = 'Dados da ONG atualizados com sucesso!';
            header('Location: /together/view/pages/visaoSobreaOng.php');
            exit;
        }
    }
}

function validarUrls()
{
    $erros = [];
    $campos = ['Facebook', 'Instagram', 'X'];
    foreach ($campos as $campo) {
        if (!empty($_POST[$campo])) {
            if (!filter_var($_POST[$campo], FILTER_VALIDATE_URL)) {
                $erros[] = "URL do " . $campo . " é inválida";
            }
        }
    }
    return $erros;
}
