<?php require_once "../../../view/components/head.php"; ?>
<?php require_once "../../../view/components/label.php"; ?>
<?php require_once "../../../view/components/input.php"; ?>
<?php require_once "../../../view/components/select.php"; ?>
<?php require_once "../../../view/components/button.php"; ?>

<body>
    <?php require_once "../../../view/components/navbar.php"; ?>
    <main class="main-container">
        <?php require_once './../../components/back-button.php' ?>

        <div class="div-wrap-width">
            <h1 class="titulo-pagina">Validar Cadastro ONG</h1>
            <div class="formulario-perfil">
            <div class="filtro">
                    <div class="bloco-datas">
                        <div class="filtro-por-mes">
                            <?= label('data-inicio', 'Período') ?>
                            <?= inputFilter('date', 'data-inicio', 'data-inicio') ?>
                        </div>
                        <div class="filtro-por-mes">
                            <?= label('data-final', '&nbsp;') ?>
                            <?= inputFilter('date', 'data-final', 'data-final') ?>
                        </div>
                        <div class="filtro-por-mes">
                            <?= label('data-final', '&nbsp;') ?>
                            <?= botao('primary', '✔') ?>
                        </div>
                    </div>

                    <div class="bloco-pesquisa">
                        <?= label('pesquisar', '&nbsp;') ?>
                        <?= inputFilter('text', 'pesquisar', 'pesquisar', 'Pesquisar') ?>
                    </div>
                </div>
                <form action="" method="POST">
                    <div class="container-perfil-voluntario">
                        <div class="div-logo">
                            <img src="/together/view/assests/images/Ong/Ong_icon.png" alt="Foto do usuário" class="logo-user">
                        </div>
                        <div class="container-readonly">
                            <div class="container-readonly-primary">
                                <div class="form-row">
                                    <div>
                                        <?= label('razao_social', 'Razão Social') ?>
                                        <?= inputReadonly('text', 'razao_social', 'razao_social', 'Saúde é vida') ?>
                                    </div>
                                    <div>
                                        <?= label('telefone', 'Telefone') ?>
                                        <?= inputReadonly('text', 'telefone', 'telefone', '+55 (67) 9 9999-9999') ?>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div>
                                        <?= label('cnpj', 'CNPJ') ?>
                                        <?= inputReadonly('text', 'cnpj', 'cnpj', '99.999.999/9999-99') ?>
                                    </div>
                                    <div>
                                        <?= label('ods', 'Tipo da ONG') ?>
                                        <?= inputReadonly('text', 'ods', 'ods', 'Saúde e bem-estar') ?>
                                    </div>
                                </div>
                            </div>

                            <div class="container-input-email-voluntario">
                                <?= label('email', 'Email') ?>
                                <?= inputReadonly('text', 'email', 'email', 'ongsalvavidas@email.com') ?>
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
                                <?= inputReadonly('text', 'cep', 'cep', '123456-7') ?>
                            </div>
                            <div class="container-input-endereco-voluntario">
                                <?= label('cidade', 'Cidade') ?>
                                <?= inputReadonly('text', 'cidade', 'cidade', 'Campo Grande') ?>
                            </div>
                            <div class="container-input-endereco-voluntario">
                                <?= label('estado', 'Estado') ?>
                                <?= inputReadonly('text', 'estado', 'estado', 'Mato Grosso do Sul') ?>
                            </div>
                        </div>
                        <div class="container-endereco-voluntario">
                            <div class="container-input-endereco-voluntario">
                                <?= label('bairro', 'Bairro') ?>
                                <?= inputReadonly('text', 'bairro', 'bairro', 'Centro') ?>
                            </div>
                            <div class="container-input-endereco-voluntario">
                                <?= label('logradouro', 'Logradouro') ?>
                                <?= inputReadonly('text', 'logradouro', 'logradouro', 'Rua dos bobos') ?>
                            </div>
                            <div class="container-input-endereco-voluntario">
                                <?= label('numero', 'Número') ?>
                                <?= inputReadonly('text', 'numero', 'numero', '4444') ?>
                            </div>
                        </div>
                        <div class="container-endereco-voluntario">
                            <div class="container-input-endereco-voluntario">
                                <?= label('complemento', 'Complemento') ?>
                                <?= inputReadonly('text', 'complemento', 'complemento', 'Ao lado do hospital do carinho') ?>
                            </div>
                        </div>
                    </div>
                    <div class="container-readonly-footer">
                        <div class="botao-excluir-voluntario">
                            <div class="postagem-geral-btn"><?= botao('salvar', 'Aceitar', '', '/together/view/pages/adm/OngsAValidar.php') ?> </div>
                            <div class="postagem-geral-btn"><?= botao('excluir', 'Recusar', '','/together/view/pages/adm/OngsAValidar.php') ?> </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </main>

    <?php require_once "../../../view/components/footer.php"; ?>
</body>

</html>