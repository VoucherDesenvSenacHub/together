let fileInput = document.getElementById("file-input");
let imageContainer = document.getElementById("images");
let numDeArq = document.getElementById("num-de-arquivos");

function preview(){
    imageContainer.innerHTML = "";
    numDeArq.textContent = `${fileInput.files.length} Arquivos Selecionados`;

    for(i of fileInput.files){
        let reader = new FileReader();
        let li = document.createElement("li");
        let figure = document.createElement("figure");
        let figCap = document.createElement("figcaption");
        figCap.innerHTML = i.name;
        li.appendChild(figure);
        figure.appendChild(figCap);
        reader.onload=()=>{
            let img = document.createElement("img");
            img.classList.add("img-postagem");
            img.setAttribute("src",reader.result);
            figure.insertBefore(img,figCap);
        }
        imageContainer.appendChild(li);
        reader.readAsDataURL(i);
    }
}