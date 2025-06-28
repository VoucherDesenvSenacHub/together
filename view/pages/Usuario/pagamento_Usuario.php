<?php require_once "../../../view/components/head.php"; ?>
<?php require_once "../../../view/components/input.php"; ?>
<?php require_once "../../../view/components/label.php"; ?>
<?php require_once "../../../view/components/button.php"; ?>

<body class="user_pay">
  <?php require_once "../../../view/components/navbar.php"; ?>

  <main class="main-container">
    <h3 class="titulo-pay-user">Pagamento</h3>

    <div class="container-pay-user">

      <!-- Lado esquerdo com título, botão e formulário -->
      <div class="layout-geral">

        <div class="anonimo-div-box">
          <div class="anonimo-toggle">
            <label class="switch">
              <input type="checkbox" name="pagamento_anonimo" id="pagamento_anonimo">
              <span class="slider"></span>
            </label>
            <span class="anonimo-text">Doação anônima</span>
          </div>
        </div>

        <div class="formulario-e-imagem">

          <form action="pagamento_Usuario.php" method="POST" class="form-pagamento">

            <div>
              <?= label('nome', 'Nome (como está no cartão)') ?>
              <?= inputRequired('text', 'nome', 'nome') ?>
            </div>

            <div>
              <?= label('numero', 'Número do cartão') ?>
              <?= inputRequired('text', 'numero', 'numero') ?>
            </div>

            <div>
              <?= label('validade', 'Validade') ?>
              <?= inputRequired('text', 'validade', 'validade') ?>
            </div>

            <div>
              <?= label('cvv', 'CVV') ?>
              <?= inputRequired('number', 'cvv', 'cvv') ?>
            </div>

            <div class="container-botao-pagamento">
              <?= botao('primary', 'Realizar Pagamento') ?>
            </div>

          </form>

          <!-- <img id="imagem-doacao" src="/together/view/assests/images/Usuario/doação.png" alt="Imagem de doação" /> -->
        </div>
      </div>
    </div>
  </main>

  <?php require_once "../../../view/components/footer.php"; ?>
</body>

</html>