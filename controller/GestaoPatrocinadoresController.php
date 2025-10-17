<?php
require_once __DIR__ . '/../model/PatrocinadoresModel.php';
require_once __DIR__ . "/../controller/UploadController.php";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $patrocinadoresModel = new PatrocinadoresModel();
    $existePatrocinador = $patrocinadoresModel->buscaPatrocinadoresPorNome($_POST['patrocinador']);

    $idImagem  = $_POST['idImagem'];
    if (isset($_FILES['file']) && $_FILES['file']['error'] === UPLOAD_ERR_OK) {
        $upload = new UploadController();
        $idImagem = $upload->processar($_FILES['file'], $idImagem, 'patrocinadores');
        if ($idImagem === false) {
            header('Location: /together/view/pages/Adm/gestaoDePatrocinadores.php');
            exit;
        }
    }
    echo 'existePatrocinador';
    var_dump($existePatrocinador);

    echo 'Post Patrocinador';
    var_dump($_POST['patrocinador']);

    echo 'IdImagem';
    var_dump($_POST['idImagem']);

    if (empty($existePatrocinador)) {
        var_dump("ENTROU");
        $resultado = $patrocinadoresModel->cadastrarPatrocinador($_POST['patrocinador'], $_POST['redePatrocinador'], $idImagem);
        var_dump($resultado['messageErro']);
    }
}
