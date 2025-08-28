<?php require_once './../../components/head.php' ?>
<?php require_once './../../components/acoes.php' ?>
<?php require_once './../../components/button.php' ?>
<?php require_once './../../components/input.php' ?>
<?php require_once './../../components/label.php' ?>
<?php require_once __DIR__ . './../../../model/AdmModel.php';
    $admModel = new AdmModel();
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
            <div class="formulario-perfil">
                <div class="filtro">
                    <form action="gestaoDePatrocinadores.php" method="GET">

                        <div class="bloco-pesquisa">
                            <?= label('pesquisar', '&nbsp;') ?>
                            <?= $amongus = inputFilter('text', 'pesquisar', 'nome_patrocinador', 'Pesquisar Nome') ?>
                        </div>

                    </form>

                    <div class="filtro-botao-patrocinador">
                        <div class="div-btn-patrocinador">
                            <?= botao('primary', 'Adicionar', 'abrir-patrocinadores') ?>
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
                            <?php
                                $patrocinador = $admModel->findPatrocinadoresBySearch(nome_patrocinador: $a['nome']);
                                if ($patrocinador) {
                                    foreach ($patrocinador as $p) { ?>
                                        <tr>
                                            <td>
                                                <img src="<?= $p['logo'] ?>" alt="Logo" class="logo-patrocinador">
                                            </td>
                                            <td><?= $p['nome'] ?></td>
                                            
                                        </tr>
                                    <?php }
                                } else { ?>
                                    <tr>
                                        <td colspan="3">Nenhum patrocinador encontrado.</td>
                                    </tr>
                                <?php }
                             ?>
                                
                            
                        </tbody>
                    </table>
                </div>
                <?php require_once './../../components/paginacao.php' ?>
            </div>
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
                            <?php require_once './../../components/upload.php' ?>
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