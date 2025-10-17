<?php require_once './../../components/head.php' ?>
<?php require_once './../../components/acoes.php' ?>
<?php require_once './../../components/button.php' ?>
<?php require_once './../../components/input.php' ?>
<?php require_once './../../components/label.php' ?>
<?php require_once './../../../model/PatrocinadoresModel.php' ?>
<?php require_once './../../components/upload.php' ?>
<?php require_once './../../components/alert.php' ?>
<?php
$patrocinadoresModel = new PatrocinadoresModel();
$patrocinadores = isset($_SESSION['pesquisar_patrocinador']) ?  $patrocinadoresModel->buscaPatrocinadoresPorNome($_SESSION['pesquisar_patrocinador']) : $patrocinadoresModel->findPatrocinadores();
$preview = new ImagemPreview($patrocinadores['id'] ?? null);

// Popup do session
if (isset($_SESSION['type'], $_SESSION['message'])) {
    showPopup($_SESSION['type'], $_SESSION['message']);
    unset($_SESSION['type'], $_SESSION['message']);
}
?>

<body>
    <header>
        <?php require_once './../../components/navbar.php' ?>
    </header>

    <main class="main-container">
        <?php require_once './../../components/back-button.php' ?>

        <div class="div-wrap-width">
            <div class="container-botao-patrocinadores">
                <div class="titulo-pagina">
                    <h1>Patrocinadores</h1>
                </div>
            </div>
            <form action="/together/controller/GestaoPatrocinadoresController.php" method="POST" enctype="multipart/form-data" class="formulario-perfil">
                <div class="filtro">

                    <div class="bloco-pesquisa">
                        <?= label('pesquisar', '&nbsp;') ?>
                        <?= inputFilter('text', 'pesquisar', 'pesquisar_patrocinador', 'Pesquisar Nome') ?>
                    </div>
                    <div class="filtro-botao-patrocinador">
                        <div class="div-btn-patrocinador">
                            <?= botao('primary', 'Adicionar', 'abrir-patrocinadores', type: 'button') ?>
                        </div>
                    </div>
                </div>
                <div class="table-mobile">
                    <table class="tabela">
                        <thead>
                            <tr>
                                <th>Logo</th>
                                <th>Nome</th>
                                <th>Ações</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($patrocinadores as $patrocinador): ?>
                                <tr>
                                    <td>
                                        <img src="<?= $patrocinador['caminho'] ?>" alt="" class="logo-patrocinador">
                                    </td>
                                    <td><?= $patrocinador['nome'] ?></td>
                                    <td>
                                        <div class="acoes-container">
                                            <?= renderAcao('editar', '', 'abrir-patrocinadores') ?>
                                            <button class="botao-deletar">
                                                <input type="hidden" name="action" value="deletar">
                                                <input type="hidden" name="id" value="<?= $patrocinador['id'] ?>">
                                                <?= renderAcao('deletar') ?>
                                            </button>
                                        </div>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
                <?php require_once './../../components/paginacao.php' ?>
            </form>
            <form action="/together/controller/GestaoPatrocinadoresController.php" method="POST" enctype="multipart/form-data" class="modal-overlay" id="modal-overlay-patrocinadores">
                <div class="modal-content">
                    <div class="inserir-patrocinadores">
                        <div class="inputs-patrocinadores">
                            <div>
                                <?= label('patrocinador', 'Patrocinador') ?>
                                <?= inputRequired('text', 'patrocinador', 'patrocinador') ?>
                            </div>
                            <div>
                                <?= label('redePatrocinador', 'Rede Social') ?>
                                <?= inputRequired('text', 'redePatrocinador', 'redePatrocinador') ?>
                            </div>
                        </div>
                        <div>
                            <div class='formulario-imagem-preview'>
                                <input type="hidden" name="idImagem" value="<?= $patrocinadores['id'] ?? null ?>">
                                <?php $preview->preview() ?>
                            </div>
                        </div>
                    </div>
                    <div class="botao-modal-patrocinadores">
                        <div class="modal-botoes">
                            <?= botao('cancelar', 'Cancelar', 'fechar-patrocinadores') ?>
                            <?= botao('salvar', 'Salvar', name: 'action', formaction: '/together/controller/GestaoPatrocinadoresController.php') ?>
                            <input type="hidden">
                        </div>
                    </div>
                </div>
            </form>
            <form action="/together/controller/GestaoPatrocinadoresController.php" method="POST" enctype="multipart/form-data" class="modal-overlay" id="modal-overlay-patrocinadores">
                <div class="modal-content">
                    <div class="inserir-patrocinadores">
                        <div class="inputs-patrocinadores">
                            <div>
                                <?= label('patrocinador', 'Patrocinador') ?>
                                <?= inputRequired('text', 'patrocinador', 'patrocinador') ?>
                            </div>
                            <div>
                                <?= label('redePatrocinador', 'Rede Social') ?>
                                <?= inputRequired('text', 'redePatrocinador', 'redePatrocinador') ?>
                            </div>
                        </div>
                        <div>
                            <div class='formulario-imagem-preview'>
                                <input type="hidden" name="idImagem" value="<?= $patrocinadores['id'] ?? null ?>">
                                <?php $preview->preview() ?>
                            </div>
                        </div>
                    </div>
                    <div class="botao-modal-patrocinadores">
                        <div class="modal-botoes">
                            <?= botao('cancelar', 'Cancelar', 'fechar-patrocinadores') ?>
                            <?= botao('salvar', 'Salvar', name: 'action', formaction: '/together/controller/GestaoPatrocinadoresController.php') ?>
                            <input type="hidden">
                        </div>
                    </div>
                </div>
            </form>
        </div>

    </main>

    <?php require_once './../../components/footer.php' ?>


</body>

</html>