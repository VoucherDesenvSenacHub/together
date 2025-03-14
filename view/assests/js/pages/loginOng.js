const boxLogin = document.querySelector('.box-login');
const containerRegistro = document.querySelector('.container-registro-ong');
const wrapperLostPASS = document.querySelector('.wrapper-lost-pass');
const createAccountLink = document.getElementById('create-account');
const lostPassLink = document.getElementById('lost-pass');
const houseIcon = document.getElementById('house-icon');
const houseIconRegistro = document.getElementById('house-icon-registro');
const homeIconLostPASS = document.getElementById('home-icon-lost-pass');

createAccountLink.addEventListener('click', function (event) {
    event.preventDefault();
    boxLogin.style.display = 'none';
    containerRegistro.style.display = 'flex';
    wrapperLostPASS.style.display = 'none';
});

lostPassLink.addEventListener('click', function (event) {
    event.preventDefault();
    boxLogin.style.display = 'none';
    wrapperLostPASS.style.display = 'flex';
});

houseIcon.addEventListener('click', function (event) {
    event.preventDefault();
    boxLogin.style.display = 'flex';
    containerRegistro.style.display = 'none';
    wrapperLostPASS.style.display = 'none';
});

if (houseIconRegistro) {
    houseIconRegistro.addEventListener('click', function (event) {
        event.preventDefault();
        boxLogin.style.display = 'flex';
        containerRegistro.style.display = 'none';
    });
}

homeIconLostPASS.addEventListener('click', function (event) {
    event.preventDefault();
    boxLogin.style.display = 'flex';
    wrapperLostPASS.style.display = 'none';
});