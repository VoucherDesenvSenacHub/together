<?php require_once "../../../view/components/head.php"; ?>
<?php require_once "../../../view/components/label.php"; ?>
<?php require_once "../../../view/components/input.php"; ?>
<?php require_once "../../../view/components/button.php"; ?>
<?php require_once "../../../view/components/alert.php"; ?>
<?php require_once './../../../model/OngModel.php'; ?>
<?php
$OngModel = new OngModel();
$InformacoesOng = $OngModel->buscarOngPorId($_SESSION['id']);

if (isset($_SESSION) and $_SESSION["perfil"] !== "Ong") {
  header("location: ./../login.php");
  exit();
}
// mostra popup de erro se existir
$tipos = ['erro', 'sucesso'];

foreach ($tipos as $tipo) {
  if (isset($_SESSION[$tipo])) {
    showPopup($tipo, $_SESSION[$tipo]);
    unset($_SESSION[$tipo]);
  }
}

?>

<body>
  <?php require_once "../../../view/components/navbar.php"; ?>
  <main class="main-container">
    <?php require_once './../../components/back-button.php' ?>

    <div class="div-wrap-width">
      <h1 class="titulo-pagina">Informações da ONG</h1>
      <div class="formulario-perfil">
        <form action="" method="POST">
          <div class="container-perfil-voluntario">
            <div class="div-logo">
              <img src="/together/view/assests/images/Adm/adm-vision-ong.png" alt="Foto do usuário" class="logo-user">
            </div>
            <div class="container-readonly">
              <div class="container-readonly-primary">
                <div class="form-row">
                  <div>
                    <?= label('nome', 'Nome') ?>
                    <?= inputRequired('text', 'nome', 'nome', $InformacoesOng['nome']) ?>
                  </div>
                  <div>
                    <?= label('telefone', 'Telefone') ?>
                    <?= inputRequired('text', 'telefone', 'telefone', $InformacoesOng['telefone']) ?>
                  </div>
                </div>
                <div class="form-row">
                  <div>
                    <?= label('cnpj', 'CNPJ') ?>
                    <?= inputRequired('text', 'cnpj', 'cnpj', $InformacoesOng['cnpj']) ?>
                  </div>
                  <div>
                    <?= label('data', 'Data da Fundação') ?>
                    <?= inputRequired('text', 'data', 'data', $InformacoesOng['data_fundacao']) ?>
                  </div>
                </div>
              </div>
              <div class="container-input-email-voluntario">
                <?= label('email', 'Email') ?>
                <?= inputRequired('text', 'email', 'email', $InformacoesOng['email']) ?>
              </div>
            </div>
          </div>
          <div class="container-endereco container-readonly-secondary">
            <div class="titulo-endereco-voluntario">
              <h1>Endereço</h1>
            </div>
            <div class="container-endereco-voluntario">
              <div class="container-input-endereco-voluntario">
                <?= label('cep', 'CEP') ?>
                <?= inputRequired('text', 'cep', 'cep', $InformacoesOng['cep']) ?>
              </div>
              <div class="container-input-endereco-voluntario">
                <?= label('logradouro', 'Logradouro') ?>
                <?= inputRequired('text', 'logradouro', 'logradouro', $InformacoesOng['logradouro']) ?>
              </div>
            </div>
            <div class="container-endereco-voluntario">
              <div class="container-input-endereco-voluntario">
                <?= label('complemento', 'Complemento') ?>
                <?= inputDefault('text', 'complemento', 'complemento', $InformacoesOng['complemento']) ?>
              </div>
              <div class="container-input-endereco-voluntario">
                <?= label('numero', 'Número') ?>
                <?= inputRequired('text', 'numero', 'numero', $InformacoesOng['numero']) ?>
              </div>
            </div>
            <div class="container-endereco-voluntario">
              <div class="container-input-endereco-voluntario">
                <?= label('bairro', 'Bairro') ?>
                <?= inputRequired('text', 'bairro', 'bairro', $InformacoesOng['bairro']) ?>
              </div>
              <div class="container-input-endereco-voluntario">
                <?= label('cidade', 'Cidade') ?>
                <?= inputRequired('text', 'cidade', 'cidade', $InformacoesOng['cidade']) ?>
              </div>
            </div>
          </div>
          <div class="container-readonly-footer">
            <div class="botao-excluir-voluntario">
              <div class="postagem-geral-btn">
                <?= botao('salvar', 'Editar', "", './../../../controller/EditarDadosOngController.php') ?>
              </div>
              <div class="postagem-geral-btn"><?= botao('prev', 'Cancelar', "", '') ?></div>
            </div>
          </div>
        </form>
      </div>
    </div>

  </main>

  <div id="modalConfirmacao" class="modal-overlay">
    <div class="modal-content">
      <p>Tem certeza que deseja excluir este voluntário?</p>
      <div class="modal-botoes">
        <button id="btnConfirmarExclusao" class="botao botao-excluir">Sim</button>
        <button id="btnCancelarExclusao" class="botao botao-cancelar">Cancelar</button>
      </div>
    </div>
  </div>


  <?php require_once "../../../view/components/footer.php"; ?>
</body>

</html>