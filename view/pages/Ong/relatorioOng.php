<?php require_once './../../components/head.php' ?>
<?php require_once './../../components/label.php' ?>
<?php require_once './../../components/input.php' ?>
<?php require_once './../../components/acoes.php' ?>

<body>
    <?php require_once "./../../components/navbar.php"; ?>
    <main class="main-container">
        <?php require_once './../../components/back-button.php' ?>

        <div class="div-wrap-width">
            <h1 class="titulo-pagina">Relatórios</h1>

            <div class="formulario-perfil">
                <div class="relatorio-ong-area-limiter">
                    <div class="relatorio-ong-statistic-cards-div">
                        <div class="relatorio-ong-card-clicks-1">
                            <div title="+1,0 mil Clicks" class="relatorio-ong-card-text-value">
                                <h3 class="h3-relatorio-ong">Clicks para Doação</h3>
                                <h2 class="h2-relatorio-ong">2,2 mil</h2>
                                <div class="relatorio-ong-statistic-green-text">
                                    <i class="fa-solid fa-arrow-up"></i>
                                    <p class="p-relatorio-ong">1,0 mil em Junho</p>
                                </div>
                            </div>
                            <div class="relatorio-ong-card-icon-div">
                                <i class="fa-solid fa-circle-plus relatorio-ong-icon-card-1"></i>
                            </div>
                        </div>
                        <div class="relatorio-ong-card-acess-2">
                            <div title="+1,0 mil Acessos" class="relatorio-ong-card-text-value">
                                <h3 class="h3-relatorio-ong">Acessos na Página</h3>
                                <h2 class="h2-relatorio-ong">1,6 mil</h2>
                                <div class="relatorio-ong-statistic-green-text">
                                    <i class="fa-solid fa-arrow-up"></i>
                                    <p class="p-relatorio-ong">1,0 mil em Junho</p>
                                </div>
                            </div>
                            <div class="relatorio-ong-card-icon-div">
                                <i class="fa-regular fa-message relatorio-ong-icon-card-2"></i>
                            </div>
                        </div>
                        <div class="relatorio-ong-card-volunters-3">
                            <div title="+100 Voluntários" class="relatorio-ong-card-text-value">
                                <h3 class="h3-relatorio-ong">Adesão de Voluntários</h3>
                                <h2 class="h2-relatorio-ong">215,0</h2>
                                <div class="relatorio-ong-statistic-green-text">
                                    <i class="fa-solid fa-arrow-up"></i>
                                    <p class="p-relatorio-ong">100 em Junho</p>
                                </div>
                            </div>
                            <div class="relatorio-ong-card-icon-div">
                                <i class="fa-solid fa-user relatorio-ong-icon-card-3"></i>
                            </div>
                        </div>
                    </div>
                    <div class="relatorio-ong-ong-options-4">
                        <a title="Baixar Relatório" class="relatorio-ong-default-icon-div" href="assests/images/Ong/relatorio.jpg" download>
                            <i id="relatorio-ong-yey-icon" class="fa-solid fa-download"></i>
                            <p>Baixar Relatório</p>
                        </a>
                    </div>
                </div>
                <div class="filtro">
                    <div class="bloco-datas">
                        <div class="filtro-por-mes">
                            <?= label('data-inicio', 'Período') ?>
                            <?= inputFilter('date', 'data-inicio', 'data-inicio') ?>
                        </div>
                        <div class="filtro-por-mes">
                            <?= label('data-final', '&nbsp;') ?>
                            <?= inputFilter('date', 'data-final', 'data-final') ?>
                        </div>
                        <div class="filtro-por-mes">
                            <?= label('data-final', '&nbsp;') ?>
                            <?= botao('primary', '✔') ?>
                        </div>
                    </div>

                    <div class="bloco-pesquisa">
                        <?= label('pesquisar', '&nbsp;') ?>
                        <?= inputFilter('text', 'pesquisar', 'pesquisar', 'Pesquisar Doador') ?>
                    </div>
                </div>

                <div class="table-mobile">
                    <table class="tabela">
                        <thead>
                            <tr>
                                <th>Data</th>
                                <th>Doador</th>
                                <th>Valor</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $lista = ["Ana Clara", "Bruno Silva", "Carlos Eduardo", "Daniela Souza", "Eduardo Lima", "Fernanda Alves", "Gabriel Rocha", "Helena Costa", "Isabela Martins", "João Pedro"]; ?>
                            <?php for ($i = 0; $i < 10; $i++): ?>
                                <tr>
                                    <td><?= $i + 10 ?>/05/2025</td>
                                    <td><?= $lista[$i] ?></td>
                                    <td><?= "R$" . ($i + 2) * 10 ?></td>
                                </tr>
                            <?php endfor; ?>
                        </tbody>
                    </table>
                </div>
                <?php require_once './../../components/paginacao.php' ?>
            </div>
        </div>
    </main>
    <?php require_once "./../../components/footer.php"; ?>
</body>

</html>