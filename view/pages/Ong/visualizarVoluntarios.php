<?php require_once "../../../view/components/head.php"; ?>
<?php require_once "../../../view/components/label.php"; ?>
<?php require_once "../../../view/components/input.php"; ?>
<?php require_once "../../../view/components/button.php"; ?>

<body>
    <?php require_once "../../../view/components/navbar.php"; ?>
    <main class="main-container">
        <div class="btn-voltar-validacao-atualizacao">
            <?php require_once './../../components/back-button.php' ?>
        </div>

        <div class="titulo-validar-atualizacao">
            <h1 class="titulo-pagina-tabela">Dados do voluntário</h1>
        </div>

        <div class="formulario-perfil">
            <form action="">
                <div class="container-perfil-ong-atualizado">
                    <img src="\together\view\assests\images\Ong\perfil-user.png" alt="Logo da ONG" class="logo">
                    <div class="container-uper-readonly">
                        <div class="container-uper-readonly-primary">

                            <div class="form-row">
                                <div>
                                    <?= label('nome', 'Nome') ?>
                                    <?= inputReadonly('text', 'nome', 'nome', 'Jhon F. Kennedy') ?>
                                </div>

                                <div>
                                    <?= label('telefone', 'Telefone') ?>
                                    <?= inputReadonly('text', 'telefone', 'telefone', '+55 (67) 9 9999-9999') ?>
                                </div>
                            </div>

                            <div class="form-row">

                                <div>
                                    <?= label('cpf', 'CPF') ?>
                                    <?= inputReadonly('text', 'cpf', 'cpf', '000.000.000-00') ?>
                                </div>

                                <div>
                                    <?= label('data', 'Data de nascimento') ?>
                                    <?= inputReadonly('text', 'data', 'data', '19/01/1990') ?>
                                </div>
                            </div>
                        </div>
                        
                        <div class="container-input-email-voluntario">
                            <?= label('email', 'Email') ?>
                            <?= inputReadonly('text', 'email', 'email', 'jhon.f.kennedy@email.com') ?>
                       </div>
                    </div>

                </div>

                <div class="container-endereco container-uper-readonly-secondary">

                    <div class="titulo-endereco-atualizacao"></div>

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

                    <div class="container-uper-readonly-secondary"></div>
                </div>

                <div class="container-uper-readonly-footer">

                    <div class="botoes-validar-atualizacao">
                        <?= botao('salvar', 'Validar', '', 'validarAtualizacaoOng.php') ?>
                        <?= botao('cancelar', 'Recusar', '', 'validarAtualizacaoOng.php') ?>
                    </div>

                </div>
            </form>
        </div>
    </main>
    <?php require_once "../../../view/components/footer.php"; ?>
</body>

</html>