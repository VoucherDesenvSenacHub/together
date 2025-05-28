<?php require_once "../../../view/components/head.php"; ?>
<?php require_once "../../../view/components/label.php"; ?>
<?php require_once "../../../view/components/input.php"; ?>
<?php require_once "../../../view/components/button.php"; ?>

<!-- ESSA TELA VAI SER ALTERADA ELA VAI SER SOMENTE PARA ACEITAR O CADASTRO DA ONG -->

<body>
    <?php require_once "../../../view/components/navbar.php"; ?>
    <main class="main-container">
        <div class="btn-voltar-validacao-atualizacao">
            <?php require_once './../../components/back-button.php' ?>
        </div>

        <div class="titulo-validar-atualizacao">
            <h1 class="titulo-pagina-tabela">Validar a Atualização da ONG</h1>
        </div>

        <div class="formulario-perfil">
            <form action="" method="POST">
                <div class="container-perfil-ong-atualizado">
                    <img src="\together\view\assests\images\Ong\Ong_icon.png" alt="Logo da ONG" class="logo">
                    <div class="container-uper-readonly">
                        <div class="container-uper-readonly-primary">
                            <div class="form-row">
                                <div>
                                    <?= label('nome', 'Nome') ?>
                                    <?= inputReadonly('text', 'nome', 'nome', 'Saúde é vida') ?>
                                </div>
                                <div>
                                    <?= label('telefone', 'Telefone') ?>
                                    <?= inputReadonly('text', 'telefone', 'telefone', '+55 (67) 9 9999-9999') ?>
                                </div>
                            </div>

                            <div class="form-row">
                                <div>
                                    <?= label('ods', 'ODS') ?>
                                    <?= inputReadonly('text', 'ods', 'ods', 'Saúde e bem estar') ?>
                                </div>
                                <div>
                                    <?= label('email', 'Email') ?>
                                    <?= inputReadonly('text', 'email', 'email', 'ong@email.com') ?>
                                </div>
                            </div>

                            <div class="form-row">
                                <div class="container-input-atualizacao-cadastral">
                                    <?= label('fiscal', 'Conselho Fiscal') ?>
                                    <?= inputReadonly('text', 'fiscal', 'fiscal', 'Conselho Fiscal') ?>
                                </div>
                            </div>

                        </div>
                    </div>

                </div>

                <div class="container-endereco container-uper-readonly-secondary">
                    <div class="titulo-endereco-atualizacao">
                        <h1>Endereço</h1>
                    </div>
                    <div class="container-endereco-atualizacao-cadastral">
                        <div class="container-input-atualizacao-cadastral">
                            <?= label('cep', 'CEP') ?>
                            <?= inputReadonly('text', 'cep', 'cep', '123456-7') ?>
                        </div>
                        <div class="container-input-atualizacao-cadastral">
                            <?= label('logradouro', 'Logradouro') ?>
                            <?= inputReadonly('text', 'logradouro', 'logradouro', 'Logradouro') ?>
                        </div>
                    </div>
                    <div class="container-endereco-atualizacao-cadastral">
                        <div class="container-input-atualizacao-cadastral">
                            <?= label('complemento', 'Complemento') ?>
                            <?= inputReadonly('text', 'complemento', 'complemento', 'Ao lado do hospital municipal') ?>
                        </div>
                        <div class="container-input-atualizacao-cadastral">
                            <?= label('numero', 'Número') ?>
                            <?= inputReadonly('text', 'numero', 'numero', '99') ?>
                        </div>
                    </div>
                    <div class="container-endereco-atualizacao-cadastral">
                        <div class="container-input-atualizacao-cadastral">
                            <?= label('bairro', 'Bairro') ?>
                            <?= inputReadonly('text', 'bairro', 'bairro', 'Centro') ?>
                        </div>
                        <div class="container-input-atualizacao-cadastral">
                            <?= label('cidade', 'Cidade') ?>
                            <?= inputReadonly('text', 'cidade', 'cidade', 'Campo Grande') ?>
                        </div>
                    </div>
                    <div class="container-uper-readonly-secondary">
                        <?= label('complemento', 'Complemento') ?>
                        <?= inputReadonly('text', 'complemento', 'complemento', 'Ao lado do hospital municipal') ?>
                    </div>
                </div>

                <div class="container-uper-readonly-footer">
                    <div class="postagem-geral-div-btn">
                           
                           
                    </div>
                </div>
                <div class="postagem-geral-div-btn">
                    <div class="postagem-geral-btn"> <?= botao('salvar', 'Validar', '', 'validarAtualizacaoOng.php') ?></div>
                    <div class="postagem-geral-btn"> <?= botao('cancelar', 'Recusar', '', 'validarAtualizacaoOng.php') ?></div>
                </div>
            </form>
        </div>
    </main>
    <?php require_once "../../../view/components/footer.php"; ?>
</body>

</html>