document.addEventListener("DOMContentLoaded", () => {
    setTimeout(() => {
        const popup = document.getElementById('popup');
        if (popup) {
            popup.style.display = 'none';
        }
    }, 5000);
});