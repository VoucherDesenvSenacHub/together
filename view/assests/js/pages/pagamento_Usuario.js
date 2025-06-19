const toggle = document.getElementById('pagamento_anonimo');
const mainContainer = document.querySelector('.main-container');
const footer = document.querySelector('footer');

if (toggle && mainContainer && footer) {
  toggle.addEventListener('change', function () {
    if (this.checked) {
      mainContainer.classList.add('modo-anonimo');
      footer.classList.add('modo-anonimo');
    } else {
      mainContainer.classList.remove('modo-anonimo');
      footer.classList.remove('modo-anonimo'); 
    }
  });
} 