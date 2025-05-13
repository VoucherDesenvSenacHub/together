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
                <img src="../assests/images/components/Together.png" alt="logo" class="logo-imagem-login">
            </div>

            <div class="box-login">

                <form class="login" method="POST" action="">
                    <h1 class="titulo-login">Redefinir Senha</h1>

                    <div class="container-input-login">
                        <div>
                            <?= label('senha', 'Senha') ?>
                            <?= inputRequired('password', 'senha', 'senha') ?>
                        </div>
                        <div>
                            <?= label('confirmar_senha', 'Confirmar Senha') ?>
                            <?= inputDefault('password', 'confirmar_senha', 'confirmar_senha') ?>

                        </div>
                        <div class="botao-login">
                            <?= botao('salvar', 'Redefinir','','login.php') ?>
                        </div>

                    </div>
                </form>
            </div>
        </div>
    </div>

</body>

<?php require_once "../../view/components/footer.php" ?>

</html>