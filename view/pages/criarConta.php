<?php require_once "../../view/components/head.php" ?>
<?php require_once "./../components/button.php" ?>
<?php require_once "./../components/input.php" ?>
<?php require_once "./../components/label.php" ?>

<div class="registrar-conta-login-usuario hidden" id="registrarConteudoUsuario">
            <div class="box-login-usuario">
                <form class="registrar-box-login-usuario">
                    <button id="house-button-registrar-usuario"><i class="fa-solid fa-house fa-xl"
                            id="house-icon-registrar-usuario"></i></button>
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
                    <div class="termos-area-login-usuario">
                        <input type="checkbox" id="checkbox">
                        <p class="concordo-login-usuario">Li e concordo com os</p>
                        <a href="" class="termos-login-usuario">Termos e Condições</a>
                    </div>
                    <div class="botao-resgistar-usuario">
                        <?= botao('primary', 'Redefinir Senha') ?>
                    </div>
                </form>
            </div>
            <div class="logo-login-usuario">
                <img src="/together/view/assests/images/components/Together.png" alt="logo">
            </div>
        </div>
