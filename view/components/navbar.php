<link rel="stylesheet" href="../assests/css/style.css">
<script src="../assests/js/components/navbar.js"></script>
<header>
    <nav class="navbar-group">
        <a class="a-navbar" href=""><img class="logoimg-navbar" src="../assests/images/components/Together.png" alt="logo"></a>
        <ul class="ul-navbar">
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
        <!-- Area Do Boato de Pesquisa -->
        <div class="search-button-area-navbar">
            <button id="searchBarButton" class="barra-pesquisa-button-navbar">
                <i class="fa fa-search" id="lente-button-icon"></i>
            </button>
        </div>
        <!-- Area De Pesquisa Da Barra -->
        <div id="searchBar" class="search-bar-area hidden">
            <input class="barra-pesquisa" type="text">
            <button class="submit-lente">
                <i class="fa fa-search" id="lente-icon"></i>
            </button>
        </div>
        <button id="imageArea" class="image-area"></button>

        <div id="filtrarArea" class="filtrar-area hidden">
            <ol id="filtrarList" class="filtrar-list hidden">
                <li class="filtrar-list-line">
                    <input id="listCheckbox" type="checkbox">
                    <p class="p-filtrarArea">Erradicação da Pobreza</p>
                </li>

                <li class="filtrar-list-line">
                    <input id="listCheckbox" type="checkbox">
                    <p class="p-filtrarArea">Erradicação da Pobreza</p>
                </li>

                <li class="filtrar-list-line">
                    <input id="listCheckbox" type="checkbox">
                    <p class="p-filtrarArea">Erradicação da Pobreza</p>
                </li>

                <li class="filtrar-list-line">
                    <input id="listCheckbox" type="checkbox">
                    <p class="p-filtrarArea">Erradicação da Pobreza</p>
                </li>

                <li class="filtrar-list-line">
                    <input id="listCheckbox" type="checkbox">
                    <p class="p-filtrarArea">Erradicação da Pobreza</p>
                </li>

                <li class="filtrar-list-line">
                    <input id="listCheckbox" type="checkbox">
                    <p class="p-filtrarArea">Erradicação da Pobreza</p>
                </li>

                <li class="filtrar-list-line">
                    <input id="listCheckbox" type="checkbox">
                    <p class="p-filtrarArea">Erradicação da Pobreza</p>
                </li>

                <li class="filtrar-list-line">
                    <input id="listCheckbox" type="checkbox">
                    <p class="p-filtrarArea">Erradicação da Pobreza</p>
                </li>

                <li class="filtrar-list-line">
                    <input id="listCheckbox" type="checkbox">
                    <p class="p-filtrarArea">Erradicação da Pobreza</p>
                </li>

                <li class="filtrar-list-line">
                    <input id="listCheckbox" type="checkbox">
                    <p class="p-filtrarArea">Erradicação da Pobreza</p>
                </li>

                <li class="filtrar-list-line">
                    <input id="listCheckbox" type="checkbox">
                    <p class="p-filtrarArea">Erradicação da Pobreza</p>
                </li>

                <li class="filtrar-list-line">
                    <input id="listCheckbox" type="checkbox">
                    <p class="p-filtrarArea">Erradicação da Pobreza</p>
                </li>

                <li class="filtrar-list-line">
                    <input id="listCheckbox" type="checkbox">
                    <p class="p-filtrarArea">Erradicação da Pobreza</p>
                </li>

                <li class="filtrar-list-line">
                    <input id="listCheckbox" type="checkbox">
                    <p class="p-filtrarArea">Erradicação da Pobreza</p>
                </li>

                <li class="filtrar-list-line">
                    <input id="listCheckbox" type="checkbox">
                    <p class="p-filtrarArea">Erradicação da Pobreza</p>
                </li>

                <li class="filtrar-list-line">
                    <input id="listCheckbox" type="checkbox">
                    <p class="p-filtrarArea">Erradicação da Pobreza</p>
                </li>

                <li class="filtrar-list-line">
                    <input id="listCheckbox" type="checkbox">
                    <p class="p-filtrarArea">Erradicação da Pobreza</p>
                </li>

                <li class="filtrar-list-line">
                    <input id="listCheckbox" type="checkbox">
                    <p class="p-filtrarArea">Erradicação da Pobreza</p>
                </li>

            </ol>
        </div>
        <div id="lateralBar" class="lateral-bar hidden">
            <div class="lateral-bar-top">
                <h3 class="h3-lateral-bar">Nome de Usuario</h3>
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
                <a class="a-navbar" href="#" id="favoritosButton">Favoritos</a>
                <a class="a-navbar" href="#" id="historicoButton">Historico de doações</a>
                <a class="a-navbar" href="#" id="configButton">Gerenciar conta</a>
                <a class="a-navbar" href="#" id="logoutButton">Sair</a>
            </div>
        </div>

        <button id="mobileButton" class="mobile-button"><i class="fa-solid fa-bars" id="bars-icon"></i></button>
        <div id="circleChoice" class="circle-choice hidden">
            <button id="barsCircleButton">
                <i class="fa-solid fa-bars" id="bars-icon"></i>
            </button>
            <a class="a-navbar" href="#" id="homeButton">Home</a>
            <a class="a-navbar" href="#" id="filtrarButton">Filtrar</a>
            <a class="a-navbar" href="#" id="feedButton">Feed</a>
            <a class="a-navbar" href="#" id="sobreNosButton">Sobre Nós</a>
        </div>
    </nav>
</header>