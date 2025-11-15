
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
