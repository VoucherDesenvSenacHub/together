<?php require_once "../../components/button.php" ?>
<?php require_once "../../../view/components/head.php"; ?>

<body>
    <?php require_once "../../../view/components/navbar.php"; ?>

    <main class="main-container">
        <?php require_once './../../components/back-button.php' ?>

        <div class="formulario-perfil">
            <form action="">
                <div class="formulario-linha-superior">
                    <?php require_once "./../../components/upload.php"?>
                    <div class="formulario-campos">
                        <label class="formulario-label" for="titulo">Título</label>
                        <input class="formulario-input" type="text" id="titulo" />

                        <label class="formulario-label" for="subtitulo">Subtítulo</label>
                        <textarea class="formulario-textarea" id="subtitulo" rows="3"></textarea>
                    </div>
                </div>

                <label class="formulario-label" for="descricao">Descrição</label>
                <textarea class="formulario-textarea" id="descricao" rows="4"></textarea>

                <div class="formulario-redes-buttons">
                    <div class="formulario-redes-sociais">
                        <div class="formulario-rede-social">
                            <img src="https://cdn-icons-png.flaticon.com/512/124/124010.png" alt="Facebook">
                            <input type="text" placeholder="@" />
                        </div>
                        <div class="formulario-rede-social">
                            <img src="https://cdn-icons-png.flaticon.com/512/174/174855.png" alt="Instagram">
                            <input type="text" placeholder="@" />
                        </div>
                        <div class="formulario-rede-social">
                            <img src="https://cdn-icons-png.flaticon.com/512/733/733579.png" alt="X">
                            <input type="text" placeholder="@" />
                        </div>
                    </div>

                    <div class="formulario-buttons">
                        <?= botao('primary', 'Salvar') ?>
                        <?= botao('secondary', 'Cancelar') ?>
                    </div>
                </div>
            </form>
        </div>
    </main>
    
<?php require_once './../../components/footer.php'?>
</body>