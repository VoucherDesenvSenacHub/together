document.addEventListener('DOMContentLoaded', function () {
  const openBtns = document.querySelectorAll('#abrir-patrocinadores');
  const closeBtn = document.getElementById('fechar-patrocinadores');
  const overlay = document.getElementById('modal-overlay-patrocinadores');

  if (!openBtns || !closeBtn || !overlay) return;

  openBtns.forEach(btn => {
      btn.addEventListener('click', () => {
          overlay.style.display = 'flex';
      });
  });

  closeBtn.addEventListener('click', () => {
      overlay.style.display = 'none';
  });

  overlay.addEventListener('click', (e) => {
      if (e.target === overlay) {
          overlay.style.display = 'none';
      }
  });
});
