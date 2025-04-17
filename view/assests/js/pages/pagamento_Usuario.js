console.log("pagamento_Usuario.js carregado!");

document.addEventListener("DOMContentLoaded", () => {
  const toggleAnonimo = document.getElementById("pagamento_anonimo");
  const body = document.querySelector("body");

  if (toggleAnonimo) {
    toggleAnonimo.addEventListener("change", () => {
      console.log("Toggle alterado:", toggleAnonimo.checked);
      body.classList.toggle("modo-anonimo", toggleAnonimo.checked);
    });
  }
});
