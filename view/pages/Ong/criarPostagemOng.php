<?php require_once "../../../view/components/head.php"; ?>
<?php require_once "../../components/button.php" ?>
<?php require_once "../../components/label.php" ?>
<?php require_once "../../components/input.php" ?>
<?php require_once "../../components/textarea.php" ?>

<body>
    <?php require_once "../../../view/components/navbar.php"; ?>

    <main class="main-container">
        <?php require_once './../../components/back-button.php' ?>

        <div class="formulario-perfil">
            <form action="" method="POST">
                <div class="postagem-geral-form-linha-superior">
                    <?php require_once "./../../components/upload.php" ?>
                    <div class="postagem-geral-input-text">
                        <?= label("titulo", "Título")?>
                        <?= inputRequired("text","titulo","titulo") ?>

                        <?= label("link","Link") ?>
                        <?= inputRequired("text","link","link") ?>
                    </div>
                </div>
                <div class="postagem-geral-linha-inferior">
                    <div class="postagem-geral-input-text">
                        <?= label("descricao","Descrição") ?>
                        <?= textareaRequired("descricao","descricao") ?>
                    </div>
                </div>
                <div class="postagem-geral-div-btn">
                    <?= botao('primary', 'Salvar', 'ongAdmin.php?criar=salvar') ?>
                    <?= botao('secondary', 'Cancelar', 'ongAdmin.php?criar=cancelar') ?>
                </div>
            </form>
        </div>

    </main>

    <?php require_once './../../components/footer.php' ?>
</body>