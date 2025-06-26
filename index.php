<?php require_once './view/components/button.php' ?>
<?php require_once './view/components/head.php' ?>
<?php require_once './view/components/card.php' ?>

<body>

</body>
<?php require_once './view/components/navbar.php' ?>
<?php require_once './view/components/sidebar.php' ?>

<main>
    <div class="home-banner-together"></div>
    <div class="landing-home">
        <div class="container-card-home">
            <?php for ($i = 0; $i < 4; $i++) { ?>
                <?= cardOng("view\assests\images\Geral\ImageONG.png", "Salva Vidas!", "Salvamos a vida de animais abandonados, moradores de rua e todas as pessoas necessitadas.") ?>
            <?php } ?>
        </div>
        <div class="linha-home"></div>
    </div>

</main>

<?php require_once './view/components/footer.php' ?>

</html>