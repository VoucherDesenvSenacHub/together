<?php require_once "../../view/components/head.php" ?>
<?php require_once "./../components/button.php" ?>
<?php require_once "./../components/input.php" ?>
<?php require_once "./../components/label.php" ?>
<?php require_once "./../components/alert.php" ?>

<?php
// Pega a mensagem de erro e já limpa a sessão
$erro = $_SESSION['erro'] ?? '';

if (isset($_SESSION['erro'], $erro)) {
    showPopup($_SESSION['erro'], $erro);
    unset($_SESSION['erro'], $erro);
}


?>

<body class="body-login">

    <div class="container-login">
        <div class="login-icon-group">
            <?php require_once './../components/back-button.php' ?>
        </div>


        <div class="conteudo-login">

            <div class="logo-login">
                <img src="../assests/images/components/logoTogetherLoginMobile.png" alt="logoMobile"
                    class="logo-imagem-login-mobile">
                <img src="../assests/images/components/logoTogetherLogin.png" alt="logo" class="logo-imagem-login">
            </div>

            <div class="box-login">

                <form class="login" method="POST">
                    <h1 class="titulo-login">Entrar no Together</h1>

                    <div class="container-input-login">
                        <div>
                            <?= label('email', 'Email') ?>
                            <?= inputRequired('email', 'email', 'email') ?>
                        </div>
                        <div>
                            <?= label('senha', 'Senha') ?>
                            <?= inputRequired('password', 'senha', 'senha') ?>

                        </div>
                        <div class="botao-login">
                            <?= botao('salvar', 'Entrar', '', "./../../controller/Entrar.php", "submit") ?>
                        </div>
                        <div class="criar-conta-area-login">
                            <a href="esqueceuSenha.php" class="text-login link-login">Esqueceu a senha?</a>
                            <p class="text-login">Não possui uma conta? <a href="criarConta.php"
                                    class="text-login link-login">Criar nova conta</a> </p>
                        </div>

                    </div>
                </form>
            </div>
        </div>
    </div>
</body>

<!-- <?php require_once "../../view/components/footer.php" ?> -->

</html>