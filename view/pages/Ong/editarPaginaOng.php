<?php
require_once "../../components/head.php";
require_once "../../components/button.php";
require_once "../../components/label.php";
require_once "../../components/input.php";
require_once "../../components/textarea.php";
require_once "../../components/alert.php";

require_once "../../../model/OngModel.php";
$ongModel = new OngModel();
$pagina = $ongModel->mostrarInformacoesPaginaOng($_SESSION['id']);

require_once "../../../model/ImagemModel.php";
$imagemModel = new ImagemModel();
$imagem = $imagemModel->buscarImagemPorIdPagina($_SESSION['id']);

// --------------------------------------------
// USADO PARA O PREVIEW DA IMAGEM
require_once "./../../components/upload.php";
$preview = new ImagemPreview($imagem['id']);
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
        <?php require_once './../../components/back-button.php' ?>

        <div class="div-wrap-width">
            <h1 class="titulo-pagina">Editar Página</h1>
            <div class="formulario-perfil">
                <form action="" method="POST" enctype="multipart/form-data">
                    <div class="formulario-linha-superior">
                        <div class='formulario-imagem-preview'>
                            <input type="hidden" name="id_imagem" value="<?= $imagem['id'] ?? null ?>">
                            <?php $preview->preview() ?>
                        </div>
                        <div class="formulario-campos">
                            <div>
                                <?= label("titulo", "Título") ?>
                                <?= inputRequiredMaxLength("text", "titulo", "titulo", $pagina['titulo'] ?? '', 100) ?>
                            </div>
                            <div>
                                <?= label("subtitulo", "Subtítulo") ?>
                                <?= textareaRequiredMaxLength("subtitulo", "subtitulo", $pagina['subtitulo'], 150) ?>
                            </div>
                        </div>
                    </div>
                    <?= label("descricao", "Descrição") ?>
                    <?= textareaRequiredMaxLength("descricao", "descricao", $pagina['descricao'], 800) ?>
                    <div class="formulario-redes-buttons">
                        <div class="formulario-redes-sociais">
                            <div class="formulario-rede-social">
                                <img src="/together/view/assests/images/Adm/facebook.png" alt="Facebook">
                                <input type="text" placeholder="@" name="Facebook" value="<?= $pagina['facebook'] ?? '' ?>" />
                            </div>
                            <div class="formulario-rede-social">
                                <img src="/together/view/assests/images/Adm/instagram.png" alt="Instagram">
                                <input type="text" placeholder="@" name="Instagram" value="<?= $pagina['instagram'] ?? '' ?>" />
                            </div>
                            <div class="formulario-rede-social">
                                <img src="/together/view/assests/images/Adm/X.png" alt="X">
                                <input type="text" placeholder="@" name="X" value="<?= $pagina['twitter'] ?? '' ?>" />
                            </div>
                        </div>
                        <div class="formulario-buttons">
                            <div class="postagem-geral-btn "><?= botao('salvar', 'Salvar', formaction: '/together/controller/EditarPaginaOngController.php') ?></div>
                            <div class="postagem-geral-btn "><?= botao('cancelar', 'Cancelar', formaction: '') ?></div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </main>

    <?php require_once './../../components/footer.php' ?>
</body>