<?php
require "./../view/components/head.php";
?>

<body>
    <?php require_once "./../view/components/acoes.php"; ?>
    <?php require_once "./../view/components/label.php"; ?>
    <?php require_once "./../view/components/input.php"; ?>
    <?php require_once './../view/components/paginacao.php'; ?>
    <?php require_once './../view/components/alert.php'; ?>
    <?php require_once './../controller/VisualizarUsuarioController.php'; ?>

    <?php
    $erro = $_SESSION['erro'] ?? '';

    if (isset($_SESSION['erro'], $erro)) {
        showPopup($_SESSION['erro'], $erro);
        unset($_SESSION['erro'], $erro);
    }

    ?>

    <body>
        <?php require_once "./../view/components/navbar.php"; ?>
        <main class="main-container">
            <?php require_once './../view/components/back-button.php' ?>
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
                                    <th>Comprovante</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($VisualizarUsuarios as $visualizacoes) { ?>
                                    <tr>
                                        <td><?= date("d/m/Y", strtotime($visualizacoes['dt_nascimento'])) ?></td>
                                        <td><?= $visualizacoes['nome'] ?></td>
                                        <td>
                                            <a href="assests/images/usuario/historicoDoacoes.jpg" download
                                                style="color: #797777;">
                                                <?= renderAcao('baixar') ?>
                                            </a>
                                        </td>
                                    </tr>
                                <?php } ?>

                                <?php if (empty($visualizacoes)) { ?>
                                    <tr>
                                        <td colspan="4" style="text-align:center;">Nenhuma doação encontrada.</td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>

                    <!-- <?php
                    // if ($quantidadeDePaginas > 1) {
                    //     criarPaginacao($quantidadeDePaginas);
                    // }
                    ?> -->
                </div>
            </div>
        </main>
        <?php require_once "./../view/components/footer.php"; ?>
    </body>

    </html>
</body>