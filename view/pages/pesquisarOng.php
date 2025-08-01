<?php require_once "./../components/head.php"; ?>
<?php require_once "./../components/button.php" ?>
<?php require_once "./../components/label.php" ?>
<?php require_once "./../components/input.php" ?>
<?php require_once "./../components/textarea.php" ?>
<?php require_once './../components/card.php' ?>

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
                        <form class="ong-search-screen-options-form" action="pesquisarOng.php" method="GET">
                            <div class="ong-search-screen-options-buttons">
                                <div class="filter-expandable" id="filters">

                                    <div class="ong-search-screen-filter-area">
                                        <label class="checkbox-label">
                                            <?= inputCheckBox('checkbox', 'ods[]', 'erradicacao_pobreza') ?>
                                            <span class="ong-search-screen-text-align">Erradicação da pobreza</span>
                                        </label>
                                    </div>

                                    <div class="ong-search-screen-filter-area">
                                        <label class="checkbox-label">
                                            <?= inputCheckBox('checkbox', 'ods[]', 'fome_zero_agricultura') ?>
                                            <span class="ong-search-screen-text-align">Fome zero e agricultura sustentável</span>
                                        </label>
                                    </div>

                                    <div class="ong-search-screen-filter-area">
                                        <label class="checkbox-label">
                                            <?= inputCheckBox('checkbox', 'ods[]', 'saude_bem_estar') ?>
                                            <span class="ong-search-screen-text-align">Saúde e Bem-Estar</span>
                                        </label>
                                    </div>

                                    <div class="ong-search-screen-filter-area">
                                        <label class="checkbox-label">
                                            <?= inputCheckBox('checkbox', 'ods[]', 'educacao_qualidade') ?>
                                            <span class="ong-search-screen-text-align">Educação de qualidade</span>
                                        </label>
                                    </div>

                                    <div class="ong-search-screen-filter-area">
                                        <label class="checkbox-label">
                                            <?= inputCheckBox('checkbox', 'ods[]', 'igualdade_genero') ?>
                                            <span class="ong-search-screen-text-align">Igualdade de gênero</span>
                                        </label>
                                    </div>

                                    <div class="ong-search-screen-filter-area">
                                        <label class="checkbox-label">
                                            <?= inputCheckBox('checkbox', 'ods[]', 'agua_saneamento') ?>
                                            <span class="ong-search-screen-text-align">Água potável e saneamento</span>
                                        </label>
                                    </div>

                                    <div class="ong-search-screen-filter-area">
                                        <label class="checkbox-label">
                                            <?= inputCheckBox('checkbox', 'ods[]', 'energia_limpa') ?>
                                            <span class="ong-search-screen-text-align">Energia limpa e acessível</span>
                                        </label>
                                    </div>

                                    <div class="ong-search-screen-filter-area">
                                        <label class="checkbox-label">
                                            <?= inputCheckBox('checkbox', 'ods[]', 'trabalho_crescimento') ?>
                                            <span class="ong-search-screen-text-align">Trabalho decente e crescimento econômico</span>
                                        </label>
                                    </div>

                                    <div class="ong-search-screen-filter-area">
                                        <label class="checkbox-label">
                                            <?= inputCheckBox('checkbox', 'ods[]', 'industria_inovacao') ?>
                                            <span class="ong-search-screen-text-align">Indústria, inovação e infraestrutura</span>
                                        </label>
                                    </div>

                                    <div class="ong-search-screen-filter-area">
                                        <label class="checkbox-label">
                                            <?= inputCheckBox('checkbox', 'ods[]', 'reducao_desigualdades') ?>
                                            <span class="ong-search-screen-text-align">Redução das desigualdades</span>
                                        </label>
                                    </div>

                                    <div class="ong-search-screen-filter-area">
                                        <label class="checkbox-label">
                                            <?= inputCheckBox('checkbox', 'ods[]', 'cidades_sustentaveis') ?>
                                            <span class="ong-search-screen-text-align">Cidades e comunidades sustentáveis</span>
                                        </label>
                                    </div>

                                    <div class="ong-search-screen-filter-area">
                                        <label class="checkbox-label">
                                            <?= inputCheckBox('checkbox', 'ods[]', 'consumo_responsavel') ?>
                                            <span class="ong-search-screen-text-align">Consumo e produção responsáveis</span>
                                        </label>
                                    </div>

                                    <div class="ong-search-screen-filter-area">
                                        <label class="checkbox-label">
                                            <?= inputCheckBox('checkbox', 'ods[]', 'acao_clima') ?>
                                            <span class="ong-search-screen-text-align">Ação contra a mudança global do clima</span>
                                        </label>
                                    </div>

                                    <div class="ong-search-screen-filter-area">
                                        <label class="checkbox-label">
                                            <?= inputCheckBox('checkbox', 'ods[]', 'vida_agua') ?>
                                            <span class="ong-search-screen-text-align">Vida na água</span>
                                        </label>
                                    </div>

                                    <div class="ong-search-screen-filter-area">
                                        <label class="checkbox-label">
                                            <?= inputCheckBox('checkbox', 'ods[]', 'vida_terrestre') ?>
                                            <span class="ong-search-screen-text-align">Vida terrestre</span>
                                        </label>
                                    </div>

                                    <div class="ong-search-screen-filter-area">
                                        <label class="checkbox-label">
                                            <?= inputCheckBox('checkbox', 'ods[]', 'paz_justica') ?>
                                            <span class="ong-search-screen-text-align">Paz, Justiça e Instituições Eficazes</span>
                                        </label>
                                    </div>

                                    <div class="ong-search-screen-filter-area">
                                        <label class="checkbox-label">
                                            <?= inputCheckBox('checkbox', 'ods[]', 'parcerias_meios') ?>
                                            <span class="ong-search-screen-text-align">Parcerias e meios de implementação</span>
                                        </label>
                                    </div>
                                </div>

                                <button type="button" class="toggle-btn" onclick="document.getElementById('filters').classList.toggle('expanded'); this.textContent = this.textContent === 'Ver mais ▼' ? 'Ver menos ▲' : 'Ver mais ▼'">Ver mais ▼</button>
                            </div>

                            <div class="filter-hidden-div"></div>

                            <div class="ong-search-screen-options-apply-filters-div">
                                <?= botao('cancelar', 'Limpar Filtros', "", "#") ?>
                                <?= botao('salvar', 'Aplicar Filtros', "", "#") ?>
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
                    <?php for ($i = 0; $i < 12; $i++): ?>
                        <?= cardOng("https://img.cdndsgni.com/preview/10592521.jpg", "Salva Vidas!", "Salvamos a vida de animais abandonados, moradores de rua e todas as pessoas necessitadas.") ?>
                    <?php endfor ?>
                    <?php require_once './../components/paginacao.php' ?>

                </div>
            </div>

        </div>
    </main>
</body>