<!-- NAVBAR E FOOTER ESTA FORA DO BODY -->
<!-- O CSS E O PHP ESTAO COM NOMES DE TELAS DIFERENTES, COLOCA O NOME CERTO DA TELA -->

<?php require_once "../../../view/components/head.php"; ?>
<?php require_once "../../../view/components/navbar.php"; ?>

<body class="body-visualizar-voluntarios">

    <div class="container-visualizar-voluntarios">
        <div class="validation-area-visualizar-voluntarios">
            <div class="area-imagem-visualizar-voluntarios">
                <img class="imagem-perfil-visualizar-voluntarios" src="../../../view//assests/images/Usuario/usuario-user-foto.png" alt="foto_perfil">
            </div>

            <div class="confirmacao-area-visualizar-voluntarios">
                <h3 class="pergunta-confirmacao-visualizar-voluntarios">Aceitar Voluntario?</h3>
                <div class="button-area-visualizar-voluntarios">
                    <button class="validation-button-visualizar-voluntarios" id="check-button"><i class="fa-solid fa-check"
                            id="check-icon"></i></button>
                    <button class="validation-button-visualizar-voluntarios" id="recuse-button"><i class="fa-solid fa-xmark"
                            id="recuse-icon"></i></button>
                </div>
            </div>
        </div>

        <div class="infomation-visualizar-voluntarios">

            <h3 class="info-title-visualizar-voluntarios">Dados do Voluntario</h3>

            <form class="info-area-visualizar-voluntarios">
                <div class="inputs-area-visualizar-voluntarios">
                    <label class="label-visu-voluntarios" for="nome">Nome:</label>
                    <input class="input-visu-voluntarios" type="text" name="nome" id="nome" value="XXXXXXXXXXX" readonly>
                </div>

                <div class="inputs-area-visualizar-voluntarios">
                    <label class="label-visu-voluntarios" id="cpf-label">CPF:</label>
                    <input class="input-visu-voluntarios" type="cpf" name="cpf" id="cpf" value="XXX.XXX.XXX-XX" readonly>
                </div>

                <div class="metade-input-area-visualizar-voluntarios">

                    <div class="inputs-area">
                        <label class="label-visu-voluntarios" id="data-label">Data de Nascimento:</label>
                        <input class="input-visu-voluntarios" type="date" name="data" value="XX/XX/XXXX" readonly>
                    </div>

                    <div class="inputs-area">
                        <label class="label-visu-voluntarios" for="telefone">Telefone:</label>
                        <input class="input-visu-voluntarios" type="text" name="telefone" value="+XX (XX) XXXXXXXXXX" readonly>
                    </div>

                </div>

                <div class="inputs-area-visualizar-voluntarios">
                    <label class="label-visu-voluntarios" for="endereco">Endereço:</label>
                    <input class="input-visu-voluntarios" type="text" name="endereco" id="endereco-input" value="XXXXXXXXXXX" readonly>
                </div>

                <div class="inputs-area-visualizar-voluntarios">
                    <label class="label-visu-voluntarios" for="email">Email:</label>
                    <input class="input-visu-voluntarios" type="email" name="email" value="XXXXXXXXXXX" readonly>
                </div>

            </form>
        </div>
    </div>

</body>

<?php require_once "../../../view/components/footer.php"; ?>

</html>
