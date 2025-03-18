document.addEventListener('DOMContentLoaded', () => {
    const track = document.querySelector('.carousel-track');
    const prevButton = document.querySelector('.carousel-btn.prev');
    const nextButton = document.querySelector('.carousel-btn.next');

    // Validação se os elementos essenciais existem no DOM
    if (!track) {
        return; // Interrompe o script se o elemento não for encontrado
    }
    if (!prevButton) {
        return; // Interrompe o script se o elemento não for encontrado
    }
    if (!nextButton) {
        return; // Interrompe o script se o elemento não for encontrado
    }

    const items = Array.from(track.children);

    // Verifica se há itens dentro do carousel
    if (items.length === 0) {
        return; // Interrompe o script se não houver itens
    }

    // Tamanho de cada slide
    const itemWidth = items[0].getBoundingClientRect().width;

    // Número de slides visíveis
    const visibleSlides = Math.floor(track.parentElement.offsetWidth / itemWidth);

    // Índice atual do slide
    let currentIndex = 0;

    function moveToSlide(index) {
        // Verifica se o índice está dentro dos limites
        if (index < 0 || index >= items.length) {
            return;
        }
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
});

// export default{
//     moveToSlide
// }