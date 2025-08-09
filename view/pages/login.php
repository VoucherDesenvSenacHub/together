<?php require_once "../../view/components/head.php" ?>
<?php require_once "./../components/button.php" ?>
<?php require_once "./../components/input.php" ?>
<?php require_once "./../components/label.php" ?>

<?php
require_once "./../../model/LoginModel.php";

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $emailForm = trim($_POST['emailForm'] ?? '');
    $senhaForm = trim($_POST['senhaForm'] ?? '');
    $erro = "";

    if (!empty($emailForm) && !empty($senhaForm)) {
        $loginModel = new LoginModel();
        $usuario = $loginModel->LoginModelUsuario($emailForm, $senhaForm);

        if ($usuario) {
            // Guarda informações do usuário na sessão
            $_SESSION['email'] = $usuario['email'];
            $_SESSION['perfil'] = $usuario['perfil'];
            header('Location: ./index.php', true);
            exit();
        } else {
            // Login inválido
            $_SESSION['erro_login'] = "Email ou senha incorretos";
            $erro = "Email ou senha incorretos";
            header('Location: ./login.php', true);
            exit();
        }
    } else {
        $_SESSION['erro_login'] = "Preencha todos os campos";
        $erro = "Campos estão vazios";
        header('Location: ./login.php', true);
        exit();
    }
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
                            <?= inputRequired('email', 'email', 'emailForm') ?>
                        </div>
                        <div>
                            <?= label('senha', 'Senha') ?>
                            <?= inputRequired('password', 'senha', 'senhaForm') ?>

                        </div>
                        <?php if (!empty($erro)): ?>
                            <span class="mensagem-erro"><?php echo $erro; ?></span>
                        <?php endif ?>
                        <div class="botao-login">
                            <?= botao('salvar', 'Entrar', '', "", "submit") ?>
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