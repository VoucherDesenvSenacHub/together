function addClickEvent(id, callback) {
    const element = document.getElementById(id);
    if (element) {
        element.addEventListener('click', function (event) {
            event.preventDefault();
            callback();
        });
    }
}

addClickEvent('buttonSideMobile', function(event) {
    const sideContainerMobileArea = document.getElementById ('sideContainerMobileArea');
    const buttonSideMobile = document.getElementById ('buttonSideMobile')

    if(sideContainerMobileArea.classList.contains('hidden')){
        sideContainerMobileArea.classList.remove('hidden')
        sideContainerMobileArea.classList.add('show')
        buttonSideMobile.classList.add('hidden')
    }
    
    if(!sideContainerMobileArea.contains(event.target)) {
        buttonSideMobile.classList.remove('hidden')
        sideContainerMobileArea.classList.remove('show')
        sideContainerMobileArea.classList.add('hidden')
    }
}) 