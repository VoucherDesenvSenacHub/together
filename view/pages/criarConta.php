<?php require_once "../../view/components/head.php" ?>
<?php require_once "./../components/button.php" ?>
<?php require_once "./../components/input.php" ?>
<?php require_once "./../components/label.php" ?>

<body class="body-login">
    <div class="container-login">
        <div class="login-icon-group">
            <?php require_once './../components/back-button.php' ?>
        </div>
        <div class="registrar-conta-login" id="registrarConteudoUsuario">
            <div class="box-login">
                <form class="registrar-box-login">
                    <div class="input-registrar">
                        <?= label('nome', 'Nome') ?>
                        <?= inputRequired('text', 'nome', 'nome') ?>
                    </div>
                    <div class="input-registrar">
                        <?= label('cpf', 'CPF') ?>
                        <?= inputRequired('cpf', 'cpf', 'cpf') ?>
                    </div>
                    <div class="input-registrar">
                        <?= label('telefone', 'Telefone') ?>
                        <?= inputRequired('telefone', 'telefone', 'telefone') ?>
                    </div>
                    <div class="input-registrar">
                        <?= label('email', 'Email') ?>
                        <?= inputRequired('email', 'email', 'email') ?>
                    </div>
                    <div class="input-registrar">
                        <?= label('senha', 'Senha') ?>
                        <?= inputRequired('password', 'senha', 'senha') ?>
                    </div>
                    <div class="input-registrar">
                        <?= label('confirmar', 'Confirmar Senha') ?>
                        <?= inputRequired('password', 'confirmar', 'confirmar') ?>
                    </div>
                    <div class="termos-area-login">
                        <input type="checkbox" id="checkbox">
                        <p class="concordo-login">Li e concordo com os</p>
                        <a href="" class="termos-login">Termos e Condições</a>
                    </div>
                    <div class="botao-resgistar">
                        <?= botao('primary', 'Redefinir Senha') ?>
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