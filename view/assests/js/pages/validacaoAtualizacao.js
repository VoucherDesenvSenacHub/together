// NOVO

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

// ANTIGO

var inputLogoAntigo = document.querySelector('#logo-ong-antigo');
var nomeLogoAntigo = document.querySelector('#validacao-atualizacao-logo-file-antigo');
var inputConselhoFiscalAntigo = document.querySelector('#conselho-fiscal-antigo');
var nomeConselhoAntigo = document.querySelector('#validacao-atualizacao-conselho-fiscal-file-antigo');

// Quando o arquivo de logo for selecionado
inputLogoAntigo.addEventListener('change', function () {
    var nomeLogo = this.files[0] ? this.files[0].name : ''; // Nome do arquivo de logo
    nomeLogoAntigo.textContent = nomeLogo;
});

// Quando o arquivo de conselho fiscal for selecionado
inputConselhoFiscalAntigo.addEventListener('change', function () {
    var nomeConselho = this.files[0] ? this.files[0].name : ''; // Nome do arquivo de conselho fiscal
    nomeConselhoAntigo.textContent = nomeConselho;
});