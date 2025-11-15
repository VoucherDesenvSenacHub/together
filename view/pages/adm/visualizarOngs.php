<?php require_once './../../../services/AutenticacaoService.php';
AutenticacaoService::validarAcessoLogado(['Administrador']);  ?>
<?php require_once './../../components/head.php' ?>
<?php require_once './../../components/label.php' ?>
<?php require_once './../../components/input.php' ?>
<?php require_once './../../components/acoes.php' ?>
<?php require_once './../../components/alert.php'; ?>
<?php require_once './../../components/paginacao.php'; ?>
<?php require_once './../../../model/AdmModel.php'; ?>


<?php

if (!isset($_SESSION['perfil']) || $_SESSION['perfil'] !== 'Administrador') {
    header('Location: /together/view/pages/login.php');
    exit;
}


if (isset($_SESSION['erro'], $erro)) {
    showPopup($_SESSION['erro'], $erro);
    unset($_SESSION['erro'], $erro);
}


$admModel = new AdmModel();

$nome_ong = isset($_POST['nome_ong']) ? trim($_POST['nome_ong']) : '';
$data_inicio = !empty($_POST['data-inicio']) ? $_POST['data-inicio'] : null;
$data_fim = !empty($_POST['data-final']) ? $_POST['data-final'] : null;

$VisualizarOngs = $admModel->filtrarOngs($nome_ong, $data_inicio, $data_fim);


$pagina = isset($pagina) ? $pagina : 1;
$quantidadeDePaginas = isset($quantidadeDePaginas) ? $quantidadeDePaginas : 1;
?>

<body>
    <?php require_once './../../components/navbar.php' ?>
    <main class="main-container">
       

        <div class="div-wrap-width">
            <form action="" class="form-filtro-data">
                <div class="superior-pagina-tabela">
                    <h1 class="titulo-pagina">ONGs Cadastradas</h1>
                </div>
            </form>

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
                            <?php foreach ($VisualizarOngs as $ong) { ?>
                                <tr>
                                    <td><?= date("d/m/Y", strtotime($ong['dt_criacao'])) ?></td>
                                    <td><?= htmlspecialchars($ong['razao_social']) ?></td>
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