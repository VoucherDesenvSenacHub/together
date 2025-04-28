<?php require_once "../../../view/components/head.php"; ?>
<?php require_once "../../components/button.php" ?>
<?php require_once "../../components/label.php" ?>
<?php require_once "../../components/input.php" ?>
<?php require_once "../../components/textarea.php" ?>

<body>
    <?php require_once "../../../view/components/navbar.php"; ?>

    <main class="main-container">
        <?php require_once './../../components/back-button.php' ?>

        <div class="formulario-perfil">
            <form action="" method="POST">
                <div class="postagem-geral-form-linha-superior">
                    <?php require_once "./../../components/upload.php" ?>
                    <div class="postagem-geral-input-text">
                        <?= label("titulo", "Título")?>
                        <?= input("text","titulo","titulo",true) ?>

                        <?= label("link","Link") ?>
                        <?= input("text","link","link", true) ?>
                    </div>
                </div>
                <div class="postagem-geral-linha-inferior">
                    <div class="postagem-geral-input-text">
                        <?= label("descricao","Descrição") ?>
                        <?= textarea("descricao","descricao", true) ?>
                    </div>
                </div>
                <div class="postagem-geral-btn-group">
                    <button class="postagem-geral-div-excluir" formaction="ongAdmin.php?editar=excluir">
                        <img src="./../../assests/images/geral/lixeira.png" alt="icon excluir"
                            class="postagem-geral-excluir">
                    </button>
                    <div class="postagem-geral-div-btn">
                        <?= botao('primary', 'Salvar', 'ongAdmin.php?editar=salvar') ?>
                        <?= botao('secondary', 'Cancelar', 'ongAdmin.php?editar=cancelar') ?>
                    </div>
                </div>
            </form>
        </div>

    </main>

    <?php require_once './../../components/footer.php' ?>
</body>