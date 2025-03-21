<?php require_once "../../../view/components/head.php" ?>

<body class="body-visao-usuario">
    <?php require_once "../../../view/components/navbar.php"; ?>

    <main class="main-container">

        <div class="container-visao-usuario">

            <div class="image-area-visao-usuario">
                <img class="image-usuario-visao-usuario" src="../../../view/assests/images/components/usuario-user-foto.png" alt="foto-usuario">
                <button class="botao-inativar-visao-usuario">
                    Inativar
                    <i class="fa-solid fa-trash" id="trash-icon-visao-usuario"></i>
                </button>
            </div>


            <div class="info-area-visao-usuario">

                <form action="#" method="post" class="form-area-visao-do-usuario">

                    <div class="form-visao-do-usuario">
                        <label for="nome" class="descricao">Nome</label>
                        <input class="input-visao-do-usuario" type="text" id="nome" name="nome" autocomplete="off" required
                        placeholder="xxxxxxxxxxxxx"  >
                        
                    </div>

                    <div class="form-visao-do-usuario">
                        <label for="cpf" class="descricao">CPF</label>
                        <input class="input-visao-do-usuario" type="text" id="cpf" name="cpf" autocomplete="off" required placeholder="xxx.xxx.xxx-xx">
                        <i class="fa-solid fa-file-lines"></i>
                    </div>


                    <div class="divisao-visao-do-usuario"> <!--Comeco da parte do nasc e tel -->

                        <div class="data-nasc-visao-do-usuario">
                            <label for="data" class="descricao">Data de Nascimento</label>
                            <input class="input-divisao" type="date" id="data" name="data" autocomplete="off" required placeholder="xx/xx/xxxx">
                            <i class="fa-solid fa-cake-candles"></i>

                        </div>
                    

                        <div class="tel-visao-do-usuario">
                            <label for="telefone" class="descricao">Telefone</label>
                            <input class="input-divisao" type="tel" id="telefone" name="telefone" autocomplete="off" required placeholder="+55(xx) xxxx-xxxx">
                            <i class="fa-solid fa-phone"></i>

                        </div>

                    </div> <!--término da parte do nasc e tel -->

                    <div class="form-visao-do-usuario">
                        <label for="endereco" class="descricao">Endereço</label>
                        <input class="input-visao-do-usuario" type="text" id="endereco" name="endereco" autocomplete="off" required placeholder="xxxxxxxxxx">
                        <i class="fa-solid fa-location-dot"></i>

                    </div>

                    <div class="form-visao-do-usuario">
                        <label for="email" class="descricao">Email</label>
                        <input class="input-visao-do-usuario" type="email" id="email" name="email" autocomplete="off" required placeholder="xxxxxxxxxxx">
                        <i class="fa-solid fa-envelope"></i>

                    </div>


                    
                </form>

            </div>


            <div class="confirmacao-area-visao-usuario"></div>
            
        </div>

    </main>
</body>

<!-- Tudo dentro de um Form e uma div com label e input separadas 
                    Ex: <div>
                            <label>
                            <input>
                        </div>-->