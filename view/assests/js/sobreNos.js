const slides = document.querySelector('.slides');
const slide = document.querySelectorAll('.slide');
const totalSlides = slide.length;
let currentIndex = 0;

function showSlide(index) {
    slides.style.transform = `translateX(${-index * 100}%)`;
    slides.style.transition = 'transform 0.5s ease'; // Aplica a transição suavemente
}

function nextSlide() {
    currentIndex++;
    showSlide(currentIndex);

    if (currentIndex >= totalSlides - 1) {
        setTimeout(() => {
            slides.style.transition = 'none';
            slides.style.transform = 'translateX(0%)';
            currentIndex = 0;
        }, 500);
    }
}

setInterval(nextSlide, 3000);
