<?php
require_once './../../components/head.php';
require_once './../../components/label.php';
require_once './../../components/input.php';
require_once './../../components/acoes.php';
require_once './../../../model/OngModel.php';
require_once './../../components/paginacao.php';

$idOng = $_SESSION['id_ong'] ?? 1;
$ongModel = new OngModel();

$dtInicio = $_GET['dt_inicio'] ?? null;
$dtFinal  = $_GET['dt_final'] ?? null;
$pesquisa = $_GET['pesquisar'] ?? null;

$dtInicio = !empty($dtInicio) ? $dtInicio : null;
$dtFinal  = !empty($dtFinal)  ? $dtFinal  : null;
$pesquisa = !empty($pesquisa) ? $pesquisa : null;

$lista = $ongModel->filtroDataHoraDoacoes($idOng, $dtInicio, $dtFinal);

// Filtro de pesquisa por nome do doador
if (!empty($pesquisa)) {
    $lista = array_filter($lista, function ($item) use ($pesquisa) {
        // stripos para busca case-insensitive
        return isset($item['nome']) && stripos($item['nome'], $pesquisa) !== false;
    });
    // array_filter mantém chaves originais — reindexa para facilitar o array_slice abaixo
    $lista = array_values($lista);
}

$porPagina = 10;
$totalRegistros = count($lista);
$paginaAtual = isset($_GET['pagina']) ? max(1, (int)$_GET['pagina']) : 1;
$offset = ($paginaAtual - 1) * $porPagina;

$listaPaginada = array_slice($lista, $offset, $porPagina);
$quantidadeDePaginas = ($totalRegistros > 0) ? (int) ceil($totalRegistros / $porPagina) : 0;
?>


<body>
    <?php require_once "./../../components/navbar.php"; ?>
    <main class="main-container">
        <?php require_once './../../components/back-button.php' ?>

        <div class="div-wrap-width">
            <h1 class="titulo-pagina">Relatórios</h1>

            <div class="formulario-perfil">

                <div class="relatorio-ong-ong-options-4">
                    <a id="btn-relatorio-pdf" title="Baixar Relatório" class="relatorio-ong-default-icon-div" href="#" role="button">
                        <i id="relatorio-ong-yey-icon" class="fa-solid fa-download"></i>
                        <p>Baixar Relatório</p>
                    </a>
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
                            <?= label('botao-filtrar', '&nbsp;') ?>
                            <?= botao('primary', '✔') ?>
                        </div>
                    </div>

                    <div class="bloco-pesquisa">
                        <?= label('pesquisar', '&nbsp;') ?>
                        <input
                            type="text"
                            name="pesquisar"
                            id="pesquisar"
                            placeholder="Pesquisar Doador"
                            value="<?= htmlspecialchars($_GET['pesquisar'] ?? '') ?>">
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
                            <?php if (empty($listaPaginada)): ?>
                                <tr>
                                    <td colspan="3">Nenhuma doação encontrada.</td>
                                </tr>
                            <?php else: ?>
                                <?php foreach ($listaPaginada as $doacao): ?>
                                    <tr>
                                        <td><?= !empty($doacao['dt_doacao']) ? date('d/m/Y', strtotime($doacao['dt_doacao'])) : '-' ?></td>
                                        <td><?= htmlspecialchars($doacao['nome']) ?></td>
                                        <td><?= 'R$ ' . number_format($doacao['valor'], 2, ',', '.') ?></td>
                                    </tr>
                                <?php endforeach; ?>
                            <?php endif; ?>
                        </tbody>
                    </table>
                </div>

                <?php if ($quantidadeDePaginas > 1): ?>
                    <?php criarPaginacao($quantidadeDePaginas); ?>
                <?php endif; ?>
            </div>
        </div>
    </main>
    <?php require_once "./../../components/footer.php"; ?>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.10.1/html2pdf.bundle.min.js" integrity="sha512-y3BX72fTncSNSd88GmFfkEtR2KkC1otY3sEZtQhWv5Q5bE6nSxQMhEPBjf0AJq4NLG2x8WGdJ2zyVJQ6QkUA6A==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="/together/view/assets/js/pages/relatorioOng_PDF.js?v=5"></script>
</body>

</html>