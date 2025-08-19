document.addEventListener("DOMContentLoaded", function () {
  var logosSlide = document.querySelector(".logos-slide");
  var logos = document.querySelector(".logos");

  if (logosSlide && logos) {
    var copy = logosSlide.cloneNode(true);
    logos.appendChild(copy);
  }
});
