<?php require_once './../../../services/AutenticacaoService.php';
AutenticacaoService::validarAcessoLogado(['Administrador']);  ?>
<?php require_once './../../components/head.php';
require_once './../../components/acoes.php';
require_once './../../components/button.php';
require_once './../../components/input.php';
require_once './../../components/label.php';
require_once './../../../model/AdmModel.php';
require_once '../../components/alert.php';
require_once __DIR__ . "/../../../model/OngsEmAnaliseModel.php";
require_once './../../components/paginacao.php';

if (isset($_SESSION['type'], $_SESSION['message'])) {
    showPopup($_SESSION['type'], $_SESSION['message']);
    unset($_SESSION['type'], $_SESSION['message']);
}

$admModel = new AdmModel();
if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    $data_inicio = $_GET['data-inicio'] ?? null;
    $data_fim = $_GET['data-final'] ?? null;
    $pesquisa = $_GET['nome_ong'] ?? '';
}
?>


<?php


$buscarOngsEmAnaliseModel = new BuscarOngsEmAnaliseModel();

// Captura filtros do formulário via GET
$dataInicio = $_GET['data-inicio'] ?? null;
$dataFim    = $_GET['data-final'] ?? null;
// Página atual e itens por página para paginação
$paginaAtual = isset($_GET['pagina']) ? (int) $_GET['pagina'] : 1;
$paginaAtual = max(1, $paginaAtual);  // Garante que o valor mínimo seja 1
$itensPorPagina = 6;
// Total de registros para cálculo da paginação
$totalRegistros = $buscarOngsEmAnaliseModel->contarOngsEmAnalise($dataInicio, $dataFim, $pesquisa);
$quantidadeDePaginas = ceil($totalRegistros / $itensPorPagina);
// Busca os dados da página atual
$ongsEmAnalise = $buscarOngsEmAnaliseModel->BuscarOngsEmAnalise($dataInicio, $dataFim, $pesquisa, $paginaAtual, $itensPorPagina);
?>

<body>
    <?php require_once "../../../view/components/navbar.php"; ?>
    <main class="main-container">
       
        <div class="div-wrap-width">
            <div class="titulo-pagina">
                <h1>Validação de ONGs</h1>
            </div>
            <div class="formulario-perfil">
                <div class="filtro">
                    <form method="GET" class="filtro" id="filtro-form">
                        <div class="bloco-datas">
                            <div class="filtro-por-mes">
                                <?= label('data-inicio', 'Período') ?>
                                <?= inputFilter('date', 'data-inicio', 'data-inicio', '', $dataInicio) ?>
                            </div>
                            <div class="filtro-por-mes">
                                <?= label('data-final', '&nbsp;') ?>
                                <?= inputFilter('date', 'data-final', 'data-final', '', $dataFim) ?>
                            </div>
                            <div class="filtro-por-mes">
                                <?= label('data-final', '&nbsp;') ?>
                                <?= botao('primary', '✔') ?>
                            </div>
                        </div>
                    </form>
                    <form action="OngsAValidar.php" method="GET">
                        <div class="bloco-pesquisa">
                            <?= label('nome_ong', '&nbsp;') ?>
                            <?= inputFilter('text', 'nome_ong', 'nome_ong', 'Pesquisar Nome') ?>
                        </div>
                    </form>
                </div>
                <div class="table-mobile">
                    <table class="tabela">
                        <thead>
                            <tr>
                                <th>Data</th>
                                <th>Nome</th>
                                <th>Status</th>
                                <th>Visualizar</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <?php if (!$ongsEmAnalise): ?>
                                    <td colspan="4">Nenhuma ONG encontrada.</td>
                                <?php else: ?>
                                    <?php foreach ($ongsEmAnalise as $ong): ?>
                            <tr>
                                <td>
                                    <?= !empty($ong['dt_criacao']) ? date('d/m/Y', strtotime($ong['dt_criacao'])) : '-' ?>
                                </td>
                                <td><?= htmlspecialchars($ong['razao_social'], ENT_QUOTES, 'UTF-8') ?></td>
                                <td><?= htmlspecialchars($ong['status_validacao'], ENT_QUOTES, 'UTF-8') ?></td>
                                <td>
                                    <a href="validarCadastroOng.php?id=<?= $ong['id'] ?>">
                                        <?= renderAcao('visualizar') ?>
                                    </a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    <?php endif; ?>
                        </tbody>
                    </table>
                </div>
                <?php criarPaginacao($quantidadeDePaginas); ?>
            </div>
        </div>
    </main>
    <?php require_once "../../../view/components/footer.php"; ?>
</body>

</html>