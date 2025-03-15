//Listeners Adiciona PAtrocinador
document.querySelector('.uil--plus').addEventListener('click', abrirDialogAdicionaPatrocinador);
document.querySelector('.icone-fechar-adidiona-patrocinador').addEventListener('click', fecharDialogAdicionaPatrocinador);

//Listeners Remove Patrocinador
document.querySelector('.uil--trash').addEventListener('click', abrirDialogRemovePatrocinador);
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


// document.querySelector('.remover').addEventListener('click', () =>{
//     const dialog = document.querySelector('dialog')
//     if(dialog.getAttribute('open')){
//             fecharPopup();
//     }else{
//         dialog.setAttribute('open', true);
//     }
// });


// // Criando as Dialogs
// const dialogAdicionaPatrocinador = document.querySelector('.container-adiciona-patrocinador')
// const dialogRemovePatrocinador = document.querySelector('.container-remove-patrocinador');

// //Listeners
// document.querySelector('.uil--plus').addEventListener('click', function () {abrirDialog(dialogAdicionaPatrocinador)});
// document.querySelector('.uil--trash').addEventListener('click', function () {abrirDialog(dialogRemovePatrocinador)});
// document.querySelector('.icone-fechar').addEventListener('click', fecharDialog);
// document.querySelector('.botao-cancelar').addEventListener('click', fecharDialog);

// // Metodos      
// function abrirDialog(dialog){
    
//     dialog.setAttribute('open', 'open');
        

// }

// function fecharDialog(){
//     console.log('teste fora do if')
//     if(dialogAdicionaPatrocinador.hasAttribute('open')){
//         console.log('teste if')
//         dialogAdicionaPatrocinador.removeAttribute('open')
//     }else{
//         console.log('teste else')
//         dialogRemovePatrocinador.removeAttribute('open')
//     };   
// }



