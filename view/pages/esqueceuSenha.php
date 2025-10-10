<?php require_once "../../view/components/head.php" ?>
<?php require_once "./../components/button.php" ?>
<?php require_once "./../components/input.php" ?>
<?php require_once "./../components/label.php" ?>

<body class="body-login">

    <div class="container-login">
        <div class="login-icon-group">
            <?php require_once './../components/back-button.php' ?>
        </div>


        <div class="conteudo-login">

            <div class="logo-login">
                <img src="../assets/images/components/logoTogetherLoginMobile.png" alt="logoMobile" class="logo-imagem-login-mobile">
                <img src="../assets/images/components/logoTogetherLogin.png" alt="logo" class="logo-imagem-login">
            </div>

            <div class="box-login">

                <form class="login" method="POST" action="">
                    <h1 class="titulo-login">Redefinir senha</h1>

                    <div class="container-input-login">
                        <div>
                            <?= label('email', 'Email') ?>
                            <?= inputRequired('email', 'email', 'email') ?>
                        </div>
                        <div class="botao-login">
                            <?= botao('salvar', 'Enviar','','login.php') ?>
                        </div>

                    </div>
                </form>
            </div>
        </div>
    </div>

</body>

<!-- <?php require_once "../../view/components/footer.php" ?> -->

</html>