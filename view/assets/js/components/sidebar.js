function addClickEvent(id, callback) {
    const element = document.getElementById(id);
    if (!element) return; // <--- impede erro

    element.addEventListener('click', function (event) {
        event.preventDefault();
        callback(event);
    });
}
addClickEvent('buttonSideMobile', function () {
    const side = document.getElementById('sideContainerMobileArea');
    if (!side) return; // evita erro se o menu não existir na página

    // alterna entre aberto/fechado
    side.classList.toggle('hidden');
    side.classList.toggle('show');
});




