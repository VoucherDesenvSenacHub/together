<?php require_once './../../../services/AutenticacaoService.php';
AutenticacaoService::validarAcessoLogado(['Usuario', 'Ong']);  ?>
<?php require_once "./../../components/head.php"; ?>
<?php require_once "./../../components/acoes.php"; ?>
<?php require_once "./../../components/label.php"; ?>
<?php require_once "./../../components/input.php"; ?>
<?php require_once "./../../../model/DoacaoModel.php"; ?>
<?php require_once './../../components/paginacao.php'; ?>

<?php
$idUsuario = (int)$_SESSION['id'];
$pagina = isset($_GET['pagina']) ? (int)$_GET['pagina'] : 1;

$doacaoModel = new DoacaoModel();

// quantidade total de registros
$totalDoacoes = count($doacaoModel->BuscarDoacoesPorID($idUsuario));
$quantidadeDePaginas = ceil($totalDoacoes / 15);

// corrige número da página
if ($quantidadeDePaginas > 0) {
    $pagina = max(1, min($pagina, $quantidadeDePaginas));
} else {
    $pagina = 1;
}

$nome_ong = isset($_POST['nome_ong']) ? trim($_POST['nome_ong']) : '';
$data_inicio = !empty($_POST['data-inicio']) ? $_POST['data-inicio'] : null;
$data_fim = !empty($_POST['data-final']) ? $_POST['data-final'] : null;

$doacoesDoUsuario = $doacaoModel->filtrarDoacao($idUsuario, $nome_ong, $data_inicio, $data_fim);

?>

<body>
    <?php require_once "./../../components/navbar.php"; ?>
    <main class="main-container">
        <?php require_once './../../components/back-button.php' ?>
        <div class="div-wrap-width">
            <h1 class="titulo-pagina">Histórico de Doações</h1>
            <div class="formulario-perfil">
                <form action="visualizarOngs.php" method="POST">
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
                            <?= inputFilter('text', 'pesquisar', 'nome_ong', "Pesquisar Ong&#39s") ?>
                        </div>
                    </div>
                </form>
                <div class="table-mobile">
                    <table class="tabela">
                        <thead>
                            <tr>
                                <th>Data</th>
                                <th>ONGS</th>
                                <th>Doações</th>
                                <th>Comprovante</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($doacoesDoUsuario as $doacao){ ?>
                                <tr>
                                    <td><?= date("d/m/Y", strtotime($doacao['dt_doacao'])) ?></td>
                                    <td><?= htmlspecialchars($doacao['razao_social']) ?></td>
                                    <td><?= "R$ " . number_format($doacao['valor'], 2, ',', '.') ?></td>
                                    <td>
                                        <a href="assets/images/usuario/historicoDoacoes.jpg" download style="color: #797777;">
                                            <?= renderAcao('baixar') ?>
                                        </a>
                                    </td>
                                </tr>
                            <?php } ?>

                            <?php if (empty($doacoesDoUsuario)) { ?>
                                <tr>
                                    <td colspan="4" style="text-align:center;">Nenhuma doação encontrada.</td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>

                <?php 
                if ($quantidadeDePaginas > 1) {
                    criarPaginacao($quantidadeDePaginas);
                }
                ?>
            </div>
        </div>
    </main>
    <?php require_once "./../../components/footer.php"; ?>
</body>
</html>
