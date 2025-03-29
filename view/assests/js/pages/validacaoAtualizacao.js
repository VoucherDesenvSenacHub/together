document.addEventListener("DOMContentLoaded", function () {
    
    // JS para Dialog (observações) da página! ---------------------------------------------------------------------------------

    var btnAbrir = document.querySelector("#validacao-atualizacao-botao-recusar"); 
    var btnFechar = document.querySelector("#validacao-atualizacao-botao-fechar");
    var dialog = document.querySelector(".dialog-obs-validacao-atualizacao"); 
    var form = document.querySelector(".form-validacao-atualizacao");

    function abrirDialog() {
        if (dialog && form) {
            dialog.style.display = "flex";   
            form.style.filter = "blur(2px)";  
            botaoAceitar.disabled = true;
        }        
    };

    function fecharDialog() {
        if (dialog && form) {
            dialog.style.display = "none";   
            form.style.filter = "";  
            botaoAceitar.disabled = false;
        }        
    };

    if (btnAbrir) btnAbrir.addEventListener('click', abrirDialog);
    if (btnFechar) btnFechar.addEventListener('click', fecharDialog);

    var textarea = document.querySelector(".textarea-validacao-atualizacao");
    if (textarea) textarea.value = '';

    // JS para add nome do arquivo no form! -----------------------------------------------------------------------------

    var inputLogoNovo = document.querySelector("#logo-ong-novo");
    var nomeLogoNovo = document.querySelector("#validacao-atualizacao-logo-file-novo");
    var inputConselhoFiscalNovo = document.querySelector("#conselho-fiscal-novo");
    var nomeConselhoNovo = document.querySelector("#validacao-atualizacao-conselho-fiscal-file-novo");

    if (inputLogoNovo && nomeLogoNovo) {
        inputLogoNovo.addEventListener('change', function () {
            var nomeLogo = this.files[0] ? this.files[0].name : ''; // Nome do arquivo de logo
            nomeLogoNovo.textContent = nomeLogo;
        });
    }

    if (inputConselhoFiscalNovo && nomeConselhoNovo) {
        inputConselhoFiscalNovo.addEventListener('change', function () {
            var nomeConselho = this.files[0] ? this.files[0].name : ''; // Nome do arquivo de conselho fiscal
            nomeConselhoNovo.textContent = nomeConselho;
        }); 
    }

    // Btn para mandar a notificação para a tela validarAtualizacaoOng.php -----------------------------------------------

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
