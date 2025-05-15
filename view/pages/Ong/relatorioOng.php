<?php require_once "./../../components/head.php"; ?>
<?php require_once "./../../components/acoes.php"; ?>

<body>
    <?php require_once "./../../components/navbar.php"; ?>
    
    <main class="main-container">
    <?php require_once '../../components/back-button.php'?>

        <div class="relatorio-ong-container">
            <div class="relatorio-ong-box">
                <div class="relatorio-ong-area-limiter">
                    <div class="relatorio-ong-title-div">
                        <h1 class="h1-relatorio-ong">Relatórios</h1>
                    </div>
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
                        <a title="Visualizar Doadores" class="relatorio-ong-default-icon-div" href="#">
                            <i id="relatorio-ong-yey-icon" class="fa-solid fa-eye"></i>
                            <p>Visualizar Doadores </p>
                        </a>
                        <a title="Baixar Relatório" class="relatorio-ong-default-icon-div" href="#">
                            <i id="relatorio-ong-yey-icon" class="fa-solid fa-download"></i>
                            <p>Baixar Relatório</p>
                        </a>
                    </div>
                </div>
                <div title="Gráfico do projeto" class="relatorio-ong-graphic-div">
                <table class="tabela">
                    <thead>
                        <tr>
                            <th>Data</th>
                            <th>Nome das Ongs</th>
                            <th>Status</th>
                            <th>Visualizar</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php for ($i = 0; $i < 10; $i++): ?>
                            <tr>
                                <td>xx/xx/xxxx</td>
                                <td>Vida Pet</td>
                                <td>Aguardando</td>
                                <td>
                                    <?= renderAcao('editar') ?>
                                </td>
                            </tr>
                        <?php endfor; ?>
                    </tbody>
                </table>
                </div>
            </div>
        </div>
        </div>
    </main>
    <?php require_once "./../../components/footer.php"; ?>
</body>
</html>