<?php require_once "../../../view/components/head.php";?>

<body class="body-visualizar-voluntarios">
  <?php require_once "../../../view/components/navbar.php";?>

  <main class="main-container">
  <?php require_once './../../components/back-button.php'?>
  <div class="container-visualizar-voluntarios">
    <div class="validation-area-visualizar-voluntarios">
      <div class="area-imagem-visualizar-voluntarios">
        <img class="imagem-perfil-visualizar-voluntarios"
          src="../../../view//assests/images/Usuario/usuario-user-foto.png" alt="foto_perfil">
      </div>

      <div class="confirmacao-area-visualizar-voluntarios">
        <h3 class="pergunta-confirmacao-visualizar-voluntarios">Aceitar Voluntario?</h3>
        <div class="button-area-visualizar-voluntarios">
          <button class="validation-button-visualizar-voluntarios" id="check-button"><i class="fa-solid fa-check"
              id="check-icon"></i></button>
          <button class="validation-button-visualizar-voluntarios" id="recuse-button"><i class="fa-solid fa-xmark"
              id="recuse-icon"></i></button>
        </div>
      </div>
    </div>

    <div class="infomation-visualizar-voluntarios">

      <h3 class="info-title-visualizar-voluntarios">Dados do Voluntario</h3>

      <form class="info-area-visualizar-voluntarios">
        <div class="inputs-area-visualizar-voluntarios">
          <label class="label-visu-voluntarios" for="nome">Nome:</label>
          <input class="input-visu-voluntarios" type="text" name="nome" id="nome" value="XXXXXXXXXXXX"
            placeholder="Nome de usuario" readonly>
        </div>

        <div class=" inputs-area-visualizar-voluntarios">
          <label class="label-visu-voluntarios" id="cpf-label">CPF:</label>
          <input class="input-visu-voluntarios" type="cpf" name="cpf" id="cpf" value="XXX.XXX.XXX-XX" placeholder="CPF"
            readonly>
        </div>

        <div class="metade-input-area-visualizar-voluntarios">

          <div class="inputs-area">
            <label class="label-visu-voluntarios" id="data-label">Data de Nascimento:</label>
            <input class="input-visu-voluntarios" type="date" name="data" value="XX/XX/XXXX"
              placeholder="Data de nascimento" readonly>
          </div>

          <div class="inputs-area">
            <label class="label-visu-voluntarios" for="telefone">Telefone:</label>
            <input class="input-visu-voluntarios" type="text" name="telefone" value="+XX (XX) XXXXXXXXXX"
              placeholder="Telefone" readonly>
          </div>

        </div>

        <div class="inputs-area-visualizar-voluntarios">
          <label class="label-visu-voluntarios" for="endereco">Endereço:</label>
          <input class="input-visu-voluntarios" type="text" name="endereco" id="endereco-input" value="XXXXXXXXXXX"
            placeholder="Endereço" readonly>
        </div>

        <div class="inputs-area-visualizar-voluntarios">
          <label class="label-visu-voluntarios" for="email">Email:</label>
          <input class="input-visu-voluntarios" type="email" name="email" value="XXXXXXXXXXX" placeholder="Email"
            readonly>
        </div>
      </form>
      <div>
        <ul class="notification-container">
        </ul>
      </div>
    </div>
  </div>

  </main>
  <?php require_once "../../../view/components/footer.php"; ?>
</body>
</html>
