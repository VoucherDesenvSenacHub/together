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

<body>

    <header>
        <nav>
            <a href="" class="logo"><img class="logoimg" src="assets/Together.png" alt="logo"></a>
            <ul>
                <li>
                    <a href="#">Home</a>
                </li>

                <li>
                    <a id="filtrarTopButton" href="#">Filtrar</a>
                </li>

                <li>
                    <a href="#">Feed</a>
                </li>

                <li>
                    <a href="#">Sobre Nós</a>
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
                <p>Erradicação da Pobreza</p>
            </li>

            <li class="filtrar-list-line">
                <input id="listCheckbox" type="checkbox">
                <p>Erradicação da Pobreza</p>
            </li>

            <li class="filtrar-list-line">
                <input id="listCheckbox" type="checkbox">
                <p>Erradicação da Pobreza</p>
            </li>

            <li class="filtrar-list-line">
                <input id="listCheckbox" type="checkbox">
                <p>Erradicação da Pobreza</p>
            </li>

            <li class="filtrar-list-line">
                <input id="listCheckbox" type="checkbox">
                <p>Erradicação da Pobreza</p>
            </li>

            <li class="filtrar-list-line">
                <input id="listCheckbox" type="checkbox">
                <p>Erradicação da Pobreza</p>
            </li>

            <li class="filtrar-list-line">
                <input id="listCheckbox" type="checkbox">
                <p>Erradicação da Pobreza</p>
            </li>

            <li class="filtrar-list-line">
                <input id="listCheckbox" type="checkbox">
                <p>Erradicação da Pobreza</p>
            </li>

            <li class="filtrar-list-line">
                <input id="listCheckbox" type="checkbox">
                <p>Erradicação da Pobreza</p>
            </li>

            <li class="filtrar-list-line">
                <input id="listCheckbox" type="checkbox">
                <p>Erradicação da Pobreza</p>
            </li>

            <li class="filtrar-list-line">
                <input id="listCheckbox" type="checkbox">
                <p>Erradicação da Pobreza</p>
            </li>

            <li class="filtrar-list-line">
                <input id="listCheckbox" type="checkbox">
                <p>Erradicação da Pobreza</p>
            </li>

            <li class="filtrar-list-line">
                <input id="listCheckbox" type="checkbox">
                <p>Erradicação da Pobreza</p>
            </li>

            <li class="filtrar-list-line">
                <input id="listCheckbox" type="checkbox">
                <p>Erradicação da Pobreza</p>
            </li>

            <li class="filtrar-list-line">
                <input id="listCheckbox" type="checkbox">
                <p>Erradicação da Pobreza</p>
            </li>

            <li class="filtrar-list-line">
                <input id="listCheckbox" type="checkbox">
                <p>Erradicação da Pobreza</p>
            </li>

            <li class="filtrar-list-line">
                <input id="listCheckbox" type="checkbox">
                <p>Erradicação da Pobreza</p>
            </li>

            <li class="filtrar-list-line">
                <input id="listCheckbox" type="checkbox">
                <p>Erradicação da Pobreza</p>
            </li>

        </ol>
    </div>
    <div id="lateralBar" class="lateral-bar hidden">
        <div class="lateral-bar-top">
            <h3>Nome de Usuario</h3>
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

    <script>
        document.getElementById('searchBarButton').addEventListener('click', function (event) {
            event.preventDefault(); // Previne o comportamento padrão do botão
            const searchBar = document.getElementById('searchBar');
            searchBar.classList.remove('hidden');
            searchBar.classList.add('show');
        });

        document.getElementById('imageArea').addEventListener('click', function (event) {
            event.preventDefault(); // Previne o comportamento padrão do botão
            const lateralBar = document.getElementById('lateralBar');
            lateralBar.classList.remove('hidden');
            lateralBar.classList.add('show');
        });

        document.getElementById('imageLateralBar').addEventListener('click', function (event) {
            event.preventDefault(); // Previne o comportamento padrão do botão
            const lateralBar = document.getElementById('lateralBar');
            lateralBar.classList.add('hidden');
            lateralBar.classList.remove('show');
        });

        document.getElementById('mobileButton').addEventListener('click', function (event) {
            event.preventDefault(); // Previne o comportamento padrão do botão
            const circleChoice = document.getElementById('circleChoice');
            circleChoice.classList.remove('hidden');
        });

        document.getElementById('barsCircleButton').addEventListener('click', function (event) {
            event.preventDefault(); // Previne o comportamento padrão do botão
            const circleChoice = document.getElementById('circleChoice');
            circleChoice.classList.add('hidden');
        });

        document.getElementById('filtrarTopButton').addEventListener('click', function (event) {
            event.preventDefault(); // Previne o comportamento padrão do botão
            const filtrarArea = document.getElementById('filtrarArea');
            const filtrarList = document.getElementById('filtrarList');

            if (filtrarArea.classList.contains('hidden')) {
                filtrarArea.classList.remove('hidden');
                filtrarList.classList.remove('hidden');
                filtrarArea.classList.add('show');
                filtrarList.classList.add('show');
            } else {
                filtrarArea.classList.add('hidden');
                filtrarList.classList.add('hidden');
                filtrarArea.classList.remove('show');
                filtrarList.classList.remove('show');
            }
        });

        document.getElementById('filtrarButton').addEventListener('click', function (event) {
            event.preventDefault(); // Previne o comportamento padrão do botão
            const filtrarArea = document.getElementById('filtrarArea');
            const filtrarList = document.getElementById('filtrarList');
            const circleChoice = document.getElementById('circleChoice');

            filtrarArea.classList.remove('hidden');
            filtrarList.classList.remove('hidden');
            filtrarArea.classList.add('show');
            filtrarList.classList.add('show');
            circleChoice.classList.add('hidden'); // Adiciona a classe 'hidden' ao circleChoice
        });

        // Adiciona o evento de clique no documento para esconder a área de filtro e a barra de pesquisa ao clicar fora delas
        document.addEventListener('click', function (event) {
            const filtrarArea = document.getElementById('filtrarArea');
            const filtrarList = document.getElementById('filtrarList');
            const filtrarButton = document.getElementById('filtrarButton');
            const filtrarTopButton = document.getElementById('filtrarTopButton');
            const searchBar = document.getElementById('searchBar');
            const searchBarButton = document.getElementById('searchBarButton');

            if (!filtrarArea.contains(event.target) && !filtrarButton.contains(event.target) && !filtrarTopButton.contains(event.target)) {
                filtrarArea.classList.add('hidden');
                filtrarList.classList.add('hidden');
                filtrarArea.classList.remove('show');
                filtrarList.classList.remove('show');
            }

            if (!searchBar.contains(event.target) && !searchBarButton.contains(event.target)) {
                searchBar.classList.add('hidden');
                searchBar.classList.remove('show');
            }
        });
    </script>

</body>

</html>