<?php require_once './../../components/head.php' ?>
<?php require_once './../../components/acoes.php' ?>
<?php require_once './../../components/button.php' ?>
<?php require_once './../../components/input.php' ?>
<?php require_once './../../components/label.php' ?>
<?php require_once './../../../model/AdmModel.php';

$admModel = new AdmModel();
if ($_SERVER['REQUEST_METHOD'] === 'GET') {

    $nome_ong = $_GET['nome_ong'] ?? '';
    $listaOngs = $admModel->findOngBySearch($nome_ong);
}
 else {
    $listaOngs = "";
}
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

                            <?php
                            if ($listaOngs) {
                                foreach ($listaOngs as $o) { ?>
                                    <tr>
                                        <td><?= date('d/m/Y', strtotime($o['dt_fundacao'])) ?></td>
                                        <td><?= $o['razao_social'] ?></td>
                                        <td>
                                            <?php if ($o['status_validacao'] === '0'): ?>
                                                Chico gay
                                            <?php else: ?>
                                                Chico Muito Gay
                                            <?php endif; ?>
                                        </td>
                                        <td>
                                        </td>
                                    </tr>
                                <?php }
                            } else { ?>
                                <tr>
                                    <td colspan="4">Nenhuma ONG encontrada.</td>
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