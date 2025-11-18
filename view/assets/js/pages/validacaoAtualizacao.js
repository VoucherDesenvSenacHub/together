document.addEventListener("DOMContentLoaded", function () {
    

    var btnAbrir = document.querySelector("#validacao-atualizacao-botao-recusar"); 
    var btnFechar = document.querySelector("#validacao-atualizacao-botao-fechar");
    var dialog = document.querySelector(".dialog-obs-validacao-atualizacao"); 
    var form = document.querySelector("#form-validacao-atualizacao");
    var divGroup = document.querySelector(".div-group-validacao-atualizacao");

    function abrirDialog() {
        if (dialog && form) {
            dialog.style.display = "flex";   
            divGroup.style.filter = "blur(2px)";  
            botaoAceitar.disabled = true;
        }        
    };

    function fecharDialog() {
        if (dialog && form) {
            dialog.style.display = "none";   
            divGroup.style.filter = "";  
            botaoAceitar.disabled = false;
        }        
    };

    if (btnAbrir) btnAbrir.addEventListener('click', abrirDialog);
    if (btnFechar) btnFechar.addEventListener('click', fecharDialog);

    var textarea = document.querySelector(".textarea-validacao-atualizacao");
    if (textarea) textarea.value = '';


    var inputLogoNovo = document.querySelector("#logo-ong-novo");
    var nomeLogoNovo = document.querySelector("#validacao-atualizacao-logo-file-novo");
    var inputConselhoFiscalNovo = document.querySelector("#conselho-fiscal-novo");
    var nomeConselhoNovo = document.querySelector("#validacao-atualizacao-conselho-fiscal-file-novo");

    if (inputLogoNovo && nomeLogoNovo) {
        inputLogoNovo.addEventListener('change', function () {
            var nomeLogo = this.files[0] ? this.files[0].name : ''; 
            nomeLogoNovo.textContent = nomeLogo;
        });
    }

    if (inputConselhoFiscalNovo && nomeConselhoNovo) {
        inputConselhoFiscalNovo.addEventListener('change', function () {
            var nomeConselho = this.files[0] ? this.files[0].name : ''; 
            nomeConselhoNovo.textContent = nomeConselho;
        }); 
    }

   

    var botaoAceitar = document.querySelector("#validacao-atualizacao-botao-aceitar");
    var botaoObs = document.querySelector("#validacao-atualizacao-botao-obs");

    function atualizarCadastro() {
        var url = "http://localhost/together/view/pages/adm/validarAtualizacaoOng.php?msg=atualizacaoAceita";
        window.location.href = url;
    };

    function enviarObservacao() {
        var url = "http://localhost/together/view/pages/adm/validarAtualizacaoOng.php?msg=atualizacaoRecusada";
        window.location.href = url;
    };

    if (botaoObs) botaoObs.addEventListener('click', enviarObservacao);
    if (botaoAceitar) botaoAceitar.addEventListener('click', atualizarCadastro);
});
