<?php require_once "../../../view/components/head.php"; ?>

<body>
    <?php require_once "../../../view/components/navbar.php"; ?>
    <main class="main-container">
        <?php require_once './../../components/back-button.php'?>
        <form action="" class="postagem-ong-geral-form" id="postagem-ong-geral-form">
            <div class="postagem-ong-geral-input-group">
                <h1 class="postagem-ong-geral-titulo-postagem">Postagem da ONG</h1>
                <p class="postagem-ong-geral-paragrafo-postagem">Mostrem ao público que seus projetos salvam vidas !!!</p>
                <p class="postagem-ong-geral-tag-obrigatorio">*Obrigatório</p>
                <ul id="postagem-ong-geral-images"></ul>
                <input class="postagem-ong-geral-input-file" id="postagem-ong-geral-file-input" type="file" accept="image/*" multiple>
                <label class="postagem-ong-geral-label-img" for="postagem-ong-geral-file-input">
                    <img class="postagem-ong-geral-label-icon" src="../../assests/images/ong/add.png" alt="icon add">
                    <p id="postagem-ong-geral-num-de-arquivos">Nenhum Arquivo Encontrado</p>
                </label>
            </div>
            <div class="postagem-ong-geral-input-group">
                <h1 class="postagem-ong-geral-titulo-postagem">Descrição</h1>
                <p class="postagem-ong-geral-paragrafo-postagem">Coloque uma descrição breve da Postagem</p>
                <p class="postagem-ong-geral-tag-obrigatorio">*Obrigatório</p>
                <div class="postagem-ong-geral-input-descricao">
                    <input class="postagem-ong-geral-input-postagem" id="postagem-ong-geral-texto" type="text" maxlength="60" required>
                    <span id="postagem-ong-geral-contador">0/60</span>
                </div>
            </div>
            <div class="postagem-ong-geral-input-group">
                <h1 class="postagem-ong-geral-titulo-postagem">Hiperlink</h1>
                <p class="postagem-ong-geral-paragrafo-postagem">Digite aqui o link de Redirecionamento da Descrição.</p>
                <p class="postagem-ong-geral-tag-obrigatorio">*Obrigatório</p>
                <input class="postagem-ong-geral-input-postagem" id="postagem-ong-geral-hyperlink" type="url" required placeholder="Digite">
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