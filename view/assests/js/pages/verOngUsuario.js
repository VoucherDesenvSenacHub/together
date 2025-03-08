document.addEventListener("DOMContentLoaded", function () {
  const atualizarStatus = (seletor, texto) => {
    document.querySelectorAll(seletor).forEach((elemento) => {
      elemento.innerHTML = `${texto} <span class='material-symbols-outlined'></span>`;
    });
  };

  atualizarStatus(".status-aguardando", "Aguardando");
  // atualizarStatus(".status-aprovado", "Aprovado");
  // atualizarStatus(".status-recusado", "Recusado");
});
