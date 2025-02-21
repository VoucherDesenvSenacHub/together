document.querySelector('.adicionar').addEventListener('click', () =>{
    const dialog = document.querySelector('dialog')
    if(dialog.getAttribute('open')){
        dialog.removeAttribute('open')
    }else{
        dialog.setAttribute('open', true);
    }
});

document.querySelector('.icone-fechar').addEventListener('click', () =>{
    const dialog = document.querySelector('dialog');
    dialog.removeAttribute('open');
});