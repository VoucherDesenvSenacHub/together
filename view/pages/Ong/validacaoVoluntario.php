<?php require_once './../../../services/AutenticacaoService.php';
AutenticacaoService::validarAcessoLogado(['Ong']);  ?>
<?php require_once './../../components/head.php' ?>
<?php require_once './../../components/label.php' ?>
<?php require_once './../../components/input.php' ?>
<?php require_once './../../components/acoes.php' ?>
<?php require_once "../../components/alert.php"; ?>
<?php require_once './../../components/paginacao.php' ?>
<?php require_once "./../../../model/OngModel.php";

if (isset($_SESSION['type'], $_SESSION['message'])) {
    showPopup($_SESSION['type'], $_SESSION['message']);
    unset($_SESSION['type'], $_SESSION['message']);
}

$ongModel = new OngModel();
$idOng = $ongModel->buscarOngPorIdUsuario($_SESSION['id'])['id'] ?? null;
$_SESSION['id_ong'] = $idOng;

if (!empty($_GET['data-inicio']) || !empty($_GET['data-final']) || !empty($_GET['pesquisar'])) {
    $hoje = date('Y-m-d');
    $dataInicio = $_GET['data-inicio'] ?? null;
    $dataFinal = $_GET['data-final'] ?: $hoje;
    $pesquisar = trim($_GET['pesquisar'] ?? '');

    $VisualizarVoluntarios = $ongModel->filtrarVoluntarioPendente($_SESSION['id_ong'], $pesquisar, $data_inicio, $data_fim);
} else {
    $paginaAtual = max((int)($_GET['pagina'] ?? 1), 1);
    $limite = 10;
    $offset = ($paginaAtual - 1) * $limite;

    $VisualizarVoluntarios = $ongModel->buscarVoluntarioDaOng($_SESSION['id_ong'], $limite, $offset);
    $quantidadeDePaginas = ceil($ongModel->contarVoluntariosPendentes($_SESSION['id_ong']) / 10);
}?>

<body>
    <?php require_once "./../../components/navbar.php"; ?>
    <main class="main-container">
       
        <div class="div-wrap-width">
            <h1 class="titulo-pagina">Validação de Voluntários</h1>
            <div class="formulario-perfil">
                <form action="validacaoVoluntario.php" method="GET">
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
                            <?= label('nome_voluntario', '&nbsp;') ?>
                            <?= inputFilter('text', 'nome_voluntario', 'nome_voluntario', 'Pesquisar Razão Social') ?>
                        </div>
                    </div>
                </form>
                <div class="table-mobile">
                    <table class="tabela">
                        <thead>
                            <tr>
                                <th>Data</th>
                                <th>Voluntário</th>
                                <th>Status</th>
                                <th>Visualizar</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if (!empty($VisualizarVoluntarios) && is_array($VisualizarVoluntarios)) { ?>
                                <?php foreach ($VisualizarVoluntarios as $voluntario) { ?>
                                    <tr>
                                        <td><?= date("d/m/Y", strtotime($voluntario['dt_associacao'])) ?></td>
                                        <td><?= htmlspecialchars($voluntario['nome']) ?></td>
                                        <td>
                                            <?php if($voluntario["status_validacao"] == 'pendente'){echo "Pendente";}else{echo "Aprovado";} ?>
                                        </td>
                                        <td>
                                            <a href="visualizarVoluntarios.php?id=<?= $voluntario['id_voluntario'] ?? '' ?>">
                                                <?= renderAcao('visualizar') ?>
                                            </a>
                                        </td>
                                    </tr>
                                <?php } ?>
                            <?php } else { ?>
                                <tr>
                                    <td colspan="4" style="text-align:center;">Nenhum Voluntário encontrado.</td>
                                </tr>
                            <?php } ?>
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