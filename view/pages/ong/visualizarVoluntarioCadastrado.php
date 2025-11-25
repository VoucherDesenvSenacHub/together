<?php require_once './../../../services/AutenticacaoService.php';
AutenticacaoService::validarAcessoLogado(['Ong']);  ?>
<?php require_once "../../../view/components/head.php"; ?>
<?php require_once "../../../view/components/label.php"; ?>
<?php require_once "../../../view/components/input.php"; ?>
<?php require_once "../../../view/components/button.php"; ?>
<?php require_once "../../../model/UsuarioModel.php";
require_once "../../../model/ImagemModel.php";
require_once "./../../components/upload.php";


$usuarioModel = new UsuarioModel();
$usuario = $usuarioModel->buscarUsuarioId($_GET['id'] ?? null);


$imagemModel = new ImagemModel();
$id_imagem = $imagemModel->buscarImagemPorIdUsuario($_GET['id'] ?? null);
$preview = new ImagemPreview($id_imagem['id'] ?? null);
?>

<body>
    <?php require_once "../../../view/components/navbar.php"; ?>
    <?php require_once "../../../view/components/sidebar.php"; ?>
    <main class="main-container">


        <div class="div-wrap-width">
            <h1 class="titulo-pagina">Dados do Voluntário</h1>
            <div class="formulario-perfil">
                <form action="" method="POST">
                    <div class="container-perfil-voluntario">
                        <div class="div-logo">
                            <?php $preview->preview(true) ?>
                        </div>
                        <div class="container-readonly">
                            <div class="container-readonly-primary">
                                <div class="form-row">
                                    <div>
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
                            <div class="postagem-geral-btn"><?= botao('botao-primary', 'Voltar', '', 'voluntariosOng.php')?> </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </main>

    <?php require_once "../../../view/components/footer.php"; ?>
</body>

</html>