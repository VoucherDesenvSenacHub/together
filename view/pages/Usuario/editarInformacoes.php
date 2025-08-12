<?php require_once "../../components/head.php"; ?>
<?php require_once "../../components/button.php" ?>
<?php require_once "../../components/label.php" ?>
<?php require_once "../../components/input.php" ?>
<?php require_once "../../components/textarea.php" ?>
<?php require_once "../../components/select.php" ?>
<?php require_once "../../components/selectEndereco.php" ?>
<?php require_once "../../../controller/EnderecoController.php" ?>

<?php
$enderecoController = new EnderecoController();
$enderecoController->salvarEdicao();

$endereco = $enderecoController->endereco();

?>


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
                                    <input type="hidden" name="id" value="<?= htmlspecialchars($endereco['id'] ?? '') ?>">
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
                                        <?= label('data_nascimento', 'Data de Nascimento') ?>
                                        <?= inputFilter('date', 'data_nascimento', 'data_nascimento') ?>
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
                                <?= inputDefault('text', 'cep', 'cep', $endereco['cep']) ?>
                            </div>
                            <div class="container-input-endereco-voluntario">
                                <?= label('estado', 'Estado') ?>
                                <?php renderSelectEstado($endereco['estado'] ?? '', ); ?>
                            </div>

                            <div class="container-input-endereco-voluntario">
                                <?= label('cidade', 'Cidade') ?>
                                <?php renderSelectCidade($endereco['estado'] ?? '', $endereco['cidade'] ?? ''); ?>
                            </div>

                        </div>



                        <div class="container-endereco-voluntario">
                            <div class="container-input-endereco-voluntario">
                                <?= label('bairro', 'Bairro') ?>
                                <?= inputDefault('text', 'bairro', 'bairro', $endereco['bairro']) ?>
                            </div>
                            <div class="container-input-endereco-voluntario">
                                <?= label('logradouro', 'Logradouro') ?>
                                <?= inputDefault('text', 'logradouro', 'logradouro', $endereco['logradouro']) ?>
                            </div>
                            <div class="container-input-endereco-voluntario">
                                <?= label('numero', 'Número') ?>
                                <?= inputDefault('text', 'numero', 'numero', $endereco['numero']) ?>
                            </div>
                        </div>

                        <div class="container-endereco-voluntario">
                            <div class="container-input-endereco-voluntario">
                                <?= label('complemento', 'Complemento') ?>
                                <?= inputDefault('text', 'complemento', 'complemento', $endereco['complemento']) ?>
                            </div>
                        </div>
                    </div>

                    <div class="postagem-geral-div-btn">
                    <div class="postagem-geral-btn"><?= botao('salvar', 'Salvar', '', '', 'submit', 'salvar') ?></div>
                        <div class="postagem-geral-btn"><?= botao('cancelar', 'Cancelar') ?></div>
                    </div>
                </form>
            </div>
        </div>
    </main>

    <?php require_once './../../components/footer.php' ?>
</body>