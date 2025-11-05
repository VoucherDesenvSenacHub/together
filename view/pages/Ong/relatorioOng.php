<?php require_once './../../components/head.php' ?>
<?php require_once './../../components/label.php' ?>
<?php require_once './../../components/input.php' ?>
<?php require_once './../../components/acoes.php' ?>
<?php require_once './../../../model/OngModel.php' ?>
<?php require_once './../../components/paginacao.php' ?>
<?php
$ongModel = new OngModel();

if (!empty($_GET['dt_inicio']) || !empty($_GET['dt_final']) || !empty($_GET['pesquisar'])) {
    $hoje = date('d/m/Y');

    $doacoes = $ongModel->buscarDoacoes(
        $_SESSION['id'],
        $_GET['pesquisar'],
        $_GET['dt_inicio'],
        $_GET['dt_final'] ? $_GET['dt_final'] : $hoje
    );
} else {
    $paginaAtual = isset($_GET['pagina']) ? (int)$_GET['pagina'] : 1;
    $limite = 10;
    $offset = ($paginaAtual - 1) * $limite;

    $doacoes = $ongModel->buscarTodasDoacoesOng($_SESSION['id'], $limite, $offset);
    $quantidadeDePaginas = ceil($ongModel->contarDoacoesOngs($_SESSION['id']) / 10);
}
?>

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
                        <a title="Baixar Relatório" class="relatorio-ong-default-icon-div" href="assets/images/Ong/relatorio.jpg" download>
                            <i id="relatorio-ong-yey-icon" class="fa-solid fa-download"></i>
                            <p>Baixar Relatório</p>
                        </a>
                    </div>
                </div>
                <form class="filtro" method="GET">
                    <div class="bloco-datas">
                        <div class="filtro-por-mes">
                            <?= label('data-inicio', 'Período') ?>
                            <?= inputDefault('date', 'data-inicio', 'dt_inicio', $_GET['dt_inicio'] ?? '') ?>
                        </div>
                        <div class="filtro-por-mes">
                            <?= label('data-final', '&nbsp;') ?>
                            <?= inputDefault('date', 'data-final', 'dt_final', $_GET['dt_final'] ?? '') ?>
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
                </form>

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
                            <?php if (empty($doacoes)): ?>
                                <tr>
                                    <td colspan="3">Nenhuma doação encontrada.</td>
                                </tr>
                            <?php else: ?>
                                <?php foreach ($doacoes as $doacao): ?>
                                    <tr>
                                        <td><?= date('d/m/Y', strtotime($doacao['dt_doacao'])) ?></td>
                                        <td><?= $doacao['nome'] ?></td>
                                        <td><?= 'R$ ' . number_format($doacao['valor'], 2, ',', '.') ?></td>
                                    </tr>
                                <?php endforeach; ?>
                            <?php endif; ?>
                        </tbody>
                    </table>
                </div>
                <?php !empty($quantidadeDePaginas) ? criarPaginacao($quantidadeDePaginas) : null; ?>
            </div>
        </div>
    </main>
    <?php require_once "./../../components/footer.php"; ?>
</body>

</html>