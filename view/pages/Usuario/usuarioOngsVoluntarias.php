<?php require_once './../../components/head.php' ?>
<?php require_once './../../components/label.php' ?>
<?php require_once './../../components/input.php' ?>
<?php require_once './../../components/acoes.php' ?>


<body>
    <?php require_once './../../components/navbar.php' ?>
    <main class="main-container">
        <div class="btn-voltar-validacao-atualizacao">
            <?php require_once './../../components/back-button.php' ?>
        </div>

        <div class="div-wrap-width">
            <form action="" class="form-filtro-data">
                <div class="superior-pagina-tabela">
                    <h1 class="titulo-pagina">Voluntariado</h1>
                    <div class="filtro-por-mes">
                        <?= label('periodo', 'Período') ?>
                        <div class="input-filtro-por-mes">
                            <?= inputFilter('date', 'data-inicio', 'data-inicio') ?>
                            <?= inputFilter('date', 'data-final', 'data-final') ?>
                        </div>
                    </div>
                </div>
            </form>
            <div class="formulario-perfil">
                <div class="table-mobile">
                    <table class="tabela">
                        <thead>
                            <tr>
                                <th>Data de Cadastro</th>
                                <th>Razão Social Da Ong</th>
                                <th>Visualizar</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $lista = ["Médicos Sem Fronteiras","Greenpeace","Amnesty International","WWF","Aldeias Infantis SOS","Cruz Vermelha","Instituto Ayrton Senna","Projeto Tamar","Fundação Abrinq","GRAACC"] ?>
                            <?php for ($i = 0; $i < 10; $i++): ?>
                                <tr>
                                    <td><?php echo $i + 10 ?>/09/2025</td>
                                    <td><?php echo $lista[$i]?></td>
                                    <td>
                                        <a href="\together\view\pages\visaoSobreaOng.php">
                                            <?= renderAcao('visualizar') ?>
                                        </a>
                                    </td>
                                </tr>
                            <?php endfor ?>
                        </tbody>
                    </table>
                </div>
                <?php require_once './../../components/paginacao.php' ?>
            </div>
        </div>
    </main>
    <?php require_once './../../components/footer.php' ?>
</body>