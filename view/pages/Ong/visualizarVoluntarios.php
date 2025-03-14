<body class="body-visualizar-voluntarios">
    <?php
    require_once "../../../view/components/head.php";
    require_once "../../../view/components/navbar.php";
    ?>

    <div class="container-visualizar-voluntarios">
        <div class="validation-area-visualizar-voluntarios">
            <div class="area-imagem-visualizar-voluntarios">
                <img class="imagem-perfil-visualizar-voluntarios"
                    src="../../../view//assests/images/Usuario/usuario-user-foto.png" alt="foto_perfil">
            </div>

            <div class="confirmacao-area-visualizar-voluntarios">
                <h3 class="pergunta-confirmacao-visualizar-voluntarios">Aceitar Voluntario?</h3>
                <div class="button-area-visualizar-voluntarios">
                    <button class="validation-button-visualizar-voluntarios" id="check-button"><i
                            class="fa-solid fa-check" id="check-icon"></i></button>
                    <button class="validation-button-visualizar-voluntarios" id="recuse-button"><i
                            class="fa-solid fa-xmark" id="recuse-icon"></i></button>
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
                    <input class="input-visu-voluntarios" type="cpf" name="cpf" id="cpf" value="XXX.XXX.XXX-XX"
                        placeholder="CPF" readonly>
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
                    <input class="input-visu-voluntarios" type="text" name="endereco" id="endereco-input"
                        value="XXXXXXXXXXX" placeholder="Endereço" readonly>
                </div>

                <div class="inputs-area-visualizar-voluntarios">
                    <label class="label-visu-voluntarios" for="email">Email:</label>
                    <input class="input-visu-voluntarios" type="email" name="email" value="XXXXXXXXXXX"
                        placeholder="Email" readonly>
                </div>

            </form>
            <div>
            <ul class="notification-container">
    <li class="notification-item success">
      <div class="notification-content">
        <div class="notification-icon">
          <svg aria-hidden="true" fill="none" viewBox="0 0 24 24">
            <path
              stroke="currentColor"
              stroke-linecap="round"
              stroke-linejoin="round"
              stroke-width="2"
              d="M8.5 11.5 11 14l4-4m6 2a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z"
            ></path>
          </svg>
        </div>
        <div class="notification-text">Voluntário Aceito com sucesso!</div>
      </div>
      <div class="notification-icon notification-close">
        <svg aria-hidden="true" fill="none" viewBox="0 0 24 24">
          <path
            stroke="currentColor"
            stroke-linecap="round"
            stroke-linejoin="round"
            stroke-width="2"
            d="M6 18 17.94 6M18 18 6.06 6"
          ></path>
        </svg>
      </div>
      
      
      <div class="notification-progress-bar"></div>
    </li>
    <li class="notification-item error">
      <div class="notification-content">
        <div class="notification-icon">
          <svg aria-hidden="true" fill="none" viewBox="0 0 24 24">
            <path
              stroke="currentColor"
              stroke-linecap="round"
              stroke-linejoin="round"
              stroke-width="2"
              d="m15 9-6 6m0-6 6 6m6-3a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z"
            ></path>
          </svg>
        </div>
        <div class="notification-text">Erro ao completar a ação!</div>
      </div>
      <div class="notification-icon notification-close">
        <svg aria-hidden="true" fill="none" viewBox="0 0 24 24">
          <path
            stroke="currentColor"
            stroke-linecap="round"
            stroke-linejoin="round"
            stroke-width="2"
            d="M6 18 17.94 6M18 18 6.06 6"
          ></path>
        </svg>
      </div>
      <div class="notification-progress-bar"></div>
    </li>
    <li class="notification-item success">
      <div class="notification-content">
        <div class="notification-icon">
            <svg aria-hidden="true" fill="none" viewBox="0 0 24 24">
              <path
                stroke="currentColor"
                stroke-linecap="round"
                stroke-linejoin="round"
                stroke-width="2"
                d="M8.5 11.5 11 14l4-4m6 2a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z"
              ></path>
            </svg>
          </div>
        <div class="notification-text">Voluntário Recusado com sucesso!</div>
      </div>
      <div class="notification-icon notification-close">
        <svg aria-hidden="true" fill="none" viewBox="0 0 24 24">
          <path
            stroke="currentColor"
            stroke-linecap="round"
            stroke-linejoin="round"
            stroke-width="2"
            d="M6 18 17.94 6M18 18 6.06 6"
          ></path>
        </svg>
      </div>
      <div class="notification-progress-bar"></div>
    </li>
  </ul>
            </div>
        </div>
    </div>


    <?php require_once "../../../view/components/footer.php"; ?>
</body>


</html>