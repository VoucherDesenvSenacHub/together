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

if (isset($_SESSION['buscaDeOng'])) {
    foreach ($_SESSION['buscaDeOng'] as $selecionado) {
        var_dump($selecionado['id']);
    }
}
// var_dump($_SESSION['buscaDeOng']);

// $categorias = [];
// if(empty($_SESSION['buscaDeOng'])){
//     $categoriaModel = new CategoriaOngModel();
//     $todasCategorias = $categoriaModel->getAll();
// }else{
//     $todasCategorias = $_SESSION['buscaDeOng'];
// }
// foreach ($todasCategorias as $categoria){
//     $categorias[] = 
//     ['id' => $categoria['id'], 
//     'nome' => $categoria['nome'], 
//     'selecionado' => in_array($categoria['id'], $_SESSION['buscaDeOng'] ?? [])];
// };

require_once "./../../model/OngModel.php";
$ongModel = new OngModel();
$ongs = $ongModel->buscarTodasOngs();

?>

<body>
    <?php require_once "./../../view/components/navbar.php"; ?>
    <main class="main-container">


        <?php require_once './../components/back-button.php' ?>
        <div class="ong-search-screen">

            <!-- Areá de Filtro -->
            <div class="ong-search-screen-filter-container">
                <div class="ong-search-screen-​​ngo-type">
                    <div class="bloco-pesquisa">
                        <?= label('pesquisar', '&nbsp;') ?>
                        <?= inputFilter('text', 'pesquisar', 'pesquisar', 'Pesquisar Razão Social') ?>
                    </div>
                    <div class="ong-search-screen-category-title-div">
                        <h1>Categorias</h1>
                    </div>
                    <hr class="ong-search-screen-hr-line">
                    <div class="ong-search-screen-options-box">
                        <form class="ong-search-screen-options-form" method="POST">
                            <div class="ong-search-screen-options-buttons">
                                <div class="filter-expandable" id="filters">
                                    <?php foreach ($categorias as $categoria): ?>
                                        <div class="ong-search-screen-filter-area">
                                            <label class="checkbox-label">
                                                <?php if ($selecionado['id'] === $categoria['id']) {
                                                    $checked = true;
                                                }
                                                    
                                                ?>
                                                    <?= inputCheckBox('', 'idCategoria[]', $categoria["id"], $checked); ?>
                                                <?php endif; ?>
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
                        <?= cardOng($ong["caminho"], $ong["razao_social"], $ong["descricao"]) ?>
                    <?php endforeach; ?>
                    <?php require_once './../components/paginacao.php' ?>
                </div>
            </div>

        </div>
    </main>

    <?php require_once './../components/footer.php' ?>

</body>