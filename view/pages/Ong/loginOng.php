<?php require_once "../../../view/components/head.php";?>

<body class="body_login_da_ong">
  <div class="container_login_da_ong">

    <div class="box-login">
      <div class="img_logo">
        
          <img id="logo_lostPASS"
            src="https://raw.githubusercontent.com/AntonioV1ctor/assets/refs/heads/main/Together.png" alt="logo">
        
      </div>
      <div class="login_container">

        <div class="login_box"><!-- Mudar para Form  -->
          <i class="fa-solid fa-house fa-xl" id="house_icon"></i>
          <div class="user-moldure">
            <img class="user-icon" src="../../assests/images/Ong/Ong_icon.png" alt="house">
          </div>

          <input required type="text" placeholder="Digite seu CNPJ" class="text_input" id="name_input">
          <input required type="password" placeholder="Digite sua Senha " class="text_input" id="cnpj_input">

          <a id="lost-pass" href="" class="lost-pass">Esqueci a senha</a>
          <div class="terms_area">
            <p class="agree_text">Não tem uma conta?</p>
            <a id="create-account" href="" class="terms_link">Crie uma agora</a>
          </div>
          <input class="login_button" type="button" value="Enviar">
        </div>
      </div>
    </div>


    <div class="container-registroONG">
      <div class="box-registroONG">
        <div class="login_form-registroONG"> <!-- Mudar para Form  -->
          <i class="fa-solid fa-house fa-xl" id="house_icon_registro"></i>
          <input required type="text" placeholder="Digite seu Nome" class="text_input" id="name_input-registroONG">
          <input required type="number" placeholder="Digite seu CNPJ" class="text_input" id="cnpj_input-registroONG">
          <input required type="date" placeholder="Data de Fundação" class="text_input" id="foundation_date_input-registroONG">
          <input required type="number" placeholder="Telefone" class="text_input" id="phone_input-registroONG">
          <input required type="text" placeholder="Endereço" class="text_input" id="address_input-registroONG">
          <input required type="text" placeholder="Conselho Fiscal" class="text_input" id="fiscal_council_input-registroONG">
          <i id="paperclip_fiscal" class="fa-solid fa-paperclip"></i>
          <input required type="text" placeholder="Tipo da ONG" class="text_input" id="ong_type_input-registroONG">
          <input type="text" placeholder="Logo da ONG" class="text_input" id="ong_logo_input-registroONG">
          <i id="paperclip_logo" class="fa-solid fa-paperclip"></i>
          <input required type="email" placeholder="Email" class="text_input" id="email_input-registroONG">
          <input required type="password" placeholder="Senha" class="text_input" id="password_input-registroONG">
          <input required type="password" placeholder="Confirmar Senha" class="text_input"
            id="confirm_password_input-registroONG">
          <div class="terms_area-registroONG">
            <input required type="checkbox" id="checkbox-registroONG">
            <p class="agree_text-registroONG">Li e concordo com os</p>
            <a href="" class="terms_link-registroONG">Termos e Condições</a>
          </div>
          <button class="login_button-registroONG">Enviar</button>
        </div>
      </div>
      <div class="logo_div-registroONG">
        <img id="logo_lostPASS"
          src="https://raw.githubusercontent.com/AntonioV1ctor/assets/refs/heads/main/Together.png" alt="logo">
      </div>
    </div>

    <div class="wrapper_lostPASS">
      <div class="form-container_lostPASS">
        <div class="form_lostPASS"><!-- Mudar para Form  -->
          <i class="fa-solid fa-house fa-xl" id="home-icon_lostPASS"></i>
          <h1 class="title_lostPASS">Recuperar Senha</h1>
          <p class="text_lostPASS">Enviaremos um E-mail para você confirmar sua nova senha</p>
          <input required type="email" placeholder="Digite seu Email" class="input_lostPASS" id="email-input_lostPASS">
          <button class="button_lostPASS">Enviar</button>
        </div>
      </div>
      <div class="logo_div-registroONG">
        <img id="logo_lostPASS"
          src="https://raw.githubusercontent.com/AntonioV1ctor/assets/refs/heads/main/Together.png" alt="logo">
      </div>
    </div>
  </div>

  <script>
    const boxLogin = document.querySelector('.box-login');
    const containerRegistro = document.querySelector('.container-registroONG');
    const wrapperLostPASS = document.querySelector('.wrapper_lostPASS');
    const createAccountLink = document.getElementById('create-account');
    const lostPassLink = document.getElementById('lost-pass');
    const houseIcon = document.getElementById('house_icon');
    const houseIconRegistro = document.getElementById('house_icon_registro');
    const homeIconLostPASS = document.getElementById('home-icon_lostPASS');

    createAccountLink.addEventListener('click', function (event) {
      event.preventDefault();
      boxLogin.style.display = 'none';
      containerRegistro.style.display = 'flex';
      
      wrapperLostPASS.style.display = 'none';
    });

    lostPassLink.addEventListener('click', function (event) {
      event.preventDefault();
      boxLogin.style.display = 'none';
      wrapperLostPASS.style.display = 'flex';
    });

    houseIcon.addEventListener('click', function (event) {
      event.preventDefault();
      boxLogin.style.display = 'flex';
      containerRegistro.style.display = 'none';
      wrapperLostPASS.style.display = 'none';
    });

    if (houseIconRegistro) {
      houseIconRegistro.addEventListener('click', function (event) {
        event.preventDefault();
        boxLogin.style.display = 'flex';
        containerRegistro.style.display = 'none';
      });
    }

    homeIconLostPASS.addEventListener('click', function (event) {
      event.preventDefault();
      boxLogin.style.display = 'flex';
      wrapperLostPASS.style.display = 'none';
    });
  </script>
</body>

</html>