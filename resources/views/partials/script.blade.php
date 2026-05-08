<script>
    document.addEventListener("DOMContentLoaded", () => {

    let currentStep = 1;
    const totalSteps = 5;
    let wizardData = {};

    // STEP SWITCHING
    function showStep(step) {
        document.querySelectorAll(".wizard-step-content").forEach(el => {
            el.classList.add("d-none");
        });

        document.querySelector(`.wizard-step-content[data-step="${step}"]`)
            .classList.remove("d-none");

        updateSidebar(step);
        updateProgress(step);
    }

    // SIDEBAR UPDATE
    function updateSidebar(step) {
        const steps = document.querySelectorAll(".wizard-step");

        steps.forEach((el, index) => {
            el.classList.remove("done", "active");

            if (index + 1 < step) el.classList.add("done");
            if (index + 1 === step) el.classList.add("active");
        });
    }

    // PROGRESS BAR
    function updateProgress(step) {
        let percent = (step / totalSteps) * 100;
        document.getElementById("progressBar").style.width = percent + "%";
        document.getElementById("currentStep").innerText = step;
    }

    // NEXT
    document.getElementById("nextStep").addEventListener("click", () => {
        if (currentStep < totalSteps) {
            currentStep++;
            showStep(currentStep);
        } else {
            console.log("FINAL DATA:", wizardData);
        }
    });

    // BACK
    document.getElementById("prevStep").addEventListener("click", () => {
        if (currentStep > 1) {
            currentStep--;
            showStep(currentStep);
        }
    });

    // OPTION HANDLING
    document.querySelectorAll(".option-group").forEach(group => {

        const type = group.dataset.type;
        const key = group.dataset.group;

        group.querySelectorAll(".option-card").forEach(option => {

            option.addEventListener("click", () => {

                if (type === "single") {
                    group.querySelectorAll(".option-card").forEach(o => o.classList.remove("active"));
                    option.classList.add("active");

                    wizardData[key] = option.dataset.value;
                }

                if (type === "multiple") {
                    option.classList.toggle("active");

                    let selected = [];
                    group.querySelectorAll(".active").forEach(o => {
                        selected.push(o.dataset.value);
                    });

                    wizardData[key] = selected;
                }

                console.log(wizardData);
            });
        });
    });

    // TEXT INPUT
    document.querySelectorAll(".wizard-input").forEach(input => {
        input.addEventListener("input", () => {
            wizardData[input.dataset.group] = input.value;
        });
    });

    // INIT
    showStep(currentStep);
});

let current = 0;
const steps = document.querySelectorAll(".step");
const nextBtn = document.getElementById("nextBtn");
const prevBtn = document.getElementById("prevBtn");
const progress = document.getElementById("progressBar");
const stepText = document.getElementById("currentStep");
const sidebarSteps = document.querySelectorAll(".wizard-step");

function showStep(index) {
    steps.forEach((s, i) => s.classList.toggle("active", i === index));

    stepText.innerText = index + 1;

    progress.style.width = ((index + 1) / steps.length) * 100 + "%";

    sidebarSteps.forEach((el, i) => {
        el.classList.remove("active", "done");
        if (i < index) el.classList.add("done");
        if (i === index) el.classList.add("active");
    });

    prevBtn.style.display = index === 0 ? "none" : "inline-block";

    nextBtn.innerText = index === steps.length - 1 ? "Submit" : "Next";
}

nextBtn.onclick = () => {
    if (current < steps.length - 1) {
        current++;
        showStep(current);
    } else {
        document.getElementById("multiStepForm").submit();
    }
};

prevBtn.onclick = () => {
    current--;
    showStep(current);
};

showStep(current);

/* OPTION SELECT */
document.querySelectorAll(".option-group").forEach(group => {
    const type = group.dataset.type;
    const name = group.dataset.name;

    group.querySelectorAll(".option-card").forEach(card => {
        card.addEventListener("click", () => {

            if (type === "single") {
                group.querySelectorAll(".option-card").forEach(c => c.classList.remove("active"));
                card.classList.add("active");

                group.querySelectorAll("input").forEach(i => i.remove());

                let input = document.createElement("input");
                input.type = "hidden";
                input.name = name;
                input.value = card.dataset.value;
                group.appendChild(input);

            } else {
                card.classList.toggle("active");

                group.querySelectorAll("input").forEach(i => i.remove());

                group.querySelectorAll(".option-card.active").forEach(active => {
                    let input = document.createElement("input");
                    input.type = "hidden";
                    input.name = name;
                    input.value = active.dataset.value;
                    group.appendChild(input);
                });
            }
        });
    });
});

document.querySelectorAll('.option-group').forEach(group => {
    const name = group.dataset.name;

    group.querySelectorAll('.option-card').forEach(card => {
        card.addEventListener('click', () => {
            let value = card.dataset.value;

            if (group.dataset.type === 'single') {
                document.querySelector(`[name="${name}"]`).value = value;
            }
        });
    });
});
</script>