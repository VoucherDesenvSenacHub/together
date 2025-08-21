const btnNextStep1 = document.querySelector('#btn1\\.1');
const btnNextStep2 = document.querySelector('#btn2\\.2');
const btnNextStep3 = document.querySelector('#btn3\\.2');
const steps = document.querySelectorAll('.step'); 
let currentStep = 0;

// Função para validar inputs do step atual
function validarStep(step) {
    const inputs = step.querySelectorAll('input, select');
    let valido = true;

    inputs.forEach(input => {
        if (!input.value.trim()) {
            valido = false;
            input.classList.add('erro'); // destaque visual
        } else {
            input.classList.remove('erro');
        }
    });

    return valido;
}

// Step 1: verifica CNPJ
btnNextStep1.addEventListener('click', async () => {
    const stepAtual = steps[currentStep];

    // Valida campos do step 1
    if (!validarStep(stepAtual)) {
        alert('Preencha todos os campos obrigatórios deste passo!');
        return;
    }

    const cnpj = document.querySelector('#cnpj').value.trim();

    try {
        const res = await fetch('/together/controller/OngController.php?action=verificarCnpj', {
            method: 'POST',
            headers: { 'Content-Type': 'application/x-www-form-urlencoded' },
            body: new URLSearchParams({ cnpj })
        });

        const text = await res.text();
        let data;
        try {
            data = JSON.parse(text);
        } catch {
            console.error('Resposta não é JSON:', text);
            throw new Error('Erro na resposta do servidor');
        }

        if (!res.ok) {
            throw new Error(data.error || 'Erro na requisição');
        }

        if (data.existe) {
            alert('CNPJ já cadastrado!');
            return; 
        }

        // avança para o próximo step
        stepAtual.classList.remove('active');
        currentStep++;
        steps[currentStep].classList.add('active');

    } catch (err) {
        console.error('Erro ao verificar o CNPJ:', err);
        alert('Erro ao verificar o CNPJ. Tente novamente.');
    }
});

// Step 2
btnNextStep2.addEventListener('click', () => {
    const stepAtual = steps[currentStep];

    if (!validarStep(stepAtual)) {
        alert('Preencha todos os campos obrigatórios deste passo!');
        return;
    }

    stepAtual.classList.remove('active');
    currentStep++;
    steps[currentStep].classList.add('active');
});

// Step 3
btnNextStep3.addEventListener('click', () => {
    const stepAtual = steps[currentStep];

    if (!validarStep(stepAtual)) {
        alert('Preencha todos os campos obrigatórios deste passo!');
        return;
    }

    stepAtual.classList.remove('active');
    currentStep++;
    steps[currentStep].classList.add('active');
});
