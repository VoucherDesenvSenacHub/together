<?php require_once "../../view/components/head.php" ?>
<?php require_once "./../components/button.php" ?>
<?php require_once "./../components/input.php" ?>
<?php require_once "./../components/label.php" ?>
<?php require_once "./../components/select.php" ?>
<?php require_once "./../components/alert.php" ?>

<?php
if (isset($_SESSION['type'], $_SESSION['message'])) {
    showPopup($_SESSION['type'], $_SESSION['message']);
    unset($_SESSION['type'], $_SESSION['message']);
}

if (!isset($_SESSION['step'])) {
    $_SESSION['step'] = 1;
}
?>

<body class="body-login">

    <div class="container-login">
        <div class="login-icon-group">
            <?php $_SESSION['step'] === 2 ? '' : require_once './../components/back-button.php' ?>
        </div>

        <div class="conteudo-login">

            <div class="logo-login">
                <img src="../assests/images/components/logoTogetherLogin.png" alt="logo" class="logo-imagem-login">
            </div>

            <div class="box-login">

                <form class='login' id='criar' method="POST" action="../../controller/UsuarioCriarController.php">
                    <h1 class="titulo-login">Criar uma nova conta</h1>

                    <?php if ($_SESSION['step'] === 1): ?>
                        <div class="step active">
                            <div class="container-input-login">
                                <div>
                                    <?= label('nome', 'Nome') ?>
                                    <?= inputRequired('text', 'nome', 'nome', $_SESSION['nome']) ?>
                                </div>
                                <div>
                                    <?= label('cpf', 'CPF') ?>
                                    <?= inputRequired('text', 'cpf', 'cpf', $_SESSION['cpf']) ?>
                                </div>
                                <div>
                                    <?= label('telefone', 'Telefone') ?>
                                    <?= inputRequired('text', 'telefone', 'telefone', $_SESSION['telefone']) ?>
                                </div>
                                <div>
                                    <?= label('email', 'E-mail') ?>
                                    <?= inputRequired('email', 'email', 'email', $_SESSION['email']) ?>
                                </div>
                                <div class="botao-login group-btn-cadastro-ong">
                                    <?= botao('next', 'Próximo', name: 'step_action', value: 'next', formaction: '../../controller/UsuarioCriarContaController.php') ?>
                                </div>
                                <div class="criar-conta-area-login">
                                    <a href="login.php" class="text-login link-login">Já tem uma conta?</a>
                                </div>
                            </div>
                        </div>
                    <?php endif; ?>

                    <?php if ($_SESSION['step'] === 2): ?>
                        <div class="step active">
                            <div class="container-input-login">
                                <div>
                                    <?= label('senha', 'Senha') ?>
                                    <?= inputRequired('text', 'senha', 'senha') ?>
                                </div>
                                <div>
                                    <?= label('confirmar_senha_nova_conta', 'Confirmar Senha') ?>
                                    <?= inputRequired('text', 'confirmar_senha_nova_conta', 'confirmar_senha') ?>
                                </div>
                                <div class="botao-login group-btn-cadastro-ong">
                                    <?= botaoFormNoValide('prev', 'Voltar', name: 'step_action', value: 'prev', formaction: '../../controller/UsuarioCriarContaController.php') ?>
                                    <?= botao('salvar', 'Cadastre-se', name: 'step_action', value: 'salvar', formaction: '../../controller/UsuarioCriarContaController.php') ?>
                                </div>
                            </div>
                        </div>
                    <?php endif; ?>

                </form>
            </div>
        </div>
    </div>

    <script src="/together/view/assests/js/pages/mascara.js"></script>
    <script src="/together/view/assests/js/pages/validacaoCriarUsuario.js"></script>
</body>

</html>