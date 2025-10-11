<?php require_once "./../components/head.php"; ?>
<?php require_once "./../components/button.php" ?>
<?php require_once "./../components/label.php" ?>
<?php require_once "./../components/input.php" ?>
<?php require_once "./../components/textarea.php" ?>
<?php require_once './../components/card.php' ?>
<?php
require_once "./../../model/CategoriaOngModel.php";
$categoriaModel = new CategoriaOngModel();
$categorias = $categoriaModel->getAll();
$pesquisa = '';

$categoriasSelecionadas = [];
if (isset($_SESSION['buscaDeOng'])) {
    foreach ($_SESSION['buscaDeOng'] as $selecionado) {
        $categoriasSelecionadas[] = $selecionado['id'];
    }
}

require_once "./../../model/OngModel.php";
$ongModel = new OngModel();
$idCategoria = [];
foreach($categoriasSelecionadas as $id){
    $idCategoria[] = $id;
}

if ($_SESSION['nome_ong_pesquisa'] === 'POST') {
    $pesquisa = $_SESSION['nome_ong_pesquisa'] ?? '';
}
// if($pesquisa != ""){
//     $ongsFiltradasPorNome = $ongModel->findOngBySearch($pesquisa);
// }

// $ongs = $ongModel->buscarTodasOngs($idCategoria);



$ongs = $ongModel->buscarTodasOngs($idCategoria);

if (!empty($pesquisa)) {
    $ongsFiltradasPorNome = $ongModel->findOngBySearch($pesquisa);

    // Extrai os IDs das ONGs que passaram na busca por nome
    $idsFiltrados = array_column($ongsFiltradasPorNome, 'id');

    // Filtra as ONGs das categorias, mantendo apenas as que também estão na busca por nome
    $ongs = array_filter($ongs, function ($ong) use ($idsFiltrados) {
        return in_array($ong['id'], $idsFiltrados);
    });

    // Reindexa o array (opcional, para evitar índices quebrados)
    $ongs = array_values($ongs);
}

?>

<body>
    <?php require_once "./../../view/components/navbar.php"; ?>
    <main class="main-container">
        <?= var_dump($_SESSION); ?>
        <?php require_once './../components/back-button.php' ?>
        <div class="ong-search-screen">

            <!-- Areá de Filtro -->
            <div class="ong-search-screen-filter-container">
                <div class="ong-search-screen-​​ngo-type">
                    <div class="ong-search-screen-category-title-div">
                        <h1>Categorias</h1>
                    </div>
                    <div class="ong-search-screen-options-box">
                        <form class="ong-search-screen-options-form" method="POST">
                            <div class="bloco-pesquisa">
                                <?= label('pesquisar', '&nbsp;') ?>
                                <?= inputFilter('text', 'nome_ong', 'nome_ong', 'Pesquisar Razão Social') ?>
                            </div>
                            <hr class="ong-search-screen-hr-line">
                            <div class="ong-search-screen-options-buttons">
                                <div class="filter-expandable" id="filters">
                                    <?php foreach ($categorias as $categoria): ?>
                                        <div class="ong-search-screen-filter-area">
                                            <label class="checkbox-label">
                                                <?php
                                                $checked='';
                                                if (!empty($categoriasSelecionadas)) {
                                                    if (in_array($categoria["id"], $categoriasSelecionadas)) {
                                                        $checked = 'checked';
                                                    }
                                                }
                                                ?>
                                                <?= inputCheckBox('', 'idCategoria[]', $categoria["id"], $checked) ?>
                                                <span class="ong-search-screen-text-align"><?= $categoria["nome"] ?></span>
                                            </label>
                                        </div>
                                    <?php endforeach; ?>
                                </div>
                                <button type="button" class="toggle-btn" onclick="document.getElementById('filters').classList.toggle('expanded'); this.textContent = this.textContent === 'Ver mais ▼' ? 'Ver menos ▲' : 'Ver mais ▼'">Ver mais ▼</button>
                            </div>

                            <div class="filter-hidden-div"></div>

                            <div class="ong-search-screen-options-apply-filters-div">
                                <?= botao('cancelar', 'Limpar Filtros', "", "/together/controller/PesquisarOngController.php", "acao", "limpar") ?>
                                <?= botao('salvar', 'Aplicar Filtros', "", "/together/controller/PesquisarOngController.php", "acao", "aplicar") ?>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <!-- Área de Conteúdo -->
            <div class="ong-search-screen-content">

                <!-- <div class="ong-search-screen-mobile-filter-container">
                    <div class="ong-search-screen-mobile-filter">
                        <?= botao("primary", "Adicionar Filtros", "filter-mobile-button-id") ?>
                    </div>
                </div> -->

                <div class="ong-search-screen-content-align-itens">
                    <?php foreach ($ongs as $ong): ?>
                        <?= cardOng($ong["caminho"], $ong["razao_social"], $ong["descricao"], $ong['id']) ?>
                    <?php endforeach; ?>
                    <?php require_once './../components/paginacao.php' ?>
                </div>
            </div>

        </div>
    </main>

    <?php require_once './../components/footer.php' ?>

</body>