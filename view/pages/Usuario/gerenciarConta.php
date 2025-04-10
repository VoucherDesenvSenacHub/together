<?php
$usuario = [
    "id"
]

?>

<?php require_once "../../../view/components/head.php"?>
  <body>
  <?php require_once './../../components/navbar.php' ?>
    <section class="Reset">
      <!-- <div class="gerenciar-conta
        <a href="#" class="button-perfil">
          <img
            class="imagem"
            src="/together/view/assests/images/Usuario/usuario-user-foto.png"
            alt="foto Usuario"
          />
          <p>Editar Usuario</p>
          <span class="material-symbols-outlined"> arrow_forward_ios </span>
        </a>
      </div> -->
      <div class="main">
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
        
        <hr />
        
        <div class="dados_usuario">
          <img
            class="foto_usuario"
            src="/together/view/assests/images/Usuario/usuario-user-foto.png"
            alt="foto Usuario"
          />
          
          <h4>Sua localização</h4>
          
          <div class="dados">
            <input type="hidden" name="id" value="<?= $usuario['id'] ?>">

            <div class="input-group">
              <label for="nome">Nome do Usuário</label>
              <input type="text" id="nome" name="nome" placeholder="Digite seu nome" value="">
            </div>
            
            <div class="input-group">
              <label for="tel">Telefone</label>
              <input type="tel" id="tel" name="tel" placeholder="Digite seu telefone">
            </div>
            
            <div class="input-group">
              <label for="email">Email</label>
              <input type="email" id="email" name="email" placeholder="Digite seu email">
            </div>
            
            <div class="input-group">
              <label for="cpf">CPF</label>
              <input type="text" id="cpf" name="cpf" 
                    pattern="(\d{3}\.?\d{3}\.?\d{3}-?\d{2})|(\d{2}\.?\d{3}\.?\d{3}/?\d{4}-?\d{2})"
                    placeholder="Digite seu CPF">
            </div>
          </div>
        </div>
      </div>
    </section>
  </body>
</html>
