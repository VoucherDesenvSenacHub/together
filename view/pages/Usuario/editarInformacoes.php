<?php require_once "../../../view/components/head.php"; ?>
<?php require_once "../../components/button.php" ?>

<body>
    <?php require_once "../../../view/components/navbar.php"; ?>

    <main class="main-container">
        <?php require_once './../../components/back-button.php' ?>

        <div class="formulario-perfil">
            <form action="" method="POST">
                <div class="postagem-geral-form-linha-superior">
                    <?php require_once "./../../components/upload.php" ?>
                    <div class="postagem-geral-input-text">
                        <label class="formulario-label" for="nome">Nome de usuario</label>
                        <input class="formulario-input" type="text" id="nome" name="nome" />

                        <label class="formulario-label" for="email">Email</label>
                        <input class="formulario-input" type="email" id="email" name="email" />
                        
                    </div>
                </div>
                <div class="postagem-geral-linha-inferior">
                    <div class="postagem-geral-input-text">
                        <label class="formulario-label" for="tel">Telefone</label>
                        <input class="formulario-input" type="tel" id="tel" name="tel" />

                        <label class="formulario-label" for="cpf">CPF</label>
                        <input class="formulario-input" type="cpf" id="cpf" name="cpf" />
                    </div>
                </div>
                <div class="postagem-geral-div-btn">
                    <?= botao('primary', 'Salvar', 'gerenciarConta.php?criar=salvar') ?>
                    <?= botao('secondary', 'Cancelar', 'gerenciarConta.php?criar=cancelar') ?>
                </div>
            </form>
        </div>

    </main>

    <?php require_once './../../components/footer.php' ?>
</body>

<script>
function formatarCPF(campo) {
    let value = campo.value.replace(/\D/g, '');
    if (value.length > 11) {
        value = value.substring(0, 11);
    }
    campo.value = value.replace(/(\d{3})(\d)/, '$1.$2')
                      .replace(/(\d{3})(\d)/, '$1.$2')
                      .replace(/(\d{3})(\d)/, '$1-$2');
}

(function initCPFFormatter() {
    const campoCPF = document.getElementById('cpf');
    if (!campoCPF) return;

    formatarCPF(campoCPF);
    campoCPF.addEventListener('input', () => formatarCPF(campoCPF));
})();

  </script>