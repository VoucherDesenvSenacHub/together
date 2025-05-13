document.addEventListener('DOMContentLoaded', function () {
  const overlay = document.getElementById('modal-overlay-validar-ong');
  const fecharBtn = document.getElementById('fechar-modal-ong');
  const aceitarBtn = document.getElementById('aceitar-ong');
  const rejeitarBtn = document.getElementById('rejeitar-ong');
  const mensagemStatus = document.getElementById('mensagem-status');

  if (!overlay || !fecharBtn || !aceitarBtn || !rejeitarBtn) return;

  // Abre o modal ao clicar no ícone de "visualizar"
  document.addEventListener('click', function (e) {
      const alvo = e.target;

      if (alvo.classList.contains('fa-eye')) {
          overlay.style.display = 'flex';
      }
  });

  // Fecha o modal ao clicar no botão "Fechar"
  fecharBtn.addEventListener('click', () => {
      overlay.style.display = 'none';
  });

  // Fecha o modal ao clicar fora dele (na overlay)
  overlay.addEventListener('click', (e) => {
      if (e.target === overlay) {
          overlay.style.display = 'none';
      }
  });

  // Ação de Aceitar
  aceitarBtn.addEventListener('click', () => {
      mensagemStatus.classList.remove('mensagem-rejeitada');
      mensagemStatus.classList.add('mensagem-aceita');
      mensagemStatus.textContent = 'ONG Aceita com sucesso!';
      mensagemStatus.style.display = 'block';
  });

  // Ação de Rejeitar
  rejeitarBtn.addEventListener('click', () => {
      mensagemStatus.classList.remove('mensagem-aceita');
      mensagemStatus.classList.add('mensagem-rejeitada');
      mensagemStatus.textContent = 'ONG Rejeitada!';
      mensagemStatus.style.display = 'block';
  });
});
