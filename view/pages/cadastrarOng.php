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
                <img src="../assests/images/components/logoTogetherLogin.png" alt="logo" class="logo-imagem-login">
            </div>

            <div class="box-login">

                <form class="login" method="POST" action="">
                    <h1 class="titulo-login">Cadastrar ONG</h1>
                    <div class="step active">
                        <div class="container-input-login">
                            <div>
                                <?= label('razao_social', 'Razão Social') ?>
                                <?= inputRequired('text', 'razao_social', 'razao_social') ?>
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
                                <?= botao('next', 'Próximo', 'btn1.1','','button') ?>
                            </div>
                            <div class="criar-conta-area-login">
                                <a href="login.php" class="text-login link-login">Já tem uma conta?</a>
                            </div>
                        </div>
                    </div>
                    <div class="step">
                        <div class="container-input-login">
                            <div>
                                <?= label('cnpj', 'CNPJ') ?>
                                <?= inputRequired('text', 'cnpj', 'cnpj') ?>
                            </div>
                            <div>
                                <?= label('ods', 'Tipo da Ong') ?>
                                <?= selectRequired('ods', 'ods', [
                                    "Erradicação da pobreza",
                                    "Fome zero e agricultura sustentável",
                                    "Saúde e bem-estar",
                                    "Educação de qualidade",
                                    "Igualdade de gênero",
                                    "Água potável e saneamento",
                                    "Energia limpa e acessível",
                                    "Trabalho decente e crescimento econômico",
                                    "Indústria, inovação e infraestrutura",
                                    "Redução das desigualdades",
                                    "Cidades e comunidades sustentáveis",
                                    "Consumo e produção responsáveis",
                                    "Ação contra a mudança global do clima",
                                    "Vida na água",
                                    "Vida terrestre",
                                    "Paz, justiça e instituições eficazes",
                                    "Parcerias e meios de implementação"
                                ]) ?>
                            </div>
                            <div class="botao-login group-btn-cadastro-ong">
                                <?= botao('prev', 'Voltar', 'btn2.1','','button') ?>
                                <?= botao('next', 'Próximo', 'btn2.2','','button') ?>
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
                                <?= inputDefault('text', 'complemento', 'complemento') ?>
                            </div>
                            <div class="botao-login group-btn-cadastro-ong">
                                <?= botao('prev', 'Voltar', 'btn3.1','','button') ?>
                                <?= botao('next', 'Próximo', 'btn3.2','','button') ?>
                            </div>
                        </div>
                    </div>
                    <div class="step">
                        <div class="container-input-login">
                            <div>
                                <?= label('senha', 'Senha') ?>
                                <?= inputRequired('number', 'senha', 'senha') ?>
                            </div>
                            <div>
                                <?= label('confirmar_senha', 'Confirmar Senha') ?>
                                <?= inputRequired('number', 'confirmar_senha', 'confirmar_senha') ?>
                            </div>
                            <div class="botao-login group-btn-cadastro-ong">
                                <?= botao('prev', 'Voltar', 'btn4.1','','button') ?>
                                <?= botao('salvar', 'Enviar', 'btn4.2', '/together/index.php') ?>
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