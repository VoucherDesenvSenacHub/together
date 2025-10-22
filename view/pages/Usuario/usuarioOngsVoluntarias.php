<?php require_once './../../components/head.php' ?>
<?php require_once './../../components/label.php' ?>
<?php require_once './../../components/input.php' ?>
<?php require_once './../../components/acoes.php' ?>
<?php require_once './../../components/paginacao.php' ?>
<?php require_once './../../../model/UsuarioModel.php';
$usuarioModel = new UsuarioModel();

$paginaAtual = isset($_GET['pagina']) ? (int)$_GET['pagina'] : 1;
$limite = 10;
$offset = ($paginaAtual - 1) * $limite;

$voluntariados = $usuarioModel->buscarUsuarioOngsVoluntarias($_SESSION['id'], $limite, $offset);

$quantidadeDePaginas = count($voluntariados); 
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
                        <?= inputFilter('text', 'pesquisar', 'pesquisar', 'Pesquisar Razão Social') ?>
                    </div>
                </div>
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
                <?php criarPaginacao($quantidadeDePaginas); ?>
            </div>
        </div>
    </main>
    <?php require_once './../../components/footer.php' ?>
</body>