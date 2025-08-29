<?php require_once './../../components/head.php' ?>
<?php require_once './../../components/acoes.php' ?>
<?php require_once './../../components/button.php' ?>
<?php require_once './../../components/input.php' ?>
<?php require_once './../../components/label.php' ?>
<?php require_once __DIR__ . './../../../model/OngModel.php';
$ongModel = new OngModel();

if ($_SERVER['REQUEST_METHOD'] === 'GET') {

    $nome_usuario = $_GET['nome_usuario'] ?? '';
    $listaVoluntarios = $ongModel->findVoluntarioBySearch($nome_usuario);
}
 else {
    $listaVoluntarios = "";
}

?>

<body class="voluntario-ong">
    <?php require_once "../../../view/components/navbar.php"; ?>
    <main class="main-container">
        <?php require_once './../../components/back-button.php' ?>

        <div class="div-wrap-width">
            <h1 class="titulo-pagina">Voluntários da ONG</h1>
            <div class="formulario-perfil">
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

                    <form action="voluntariosOng.php" method="GET">

                        <div class="bloco-pesquisa">
                            <?= label('pesquisar', '&nbsp;') ?>
                            <?= inputFilter('text', 'pesquisar', 'nome_usuario', 'Pesquisar Voluntário') ?>
                        </div>

                    </form>
                </div>
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
                            <?php
                            if ($listaVoluntarios) {
                                foreach ($listaVoluntarios as $lv) { ?>
                                    <tr>
                                        <td><?= date('d/m/Y', strtotime($lv['dt_associacao'])) ?></td>
                                        <td><?= $lv['nome'] ?></td>
                                        <td>
                                        </td>
                                    </tr>
                                <?php }
                            } else { ?>
                                <tr>
                                    <td colspan="4">Nenhum Voluntario encontrado.</td>
                                </tr>
                            <?php } ?>
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