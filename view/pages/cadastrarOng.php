<?php require_once "../../view/components/head.php" ?>
<?php require_once "./../components/button.php" ?>
<?php require_once "./../components/input.php" ?>
<?php require_once "./../components/label.php" ?>
<?php require_once "./../components/select.php" ?>
<?php require_once "./../../model/CategoriaOngModel.php";
?>
<?php
$categoriaModel = new CategoriaOngModel();
$categorias = $categoriaModel->getAll();
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

                <form class="login" method="POST" action="">
                    <h1 class="titulo-login">Criar uma ONG</h1>
                    <div class="step active">
                        <div class="container-input-login">
                            <div>
                                <?= label('cnpj', 'CNPJ') ?>
                                <?= inputRequired('text', 'cnpj', 'cnpj') ?>
                            </div>
                            <div>
                                <?= label('email', 'E-mail') ?>
                                <?= inputRequired('text', 'email', 'email') ?>
                            </div>
                            <div>
                                <?= label('telefone', 'Telefone') ?>
                                <?= inputRequired('text', 'telefone', 'telefone') ?>
                            </div>
                            <div class="botao-login group-btn-cadastro-ong">
                                <?= botao('next', 'Próximo', 'btn1.1', '', 'button') ?>
                            </div>
                            <div class="criar-conta-area-login">
                                <a href="login.php" class="text-login link-login">Já tem uma conta?</a>
                            </div>
                        </div>
                    </div>
                    <div class="step">
                        <div class="container-input-login">
                            <div>
                                <?= label('razao_social', 'Razão Social') ?>
                                <?= inputRequired('text', 'razao_social', 'razao_social') ?>
                            </div>

                            <div>
                                <?= label('id_categoria', 'Categoria da ONG') ?>
                                <?= selectRequired('id_categoria', 'id_categoria', $categorias) ?>
                            </div>

                            <div class="botao-login group-btn-cadastro-ong">
                                <?= botao('prev', 'Voltar', 'btn2.1', '', 'button') ?>
                                <?= botao('next', 'Próximo', 'btn2.2', '', 'button') ?>
                            </div>
                        </div>
                    </div>
                    <div class="step">
                        <div class="container-input-login">
                            <div class="cadastrar-ong-row-endereco">
                                <div>
                                    <?= label('cep', 'CEP') ?>
                                    <?= inputRequired('text', 'cep', 'cep') ?>
                                </div>
                                <div>
                                    <?= label('numero', 'Número') ?>
                                    <?= inputRequired('number', 'numero', 'numero') ?>
                                </div>
                            </div>
                            <div>
                                <?= label('logradouro', 'Logradouro') ?>
                                <?= inputRequired('text', 'logradouro', 'logradouro') ?>
                            </div>

                            <div>
                                <?= label('bairro', 'Bairro') ?>
                                <?= inputRequired('text', 'bairro', 'bairro') ?>
                            </div>
                            <div class="cadastrar-ong-row-endereco">
                                <div>
                                    <?= label('estado', 'Estado (UF)') ?>
                                    <?= inputRequired('text', 'estado', 'estado') ?>
                                </div>
                                <div>
                                    <?= label('cidade', 'Cidade') ?>
                                    <?= inputRequired('text', 'cidade', 'cidade') ?>
                                </div>
                            </div>
                            <div>
                                <?= label('complemento', 'Complemento') ?>
                                <?= inputRequired('text', 'complemento', 'complemento') ?>
                            </div>
                            <div class="botao-login group-btn-cadastro-ong">
                                <?= botao('prev', 'Voltar', 'btn4.1', '', 'button') ?>
                                <?= botao('salvar', 'Enviar', 'btn4.2', '/together/view/pages/login.php') ?>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>

</html>