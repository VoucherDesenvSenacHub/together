<?php require_once './../../components/head.php' ?>
<?php require_once './../../components/acoes.php' ?>
<?php require_once './../../components/button.php' ?>
<?php require_once './../../components/input.php' ?>
<?php require_once './../../components/label.php' ?>
<?php require_once './../../../model/PatrocinadoresModel.php' ?>
<?php require_once './../../components/upload.php' ?>
<?php 
$patrocinadoresModel = new PatrocinadoresModel();
$patrocinadores = isset($_SESSION['pesquisar_patrocinador']) ?  $patrocinadoresModel->buscaPatrocinadoresPorNome($_SESSION['pesquisar_patrocinador']) : $patrocinadoresModel->findPatrocinadores();
$preview = new ImagemPreview($imagem['id'] ?? null); 
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
            <form action="GestaoPatrocinadoresController.php" method="POST" enctype="multipart/form-data" class="formulario-perfil">
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
                            <?php for ($i = 0; $i < 10; $i++): ?>
                                <tr>
                                    <td>
                                        <img src="\together\view\assets\images\Adm\senac.png" alt="" class="logo-patrocinador">
                                    </td>
                                    <td>Senac Hub Academy</td>
                                    <td>
                                        <div class="acoes-container">
                                            <?= renderAcao('editar', '', 'abrir-patrocinadores') ?>
                                            <?= renderAcao('deletar') ?>
                                        </div>
                                    </td>
                                </tr>
                            <?php endfor; ?>
                        </tbody>
                    </table>
                </div>
                <?php require_once './../../components/paginacao.php' ?>
            </form>
            <div class="modal-overlay" id="modal-overlay-patrocinadores">
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
                                <?php $preview->preview() ?>
                            </div>
                        </div>
                    </div>
                    <div class="botao-modal-patrocinadores">
                        <div class="modal-botoes">
                            <?= botao('cancelar', 'Cancelar', 'fechar-patrocinadores') ?>
                            <?= botao('salvar', 'Salvar', 'fechar-patrocinadores') ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </main>

    <?php require_once './../../components/footer.php' ?>


</body>

</html>