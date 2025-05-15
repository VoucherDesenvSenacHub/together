<?php require_once "./../../components/head.php"; ?>

<body>
    <?php require_once "./../../components/navbar.php"; ?>
    <div class="ong-admin-container">
        <div class="ong-admin-box">
            <div class="ong-admin-cards-div">

                <div class="ong-admin-default-card-config" id="ong-admin-volunter-card">
                    <a href="/together/view/pages/emDesenvolvimento.php">
                        <i class="fa-solid fa-users fa-6x" style="color: #ee8d7e;"></i>                        
                    </a>
                    <strong class="ong-admin-strong-config">Voluntários</strong>
                    <p class="ong-admin-default-p-tag">Veja por aqui quem são os voluntários da sua ONG.</p>
                </div>

                <div class="ong-admin-default-card-config" id="ong-admin-edit-page-card">
                    <a href="/together/view/pages/Ong/editarPaginaOng.php">
                        <i class="fa-solid fa-file-pen fa-6x" style="color: #ee8d7e;"></i>
                    </a>
                    <strong class="ong-admin-strong-config">Editar Página</strong>
                    <p class="ong-admin-default-p-tag">Edite como quiser a pagina da sua ONG aqui !</p>
                </div>

                <div class="ong-admin-default-card-config" id="ong-admin-report-card">
                    <a href="/together/view/pages/emDesenvolvimento.php">
                        <i class="fa-solid fa-book fa-6x" style="color: #ee8d7e;"></i>
                    </a>
                    <strong class="ong-admin-strong-config">Relatório</strong>
                    <p class="ong-admin-default-p-tag">Veja por aqui um relatório completo da sua ONG.</p>
                </div>

                <div class="ong-admin-default-card-config" id="ong-admin-pending-volunter-card">
                    <a href="validacaoVoluntario.php">
                        <i class="fa-solid fa-user-clock fa-6x" style="color: #ee8d7e;"></i>
                    </a>
                    <strong class="ong-admin-strong-config">Voluntários Pendentes</strong>
                    <p class="ong-admin-default-p-tag">Veja por aqui quem são os voluntários pendentes para a sua ONG.</p>
                </div>

                <div class="ong-admin-default-card-config" id="ong-admin-create-post-card">
                    <a href="criarPostagemOng.php">
                        <i class="fa-solid fa-square-plus fa-6x" style="color: #ee8d7e;"></i>
                    </a>
                    <strong class="ong-admin-strong-config">Criar Postagem</strong>
                    <p class="ong-admin-default-p-tag">Crie postagens.</p>
                </div>

                <div class="ong-admin-default-card-config" id="ong-admin-edit-post">
                    <a href="editarPostagemOng.php">
                        <i class="fa-solid fa-square-pen fa-6x" style="color: #ee8d7e;"></i>
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