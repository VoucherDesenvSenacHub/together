<?php require_once "../../components/head.php"; ?>
<?php require_once "../../components/button.php" ?>
<?php require_once "../../components/label.php" ?>
<?php require_once "../../components/input.php" ?>
<?php require_once "../../components/textarea.php" ?>

<body>
    <?php require_once "../../../view/components/navbar.php"; ?>

    <main class="main-container main-min">
        <?php require_once './../../components/back-button.php' ?>

        <div class="div-wrap-width">
            <h1 class="titulo-pagina">Editar Informações</h1>
            <div class="formulario-perfil">
                <form action="" method="POST" class="postagem-geral-form editar-informacoes-form">
                    <div class="postagem-geral-form-linha-superior">
                        <?php require_once "./../../components/upload.php" ?>
                        <div class="postagem-geral-input-text">
                            <div class="editar-informacoes">
                                <div class="editar-informacoes-input">
                                    <?= label("nome", "Nome") ?>
                                    <?= inputRequired("text", "nome", "nome",'Usuario') ?>
                                </div>
                                <div class="editar-informacoes-input">
                                    <?= label("email", "E-mail") ?>
                                    <?= inputRequired("text", "email", "email","usuario@email.com") ?>
                                </div>
                            </div>
                            <div class="editar-informacoes">
                                <div class="editar-informacoes-input">
                                    <?= label("telefone", "Telefone") ?>
                                    <?= inputRequired("text", "telefone", "telefone","(67) 99999-9999") ?>
                                </div>
                                <div class="editar-informacoes-input">
                                    <?= label("cpf", "CPF") ?>
                                    <?= inputReadonly("text", "cpf", "cpf","999.999.999-99") ?>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="postagem-geral-div-btn">
                        <div class="postagem-geral-btn"><?= botao('salvar', 'Salvar', "", 'ongAdmin.php?criar=salvar') ?></div>
                        <div class="postagem-geral-btn"><?= botao('cancelar', 'Cancelar', "", 'ongAdmin.php?criar=cancelar') ?></div>
                    </div>
                </form>
            </div>
        </div>

    </main>

    <?php require_once './../../components/footer.php' ?>
</body>