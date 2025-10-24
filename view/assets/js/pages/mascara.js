document.addEventListener("DOMContentLoaded", function () {
  function formatarCNPJ(campo) {
    let value = campo.value.replace(/\D/g, "");
    if (value.length > 14) value = value.substring(0, 14);
    value = value.replace(/^(\d{2})(\d)/, "$1.$2");
    value = value.replace(/^(\d{2})\.(\d{3})(\d)/, "$1.$2.$3");
    value = value.replace(/\.(\d{3})(\d)/, ".$1/$2");
    value = value.replace(/(\d{4})(\d)/, "$1-$2");
    campo.value = value;
  }

  (function initCNPJFormatter() {
    const campoCNPJ = document.getElementById("cnpj");
    if (!campoCNPJ) return;
    formatarCNPJ(campoCNPJ);
    campoCNPJ.addEventListener("input", () => formatarCNPJ(campoCNPJ));
  })();

  function formatarTelefone(campo) {
    let value = campo.value.replace(/\D/g, "");
    if (value.length > 11) value = value.substring(0, 11);
    if (value.length > 10) {
      value = value.replace(/^(\d{2})(\d{5})(\d{4})$/, "($1) $2-$3");
    } else if (value.length > 6) {
      value = value.replace(/^(\d{2})(\d{4})(\d{0,4})$/, "($1) $2-$3");
    } else if (value.length > 2) {
      value = value.replace(/^(\d{2})(\d{0,5})$/, "($1) $2");
    } else {
      value = value.replace(/^(\d*)$/, "($1");
    }
    campo.value = value;
  }

  (function initTelefoneFormatter() {
    const campoTelefone = document.getElementById("telefone");
    if (!campoTelefone) return;
    formatarTelefone(campoTelefone);
    campoTelefone.addEventListener("input", () =>
      formatarTelefone(campoTelefone)
    );
  })();

  function formatarCEP(campo) {
    let value = campo.value.replace(/\D/g, "");
    if (value.length > 8) value = value.substring(0, 8);
    if (value.length > 5) {
      value = value.replace(/^(\d{5})(\d{0,3})$/, "$1-$2");
    }
    campo.value = value;
  }

  (function initCEPFormatter() {
    const campoCEP = document.getElementById("cep");
    if (!campoCEP) return;
    formatarCEP(campoCEP);
    campoCEP.addEventListener("input", () => formatarCEP(campoCEP));
  })();

  function formatarData(campo) {
    let value = campo.value.replace(/\D/g, "");
    if (value.length > 8) value = value.substring(0, 8);
    if (value.length > 4) {
      value = value.replace(/^(\d{2})(\d{2})(\d{0,4})$/, "$1/$2/$3");
    } else if (value.length > 2) {
      value = value.replace(/^(\d{2})(\d{0,2})$/, "$1/$2");
    }
    campo.value = value;
  }

  (function initDataFormatter() {
    const campoData = document.getElementById("data");
    if (!campoData) return;
    if (/^\d{4}-\d{2}-\d{2}$/.test(campoData.value)) {
      let partes = campoData.value.split("-");
      campoData.value = `${partes[2]}/${partes[1]}/${partes[0]}`;
    }
    formatarData(campoData);
    campoData.addEventListener("input", () => formatarData(campoData));
  })();
});
