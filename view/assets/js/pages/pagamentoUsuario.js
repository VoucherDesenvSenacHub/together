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
            mes = Math.min(Math.max(mes, 1), 12);
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

    function formatarValor(campo) {
        let value = campo.value.replace(/\D/g, "");

        while (value.length < 3) {
            value = "0" + value;
        }

        const centavos = value.slice(-2);
        let reais = value.slice(0, -2).replace(/^0+/, "");
        reais = reais === "" ? "0" : reais;
        reais = reais.replace(/\B(?=(\d{3})+(?!\d))/g, ".");

        campo.value = `R$ ${reais},${centavos}`;
    }


    const campoCartao = document.getElementById("numero");
    const campoValidade = document.getElementById("validade");
    const campoCVV = document.getElementById("cvv");
    const campoValor = document.getElementById("valor");

    // Máscaras e restrições
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

    if (campoValor) {
        formatarValor(campoValor);
        campoValor.addEventListener("input", () => formatarValor(campoValor));
        campoValor.addEventListener("keypress", somenteNumeros);
    }

    
    const form = document.getElementById("form-pagamento");
    if (form) {
        form.addEventListener("submit", (e) => {
            const numero = campoCartao?.value.replace(/\D/g, "") || "";
            const cvv = campoCVV?.value.replace(/\D/g, "") || "";
            const validade = campoValidade?.value || "";
            let valorRaw = campoValor?.value || "";

            if (numero.length !== 16 || cvv.length !== 3 || validade.length !== 5) {
                e.preventDefault();
                alert("Por favor, preencha todos os campos corretamente.");
                return;
            }

            if (campoValor) {
                let valorLimpo = valorRaw.replace(/[^\d]/g, "");
                let valorFinal = (parseInt(valorLimpo, 10) / 100).toFixed(2);
                campoValor.value = valorFinal;
            }

            if (campoCartao) campoCartao.value = numero;
            if (campoCVV) campoCVV.value = cvv;
        });
    }

    
    const toggle = document.getElementById('pagamento_anonimo');
    const mainContainer = document.querySelector('.main-container');
    const body = document.querySelector('.user_pay');

    if (toggle && mainContainer && body) {
        toggle.addEventListener('change', function () {
            if (this.checked) {
                mainContainer.classList.add('modo-anonimo');
                body.classList.add('modo-anonimo');
            } else {
                mainContainer.classList.remove('modo-anonimo');
                body.classList.remove('modo-anonimo'); 
            }
        });
    }

});
