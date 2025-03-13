let fileInput = document.getElementById("criar-postagem-ong-file-input");
let imageContainer = document.getElementById("criar-postagem-ong-images");
let numDeArq = document.getElementById("criar-postagem-ong-num-de-arquivos");

function preview(){
    numDeArq.textContent = `${fileInput.files.length} Arquivos Selecionados`;
    let numFiles = `${fileInput.files.length}`;
    if (numFiles > 3) {
        numDeArq.textContent = "Falha ao enviar!";
        fileInput.value = "";
    }
    for (i of fileInput.files){
        let reader = new FileReader();
        let li = document.createElement("li");
        let figure = document.createElement("figure");
        let figCap = document.createElement("figcaption");
        figCap.classList.add("criar-postagem-ong-figcaption-postagem");
        figCap.innerHTML = i.name;
        li.appendChild(figure);
        figure.appendChild(figCap);
        reader.onload=()=>{
            let img = document.createElement("img");
            img.classList.add("criar-postagem-ong-img-postagem");
            img.setAttribute("src",reader.result);
            figure.insertBefore(img,figCap);
        }
        imageContainer.appendChild(li);
        reader.readAsDataURL(i);
    }
}


const contTexto = document.getElementById('criar-postagem-ong-texto');
const contador = document.getElementById('criar-postagem-ong-contador');
contTexto.addEventListener('input', function() {
    if (contTexto.value.length > 60) {
        contTexto.value = contTexto.value.substring(0, 60);
    }
    const totalCaracteres = contTexto.value.length;
    contador.textContent = `${totalCaracteres} / 60`;
});

export default{
    preview
}