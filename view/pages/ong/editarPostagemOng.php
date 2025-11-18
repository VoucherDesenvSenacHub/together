<?php require_once './../../../services/AutenticacaoService.php';
AutenticacaoService::validarAcessoLogado(['Ong']);  ?>
<?php require_once "../../components/head.php"; ?>
<?php require_once "../../components/button.php" ?>
<?php require_once "../../components/label.php" ?>
<?php require_once "../../components/input.php" ?>
<?php require_once "../../components/textarea.php" ?>
<?php require_once "../../components/alert.php" ?>


<?php
require_once "../../../model/OngModel.php";
$ongModel = new OngModel();

$pagina = $ongModel->mostrarinformacoesPostagemOng($_GET['id']);

require_once "../../../model/ImagemModel.php";
$imagemModel = new ImagemModel();
$imagem = $imagemModel->buscarImagemPorIdPostagem($_GET['id']);


// --------------------------------------------
// USADO PARA O PREVIEW DA IMAGEM
require_once "./../../components/upload.php";
$preview = new ImagemPreview($imagem ? $imagem['id'] : null);

// --------------------------------------------


// Popup do session
if (isset($_SESSION['type'], $_SESSION['message'])) {
    showPopup($_SESSION['type'], $_SESSION['message']);
    unset($_SESSION['type'], $_SESSION['message']);
}
?>

<body>
    <?php require_once "../../../view/components/navbar.php"; ?>

    <main class="main-container">
       

        <div class="div-wrap-width">
            <h1 class="titulo-pagina">Editar Postagem</h1>
            <div class="formulario-perfil">
                <form action="" method="POST" class="postagem-geral-form" enctype="multipart/form-data">
                    <div class="postagem-geral-form-linha-superior">
                        <div class='formulario-imagem-preview'>
                            <input type="hidden" name="id" value="<?= $_GET['id']?>">
                            <input type="hidden" name="id_imagem" value="<?= $imagem ? $imagem['id'] : null ?>">
                            <?php $preview->preview() ?>
                        </div>
                        <div class="postagem-geral-input-text">
                            <div>
                                <?= label("titulo", "Título") ?>
                                <?= inputRequired("text", "titulo", "titulo" , $pagina['titulo'] ?? '') ?>
                            </div>
                            <div>
                                <?= label("link", "Link") ?>
                                <?= inputRequired("text", "link", "link", $pagina['link'] ?? '') ?>
                            </div>
                        </div>
                    </div>
                    <div class="postagem-geral-linha-inferior">
                        <div class="postagem-geral-input-text">
                            <div>
                                <?= label("descricao", "Descrição") ?>
                                <?= inputRequiredMaxLength("text", "descricao", "descricao", $pagina['descricao'] , 255) ?>
                            </div>
                        </div>
                    </div>
                    <div class="postagem-geral-btn-group">
                        <div class="postagem-geral-div-btn">
                            <div class="postagem-geral-btn "><?= botao('salvar', 'Salvar', formaction: '/together/controller/EditarPostagemOngController.php') ?></div>
                            <div class="postagem-geral-btn "><?= botao('cancelar', 'Cancelar', formaction: '') ?></div>
                        </div>
                    </div>
                </form>
            </div>
        </div>

    </main>

    <?php require_once './../../components/footer.php' ?>
</body>