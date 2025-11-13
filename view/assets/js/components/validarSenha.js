const senhaInput = document.querySelector("#senha");
const regras = {
  length: document.getElementById("min-length"),
  upper: document.getElementById("uppercase"),
  lower: document.getElementById("lowercase"),
  number: document.getElementById("number"),
  symbol: document.getElementById("symbol"),
};

senhaInput.addEventListener("input", () => {
  const senha = senhaInput.value;

  regras.length.classList.toggle("ok", senha.length >= 8);
  regras.upper.classList.toggle("ok", /[A-Z]/.test(senha));
  regras.lower.classList.toggle("ok", /[a-z]/.test(senha));
  regras.number.classList.toggle("ok", /\d/.test(senha));
  regras.symbol.classList.toggle("ok", /[^A-Za-z0-9]/.test(senha));
});
