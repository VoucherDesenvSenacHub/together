<?php require_once "./../../components/head.php"; ?>

<body>
    <?php require_once "./../../components/navbar.php"; ?>
    <div class="ong-admin-container">
        <div class="ong-admin-box">
            <div class="ong-admin-cards-div">

                <div class="ong-admin-default-card-config" id="ong-admin-volunter-card">
                    <a href="/together/view/pages/emDesenvolvimento.php">
                        <img class="ong-admin-default-img-config" src="./../../assests/images/Ong/ongAdmin/volunters.png" alt="">
                    </a>
                    <strong class="ong-admin-strong-config">Voluntários</strong>
                    <p class="ong-admin-default-p-tag">Veja por aqui quem são os voluntários da sua ONG.</p>
                </div>

                <div class="ong-admin-default-card-config" id="ong-admin-edit-page-card">
                    <a href="/together/view/pages/emDesenvolvimento.php">
                        <img class="ong-admin-default-img-config" src="./../../assests/images/Ong/ongAdmin/edit-ong-page.png" alt="">
                    </a>
                    <strong class="ong-admin-strong-config">Editar Página</strong>
                    <p class="ong-admin-default-p-tag">Edite como quiser a pagina da sua ONG aqui !</p>
                </div>

                <div class="ong-admin-default-card-config" id="ong-admin-report-card">
                    <a href="/together/view/pages/emDesenvolvimento.php">
                        <img class="ong-admin-default-img-config" src="./../../assests/images/Ong/ongAdmin/ong-relatory.png" alt="">
                    </a>
                    <strong class="ong-admin-strong-config">Relatório</strong>
                    <p class="ong-admin-default-p-tag">Veja por aqui um relatório completo da sua ONG.</p>
                </div>

                <div class="ong-admin-default-card-config" id="ong-admin-pending-volunter-card">
                    <a href="validacaoVoluntario.php">
                        <img id="ong-admin-peding-volunter-card" class="ong-admin-default-img-config" src="./../../assests/images/Ong/ongAdmin/volunter-pending.png" alt="">
                    </a>
                    <strong class="ong-admin-strong-config">Voluntários Pendentes</strong>
                    <p class="ong-admin-default-p-tag">Veja por aqui quem são os voluntários pendentes para a sua ONG.</p>
                </div>

                <div class="ong-admin-default-card-config" id="ong-admin-create-post-card">
                    <a href="criarPostagemOng.php">
                        <img class="ong-admin-default-img-config" src="./../../assests/images/Ong/ongAdmin/make-post.png" alt="">
                    </a>
                    <strong class="ong-admin-strong-config">Criar Postagem</strong>
                    <p class="ong-admin-default-p-tag">Crie postagens.</p>
                </div>

                <div class="ong-admin-default-card-config" id="ong-admin-edit-post">
                    <a href="/together/view/pages/emDesenvolvimento.php">
                        <img id="ong-admin-edit-post" class="ong-admin-default-img-config" src="./../../assests/images/Ong/ongAdmin/edit-post.png" alt="">
                    </a>
                    <strong class="ong-admin-strong-config">Editar Postagem</strong>
                    <p class="ong-admin-default-p-tag">Edite ou exclua suas postagens</p>
                </div>

            </div>
        </div>
    </div>
    <?php require_once "./../../components/footer.php"; ?>
</body>

</html>