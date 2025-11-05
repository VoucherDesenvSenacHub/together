<?php require_once './../../../services/AutenticacaoService.php';
AutenticacaoService::validarAcessoLogado(['Usuario', 'Ong']);  ?>
<?php require_once './../../components/head.php' ?>
<?php require_once './../../components/label.php' ?>
<?php require_once './../../components/input.php' ?>
<?php require_once './../../components/acoes.php' ?>
<?php require_once './../../components/paginacao.php' ?>
<?php require_once './../../../model/UsuarioModel.php';
$usuarioModel = new UsuarioModel();


if (!empty($_GET['data-inicio']) || !empty($_GET['data-final']) || !empty($_GET['pesquisar'])) {
    $hoje = date('Y-m-d');
    $voluntariados = $usuarioModel->buscarOngsVoluntario($_SESSION['id'], $_GET['pesquisar'], $_GET['data-inicio'], $_GET['data-final'] ? $_GET['data-final'] : $hoje);
} else {
    $paginaAtual = isset($_GET['pagina']) ? (int)$_GET['pagina'] : 1;
    $limite = 10;
    $offset = ($paginaAtual - 1) * $limite;

    $voluntariados = $usuarioModel->buscarUsuarioOngsVoluntarias($_SESSION['id'], $limite, $offset);
    $quantidadeDePaginas = ceil($usuarioModel->contarUsuarioOngsVoluntarias($_SESSION['id']) / 10);
}
?>

<body>
    <?php require_once './../../components/navbar.php' ?>
    <main class="main-container">
        <div class="btn-voltar-validacao-atualizacao">
            <?php require_once './../../components/back-button.php' ?>
        </div>

        <div class="div-wrap-width">
            <form action="" class="form-filtro-data">
                <div class="superior-pagina-tabela">
                    <h1 class="titulo-pagina">Voluntariado</h1>
                </div>
            </form>
            <div class="formulario-perfil">
                <form class="filtro" action="usuarioOngsVoluntarias.php" method="GET">
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
                        <?= inputFilter('text', 'pesquisar', 'pesquisar', 'Pesquisar Razão Social') ?>
                    </div>
                </form>
                <div class="table-mobile">
                    <table class="tabela">
                        <thead>
                            <tr>
                                <th>Data de Cadastro</th>
                                <th>Razão Social</th>
                                <th>Visualizar</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($voluntariados as $voluntario): ?>
                                <tr>
                                    <td><?= $voluntario['dt_associacao'] ?? '' ?></td>
                                    <td><?= $voluntario['razao_social'] ?? '' ?></td>
                                    <td>
                                        <a href="\together\view\pages\visaoSobreaOng.php?id=<?= $voluntario['id'] ?>">
                                            <?= renderAcao('visualizar') ?>
                                        </a>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                            <?php if (empty($voluntariados)) { ?>
                                <tr>
                                    <td colspan="3" style="text-align:center;">Nenhum voluntariado encontrado.</td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
                <?php !empty($quantidadeDePaginas) ? criarPaginacao($quantidadeDePaginas) : null; ?>
            </div>
        </div>
    </main>
    <?php require_once './../../components/footer.php' ?>
</body>