const { tns } = require("tiny-slider");

export const logotypesList = () => {
    const logoSliders = Array.from(
        document.querySelectorAll(".logotypes-list__slider")
    );

    if (logoSliders) {
        logoSliders.forEach((slider) => {
            const sliderInit = tns({
                container: slider,
                items: 1,
                autoplay: true,
                nav: false,
                autoplayButtonOutput: false,
                mouseDrag: true,
                swipeAngle: false,
                controlsPosition: "bottom",
                controlsText: ["", ""],
                autoHeight: true,
                responsive: {
                    576: {
                        items: 3,
                        gutter: 20,
                    },
                    992: {
                        items: 4,
                        gutter: 20,
                    },
                    1200: {
                        items: 6,
                    },
                    1920: {
                        gutter: 40,
                    },
                },
            });
        });
    }
};
