// Abrir visualizar
document.addEventListener('DOMContentLoaded', function() {
    const botoesVisualizar = document.querySelectorAll('.validacao-ong-botao-visualizar');

    if (botoesVisualizar) {
        botoesVisualizar.forEach(button => button.addEventListener('click', function abrirDialogVisualizarOng() {
            if (!document.querySelector('.container-valida-ong').hasAttribute('open')) {
                document.querySelector('.container-valida-ong').setAttribute('open', 'open');
            }
        })
        );
    } 
});

// Fecha visualizar
document.addEventListener('DOMContentLoaded', function() {
    const botaoFecharVisualizacao = document.querySelector('.botao-fechar-dialog');

    if (botaoFecharVisualizacao) {
        botaoFecharVisualizacao.addEventListener('click', function fecharDialogVisualizarOng() {
            if (document.querySelector('.container-valida-ong').hasAttribute('open')) {
                document.querySelector('.container-valida-ong').removeAttribute('open');
            }
        });
    } 
});

// Abre Observações
document.addEventListener('DOMContentLoaded', function() {
    const botaoCancelarEdicao = document.querySelector('.botao-cancelar-formulario');

    if (botaoCancelarEdicao) {
        botaoCancelarEdicao.addEventListener('click', function abrirDialogObservacaoOng() {
            if (!document.querySelector('.container-observacao-ong').hasAttribute('open')) {
                document.querySelector('.container-observacao-ong').setAttribute('open', 'open');
            }
        });
    } 
});

// Fecha Observações
document.addEventListener('DOMContentLoaded', function() {
    const botaoCancelarEdicao = document.querySelector('.botao-fechar-dialog-observacao');

    if (botaoCancelarEdicao) {
        botaoCancelarEdicao.addEventListener('click', function fecharDialogObservacaoOng() {
            if (document.querySelector('.container-observacao-ong').hasAttribute('open')) {
                document.querySelector('.container-observacao-ong').removeAttribute('open');
            }
        });
    } 
});

// botao-cancelar-formulario // ABRE OBSERVAÇÕES

