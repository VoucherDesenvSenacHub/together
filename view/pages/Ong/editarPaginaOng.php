<?php require_once "../../components/head.php"; ?>
<?php require_once "../../components/button.php" ?>
<?php require_once "../../components/label.php" ?>
<?php require_once "../../components/input.php" ?>
<?php require_once "../../components/textarea.php" ?>

<body>
    <?php require_once "../../../view/components/navbar.php"; ?>

    <main class="main-container">
        <?php require_once './../../components/back-button.php' ?>

        <div class="div-wrap-width">
            <h1 class="titulo-pagina">Editar Página</h1>
            <div class="formulario-perfil">
                <form action="">
                    <div class="formulario-linha-superior">
                        <div class='formulario-imagem-preview'>
                            <?php require_once "./../../components/upload.php" ?>
                        </div>
                        <div class="formulario-campos">
                            <div>
                                <?= label("titulo", "Título") ?>
                                <?= inputRequired("text", "titulo", "titulo") ?>
                            </div>

                            <div>
                                <?= label("subtitulo", "Subtítulo") ?>
                                <?= textareaRequired("subtitulo", "subtitulo") ?>
                            </div>
                        </div>
                    </div>
                    <?= label("descricao", "Descrição") ?>
                    <?= textareaRequired("descricao", "descricao") ?>
                    <div class="formulario-redes-buttons">
                        <div class="formulario-redes-sociais">
                            <div class="formulario-rede-social">
                                <img src="/together/view/assests/images/Adm/facebook.png" alt="Facebook">
                                <input type="text" placeholder="@" />
                            </div>
                            <div class="formulario-rede-social">
                                <img src="/together/view/assests/images/Adm/instagram.png" alt="Instagram">
                                <input type="text" placeholder="@" />
                            </div>
                            <div class="formulario-rede-social">
                                <img src="/together/view/assests/images/Adm/X.png" alt="X">
                                <input type="text" placeholder="@" />
                            </div>
                        </div>
                        <div class="formulario-buttons">
                            <div class="postagem-geral-btn "><?= botao('salvar', 'Salvar') ?></div>
                            <div class="postagem-geral-btn "><?= botao('cancelar', 'Cancelar') ?></div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </main>

    <?php require_once './../../components/footer.php' ?>
</body>