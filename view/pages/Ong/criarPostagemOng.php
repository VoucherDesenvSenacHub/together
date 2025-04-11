<?php require_once "../../../view/components/head.php"; ?>
<?php require_once "../../components/button.php" ?>

<body>
    <?php require_once "../../../view/components/navbar.php"; ?>

    <main class="main-container">
        <?php require_once './../../components/back-button.php' ?>

        <div class="formulario-perfil">
            <form action="">
                <div class="formulario-linha-superior">
                    <?php require_once "./../../components/upload.php" ?>
                    <div class="formulario-campos">
                        <label class="formulario-label" for="titulo">Título</label>
                        <input class="formulario-input" type="text" id="titulo" required/>

                        <label class="formulario-label" for="link">Link</label>
                        <input class="formulario-input" id="link" required>
                    </div>
                </div>

                <label class="formulario-label" for="descricao">Descrição</label>
                <textarea class="formulario-textarea" id="descricao" rows="4"></textarea>

                <div class="postagem-geral-btn-group">
                    <?= botao('primary', 'Salvar') ?>
                    <?= botao('secondary', 'Cancelar') ?>
                </div>
            </form>
        </div>
    </main>


</body>