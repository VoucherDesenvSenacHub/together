document.addEventListener('DOMContentLoaded', function() {
  const btnExcluir = document.getElementById('btnExcluirVoluntario');
  const modal = document.getElementById('modalConfirmacao');
  const btnCancelar = document.getElementById('btnCancelarExclusao');
  const btnConfirmar = document.getElementById('btnConfirmarExclusao');

  if(btnExcluir && modal && btnCancelar && btnConfirmar) {
  
    btnExcluir.addEventListener('click', function(event) {
      event.preventDefault(); 
      modal.style.display = 'flex';
    });

    btnCancelar.addEventListener('click', function() {
      modal.style.display = 'none';
    });

    btnConfirmar.addEventListener('click', function() {
   
     
      document.querySelector('form').submit();

     
      window.location.href = 'voluntariosOng.php?'; 

      modal.style.display = 'none';
    });
  }
});


document.addEventListener("DOMContentLoaded", function () {
  function formatarCEP(campo) {
    let value = campo.value.replace(/\D/g, ""); 
    if (value.length > 8) value = value.substring(0, 8); 
    campo.value = value.replace(/(\d{5})(\d)/, "$1-$2"); 
  }

  (function initCEPFormatter() {
    const campoCEP = document.getElementById("cep");
    if (!campoCEP) return;

   
    formatarCEP(campoCEP);

    campoCEP.addEventListener("input", () => formatarCEP(campoCEP));
  })();
});


document.addEventListener("DOMContentLoaded", () => {
  function escapeHTML(str) {
    return str.replace(/[&<>"']/g, match => {
      const map = {
        '&': '&amp;',
        '<': '&lt;',
        '>': '&gt;',
        '"': '&quot;',
        "'": '&#39;'
      };
      return map[match];
    });
  }

  function applySanitizer() {
    const inputs = document.querySelectorAll(".formulario-input");
    inputs.forEach(input => {
      input.addEventListener("input", () => {
    
        input.value = escapeHTML(input.value);
      });
    });
  }

  applySanitizer();
});

document.getElementById('nome').addEventListener('input', function(event) {
   
    this.value = this.value.replace(/[^A-Za-zÀ-ÿ\s]/g, '');
});
