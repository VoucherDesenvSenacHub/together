<?php require_once "../../../view/components/head.php"; ?>

<body>
    <?php require_once "../../../view/components/navbar.php"; ?>
    <main class="main-container">
        <?php require_once './../../components/back-button.php'?>
        <form action="" class="postagem-ong-geral-form" id="postagem-ong-geral-form">
            <div class="postagem-ong-geral-div-group">
                <div class="postagem-ong-geral-input-group">
                    <h2 class="postagem-ong-geral-titulo-postagem">Imagem</h2>
                    <ul id="postagem-ong-geral-images"></ul>
                    <input class="postagem-ong-geral-input-file" id="postagem-ong-geral-file-input" type="file" accept="image/*">
                    <label class="postagem-ong-geral-label-img" for="postagem-ong-geral-file-input">
                        <img class="postagem-ong-geral-label-icon" src="../../assests/images/ong/add.png" alt="icon add">
                    </label>
                </div>
            </div>
            <div class="postagem-ong-geral-div-group">
                <div class="postagem-ong-geral-input-group">
                    <h2 class="postagem-ong-geral-titulo-postagem">Título</h2>
                    <div class="postagem-ong-geral-input-titulo">
                        <input class="postagem-ong-geral-input-postagem" id="postagem-ong-geral-hyperlink" type="url" required >
                    </div>
                </div>
                <div class="postagem-ong-geral-input-group">
                    <h2 class="postagem-ong-geral-titulo-postagem">Descrição</h2>
                    <div class="postagem-ong-geral-input-descricao">
                        <textarea class="postagem-ong-geral-textarea-postagem" id="postagem-ong-geral-texto" type="text" maxlength="255" required></textarea>
                    </div>
                </div>
                <div class="postagem-ong-geral-input-group">
                    <h2 class="postagem-ong-geral-titulo-postagem">Hiperlink</h2>
                    <input class="postagem-ong-geral-input-postagem" id="postagem-ong-geral-hyperlink" type="url" required >
                </div>
            </div>
            <div class="postagem-ong-geral-btn-div">
                <button class="botao salvar" type="submit">Salvar</button>
                <button class="botao cancelar" type="reset">Cancelar</button>
            </div>
        </form>
    </main>
    <?php require_once "../../../view/components/footer.php"; ?>

    <!-- Inclua o arquivo JavaScript externo -->
</body>
</html>