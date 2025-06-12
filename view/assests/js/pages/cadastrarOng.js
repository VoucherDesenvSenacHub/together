const steps = document.querySelectorAll(".step");
const nextBtns = document.querySelectorAll(".next");
const prevBtns = document.querySelectorAll(".prev");

let currentStep = 0;

// Só executa se steps existirem
if (steps.length > 0) {
    if (nextBtns.length > 0) {
        nextBtns.forEach((btn) => {
            btn.addEventListener("click", () => {
                const inputs = steps[currentStep].querySelectorAll("input, select, textarea");
                let isValid = true;

                inputs.forEach(input => {
                    if (!input.checkValidity()) {
                        isValid = false;
                        input.reportValidity(); // Mostra mensagem de erro do navegador
                    }
                });

                if (isValid && currentStep < steps.length - 1) {
                    steps[currentStep].classList.remove("active");
                    currentStep++;
                    steps[currentStep].classList.add("active");
                }
            });
        });
    }

    if (prevBtns.length > 0) {
        prevBtns.forEach((btn) => {
            btn.addEventListener("click", () => {
                if (currentStep > 0) {
                    steps[currentStep].classList.remove("active");
                    currentStep--;
                    steps[currentStep].classList.add("active");
                }
            });
        });
    }
}
