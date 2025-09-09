<?php require_once "../../../view/components/head.php"; ?>
<?php require_once "../../../view/components/label.php"; ?>
<?php require_once "../../../view/components/input.php"; ?>
<?php require_once "../../../view/components/button.php"; ?>
<?php require_once './../../../model/AdmModel.php'; ?>

<?php
$OngModel = new AdmModel();
$InformacoesOng = $OngModel->buscarOngPorId($_SESSION['id']);

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
                    <?= inputReadonly('text', 'nome', 'nome', $InformacoesOng['nome']) ?>
                  </div>
                  <div>
                    <?= label('telefone', 'Telefone') ?>
                    <?= inputReadonly('text', 'telefone', 'telefone', '+55 (67) 9 9999-9999') ?>
                  </div>
                </div>
                <div class="form-row">
                  <div>
                    <?= label('cnpj', 'CNPJ') ?>
                    <?= inputReadonly('text', 'cnpj', 'cnpj', '00.000.000/0000-00') ?>
                  </div>
                  <div>
                    <?= label('data', 'Data da Fundação') ?>
                    <?= inputReadonly('text', 'data', 'data', '19/01/1990') ?>
                  </div>
                </div>
              </div>
              <div class="container-input-email-voluntario">
                <?= label('email', 'Email') ?>
                <?= inputReadonly('text', 'email', 'email', $InformacoesOng['email']) ?>
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
                <?= inputReadonly('text', 'cep', 'cep', '123456-7') ?>
              </div>
              <div class="container-input-endereco-voluntario">
                <?= label('logradouro', 'Logradouro') ?>
                <?= inputReadonly('text', 'logradouro', 'logradouro', 'Rua dos bobos') ?>
              </div>
            </div>
            <div class="container-endereco-voluntario">
              <div class="container-input-endereco-voluntario">
                <?= label('complemento', 'Complemento') ?>
                <?= inputReadonly('text', 'complemento', 'complemento', 'Ao lado do hospital do carinho') ?>
              </div>
              <div class="container-input-endereco-voluntario">
                <?= label('numero', 'Número') ?>
                <?= inputReadonly('text', 'numero', 'numero', '0') ?>
              </div>
            </div>
            <div class="container-endereco-voluntario">
              <div class="container-input-endereco-voluntario">
                <?= label('bairro', 'Bairro') ?>
                <?= inputReadonly('text', 'bairro', 'bairro', 'Centro') ?>
              </div>
              <div class="container-input-endereco-voluntario">
                <?= label('cidade', 'Cidade') ?>
                <?= inputReadonly('text', 'cidade', 'cidade', 'Campo Grande') ?>
              </div>
            </div>
          </div>
          <div class="container-readonly-footer">
            <div class="botao-excluir-voluntario">
              <div class="postagem-geral-btn"><?= botao('salvar', 'Editar', "", '') ?></div>
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