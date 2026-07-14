gsap.registerPlugin(ScrollTrigger);

// function buildSiloConnectors() {

//     const wrapper = document.querySelector('.industry-silo-flow-wrapper');
//     const svg = document.querySelector('.industry-silo-svg');
//     const cards = document.querySelectorAll('.industry-silo-node');

//     if (!wrapper || !svg || cards.length < 2) return;

//     svg.innerHTML = '';

//     const wrapperRect = wrapper.getBoundingClientRect();

//     cards.forEach((card, index) => {

//         if (index === cards.length - 1) return;

//         const nextCard = cards[index + 1];

//         const rect1 = card.getBoundingClientRect();
//         const rect2 = nextCard.getBoundingClientRect();

//         const x1 = rect1.left + rect1.width / 2 - wrapperRect.left;
//         const y1 = rect1.top + rect1.height / 2 - wrapperRect.top;

//         const x2 = rect2.left + rect2.width / 2 - wrapperRect.left;
//         const y2 = rect2.top + rect2.height / 2 - wrapperRect.top;

//         const path = document.createElementNS(
//             'http://www.w3.org/2000/svg',
//             'path'
//         );

//         const curve = `
//             M ${x1} ${y1}
//             C ${(x1+x2)/2} ${y1},
//               ${(x1+x2)/2} ${y2},
//               ${x2} ${y2}
//         `;

//         path.setAttribute('d', curve);

//         path.setAttribute('fill', 'none');

//         path.setAttribute('stroke', index === cards.length - 2 ? '#ef4444' : '#2563eb');

//         path.setAttribute('stroke-width', '3');

//         path.setAttribute('stroke-linecap', 'round');

//         svg.appendChild(path);

//     });

//     animateSiloPaths();
// }

// function animateSiloPaths() {

//     gsap.utils.toArray('.industry-silo-svg path').forEach(path => {

//         const length = path.getTotalLength();

//         gsap.set(path, {

//             strokeDasharray: length,
//             strokeDashoffset: length

//         });

//         gsap.to(path, {

//             strokeDashoffset: 0,

//             duration: 1.3,

//             ease: 'power2.out',

//             scrollTrigger: {
//                 trigger: '.industry-silo-flow-wrapper',
//                 start: 'top 70%',
//                 once: true
//             }

//         });

//     });

//     gsap.fromTo('.industry-silo-node', {

//         y: 40,

//         opacity: 0,

//         duration: .8,

//         stagger: .08,

//         ease: 'power2.out',

//         scrollTrigger: {
//             trigger: '.industry-silo-flow-wrapper',
//             start: 'top 70%',
//             once: true
//         }

//     });
// }

// window.addEventListener('load', () => {

//     buildSiloConnectors();

// });

// window.addEventListener('resize', () => {

//     buildSiloConnectors();

// });
document.addEventListener("DOMContentLoaded", function() {

    const accordionItems = document.querySelectorAll('.industry-operation-accordion-item');

    if (!accordionItems.length) return;

    accordionItems.forEach((item) => {

        const header = item.querySelector('.industry-operation-accordion-header');

        header.addEventListener('click', function() {

            const body = item.querySelector('.industry-operation-accordion-body');
            const isActive = item.classList.contains('active');

            accordionItems.forEach((otherItem) => {

                if (otherItem !== item) {

                    const otherBody = otherItem.querySelector('.industry-operation-accordion-body');

                    otherItem.classList.remove('active');

                    gsap.to(otherBody, {
                        height: 0,
                        opacity: 0,
                        duration: 0.4,
                        ease: "power2.inOut"
                    });
                }
            });

            if (isActive) {

                item.classList.remove('active');

                gsap.to(body, {
                    height: 0,
                    opacity: 0,
                    duration: 0.4,
                    ease: "power2.inOut",
                    onComplete: () => {
                        body.style.display = "none";
                    }
                });

            } else {

                item.classList.add('active');

                body.style.display = "block";

                gsap.fromTo(body, {
                    height: 0,
                    opacity: 0
                }, {
                    height: body.scrollHeight,
                    opacity: 1,
                    duration: 0.45,
                    ease: "power2.out",
                    onComplete: () => {
                        body.style.height = "max-content";
                    }
                });
            }

        });

    });

});

