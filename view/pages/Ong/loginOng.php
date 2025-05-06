<?php require_once "../../components/button.php" ?>
<?php require_once "../../components/label.php" ?>
<?php require_once "../../components/input.php" ?>
<?php require_once "../../../view/components/head.php"; ?>

<body class="body-login-da-ong">
  <div class="container-login-da-ong">
    <!-- Login Box -->
    <div class="box-login">
      <div class="img-logo">
        <img id="logo-img" src="https://raw.githubusercontent.com/AntonioV1ctor/assets/refs/heads/main/Together.png" alt="logo">
      </div>
      <div class="login-container">
        <form method="POST" class="login-box">
          <i class="fa-solid fa-house fa-xl" id="house-icon"></i>
          <div class="user-moldure">
            <img class="user-icon" src="../../assests/images/Ong/Ong_icon.png" alt="house">
          </div>
          <div>
            <?= label('email','asod') ?>
            <?= inputRequired('email', 'email', 'email') ?>
          </div>
          <div>
            label
            input
          </div>
          <a id="lost-pass" href="" class="lost-pass">Esqueci a senha</a>
          <div class="terms-area">
            <p class="agree-text">Não tem uma conta?</p>
            <a id="create-account" href="" class="terms-link">Crie uma agora</a>
          </div>
          <div class="formulario-buttons login-button">
              <?= botao('primary', 'Login') ?>
          </div>
        </form>
      </div>
    </div>

    <!-- Registro ONG -->
    <div class="container-registro-ong">
      <div class="box-registro-ong">
        <form method="POST" class="login-form-registro-ong">
          <i class="fa-solid fa-house fa-xl" id="house-icon-registro"></i>
          <input required type="text" placeholder="Digite seu Nome" class="text-input" id="name-input-registro-ong">
          <input required type="number" placeholder="Digite seu CNPJ" class="text-input" id="cnpj-input-registro-ong">
          <input required type="date" placeholder="Data de Fundação" class="text-input" id="foundation-date-input-registro-ong">
          <input required type="number" placeholder="Telefone" class="text-input" id="phone-input-registro-ong">
          <input required type="text" placeholder="Endereço" class="text-input" id="address-input-registro-ong">
          <input disabled required type="text" placeholder="Conselho Fiscal" class="text-input" id="fiscal-council-input-registro-ong">
          <i id="paperclip-fiscal" class="fa-solid fa-paperclip"></i>
          <input required type="text" placeholder="Tipo da ONG" class="text-input" id="ong-type-input-registro-ong">
          <input disabled type="text" placeholder="Logo da ONG" class="text-input" id="ong-logo-input-registro-ong">
          <i id="paperclip-logo" class="fa-solid fa-paperclip"></i>
          <input required type="email" placeholder="Email" class="text-input" id="email-input-registro-ong">
          <input required type="password" placeholder="Senha" class="text-input" id="password-input-registro-ong">
          <input required type="password" placeholder="Confirmar Senha" class="text-input" id="confirm-password-input-registro-ong">
          <div class="terms-area-registro-ong">
            <input required type="checkbox" id="checkbox-registro-ong">
            <p class="agree-text-registro-ong">Li e concordo com os</p>
            <a href="https://policies.google.com/terms?hl=pt-BR" class="terms-link-registro-ong">Termos e Condições</a>
          </div>
          <button class="login-button-registro-ong">Enviar</button>
        </form>
      </div>
      <div class="logo-div-registro-ong">
        <img id="logo-img-registro-ong" src="https://raw.githubusercontent.com/AntonioV1ctor/assets/refs/heads/main/Together.png" alt="logo">
      </div>
    </div>

    <!-- Recuperar Senha -->
    <div class="wrapper-lost-pass">
      <div class="form-container-lost-pass">
        <form method="POST" class="form-lost-pass">
          <i class="fa-solid fa-house fa-xl" id="home-icon-lost-pass"></i>
          <h1 class="title-lost-pass">Recuperar Senha</h1>
          <p class="text-lost-pass">Enviaremos um E-mail para você confirmar sua nova senha</p>
          <input required type="email" placeholder="Digite seu Email" class="input-lost-pass" id="email-input-lost-pass">
          <button class="button-lost-pass">Enviar</button>
        </form>
      </div>
      <div class="logo-container-lost-pass">
        <img id="logo-lost-pass" src="https://raw.githubusercontent.com/AntonioV1ctor/assets/refs/heads/main/Together.png" alt="logo">
      </div>
    </div>
  </div>
  <?php require_once "../../../view/components/footer.php"; ?>
</body>
</html>