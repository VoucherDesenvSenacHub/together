document.addEventListener("DOMContentLoaded", function () {
    // Seleciona os elementos do DOM
    const fileInput = document.getElementById("criar-postagem-ong-file-input");
    const imageContainer = document.getElementById("criar-postagem-ong-images");
    const numDeArq = document.getElementById("criar-postagem-ong-num-de-arquivos");
    const contTexto = document.getElementById("criar-postagem-ong-texto");
    const contador = document.getElementById("criar-postagem-ong-contador");
    const form = document.getElementById("criar-postagem-ong-form");

    // Verifica se todos os elementos necessários existem
    if (!fileInput || !imageContainer || !numDeArq || !contTexto || !contador || !form) {
        return; // Interrompe a execução do script silenciosamente
    }

    // Função para pré-visualizar as imagens selecionadas
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

    // Função para validar o formulário antes de enviar
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

    // Função para validar URLs
    function validarURL(url) {
        const regex = /^(https?|ftp):\/\/[^\s/$.?#].[^\s]*$/;
        return regex.test(url);
    }

    // Atualiza o contador de caracteres da descrição
    contTexto.addEventListener("input", function () {
        let totalCaracteres = contTexto.value.length;
        contador.textContent = `${totalCaracteres} / 60`;
    });

    // Adiciona o evento de mudança ao input de arquivo
    fileInput.addEventListener("change", preview);

    // Adiciona o evento de submit ao formulário
    form.addEventListener("submit", validarFormulario);
});