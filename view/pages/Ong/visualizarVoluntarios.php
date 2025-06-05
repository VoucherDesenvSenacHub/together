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

        <div class="titulo-pagina-tabela">
            <h1 class="titulo-pagina-tabela">Dados do voluntário</h1>
        </div>

        <div class="formulario-perfil">
            <form action="" method="POST">
                <div class="container-perfil-voluntario">
                    <img src="\together\view\assests\images\Ong\perfil-user.png" alt="Foto do usuário" class="logo-user">
                    <div class="container-readonly">
                        <div class="container-readonly-primary">

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
                            <?= label('logradouro', 'Logradouro') ?>
                            <?= inputReadonly('text', 'logradouro', 'logradouro', 'Rua dos bobos') ?>
                        </div>
                    </div>

                    <div class="container-endereco-voluntario">

                        <div class="container-input-endereco-voluntario">
                            <?= label('complemento', 'Complemento') ?>
                            <?= inputReadonly('text', 'complemento', 'complemento', 'Ao lado do hospital do carinho') ?>
                        </div>

                        <div class="container-input-endereco-voluntario">
                            <?= label('numero', 'Número') ?>
                            <?= inputReadonly('text', 'numero', 'numero', '0') ?>
                        </div>
                    </div>

                    <div class="container-endereco-voluntario">

                        <div class="container-input-endereco-voluntario">
                            <?= label('bairro', 'Bairro') ?>
                            <?= inputReadonly('text', 'bairro', 'bairro', 'Centro') ?>
                        </div>

                        <div class="container-input-endereco-voluntario">
                            <?= label('cidade', 'Cidade') ?>
                            <?= inputReadonly('text', 'cidade', 'cidade', 'Campo Grande') ?>
                        </div>

                    </div>
                </div>

                <div class="container-readonly-footer">

                    <div class="botao-excluir-voluntario">
                        <div class="botao-excluir"><?= botao('excluir', 'Excluir', 'btnExcluirVoluntario', 'voluntariosOng.php') ?></div>
                    </div>

                </div>
            </form>
        </div>
    </main>
    
    <div id="modalConfirmacao" class="modal-overlay">
    <div class="modal-content">
        <p>Tem certeza que deseja excluir este voluntário?</p>
        <div class="modal-botoes">
        <button id="btnConfirmarExclusao" class="botao botao-excluir">Sim</button>
        <button id="btnCancelarExclusao" class="botao botao-cancelar">Cancelar</button>
        </div>
    </div>
    </div>


    <?php require_once "../../../view/components/footer.php"; ?>
</body>

</html>

