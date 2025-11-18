document.addEventListener('DOMContentLoaded', function () {
    const url = new URL(window.location.href);
    const notificacao = document.querySelector('.modal-notificacao');

    if (url.search === '?msg=voluntarioenviado') {
        notificacao.style.display = 'block';

       
        setTimeout(() => {
            notificacao.style.display = 'none';
        }, 5000);
    }
});

