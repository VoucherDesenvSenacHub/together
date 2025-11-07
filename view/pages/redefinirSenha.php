<?php require_once './../../services/AutenticacaoService.php';
AutenticacaoService::validarAcessoSemLogin();  ?>
<?php require_once "../../view/components/head.php" ?>
<?php require_once "./../components/button.php" ?>
<?php require_once "./../components/input.php" ?>
<?php require_once "./../components/label.php" ?>
<?php require_once "./../components/select.php" ?>
<?php require_once "./../components/alert.php" ?>
<?php require_once "./../../model/LoginModel.php"; ?>

<?php
// Notificacao 
if (isset($_SESSION['type'], $_SESSION['message'])) {
    showPopup($_SESSION['type'], $_SESSION['message']);
    unset($_SESSION['type'], $_SESSION['message']);
}

$token = $_GET['token'] ?? '';

if (empty($token)) {
    $_SESSION['type'] = 'erro';
    $_SESSION['message'] = "Token inválido. Solicite a redefinição novamente.";
    header("Location: /together/view/pages/login.php");
    exit;
}

$loginModel = new LoginModel();
$email = $loginModel->validarToken($token);

if (!$email) {
    $_SESSION['type'] = 'erro';
    $_SESSION['message'] = "Token expirado ou inválido. Solicite a redefinição novamente.";
    header("Location: /together/view/pages/login.php");
    exit;
}

// salva email na sessão (para o controller usar)
$_SESSION['email_redefinicao'] = $email;
?>

<body class="body-login">

    <div class="container-login">
        <div class="conteudo-login">

            <div class="logo-login">
                <img src="../assets/images/components/logoTogetherLogin.png" alt="logo" class="logo-imagem-login">
            </div>

            <div class="box-login">

                <form class="login" method="POST" action="">
                     <input type="hidden" name="token" value="<?= htmlspecialchars($token) ?>">
                    <h1 class="titulo-login">Redefinir Senha</h1>

                    <div class="step active">
                        <div class="container-input-login">
                            <div>
                                <?= label('senha', 'Senha') ?>
                                <?= inputRequired('password', 'senha', 'senha') ?>
                            </div>
                            <div>
                                <?= label('confirmar_senha', 'Confirmar Senha') ?>
                                <?= inputRequired('password', 'confirmar_senha', 'confirmar_senha') ?>
                            </div>
                            <div class="botao-login group-btn-cadastro-ong">
                                <?= botao('salvar', 'Redefinir', "", "/together/controller/RedefinirSenhaController.php") ?>
                            </div>
                        </div>
                    </div>

                </form>
            </div>
        </div>
    </div>

    <script src="/together/view/assets/js/pages/mascara.js"></script>
</body>

</html>