document.addEventListener('DOMContentLoaded', function() {
  const btnExcluir = document.getElementById('btnExcluirVoluntario');
  const modal = document.getElementById('modalConfirmacao');
  const btnCancelar = document.getElementById('btnCancelarExclusao');
  const btnConfirmar = document.getElementById('btnConfirmarExclusao');

  if(btnExcluir && modal && btnCancelar && btnConfirmar) {
    // Abre o modal ao clicar no botão Excluir
    btnExcluir.addEventListener('click', function(event) {
      event.preventDefault();  // evita o envio imediato
      modal.style.display = 'flex';
    });

    btnCancelar.addEventListener('click', function() {
      modal.style.display = 'none';
    });

    btnConfirmar.addEventListener('click', function() {
      // Pode enviar o form ou redirecionar para a página de exclusão
      // Exemplo enviando o form:
      document.querySelector('form').submit();

      // Ou redirecionar para página que processa a exclusão
      window.location.href = 'voluntariosOng.php?acao=excluir&id=ID_DO_VOLUNTARIO'; 

      modal.style.display = 'none';
    });
  }
});
