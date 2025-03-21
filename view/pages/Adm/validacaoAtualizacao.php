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
                        value="MENOS FOME" readonly/>
                </div>

                <div class="div-validacao-atualizacao">
                    <label class="label-validacao-atualizacao" for="telefone">Telefone</label>
                    <input class="input-validacao-atualizacao" type="text" id="telefone" 
                        value="+55 (67) 99999-9999" readonly/>
                </div>

                <div class="div-validacao-atualizacao">
                    <label class="label-validacao-atualizacao" for="tipo-ong">Tipo da ONG</label>
                    <input class="input-validacao-atualizacao" type="text" id="tipo-ong" 
                        value="Erradicação da Pobreza" readonly/>
                </div>

                <div class="div-validacao-atualizacao">
                    <label class="label-validacao-atualizacao" for="email">Email</label>
                    <input class="input-validacao-atualizacao" type="email" id="email"
                        value="menosfome@outlook.com" readonly/>
                </div>

                <div class="div-validacao-atualizacao">
                    <label class="label-validacao-atualizacao" for="endereco">Endereço</label>
                    <input class="input-validacao-atualizacao" type="text" id="endereco"
                        value="Rua Olivia 3999" readonly/>
                </div>

                <div class="div-validacao-atualizacao">
                    <span class="label-validacao-atualizacao">Conselho Fiscal</span>
                    <label class="label-validacao-atualizacao validacao-label" for="conselho-fiscal-antigo"> <img class="validacao-atualizacao-icon" src="./../../assests/images/adm/anexo.png" alt=""> </label>
                    <input class="input-validacao-atualizacao validacao-file" type="file" id="conselho-fiscal-antigo" readonly/>
                </div>

                <div class="div-validacao-atualizacao">
                    <span class="label-validacao-atualizacao">Logo da ONG</span>
                    <label class="label-validacao-atualizacao validacao-label" for="logo-ong-antigo"> <img class="validacao-atualizacao-icon" src="./../../assests/images/adm/anexo.png" alt=""> </label>
                    <input class="input-validacao-atualizacao validacao-file" type="file" id="logo-ong-antigo" readonly/>
                </div>             
                <div class="div-botao-validacao-atualizacao">
                    <button class="botao" type="button">Recusar</button>
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
                    <label class="label-validacao-atualizacao validacao-label" for="conselho-fiscal-novo"> <img class="validacao-atualizacao-icon" src="./../../assests/images/adm/anexo.png" alt=""> </label>
                    <input class="input-validacao-atualizacao validacao-file" type="file" id="conselho-fiscal-novo" readonly/>
                </div>

                <div class="div-validacao-atualizacao">
                    <span class="label-validacao-atualizacao">Logo da ONG</span>
                    <label class="label-validacao-atualizacao validacao-label" for="logo-ong-novo"> <img class="validacao-atualizacao-icon" src="./../../assests/images/adm/anexo.png" alt=""> </label>
                    <input class="input-validacao-atualizacao validacao-file" type="file" id="logo-ong-novo" readonly/>
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