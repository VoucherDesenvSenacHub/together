const estadoSelect = document.querySelector('#estado');
if (estadoSelect) {
    estadoSelect.addEventListener('change', function () {
        const sigla = this.value;
        const cidadeSelect = document.querySelector('#cidade');
        if (!cidadeSelect) return; 

        cidadeSelect.innerHTML = '<option value="">Selecione</option>';
        if (!sigla) return;

        const estado = window.estados.find(e => e.sigla === sigla);
        if (!estado) return;

        estado.cidades.forEach(cidade => {
            const opt = document.createElement('option');
            opt.value = cidade;
            opt.textContent = cidade;
            cidadeSelect.appendChild(opt);
        });
    });
}
