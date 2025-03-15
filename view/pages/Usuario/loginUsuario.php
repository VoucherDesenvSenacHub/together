<?php require_once "../../../view/components/head.php"?>

<body class="body-login-usuario">

    <div class="container-login-usuario">

        <div class="conteudo-login-usuario show" id="loginContent">

            <div class="logo-login-usuario">
                <img src="../../assests/images/components/Together.png" alt="logo" class="logo-imagem-login-usuario">
            </div>

            <div class="box-login-usuario">

                <form class="login-usuario">
                    <button id="house-button-login-usuario">
                        <i class="fa-solid fa-house fa-xl" id="house-icon-login-usuario"></i>
                    </button>
                    
                    <img src="../../assests/images/Usuario/usuario-user-foto.png" alt="foto-user" class="foto-perfil-login-usuario">
                
                    <input type="text" placeholder="Digite seu Login" class="text-input-login-usuario" id="login-input">
                    <input type="password" placeholder="Digite sua Senha" class="text-input-login-usuario" id="senha-input">

                    <a href="#">
                        <p id="esqueci-senha-button" class="esqueci-senha-login-usuario">Esqueci a senha</p>
                    </a>

                    <div class="criar-conta-area-login-usuario">
                        <p class="pergunta-login-usuario">Nao possui uma conta?</p>
                        <button class="criar-conta-login-usuario" id="criar-conta-button">Crie uma agora</button>
                    </div>

                    <button class="botao-login-usuario">Login</button>
                </form><!--login-->
            </div><!--box-->
        </div><!--login-content-->

        <div class="recuperar-conta-login-usuario hidden" id="recuperarContent">
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
                <img src="assets/Together.png" alt="logo">
            </div>
        </div>

        <div class="registrar-conta-login-usuario hidden" id="registrarContent">
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
                <img src="assets/Together.png" alt="logo">
            </div>
        </div>

    </div><!--container-->

</body>

<?php require_once "../../../view/components/footer.php"?>

</html>