<?php require_once "../../view/components/head.php" ?>
<?php require_once "./../components/button.php" ?>
<?php require_once "./../components/input.php" ?>
<?php require_once "./../components/label.php" ?>
<?php require_once "./../components/select.php" ?>

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

                <form class="login" method="POST">
                    <h1 class="titulo-login">Criar uma nova conta</h1>

                    <div class="container-input-login">
                        <div>
                            <?= label('nome', 'Nome') ?>
                            <?= inputRequired('text', 'nome', 'nome') ?>
                        </div>
                        <div>
                            <?= label('cpf', 'CPF | CNPJ') ?>
                            <?= inputRequired('text', 'cpf', 'cpf') ?>
                        </div>
                        <div>
                            <?= label('telefone', 'Telefone') ?>
                            <?= inputRequired('text', 'telefone', 'telefone') ?>
                        </div>
                        <div>
                            <?= label('email', 'E-mail') ?>
                            <?= inputRequired('text', 'email', 'email') ?>
                        </div>
                        <div>
                            <?= label('senha', 'Senha') ?>
                            <?= inputRequired('number', 'senha', 'senha') ?>
                        </div>
                        <div>
                            <?= label('confirmar_senha', 'Confirmar Senha') ?>
                            <?= inputRequired('text', 'confirmar_senha', 'confirmar_senha') ?>
                        </div>
                        <div class="botao-login">
                            <?= botao('salvar', 'Cadastre-se',"","../home.php") ?>
                        </div>
                        <div class="criar-conta-area-login">
                            <a href="login.php" class="text-login link-login">Já tem uma conta?</a>
                        </div>

                    </div>
                </form>
            </div>
        </div>
    </div>

</body>

<?php require_once "../../view/components/footer.php" ?>

</html>