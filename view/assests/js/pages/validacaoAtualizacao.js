var btn = document.querySelector("#validacao-atualizacao-botao-recusa"); 
var dialog = document.querySelector(".dialog-obs-validacao-atualizacao"); 

function btnClicked() {
    dialog.style.display = "block";        
};

btn.addEventListener('click', btnClicked);

var textarea = document.querySelector(".textarea-validacao-atualizacao");
textarea.value = '';

// NOVO

var inputLogoNovo = document.querySelector('#logo-ong-novo');
var nomeLogoNovo = document.querySelector('#validacao-atualizacao-logo-file-novo');
var inputConselhoFiscalNovo = document.querySelector('#conselho-fiscal-novo');
var nomeConselhoNovo = document.querySelector('#validacao-atualizacao-conselho-fiscal-file-novo');

// Quando o arquivo de logo for selecionado
inputLogoNovo.addEventListener('change', function () {
    var nomeLogo = this.files[0] ? this.files[0].name : ''; // Nome do arquivo de logo
    nomeLogoNovo.textContent = nomeLogo;
});

// Quando o arquivo de conselho fiscal for selecionado
inputConselhoFiscalNovo.addEventListener('change', function () {
    var nomeConselho = this.files[0] ? this.files[0].name : ''; // Nome do arquivo de conselho fiscal
    nomeConselhoNovo.textContent = nomeConselho;
}); 

// Dialog de Atualizacao aceita
document.addEventListener("DOMContentLoaded", function () {
    const notificationContainer = document.querySelector(".dialog-atualiza-validacao");
    const buttonArea = document.querySelector(".div-botao-validacao-atualizacao"); // Seleciona a div dos botões
    const aceitarButton = document.getElementById("validacao-atualizacao-botao-aceitar");
    const recusaButton = document.getElementById("validacao-atualizacao-botao-recusa");
    const enviarButton = document.getElementById("validacao-atualizacao-botao-obs");

    function createNotification(type, message) {
    // Verifica se já existe uma notificação do mesmo tipo
    if (document.querySelector(`.notification-item.${type}`)) {
        return; // Sai da função se já houver uma notificação desse tipo
    }

    // Criando o elemento da notificação
    const notification = document.createElement("li");
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

    // Evento de clique para aceitar voluntário
    aceitarButton.addEventListener("click", function () {
    createNotification("success", "Validação aceita !");
    hideButtonArea();
    });

    // Evento de clique para recusar voluntário
    recusaButton.addEventListener("click", function () {
    createNotification("error", "Validação recusada !");
    hideButtonArea();
    });

    enviarButton.addEventListener("click", function () {
        createNotification("success", "Observação enviada !");
        hideButtonArea();
    });
});