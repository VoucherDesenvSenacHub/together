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
