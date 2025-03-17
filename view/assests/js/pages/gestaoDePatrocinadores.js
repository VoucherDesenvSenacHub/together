function abrirPopup(dialogName) {
    const dialog = document.querySelector(dialogName);
    
    // Verifica se o diálogo foi encontrado no DOM
    if (!dialog) {
        console.error(`Não foi possível encontrar o diálogo com o nome ${dialogName}`);
        return; // Se o diálogo não foi encontrado, não faz nada
    }

    // Alterna o atributo 'open'
    if (dialog.hasAttribute('open')) {
        dialog.removeAttribute('open');
    } else {
        dialog.setAttribute('open', 'true');
    }
}

function fecharPopup(dialogName) {
    const dialog = document.querySelector(dialogName);
    
    // Verifica se o diálogo foi encontrado no DOM
    if (!dialog) {
        console.error(`Não foi possível encontrar o diálogo com o nome ${dialogName}`);
        return; // Se o diálogo não foi encontrado, não faz nada
    }

    // Remove o atributo 'open' para fechar o diálogo
    dialog.removeAttribute('open');
}

// Validação para o botão '.remover'
document.addEventListener('DOMContentLoaded', () => {
    const removerButton = document.querySelector('.remover');
    if (removerButton) {
        removerButton.addEventListener('click', () => {
            const dialog = document.querySelector('dialog');
            if (!dialog) {
                console.error("Não foi possível encontrar o diálogo para remover patrocinador.");
                return;
            }

            if (dialog.hasAttribute('open')) {
                dialog.removeAttribute('open');
            } else {
                dialog.setAttribute('open', 'true');
            }
        });
    }
});


export default {
    abrirPopup,
    fecharPopup
}
