document.querySelector('.adicionar-patrocinador').addEventListener('click',
     function abrirDialogAdicionaPatrocinador(){

        if(document.querySelector('.container-remove-patrocinador').hasAttribute('open')){}
        else{
        document.querySelector('.container-adiciona-patrocinador').setAttribute('open', 'open');
        }    
    }
);

document.querySelector('.icone-fechar-adidiona-patrocinador').addEventListener('click', 
    function fecharDialogAdicionaPatrocinador() {
        document.querySelector('.container-adiciona-patrocinador').removeAttribute('open');
    }
);


document.querySelector('.deletar-patrocinador').addEventListener('click', 
    function abrirDialogRemovePatrocinador() {
        if(document.querySelector('.container-adiciona-patrocinador').hasAttribute('open')){}
        else{        
            document.querySelector('.container-remove-patrocinador').setAttribute('open', 'open');
        }
});

document.querySelector('.icone-fechar-remove-patrocinador').addEventListener('click', 
    function fecharDialogRemovePatrocinador() {
        document.querySelector('.container-remove-patrocinador').removeAttribute('open');
    }
);

document.querySelector('.botao-cancelar-remove-patrocinador').addEventListener('click', 
    function fecharDialogRemovePatrocinador() {
        document.querySelector('.container-remove-patrocinador').removeAttribute('open');
    }
);









