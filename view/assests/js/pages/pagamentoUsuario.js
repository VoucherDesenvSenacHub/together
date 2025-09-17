document.addEventListener("DOMContentLoaded", function () {

    function somenteNumeros(e) {
        if (!/\d/.test(e.key)) {
            e.preventDefault();
        }
    }

    function formatarCartao(campo) {
        let value = campo.value.replace(/\D/g, "").substring(0, 16);
        campo.value = value.replace(/(\d{4})(?=\d)/g, "$1 ").trim();
    }

    function formatarValidade(campo) {
        let value = campo.value.replace(/\D/g, "").substring(0, 4);

        if (value.length >= 3) {
            let mes = parseInt(value.substring(0, 2), 10);
            mes = Math.min(Math.max(mes, 1), 12); // Garante entre 01 e 12
            let ano = value.substring(2, 4);
            campo.value = `${mes.toString().padStart(2, '0')}/${ano}`;
        } else {
            campo.value = value;
        }
    }

    function formatarCVV(campo) {
        let value = campo.value.replace(/\D/g, "").substring(0, 3);
        campo.value = value;
    }

    // Seleção dos campos
    const campoCartao = document.getElementById("numero");
    const campoValidade = document.getElementById("validade");
    const campoCVV = document.getElementById("cvv");

    // Máscaras e restrições de digitação
    if (campoCartao) {
        formatarCartao(campoCartao);
        campoCartao.addEventListener("input", () => formatarCartao(campoCartao));
        campoCartao.addEventListener("keypress", somenteNumeros);
    }

    if (campoValidade) {
        formatarValidade(campoValidade);
        campoValidade.addEventListener("input", () => formatarValidade(campoValidade));
        campoValidade.addEventListener("keypress", somenteNumeros);
    }

    if (campoCVV) {
        formatarCVV(campoCVV);
        campoCVV.addEventListener("input", () => formatarCVV(campoCVV));
        campoCVV.addEventListener("keypress", somenteNumeros);
    }

    // Validação e limpeza ao enviar o formulário
    const form = document.getElementById("form-pagamento");
    if (form) {
        form.addEventListener("submit", (e) => {
            const numero = campoCartao?.value.replace(/\D/g, "") || "";
            // const validade = campoValidade?.value.replace(/\D/g, "") || "";
            const cvv = campoCVV?.value.replace(/\D/g, "") || "";

            if (numero.length !== 16 || cvv.length !== 3 || (campoValidade && campoValidade.value.length !== 5)) {
                e.preventDefault();
                alert("Por favor, preencha todos os campos corretamente.");
                return;
            }

            // Substitui valores com versões sem formatação
            if (campoCartao) campoCartao.value = numero;
            // if (campoValidade) campoValidade.value = validade;
            if (campoCVV) campoCVV.value = cvv;
        });
    }

});
