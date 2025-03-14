<?php require_once './view/components/head.php' ?>

<body>
    <?php require_once './view/components/navbar.php' ?>

    <div class="banner-home"></div>

    <h3>Destaques</h3>
    <button class="botao">Ver Mais</button>
    <?php for ($i = 0; $i < 3; $i++) { ?>
        <article class="card-container">
            <div class="card-wrapper">
                <img src="./view/assests/images/ong/ong_background-better.png"
                    class="card-image" alt="Card featured image" />
                <h2 class="card-title">Tailwind card</h2>
                <p class="card-description">
                    Lorem ipsum dolor sit amet,
                    <br />
                    consectetur adipiscing elit. Nunc felis
                    <br />
                    ligula.
                </p>
                <button class="read-more-button">Descobrir</button>
            </div>
        </article>
    <?php }
    ; ?>

    <?php require_once './view/components/footer.php' ?>
</body>