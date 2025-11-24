<?php require_once "./../components/head.php"; ?>
<?php require_once "./../components/button.php" ?>
<?php require_once "./../components/label.php" ?>
<?php require_once "./../components/input.php" ?>
<?php require_once "./../components/textarea.php" ?>
<?php require_once './../components/card.php' ?>
<?php
require_once './../components/paginacao.php';
require_once "./../../model/CategoriaOngModel.php";


require_once "./../../model/OngModel.php";
$categoriaModel = new CategoriaOngModel();
$categorias = $categoriaModel->getAll();
$categoriasSelecionadas = [];
if (isset($_SESSION['buscaDeOng'])) {
    foreach ($_SESSION['buscaDeOng'] as $selecionado) {
        $categoriasSelecionadas[] = $selecionado['id'];
    }
}
$ongModel = new OngModel();
$pesquisa = '';

if (isset($_SESSION['nome_ong_pesquisa'])) {
    $pesquisa = $_SESSION['nome_ong_pesquisa'] ?? '';
    if (count($categoriasSelecionadas) > 0) {
        $ongs = $ongModel->buscarTodasOngs($categoriasSelecionadas);
    } else {
        $ongs = $ongModel->buscarTodasOngs();
    }
    foreach ($ongs as $chave => $ong) {
        if (!str_contains(strtolower($ong['razao_social']), strtolower($pesquisa))) {
            unset($ongs[$chave]);
        }
    }
} else {
    $ongs = $ongModel->buscarTodasOngs($categoriasSelecionadas);
}

$quantidadeDePaginas = ceil(count($ongs) / 16)

    ?>

<body>
    <?php require_once "./../../view/components/navbar.php"; ?>
    <?php require_once "./../../view/components/sidebar.php"; ?>
    <main class="main-container">

        <div class="ong-search-screen">


            <div class="ong-search-screen-filter-container">
                <div class="ong-search-screen-​​ngo-type">
                    <div class="ong-search-screen-category-title-div">
                        <h1>Categorias</h1>
                    </div>
                    <div class="ong-search-screen-options-box">
                        <form class="ong-search-screen-options-form" method="POST">
                            <div class="bloco-pesquisa">
                                <?= label('pesquisar', '&nbsp;') ?>
                                <?= inputFilter('text', 'nome_ong', 'nome_ong', 'Pesquisar Razão Social', $pesquisa) ?>
                            </div>
                            <br>
                            <hr class="ong-search-screen-hr-line">
                            <div class="ong-search-screen-options-buttons">
                                <div class="filter-expandable" id="filters">
                                    <?php foreach ($categorias as $categoria): ?>
                                        <div class="ong-search-screen-filter-area">
                                            <label class="checkbox-label">
                                                <?php
                                                $checked = '';
                                                if (!empty($categoriasSelecionadas)) {
                                                    if (in_array($categoria["id"], $categoriasSelecionadas)) {
                                                        $checked = 'checked';
                                                    }
                                                }
                                                ?>
                                                <?= inputCheckBox('', 'categoriasSelecionadas[]', $categoria["id"], $checked) ?>
                                                <span class="ong-search-screen-text-align"><?= $categoria["nome"] ?></span>
                                            </label>
                                        </div>
                                    <?php endforeach; ?>
                                </div>
                                <button type="button" class="toggle-btn"
                                    onclick="document.getElementById('filters').classList.toggle('expanded'); this.textContent = this.textContent === 'Ver mais ▼' ? 'Ver menos ▲' : 'Ver mais ▼'">Ver
                                    mais ▼</button>
                            </div>

                            <div class="filter-hidden-div"></div>

                            <div class="ong-search-screen-options-apply-filters-div">
                                <?= botao('salvar', 'Aplicar Filtros', "", "/together/controller/PesquisarOngController.php", "acao", "aplicar") ?>
                                <?= botao('cancelar', 'Limpar Filtros', "", "/together/controller/PesquisarOngController.php", "acao", "limpar") ?>
                            </div>
                        </form>
                    </div>
                </div>
            </div>


            <div class="ong-search-screen-content">
                <div class="ong-search-screen-mobile-filter-container">
                        <div class="ong-search-screen-mobile-filter">
                            <?= botao("primary", "Adicionar Filtros", "filter-mobile-button-id") ?>
                        </div>
                </div> 

                <div class="ong-search-screen-content-align-itens">
                    <?php foreach ($ongs as $ong): ?>
                        <?php
                        $imagem = $_SERVER['DOCUMENT_ROOT'] . "/" . $ong['caminho'];

                        $validarFoto = !empty($ong['caminho'] && file_exists($imagem));
                        $validarEndereco = !empty($ong['endereco_ong']);
                        ?>
                        <?php if ($validarFoto && $validarEndereco): ?>
                            <?= cardOng(
                                $ong["caminho"],
                                $ong["razao_social"],
                                $ong["descricao"],
                                $ong['id']
                            )
                                ?>
                        <?php endif ?>
                    <?php endforeach; ?>
                    <?php require_once './../components/paginacao.php' ?>
                </div>
                <div class="ong-search-screen-pagination">
                    <?php criarPaginacao($quantidadeDePaginas); ?>

                </div>
            </div>
        </div>
    </main>

    <?php require_once './../components/footer.php' ?>

</body>