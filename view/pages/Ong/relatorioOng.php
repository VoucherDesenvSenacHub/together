<?php require_once './../../../services/AutenticacaoService.php';
AutenticacaoService::validarAcessoLogado(['Ong']);  ?>
<?php require_once './../../components/head.php' ?>
<?php require_once './../../components/label.php' ?>
<?php require_once './../../components/input.php' ?>
<?php require_once './../../components/acoes.php' ?>
<?php require_once './../../../model/OngModel.php' ?>
<?php require_once './../../../model/DoacaoModel.php' ?>
<?php require_once './../../components/paginacao.php' ?>
<?php
$ongModel = new OngModel();
$doacaoModel = new DoacaoModel();

$totalDoacoes = $doacaoModel->somarDoacoesRecebidasPorId($_SESSION['id']);
$totalVoluntarios = $ongModel->contarQuantidadeDeVoluntariosOngs($_SESSION['id']);
$totalDoadores = $doacaoModel->contarDoacoesOngs($_SESSION['id']);

if (!empty($_GET['dt_inicio']) || !empty($_GET['dt_final']) || !empty($_GET['pesquisar'])) {
    $hoje = date('Y-m-d');

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
    $quantidadeDePaginas = ceil($totalDoadores / 10);
}
?>

<body>
    <?php require_once "./../../components/navbar.php"; ?>
    <main class="main-container">
       

        <div class="div-wrap-width">
            <h1 class="titulo-pagina">Relatórios</h1>

            <div class="formulario-perfil">
                <div class="relatorio-ong-area-limiter">
                    <div class="relatorio-ong-statistic-cards-div">
                        <div class="relatorio-ong-card-clicks-1">
                            <div title="+1,0 mil Clicks" class="relatorio-ong-card-text-value">
                                <h3 class="h3-relatorio-ong">Doações Recebidas</h3>
                                <h2 class="h2-relatorio-ong"><?='R$ ' . number_format($totalDoacoes, 2, ',', '.') ?></h2>
                            </div>
                            <div class="relatorio-ong-card-icon-div">
                                <i class="fa-solid fa-circle-plus relatorio-ong-icon-card-1"></i>
                            </div>
                        </div>
                        <div class="relatorio-ong-card-acess-2">
                            <div title="+1,0 mil Acessos" class="relatorio-ong-card-text-value">
                                <h3 class="h3-relatorio-ong">Total de Doadores</h3>
                                <h2 class="h2-relatorio-ong"><?= $totalDoadores ?></h2>
                            </div>
                            <div class="relatorio-ong-card-icon-div">
                                <i class="fa-solid fa-user relatorio-ong-icon-card-3"></i>
                            </div>
                        </div>
                        <div class="relatorio-ong-card-volunters-3">
                            <div title="+100 Voluntários" class="relatorio-ong-card-text-value">
                                <h3 class="h3-relatorio-ong">Total de Voluntários</h3>
                                <h2 class="h2-relatorio-ong"><?= $totalVoluntarios ?></h2>
                            </div>
                            <div class="relatorio-ong-card-icon-div">
                                <i class="fa-solid fa-user relatorio-ong-icon-card-3"></i>
                            </div>
                        </div>
                    </div>
                    <form action="../../../controller/RelatorioDoacoesOngController.php" method="GET">
                        <div class="relatorio-ong-ong-options-4">
                            <input type="hidden" value="<?=$idOng ?>" name="id">
                            <a title="Baixar Relatório" class="relatorio-ong-default-icon-div" href="assets/images/Ong/relatorio.jpg" download>
                                <button style="border: none; background-color: inherit; color: #D2A680" >
                                <i id="relatorio-ong-yey-icon" class="fa-solid fa-download"></i>    
                                Baixar Relatório</button>
                            </a>
                        </div>
                    </form>
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