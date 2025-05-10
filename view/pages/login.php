<?php require_once "../../view/components/head.php" ?>
<?php require_once "./../components/button.php" ?>
<?php require_once "./../components/input.php" ?>
<?php require_once "./../components/label.php" ?>

<body class="body-login-usuario">

    <div class="container-login-usuario">
        <div class="login-icon-group">
            <?php require_once './../components/back-button.php'?>
        </div>


        <div class="conteudo-login-usuario show" id="loginConteudoUsuario">

            <div class="logo-login-usuario">
                <img src="../assests/images/components/Together.png" alt="logo" class="logo-imagem-login-usuario">
            </div>

            <div class="box-login-usuario">

                <form class="login-usuario">

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
    </div><!--container-->

</body>

<?php require_once "../../view/components/footer.php" ?>

</html>