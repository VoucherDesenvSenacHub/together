// Fix the button ID mismatches in the event listeners
document.getElementById('criar-conta-usuario-button').addEventListener('click', function (event) {
    event.preventDefault(); // Previne o comportamento padrão do botão

    const loginConteudoUsuario = document.getElementById('loginConteudoUsuario');
    const recuperarConteudoUsuario = document.getElementById('recuperarConteudoUsuario');
    const registrarConteudoUsuario = document.getElementById('registrarConteudoUsuario');

    loginConteudoUsuario.classList.remove('show');
    loginConteudoUsuario.classList.add('hidden');

    recuperarConteudoUsuario.classList.add('hidden');

    registrarConteudoUsuario.classList.remove('hidden');
    registrarConteudoUsuario.classList.add('show');

    setTimeout(() => {
        registrarConteudoUsuario.style.right = '50px';
    }, 10); 
});

document.getElementById('esqueci-senha-button').addEventListener('click', function (event) {
    event.preventDefault(); // Previne o comportamento padrão do botão

    const loginConteudoUsuario = document.getElementById('loginConteudoUsuario');
    const recuperarConteudoUsuario = document.getElementById('recuperarConteudoUsuario');
    const registrarConteudoUsuario = document.getElementById('registrarConteudoUsuario');

    loginConteudoUsuario.classList.remove('show');
    loginConteudoUsuario.classList.add('hidden');

    recuperarConteudoUsuario.classList.add('show');
    recuperarConteudoUsuario.classList.remove('hidden');
    
    registrarConteudoUsuario.classList.add('hidden');
    registrarConteudoUsuario.classList.remove('show');

    setTimeout(() => {
        recuperarConteudoUsuario.style.right = '50px'; // Changed to recuperarConteudoUsuario
    }, 10); 
});

// Fix the house button ID for each section
document.getElementById('house-button-login-usuario').addEventListener('click', function (event) {
    event.preventDefault(); // Previne o comportamento padrão do botão

    const loginConteudoUsuario = document.getElementById('loginConteudoUsuario');
    const recuperarConteudoUsuario = document.getElementById('recuperarConteudoUsuario');
    const registrarConteudoUsuario = document.getElementById('registrarConteudoUsuario');

    loginConteudoUsuario.classList.add('show');
    loginConteudoUsuario.classList.remove('hidden');
    recuperarConteudoUsuario.classList.add('hidden');
    recuperarConteudoUsuario.classList.remove('show');
    registrarConteudoUsuario.classList.add('hidden');
    registrarConteudoUsuario.classList.remove('show');

    setTimeout(() => {
        loginConteudoUsuario.style.right = '50px'; // Changed to loginConteudoUsuario
    }, 10); 
});

// Add event listeners for the other house buttons
document.getElementById('house-button-recuperar-usuario').addEventListener('click', function (event) {
    event.preventDefault();
    
    const loginConteudoUsuario = document.getElementById('loginConteudoUsuario');
    const recuperarConteudoUsuario = document.getElementById('recuperarConteudoUsuario');
    const registrarConteudoUsuario = document.getElementById('registrarConteudoUsuario');

    loginConteudoUsuario.classList.add('show');
    loginConteudoUsuario.classList.remove('hidden');
    recuperarConteudoUsuario.classList.add('hidden');
    recuperarConteudoUsuario.classList.remove('show');
    registrarConteudoUsuario.classList.add('hidden');
    registrarConteudoUsuario.classList.remove('show');

    setTimeout(() => {
        loginConteudoUsuario.style.right = '50px';
    }, 10);
});

document.getElementById('house-button-registrar-usuario').addEventListener('click', function (event) {
    event.preventDefault();
    
    const loginConteudoUsuario = document.getElementById('loginConteudoUsuario');
    const recuperarConteudoUsuario = document.getElementById('recuperarConteudoUsuario');
    const registrarConteudoUsuario = document.getElementById('registrarConteudoUsuario');

    loginConteudoUsuario.classList.add('show');
    loginConteudoUsuario.classList.remove('hidden');
    recuperarConteudoUsuario.classList.add('hidden');
    recuperarConteudoUsuario.classList.remove('show');
    registrarConteudoUsuario.classList.add('hidden');
    registrarConteudoUsuario.classList.remove('show');

    setTimeout(() => {
        loginConteudoUsuario.style.right = '50px';
    }, 10);
});