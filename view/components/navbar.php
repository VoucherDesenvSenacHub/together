<?php require_once "button.php" ?>

<header>
    <nav class="navbar-group">
        <div class="logo-area">
            <a class="a-navbar" href="/together/index.php"><img class="logo-navbar" src="/together/view/assets/images/components/logo_nova_together.png" alt="logo"></a>
        </div>
        <ul class="ul-navbar">
            <li class="li-navbar">
                <a class="a-navbar" href="/together/index.php">Inicio</a>
            </li>

            <li class="li-navbar">
                <a class="a-navbar" href="/together/view/pages/pesquisarOng.php">Descobrir</a>
            </li>

            <li class="li-navbar">
                <a class="a-navbar" href="/together/index.php#sobre-nos">Sobre Nós</a>
            </li>

            <li class="li-navbar">
                <a class="a-navbar" href="/together/index.php#footer">Contate-nos</a>
            </li>

            <li class="li-navbar">
                <a class="a-navbar" href="/together/view/pages/copyright.php">Desenvolvedores</a>
            </li>

        </ul>

        <div class="login-botao-area-navbar">
            <form action="">
                <?php if (isset($_SESSION['perfil'])) {
                    echo '<div class="button-side-mobile-div">
                        <button class="button-side-mobile" id="buttonSideMobile">
                            <i class="fa-solid fa-bars" id="barsIcon"></i>
                        </button>
                        </div>
                        <a title="Sair" href="/together/controller/SairController.php" class="sair-button-desktop">
                            <i class="fa-solid fa-right-from-bracket icone-sair" title="Sair" id="btn-circular"></i>
                        </a>
                        ';
                } else {
                    echo botao('entrar', 'Entrar', '', '/together/view/pages/login.php');
                }
                ?>
            </form>
        </div>


</header>