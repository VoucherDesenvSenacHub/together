<?php require_once "../../components/head.php";
require_once "../../components/button.php";
require_once "../../components/label.php";
require_once "../../components/input.php";
require_once "../../components/textarea.php";
require_once "../../../model/UsuarioModel.php";
require_once "../../../model/ImagemModel.php";
require_once "./../../components/upload.php";
require_once "./../../components/alert.php";

$imgModel = new ImagemModel();
$imagem = $imgModel->buscarImagemPorIdUsuario($_SESSION['id']);
$preview = new ImagemPreview($imagem['id'] ?? null);

$usuarioModel = new UsuarioModel();
$usuario = $usuarioModel->buscarUsuarioId($_SESSION['id']);

if (isset($_SESSION['type'], $_SESSION['message'])) {
    showPopup($_SESSION['type'], $_SESSION['message']);
    unset($_SESSION['type'], $_SESSION['message']);
}
?>

<body>
    <?= require_once "../../../view/components/navbar.php" ?>

    <main class="main-container main-min">
        <?php require_once './../../components/back-button.php' ?>

        <div class="div-wrap-width">
            <h1 class="titulo-pagina">Editar Informações</h1>
            <div class="formulario-perfil">
                <form action="" enctype="multipart/form-data" method="POST" class="postagem-geral-form editar-informacoes-form">
                    <div class="container-perfil-voluntario">
                        <div class="div-logo">
                            <input type="hidden" name="id_imagem" value="<?= $imagem['id'] ?? null ?>">
                            <?php $preview->preview() ?>
                        </div>
                        <div class="container-readonly">
                            <div class="container-readonly-primary">
                                <div class="form-row">
                                    <div>
                                        <?= label('nome', 'Nome') ?>
                                        <?= inputRequired('text', 'nome', 'nome', $usuario['nome']) ?>
                                    </div>
                                    <div>
                                        <?= label('telefone', 'Telefone') ?>
                                        <?= inputRequired('text', 'telefone', 'telefone', $usuario['telefone']) ?>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div>
                                        <?= label('cpf', 'CPF') ?>
                                        <?= inputReadonly('text', 'cpf', 'cpf', $usuario['cpf']) ?>
                                    </div>
                                    <div>
                                        <?= label('data_nascimento', 'Data de Nascimento') ?>
                                        <?= inputReadonly('text', 'dt_nascimento', 'dt_nascimento', $usuario['dt_nascimento']) ?>
                                    </div>
                                </div>
                            </div>
                            <div class="container-input-email-voluntario">
                                <?= label('email', 'Email') ?>
                                <?= inputRequired('text', 'email', 'email', $usuario['email']) ?>
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
                                <?= inputDefault('text', 'cep', 'cep') ?>
                            </div>
                            <div class="container-input-endereco-voluntario">
                                <?= label('cidade', 'Cidade') ?>
                                <?= inputDefault('text', 'cidade', 'cidade') ?>
                            </div>
                            <div class="container-input-endereco-voluntario">
                                <?= label('estado', 'Estado') ?>
                                <?= inputDefault('text', 'estado', 'estado') ?>
                            </div>
                        </div>
                        <div class="container-endereco-voluntario">
                            <div class="container-input-endereco-voluntario">
                                <?= label('bairro', 'Bairro') ?>
                                <?= inputDefault('text', 'bairro', 'bairro') ?>
                            </div>
                            <div class="container-input-endereco-voluntario">
                                <?= label('logradouro', 'Logradouro') ?>
                                <?= inputDefault('text', 'logradouro', 'logradouro') ?>
                            </div>
                            <div class="container-input-endereco-voluntario">
                                <?= label('numero', 'Número') ?>
                                <?= inputDefault('text', 'numero', 'numero') ?>
                            </div>
                        </div>
                        <div class="container-endereco-voluntario">
                            <div class="container-input-endereco-voluntario">
                                <?= label('complemento', 'Complemento') ?>
                                <?= inputDefault('text', 'complemento', 'complemento') ?>
                            </div>
                        </div>
                    </div>
                    <div class="postagem-geral-div-btn">
                        <div class="postagem-geral-btn">
                            <?= botao('salvar', 'Salvar', formaction: '../../../controller/UsuarioEditarController.php') ?>
                        </div>
                        <div class="postagem-geral-btn"><?= botao('cancelar', 'Cancelar') ?></div>
                    </div>
                </form>
            </div>
        </div>

    </main>

    <?php require_once './../../components/footer.php' ?>
</body>