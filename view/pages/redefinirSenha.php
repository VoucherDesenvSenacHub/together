<?php require_once "../../view/components/head.php" ?>
<?php require_once "./../components/button.php" ?>
<?php require_once "./../components/input.php" ?>
<?php require_once "./../components/label.php" ?>

<div class="recuperar-conta-login-usuario hidden" id="recuperarConteudoUsuario">
    <div class="box-login-usuario">
        <form class="login-usuario">
            <button id="house-button-recuperar-usuario"><i class="fa-solid fa-house fa-xl"
                    id="house-icon-recuperar-usuario"></i></button>
            <div class="container-input-esquecer">
                <h1 class="titulo-login-usuario">Redefinir Senha</h1>
                <p class="sub-titulo-login-usuario">Informe o e-mail para o qual deseja redefinir a sua senha
                </p>

                <div class="input-esquecer-senha">
                    <?= label('email', 'Email') ?>
                    <?= inputRequired('email', 'email', 'email') ?>
                </div>
                <div class="botao-esquecer-senha">
                    <?= botao('primary', 'Redefinir Senha') ?>
                </div>
            </div>
        </form>

    </div>
    <div class="logo-login-usuario">
        <img src="/together/view/assests/images/components/Together.png" alt="logo">
    </div>
</div>