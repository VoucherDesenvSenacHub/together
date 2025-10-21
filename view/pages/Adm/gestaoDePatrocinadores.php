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

$editarPatrocinador = null;

if (isset($_GET['editar'])) {
    $idEditar = (int)$_GET['editar'];
    $editarPatrocinador = $patrocinadoresModel->buscarPatrocinadorPorId($idEditar);
    $preview = new ImagemPreview($editarPatrocinador['id_imagem'] ?? null);
}

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
                    <h1>Patrocinadores</h1>7
                </div>
            </div>
            <div class="formulario-perfil">
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

                                            <a href="?editar=<?= $patrocinador['id'] ?>" class="btn-editar-patrocinador">
                                                <?= renderAcao('editar') ?>
                                            </a>
                                                <input type="hidden" name="action" value="deletar">
                                                <input type="hidden" name="id" value="<?= $patrocinador['id'] ?>">
                                                <button class="btn-desativar-patrocinador">
                                                    <?= renderAcao('deletar') ?>
                                                </button>
                                        </div>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                            <?php if (empty($patrocinadores)) { ?>
                                <tr>
                                    <td colspan="3" style="text-align:center;">Nenhum patrocinador encontrado.</td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
                <?php require_once './../../components/paginacao.php' ?>
            </div>
            <form action="" method="POST" enctype="multipart/form-data" class="modal-overlay <?= $editarPatrocinador ? 'aberto' : '' ?>" id="modal-overlay-patrocinadores">
                <div class="modal-content">
                    <div class="inserir-patrocinadores">
                        <div class="inputs-patrocinadores">
                            <input type="hidden" name="id" value="<?= $editarPatrocinador['id'] ?? '' ?>">
                            <input type="hidden" name="action" value="<?= $editarPatrocinador ? 'editar' : 'salvar' ?>">

                            <div>
                                <?= label('input-patrocinador', 'Patrocinador') ?>
                                <?= inputRequired('text', 'patrocinador', 'patrocinador', value: $editarPatrocinador['nome'] ?? '') ?>
                            </div>

                            <div>
                                <?= label('input-rede', 'Rede Social') ?>
                                <?= inputRequired('text', 'redePatrocinador', 'redePatrocinador', value: $editarPatrocinador['rede_social'] ?? '') ?>
                            </div>

                        </div>
                        <div class='formulario-imagem-preview'>
                            <input type="hidden" name="idImagem" value="<?= $editarPatrocinador['id_imagem'] ?? null ?>">

                            <?php
                            if ($editarPatrocinador) {
                                $preview->preview();
                            } else {
                                $previewNovo = new ImagemPreview(null);
                                $previewNovo->preview();
                            }
                            ?>

                        </div>
                    </div>
                    <div class="botao-modal-patrocinadores">
                        <div class="modal-botoes">
                            <?= botaoFormNoValide('cancelar', 'Cancelar', 'fechar-patrocinadores', formaction: '/together/view/pages/adm/gestaoDePatrocinadores.php') ?>
                            <?= botao('salvar', 'Salvar', formaction: '/together/controller/GestaoPatrocinadoresController.php') ?>
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