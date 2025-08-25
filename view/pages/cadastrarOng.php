<?php
require_once "../../view/components/head.php";
require_once "./../components/button.php";
require_once "./../components/input.php";
require_once "./../components/label.php";
require_once "./../components/select.php";
require_once "./../components/alert.php";
require_once "./../../model/CategoriaOngModel.php";

$categoriaModel = new CategoriaOngModel();
$categorias = $categoriaModel->getAll();
?>

<body class="body-login">

<?php
// Popup do session
if(isset($_SESSION['type'], $_SESSION['message'])) {
    showPopup($_SESSION['type'], $_SESSION['message']);
    unset($_SESSION['type'], $_SESSION['message']);
}
?>

<div class="container-login">
    <div class="login-icon-group"><?php require_once './../components/back-button.php'; ?></div>
    <div class="conteudo-login">
        <div class="logo-login">
            <img src="../assests/images/components/logoTogetherLogin.png" alt="logo" class="logo-imagem-login">
        </div>

        <div class="box-login">
            <form class="login" method="POST" action="/together/controller/OngController.php?action=registrar">
                <h1 class="titulo-login">Criar uma ONG</h1>

                <div class="step active">
                    <div class="container-input-login">
                        <?= label('cnpj','CNPJ') ?>
                        <?= inputRequired('text','cnpj','cnpj') ?>
                        <?= label('razao_social','Razão Social') ?>
                        <?= inputRequired('text','razao_social','razao_social') ?>
                        <?= label('telefone','Telefone') ?>
                        <?= inputRequired('text','telefone','telefone') ?>
                        <?= label('id_categoria','Categoria da ONG') ?>
                        <?= selectRequired('id_categoria','id_categoria',$categorias) ?>
                        <div class="botao-login group-btn-cadastro-ong">
                            <?= botao('next','Próximo','btn1.1','','button') ?>
                        </div>
                    </div>
                </div>

                <div class="step">
                    <div class="container-input-login">
                        <?= label('cep','CEP') ?><?= inputRequired('text','cep','cep') ?>
                        <?= label('numero','Número') ?><?= inputRequired('number','numero','numero') ?>
                        <?= label('logradouro','Logradouro') ?><?= inputRequired('text','logradouro','logradouro') ?>
                        <?= label('bairro','Bairro') ?><?= inputRequired('text','bairro','bairro') ?>
                        <?= label('estado','Estado (UF)') ?><?= inputRequired('text','estado','estado') ?>
                        <?= label('cidade','Cidade') ?><?= inputRequired('text','cidade','cidade') ?>
                        <?= label('complemento','Complemento') ?><?= inputRequired('text','complemento','complemento') ?>
                        <div class="botao-login group-btn-cadastro-ong">
                            <?= botao('prev','Voltar','btn4.1','','button') ?>
                            <?= botao('salvar','Enviar','btn4.2','','submit') ?>
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
