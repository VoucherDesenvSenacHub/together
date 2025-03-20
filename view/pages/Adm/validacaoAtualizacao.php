<?php require_once "../../../view/components/head.php"; ?>

<body>
    <?php require_once "../../../view/components/navbar.php"; ?>
    <main class="main-container">
        <section class="section-validacao-atualizacao">
        <form class="modal-validacao-atualizacao">
                <h1 class="h1-validacao-atualizacao">Nome</h1>
                <p class="p-validacao-atualizacao">MENOS FOME</p>

                <div class="div-validacao-atualizacao">
                    <label class="label-validacao-atualizacao" for="telefone">Telefone</label>
                    <input class="input-validacao-atualizacao" type="text" id="telefone" value="+55 (67) 99999-9999" />
                </div>

                <div class="div-validacao-atualizacao">
                    <label class="label-validacao-atualizacao" for="tipo-ong">Tipo da ONG</label>
                    <input class="input-validacao-atualizacao" type="text" id="tipo-ong"
                        value="Erradicação da Pobreza" />
                </div>

                <div class="div-validacao-atualizacao">
                    <label class="label-validacao-atualizacao" for="email">Email</label>
                    <input class="input-validacao-atualizacao" type="email" id="email"
                        value="menosfome@outlook.com" />
                </div>

                <div class="div-validacao-atualizacao">
                    <label class="label-validacao-atualizacao" for="endereco">Endereço</label>
                    <input class="input-validacao-atualizacao" type="text" id="endereco"
                        value="Rua Olivia 3999" />
                </div>

                <div class="div-validacao-atualizacao">
                    <label class="label-validacao-atualizacao" for="conselho-fiscal">Conselho Fiscal</label>
                    <input class="input-validacao-atualizacao" type="file" id="conselho-fiscal" />
                </div>

                <div class="div-validacao-atualizacao">
                    <label class="label-validacao-atualizacao" for="logo-ong">Logo da ONG</label>
                    <input class="input-validacao-atualizacao" type="file" id="logo-ong" />
                </div>              
                <div class="div-botao-validacao-atualizacao">
                    <button class="botao" type="button">Recusar</button>
                </div>
            </form>
            <form class="modal-validacao-atualizacao">
                <h1 class="h1-validacao-atualizacao">Nome</h1>
                <p class="p-validacao-atualizacao">SAÚDE É VIDA</p>

                <div class="div-validacao-atualizacao">
                    <label class="label-validacao-atualizacao" for="telefone">Telefone</label>
                    <input class="input-validacao-atualizacao" type="text" id="telefone" value="+55 (67) 99342-8593" />
                </div>

                <div class="div-validacao-atualizacao">
                    <label class="label-validacao-atualizacao" for="tipo-ong">Tipo da ONG</label>
                    <input class="input-validacao-atualizacao" type="text" id="tipo-ong"
                        value="Ex: Saúde e Bem-Estar" />
                </div>

                <div class="div-validacao-atualizacao">
                    <label class="label-validacao-atualizacao" for="email">Email</label>
                    <input class="input-validacao-atualizacao" type="email" id="email"
                        value="saudeevida@outlook.com" />
                </div>

                <div class="div-validacao-atualizacao">
                    <label class="label-validacao-atualizacao" for="endereco">Endereço</label>
                    <input class="input-validacao-atualizacao" type="text" id="endereco"
                        value="Rua Olivia 3999" />
                </div>

                <div class="div-validacao-atualizacao">
                    <label class="label-validacao-atualizacao" for="conselho-fiscal">Conselho Fiscal</label>
                    <input class="input-validacao-atualizacao" type="file" id="conselho-fiscal" />
                </div>

                <div class="div-validacao-atualizacao">
                    <label class="label-validacao-atualizacao" for="logo-ong">Logo da ONG</label>
                    <input class="input-validacao-atualizacao" type="file" id="logo-ong" />
                </div>  
                <div class="div-botao-validacao-atualizacao">
                    <button class="botao" type="button">Aceitar</button>
                </div>
            </form>
        </section>
    </main>
    <?php require_once "../../../view/components/footer.php"; ?>
</body>

</html>