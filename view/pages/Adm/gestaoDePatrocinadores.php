<?php require_once './../../components/head.php' ?>
<?php require_once './../../components/acoes.php' ?>
<?php require_once './../../components/button.php' ?>
<?php require_once './../../components/input.php' ?>
<?php require_once './../../components/label.php' ?>

<body>
    <header>
        <?php require_once './../../components/navbar.php' ?>
    </header>

    <main class="main-container">
        <?php require_once './../../components/back-button.php' ?>

        <div class="container-botao-patrocinadores">
            <div class="titulo-pagina-tabela">
                <h1>Patrocinadores</h1>
            </div>
            <div class="filtro-botao-patrocinador">
                <?= inputFilter('text', 'filtroPatrocinador', 'filtroPatrocinador', "BUSCAR") ?>
                <div class="div-btn-patrocinador">
                    <?= botao('primary', 'Novo', 'abrir-patrocinadores') ?>
                </div>
            </div>
        </div>

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
                            <img src="\together\view\assests\images\Adm\image.png" alt="" class="logo-patrocinador">
                        </td>
                        <td class="nome-patrocinador">Senac Hub Academy</td>
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
                        <?= botao('primary', 'Cancelar', 'fechar-patrocinadores') ?>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <?php require_once './../../components/footer.php' ?>

    
</body>
</html>
