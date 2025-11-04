<?php require_once './../../components/head.php' ?>
<?php require_once './../../components/label.php' ?>
<?php require_once './../../components/input.php' ?>
<?php require_once './../../components/acoes.php' ?>
<?php require_once "../../components/alert.php"; ?>
<?php require_once "./../../../model/OngModel.php";


if (isset($_SESSION['type'], $_SESSION['message'])) {
    showPopup($_SESSION['type'], $_SESSION['message']);
    unset($_SESSION['type'], $_SESSION['message']);
}

$ongModel = new OngModel();

$data_fim = !empty($_POST['data-final']) ? $_POST['data-final'] : null;
$data_inicio = !empty($_POST['data-inicio']) ? $_POST['data-inicio'] : null;
$nome_voluntario = isset($_POST['nome_voluntario']) ? trim($_POST['nome_voluntario']) : '';


$VisualizarVoluntarios = $ongModel->filtrarVoluntarioPendente(2, $nome_voluntario, $data_inicio, $data_fim);

$pagina = isset($pagina) ? $pagina : 1;
$quantidadeDePaginas = isset($quantidadeDePaginas) ? $quantidadeDePaginas : 1;
?>

<body>
    <?php require_once "./../../components/navbar.php"; ?>
    <main class="main-container">
        <?php require_once './../../components/back-button.php' ?>

        <div class="div-wrap-width">
            <h1 class="titulo-pagina">Validação de Voluntários</h1>
            <div class="formulario-perfil">
                <form action="validacaoVoluntario.php" method="POST">
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
                <?php require_once './../../components/paginacao.php' ?>
            </div>
        </div>
    </main>
    <?php require_once "./../../components/footer.php"; ?>
</body>

</html>