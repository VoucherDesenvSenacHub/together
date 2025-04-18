<?php require_once "../../../view/components/head.php"; ?>

<body class="user_pay">
  <?php require_once "../../../view/components/navbar.php"; ?>

  <main class="main-container">
    <div class="container-pay-user">

      <!-- Lado esquerdo com título, botão e formulário -->
      <div class="lado-esquerdo">
        <h3 class="titulo-pay-user">Pagamento</h3>

        <!-- Botão liga/desliga -->
        <div class="anonimo-toggle">
          <label class="switch">
            <input type="checkbox" name="pagamento_anonimo" id="pagamento_anonimo">
            <span class="slider"></span>
          </label>
          <span class="anonimo-text">Doação anônima</span>
        </div>

        <!-- Formulário + imagem -->
        <div class="formulario-e-imagem">
          <form action="pagamento_Usuario.php" method="POST" class="form-pagamento">
            <label for="nome_cartao">Nome no cartão</label>
            <input type="text" id="nome_cartao" name="nome_cartao" required>

            <label for="numero_cartao">Número do cartão</label>
            <input type="text" id="numero_cartao" name="numero_cartao" maxlength="19" required>

            <label for="validade">Validade (MM/AA)</label>
            <input type="text" id="validade" name="validade" maxlength="5" placeholder="MM/AA" required>

            <label for="cvv">CVV</label>
            <input type="password" id="cvv" name="cvv" maxlength="4" required>

            <button type="submit">Pagar</button>
          </form>

          <img id="imagem-doacao" src="/together/view/assests/images/Usuario/doação.png" alt="Imagem de doação" />
        </div>
      </div>
    </div>
  </main>

  <?php require_once "../../../view/components/footer.php"; ?>
</body>
</html>
