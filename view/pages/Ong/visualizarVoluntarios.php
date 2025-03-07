<?php require_once "../../../view/components/head.php"; ?>

<body>

    <div class="container">
        <div class="validation-area">
            <div class="area-imagem">
                <img class="imagem-perfil" src="../../../view//assests/images/Usuario/usuario-user-foto.png" alt="foto_perfil">
            </div>

            <div class="confirmacao-area">
                <h3 class="pergunta-confirmacao">Aceitar Voluntario?</h3>
                <div class="button-area">
                    <button class="validation-button" id="check-button"><i class="fa-solid fa-check"
                            id="check-icon"></i></button>
                    <button class="validation-button" id="recuse-button"><i class="fa-solid fa-xmark"
                            id="recuse-icon"></i></button>
                </div>
            </div>
        </div>

        <div class="infomation">

            <h3 class="info-title">Dados do Voluntario</h3>

            <form class="info-area">
                <div class="inputs-area">
                    <label class="label-visu-voluntarios" for="nome">Nome:</label>
                    <input class="input-visu-voluntarios" type="text" name="nome" id="nome" value="XXXXXXXXXXX" readonly>
                </div>

                <div class="inputs-area">
                    <label class="label-visu-voluntarios" id="cpf-label">CPF:</label>
                    <input class="input-visu-voluntarios" type="cpf" name="cpf" id="cpf" value="XXX.XXX.XXX-XX" readonly>
                </div>
                
                <div class="metade-input-area">

                    <div class="inputs-area">
                        <label class="label-visu-voluntarios" id="data-label">Data de Nascimento:</label>
                        <input class="input-visu-voluntarios" type="date" name="data" value="XX/XX/XXXX" readonly>
                    </div>

                    <div class="inputs-area">
                        <label class="label-visu-voluntarios" for="telefone">Telefone:</label>
                        <input class="input-visu-voluntarios" type="text" name="telefone" value="+XX (XX) XXXXXXXXXX" readonly> 
                    </div>

                </div>

                <div class="inputs-area">
                    <label class="label-visu-voluntarios" for="endereco">Endereço:</label>
                    <input class="input-visu-voluntarios" type="text" name="endereco" id="endereco-input" value="XXXXXXXXXXX" readonly>
                </div>

                <div class="inputs-area">
                    <label class="label-visu-voluntarios" for="email">Email:</label>
                    <input class="input-visu-voluntarios" type="email" name="email" value="XXXXXXXXXXX" readonly>
                </div>

            </form>
        </div>
    </div>

</body>

</html>