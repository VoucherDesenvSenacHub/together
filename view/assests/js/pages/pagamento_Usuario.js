document.addEventListener("DOMContentLoaded", () => {
  const toggleAnonimo = document.getElementById("pagamento_anonimo");
  const body = document.querySelector("body");
  const imagemDoacao = document.getElementById("imagem-doacao");

  if (toggleAnonimo) {
    toggleAnonimo.addEventListener("change", () => {
      // Altera a classe do corpo para o modo anônimo
      body.classList.toggle("modo-anonimo", toggleAnonimo.checked);

      // Altera a imagem dependendo do estado do toggle
      // if (toggleAnonimo.checked) {
      //   imagemDoacao.src = '/together/view/assests/images/Usuario/doação_anonima.png';  // Imagem quando a doação é anônima
      // } else {
      //   imagemDoacao.src = '/together/view/assests/images/Usuario/doação.png';  // Imagem quando a doação não é anônima
      // }
    });
  }
});
