console.log("ong-filtro.js carregado");

document.addEventListener('DOMContentLoaded', () => {
    const form = document.getElementById('filtro-form');
    console.log("Form encontrado?", form); // vai mostrar o elemento ou null

    if (!form) return;

    const inputs = form.querySelectorAll('input');
    let timeout;

    inputs.forEach(input => {
        const eventType = input.type === 'date' ? 'change' : 'input';
        input.addEventListener(eventType, () => {
            console.log("Form submit disparado para input:", input.name);
            clearTimeout(timeout);
            timeout = setTimeout(() => {
                form.submit();
            }, 300);
        });
    });
});
