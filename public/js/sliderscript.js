const panels = document.querySelectorAll(".panel");
const container = document.querySelector(".slider-container");
const prevBtn = document.querySelector(".nav-btn.prev");
const nextBtn = document.querySelector(".nav-btn.next");
let currentIndex = 0;
let isAnimating = false;

function centerPanel(panel) {

    const containerWidth = container.clientWidth;
    const panelWidth = panel.offsetWidth;

    let scrollPosition =
        panel.offsetLeft -
        (containerWidth / 2) +
        (panelWidth / 2);

    const maxScroll =
        container.scrollWidth - container.clientWidth;

    scrollPosition = Math.max(
        0,
        Math.min(scrollPosition, maxScroll)
    );

    container.scrollTo({
        left: scrollPosition,
        behavior: "smooth"
    });
}

function activatePanel(index) {
    if (isAnimating) return;
    index = Math.max(0, Math.min(index, panels.length - 1));
    currentIndex = index;
    isAnimating = true;
    panels.forEach(panel => { panel.classList.remove("active"); });
    panels[currentIndex].classList.add("active");
    centerPanel(panels[currentIndex]);
    updateButtons();
    setTimeout(() => { isAnimating = false; }, 500);
}

function updateButtons() {
    prevBtn.disabled = currentIndex === 0;
    nextBtn.disabled = currentIndex === panels.length - 1;
}
prevBtn.addEventListener("click", () => {
    activatePanel(currentIndex - 1);
    const panel = document.querySelector('.panel.active');


});
nextBtn.addEventListener("click", () => {
    activatePanel(currentIndex + 1);
    const panel = document.querySelector('.panel.active');


});
panels.forEach(panel => {
    const bg = panel.dataset.bg;

    if (bg) {
        panel.style.backgroundImage = `url('${bg}')`;
        panel.style.backgroundSize = "cover";
        panel.style.backgroundPosition = "center";
        panel.style.backgroundRepeat = "no-repeat";
    }
});
panels.forEach((panel, index) => {
    panel.addEventListener("click", () => {
        activatePanel(index);
        const panel = document.querySelector('.panel.active');


    });
});
window.addEventListener("keydown", e => { if (e.key === "ArrowLeft") { activatePanel(currentIndex - 1); } if (e.key === "ArrowRight") { activatePanel(currentIndex + 1); } });
window.addEventListener("resize", () => { centerPanel(panels[currentIndex]); });
window.addEventListener("load", () => {
    activatePanel(0);
});