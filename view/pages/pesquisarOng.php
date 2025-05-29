<?php require_once "./../components/head.php"; ?>
<?php require_once "./../components/button.php" ?>
<?php require_once "./../components/label.php" ?>
<?php require_once "./../components/input.php" ?>
<?php require_once "./../components/textarea.php" ?>

<body>
    <?php require_once "./../../view/components/navbar.php"; ?>
    <main class="main-container">
        <?php require_once './../components/back-button.php' ?>

        <div class="ong-search-screen">
            <div class="ong-search-screen-filter-container">
                <div class="ong-search-screen-​​ngo-type">
                    <h1>Categorias</h1>
                    <div class="ong-search-screen-options-box">
                        <form class="ong-search-screen-options-form" action="pesquisarOng.php" method="GET">

                            <div class="ong-search-screen-options-buttons">
                                <div class="ong-search-screen-filter-area"><?= inputCheckBox('checkbox', 'ods[]', 'erradicacao_pobreza') ?> <div class="ong-search-screen-text-align">Erradicação da pobreza</div>
                                </div>
                                <div class="ong-search-screen-filter-area"><?= inputCheckBox('checkbox', 'ods[]', 'fome_zero_agricultura') ?> <div class="ong-search-screen-text-align">Fome zero e agricultura sustentável</div>
                                </div>
                                <div class="ong-search-screen-filter-area"><?= inputCheckBox('checkbox', 'ods[]', 'saude_bem_estar') ?> <div class="ong-search-screen-text-align">Saúde e Bem-Estar</div>
                                </div>
                                <div class="ong-search-screen-filter-area"><?= inputCheckBox('checkbox', 'ods[]', 'educacao_qualidade') ?> <div class="ong-search-screen-text-align">Educação de qualidade</div>
                                </div>
                                <div class="ong-search-screen-filter-area"><?= inputCheckBox('checkbox', 'ods[]', 'igualdade_genero') ?> <div class="ong-search-screen-text-align">Igualdade de gênero</div>
                                </div>
                                <div class="ong-search-screen-filter-area"><?= inputCheckBox('checkbox', 'ods[]', 'agua_saneamento') ?> <div class="ong-search-screen-text-align">Água potável e saneamento</div>
                                </div>
                                <div class="ong-search-screen-filter-area"><?= inputCheckBox('checkbox', 'ods[]', 'energia_limpa') ?> <div class="ong-search-screen-text-align">Energia limpa e acessível</div>
                                </div>
                                <div class="ong-search-screen-filter-area"><?= inputCheckBox('checkbox', 'ods[]', 'trabalho_crescimento') ?> <div class="ong-search-screen-text-align">Trabalho decente e crescimento econômico</div>
                                </div>
                                <div class="ong-search-screen-filter-area"><?= inputCheckBox('checkbox', 'ods[]', 'industria_inovacao') ?> <div class="ong-search-screen-text-align">Indústria, inovação e infraestrutura</div>
                                </div>
                                <div class="ong-search-screen-filter-area"><?= inputCheckBox('checkbox', 'ods[]', 'reducao_desigualdades') ?> <div class="ong-search-screen-text-align">Redução das desigualdades</div>
                                </div>
                                <div class="ong-search-screen-filter-area"><?= inputCheckBox('checkbox', 'ods[]', 'cidades_sustentaveis') ?> <div class="ong-search-screen-text-align">Cidades e comunidades sustentáveis</div>
                                </div>
                                <div class="ong-search-screen-filter-area"><?= inputCheckBox('checkbox', 'ods[]', 'consumo_responsavel') ?> <div class="ong-search-screen-text-align">Consumo e produção responsáveis</div>
                                </div>
                                <div class="ong-search-screen-filter-area"><?= inputCheckBox('checkbox', 'ods[]', 'acao_clima') ?> <div class="ong-search-screen-text-align">Ação contra a mudança global do clima</div>
                                </div>
                                <div class="ong-search-screen-filter-area"><?= inputCheckBox('checkbox', 'ods[]', 'vida_agua') ?> <div class="ong-search-screen-text-align">Vida na água</div>
                                </div>
                                <div class="ong-search-screen-filter-area"><?= inputCheckBox('checkbox', 'ods[]', 'vida_terrestre') ?> <div class="ong-search-screen-text-align">Vida terrestre</div>
                                </div>
                                <div class="ong-search-screen-filter-area"><?= inputCheckBox('checkbox', 'ods[]', 'paz_justica') ?> <div class="ong-search-screen-text-align">Paz, Justiça e Instituições Eficazes</div>
                                </div>
                                <div class="ong-search-screen-filter-area"><?= inputCheckBox('checkbox', 'ods[]', 'parcerias_meios') ?> <div class="ong-search-screen-text-align">Parcerias e meios de implementação</div>
                                </div>


                            </div>
                            
                            <div class="filter-hidden-div">

                            </div>

                            <div class="ong-search-screen-options-apply-filters-div">
                                <?= botao('salvar', 'Aplicar Filtros', "", "#") ?>
                            </div>
                        </form>

                    </div>
                </div>
            </div>

            <div class="ong-search-screen-content">

            </div>
        </div>

    </main>
</body>