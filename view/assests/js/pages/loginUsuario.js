if (window.location.pathname.includes("loginUsuario.php")) {

    // Alternar para tela de registro
    document.getElementById('criar-conta-usuario-button').addEventListener('click', function (event) {
        event.preventDefault();
  
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
  
    // Alternar para tela de recuperar senha
    document.getElementById('esqueci-senha-button').addEventListener('click', function (event) {
        event.preventDefault();
  
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
            recuperarConteudoUsuario.style.right = '50px';
        }, 10); 
    });
  
    // Botão "casinha" do login
    document.getElementById('house-button-login-usuario').addEventListener('click', function (event) {
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
  
    // Submissão do formulário de login (impede envio por padrão)
    document.addEventListener('DOMContentLoaded', function () {
        const form = document.querySelector('.login-usuario');
        if (form) {
            form.addEventListener('submit', function (event) {
                event.preventDefault();
            });
        }
    });
  
    // Botão "casinha" da recuperação
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
  
    // Botão "casinha" do registro
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
  }
  