document.addEventListener("DOMContentLoaded", function () {
    const parametros = new URLSearchParams(window.location.search);
    const tipoMensagem = parametros.get("msg");
    const notificationContainer = document.querySelector(".notification-validacao-atualizacao");

    function createNotification(type, message) {
        // Verifica se já existe uma notificação do mesmo tipo
        if (document.querySelector(`.notification-item.${type}`)) {
            return; // Sai da função se já houver uma notificação desse tipo
        }

    // Criando o elemento da notificação
    const notification = document.createElement("span");
    notification.classList.add("notification-item", type);

    // Criando o conteúdo da notificação
    notification.innerHTML = `
        <div class="notification-content">
        <div class="notification-icon">
            <svg aria-hidden="true" fill="none" viewBox="0 0 24 24">
            ${
                type === "success"
                ? `<path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8.5 11.5 11 14l4-4m6 2a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z"></path>`
                : `<path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m15 9-6 6m0-6 6 6m6-3a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z"></path>`
            }
            </svg>
        </div>
        <div class="notification-text">${message}</div>
        </div>
        <div class="notification-icon notification-close">
        <svg aria-hidden="true" fill="none" viewBox="0 0 24 24">
            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18 17.94 6M18 18 6.06 6"></path>
        </svg>
        </div>
        <div class="notification-progress-bar"></div>
    `;

    // Adiciona evento para fechar a notificação
    notification.querySelector(".notification-close").addEventListener("click", function () {
        notification.remove();
    });

    // Adiciona a notificação ao container
    notificationContainer.appendChild(notification);

    // Remove a notificação automaticamente após 5 segundos
    setTimeout(() => {
        notification.remove();
    }, 5000);
    }


    if (tipoMensagem === "atualizacaoAceita") {
        // Evento de clique para aceitar voluntário
        createNotification("success", "Validação Aceita !");
        // hideButtonArea();

    } else if (tipoMensagem === "atualizacaoRecusada") {
        // Evento de clique para recusar voluntário
        createNotification("error", "Validação Recusada !");
        // hideButtonArea();
    }


    notificationContainer.appendChild(notification);

    document.body.appendChild(notificacao)

    // Serve para apagar os parametros da url, voltando para o pathname (url sem parametro)
    const urlSemParametro = window.location.pathname
    window.history.replaceState(null, "", urlSemParametro)
});