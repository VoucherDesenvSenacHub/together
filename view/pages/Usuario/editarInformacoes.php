<?php require_once "../../../view/components/head.php"; ?>
<?php require_once "../../components/button.php" ?>
<?php require_once "../../../view/components/input.php"; ?>
<?php require_once "../../../view/components/label.php"; ?>

<body>
    <?php require_once "../../../view/components/navbar.php"; ?>

    <main class="main-container">
        <?php require_once './../../components/back-button.php' ?>

        <div class="formulario-perfil">
            <form action="" method="POST">
                <div class="postagem-geral-form-linha-superior">
                    <?php require_once "./../../components/upload.php" ?>
                    <div class="postagem-geral-input-text">
                        <?= label("nomeEditar", "Nome") ?>
                        <?= inputDefault("text", "nomeEditar", "nome") ?>
                        <?= label("emailEditar", "Email") ?>
                        <?= inputDefault("email", "emailEditar", "email") ?>
                    </div>
                </div>
                <div class="postagem-geral-linha-inferior">
                    <div class="postagem-geral-input-text">
                        <?= label("telefoneEditar", "Telefone") ?>
                        <?= inputDefault("text", "TelefoneEditar", "telefone") ?>
                        <?= label("Cpf-editar", "Cpf") ?>
                        <?= inputDefault("text", "cpfEditar", "cpf") ?>
                    </div>
                </div>
                <div class="postagem-geral-div-btn">
                    <?= botao('primary', 'Salvar', "", 'gerenciarConta.php?criar=salvar') ?>
                    <?= botao('secondary', 'Cancelar', '', "gerenciarConta.php?criar=cancelar") ?>
                </div>
            </form>
        </div>

    </main>

    <?php require_once './../../components/footer.php' ?>
</body>