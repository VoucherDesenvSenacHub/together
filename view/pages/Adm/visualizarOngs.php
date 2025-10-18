<?php require_once './../../components/head.php' ?>
<?php require_once './../../components/label.php' ?>
<?php require_once './../../components/input.php' ?>
<?php require_once './../../components/acoes.php' ?>
<?php require_once './../../components/alert.php'; ?>
<?php require_once './../../components/paginacao.php'; ?>
<?php require_once './../../../model/AdmModel.php'; ?>


<?php
// verifica se o perfil é de administrador
if (!isset($_SESSION['perfil']) || $_SESSION['perfil'] !== 'Administrador') {
    header('Location: /together/view/pages/login.php');
    exit;
}

// mostra popup de erro se existir
if (isset($_SESSION['erro'], $erro)) {
    showPopup($_SESSION['erro'], $erro);
    unset($_SESSION['erro'], $erro);
}


$VisualizarOngModel = new AdmModel();

$VisualizarOngs = [];

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['nome_ong'])) {
    $nome_ong = trim($_POST['nome_ong']);
    $VisualizarOngs = $VisualizarOngModel->findOngBySearch($nome_ong);
} else {
    $VisualizarOngs = $VisualizarOngModel->findOngBySearch('');
}



$VisualizarOngs = $VisualizarOngModel->listOngsAprovadas();
// $totalOngs = $VisualizarOngModel->contarUsuarios("Ong");
// $VisualizarOngs = $VisualizarOngModel->listarUsuariosPaginado($porPagina, $offset, "Ong");
// $quantidadeDePaginasOngs = ceil($totalOngs / $porPagina);



// página atual e quantidade de páginas vindo do controller
$pagina = isset($pagina) ? $pagina : 1;
$quantidadeDePaginas = isset($quantidadeDePaginas) ? $quantidadeDePaginas : 1;
?>

<body>
    <?php require_once './../../components/navbar.php' ?>
    <main class="main-container">
        <?php require_once './../../components/back-button.php' ?>

        <div class="div-wrap-width">
            <form action="" class="form-filtro-data">
                <div class="superior-pagina-tabela">
                    <h1 class="titulo-pagina">ONGs Cadastradas</h1>
                </div>
            </form>

            <div class="formulario-perfil">
                <div class="filtro">
                    <form action="visualizarOngs.php" method="POST">
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
                    </form>

                    <form action="visualizarOngs.php" method="POST">

                        <div class="bloco-pesquisa">
                            <?= label('nome_ong', '&nbsp;') ?>
                            <?= inputFilter('text', 'nome_ong', 'nome_ong', 'Pesquisar Razão Social') ?>
                        </div>

                    </form>

                </div>

                <div class="table-mobile">
                    <table class="tabela">
                        <thead>
                            <tr>
                                <th>Data de Cadastro</th>
                                <th>Razão Social</th>
                                <th>Visualizar</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if (!empty($VisualizarOngs) && is_array($VisualizarOngs)) { ?>
                                <form action="visualizarOngs.php" method="GET">

                                    <?php foreach ($VisualizarOngs as $ong) { ?>
                                        <tr>
                                            <td><?= date("d/m/Y", strtotime($ong['dt_criacao'])) ?></td>
                                            <td><?= $ong['razao_social'] ?></td>
                                            <td>
                                                <a href="visaoDoUsuario.php?id=<?= $ong['id'] ?? '' ?>">
                                                    <?= renderAcao('visualizar') ?>
                                                </a>
                                            </td>
                                        </tr>
                                    <?php } ?>
                                    <?php } else { ?>
                                        <tr>
                                            <td colspan="3" style="text-align:center;">Nenhuma ONG encontrada.</td>
                                        </tr>
                                    <?php } ?>
                                </form>
                        </tbody>
                    </table>
                </div>

                <!-- Paginação -->
                <?php if ($quantidadeDePaginas > 1) { ?>
                    <?php criarPaginacao($quantidadeDePaginas); ?>
                <?php } ?>

            </div>
        </div>
    </main>

    <?php require_once './../../components/footer.php' ?>
</body>