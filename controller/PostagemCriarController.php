<?php
require_once __DIR__ . '/../model/PostagemModel.php';
require_once __DIR__ . "/../controller/UploadController.php";

session_start();

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $titulo    = $_POST['titulo']    ;
    $descricao = $_POST['descricao'] ;
    $link      = $_POST['link']      ;
    $idImagem  = $_POST['id_imagem'] ;
    $idOng     = $_SESSION['id']; 

    if (!empty($link) && !filter_var($link, FILTER_VALIDATE_URL)) {
        $_SESSION['type'] = 'erro';
        $_SESSION['message'] = 'O link informado não é válido.';
        header("Location: /together/view/pages/ong/criarPostagemOng.php");
        exit;
    }

    $postagemModel = new PostagemModel();

    try {
        // Se veio imagem no POST, processa o upload
        if (isset($_FILES['file']) && $_FILES['file']['error'] === UPLOAD_ERR_OK) {
            $upload = new UploadController();
            $idImagem = $upload->processar($_FILES['file'], $idImagem, 'postagensOng');
            if ($idImagem === false) {
                header('Location: /together/view/pages/ong/criarPostagemOng.php');
                exit;
            }
        }
        
        $ok = $postagemModel->criar($titulo, $descricao, $link, $idImagem, $idOng);

        if ($ok) {
            $_SESSION['type'] = 'sucesso';
            $_SESSION['message'] = 'Postagem criada com sucesso!';
            header("Location: /together/view/pages/visaoSobreaOng.php"); 
            exit;
        } else {
            $_SESSION['type'] = 'erro';
            $_SESSION['message'] = 'Erro ao criar postagem!';
            header("Location: /together/view/pages/ong/criarPostagemOng.php");
            exit;
        }
    } catch (Exception $e) {
        $_SESSION['type'] = 'erro';
        $_SESSION['message'] = 'Ocorreu um erro!';
        $_SESSION['erro'] = 'Erro: ' . $e->getMessage();
        header("Location: /together/view/pages/ong/criarPostagemOng.php");
        exit;
    }
}
