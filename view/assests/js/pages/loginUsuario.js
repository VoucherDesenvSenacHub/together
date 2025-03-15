// Fix the button ID mismatches in the event listeners
document.getElementById('criar-conta-button').addEventListener('click', function (event) {
    event.preventDefault(); // Previne o comportamento padrão do botão

    const loginContent = document.getElementById('loginContent');
    const recuperarContent = document.getElementById('recuperarContent');
    const registrarContent = document.getElementById('registrarContent');

    loginContent.classList.remove('show');
    loginContent.classList.add('hidden');
    recuperarContent.classList.add('hidden');
    registrarContent.classList.remove('hidden');
    registrarContent.classList.add('show');

    setTimeout(() => {
        registrarContent.style.right = '50px';
    }, 10); 
});

document.getElementById('esqueci-senha-button').addEventListener('click', function (event) {
    event.preventDefault(); // Previne o comportamento padrão do botão

    const loginContent = document.getElementById('loginContent');
    const recuperarContent = document.getElementById('recuperarContent');
    const registrarContent = document.getElementById('registrarContent');

    loginContent.classList.remove('show');
    loginContent.classList.add('hidden');
    recuperarContent.classList.add('show');
    recuperarContent.classList.remove('hidden');
    registrarContent.classList.add('hidden');
    registrarContent.classList.remove('show');

    setTimeout(() => {
        recuperarContent.style.right = '50px'; // Changed to recuperarContent
    }, 10); 
});

// Fix the house button ID for each section
document.getElementById('house-button-login-usuario').addEventListener('click', function (event) {
    event.preventDefault(); // Previne o comportamento padrão do botão

    const loginContent = document.getElementById('loginContent');
    const recuperarContent = document.getElementById('recuperarContent');
    const registrarContent = document.getElementById('registrarContent');

    loginContent.classList.add('show');
    loginContent.classList.remove('hidden');
    recuperarContent.classList.add('hidden');
    recuperarContent.classList.remove('show');
    registrarContent.classList.add('hidden');
    registrarContent.classList.remove('show');

    setTimeout(() => {
        loginContent.style.right = '50px'; // Changed to loginContent
    }, 10); 
});

// Garantir que o evento de clique no botão de login seja tratado corretamente
// document.getElementById('botao-login-usuario').addEventListener('click', function() {
//     // Redireciona para a página especificada
//     window.location.href = '/together/view/home.php';
// });


// Add event listeners for the other house buttons
document.getElementById('house-button-recuperar-usuario').addEventListener('click', function (event) {
    event.preventDefault();
    
    const loginContent = document.getElementById('loginContent');
    const recuperarContent = document.getElementById('recuperarContent');
    const registrarContent = document.getElementById('registrarContent');

    loginContent.classList.add('show');
    loginContent.classList.remove('hidden');
    recuperarContent.classList.add('hidden');
    recuperarContent.classList.remove('show');
    registrarContent.classList.add('hidden');
    registrarContent.classList.remove('show');

    setTimeout(() => {
        loginContent.style.right = '50px';
    }, 10);
});

document.getElementById('house-button-registrar-usuario').addEventListener('click', function (event) {
    event.preventDefault();
    
    const loginContent = document.getElementById('loginContent');
    const recuperarContent = document.getElementById('recuperarContent');
    const registrarContent = document.getElementById('registrarContent');

    loginContent.classList.add('show');
    loginContent.classList.remove('hidden');
    recuperarContent.classList.add('hidden');
    recuperarContent.classList.remove('show');
    registrarContent.classList.add('hidden');
    registrarContent.classList.remove('show');

    setTimeout(() => {
        loginContent.style.right = '50px';
    }, 10);
});
