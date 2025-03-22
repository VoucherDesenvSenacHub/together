    <?php require_once "../../../view/components/head.php"; ?>

<body>
    <?php require_once "../../../view/components/navbar.php"; ?>
    <main class="main-container">
        <section class="section-validacao-atualizacao">
            <form class="form-validacao-atualizacao">
                <h1 class="h1-validacao-atualizacao">Antigo</h1>

                <div class="div-validacao-atualizacao">
                    <label class="label-validacao-atualizacao" for="nome">Nome</label>
                    <input class="input-validacao-atualizacao" type="text" id="nome" 
                        value="SAÚDE É VIDA" readonly/>
                </div>

                <div class="div-validacao-atualizacao">
                    <label class="label-validacao-atualizacao" for="telefone">Telefone</label>
                    <input class="input-validacao-atualizacao" type="text" id="telefone" 
                        value="+55 (67) 99342-8593" readonly/>
                </div>

                <div class="div-validacao-atualizacao">
                    <label class="label-validacao-atualizacao" for="tipo-ong">Tipo da ONG</label>
                    <input class="input-validacao-atualizacao" type="text" id="tipo-ong"
                        value="Ex: Saúde e Bem-Estar" readonly/>
                </div>

                <div class="div-validacao-atualizacao">
                    <label class="label-validacao-atualizacao" for="email">Email</label>
                    <input class="input-validacao-atualizacao" type="email" id="email"
                        value="saudeevida@outlook.com" readonly/>
                </div>

                <div class="div-validacao-atualizacao">
                    <label class="label-validacao-atualizacao" for="endereco">Endereço</label>
                    <input class="input-validacao-atualizacao" type="text" id="endereco"
                        value="Rua Olivia 3999" readonly/>
                </div>

                <div class="div-validacao-atualizacao">
                    <span class="label-validacao-atualizacao">Conselho Fiscal</span>
                    <label class="label-validacao-atualizacao validacao-label" for="conselho-fiscal-antigo"> 
                        <img class="validacao-atualizacao-icon" src="./../../assests/images/adm/anexo.png" alt=""> 
                        <p id="validacao-atualizacao-conselho-fiscal-file-antigo" class="validacao-atualizacao-file"></p>
                    </label>
                    <input class="input-validacao-atualizacao validacao-file" type="file" id="conselho-fiscal-antigo" accept="image/*" readonly/>
                </div>

                <div class="div-validacao-atualizacao">
                    <span class="label-validacao-atualizacao">Logo da ONG</span>
                    <label class="label-validacao-atualizacao validacao-label" for="logo-ong-antigo" id=""> 
                        <img class="validacao-atualizacao-icon" src="./../../assests/images/adm/anexo.png" alt=""> 
                        <p id="validacao-atualizacao-logo-file-antigo" class="validacao-atualizacao-file"></p>
                    </label>
                    <input class="input-validacao-atualizacao validacao-file" type="file" id="logo-ong-antigo" accept="image/*" readonly/>
                </div>  
                <div class="div-botao-validacao-atualizacao">
                    <button class="botao" id="validacao-atualizacao-botao-aceitar"  type="button">Aceitar</button>
                </div>
            </form>
            <form class="form-validacao-atualizacao">
                <h1 class="h1-validacao-atualizacao">Novo</h1>

                <div class="div-validacao-atualizacao">
                    <label class="label-validacao-atualizacao" for="nome">Nome</label>
                    <input class="input-validacao-atualizacao" type="text" id="nome" 
                        value="SAÚDE É VIDA" readonly/>
                </div>

                <div class="div-validacao-atualizacao">
                    <label class="label-validacao-atualizacao" for="telefone">Telefone</label>
                    <input class="input-validacao-atualizacao" type="text" id="telefone" 
                        value="+55 (67) 99342-8593" readonly/>
                </div>

                <div class="div-validacao-atualizacao">
                    <label class="label-validacao-atualizacao" for="tipo-ong">Tipo da ONG</label>
                    <input class="input-validacao-atualizacao" type="text" id="tipo-ong"
                        value="Ex: Saúde e Bem-Estar" readonly/>
                </div>

                <div class="div-validacao-atualizacao">
                    <label class="label-validacao-atualizacao" for="email">Email</label>
                    <input class="input-validacao-atualizacao" type="email" id="email"
                        value="saudeevida@outlook.com" readonly/>
                </div>

                <div class="div-validacao-atualizacao">
                    <label class="label-validacao-atualizacao" for="endereco">Endereço</label>
                    <input class="input-validacao-atualizacao" type="text" id="endereco"
                        value="Rua Olivia 3999" readonly/>
                </div>

                <div class="div-validacao-atualizacao">
                    <span class="label-validacao-atualizacao">Conselho Fiscal</span>
                    <label class="label-validacao-atualizacao validacao-label" for="conselho-fiscal-novo"> 
                        <img class="validacao-atualizacao-icon" src="./../../assests/images/adm/anexo.png" alt=""> 
                        <p id="validacao-atualizacao-conselho-fiscal-file-novo" class="validacao-atualizacao-file"></p>
                    </label>
                    <input class="input-validacao-atualizacao validacao-file" type="file" id="conselho-fiscal-novo" accept="image/*" readonly/>
                </div>

                <div class="div-validacao-atualizacao">
                    <span class="label-validacao-atualizacao">Logo da ONG</span>
                    <label class="label-validacao-atualizacao validacao-label" for="logo-ong-novo" id=""> 
                        <img class="validacao-atualizacao-icon" src="./../../assests/images/adm/anexo.png" alt=""> 
                        <p id="validacao-atualizacao-logo-file-novo" class="validacao-atualizacao-file"></p>
                    </label>
                    <input class="input-validacao-atualizacao validacao-file" type="file" id="logo-ong-novo" accept="image/*" readonly/>
                </div>  
                <div class="div-botao-validacao-atualizacao">
                    <button class="botao" id="validacao-atualizacao-botao-aceitar"  type="button">Aceitar</button>
                </div>
            </form>
        </section>
    </main>
    <?php require_once "../../../view/components/footer.php"; ?>
</body>

</html>