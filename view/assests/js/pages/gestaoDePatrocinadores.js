document.addEventListener('DOMContentLoaded', function() {
    const botaoAdicionar = document.querySelector('.adicionar-patrocinador');

    if (botaoAdicionar) {  // ✅ Só adiciona o evento se o botão existir
        botaoAdicionar.addEventListener('click', function abrirDialogAdicionaPatrocinador() {
            if (!document.querySelector('.container-remove-patrocinador').hasAttribute('open')) {
                document.querySelector('.container-adiciona-patrocinador').setAttribute('open', 'open');
            }
        });
    } 
});


document.addEventListener('DOMContentLoaded', function() {
    const botaoFechar = document.querySelector('.icone-fechar-adidiona-patrocinador');

    if (botaoFechar) {
        botaoFechar.addEventListener('click', function fecharDialogAdicionaPatrocinador() {
            document.querySelector('.container-adiciona-patrocinador').removeAttribute('open');
        });
    }
});



document.addEventListener('DOMContentLoaded', function() {
    const botaoDeletar = document.querySelector('.deletar-patrocinador');

    if (botaoDeletar) {
        botaoDeletar.addEventListener('click', function abrirDialogRemovePatrocinador() {
            if (!document.querySelector('.container-adiciona-patrocinador').hasAttribute('open')) {
                document.querySelector('.container-remove-patrocinador').setAttribute('open', 'open');
            }
        });
    }
});


document.addEventListener('DOMContentLoaded', function() {
    const botaoFechar = document.querySelector('.icone-fechar-remove-patrocinador');

    if (botaoFechar) { // ✅ Só adiciona o evento se o botão existir
        botaoFechar.addEventListener('click', function fecharDialogRemovePatrocinador() {
            document.querySelector('.container-remove-patrocinador').removeAttribute('open');
        });
    }
});


document.addEventListener('DOMContentLoaded', function() {
    const botaoCancelar = document.querySelector('.botao-cancelar-remove-patrocinador');

    if (botaoCancelar) {  // ✅ Só adiciona o evento se o botão existir
        botaoCancelar.addEventListener('click', function fecharDialogRemovePatrocinador() {
            document.querySelector('.container-remove-patrocinador').removeAttribute('open');
        });
    } 
});


// export default{
//     moveToSlide
// }








