<?php require_once "../../../view/components/head.php"; ?>
<?php require_once "../../components/button.php" ?>
<?php require_once "../../components/label.php" ?>
<?php require_once "../../components/input.php" ?>
<?php require_once "../../components/textarea.php" ?>
<?php require_once "../../components/select.php" ?>

<body>
    <?php require_once "../../../view/components/navbar.php"; ?>
    <main class="main-container">
        <div class="btn-voltar-validacao-atualizacao">
            <?php require_once './../../components/back-button.php'?>
        </div>
        <div class="formulario-perfil">

            <form action="validarAtualizacaoOng.php" method="GET">
                <div class="div-group-validacao-atualizacao">
                    <div class="div-validacao-atualizacao">
                        <?= label("nome","Nome:")?>
                        <?= input("text","nome","nome", false, true, "SAÚDE É VIDA")?>
                    </div>
                    <div class="div-validacao-atualizacao">
                        <?= label("telefone","Telefone:")?>
                        <?= input("text","telefone","telefone", false, true, "+55 (67) 99342-8593")?>
                    </div>
                    <div class="div-validacao-atualizacao">
                        <label class="label-validacao-atualizacao" for="tipo-ong">Tipo da ONG</label>
                        <?= label("tipo-ong","")?>
                        <?= select("","tipo-ong",["Erradicação da Pobreza","Fome Zero e Agricultura Sustentável","Saúde e Bem-Estar","Educação de Qualidade","Igualdade de Gênero","Água Potável e Saneamento","Energia Acessível e Limpa","Trabalho Decente e Crescimento Econômico","Indústria, Inovação e Infraestrutura","Redução das Desigualdades","Cidades e Comunidades Sustentáveis","Consumo e Produção Responsáveis","Ação contra a Mudança Global do Clima","Vida na Água","Vida Terrestre","Paz, Justiça e Instituições Eficazes","Parcerias e Meios de Implementação"], true )?>
                    </div>
                    <div class="div-validacao-atualizacao">
                        <?= label("email","E-mail:")?>
                        <?= input("email","email","email", false, true, "saudeevida@outlook.com")?>
                    </div>
                    <div class="div-validacao-atualizacao">
                        <?= label("endereco","Endereço:")?>
                        <?= input("text","endereco","endereco", false, true, "Rua Olivia 3999")?>
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
                        <?php botao("secondary","Recusar")?>
                        <?php botao("primary","Aceitar")?>
                        <button class="botao" id="validacao-atualizacao-botao-recusar" type="button">Recusar</button>
                        <button class="botao" id="validacao-atualizacao-botao-aceitar" type="button">Aceitar</button>
                    </div>
                </div>
                <dialog class="dialog-obs-validacao-atualizacao">
                    <div class="obs-validacao-atualizacao" action="validarAtualizacaoOng.php" method="POST">
                        <div class="div-fechar-validacao-atualizacao">
                            <h2 class="h2-validacao-atualizacao">Observação</h2>
                            <button class="fechar-validacao-atualizacao" id="validacao-atualizacao-botao-fechar">
                                <img class="icon-fechar-validacao-atualizacao" src="../../../view/assests/images/adm/fechar.png" alt="">
                            </button>
                        </div>
                        <textarea class="textarea-validacao-atualizacao" name="observacao-validacao-atualizacao" placeholder="Digite sua observação!" required rows="10" cols="30 ">
                        </textarea>
                        <div class="div-botao-validacao-atualizacao">
                            <button class="botao" id="validacao-atualizacao-botao-obs"  type="button">Enviar</button>
                        </div>
                    </div>
                </dialog>
            </form>
        </div>
    </main>
    <?php require_once "../../../view/components/footer.php"; ?>
</body>

</html>