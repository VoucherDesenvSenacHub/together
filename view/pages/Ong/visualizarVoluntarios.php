<?php require_once "../../../view/components/head.php"; ?>
<?php require_once "../../../view/components/label.php"; ?>
<?php require_once "../../../view/components/input.php"; ?>
<?php require_once "../../../view/components/button.php"; ?>
<?php require_once "../../../model/OngModel.php";
require_once "./../../components/upload.php";

// USADO PARA LISTAR INFORMAÇÕES DO USUARIO
$ongModel = new OngModel();
$usuario = $ongModel->buscarVoluntarioPorId($_GET['id'] ?? null);

// USADO PARA O PREVIEW DA IMAGEM
$preview = new ImagemPreview($usuario['id_imagem'] ?? null);
?>

<body>
    <?php require_once "../../../view/components/navbar.php"; ?>
    <main class="main-container">
        <?php require_once './../../components/back-button.php' ?>

        <div class="div-wrap-width">
            <h1 class="titulo-pagina">Dados do Voluntário</h1>
            <div class="formulario-perfil">
                <form action="" method="POST">
                    <div class="container-perfil-voluntario">
                        <div class="div-logo">
                            <?php $preview->preview() ?>
                        </div>
                        <div class="container-readonly">
                            <div class="container-readonly-primary">
                                <div class="form-row">
                                    <div>
                                        <input type="hidden" name="id_voluntario" value=<?= $_GET['id'] ?? null?>>
                                        <?= label('nome', 'Nome') ?>
                                        <?= inputReadonly('text', 'nome', 'nome', $usuario['nome'] ?? '') ?>
                                    </div>
                                    <div>
                                        <?= label('telefone', 'Telefone') ?>
                                        <?= inputReadonly('text', 'telefone', 'telefone', $usuario['telefone'] ?? '') ?>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div>
                                        <?= label('cpf', 'CPF') ?>
                                        <?= inputReadonly('text', 'cpf', 'cpf', $usuario['cpf'] ?? '') ?>
                                    </div>
                                    <div>
                                        <?= label('data', 'Data de Nascimento') ?>
                                        <?= inputReadonly('text', 'data', 'data', $usuario['dt_nascimento'] ?? '') ?>
                                    </div>
                                </div>
                            </div>

                            <div class="container-input-email-voluntario">
                                <?= label('email', 'Email') ?>
                                <?= inputReadonly('text', 'email', 'email', $usuario['email'] ?? '') ?>
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
                                <?= inputReadonly('text', 'cep', 'cep', $usuario['cep'] ?? '') ?>
                            </div>
                            <div class="container-input-endereco-voluntario">
                                <?= label('cidade', 'Cidade') ?>
                                <?= inputReadonly('text', 'cidade', 'cidade', $usuario['cidade'] ?? '') ?>
                            </div>
                            <div class="container-input-endereco-voluntario">
                                <?= label('estado', 'Estado') ?>
                                <?= inputReadonly('text', 'estado', 'estado', $usuario['estado'] ?? '') ?>
                            </div>
                        </div>
                        <div class="container-endereco-voluntario">
                            <div class="container-input-endereco-voluntario">
                                <?= label('bairro', 'Bairro') ?>
                                <?= inputReadonly('text', 'bairro', 'bairro', $usuario['bairro'] ?? '') ?>
                            </div>
                            <div class="container-input-endereco-voluntario">
                                <?= label('logradouro', 'Logradouro') ?>
                                <?= inputReadonly('text', 'logradouro', 'logradouro', $usuario['logradouro'] ?? '') ?>
                            </div>
                            <div class="container-input-endereco-voluntario">
                                <?= label('numero', 'Número') ?>
                                <?= inputReadonly('text', 'numero', 'numero', $usuario['numero'] ?? '') ?>
                            </div>
                        </div>
                        <div class="container-endereco-voluntario">
                            <div class="container-input-endereco-voluntario">
                                <?= label('complemento', 'Complemento') ?>
                                <?= inputReadonly('text', 'complemento', 'complemento', $usuario['complemento'] ?? '') ?>
                            </div>
                        </div>
                    </div>
                    <div class="container-readonly-footer">
                        <div class="botao-excluir-voluntario">
                            <div class="postagem-geral-btn"><?= botao('salvar', 'Aceitar', formaction: '/together/controller/VisualizarVoluntariosController.php', name:'action', value:'aceitar') ?> </div>
                            <div class="postagem-geral-btn"><?= botao('excluir', 'Recusar',  formaction: '/together/controller/VisualizarVoluntariosController.php', name:'action', value:'recusar') ?> </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </main>

    <!-- <div id="modalConfirmacao" class="modal-overlay">
        <div class="modal-content">
            <p>Tem certeza que deseja recusar este voluntário?</p>
            <div class="modal-botoes">
                <div class="postagem-geral-btn"><?= botao('salvar', 'Sim', "btnConfirmarExclusao") ?> </div>
                <div class="postagem-geral-btn"><?= botao('excluir', 'Cancelar', "btnCancelarExclusao") ?> </div>
            </div>
        </div>
    </div> -->

    <?php require_once "../../../view/components/footer.php"; ?>
</body>

</html>