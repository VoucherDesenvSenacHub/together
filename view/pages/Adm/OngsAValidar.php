<?php 
require_once './../../components/head.php';
require_once './../../components/acoes.php';
require_once './../../components/button.php';
require_once './../../components/input.php';
require_once './../../components/label.php';
require_once __DIR__. "/../../../model/BuscarOngsEmAnaliseModel.php";
require_once './../../components/paginacao.php';


$buscarOngsEmAnaliseModel = new BuscarOngsEmAnaliseModel();

// Captura filtros do formulário via GET
$dataInicio = $_GET['data-inicio'] ?? null;
$dataFim    = $_GET['data-final'] ?? null;
$pesquisa   = $_GET['pesquisar'] ?? null;

$ongsEmAnalise = $buscarOngsEmAnaliseModel->BuscarOngsEmAnalise($dataInicio, $dataFim, $pesquisa);
?>

<body>
    <?php require_once "../../../view/components/navbar.php"; ?>
    <main class="main-container">
        <?php require_once './../../components/back-button.php' ?>

        <div class="div-wrap-width">
            <div class="titulo-pagina">
                <h1>Validação de ONGs</h1>
            </div>

            <div class="formulario-perfil">
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

                    <div class="bloco-pesquisa">
                        <?= label('pesquisar', '&nbsp;') ?>
                        <?= inputFilter('text', 'pesquisar', 'pesquisar', 'Pesquisar Nome', $pesquisa) ?>
                    </div>
                </form>

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
                            <?php if (!empty($ongsEmAnalise)): ?>
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
                            <?php else: ?>
                                <tr>
                                    <td colspan="4">Nenhuma ONG em análise</td>
                                </tr>
                            <?php endif; ?>
                        </tbody>
                    </table>
                </div>

                <?php require_once './../../components/paginacao.php' ?>
            </div>
        </div>
    </main>

    <?php require_once "../../../view/components/footer.php"; ?>

    <!-- JS do filtro automático com debounce -->
    <script src="/together/view/assests/js/pages/ong-filtro.js"></script>
</body>
</html>
