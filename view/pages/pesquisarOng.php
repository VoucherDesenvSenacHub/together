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
                    <h1>Área de Atuação</h1>
                    <div class="ong-search-screen-options-box">
                        <?php for ($i = 1; $i <= 8; $i++): ?>
                            <form action="">
                                <?= inputCheckBox('checkbox', 'filter-​​activity-1', 'filter-​​activity-1') ?> Front-End
                            </form>
                        <?php endfor; ?>
                    </div>
                </div>

                <form action="">
                    <?= botao('salvar', 'Limpar Tudo', "", "#") ?>
                </form>

                
            </div>

            <div class="ong-search-screen-content">

            </div>
        </div>

    </main>
</body>