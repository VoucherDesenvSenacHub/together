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
                        <div class="form-group-v_d_u">
                            <i class="fa-solid fa-user"></i>
                            <input type="text" id="nome" name="nome" autocomplete="off" disabled placeholder="xxxxxxxxxxxx">
                        </div>
                    </div>
                    
                    <div class="form-visao-do-usuario">
                        <label for="cpf" class="descricao">CPF</label>
                        <div class="form-group-v_d_u">
                            <i class="fa-solid fa-id-card"></i>
                            <input type="text" id="cpf" name="cpf" autocomplete="off" disabled placeholder="xxx.xxx.xxx-xx">
                        </div>
                    </div>

                    <div class="divisao-visao-do-usuario">
                        <div class="data-nasc-visao-do-usuario">
                            <label for="data" class="descricao">Data de Nascimento</label>
                            <div class="form-group-v_d_u">
                                <i class="fa-solid fa-cake-candles"></i>
                                <input type="text" id="data" name="data" autocomplete="off" placeholder="xx/xx/xxxx" disabled>
                            </div>
                        </div>

                        <div class="tel-visao-do-usuario">
                            <label for="telefone" class="descricao">Telefone</label>
                            <div class="form-group-v_d_u">
                                <i class="fa-solid fa-phone"></i>
                                <input type="tel" id="telefone" name="telefone" autocomplete="off"  disabled placeholder="+55 (xx)xxxx-xxxx">
                            </div>
                        </div>
                    </div>

                    <div class="form-visao-do-usuario">
                        <label for="endereco" class="descricao">Endereço</label>
                        <div class="form-group-v_d_u">
                            <i class="fa-solid fa-location-dot"></i>
                            <input type="text" id="endereco" name="endereco" autocomplete="off" disabled placeholder="xxxxxxxxxx">
                        </div>
                    </div>

                    <div class="form-visao-do-usuario">
                        <label for="email" class="descricao">Email</label>
                        <div class="form-group-v_d_u">
                            <i class="fa-solid fa-envelope"></i>
                            <input type="text" id="email" name="email" autocomplete="off" disabled placeholder="xxxxxxxxxxx">
                        </div>
                    </div>
                </form>
            </div>


            <!-- <div class="confirmacao-area-visao-usuario"></div> -->
            
        </div>

    </main>
</body>
