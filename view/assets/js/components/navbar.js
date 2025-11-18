function addClickEvent(id, callback) {
    const element = document.getElementById(id);
    if (element) {
        element.addEventListener('click', function (event) {
            event.preventDefault();
            callback();
        });
    }
}


addClickEvent('searchBarButton', function () {
    const searchBar = document.getElementById('searchBar');
    if (searchBar) {
        searchBar.classList.remove('hidden');
        searchBar.classList.add('show-nav');
    }
});


addClickEvent('imageArea', function () {
    const lateralBar = document.getElementById('lateralBar');
    if (lateralBar) {
        lateralBar.classList.remove('hidden');
        lateralBar.classList.add('show-nav');
    }
});


addClickEvent('imageLateralBar', function () {
    const lateralBar = document.getElementById('lateralBar');
    if (lateralBar) {
        lateralBar.classList.add('hidden');
        lateralBar.classList.remove('show-nav');
    }
});


addClickEvent('mobileButton', function () {
    const circleChoice = document.getElementById('circleChoice');
    if (circleChoice) {
        circleChoice.classList.remove('hidden');
    }
});


addClickEvent('barsCircleButton', function () {
    const circleChoice = document.getElementById('circleChoice');
    if (circleChoice) {
        circleChoice.classList.add('hidden');
    }
});


addClickEvent('filtrarTopButton', function () {
    const filtrarArea = document.getElementById('filtrarArea');
    const filtrarList = document.getElementById('filtrarList');

    if (filtrarArea && filtrarList) {
        if (filtrarArea.classList.contains('hidden')) {
            filtrarArea.classList.remove('hidden');
            filtrarList.classList.remove('hidden');
            filtrarArea.classList.add('show-nav');
            filtrarList.classList.add('show-nav');
        } else {
            filtrarArea.classList.add('hidden');
            filtrarList.classList.add('hidden');
            filtrarArea.classList.remove('show-nav');
            filtrarList.classList.remove('show-nav');
        }
    }
});


addClickEvent('filtrarButton', function () {
    const filtrarArea = document.getElementById('filtrarArea');
    const filtrarList = document.getElementById('filtrarList');
    const circleChoice = document.getElementById('circleChoice');

    if (filtrarArea && filtrarList) {
        filtrarArea.classList.remove('hidden');
        filtrarList.classList.remove('hidden');
        filtrarArea.classList.add('show-nav');
        filtrarList.classList.add('show-nav');
    }
    if (circleChoice) {
        circleChoice.classList.add('hidden');
    }
});


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
            filtrarArea.classList.remove('show-nav');
            filtrarList.classList.remove('show-nav');
        }
    }

    if (searchBar && searchBarButton) {
        if (!searchBar.contains(event.target) && !searchBarButton.contains(event.target)) {
            searchBar.classList.add('hidden');
            searchBar.classList.remove('show-nav');
        }
    }
});


