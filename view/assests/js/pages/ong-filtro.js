document.addEventListener('DOMContentLoaded', () => {
    console.log("ong-filtro.js carregado");

    const form = document.getElementById('filtro-form');
    console.log("Form encontrado?", form);

    if (!form) return;

    const inputs = form.querySelectorAll('input');
    let debounceTimer;

    inputs.forEach(input => {
        input.addEventListener('input', () => {
            clearTimeout(debounceTimer); // reseta o timer anterior

            // espera 500ms sem digitar para enviar
            debounceTimer = setTimeout(() => {
                console.log("Form submit disparado para input:", input.name);
                form.submit();
            }, 1000);
        });
    });
});
