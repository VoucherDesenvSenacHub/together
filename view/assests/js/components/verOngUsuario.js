document.addEventListener("DOMContentLoaded", function () {
  const atualizarStatus = (seletor, texto, icone) => {
    document.querySelectorAll(seletor).forEach((elemento) => {
      elemento.innerHTML = `${texto} <span class='material-symbols-outlined'>${icone}</span>`;
    });
  };

  atualizarStatus(".status-aguardando", "Aguardando", "hourglass_empty");
  atualizarStatus(".status-aprovado", "Aprovado", "check");
  atualizarStatus(".status-recusado", "Recusado", "close");
});
