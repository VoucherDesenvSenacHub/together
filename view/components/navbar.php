<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Navbar</title>
    <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">

    <!-- Fonte Roboto -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap"
        rel="stylesheet">
    <!-- ------------ -->
    <script src="https://kit.fontawesome.com/db29c2ca45.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="style.css">
</head>

<body class="body-navbar">

    <header>
        <nav class="nav-navbar">
            <a href="" class="logo-navbar"><img class="logoimg-navbar" src="assets/Together.png" alt="logo"></a>
            <ul class="lista-opcoes-navbar">
                <li>
                    <a class="a-navbar" href="#">Home</a>
                </li>

                <li>
                    <a class="a-navbar" id="filtrarTopButton" href="#">Filtrar</a>
                </li>

                <li>
                    <a class="a-navbar" href="#">Feed</a>
                </li>

                <li>
                    <a class="a-navbar" href="#">Sobre Nós</a>
                </li>
            </ul>
            <div class="search-button-area">
                <button id="searchBarButton" class="barra-pesquisa-button">
                    <i class="fa fa-search" id="lente-button-icon"></i>
                </button>
            </div>
            <div id="searchBar" class="search-bar-area hidden">
                <input class="search-bar" type="text">
                <button class="submit-lente">
                    <i class="fa fa-search" id="lente-icon"></i>
                </button>
            </div>
            <button id="imageArea" class="image-area"></button>

        </nav>
    </header>
    <div id="filtrarArea" class="filtrar-area hidden">
        <ol id="filtrarList" class="filtrar-list hidden">
            <li class="filtrar-list-line">
                <input id="listCheckbox" type="checkbox">
                <p class="p-navbar">Erradicação da Pobreza</p>
            </li>

            <li class="filtrar-list-line">
                <input id="listCheckbox" type="checkbox">
                <p class="p-navbar">Erradicação da Pobreza</p>
            </li>

            <li class="filtrar-list-line">
                <input id="listCheckbox" type="checkbox">
                <p class="p-navbar">Erradicação da Pobreza</p>
            </li>

            <li class="filtrar-list-line">
                <input id="listCheckbox" type="checkbox">
                <p class="p-navbar">Erradicação da Pobreza</p>
            </li>

            <li class="filtrar-list-line">
                <input id="listCheckbox" type="checkbox">
                <p class="p-navbar">Erradicação da Pobreza</p>
            </li>

            <li class="filtrar-list-line">
                <input id="listCheckbox" type="checkbox">
                <p class="p-navbar">Erradicação da Pobreza</p>
            </li>

            <li class="filtrar-list-line">
                <input id="listCheckbox" type="checkbox">
                <p class="p-navbar">Erradicação da Pobreza</p>
            </li>

            <li class="filtrar-list-line">
                <input id="listCheckbox" type="checkbox">
                <p class="p-navbar">Erradicação da Pobreza</p>
            </li>

            <li class="filtrar-list-line">
                <input id="listCheckbox" type="checkbox">
                <p class="p-navbar">Erradicação da Pobreza</p>
            </li>

            <li class="filtrar-list-line">
                <input id="listCheckbox" type="checkbox">
                <p class="p-navbar">Erradicação da Pobreza</p>
            </li>

            <li class="filtrar-list-line">
                <input id="listCheckbox" type="checkbox">
                <p class="p-navbar">Erradicação da Pobreza</p>
            </li>

            <li class="filtrar-list-line">
                <input id="listCheckbox" type="checkbox">
                <p class="p-navbar">Erradicação da Pobreza</p>
            </li>

            <li class="filtrar-list-line">
                <input id="listCheckbox" type="checkbox">
                <p class="p-navbar">Erradicação da Pobreza</p>
            </li>

            <li class="filtrar-list-line">
                <input id="listCheckbox" type="checkbox">
                <p class="p-navbar">Erradicação da Pobreza</p>
            </li>

            <li class="filtrar-list-line">
                <input id="listCheckbox" type="checkbox">
                <p class="p-navbar">Erradicação da Pobreza</p>
            </li>

            <li class="filtrar-list-line">
                <input id="listCheckbox" type="checkbox">
                <p class="p-navbar">Erradicação da Pobreza</p>
            </li>

            <li class="filtrar-list-line">
                <input id="listCheckbox" type="checkbox">
                <p class="p-navbar">Erradicação da Pobreza</p>
            </li>

            <li class="filtrar-list-line">
                <input id="listCheckbox" type="checkbox">
                <p class="p-navbar">Erradicação da Pobreza</p>
            </li>

        </ol>
    </div>
    <div id="lateralBar" class="lateral-bar hidden">
        <div class="lateral-bar-top">
            <h3 class="h3-navbar">Nome de Usuario</h3>
            <button id="imageLateralBar" class="image-lateral-bar"></button>
        </div>

        <div class="search-bar-mobile-area hidden">
            <input type="text" class="searchMobileBar">
            <i class="fa fa-search" id="mobile-lente-icon"></i>
        </div>

        <div class="lateral-bar-content">
            <i class="fa-solid fa-heart" id="favoritosIcon"></i>
            <i class="fa-solid fa-clock" id="historicoIcon"></i>
            <i class="fa-solid fa-gear" id="configIcon"></i>
            <i class="fa-solid fa-arrow-right-from-bracket" id="logoutIcon"></i>
            <a href="#" id="favoritosButton">Favoritos</a>
            <a href="#" id="historicoButton">Historico de doações</a>
            <a href="#" id="configButton">Gerenciar conta</a>
            <a href="#" id="logoutButton">Sair</a>
        </div>
    </div>

    <button id="mobileButton" class="mobile-button"><i class="fa-solid fa-bars" id="bars-icon"></i></button>
    <div id="circleChoice" class="circle-choice hidden">
        <button id="barsCircleButton">
            <i class="fa-solid fa-bars" id="bars-icon"></i>
        </button>
        <a href="#" id="homeButton">Home</a>
        <a href="#" id="filtrarButton">Filtrar</a>
        <a href="#" id="feedButton">Feed</a>
        <a href="#" id="sobreNosButton">Sobre Nós</a>
    </div>

    <script src="/together/view/assets/js/components/navbar.php"></script>
</body>

</html>