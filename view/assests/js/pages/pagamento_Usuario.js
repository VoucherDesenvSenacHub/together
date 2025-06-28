const toggle = document.getElementById('pagamento_anonimo');
const mainContainer = document.querySelector('.main-container');
const body = document.querySelector('.user_pay');

if (toggle && mainContainer && body) {
  toggle.addEventListener('change', function () {
    if (this.checked) {
      mainContainer.classList.add('modo-anonimo');
      body.classList.add('modo-anonimo');
    } else {
      mainContainer.classList.remove('modo-anonimo');
      body.classList.remove('modo-anonimo'); 
    }
  });
} 