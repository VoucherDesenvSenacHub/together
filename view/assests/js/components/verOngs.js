const track = document.querySelector('.carousel-track');
const items = Array.from(track.children);
const prevButton = document.querySelector('.carousel-btn.prev');
const nextButton = document.querySelector('.carousel-btn.next');
      
// Tamanho de cada slide
const itemWidth = items[0].getBoundingClientRect().width;
      
// Número de slides visíveis 
const visibleSlides = Math.floor(track.parentElement.offsetWidth / itemWidth);
      
// Índice atual do slide
let currentIndex = 0;
      
function moveToSlide(index) {
    track.style.transform = `translateX(-${index * itemWidth}px)`;
}
      
nextButton.addEventListener('click', () => {
    if (currentIndex < items.length - visibleSlides) {
        currentIndex++;
    } else {
        currentIndex = 0; // Reinicia no início (loop infinito opcional)
    }
    moveToSlide(currentIndex);
});
      
prevButton.addEventListener('click', () => {
    if (currentIndex > 0) {
        currentIndex--;
    } else {
        currentIndex = items.length - visibleSlides; // Vai para o último slide visível
    }
    moveToSlide(currentIndex);
    });
      
    // Ajuste no redimensionamento da janela (responsivo)
    window.addEventListener('resize', () => {
    moveToSlide(currentIndex);
});