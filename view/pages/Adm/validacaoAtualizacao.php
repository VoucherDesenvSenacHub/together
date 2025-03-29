<?php require_once "../../../view/components/head.php"; ?>

<body>
    <?php require_once "../../../view/components/navbar.php"; ?>
    <main class="main-container">
        <section class="section-validacao-atualizacao">
            <aside class="div-aside-validacao-atualizacao">
                <h1 class="h1-validacao-atualizacao">Atualização Cadastral</h1>
                <img class="img-validacao-atualizacao" src="\together\view\assests\images\components\togetherBlack.png" alt="">
            </aside>
            <form class="form-validacao-atualizacao" action="validarAtualizacaoOng.php" method="GET">
                <div class="div-group-validacao-atualizacao">
                    <div class="div-validacao-atualizacao">
                        <label class="label-validacao-atualizacao" for="nome">Nome</label>
                        <input class="input-validacao-atualizacao" type="text" id="nome" value="SAÚDE É VIDA" readonly/>
                    </div>
                    <div class="div-validacao-atualizacao">
                        <label class="label-validacao-atualizacao" for="telefone">Telefone</label>
                        <input class="input-validacao-atualizacao" type="text" id="telefone" value="+55 (67) 99342-8593" readonly/>
                    </div>
                    <div class="div-validacao-atualizacao">
                        <label class="label-validacao-atualizacao" for="tipo-ong">Tipo da ONG</label>
                        <input class="input-validacao-atualizacao" type="text" id="tipo-ong" value="Ex: Saúde e Bem-Estar" readonly/>
                    </div>
                    <div class="div-validacao-atualizacao">
                        <label class="label-validacao-atualizacao" for="email">Email</label>
                        <input class="input-validacao-atualizacao" type="email" id="email" value="saudeevida@outlook.com" readonly/>
                    </div>
                    <div class="div-validacao-atualizacao">
                        <label class="label-validacao-atualizacao" for="endereco">Endereço</label>
                        <input class="input-validacao-atualizacao" type="text" id="endereco" value="Rua Olivia 3999" readonly/>
                    </div>
                    <div class="div-validacao-atualizacao">
                        <span class="label-validacao-atualizacao">Conselho Fiscal</span>
                        <label class="label-validacao-atualizacao validacao-label" for="conselho-fiscal-novo">
                            <img class="validacao-atualizacao-icon" src="./../../assests/images/adm/anexo.png" alt="">
                            <p id="validacao-atualizacao-conselho-fiscal-file-novo" class="validacao-atualizacao-file"></p>
                        </label>
                        <input class="input-validacao-atualizacao validacao-file" type="file" id="conselho-fiscal-novo" accept="image/*" disabled/>
                    </div>
                    <div class="div-validacao-atualizacao">
                        <span class="label-validacao-atualizacao">Logo da ONG</span>
                        <label class="label-validacao-atualizacao validacao-label" for="logo-ong-novo" id="">
                            <img class="validacao-atualizacao-icon" src="./../../assests/images/adm/anexo.png" alt="">
                            <p id="validacao-atualizacao-logo-file-novo" class="validacao-atualizacao-file"></p>
                        </label>
                        <input class="input-validacao-atualizacao validacao-file" type="file" id="logo-ong-novo" accept="image/*"  disabled/>
                    </div>
                    <div class="div-botao-validacao-atualizacao">
                        <button class="botao" id="validacao-atualizacao-botao-recusar" type="button">Recusar</button>
                        <button class="botao" id="validacao-atualizacao-botao-aceitar" type="button">Aceitar</button>
                    </div>
                </div>
                <dialog class="dialog-obs-validacao-atualizacao">
                    <div class="obs-validacao-atualizacao" action="validarAtualizacaoOng.php" method="POST">
                        <div class="div-fechar-validacao-atualizacao">
                            <h2 class="h2-validacao-atualizacao">Observação</h2>
                            <i class="fechar-validacao-atualizacao" id="validacao-atualizacao-botao-fechar">
                                <img class="icon-fechar-validacao-atualizacao" src="../../../view/assests/images/adm/fechar.png" alt="">
                            </i>
                        </div>
                        <textarea class="textarea-validacao-atualizacao" name="observacao-validacao-atualizacao" placeholder="Digite sua observação!" required rows="10" cols="30 ">
                        </textarea>
                        <div class="div-botao-validacao-atualizacao">
                            <button class="botao" id="validacao-atualizacao-botao-obs"  type="button">Enviar</button>
                        </div>
                    </div>
                </dialog>
            </form>
        </section>
    </main>
    <?php require_once "../../../view/components/footer.php"; ?>
</body>

</html>