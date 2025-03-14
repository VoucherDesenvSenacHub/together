document.addEventListener("DOMContentLoaded", function () {
    const fileInput = document.getElementById("criar-postagem-ong-file-input");
    const imageContainer = document.getElementById("criar-postagem-ong-images");
    const numDeArq = document.getElementById("criar-postagem-ong-num-de-arquivos");
    const contTexto = document.getElementById("criar-postagem-ong-texto");
    const contador = document.getElementById("criar-postagem-ong-contador");
    const form = document.getElementById("criar-postagem-ong-form");

    function preview() {
        imageContainer.innerHTML = ""; // Limpa imagens anteriores
        let numFiles = fileInput.files.length;

        if (numFiles === 0) {
            numDeArq.textContent = "Nenhum Arquivo Encontrado";
            return;
        }

        if (numFiles > 3) {
            numDeArq.textContent = "Erro: Máximo de 3 imagens!";
            fileInput.value = ""; // Reseta input
            return;
        }

        numDeArq.textContent = `${numFiles} Arquivo(s) Selecionado(s)`;

        for (let file of fileInput.files) {
            let reader = new FileReader();
            let li = document.createElement("li");
            let figure = document.createElement("figure");
            let figCap = document.createElement("figcaption");

            figCap.classList.add("criar-postagem-ong-figcaption-postagem");
            figCap.textContent = file.name;

            reader.onload = () => {
                let img = document.createElement("img");
                img.classList.add("criar-postagem-ong-img-postagem");
                img.src = reader.result;
                figure.appendChild(img);
            };

            figure.appendChild(figCap);
            li.appendChild(figure);
            imageContainer.appendChild(li);
            reader.readAsDataURL(file);
        }
    }

    function validarFormulario(event) {
        const link = document.getElementById("criar-postagem-ong-hyperlink").value;
        const descricao = contTexto.value.trim();

        if (fileInput.files.length === 0) {
            alert("Erro: Selecione pelo menos uma imagem!");
            event.preventDefault();
            return;
        }

        if (descricao.length === 0) {
            alert("Erro: A descrição não pode estar vazia!");
            event.preventDefault();
            return;
        }

        if (!validarURL(link)) {
            alert("Erro: O hiperlink inserido não é válido!");
            event.preventDefault();
            return;
        }
    }

    function validarURL(url) {
        const regex = /^(https?|ftp):\/\/[^\s/$.?#].[^\s]*$/;
        return regex.test(url);
    }

    contTexto.addEventListener("input", function () {
        let totalCaracteres = contTexto.value.length;
        contador.textContent = `${totalCaracteres} / 60`;
    });

    fileInput.addEventListener("change", preview);
    form.addEventListener("submit", validarFormulario);
});

export default {
    preview
};



