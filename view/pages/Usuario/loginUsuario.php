<?php require_once "../../../view/components/head.php" ?>
<?php require_once "./../../components/button.php" ?>
<?php require_once "./../../components/input.php" ?>
<?php require_once "./../../components/label.php" ?>

<body class="body-login-usuario">

    <div class="container-login-usuario">

        <div class="conteudo-login-usuario show" id="loginConteudoUsuario">

            <div class="logo-login-usuario">
                <img src="../../assests/images/components/Together.png" alt="logo" class="logo-imagem-login-usuario">
            </div>

            <div class="box-login-usuario">

                <form class="login-usuario">

                    <button id="house-button-login-usuario">
                        <i class="fa-solid fa-house fa-xl" id="house-icon-login-usuario"></i>
                    </button>
                    <div class="container-input-login">
                        <div class="margin-input">
                            <?= label('email', 'Email') ?>
                            <?= inputRequired('email', 'email', 'email') ?>
                        </div>
                        <div class="margin-input">
                            <?= label('senha', 'Senha') ?>
                            <?= inputRequired('password', 'senha', 'senha') ?>

                            <a href="#">
                                <p id="esqueci-senha-button" class="esqueci-senha-login-usuario">Esqueci a senha</p>
                            </a>
                        </div>
                        <div class="criar-conta-area-login-usuario">
                            <p class="pergunta-login-usuario">Nao possui uma conta?</p>
                            <button class="criar-conta-login-usuario" id="criar-conta-usuario-button">Crie uma
                                agora</button>
                        </div>

                        <div class="botao-login-usuario">
                            <?= botao('primary', 'Entrar') ?>
                        </div>
                    </div>
                </form><!--login-->
            </div><!--box-->
        </div><!--login-content-->


        <div class="recuperar-conta-login-usuario hidden" id="recuperarConteudoUsuario">
            <div class="box-login-usuario">
                <form class="login-usuario">
                    <button id="house-button-recuperar-usuario"><i class="fa-solid fa-house fa-xl"
                            id="house-icon-recuperar-usuario"></i></button>
                    <div class="container-input-esquecer">
                        <h1 class="titulo-login-usuario">Redefinir Senha</h1>
                        <p class="sub-titulo-login-usuario">Informe o e-mail para o qual deseja redefinir a sua senha
                        </p>

                        <div class="input-esquecer-senha">
                            <?= label('email', 'Email') ?>
                            <?= inputRequired('email', 'email', 'email') ?>
                        </div>
                        <div class="botao-esquecer-senha">
                            <?= botao('primary', 'Redefinir Senha') ?>
                        </div>
                    </div>
                </form>

            </div>
            <div class="logo-login-usuario">
                <img src="/together/view/assests/images/components/Together.png" alt="logo">
            </div>
        </div>



        <div class="registrar-conta-login-usuario hidden" id="registrarConteudoUsuario">
            <div class="box-login-usuario">
                <form class="registrar-box-login-usuario">
                    <button id="house-button-registrar-usuario"><i class="fa-solid fa-house fa-xl"
                            id="house-icon-registrar-usuario"></i></button>
                    <div class="input-registrar">
                        <?= label('nome', 'Nome') ?>
                        <?= inputRequired('text', 'nome', 'nome') ?>
                    </div>
                    <div class="input-registrar">
                        <?= label('cpf', 'CPF') ?>
                        <?= inputRequired('cpf', 'cpf', 'cpf') ?>
                    </div>
                    <div class="input-registrar">
                        <?= label('telefone', 'Telefone') ?>
                        <?= inputRequired('telefone', 'telefone', 'telefone') ?>
                    </div>
                    <div class="input-registrar">
                        <?= label('email', 'Email') ?>
                        <?= inputRequired('email', 'email', 'email') ?>
                    </div>
                    <div class="input-registrar">
                        <?= label('senha', 'Senha') ?>
                        <?= inputRequired('password', 'senha', 'senha') ?>
                    </div>
                    <div class="input-registrar">
                        <?= label('confirmar', 'Confirmar Senha') ?>
                        <?= inputRequired('password', 'confirmar', 'confirmar') ?>
                    </div>
                    <div class="termos-area-login-usuario">
                        <input type="checkbox" id="checkbox">
                        <p class="concordo-login-usuario">Li e concordo com os</p>
                        <a href="" class="termos-login-usuario">Termos e Condições</a>
                    </div>
                    <div class="botao-resgistar-usuario">
                        <?= botao('primary', 'Redefinir Senha') ?>
                    </div>
                </form>
            </div>
            <div class="logo-login-usuario">
                <img src="/together/view/assests/images/components/Together.png" alt="logo">
            </div>
        </div>

    </div><!--container-->

</body>

<?php require_once "../../../view/components/footer.php" ?>

</html>