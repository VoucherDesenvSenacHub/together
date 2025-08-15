<?php require_once "../../view/components/head.php" ?>
<?php require_once "./../components/button.php" ?>
<?php require_once "./../components/input.php" ?>
<?php require_once "./../components/label.php" ?>
<?php require_once "./../components/select.php" ?>

<body class="body-login">

    <div class="container-login">
        <div class="conteudo-login">

            <div class="logo-login">
                <img src="../assests/images/components/logoTogetherLogin.png" alt="logo" class="logo-imagem-login">
            </div>

            <div class="box-login">

                <form class="login" method="POST" action="">
                    <h1 class="titulo-login">Redefinir Senha</h1>

                    <div class="step active">
                        <div class="container-input-login">
                            <div>
                                <?= label('senha', 'Senha') ?>
                                <?= inputRequired('number', 'senha', 'senha') ?>
                            </div>
                            <div>
                                <?= label('confirmar_senha', 'Confirmar Senha') ?>
                                <?= inputRequired('number', 'confirmar_senha', 'confirmar_senha') ?>
                            </div>
                            <div class="botao-login group-btn-cadastro-ong">
                                <?= botao('salvar', 'Redefinir',"","login.php") ?>
                            </div>
                        </div>
                    </div>

                </form>
            </div>
        </div>
    </div>

    <script src="/together/view/assests/js/pages/cadastrarOng.js"></script>
</body>

</html>