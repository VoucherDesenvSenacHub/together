// Função para verificar se o elemento existe antes de manipular
function verificarElemento(elementoId) {
    const elemento = document.getElementById(elementoId);
    return elemento ? elemento : null;
}

// Ajustando os eventos de clique com validação de elementos
document.getElementById('criar-conta-usuario-button')?.addEventListener('click', function (event) {
    event.preventDefault(); // Previne o comportamento padrão do botão

    const loginConteudoUsuario = verificarElemento('loginConteudoUsuario');
    const recuperarConteudoUsuario = verificarElemento('recuperarConteudoUsuario');
    const registrarConteudoUsuario = verificarElemento('registrarConteudoUsuario');

    if (loginConteudoUsuario) {
        loginConteudoUsuario.classList.remove('show');
        loginConteudoUsuario.classList.add('hidden');
    }

    if (recuperarConteudoUsuario) {
        recuperarConteudoUsuario.classList.add('hidden');
    }

    if (registrarConteudoUsuario) {
        registrarConteudoUsuario.classList.remove('hidden');
        registrarConteudoUsuario.classList.add('show');
        setTimeout(() => {
            registrarConteudoUsuario.style.right = '50px';
        }, 10); 
    }
});

document.getElementById('esqueci-senha-button')?.addEventListener('click', function (event) {
    event.preventDefault(); // Previne o comportamento padrão do botão

    const loginConteudoUsuario = verificarElemento('loginConteudoUsuario');
    const recuperarConteudoUsuario = verificarElemento('recuperarConteudoUsuario');
    const registrarConteudoUsuario = verificarElemento('registrarConteudoUsuario');

    if (loginConteudoUsuario) {
        loginConteudoUsuario.classList.remove('show');
        loginConteudoUsuario.classList.add('hidden');
    }

    if (recuperarConteudoUsuario) {
        recuperarConteudoUsuario.classList.add('show');
        recuperarConteudoUsuario.classList.remove('hidden');
        setTimeout(() => {
            recuperarConteudoUsuario.style.right = '50px'; // Changed to recuperarConteudoUsuario
        }, 10); 
    }

    if (registrarConteudoUsuario) {
        registrarConteudoUsuario.classList.add('hidden');
        registrarConteudoUsuario.classList.remove('show');
    }
});

// Validando o botão da casa para o login
document.getElementById('house-button-login-usuario')?.addEventListener('click', function (event) {
    event.preventDefault(); // Previne o comportamento padrão do botão

    const loginConteudoUsuario = verificarElemento('loginConteudoUsuario');
    const recuperarConteudoUsuario = verificarElemento('recuperarConteudoUsuario');
    const registrarConteudoUsuario = verificarElemento('registrarConteudoUsuario');

    if (loginConteudoUsuario) {
        loginConteudoUsuario.classList.add('show');
        loginConteudoUsuario.classList.remove('hidden');
    }

    if (recuperarConteudoUsuario) {
        recuperarConteudoUsuario.classList.add('hidden');
        recuperarConteudoUsuario.classList.remove('show');
    }

    if (registrarConteudoUsuario) {
        registrarConteudoUsuario.classList.add('hidden');
        registrarConteudoUsuario.classList.remove('show');
    }

    setTimeout(() => {
        if (loginConteudoUsuario) {
            loginConteudoUsuario.style.right = '50px'; // Changed to loginConteudoUsuario
        }
    }, 10); 
});

// Validando o botão da casa para o recuperar
document.getElementById('house-button-recuperar-usuario')?.addEventListener('click', function (event) {
    event.preventDefault();
    
    const loginConteudoUsuario = verificarElemento('loginConteudoUsuario');
    const recuperarConteudoUsuario = verificarElemento('recuperarConteudoUsuario');
    const registrarConteudoUsuario = verificarElemento('registrarConteudoUsuario');

    if (loginConteudoUsuario) {
        loginConteudoUsuario.classList.add('show');
        loginConteudoUsuario.classList.remove('hidden');
    }

    if (recuperarConteudoUsuario) {
        recuperarConteudoUsuario.classList.add('hidden');
        recuperarConteudoUsuario.classList.remove('show');
    }

    if (registrarConteudoUsuario) {
        registrarConteudoUsuario.classList.add('hidden');
        registrarConteudoUsuario.classList.remove('show');
    }

    setTimeout(() => {
        if (loginConteudoUsuario) {
            loginConteudoUsuario.style.right = '50px';
        }
    }, 10);
});

// Validando o botão da casa para o registrar
document.getElementById('house-button-registrar-usuario')?.addEventListener('click', function (event) {
    event.preventDefault();
    
    const loginConteudoUsuario = verificarElemento('loginConteudoUsuario');
    const recuperarConteudoUsuario = verificarElemento('recuperarConteudoUsuario');
    const registrarConteudoUsuario = verificarElemento('registrarConteudoUsuario');

    if (loginConteudoUsuario) {
        loginConteudoUsuario.classList.add('show');
        loginConteudoUsuario.classList.remove('hidden');
    }

    if (recuperarConteudoUsuario) {
        recuperarConteudoUsuario.classList.add('hidden');
        recuperarConteudoUsuario.classList.remove('show');
    }

    if (registrarConteudoUsuario) {
        registrarConteudoUsuario.classList.add('hidden');
        registrarConteudoUsuario.classList.remove('show');
    }

    setTimeout(() => {
        if (loginConteudoUsuario) {
            loginConteudoUsuario.style.right = '50px';
        }
    }, 10);
});

// Garantir que o evento de clique no botão de login seja tratado corretamente
document.addEventListener('DOMContentLoaded', function () {
    const form = document.querySelector('.login-usuario');

    if (form) {
        form.addEventListener('submit', function (event) {
            event.preventDefault(); // Impede que o formulário seja enviado
        });
    }
});
