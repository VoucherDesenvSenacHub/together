// JS para Dialog (observações) da página! ---------------------------------------------------------------------------------

var btnAbrir = document.querySelector("#validacao-atualizacao-botao-recusar"); 
var btnFechar = document.querySelector("#validacao-atualizacao-botao-fechar")
var dialog = document.querySelector(".dialog-obs-validacao-atualizacao"); 
var form = document.querySelector(".form-validacao-atualizacao")

function abrirDialog() {
    dialog.style.display = "block";   
    form.style.filter = "blur(2px)"          
};

function fecharDialog() {
    dialog.style.display = "none";   
    form.style.filter = ""               
};

btnAbrir.addEventListener('click', abrirDialog);
btnFechar.addEventListener('click', fecharDialog)

var textarea = document.querySelector(".textarea-validacao-atualizacao");
textarea.value = '';

// JS para add nome do arquivo no form! -----------------------------------------------------------------------------

var inputLogoNovo = document.querySelector('#logo-ong-novo');
var nomeLogoNovo = document.querySelector('#validacao-atualizacao-logo-file-novo');
var inputConselhoFiscalNovo = document.querySelector('#conselho-fiscal-novo');
var nomeConselhoNovo = document.querySelector('#validacao-atualizacao-conselho-fiscal-file-novo');

// Quando o arquivo de logo for selecionado
inputLogoNovo.addEventListener('change', function () {
    var nomeLogo = this.files[0] ? this.files[0].name : ''; // Nome do arquivo de logo
    nomeLogoNovo.textContent = nomeLogo;
});

// Quando o arquivo de conselho fiscal for selecionado
inputConselhoFiscalNovo.addEventListener('change', function () {
    var nomeConselho = this.files[0] ? this.files[0].name : ''; // Nome do arquivo de conselho fiscal
    nomeConselhoNovo.textContent = nomeConselho;
}); 

// Btn para mandar a notificação para a tela validarAtualizacaoOng.php -----------------------------------------------

var botaoAceitar = document.querySelector('#validacao-atualizacao-botao-aceitar');
var botaoObs = document.querySelector('#validacao-atualizacao-botao-obs');

function atualizarCadastro() {
    var url = "http://localhost/together/view/pages/adm/validarAtualizacaoOng.php?msg=atualizacaoAceita";
    window.location.href = url;

};

function enviarObservacao() {
    var url = "http://localhost/together/view/pages/adm/validarAtualizacaoOng.php?msg=atualizacaoRecusada";
    window.location.href = url;
};

botaoObs.addEventListener('click', enviarObservacao);
botaoAceitar.addEventListener('click', atualizarCadastro);
