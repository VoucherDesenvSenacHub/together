<?php
require_once __DIR__ . "/../model/OngModel.php";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    session_start();

    if (empty($erros)) {
        validarEdicaoPostagemOng();
        exit;
    } else {
        foreach ($erros as $erro) {
            $_SESSION['type'] = 'erro';
            $_SESSION['message'] = $erro;
            header('Location: /together/view/pages/Ong/editarPostagemOng.php');
            exit;
        }
    }
}

function validarEdicaoPostagemOng()
{
    if (empty($_POST['titulo'])) {
        $_SESSION['type'] = 'erro';
        $_SESSION['message'] = 'O título é obrigatório!';
        header('Location: /together/view/pages/Ong/editarPostagemOng.php');
        exit;
    } elseif (empty($_POST['link'])) {
        $_SESSION['type'] = 'erro';
        $_SESSION['message'] = 'O link é obrigatório!';
        header('Location: /together/view/pages/Ong/editarPostagemOng.php');
        exit;
    } elseif (empty($_POST['descricao'])) {
        $_SESSION['type'] = 'erro';
        $_SESSION['message'] = 'A descrição é obrigatória!';
        header('Location: /together/view/pages/Ong/editarPostagemOng.php');
        exit;
    } else {
        require_once __DIR__ . "/../model/OngModel.php";
        require_once __DIR__ . "/../model/ImagemModel.php";
        require_once __DIR__ . "/../controller/UploadController.php";

        $ongModel = new OngModel();
        $idImagem = !empty($_POST['id_imagem']) ? $_POST['id_imagem'] : null;

        // Se veio imagem no POST, processa o upload
        if (isset($_FILES['file']) && $_FILES['file']['error'] === UPLOAD_ERR_OK) {
            $upload = new UploadController();
            $idImagem = $upload->processar($_FILES['file'], $idImagem, 'ongs');
            if ($idImagem === false) {
                header('Location: /together/view/pages/Ong/editarPostagemOng.php');
                exit;
            }
        }
        
        $resultado = $ongModel->editarPostagemDaOng(
            $_SESSION['id'],
            $_POST['titulo'],
            $_POST['descricao'],
            $_POST['link'],
            $idImagem
        );

        if (!$resultado) {
            $_SESSION['type'] = 'erro';
            $_SESSION['message'] = 'Erro ao editar informações da postagem!';
            header('Location: /together/view/pages/Ong/editarPostagemOng.php');
            exit;
        } else {
            $_SESSION['type'] = 'sucesso';
            $_SESSION['message'] = 'Dados da postagem atualizados com sucesso!';
            header('Location: /together/view/pages/Ong/editarPostagemOng.php');
            exit;
        } 
    }
}

