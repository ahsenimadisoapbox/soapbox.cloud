'use strict';

/* ===========================
   DOM READY
=========================== */
document.addEventListener('DOMContentLoaded', () => {

    /* ---------- Bootstrap Toasts ---------- */
    const showToast = (id) => {
        const el = document.getElementById(id);
        if (el && window.bootstrap) {
            new bootstrap.Toast(el).show();
        }
    };

    showToast('successToast');
    showToast('errorToast');

    /* ---------- AOS Init ---------- */
    if (window.AOS) {
        AOS.init({
            once: false, // animation repeats
            duration: 900,
            easing: 'ease-out-cubic'
        });
    }
});

/* ===========================
   WINDOW LOAD
=========================== */
window.addEventListener('load', () => {
    const preloader = document.getElementById('preloader');

    if (preloader) {
        preloader.style.transition = 'opacity 0.4s ease';
        preloader.style.opacity = '0';

        setTimeout(() => {
            preloader.style.display = 'none';
        }, 400);
    }
});

document.addEventListener("DOMContentLoaded", function() {

    const counters = document.querySelectorAll('.counter');

    const animateCounter = (counter) => {
        const target = +counter.getAttribute('data-target');
        const prefix = counter.getAttribute('data-prefix') || '';
        const suffix = counter.getAttribute('data-suffix') || '';

        let count = 0;
        const speed = 200;
        const increment = target / speed;

        const updateCount = () => {
            count += increment;

            if (count < target) {
                counter.innerText = prefix + Math.ceil(count) + suffix;
                requestAnimationFrame(updateCount);
            } else {
                counter.innerText = prefix + target + suffix;
            }
        };

        updateCount();
    };

    // Trigger only when visible
    const observer = new IntersectionObserver((entries, obs) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                animateCounter(entry.target);
                obs.unobserve(entry.target); // run once
            }
        });
    }, { threshold: 0.6 });

    counters.forEach(counter => {
        observer.observe(counter);
    });

});

document.addEventListener("DOMContentLoaded", function() {
    const toasts = document.querySelectorAll('.toast');
    toasts.forEach(toastEl => {
        const toast = new bootstrap.Toast(toastEl, {
            delay: 3000
        });
        toast.show();
    });
});

document.addEventListener("DOMContentLoaded", function() {
    const btn = document.getElementById("exploreBtn");
    const card = document.getElementById("modulesCard");

    if (btn && card) {
        btn.addEventListener("click", function() {
            card.classList.toggle("d-none");

            if (card.classList.contains("d-none")) {
                btn.innerHTML = "Explore All Modules →";
            } else {
                btn.innerHTML = "Hide Modules ↑";
            }
        });
    }
});


/* for questionaire*/
 
console.log("EHS questionnaire loaded");
 
