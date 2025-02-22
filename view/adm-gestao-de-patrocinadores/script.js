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
        dialog.removeAttribute('open')
    }else{
        dialog.setAttribute('open', true);
    }
});

