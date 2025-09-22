<?php
require_once __DIR__ . "/../model/OngModel.php";

var_dump($_POST);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    session_start();

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
    if (empty($_POST['titulo'])) {
        $_SESSION['type'] = 'erro';
        $_SESSION['message'] = 'O título é obrigatório!';
        header('Location: /together/view/pages/Ong/editarPaginaOng.php');
        exit;
    } elseif (empty($_POST['subtitulo'])) {
        $_SESSION['type'] = 'erro';
        $_SESSION['message'] = 'O subtítulo é obrigatório!';
        header('Location: /together/view/pages/Ong/editarPaginaOng.php');
        exit;
    } elseif (empty($_POST['descricao'])) {
        $_SESSION['type'] = 'erro';
        $_SESSION['message'] = 'A descrição é obrigatória!';
        header('Location: /together/view/pages/Ong/editarPaginaOng.php');
        exit;
    } else {
        require_once __DIR__ . "/../model/OngModel.php";
        require_once __DIR__ . "/../model/ImagemModel.php";
        require_once __DIR__ . "/../controller/UploadController.php";

        $ongModel = new OngModel();

        // Se veio imagem no POST, processa o upload
        if (!empty($_FILES['imagem']['name'])) {
            $upload = new UploadController();
            $idImagem = $upload->processar($_FILES['imagem'], $_POST['id_imagem']);
        }

        $resultado = $ongModel->editarPaginaOng(
            $_SESSION['id'],
            $_POST['titulo'],
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
            header('Location: /together/view/pages/Ong/editarPaginaOng.php');
            exit;
        } else {
            $_SESSION['type'] = 'sucesso';
            $_SESSION['message'] = 'Dados da ONG atualizados com sucesso!';
            header('Location: /together/view/pages/Ong/editarPaginaOng.php');
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
