<?php require_once "../../../view/components/head.php"; ?>

<body>
    <?php require_once "../../../view/components/navbar.php"; ?>
    <main>
        <form action="" class="criar-postagem-ong-form">
            <div class="criar-postagem-ong-input-group">
                <h1 class="criar-postagem-ong-titulo-postagem">Postagem da ONG</h1>
                <p class="criar-postagem-ong-paragrafo-postagem">Mostrem ao público que seus projetos salvam vidas !!!</p>
                <p class="criar-postagem-ong-tag-obrigatorio">*Obrigatorio</p>
                <ul id="images">
                    <li>
                        <input class="criar-postagem-ong-input-file" id="file-input" type="file" accept="image/*" onchange="preview()"
                            multiple>
                        <label class="criar-postagem-ong-label-img" for="file-input">
                            <img class="criar-postagem-ong-label-icon" src="assets/img/add.png" alt="icon add">
                            <p id="num-de-arquivos">Nenhum Arquivo Encontrado</p>
                        </label>
                    </li>
                </ul>
            </div>
            <div class="criar-postagem-ong-input-group">
                <h1 class="criar-postagem-ong-titulo-postagem">Descrição</h1>
                <p class="criar-postagem-ong-paragrafo-postagem">Coloque uma descrição breve da Postagem</p>
                <p class="criar-postagem-ong-tag-obrigatorio">*Obrigatorio</p>
                <div class="criar-postagem-ong-input-descricao">
                    <input class="criar-postagem-ong-input-postagem" id="texto" type="text" size=10 maxlength=255 required
                        placeholder="Digite">
                    <span id="contador"></span>
                </div>
            </div>
            <div class="criar-postagem-ong-input-group">
                <h1 class="criar-postagem-ong-titulo-postagem">Hiperlink</h1>
                <p class="criar-postagem-ong-paragrafo-postagem">Digite aqui o link de Redirecionamento da Descrição.</p>
                <p class="criar-postagem-ong-tag-obrigatorio">*Obrigatorio</p>
                <input class="criar-postagem-ong-input-postagem" type="url" size=10 maxlength=255 required placeholder="Digite">
            </div>
            <div class="criar-postagem-ong-btn-div">
                <button class="criar-postagem-ong-botao salvar" type="submit">Salvar</button>
                <button class="criar-postagem-ong- cancelar" type="reset">Cancelar</button>
            </div>
        </form>
    </main>
    <?php require_once "../../../view/components/footer.php"; ?>
</body>