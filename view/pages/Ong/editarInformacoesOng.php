<?php require_once "../../components/head.php"; ?>
<?php require_once "../../components/button.php" ?>
<?php require_once "../../components/label.php" ?>
<?php require_once "../../components/input.php" ?>
<?php require_once "../../components/textarea.php" ?>
<?php require_once "../../components/select.php" ?>

<body>
    <?php require_once "../../../view/components/navbar.php"; ?>

    <main class="main-container main-min">
        <?php require_once './../../components/back-button.php' ?>

        <div class="div-wrap-width">
            <h1 class="titulo-pagina">Editar Informações</h1>
            <div class="formulario-perfil">
                <form action="" method="POST" class="postagem-geral-form editar-informacoes-form">
                    <div class="container-perfil-voluntario">
                        <div class="div-logo">
                            <?php require_once "./../../components/upload.php" ?>
                        </div>
                        <div class="container-readonly">
                            <div class="container-readonly-primary">
                                <div class="form-row">
                                    <div>
                                        <?= label('razao-social', 'Razão Social') ?>
                                        <?= inputReadonly('text', 'razao-social', 'razao-social', 'Jhon F. Kennedy') ?>
                                    </div>
                                    <div>
                                        <?= label('telefone', 'Telefone') ?>
                                        <?= inputReadonly('text', 'telefone', 'telefone', '+55 (67) 9 9999-9999') ?>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div>
                                        <?= label('cnpj', 'CNPJ') ?>
                                        <?= inputReadonly('text', 'cnpj', 'cnpj', '12.345.678/0001-95') ?>
                                    </div>
                                    <div>
                                        <!-- <?= label('tipo_ong', 'Data de Nascimento') ?>
                                        <?= inputFilter('date', 'data_nascimento', 'data_nascimento') ?> -->

                                        <?= label('ods', 'Tipo da Ong') ?>
                                        <?= selectReadonly('ods', 'ods', [
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
                                </div>
                            </div>
                            <div class="container-input-email-voluntario">
                                <?= label('email', 'Email') ?>
                                <?= inputReadonly('text', 'email', 'email', 'jhon.f.kennedy@email.com') ?>
                            </div>
                        </div>
                    </div>
                    <div class="container-endereco container-readonly-secondary">
                        <div class="titulo-endereco-voluntario">
                            <h1>Endereço</h1>
                        </div>
                        <div class="container-endereco-voluntario">
                            <div class="container-input-endereco-voluntario">
                                <?= label('cep', 'CEP') ?>
                                <?= inputReadonly('text', 'cep', 'cep', '') ?>
                            </div>
                            <div class="container-input-endereco-voluntario">
                                <?= label('cidade', 'Cidade') ?>
                                <?= inputReadonly('text', 'cidade', 'cidade', '') ?>
                            </div>
                            <div class="container-input-endereco-voluntario">
                                <?= label('estado', 'Estado') ?>
                                <?= inputReadonly('text', 'estado', 'estado', '') ?>
                            </div>
                        </div>
                        <div class="container-endereco-voluntario">
                            <div class="container-input-endereco-voluntario">
                                <?= label('bairro', 'Bairro') ?>
                                <?= inputReadonly('text', 'bairro', 'bairro', '') ?>
                            </div>
                            <div class="container-input-endereco-voluntario">
                                <?= label('logradouro', 'Logradouro') ?>
                                <?= inputReadonly('text', 'logradouro', 'logradouro', '') ?>
                            </div>
                            <div class="container-input-endereco-voluntario">
                                <?= label('numero', 'Número') ?>
                                <?= inputReadonly('text', 'numero', 'numero', '') ?>
                            </div>
                        </div>
                        <div class="container-endereco-voluntario">
                            <div class="container-input-endereco-voluntario">
                                <?= label('complemento', 'Complemento') ?>
                                <?= inputReadonly('text', 'complemento', 'complemento', '') ?>
                            </div>
                        </div>
                    </div>
                    <div class="postagem-geral-div-btn">
                        <div class="postagem-geral-btn"><?= botao('salvar', 'Salvar') ?></div>
                        <div class="postagem-geral-btn"><?= botao('cancelar', 'Cancelar') ?></div>
                    </div>
                </form>
            </div>
        </div>

    </main>

    <?php require_once './../../components/footer.php' ?>
</body>