const icone = document.getElementById("status-icone");

switch (icone) {
  case "<td id='status-icone'>Aguardando</td>":
    icone.innerHTML =
      "<td id ='status-icone'>Agurdando <span class='material-symbols-outlined'>hourglass_empty</span></td>";
    break;
  case "<td id='status-icone'>Aprovado</td>":
    icone.innerHTML =
      "<td id ='status-icone'>Agurdando <span class='material-symbols-outlined'>check</span></td>";
    break;
  case "<td id='status-icone'>Recusado</td>":
    icone.innerHTML =
      "<td id ='status-icone'>Agurdando <span class='material-symbols-outlined'>close</span></td>";
    break;
}
