document.getElementById('searchBarButton').addEventListener('click', function (event) {
    event.preventDefault(); // Previne o comportamento padrão do botão
    const searchBar = document.getElementById('searchBar');
    searchBar.classList.remove('hidden');
    searchBar.classList.add('show');
    searchBar.style.animationName = 'search-slide-animation';
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
        searchBar.style.animationName = 'search-slide-close-animation';
        setTimeout(() => {
            searchBar.classList.add('hidden');
            searchBar.classList.remove('show');
        }, 300); // Delay para esperar a animação terminar
    }
});