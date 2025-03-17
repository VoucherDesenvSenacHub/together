<?php require_once "../../../view/components/head.php"?>

<body class="body-login-usuario">

    <div class="container-login-usuario">

        <div class="conteudo-login-usuario show" id="loginConteudoUsuario">

            <div class="logo-login-usuario">
                <img src="../../assests/images/components/Together.png" alt="logo" class="logo-imagem-login-usuario">
            </div>

            <div class="box-login-usuario">

                <form class="login-usuario">
                    <button id="house-button-login-usuario">
                        <i class="fa-solid fa-house fa-xl" id="house-icon-login-usuario"></i>
                    </button>
                    
                    <img src="../../assests/images/Usuario/user-sem-login.png" alt="foto-user" class="foto-perfil-login-usuario">
                
                    <input type="text" placeholder="Digite seu Login" class="text-input-login-usuario" id="login-input">
                    <input type="password" placeholder="Digite sua Senha" class="text-input-login-usuario" id="senha-input">

                    <a href="#">
                        <p id="esqueci-senha-button" class="esqueci-senha-login-usuario">Esqueci a senha</p>
                    </a>

                    <div class="criar-conta-area-login-usuario">
                        <p class="pergunta-login-usuario">Nao possui uma conta?</p>
                        <button class="criar-conta-login-usuario" id="criar-conta-usuario-button">Crie uma agora</button>
                    </div>

                    <button class="botao-login-usuario" id="botao-login-usuario">Login</button>
                </form><!--login-->
            </div><!--box-->
        </div><!--login-content-->


        <div class="recuperar-conta-login-usuario hidden" id="recuperarConteudoUsuario">
            <div class="box-login-usuario">

                <form class="login-usuario">
                    <button id="house-button-recuperar-usuario"><i class="fa-solid fa-house fa-xl" id="house-icon-recuperar-usuario"></i></button>
                    <h1 class="titulo-login-usuario">Recuperar Senha</h1>
                    <p class="sub-titulo-login-usuario">Enviaremos um E-mail para você confirmar sua nova senha</p>
                    <input type="text" placeholder="Email" class="text-input-login-usuario" id="email-esqueci-senha-input">
                    <button class="botao-login-usuario">Enviar</button>
                </form>

            </div>
            <div class="logo-login-usuario">
                <img src="/together/view/assests/images/components/Together.png" alt="logo">
            </div>
        </div>



        <div class="registrar-conta-login-usuario hidden" id="registrarConteudoUsuario">
            <div class="box-login-usuario">
                <form class="registrar-box-login-usuario">
                    <button id="house-button-registrar-usuario"><i class="fa-solid fa-house fa-xl" id="house-icon-registrar-usuario"></i></button>
                    <input type="text" placeholder="Digite seu Nome" class="register-input-login-usuario" id="nome-input">
                    <input type="text" placeholder="Digite seu CPF" class="register-input-login-usuario" id="cpf-input">
                    <input type="text" placeholder="Digite seu Telefone" class="register-input-login-usuario" id="telefone-input">
                    <input type="email" placeholder="Digite seu Email" class="register-input-login-usuario" id="email-input">
                    <input type="password" placeholder="Digite sua Senha" class="register-input-login-usuario" id="senha-registrar-input">
                    <input type="password" placeholder="Confirme a Senha" class="register-input-login-usuario" id="confirme-senha-input">
                    <div class="termos-area-login-usuario">
                        <input type="checkbox" id="checkbox">
                        <p class="concordo-login-usuario">Li e concordo com os</p>
                        <a href="" class="termos-login-usuario">Termos e Condições</a>
                    </div>
                    <button class="botao-registrar-login-usuario">Enviar</button>
                </form>
            </div>
            <div class="logo-login-usuario">
                <img src="/together/view/assests/images/components/Together.png" alt="logo">
            </div>
        </div>

    </div><!--container-->

</body>

<script>
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
</script>

<?php require_once "../../../view/components/footer.php"?>

</html>