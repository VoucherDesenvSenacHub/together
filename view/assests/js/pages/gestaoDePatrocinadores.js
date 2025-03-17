//Listeners Adiciona PAtrocinador
document.querySelector('.adicionar-patrocinador').addEventListener('click', abrirDialogAdicionaPatrocinador);
document.querySelector('.icone-fechar-adidiona-patrocinador').addEventListener('click', fecharDialogAdicionaPatrocinador);

//Listeners Remove Patrocinador
document.querySelector('.deletar-patrocinador').addEventListener('click', abrirDialogRemovePatrocinador);
document.querySelector('.icone-fechar-remove-patrocinador').addEventListener('click', fecharDialogRemovePatrocinador);
document.querySelector('.botao-cancelar-remove-patrocinador').addEventListener('click', fecharDialogRemovePatrocinador);



// Metodos  
function abrirDialogAdicionaPatrocinador() {
    if(document.querySelector('.container-remove-patrocinador').hasAttribute('open')){}
    else{
    document.querySelector('.container-adiciona-patrocinador').setAttribute('open', 'open');
    }    
}

function fecharDialogAdicionaPatrocinador() {
    document.querySelector('.container-adiciona-patrocinador').removeAttribute('open');
}

function abrirDialogRemovePatrocinador() {
    if(document.querySelector('.container-adiciona-patrocinador').hasAttribute('open')){}
    else{        
        document.querySelector('.container-remove-patrocinador').setAttribute('open', 'open');
    }
}

function fecharDialogRemovePatrocinador() {
    document.querySelector('.container-remove-patrocinador').removeAttribute('open');
}


