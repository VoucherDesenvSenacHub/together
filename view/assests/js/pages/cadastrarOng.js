const btnNextStep1 = document.querySelector('#btn1\\.1');
const steps = document.querySelectorAll('.step');
let currentStep = 0;

// Valida inputs do step atual
function validarStep(step) {
    const inputs = step.querySelectorAll('input, select');
    let valido = true;
    inputs.forEach(input => {
        if(!input.value.trim()) {
            valido = false;
            input.classList.add('erro');
        } else {
            input.classList.remove('erro');
        }
    });
    return valido;
}

// Avança / volta
function avancarStep() {
    if(currentStep < steps.length-1) {
        steps[currentStep].classList.remove('active');
        currentStep++;
        steps[currentStep].classList.add('active');
    }
}
function voltarStep() {
    if(currentStep>0){
        steps[currentStep].classList.remove('active');
        currentStep--;
        steps[currentStep].classList.add('active');
    }
}

// Verifica CNPJ via AJAX
btnNextStep1.addEventListener('click', async (e)=>{
    e.preventDefault();
    const stepAtual = steps[currentStep];
    if(!validarStep(stepAtual)) return;

    const cnpj = document.querySelector('#cnpj').value.trim();

    try{
        const res = await fetch('/together/controller/OngController.php?action=verificarCnpj',{
            method:'POST',
            headers:{'Content-Type':'application/x-www-form-urlencoded'},
            body:new URLSearchParams({cnpj})
        });
        const data = await res.json();
        if(data.existe){
            // Mostra popup usando função JS
            alert(data.message);
            return;
        }
        avancarStep();
    } catch(err){
        console.error('Erro:',err);
    }
});

// Botões prev / next restantes
document.querySelectorAll('button[id^="btn"]').forEach(btn=>{
    btn.addEventListener('click', e=>{
        if(btn.id.includes('prev')) voltarStep();
        else if(btn.id.includes('next') && btn.id!=='btn1.1'){
            const stepAtual = steps[currentStep];
            if(validarStep(stepAtual)) avancarStep();
        }
    });
});
