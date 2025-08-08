<?php require_once "../../components/head.php"; ?>
<?php require_once "../../components/button.php" ?>
<?php require_once "../../components/label.php" ?>
<?php require_once "../../components/input.php" ?>
<?php require_once "../../components/textarea.php" ?>

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
                                        <?= label('nome', 'Nome') ?>
                                        <?= inputRequired('text', 'nome', 'nome' ) ?>
                                    </div>
                                    <div>
                                        <?= label('telefone', 'Telefone') ?>
                                        <?= inputRequired('text', 'telefone', 'telefone') ?>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div>
                                        <?= label('cpf', 'CPF') ?>
                                        <?= inputRequired('text', 'cpf', 'cpf') ?>
                                    </div>
                                    <div>
                                        <?= label('data_nascimento', 'Data de Nascimento') ?>
                                        <?= inputFilter('date', 'data_nascimento', 'data_nascimento') ?>

                                    </div>
                                </div>
                            </div>
                            <div class="container-input-email-voluntario">
                                <?= label('email', 'Email') ?>
                                <?= inputRequired('text', 'email', 'email') ?>
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
                                <?= inputRequired('text', 'cep', 'cep') ?>
                            </div>
                            <div class="container-input-endereco-voluntario">
                                <?= label('cidade', 'Cidade') ?>
                                <?= inputRequired('text', 'cidade', 'cidade') ?>
                            </div>
                            <div class="container-input-endereco-voluntario">
                                <?= label('estado', 'Estado') ?>
                                <?= inputRequired('text', 'estado', 'estado') ?>
                            </div>
                        </div>
                        <div class="container-endereco-voluntario">
                            <div class="container-input-endereco-voluntario">
                                <?= label('bairro', 'Bairro') ?>
                                <?= inputRequired('text', 'bairro', 'bairro') ?>
                            </div>
                            <div class="container-input-endereco-voluntario">
                                <?= label('logradouro', 'Logradouro') ?>
                                <?= inputRequired('text', 'logradouro', 'logradouro') ?>
                            </div>
                            <div class="container-input-endereco-voluntario">
                                <?= label('numero', 'Número') ?>
                                <?= inputRequired('text', 'numero', 'numero') ?>
                            </div>
                        </div>
                        <div class="container-endereco-voluntario">
                            <div class="container-input-endereco-voluntario">
                                <?= label('complemento', 'Complemento') ?>
                                <?= inputRequired('text', 'complemento', 'complemento') ?>
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