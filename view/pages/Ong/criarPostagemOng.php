<?php require_once './../../../services/AutenticacaoService.php';
AutenticacaoService::validarAcessoLogado(['Ong']);  ?>
<?php require_once "../../components/head.php"; ?>
<?php require_once "../../components/button.php" ?>
<?php require_once "../../components/label.php" ?>
<?php require_once "../../components/input.php" ?>
<?php require_once "../../components/textarea.php" ?>
<?php require_once "../../components/alert.php" ?>
<?php require_once "./../../components/upload.php" ?>
<?php
if (isset($_SESSION['type'], $_SESSION['message'])) {
    showPopup($_SESSION['type'], $_SESSION['message']);
    unset($_SESSION['type'], $_SESSION['message']);
}

$preview = new ImagemPreview(null)
?>

<body>
    <?php require_once "../../../view/components/navbar.php"; ?>

    <main class="main-container">
       

        <div class="div-wrap-width">
            <h1 class="titulo-pagina">Criar Postagem</h1>
            <div class="formulario-perfil">
                <form action="" method="POST" class="postagem-geral-form" enctype="multipart/form-data">
                    <div class="postagem-geral-form-linha-superior">
                        <div class='formulario-imagem-preview'>
                            <?php $preview->preview() ?>
                        </div>
                        <div class="postagem-geral-input-text">
                            <div>
                                <?= label("titulo", "Título") ?>
                                <?= inputRequired("text", "titulo", "titulo") ?>
                            </div>
                            <div>
                                <?= label("link", "Link") ?>
                                <?= inputRequired("text", "link", "link") ?>
                            </div>
                        </div>
                    </div>
                    <div class="postagem-geral-linha-inferior">
                        <div class="postagem-geral-input-text">
                            <div>
                                <?= label("descricao", "Descrição") ?>
                                <?= textareaRequired("descricao", "descricao") ?>
                            </div>
                        </div>
                    </div>
                    <div class="postagem-geral-div-btn">
                        <div class="postagem-geral-btn">
                            <?= botao('salvar', 'Salvar', "", '/together/controller/PostagemCriarController.php') ?>
                        </div>
                        <div class="postagem-geral-btn"><?= botao('cancelar', 'Cancelar', "", '') ?></div>
                    </div>
                </form>
            </div>
        </div>

    </main>

    <?php require_once './../../components/footer.php' ?>
</body>