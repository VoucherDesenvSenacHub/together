<?php require_once './../../components/head.php' ?>
<?php require_once './../../components/acoes.php' ?>
<?php require_once './../../components/button.php' ?>
<?php require_once './../../components/input.php' ?>
<?php require_once './../../components/label.php' ?>
<?php require_once './../../../model/OngModel.php' ?>
<?php require_once './../../components/paginacao.php'; ?>

<?php

$ongModel = new OngModel();

$id_ong = $_SESSION['id'] ?? null;
$nome_usuario_voluntario = isset($_POST['nome_usuario_voluntario']) ? trim($_POST['nome_usuario_voluntario']) : '';
$data_inicio = isset($_POST['data-inicio']) ? $_POST['data-inicio'] : null;
$data_fim = isset($_POST['data-final']) ? $_POST['data-final'] : null;

$lista = $ongModel->filtrarVoluntario($nome_usuario_voluntario, $id_ong, $data_inicio, $data_fim);

// página atual e quantidade de páginas vindo do controller
$pagina = isset($pagina) ? $pagina : 1;
$quantidadeDePaginas = isset($quantidadeDePaginas) ? $quantidadeDePaginas : 1;
?>

<body class="voluntario-ong">
    <?php require_once "../../../view/components/navbar.php"; ?>
    <main class="main-container">
        <?php require_once './../../components/back-button.php' ?>

        <div class="div-wrap-width">
            <h1 class="titulo-pagina">Voluntários da ONG</h1>
            <div class="formulario-perfil">

                <form action="voluntariosOng.php" method="POST">
                    <div class="filtro">
                        <div class="bloco-datas">
                            <div class="filtro-por-mes">
                                <?= label('data-inicio', 'Período') ?>
                                <?= inputFilter('date', 'data-inicio', 'data-inicio', $_POST['data-inicio'] ?? '') ?>
                            </div>
                            <div class="filtro-por-mes">
                                <?= label('data-final', '&nbsp;') ?>
                                <?= inputFilter('date', 'data-final', 'data-final', $_POST['data-final'] ?? '') ?>
                            </div>
                            <div class="filtro-por-mes">
                                <?= label('data-final', '&nbsp;') ?>
                                <?= botao('primary', '✔') ?>
                            </div>
                        </div>

                        <div class="bloco-pesquisa">
                            <?= label('nome_usuario_voluntario', '&nbsp;') ?>
                            <?= inputFilter('text', 'nome_usuario_voluntario', 'nome_usuario_voluntario', 'Pesquisar Usuario') ?>
                        </div>
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
                            <?php if (empty($lista)): ?>
                                <tr>
                                    <td colspan="3">Nenhum voluntário encontrado.</td>
                                </tr>
                            <?php else: ?>
                                <?php foreach ($lista as $voluntarios): ?>
                                    <tr>
                                        <td><?= $voluntarios['dt_associacao'] ?></td>
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
                <!-- Paginação -->
                <?php if ($quantidadeDePaginas > 1) { ?>
                    <?php criarPaginacao($quantidadeDePaginas); ?>
                <?php } ?>
            </div>
        </div>
    </main>
    <?php require_once "../../../view/components/footer.php"; ?>
</body>
</html>