<?php require_once './../../components/head.php' ?>
<?php require_once './../../components/acoes.php' ?>
<?php require_once './../../components/button.php' ?>
<?php require_once './../../components/input.php' ?>
<?php require_once './../../components/label.php' ?>
<?php require_once './../../../model/OngModel.php' ?>

<?php
// $idOng = $_SESSION['id_ong'] ?? null;
$idOng = 1; // Temporário para testes
$ongModel = new OngModel();

$dtInicio = $_GET['dt_inicio'] ?? null;
$dtFinal = $_GET['dt_final'] ?? null;

$dtInicio = !empty($dtInicio) ? $dtInicio : null;
$dtFinal = !empty($dtFinal) ? $dtFinal : null;

$lista = $ongModel->filtroDataHoraVoluntarios($idOng, $dtInicio, $dtFinal);


?>

<body class="voluntario-ong">
    <?php require_once "../../../view/components/navbar.php"; ?>
    <main class="main-container">
        <?php require_once './../../components/back-button.php' ?>

        <div class="div-wrap-width">
            <h1 class="titulo-pagina">Voluntários da ONG</h1>
            <div class="formulario-perfil">
            <form class="filtro" method="GET">
                <div class="bloco-datas">
                    <div class="filtro-por-mes">
                        <?= label('data-inicio', 'Período') ?>
                        <?= inputDefault('date', 'data-inicio', 'dt_inicio', $_GET['dt_inicio'] ?? null) ?>
                    </div>
                    <div class="filtro-por-mes">
                        <?= label('data-final', '&nbsp;') ?>
                        <?= inputDefault('date', 'data-final', 'dt_final', $_GET['dt_final'] ?? null) ?>
                    </div>
                    <div class="filtro-por-mes">
                        <?= label('data-final', '&nbsp;') ?>
                        <?= botao('primary', '✔') ?>
                    </div>
                </div>

                <div class="bloco-pesquisa">
                    <?= label('pesquisar', '&nbsp;') ?>
                    <?= inputFilter('text', 'pesquisar', 'pesquisar', 'Pesquisar Voluntário') ?>
                </div>
            </form>
                <div class="table-mobile">
                    <table class="tabela">
                        <thead>
                            <tr>
                                <th>Data</th>
                                <th>Voluntário</th>
                                <th>Visualizar</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if(empty($lista)): ?>
                                <tr>
                                    <td colspan="3">Nenhum voluntário encontrado.</td>
                                </tr>
                            <?php else: ?>
                                <?php foreach($lista as $voluntarios): ?>
                                    <tr>
                                        <td><?= $voluntarios['dt_associacao']?></td>
                                        <td><?= $voluntarios['nome'] ?></td>
                                        <td>
                                            <a href="/together/view/pages/Ong/visualizarVoluntarioCadastrado.php">
                                                <?= renderAcao('visualizar') ?>
                                            </a>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            <?php endif; ?>
                        </tbody>
                    </table>
                </div>
                <?php require_once './../../components/paginacao.php' ?>
            </div>
        </div>
    </main>

    <?php require_once "../../../view/components/footer.php"; ?>
</body>

</html>