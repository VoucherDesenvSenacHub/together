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
      window.location.href = 'voluntariosOng.php?'; 

      modal.style.display = 'none';
    });
  }
});

// Cria mascara para o CEP
document.addEventListener("DOMContentLoaded", function () {
  function formatarCEP(campo) {
    let value = campo.value.replace(/\D/g, ""); // Remove tudo que não é número
    if (value.length > 8) value = value.substring(0, 8); // Limita a 8 dígitos
    campo.value = value.replace(/(\d{5})(\d)/, "$1-$2"); // Coloca o hífen após os 5 primeiros dígitos
  }

  (function initCEPFormatter() {
    const campoCEP = document.getElementById("cep");
    if (!campoCEP) return;

    // Formata inicialmente (caso já tenha valor)
    formatarCEP(campoCEP);

    // Atualiza conforme o usuário digita
    campoCEP.addEventListener("input", () => formatarCEP(campoCEP));
  })();
});

//Cria uma validação de segurança para os input com a classe (formulario-input)
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
        // Apenas previne HTML e JavaScript embutido
        input.value = escapeHTML(input.value);
      });
    });
  }

  applySanitizer();
});

// proibir uso de caracteres especiais no input nome
document.getElementById('nome').addEventListener('input', function(event) {
    // Remove tudo que não for letra (incluindo letras acentuadas) e espaço
    this.value = this.value.replace(/[^A-Za-zÀ-ÿ\s]/g, '');
});