document.addEventListener("DOMContentLoaded", function() {
    console.log("DOM loaded");
 
    const totalSteps = document.querySelectorAll(".form-section").length || 6;
    let currentStep = 1;
 
    const progressBar = document.getElementById("progress-bar");
    const progressLabel = document.getElementById("progress-label");
    const diagForm = document.getElementById("diag-form");
    const thankyou = document.getElementById("thankyou");
 
    // ============================================
    // STEP NAVIGATION
    // ============================================
    function updateProgress() {
        const percent = (currentStep / totalSteps) * 100;
        if (progressBar) progressBar.style.width = percent + "%";
        if (progressLabel) progressLabel.textContent = `Section ${currentStep} of ${totalSteps}`;
    }
 
    window.goTo = function(step) {
        showStep(step);
    };
 
    function showStep(step) {
        document.querySelectorAll(".form-section").forEach(section => {
            section.classList.remove("active");
        });
 
        const target = document.getElementById(`s${step}`);
        if (target) {
            target.classList.add("active");
            currentStep = step;
            updateProgress();
 
            setTimeout(() => {
                target.scrollIntoView({
                    behavior: "smooth",
                    block: "start"
                });
            }, 100);
        }
    }
 
    // ============================================
    // FORM SUBMIT
    // ============================================
    window.submitForm = function() {
        const form =
            document.getElementById("ehsAssessmentForm") ||
            document.getElementById("diagnosticForm") ||
            document.querySelector("#diag-form form") ||
            document.querySelector("form");
 
        if (!form) {
            console.error("Form not found.");
            return;
        }
 
        let isValid = true;
 
        const nameInput = form.querySelector('input[name="name"]');
        const emailInput = form.querySelector('input[name="email"]');
 
        // Reset previous validation states
        [nameInput, emailInput].forEach(input => {
            if (input) {
                input.classList.remove("is-invalid", "is-valid");
            }
        });
 
        // Name validation
        if (nameInput) {
            const nameValue = nameInput.value.trim();
            const namePattern = /^[A-Za-z.'\-\s]+$/;
 
            if (!nameValue || nameValue.length < 3 || !namePattern.test(nameValue)) {
                nameInput.classList.add("is-invalid");
                isValid = false;
            } else {
                nameInput.classList.add("is-valid");
            }
        }
 
        // Email validation
        if (emailInput) {
            const emailValue = emailInput.value.trim();
            const emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
 
            if (!emailValue || !emailPattern.test(emailValue)) {
                emailInput.classList.add("is-invalid");
                isValid = false;
            } else {
                emailInput.classList.add("is-valid");
            }
        }
 
        // Stop submit if invalid
        if (!isValid) {
            return;
        }
 
        const formData = new FormData(form);
 
        fetch(form.action, {
                method: "POST",
                headers: {
                    "X-CSRF-TOKEN": document.querySelector('meta[name="csrf-token"]').getAttribute("content"),
                    "Accept": "application/json"
                },
                body: formData
            })
            .then(async response => {
                const data = await response.json();
 
                if (!response.ok) {
                    console.error("Validation/server error:", data);
                    alert("Name and Email are required.");
                    return;
                }
 
                if (data.success) {
                    // Hide all form sections
                    document.querySelectorAll(".form-section").forEach(section => {
                        section.classList.remove("active");
                        section.style.display = "none";
                    });
 
                    // Hide progress
                    if (progressBar) progressBar.style.width = "100%";
                    if (progressLabel) progressLabel.textContent = `Section ${totalSteps} of ${totalSteps}`;
 
                    // Show thank you block
                    if (thankyou) {
                        thankyou.style.display = "block";
                        thankyou.classList.add("active");
                    }
 
                    // Optional: reset form
                    form.reset();
 
                    // Reset dropdown labels
                    document.querySelectorAll(".custom-dropdown.single-select .dropdown-select").forEach(function(el) {
                        const parent = el.closest(".custom-dropdown");
                        const placeholder = parent ? parent.getAttribute("data-placeholder") : "Select option";
                        el.textContent = placeholder || "Select option";
                    });
 
                    document.querySelectorAll(".custom-dropdown.multi-select .dropdown-select").forEach(function(el) {
                        const parent = el.closest(".custom-dropdown");
                        const placeholder = parent ? parent.getAttribute("data-placeholder") : "Select options";
                        el.textContent = placeholder || "Select options";
                    });
 
                    document.querySelectorAll(".custom-dropdown .hidden-inputs").forEach(el => {
                        el.innerHTML = "";
                    });
                }
            })
            .catch(error => {
                console.error("Submit error:", error);
                alert("Something went wrong while submitting. Please try again.");
            });
    };
 
    window.submitAssessment = window.submitForm;
 
    // ============================================
    // CLOSE ALL DROPDOWNS
    // ============================================
    function closeAllDropdowns(except = null) {
        document.querySelectorAll(".custom-dropdown").forEach(drop => {
            if (drop !== except) {
                drop.classList.remove("open");
            }
        });
    }
 
    // ============================================
    // SINGLE SELECT DROPDOWNS
    // ============================================
    function initSingleSelects() {
        const singleDropdowns = document.querySelectorAll(".custom-dropdown.single-select");
 
        console.log("single-select found:", singleDropdowns.length);
 
        singleDropdowns.forEach(dropdown => {
            const trigger = dropdown.querySelector(".dropdown-select");
            const menu = dropdown.querySelector(".dropdown-menu-custom");
            const hiddenInput = dropdown.querySelector("input[type='hidden']");
            const options = dropdown.querySelectorAll(".dropdown-option");
 
            if (!trigger || !menu || !hiddenInput || !options.length) {
                console.warn("Single select missing structure:", dropdown);
                return;
            }
 
            trigger.addEventListener("click", function(e) {
                e.stopPropagation();
                closeAllDropdowns(dropdown);
                dropdown.classList.toggle("open");
            });
 
            options.forEach(option => {
                option.addEventListener("click", function(e) {
                    e.stopPropagation();
 
                    const value = option.getAttribute("data-value") || option.textContent.trim();
                    const text = option.textContent.trim();
 
                    hiddenInput.value = value;
                    trigger.textContent = text;
 
                    options.forEach(opt => opt.classList.remove("selected"));
                    option.classList.add("selected");
 
                    dropdown.classList.remove("open");
                });
            });
 
            menu.addEventListener("click", function(e) {
                e.stopPropagation();
            });
        });
    }
 
    // ============================================
    // MULTI SELECT DROPDOWNS
    // ============================================
    function initMultiSelects() {
        const multiDropdowns = document.querySelectorAll(".custom-dropdown.multi-select");
 
        console.log("multi-select found:", multiDropdowns.length);
 
        multiDropdowns.forEach(dropdown => {
            const trigger = dropdown.querySelector(".dropdown-select");
            const menu = dropdown.querySelector(".dropdown-menu-custom");
            const hiddenInputsWrap = dropdown.querySelector(".hidden-inputs");
            const checkboxes = dropdown.querySelectorAll("input[type='checkbox']");
            const placeholder = dropdown.getAttribute("data-placeholder") || "Select options";
            const inputName = dropdown.getAttribute("data-name") || "options[]";
            const limit = dropdown.classList.contains("limit-3") ? 3 : null;
 
            if (!trigger || !menu || !hiddenInputsWrap || !checkboxes.length) {
                console.warn("Multi select missing structure:", dropdown);
                return;
            }
 
            trigger.addEventListener("click", function(e) {
                e.stopPropagation();
                closeAllDropdowns(dropdown);
                dropdown.classList.toggle("open");
            });
 
            function updateMultiLabel() {
                const selected = Array.from(checkboxes)
                    .filter(cb => cb.checked)
                    .map(cb => {
                        const labelEl = cb.closest("label");
                        return labelEl ? labelEl.textContent.trim() : cb.value;
                    });
 
                if (selected.length === 0) {
                    trigger.textContent = placeholder;
                } else if (selected.length === 1) {
                    trigger.textContent = selected[0];
                } else if (selected.length === 2) {
                    trigger.textContent = selected.join(", ");
                } else {
                    trigger.textContent = `${selected.length} selected`;
                }
 
                // rebuild hidden inputs for Laravel
                hiddenInputsWrap.innerHTML = "";
                selected.forEach((_, index) => {
                    const checkedCb = Array.from(checkboxes).filter(cb => cb.checked)[index];
                    const input = document.createElement("input");
                    input.type = "hidden";
                    input.name = inputName;
                    input.value = checkedCb.value;
                    hiddenInputsWrap.appendChild(input);
                });
            }
 
            checkboxes.forEach(cb => {
                cb.addEventListener("change", function(e) {
                    e.stopPropagation();
 
                    if (limit) {
                        const checkedCount = Array.from(checkboxes).filter(x => x.checked).length;
                        if (checkedCount > limit) {
                            cb.checked = false;
                            return;
                        }
                    }
 
                    updateMultiLabel();
                });
 
                cb.addEventListener("click", function(e) {
                    e.stopPropagation();
                });
            });
 
            menu.querySelectorAll("label").forEach(label => {
                label.addEventListener("click", function(e) {
                    e.stopPropagation();
                });
            });
 
            menu.addEventListener("click", function(e) {
                e.stopPropagation();
            });
 
            updateMultiLabel();
        });
    }
 
    // ============================================
    // GLOBAL CLOSE
    // ============================================
    document.addEventListener("click", function() {
        closeAllDropdowns();
    });
 
    document.addEventListener("keydown", function(e) {
        if (e.key === "Escape") {
            closeAllDropdowns();
        }
    });
 
    // ============================================
    // SUCCESS STATE (Laravel session success)
    // ============================================
    const successFlag = document.body.getAttribute("data-ehs-success");
    if (successFlag === "1") {
        document.querySelectorAll(".form-section").forEach(section => {
            section.classList.remove("active");
        });
 
        if (thankyou) {
            thankyou.classList.add("active");
            thankyou.style.display = "block";
        }
 
        if (progressBar) progressBar.style.width = "100%";
        if (progressLabel) progressLabel.textContent = `Section ${totalSteps} of ${totalSteps}`;
    }
 
    // ============================================
    // INIT
    // ============================================
    initSingleSelects();
    initMultiSelects();
    updateProgress();
 
    if (!document.querySelector(".form-section.active")) {
        const first = document.getElementById("s1");
        if (first) first.classList.add("active");
    }
 
    /* ===========================
   HERO BUTTON SMOOTH SCROLL
=========================== */
    /* ===========================
       SMOOTH SCROLL BUTTONS
    =========================== */
    function smoothScrollTo(targetId, offset = 90) {
        const target = document.getElementById(targetId);
        if (!target) return;
 
        const targetPosition = target.getBoundingClientRect().top + window.pageYOffset - offset;
 
        window.scrollTo({
            top: targetPosition,
            behavior: "smooth"
        });
    }
 
    // All buttons that should scroll to diagnostic
    const diagnosticButtons = [
        document.getElementById("scrollToDiagnostic"),
        document.getElementById("scrollToDiagnostic2"),
        document.getElementById("scrollToDiagnostic3"),
        document.getElementById("scrollToDiagnostic4"),
 
    ];
 
    // Button for how it works
    const scrollToHowItWorksBtn = document.getElementById("scrollToHowItWorks");
 
    diagnosticButtons.forEach(btn => {
        if (btn) {
            btn.addEventListener("click", function(e) {
                e.preventDefault();
                smoothScrollTo("diagnostic");
            });
        }
    });
 
    if (scrollToHowItWorksBtn) {
        scrollToHowItWorksBtn.addEventListener("click", function(e) {
            e.preventDefault();
            smoothScrollTo("how-it-works");
        });
    }
});

document.addEventListener("DOMContentLoaded", function() {
    const backToTopWrapper = document.getElementById("backToTopWrapper");
 
    window.addEventListener("scroll", function() {
        if (window.scrollY > 150) {
            backToTopWrapper.style.display = "flex";
        } else {
            backToTopWrapper.style.display = "none";
        }
    });
 
    backToTopWrapper.addEventListener("click", function() {
        window.scrollTo({
            top: 0,
            behavior: "smooth"
        });
    });
 
    const progressCircle = document.querySelector('.progress-ring-fill');
 
    const radius = 26;
    const circumference = 2 * Math.PI * radius;
 
    progressCircle.style.strokeDasharray = circumference;
    progressCircle.style.strokeDashoffset = circumference;
 
    window.addEventListener('scroll', () => {
        const scrollTop = window.scrollY;
        const docHeight = document.documentElement.scrollHeight - window.innerHeight;
 
        if (docHeight <= 0) return;
 
        let scrollPercent = scrollTop / docHeight;
        scrollPercent = Math.max(0, Math.min(1, scrollPercent));
 
        const offset = circumference - (scrollPercent * circumference);
        progressCircle.style.strokeDashoffset = offset;
 
        /* 🔥 SHOW only when user scrolls */
        if (scrollTop > 10) {
            progressCircle.style.opacity = 1;
        } else {
            progressCircle.style.opacity = 0;
        }
    });
});