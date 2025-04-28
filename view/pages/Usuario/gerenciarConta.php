<?php
$usuario = [
  "id" => 0,
  "nome" => "User Padrão",
  "telefone" => "(67)99876-5432",
  "email" => "emaildouser@together.com",
  "cpf" => "12345678910",
]

  ?>

<?php require_once "../../../view/components/head.php" ?>
<?php require_once "../../components/button.php" ?>

<body>
  <?php require_once './../../components/navbar.php' ?>
  <main class="main-container">
    <section class="Reset">
      <div class="formulario-perfil">
        <img class="formulario-imagem-preview" src="/together/view/assests/images/Usuario/usuario-user-foto.png"
          alt="foto Usuario" />

        <h4 class="dados_usuario">Sua localização</h4>

        <div class="dados">
          <input type="hidden" name="id" value="<?= $usuario['id'] ?>">

          <div class="input-group">
            <label class="formulario-label " for="nome">Nome do Usuário</label>
            <input type="text" id="nome" name="nome" class="formulario-input formulario-textarea"
              value="<?= $usuario['nome'] ?>" disabled>
          </div>

          <div class="input-group">
            <label class="formulario-label" for="tel">Telefone</label>
            <input type="tel" id="tel" name="tel" class="formulario-input formulario-textarea"
              value="<?= $usuario['telefone'] ?>" disabled>
          </div>

          <div class="input-group">
            <label class="formulario-label" for="email">Email</label>
            <input type="email" id="email" name="email" class="formulario-input formulario-textarea"
              value="<?= $usuario['email'] ?>" disabled>
          </div>

          <div class="input-group">
            <label class="formulario-label" for="cpf">CPF</label>
            <input type="text" id="cpf" name="cpf" class="formulario-input formulario-textarea"
              pattern="(\d{3}\.?\d{3}\.?\d{3}-?\d{2})|(\d{2}\.?\d{3}\.?\d{3}/?\d{4}-?\d{2})"
              value="<?= $usuario['cpf'] ?>" disabled>
          </div>

          <form>
            <div class="botoes">
              <div id="btn-editar-container">
                <?= botao('primary', 'Editar', 'editarInformacoes.php') ?>
              </div>
          </form>
        </div>
        <div class="main-gerenciar-conta">
          <div class="leftSide">
            <a href="#" class="conjunto_botoes">
              <p class="format_p">Ongs em que eu sou voluntário</p>
              <span class="material-symbols-outlined"> chevron_right </span>
              <span id="icone_2" class="material-symbols-outlined">
                handshake
              </span>
            </a>
            <a href="#" class="conjunto_botoes">
              <span id="icone_2" class="material-symbols-outlined"> favorite </span>
              <p class="format_p">Favoritos</p>
              <span class="material-symbols-outlined"> chevron_right </span>
            </a>
            <a href="#" class="conjunto_botoes">
              <p class="format_p">Historico de doação</p>
              <span id="icone_2" class="material-symbols-outlined"> schedule </span>
              <span class="material-symbols-outlined"> chevron_right </span>
            </a>
          </div>
        </div>
      </div>
      </div>
    </section>
  </main>
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

</html>