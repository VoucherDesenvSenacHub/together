<?php require_once "../../../view/components/head.php"; ?>
<?php require_once "../../../view/components/input.php"; ?>
<?php require_once "../../../view/components/label.php"; ?>
<?php require_once "../../../view/components/button.php"; ?>
<?php require_once "./../../components/alert.php" ?>

<?php
$erro = $_SESSION['erro'] ?? '';

if (isset($_SESSION['erro'], $erro)) {
    showPopup($_SESSION['erro'], $erro);
    unset($_SESSION['erro'], $erro);
}

?>

<body class="user_pay">
  <?php require_once "../../../view/components/navbar.php"; ?>

  <main class="main-container">
    <?php require_once './../../components/back-button.php' ?>
    <div class="div-wrap-width">
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
            <form action="../../../controller/PagamentoUsuarioController.php" method="POST" class="form-pagamento" id="form-pagamento">
              <?php if (isset($_GET['idOng'])) : ?>
                <input type="hidden" name="idOng" value="<?= $_GET['idOng']; ?>">
              <?php endif; ?>
              <div>
                <?= label('nome', 'Nome (como está no cartão)') ?>
                <?= inputRequired('text', 'nome', 'nome') ?>
              </div>
              <div>
                <?= label('numero', 'Número do cartão') ?>
                <?= inputRequired('text', 'numero', 'numero') ?>
              </div>
              <div class="form-row">
                <div>
                  <?= label('validade', 'Validade') ?>
                  <?= inputRequired('text', 'validade', 'validade') ?>
                </div>
                <div>
                  <?= label('cvv', 'CVV') ?>
                  <?= inputRequired('number', 'cvv', 'cvv') ?>
                </div>
              </div>
              <div>
                <?= label('valor', 'Valor') ?>
                <?= inputRequired('text', 'valor', 'valor') ?>
              </div>
              <div class="container-botao-pagamento">
                <?= botao('salvar', 'Realizar Pagamento','realizar_pagamento','../../../controller/PagamentoUsuarioController.php') ?>
              </div>

            </form>
            <!-- <img id="imagem-doacao" src="/together/view/assests/images/Usuario/doação.png" alt="Imagem de doação" /> -->
          </div>
        </div>
      </div>
    </div>
  </main>

  <?php require_once "../../../view/components/footer.php"; ?>

  <script src="/together/view/assests/js/pages/pagamento_ComprovantePDF.js"></script>
  <script src="/together/view/assests/js/pages/pagamentoUsuario.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.10.1/html2pdf.bundle.min.js" integrity="sha512-GsLlZN/3F2ErC5ifS5QtgpiJtWd43JWSuIgh7mbzZ8zBps+dvLusV+eNQATqgA/HdeKFVgA5v3S/cIrLF7QnIg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/3.0.3/jspdf.umd.min.js"></script>
</body>

</html>