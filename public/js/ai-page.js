gsap.registerPlugin(ScrollTrigger, MotionPathPlugin);

gsap.utils.toArray(".ai-problem-card").forEach((card, index) => {

    gsap.fromTo(card,

        {
            opacity: 0,
            x: index % 2 === 0 ? -100 : 100,
            y: 40
        },

        {
            opacity: 1,
            x: 0,
            y: 0,

            duration: 1,

            ease: "power3.out",

            scrollTrigger: {
                trigger: card,
                start: "top 85%"
            }
        }

    );

});

gsap.to(".ai-problem-footer", {

    opacity: 1,

    y: 0,

    duration: 1,

    scrollTrigger: {
        trigger: ".ai-problem-footer",
        start: "top 90%"
    }
});

if (window.innerWidth >= 1120) {

    const cards = gsap.utils.toArray(".capability-card");

    const positions = [
        { x: -360, y: -130 },
        { x: 0, y: -130 },
        { x: 360, y: -130 },

        { x: -360, y: 130 },
        { x: 0, y: 130 },
        { x: 360, y: 130 }
    ];


    cards.forEach((card, index) => {

        gsap.set(card, {
            x: 0,
            y: 0,
            rotate: 0,
            zIndex: cards.length - index
        });
    });

    const tl = gsap.timeline({
        scrollTrigger: {

            trigger: ".capabilities-section",
            start: "top 15%",

            toggleActions: "play none none none",
            markers: false
        }
    });

    cards.forEach((card, index) => {
        tl.to(card, {
            x: positions[index].x,
            y: positions[index].y,
            duration: 1,
            ease: "back.out(1.6)"
        }, index * 0.08);
    });

}

const humanTl = gsap.timeline({
    scrollTrigger: {
        trigger: ".human-loop-section",
        start: "top 60%"
    }
});

humanTl
    .from(".ai-card", {
        y: -80,
        opacity: 0,
        duration: 0.8
    })
    .from(".flow-line:first-of-type", {
        scaleY: 0,
        transformOrigin: "top center",
        duration: 0.5
    })
    .from(".decision-gate", {
        scale: 0.8,
        opacity: 0,
        duration: 0.8
    })
    .from(".decision-btn", {
        y: 30,
        opacity: 0,
        stagger: 0.15
    })
    .from(".audit-card", {
        y: 80,
        opacity: 0
    });
gsap.to(".decision-gate", {
    boxShadow: "0 0 80px rgba(13,110,253,.65)",
    repeat: -1,
    yoyo: true,
    duration: 2
});

// section 5 design
gsap.to(".network-line", {

    strokeDashoffset: 0,

    stagger: 0.15,

    duration: 1.5,

    ease: "power2.out",

    scrollTrigger: {
        trigger: ".ai-connected-section",
        start: "top 60%"
    }

});
gsap.from(".module", {

    scale: 0,

    opacity: 0,

    duration: 1,

    stagger: 0.1,

    ease: "back.out(1.8)",

    scrollTrigger: {
        trigger: ".ai-connected-section",
        start: "top 60%"
    }

});
gsap.from(".ai-core", {

    scale: 0,

    opacity: 0,

    duration: 1.2,

    ease: "elastic.out(1,0.6)",

    scrollTrigger: {
        trigger: ".ai-connected-section",
        start: "top 60%"
    }

});
gsap.from(".benefit-card", {

    y: 60,

    opacity: 0,

    stagger: 0.15,

    duration: 0.8,

    scrollTrigger: {
        trigger: ".benefit-card",
        start: "top 85%"
    }

});
const connections = [
    ["#dot1", "#line1"],
    ["#dot2", "#line2"],
    ["#dot3", "#line3"],
    ["#dot4", "#line4"],
    ["#dot5", "#line5"],
    ["#dot6", "#line6"],
    ["#dot7", "#line7"],
    ["#dot8", "#line8"]
];

connections.forEach(([dot, path], index) => {

    gsap.to(dot, {

        motionPath: {
            path: path,
            align: path,
            autoRotate: false,
            alignOrigin: [0.5, 0.5],
            start: 1,
            end: 0
        },

        duration: 2.5,

        repeat: -1,

        ease: "none",

        delay: index * 0.15

    });

});


gsap.from(".ai-module-flow-card", {
    scrollTrigger: {
        trigger: ".ai-module-human-loop",
        start: "top 70%"
    },
    scale: .7,
    opacity: 0,
    stagger: .2
});

gsap.from(".ai-module-trust-item", {
    scrollTrigger: {
        trigger: ".ai-module-human-loop",
        start: "top 70%"
    },
    x: 40,
    opacity: 0,
    stagger: .12
});



const stripAnimation = gsap.to(".ai-module-track", {
    xPercent: -50,
    duration: 35,
    ease: "none",
    repeat: -1
});

const strip = document.querySelector(".ai-module-strip");

if (strip) {

    strip.addEventListener("mouseenter", () => {
        stripAnimation.pause();
    });

    strip.addEventListener("mouseleave", () => {
        stripAnimation.resume();
    });

}