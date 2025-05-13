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
                            <?= label('cep', 'CEP') ?>
                            <?= inputRequired('text', 'cep', 'cep') ?>
                        </div>
                        <div>
                            <?= label('logradouro', 'Logradouro') ?>
                            <?= inputRequired('text', 'logradouro', 'logradouro') ?>
                        </div>
                        <div>
                            <?= label('bairro', 'Bairro') ?>
                            <?= inputRequired('text', 'bairro', 'bairro') ?>
                        </div>
                        <div>
                            <?= label('numero', 'Número') ?>
                            <?= inputRequired('number', 'numero', 'numero') ?>
                        </div>
                        <div>
                            <?= label('complemento', 'Complemento') ?>
                            <?= inputRequired('text', 'complemento', 'complemento') ?>
                        </div>
                        <div class="div-input-login">
                            <div class="input-login">
                                <?= label('cidade', 'Cidade') ?>
                                <?= inputRequired('text', 'cidade', 'cidade') ?>
                            </div>
                            <div class="input-login">
                                <?= label('estado', 'Estado') ?>
                                <?= selectRequired('estado', 'estado', ['Acre', 'Alagoas', 'Amapá', 'Amazonas', 'Bahia', 'Ceará', 'Distrito Federal', 'Espírito Santo','Goiás', 'Maranhão', 'Mato Grosso', 'Mato Grosso do Sul', 'Minas Gerais', 'Pará', 'Paraíba','Paraná', 'Pernambuco', 'Piauí', 'Rio de Janeiro', 'Rio Grande do Norte', 'Rio Grande do Sul','Rondônia', 'Roraima', 'Santa Catarina', 'São Paulo', 'Sergipe', 'Tocantins']) ?>
                            </div>
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