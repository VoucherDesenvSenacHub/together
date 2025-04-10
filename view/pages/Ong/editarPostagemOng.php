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
                        <label class="form-label" for="titulo">Título</label>
                        <input class="form-input" type="text" id="titulo" />

                        <label class="form-label" for="link">Link</label>
                        <input class="form-input" id="link"></input>
                    </div>
                </div>

                <label class="form-label" for="descricao">Descrição</label>
                <textarea class="form-textarea" id="descricao" rows="4"></textarea>

                    <div class="formulario-buttons">
                        <button class="botao salvar" type="submit">Salvar</button>
                        <button class="botao cancelar" type="reset">Cancelar</button>
                    </div>
                </div>
            </form>
        </div>
    </main>
    

</body>