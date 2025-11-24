<?php require_once './../../../services/AutenticacaoService.php';
AutenticacaoService::validarAcessoLogado(['Administrador']);  ?>
<?php require_once "../../../view/components/head.php"; ?>
<?php require_once "../../../view/components/label.php"; ?>
<?php require_once "../../../view/components/input.php"; ?>
<?php require_once "../../../view/components/button.php"; ?>
<?php require_once "../../../model/OngModel.php";
require_once "../../../model/ImagemModel.php";
require_once "../../components/upload.php";

$ongModel = new ongModel();
$ong = $ongModel->buscarOngId($_GET['id']);

$imagemModel = new ImagemModel();
$imagem = $imagemModel->buscarImagemPorId($ong['id_imagem']);

$preview = new ImagemPreview($imagem['id'] ?? null);

?>

<body>
    <?php require_once "../../../view/components/navbar.php"; ?>
    <?php require_once "../../../view/components/sidebar.php"; ?>
    <main class="main-container">

        <div class="div-wrap-width">
            <h1 class="titulo-pagina">Dados Cadastrais</h1>
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
                                        <?= label('razao_social', 'Razão Social') ?>
                                        <?= inputReadonly('text', 'razao_social', 'razao_social', $ong['razao_social'] ?? '') ?>
                                    </div>
                                    <div>
                                        <?= label('telefone', 'Telefone') ?>
                                        <?= inputReadonly('text', 'telefone', 'telefone', $ong['telefone'] ?? '') ?>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div>
                                        <?= label('cnpj', 'CNPJ') ?>
                                        <?= inputReadonly('text', 'cnpj', 'cnpj', $ong['cnpj'] ?? '') ?>
                                    </div>
                                    <div>
                                        <?= label('data', 'Data de criação') ?>
                                        <?= inputReadonly('text', 'data', 'data', $ong['dt_criacao'] ?? '') ?>
                                    </div>
                                </div>
                            </div>

                            <div class="container-input-email-voluntario">
                                <?= label('email', 'Email') ?>
                                <?= inputReadonly('text', 'email', 'email', $ong['email'] ?? '') ?>
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
                                <?= inputReadonly('text', 'cep', 'cep', $ong['cep'] ?? '') ?>
                            </div>
                            <div class="container-input-endereco-voluntario">
                                <?= label('cidade', 'Cidade') ?>
                                <?= inputReadonly('text', 'cidade', 'cidade', $ong['cidade'] ?? '') ?>
                            </div>
                            <div class="container-input-endereco-voluntario">
                                <?= label('estado', 'Estado') ?>
                                <?= inputReadonly('text', 'estado', 'estado', $ong['estado'] ?? '') ?>
                            </div>
                        </div>
                        <div class="container-endereco-voluntario">
                            <div class="container-input-endereco-voluntario">
                                <?= label('bairro', 'Bairro') ?>
                                <?= inputReadonly('text', 'bairro', 'bairro', $ong['bairro'] ?? '') ?>
                            </div>
                            <div class="container-input-endereco-voluntario">
                                <?= label('logradouro', 'Logradouro') ?>
                                <?= inputReadonly('text', 'logradouro', 'logradouro', $ong['logradouro'] ?? '') ?>
                            </div>
                            <div class="container-input-endereco-voluntario">
                                <?= label('numero', 'Número') ?>
                                <?= inputReadonly('text', 'numero', 'numero', $ong['numero'] ?? '') ?>
                            </div>
                        </div>
                        <div class="container-endereco-voluntario">
                            <div class="container-input-endereco-voluntario">
                                <?= label('complemento', 'Complemento') ?>
                                <?= inputReadonly('text', 'complemento', 'complemento', $ong['complemento'] ?? '') ?>
                            </div>
                        </div>
                    </div>
                    <div class="container-readonly-footer">
                        <div class="botao-excluir-voluntario">
                            <div class="postagem-geral-btn"><?= botao('botao-primary', 'Voltar', '', '/together/index.php') ?> </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </main>

    <?php require_once "../../../view/components/footer.php"; ?>
</body>

</html>