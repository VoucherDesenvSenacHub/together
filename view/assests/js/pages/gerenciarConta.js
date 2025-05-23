document.addEventListener("DOMContentLoaded", function () {
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

  (function initCPFFormatter() {
    const campoCPF = document.getElementById("cpf");
    if (!campoCPF) return;

    formatarCPF(campoCPF);
    campoCPF.addEventListener("input", () => formatarCPF(campoCPF));
  })();
}); // <- esse ponto e vírgula é importante aqui
