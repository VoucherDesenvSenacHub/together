<?php require_once "../../../view/components/head.php"; ?>

<body>
    <?php require_once "../../../view/components/navbar.php"; ?>
    <main>
        <form action="" class="criar-postagem-ong-form" id="criar-postagem-ong-form">
            <div class="criar-postagem-ong-input-group">
                <h1 class="criar-postagem-ong-titulo-postagem">Postagem da ONG</h1>
                <p class="criar-postagem-ong-paragrafo-postagem">Mostrem ao público que seus projetos salvam vidas !!!</p>
                <p class="criar-postagem-ong-tag-obrigatorio">*Obrigatório</p>
                <ul id="criar-postagem-ong-images"></ul>
                <input class="criar-postagem-ong-input-file" id="criar-postagem-ong-file-input" type="file" accept="image/*" multiple>
                <label class="criar-postagem-ong-label-img" for="criar-postagem-ong-file-input">
                    <img class="criar-postagem-ong-label-icon" src="../../assests/images/ong/add.png" alt="icon add">
                    <p id="criar-postagem-ong-num-de-arquivos">Nenhum Arquivo Encontrado</p>
                </label>
            </div>
            <div class="criar-postagem-ong-input-group">
                <h1 class="criar-postagem-ong-titulo-postagem">Descrição</h1>
                <p class="criar-postagem-ong-paragrafo-postagem">Coloque uma descrição breve da Postagem</p>
                <p class="criar-postagem-ong-tag-obrigatorio">*Obrigatório</p>
                <div class="criar-postagem-ong-input-descricao">
                    <input class="criar-postagem-ong-input-postagem" id="criar-postagem-ong-texto" type="text" maxlength="60" required placeholder="Digite">
                    <span id="criar-postagem-ong-contador">0/60</span>
                </div>
            </div>
            <div class="criar-postagem-ong-input-group">
                <h1 class="criar-postagem-ong-titulo-postagem">Hiperlink</h1>
                <p class="criar-postagem-ong-paragrafo-postagem">Digite aqui o link de Redirecionamento da Descrição.</p>
                <p class="criar-postagem-ong-tag-obrigatorio">*Obrigatório</p>
                <input class="criar-postagem-ong-input-postagem" id="criar-postagem-ong-hyperlink" type="url" required placeholder="Digite">
            </div>
            <div class="criar-postagem-ong-btn-div">
                <button class="botao salvar" type="submit">Salvar</button>
                <button class="botao cancelar" type="reset">Cancelar</button>
            </div>
        </form>
    </main>
    <?php require_once "../../../view/components/footer.php"; ?>

    <!-- Inclua o arquivo JavaScript externo -->
</body>
</html>