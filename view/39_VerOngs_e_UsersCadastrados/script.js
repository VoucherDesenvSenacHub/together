const icone_aguardando = document.getElementById("status-aguardando");
const icone_aprovado = document.getElementById("status-aprovado");
const icone_recusado = document.getElementById("status-recusado");

// console.log(icone);

let array = ["Aguardando", "Recusado", "Aprovado"];

for (let index = 0; index < array.length; index++) {
  const element = array[index];

  // icone.innerText.trim()

  console.log(element);

  switch (element) {
    case "Aguardando":
      icone_aguardando.innerHTML =
        "Aguardando <span class='material-symbols-outlined'>hourglass_empty</span>";
      break;
    case "Aprovado":
      icone_aprovado.innerHTML =
        "Aprovado <span class='material-symbols-outlined'>check</span>";
      break;
    case "Recusado":
      icone_recusado.innerHTML =
        "Recusado <span class='material-symbols-outlined'>close</span>";
      break;
  }
}
