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

$doacoes = $doacaoModel->BuscarDoacoesPorID($idUsuario, $pagina);
?>

<body>
    <?php require_once "./../../components/navbar.php"; ?>
    <main class="main-container">
        <?php require_once './../../components/back-button.php' ?>
        <div class="div-wrap-width">
            <h1 class="titulo-pagina">Histórico de Doações</h1>
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

                    <div class="bloco-pesquisa">
                        <?= label('pesquisar', '&nbsp;') ?>
                        <?= inputFilter('text', 'pesquisar', 'pesquisar', "Pesquisar Ong&#39s") ?>
                    </div>
                </div>

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
                            <?php foreach ($doacoes as $doacao){ ?>
                                <tr>
                                    <td><?= $doacao['dt_doacao'] ?></td>
                                    <td><?= $doacao['razao_social']?></td>
                                    <td><?= "R$ " . number_format($doacao['valor'], 2, ',', '.') ?></td>
                                    <td>
                                        <a href="assests/images/usuario/historicoDoacoes.jpg" download style="color: #797777;">
                                            <?= renderAcao('baixar') ?>
                                        </a>
                                    </td>
                                </tr>
                            <?php } ?>

                            <?php if (empty($doacoes)) { ?>
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
