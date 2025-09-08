<?php require_once "../../view/components/head.php" ?>
<?php require_once "./../components/button.php" ?>
<?php require_once "./../components/input.php" ?>
<?php require_once "./../components/label.php" ?>
<?php require_once "./../components/select.php" ?>
<?php require_once "./../components/alert.php" ?>


<?php
    $usuario = [
        'nome' => '',
        'cpf' => '',
        'telefone' => '',
        'email' => '',
        'senha' => '',
        'confirmar_senha' => ''   
    ];

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
                <img src="../assests/images/components/logoTogetherLogin.png" alt="logo" class="logo-imagem-login">
            </div>

            <div class="box-login">

                <form class='login' id='criar' method="POST" action="../../controller/UsuarioCriarController.php">
                    <h1 class="titulo-login">Criar uma nova conta</h1>

                    <div class="step active">
                        <div class="container-input-login">
                            <div>
                                <?= label('nome', 'Nome') ?>
                                <?= inputRequired('text', 'nome', 'nome') ?>
                            </div>
                            <div>
                                <?= label('cpf', 'CPF') ?>
                                <?= inputRequired('text', 'cpf', 'cpf') ?>
                            </div>
                            <div>
                                <?= label('telefone', 'Telefone') ?>
                                <?= inputRequired('text', 'telefone', 'telefone') ?>
                            </div>
                            <div>
                                <?= label('email', 'E-mail') ?>
                                <?= inputRequired('email', 'email', 'email') ?>
                            </div>
                            <div class="botao-login group-btn-cadastro-ong">
                                <?= botao('next', 'Próximo','btn','','button') ?>
                            </div>
                            <div class="criar-conta-area-login">
                                <a href="login.php" class="text-login link-login">Já tem uma conta?</a>
                            </div>
                        </div>
                    </div>
                    <div class="step">
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
                                <?= botao('prev', 'Voltar', 'btn1','','button') ?>
                                <?= botao('salvar', 'Cadastre-se',"btn2",'../../controller/UsuarioCriarController.php' ,'submit') ?>
                            </div>
                        </div>
                    </div>

                </form>
            </div>
        </div>
    </div>

    <script src="/together/view/assests/js/pages/cadastrarOng.js"></script>
    <script src="/together/view/assests/js/pages/validacaoCriarUsuario.js"></script>
</body>

</html>