<?php require_once './../../components/head.php' ?>
<?php require_once './../../components/label.php' ?>
<?php require_once './../../components/input.php' ?>
<?php require_once './../../components/acoes.php' ?>
<?php require_once './../../components/alert.php'; ?>
<?php require_once './../../components/paginacao.php'; ?>
<?php require_once './../../../controller/VisualizarUsuarioController.php'; ?>
<?php

// verifica se o perfil é de administrador
if (!isset($_SESSION['perfil']) || $_SESSION['perfil'] !== 'Administrador') {
    header('Location: /together/view/pages/login.php');
    exit;
}
?>

<?php
if (isset($_SESSION['erro'], $erro)) {
    showPopup($_SESSION['erro'], $erro);
    unset($_SESSION['erro'], $erro);
}

$quantidadeDePaginas = ceil($totalDoacoes / 15);

// corrige número da página
if ($quantidadeDePaginas > 0) {
    $pagina = max(1, min($pagina, $quantidadeDePaginas));
} else {
    $pagina = 1;
}

?>


<body>
    <?php require_once './../../components/navbar.php' ?>
    <main class="main-container">
        <?php require_once './../../components/back-button.php' ?>

        <div class="div-wrap-width">
            <form action="" class="form-filtro-data">
                <div class="superior-pagina-tabela">
                    <h1 class="titulo-pagina">Usuários Cadastrados</h1>
                </div>
            </form>

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
                        <?= inputFilter('text', 'pesquisar', 'pesquisar', 'Pesquisar Nome') ?>
                    </div>
                </div>

                <div class="table-mobile">
                    <table class="tabela">
                        <thead>
                            <tr>
                                <th>Data de Cadastro</th>
                                <th>Nome</th>
                                <th>Visualizar</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if (!empty($VisualizarUsuarios) && is_array($VisualizarUsuarios)) { ?>
                                <?php foreach ($VisualizarUsuarios as $visualizacoes) { ?>
                                    <tr>
                                        <td><?= date("d/m/Y", strtotime($visualizacoes['dt_nascimento'])) ?></td>
                                        <td><?= $visualizacoes['nome'] ?></td>
                                        <td>
                                            <a href="visaoDoUsuario.php">
                                                <?= renderAcao('visualizar') ?>
                                            </a>
                                        </td>
                                    </tr>
                                <?php } ?>
                            <?php } else { ?>
                                <tr>
                                    <td colspan="3" style="text-align:center;">Nenhum usuário encontrado.</td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
                <?php require_once './../../components/paginacao.php' ?>
                <?php
                if ($quantidadeDePaginas > 1) {
                    criarPaginacao($quantidadeDePaginas);
                }
                ?>
            </div>
        </div>
    </main>

    <?php require_once './../../components/footer.php' ?>
</body>