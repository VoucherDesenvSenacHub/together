document.addEventListener('DOMContentLoaded', () => {
    const form = document.querySelector('#form-pagamento');

    form.addEventListener('submit', function (event){
        event.preventDefault();

        const nome = document.querySelector('#nome')?.value;
        const numero_cartao = document.querySelector('#numero')?.value;
        const numero = numero_cartao.slice(-4);
        const valor = document.querySelector('#valor')?.value;

        const container_comprovante = document.createElement('div');
        container_comprovante.innerHTML = `
        <h1 style="margin-bottom: 30px; font-weight: bold;">Comprovante Doação</h1>
        
        <p style="margin-bottom: 10px">Nome: <strong>${nome}</strong></p>
        
        <p style="margin-bottom: 10px">Cartão: **** **** **** <strong>${numero}</strong></p>
    
        <p style="margin-bottom: 10px">Valor Pago: <strong>${valor}</strong></p>
        `;

        const estilizacao = 
        {
            margin: [10, 10, 10, 10],
            filename: "comprovante.pdf",
            html2canvas: {scale: 2},
            jsPDF: {unit: "mm", format: "a4", orientation: "portrait"}
        };

        html2pdf().set(estilizacao).from(container_comprovante).save().then(() => {
            form.submit();
        });
    });
});
