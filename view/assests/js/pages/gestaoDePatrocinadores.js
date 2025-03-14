console.log('teste');

document.querySelector('.container-adiciona-patrocinador').addEventListener('click', () =>{
    if(document.querySelector('.container-adiciona-patrocinador').hasAttribute('open'){
        fecharPopup(document.querySelector('.container-adiciona-patrocinador'));
    }else{
        abrirPopup(document.querySelector('.container-adiciona-patrocinador'))
    }})


function abrirPopup(dialogName){
        const dialog = document.querySelector(dialogName)
        if(dialog.getAttribute('open')){
            dialog.removeAttribute('open')
        }else{
            dialog.setAttribute('open', true);
        }

}


function fecharPopup(dialogName){
    const dialog = document.querySelector(dialogName);
    dialog.removeAttribute('open');   
}


document.querySelector('.remover').addEventListener('click', () =>{
    const dialog = document.querySelector('dialog')
    if(dialog.getAttribute('open')){
            fecharPopup();
    }else{
        dialog.setAttribute('open', true);
    }
});

