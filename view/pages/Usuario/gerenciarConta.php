<?php
require_once "../../../view/components/label.php";
require_once "../../../view/components/input.php";

$usuario = [
  "id" => 0,
  "nome" => "User Padrão",
  "telefone" => "(67)99876-5432",
  "email" => "emaildouser@together.com",
  "cpf" => "12345678910",
];

  ?>

<?php require_once "../../../view/components/head.php" ?>
<?php require_once "../../components/button.php" ?>

<body>
  <?php require_once './../../components/navbar.php' ?>
  <main class="main-container">
    <section class="Reset">
      <form class="formulario-perfil" action="" method="GET">

        <img class="formulario-imagem-preview" src="/together/view/assests/images/Usuario/usuario-user-foto.png"
          alt="foto Usuario" />

        <h4 class="dados_usuario">Sua localização</h4>

        <div class="dados">
          <input type="hidden" name="id" value="<?= $usuario['id'] ?>">

          <div>
            <?= label('nomeUsuario', 'Nome') ?>
            <?= inputReadonly('text', 'nomeUsuario', 'nomeUsuario', $usuario['nome']) ?>
          </div>

          <div>
            <?= label('telefoneUsuario', 'telefone') ?>
            <?= inputReadonly('text', 'telefoneUsuario', 'telefoneUsuario', $usuario['telefone']) ?>
          </div>

          <div>
            <?= label('emailUsuario', 'Email') ?>
            <?= inputReadonly('text', 'emailUsuario', 'emailUsuario', $usuario['email']) ?>
          </div>

          <div>
            <?= label('cpfUsuario', 'Cpf') ?>
            <?= inputReadonly('text', 'cpfUsuario', 'cpfUsuario', $usuario['cpf']) ?>
          </div>
          <div>
            <div class="botoes">
              <div id="btn-editar-container">
                <?= botao('primary', 'Editar', 'editarInformacoes.php') ?>
              </div>
            </div>
          </div>
      </form>
    </section>
  </main>
  <?php require_once "../../components/footer.php" ?>
</body>
</html>