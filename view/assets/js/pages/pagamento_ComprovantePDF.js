document.addEventListener('DOMContentLoaded', () => {
    const form = document.querySelector('#form-pagamento');

    form.addEventListener('submit', function (event){
        event.preventDefault();

        const nome = document.querySelector('#nome')?.value;
        const numero_cartao = document.querySelector('#numero')?.value;
        const numero = numero_cartao.slice(-4);
        const valor = document.querySelector('#valor')?.value;

        // Data e hora
        const agora = new Date();
        const dataFormatada = agora.toLocaleDateString('pt-BR');
        const horaFormatada = agora.toLocaleTimeString('pt-BR');

        const transacaoID = 'DOA-' + agora.getTime();

        const container_comprovante = document.createElement('div');
        container_comprovante.style.width = '100%';
        container_comprovante.style.padding = '30px';
        container_comprovante.style.boxSizing = 'border-box';
        container_comprovante.style.fontFamily = 'Arial, sans-serif';
        container_comprovante.style.border = '1px solid #ccc';

        container_comprovante.innerHTML = `
        <div style="text-align: center; margin-bottom: 20px;">
            <img src="../../images/geral/Together.png" alt="Together" style="max-width: 150px; margin-bottom: 10px;" />
            <h1 style="margin: 0; font-size: 22px;">Comprovante de Doação</h1>
        </div>

        <p><strong>ID da Transação:</strong> ${transacaoID}</p>
        <p><strong>Data:</strong> ${dataFormatada} &nbsp;&nbsp;&nbsp; <strong>Hora:</strong> ${horaFormatada}</p>
        <hr style="margin: 20px 0;">

        <p><strong>Nome do Pagador:</strong> ${nome}</p>
        <p><strong>Cartão:</strong> **** **** **** ${numero}</p>
        <p><strong>Valor Pago: </strong>${valor}</p>

        <hr style="margin: 20px 0;">
        <p style="font-size: 12px; color: #555;">Este é um comprovante digital gerado automaticamente. Guarde-o para referência futura.</p>
        `;

        const estilizacao = {
            margin: [10, 10, 10, 10],
            filename: "comprovante-doacao.pdf",
            html2canvas: { scale: 2 },
            jsPDF: { unit: "mm", format: "a4", orientation: "portrait" }
        };

        html2pdf().set(estilizacao).from(container_comprovante).save().then(() => {
            form.submit();
        });
    });
});