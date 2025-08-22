<?php
require "./../view/components/head.php";
?>

<body>
    <?php require_once "./../view/components/acoes.php"; ?>
    <?php require_once "./../view/components/label.php"; ?>
    <?php require_once "./../view/components/input.php"; ?>
    <?php require "./VisualizarUsuarioModel.php"; ?>
    <?php require_once './../view/components/paginacao.php'; ?>

    <?php
    // $idUsuario = (int) $_SESSION['id'];
    $pagina = isset($_GET['pagina']) ? (int) $_GET['pagina'] : 1;

    $VisualizarUsuario = new UsuarioModel();

    // quantidade total de registros
    // $totalDoacoes = count($doacaoModel->BuscarDoacoesPorID($idUsuario));
    // $quantidadeDePaginas = ceil($totalDoacoes / 15);
    
    // corrige número da página
    // if ($quantidadeDePaginas > 0) {
    //     $pagina = max(1, min($pagina, $quantidadeDePaginas));
    // } else {
    //     $pagina = 1;
    // }
    
    $visualizar = $VisualizarUsuario->DataNomeUsuario();
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
                                <?php foreach ($visualizar as $visualizacao) { ?>
                                    <tr>
                                    <td><?= date("d/m/Y", strtotime($visualizacao['dt_nascimento'])) ?></td>
                                        <td><?= $visualizacao['nome'] ?></td>
                                        <td>
                                            <a href="assests/images/usuario/historicoDoacoes.jpg" download
                                                style="color: #797777;">
                                                <?= renderAcao('baixar') ?>
                                            </a>
                                        </td>
                                    </tr>
                                <?php } ?>

                                <?php if (empty($visualizacao)) { ?>
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