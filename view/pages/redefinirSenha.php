<?php require_once "../../view/components/head.php" ?>
<?php require_once "./../components/button.php" ?>
<?php require_once "./../components/input.php" ?>
<?php require_once "./../components/label.php" ?>

<body class="body-login">
    <div class="container-login">
        <div class="login-icon-group">
            <?php require_once './../components/back-button.php' ?>
        </div>
        <div class="recuperar-conta-login" id="recuperarConteudoUsuario">
            <div class="box-login">
                <form class="login">
                    <div class="container-input-esquecer">
                        <h1 class="titulo-login">Redefinir Senha</h1>
                        <p class="sub-titulo-login">Informe o e-mail para o qual deseja redefinir a sua senha
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
            <div class="logo-login">
                <img src="/together/view/assests/images/components/Together.png" alt="logo">
            </div>
        </div>
    </div>
</body>

<?php require_once "../../view/components/footer.php" ?>

</html>