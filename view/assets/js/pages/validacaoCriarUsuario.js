document.addEventListener("DOMContentLoaded", function () {
    // Formata CPF no padrão 000.000.000-00
    function formatarCPF(campo) {
      let value = campo.value.replace(/\D/g, "");
      if (value.length > 11) {
        value = value.substring(0, 11);
      }
      campo.value = value
        .replace(/(\d{3})(\d)/, "$1.$2")
        .replace(/(\d{3})(\d)/, "$1.$2")
        .replace(/(\d{3})(\d)/, "$1-$2");
    }
  
    // Formata telefone no padrão (xx) xxxx-xxxx ou (xx) xxxxx-xxxx
    function formatarTelefone(campo) {
      let value = campo.value.replace(/\D/g, "");
      if (value.length > 11) {
        value = value.substring(0, 11);
      }
  
      if (value.length <= 10) {
        // (xx) xxxx-xxxx
        campo.value = value
          .replace(/(\d{2})(\d{4})(\d{0,4})/, "($1) $2-$3");
      } else {
        // (xx) xxxxx-xxxx
        campo.value = value
          .replace(/(\d{2})(\d{5})(\d{0,4})/, "($1) $2-$3");
      }
    }
  
    const campoCPF = document.getElementById("cpf");
    const campoTelefone = document.getElementById("telefone");
  
    if (campoCPF) {
      formatarCPF(campoCPF);
      campoCPF.addEventListener("input", () => formatarCPF(campoCPF));
    }
  
    if (campoTelefone) {
      formatarTelefone(campoTelefone);
      campoTelefone.addEventListener("input", () => formatarTelefone(campoTelefone));
    }
  
    // Limpar máscaras antes de enviar o formulário
    const form = document.getElementById("criar");
    if (form) {
      form.addEventListener("submit", (e) => {
        if (campoCPF) campoCPF.value = campoCPF.value.replace(/\D/g, "");
        if (campoTelefone) campoTelefone.value = campoTelefone.value.replace(/\D/g, "");
        // Formulário envia CPF e telefone só com números
      });
    }
  });
  