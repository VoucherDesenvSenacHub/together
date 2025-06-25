function addClickEvent(id, callback) {
    const element = document.getElementById(id);
    if (element) {
        element.addEventListener('click', function (event) {
            event.preventDefault();
            callback();
        });
    }
}

addClickEvent('buttonSideMobile', function (event) {
    const buttonSideMobile = document.getElementById('buttonSideMobile');
    const sideContainerMobileArea = document.getElementById('sideContainerMobileArea');

    // Abrir menu
    buttonSideMobile.addEventListener('click', function () {
        sideContainerMobileArea.classList.remove('hidden');
        sideContainerMobileArea.classList.add('show');
        buttonSideMobile.classList.add('hidden');
    });

    // Fechar menu ao clicar fora
    document.addEventListener('click', function (event) {
        const isClickInside = sideContainerMobileArea.contains(event.target);
        const isClickOnButton = buttonSideMobile.contains(event.target);

        if (!isClickInside && !isClickOnButton && sideContainerMobileArea.classList.contains('show')) {
            sideContainerMobileArea.classList.remove('show');
            sideContainerMobileArea.classList.add('hidden');
            buttonSideMobile.classList.remove('hidden');
        };
    });
})