document.addEventListener("DOMContentLoaded", function() {

    const panels = document.querySelectorAll(".industry-internal-panel");
    const prevBtn = document.querySelector(".industry-internal-nav-btn.prev");
    const nextBtn = document.querySelector(".industry-internal-nav-btn.next");
    const sliderContainer = document.querySelector(".industry-internal-slider-container");

    if (!panels.length) return;

    let currentIndex = 0;

    function moveSlider() {
        const activePanel = panels[currentIndex];
        const mask = document.querySelector(".industry-internal-slider-mask");

        if (!activePanel || !mask) return;

        const activeLeft = activePanel.offsetLeft;
        const activeWidth = activePanel.offsetWidth;
        const maskWidth = mask.offsetWidth;

        let translateX = activeLeft - ((maskWidth / 2) - (activeWidth / 2));

        const maxTranslate =
            sliderContainer.scrollWidth - maskWidth;

        if (translateX < 0) {
            translateX = 0;
        }

        if (translateX > maxTranslate) {
            translateX = maxTranslate;
        }

        sliderContainer.style.transform = `translateX(-${translateX}px)`;
    }

    function setActive(index) {
        panels.forEach(panel => panel.classList.remove("active"));

        panels[index].classList.add("active");

        currentIndex = index;

        setTimeout(() => {
            moveSlider();
        }, 50);
    }

    panels.forEach((panel, index) => {
        panel.addEventListener("click", () => {
            setActive(index);
        });
    });

    if (nextBtn) {
        nextBtn.addEventListener("click", () => {
            let next = currentIndex + 1;

            if (next >= panels.length) {
                next = 0;
            }

            setActive(next);
        });
    }

    if (prevBtn) {
        prevBtn.addEventListener("click", () => {
            let prev = currentIndex - 1;

            if (prev < 0) {
                prev = panels.length - 1;
            }

            setActive(prev);
        });
    }

});

document.addEventListener("DOMContentLoaded", function() {

    const panels = document.querySelectorAll(".industry-operation-panel");
    const prevBtn = document.querySelector(".industry-operations-nav-btn.prev");
    const nextBtn = document.querySelector(".industry-operations-nav-btn.next");
    const sliderContainer = document.querySelector(".industry-operations-slider-container");
    const mask = document.querySelector(".industry-operations-slider-mask");

    if (!panels.length) return;

    let currentIndex = 0;

    function moveSlider() {
        const activePanel = panels[currentIndex];

        if (!activePanel || !mask) return;

        const activeLeft = activePanel.offsetLeft;
        const activeWidth = activePanel.offsetWidth;
        const maskWidth = mask.offsetWidth;

        let translateX = activeLeft - ((maskWidth / 2) - (activeWidth / 2));

        const maxTranslate = sliderContainer.scrollWidth - maskWidth;

        translateX = Math.max(0, Math.min(translateX, maxTranslate));

        sliderContainer.style.transform = `translateX(-${translateX}px)`;
    }

    function setActive(index) {
        panels.forEach(panel => panel.classList.remove("active"));

        panels[index].classList.add("active");
        currentIndex = index;

        setTimeout(moveSlider, 50);
    }

    panels.forEach((panel, index) => {
        panel.addEventListener("click", () => setActive(index));
    });

    if (nextBtn) {
        nextBtn.addEventListener("click", () => {
            let next = currentIndex + 1;

            if (next >= panels.length) {
                next = 0;
            }

            setActive(next);
        });
    }

    if (prevBtn) {
        prevBtn.addEventListener("click", () => {
            let prev = currentIndex - 1;

            if (prev < 0) {
                prev = panels.length - 1;
            }

            setActive(prev);
        });
    }

});