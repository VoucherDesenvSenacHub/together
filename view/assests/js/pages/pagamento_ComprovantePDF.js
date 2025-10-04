const botao_realizarPagamento = document.querySelector('#realizar_pagamento');

botao_realizarPagamento.addEventListener('click', () => {
    const comprovante_nome = document.querySelector('#nome').value;
    const comprovante_numero_cartao = document.querySelector('#numero').value;
    const comprovante_valor = document.querySelector('#valor').value;

    const container_comprovante = document.createElement('div');
    
    container_comprovante.innerHTML = `
    <h1 style="margin-bottom: 30px; font-weight: bold;">Comprovante</h1>
    
    <p style="margin-bottom: 10px">Nome: <strong>${comprovante_nome.innerHTML}</strong></p>
    
    <p style="margin-bottom: 10px">Cartão: <strong>${comprovante_numero_cartao.innerHTML}</strong></p>

    <p style="margin-bottom: 10px">Valor Pago: <strong>${comprovante_valor.innerHTML}</strong></p>
    `;

    const estilizacao = 
    {
        margin: [10, 10, 10, 10],
        filename: "comprovante.pdf",
        html2canvas: {scale: 2},
        jsPDF: {unit: "mm", format: "a4", orientation: "portrait"}
    };

    html2pdf().set(estilizacao).from(container_comprovante).save();
});