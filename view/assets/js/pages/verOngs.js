document.addEventListener('DOMContentLoaded', () => {
    const track = document.querySelector('.carousel-track');
    const prevButton = document.querySelector('.carousel-btn.prev');
    const nextButton = document.querySelector('.carousel-btn.next');

   
    if (!track) {
        return; 
    }
    if (!prevButton) {
        return; 
    }
    if (!nextButton) {
        return; 
    }

    const items = Array.from(track.children);

   
    if (items.length === 0) {
        return; 
    }

   
    const itemWidth = items[0].getBoundingClientRect().width;

   
    const visibleSlides = Math.floor(track.parentElement.offsetWidth / itemWidth);

    
    let currentIndex = 0;

    function moveToSlide(index) {
     
        if (index < 0 || index >= items.length) {
            return;
        }
        track.style.transform = `translateX(-${index * itemWidth}px)`;
    }

    nextButton.addEventListener('click', () => {
        if (currentIndex < items.length - visibleSlides) {
            currentIndex++;
        } else {
            currentIndex = 0; 
        }
        moveToSlide(currentIndex);
    });

    prevButton.addEventListener('click', () => {
        if (currentIndex > 0) {
            currentIndex--;
        } else {
            currentIndex = items.length - visibleSlides; 
        }
        moveToSlide(currentIndex);
    });

 
    window.addEventListener('resize', () => {
        moveToSlide(currentIndex);
    });
});

