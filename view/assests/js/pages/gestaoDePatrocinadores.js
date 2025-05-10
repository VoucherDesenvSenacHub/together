document.addEventListener('DOMContentLoaded', function () {
    const openBtn = document.getElementById('abrir-patrocinadores');
    const closeBtn = document.getElementById('fechar-patrocinadores');
    const overlay = document.getElementById('modal-overlay-patrocinadores');
  
    if (!openBtn || !closeBtn || !overlay) return;
  
    openBtn.addEventListener('click', () => {
      overlay.style.display = 'flex';
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
  