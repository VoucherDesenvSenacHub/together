<?php
require_once __DIR__ . '/../model/PatrocinadoresModel.php';
require_once __DIR__ . "/../controller/UploadController.php";
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $patrocinadoresModel = new PatrocinadoresModel();

    if ($_POST['action'] === 'deletar') {
        $resposta = $patrocinadoresModel->desativarPatrocinador($_POST['id']);

        if ($resposta['response']) {
            $_SESSION['type'] = 'sucesso';
            $_SESSION['message'] = 'Patrocinador deletado!';
            header('Location: /together/view/pages/adm/gestaoDePatrocinadores.php');
            exit;
        } else {
            $_SESSION['type'] = 'erro';
            $_SESSION['message'] = 'Erro ao deletar patrocinador';
            header('Location: /together/view/pages/adm/gestaoDePatrocinadores.php');
            exit;
        }
    };

    $erro = validarUrls();
    if (!empty($erro)) {
        $_SESSION['type'] = 'erro';
        $_SESSION['message'] = 'Url inválida!';
        header('Location: /together/view/pages/adm/gestaoDePatrocinadores.php');
        exit;
    }

    $idImagem  = $_POST['idImagem'] ?? null;

    if (isset($_FILES['file']) && $_FILES['file']['error'] === UPLOAD_ERR_OK) {
        $upload = new UploadController();
        $idImagem = $upload->processar($_FILES['file'], $idImagem, 'patrocinadores');
        if ($idImagem === false) {
            header('Location: /together/view/pages/adm/gestaoDePatrocinadores.php');
            exit;
        }
    }

    if ($_POST['action'] === 'editar') {
        $resposta = $patrocinadoresModel->editarPatrocinadores($_POST['id'], $_POST['patrocinador'], $_POST['redePatrocinador'], $idImagem);

        if ($resposta['response']) {
            $_SESSION['type'] = 'sucesso';
            $_SESSION['message'] = 'Patrocinador deletado!';
            header('Location: /together/view/pages/adm/gestaoDePatrocinadores.php');
            exit;
        } else {
            $_SESSION['type'] = 'erro';
            $_SESSION['message'] = 'Erro ao deletar patrocinador';
            header('Location: /together/view/pages/adm/gestaoDePatrocinadores.php');
            exit;
        }
    } elseif ($_POST['action'] === 'salvar') {
        $existePatrocinador = $patrocinadoresModel->buscaPatrocinadoresPorNome($_POST['patrocinador']);
        if (!empty($existePatrocinador)) {
            $_SESSION['type'] = 'erro';
            $_SESSION['message'] = 'Já existe um patrocinador com esse nome!';
            header('Location: /together/view/pages/adm/gestaoDePatrocinadores.php');
            exit;
        }

        $resultado = $patrocinadoresModel->cadastrarPatrocinador($_POST['patrocinador'], $_POST['redePatrocinador'], $idImagem);

        if ($resultado['response']) {
            $_SESSION['type'] = 'sucesso';
            $_SESSION['message'] = 'Patrocinador adicionado com sucesso';
            header('Location: /together/view/pages/adm/gestaoDePatrocinadores.php');
            exit;
        } else {
            $_SESSION['type'] = 'erro';
            $_SESSION['message'] = 'Erro ao adicionar patrocinador';
            header('Location: /together/view/pages/adm/gestaoDePatrocinadores.php');
            exit;
        }
    }
}

function validarUrls()
{
    if (!empty($_POST['redePatrocinador'])) {
        if (!filter_var($_POST['redePatrocinador'], FILTER_VALIDATE_URL)) {
            $erro = "URL do patrocinador é inválida";
        }
    }
    return $erro;
}
