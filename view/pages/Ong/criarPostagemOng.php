<?php require_once "../../../view/components/head.php"; ?>
<?php require_once "../../components/button.php" ?>

<body>
    <?php require_once "../../../view/components/navbar.php"; ?>

    <main class="main-container">
        <?php require_once './../../components/back-button.php' ?>

        <div class="formulario-perfil">
            <form action="" method="POST">
                <div class="postagem-geral-form-linha-superior">
                    <?php require_once "./../../components/upload.php" ?>
                    <div class="postagem-geral-input-text">
                        <label class="formulario-label" for="titulo">Título</label>
                        <input class="formulario-input" type="text" id="titulo" name="titulo" />

                        <label class="formulario-label" for="link">Link</label>
                        <input class="formulario-input" id="link" name="link">
                    </div>
                </div>
                <div class="postagem-geral-linha-inferior">
                    <div class="postagem-geral-input-text">
                        <label class="formulario-label" for="descricao">Descrição</label>
                        <textarea class="formulario-textarea" id="descricao" rows="4" name="descricao"></textarea>
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