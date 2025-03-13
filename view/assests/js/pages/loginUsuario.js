document.getElementById('criarContaButton').addEventListener('click', function (event) {
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

document.getElementById('esqueciSenhaButton').addEventListener('click', function (event) {
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
        registrarContent.style.right = '50px'; 
    }, 10); 
});


document.getElementById('house-icon').addEventListener('click', function (event) {
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
        registrarContent.style.right = '50px'; 
    }, 10); 
});