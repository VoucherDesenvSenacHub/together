<?php require_once "../../../view/components/head.php"; ?>
<?php require_once "../../../view/components/label.php"; ?>
<?php require_once "../../../view/components/input.php"; ?>
<?php require_once "../../../view/components/button.php"; ?>

<body>
  <?php require_once "../../../view/components/navbar.php"; ?>
  <main class="main-container">
    <div class="btn-voltar-validacao-atualizacao">
      <?php require_once './../../components/back-button.php' ?>
    </div>

    <div class="titulo-validar-atualizacao-ong">
      <h1 class="titulo-pagina-tabela">Dados do usuário</h1>
    </div>

    <div class="formulario-perfil">
      <form action="">
        <div class="container-perfil-ong-atualizado">
          <img src="\together\view\assests\images\Usuario\usuario-user-foto.png" alt="Logo da ONG" class="logo-ong">
          <div class="container-uper-readonly">
            <div class="container-uper-readonly-primary-ong">

              <div class="form-row">
                <div>
                  <?= label('nome', 'Nome') ?>
                  <?= inputReadonly('text', 'nome', 'nome', 'Jhon F. Kennedy') ?>
                </div>

                <div>
                  <?= label('telefone', 'Telefone') ?>
                  <?= inputReadonly('text', 'telefone', 'telefone', '+55 (67) 9 9999-9999') ?>
                </div>
              </div>

              <div class="form-row">

                <div>
                  <?= label('cpf', 'CPF') ?>
                  <?= inputReadonly('text', 'cpf', 'cpf', '00000000000') ?>
                </div>

                <div>
                  <?= label('data', 'Data de nascimento') ?>
                  <?= inputReadonly('text', 'data', 'data', '19/01/1990') ?>
                </div>
              </div>
              <div class="form-ong">
                <div class="container-input-email-voluntario-ong">
                  <?= label('email', 'Email') ?>
                  <?= inputReadonly('text', 'email', 'email', 'jhon.f.kennedy@email.com') ?>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="container-uper-readonly-footer">
          <div class="botoes-validar-atualizacao">
            <?= botao('salvar', 'Editar', '', 'editarInformacoes.php') ?>
          </div>

        </div>
      </form>
    </div>
  </main>
  <?php require_once "../../../view/components/footer.php"; ?>
</body>

</html>