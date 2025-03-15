function addClickEvent(id, callback) {
    const element = document.getElementById(id);
    if (element) {
        element.addEventListener('click', function (event) {
            event.preventDefault();
            callback();
        });
    }
}

// Mostrar a barra de pesquisa
addClickEvent('searchBarButton', function () {
    const searchBar = document.getElementById('searchBar');
    if (searchBar) {
        searchBar.classList.remove('hidden');
        searchBar.classList.add('show');
    }
});

// Mostrar a barra lateral
addClickEvent('imageArea', function () {
    const lateralBar = document.getElementById('lateralBar');
    if (lateralBar) {
        lateralBar.classList.remove('hidden');
        lateralBar.classList.add('show');
    }
});

// Ocultar a barra lateral
addClickEvent('imageLateralBar', function () {
    const lateralBar = document.getElementById('lateralBar');
    if (lateralBar) {
        lateralBar.classList.add('hidden');
        lateralBar.classList.remove('show');
    }
});

// Mostrar o círculo de opções
addClickEvent('mobileButton', function () {
    const circleChoice = document.getElementById('circleChoice');
    if (circleChoice) {
        circleChoice.classList.remove('hidden');
    }
});

// Esconder o círculo de opções
addClickEvent('barsCircleButton', function () {
    const circleChoice = document.getElementById('circleChoice');
    if (circleChoice) {
        circleChoice.classList.add('hidden');
    }
});

// Alternar a área de filtro
addClickEvent('filtrarTopButton', function () {
    const filtrarArea = document.getElementById('filtrarArea');
    const filtrarList = document.getElementById('filtrarList');

    if (filtrarArea && filtrarList) {
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
    }
});

// Mostrar a área de filtro e esconder o círculo de opções
addClickEvent('filtrarButton', function () {
    const filtrarArea = document.getElementById('filtrarArea');
    const filtrarList = document.getElementById('filtrarList');
    const circleChoice = document.getElementById('circleChoice');

    if (filtrarArea && filtrarList) {
        filtrarArea.classList.remove('hidden');
        filtrarList.classList.remove('hidden');
        filtrarArea.classList.add('show');
        filtrarList.classList.add('show');
    }
    if (circleChoice) {
        circleChoice.classList.add('hidden');
    }
});

// Esconder elementos ao clicar fora deles
document.addEventListener('click', function (event) {
    const filtrarArea = document.getElementById('filtrarArea');
    const filtrarList = document.getElementById('filtrarList');
    const filtrarButton = document.getElementById('filtrarButton');
    const filtrarTopButton = document.getElementById('filtrarTopButton');
    const searchBar = document.getElementById('searchBar');
    const searchBarButton = document.getElementById('searchBarButton');

    if (filtrarArea && filtrarList && filtrarButton && filtrarTopButton) {
        if (!filtrarArea.contains(event.target) && 
            !filtrarButton.contains(event.target) && 
            !filtrarTopButton.contains(event.target)) {
            filtrarArea.classList.add('hidden');
            filtrarList.classList.add('hidden');
            filtrarArea.classList.remove('show');
            filtrarList.classList.remove('show');
        }
    }

    if (searchBar && searchBarButton) {
        if (!searchBar.contains(event.target) && !searchBarButton.contains(event.target)) {
            searchBar.classList.add('hidden');
            searchBar.classList.remove('show');
        }
    }
});


document.addEventListener("DOMContentLoaded", function () {
    const imageAreaButton = document.getElementById('imageArea');

    if (imageAreaButton) {
        imageAreaButton.addEventListener('click', function () {
            const nextPageUrl = "./view/pages/usuario/loginUsuario.php";

            if (nextPageUrl) {
                window.location.href = nextPageUrl;
            }
        });
    }
});

