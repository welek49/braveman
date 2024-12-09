/*
 *
 * Script for images slider
 * require Tiny Slider plugin
 *
 */

const { tns } = require("tiny-slider");

export const imagesSliderInit = () => {
    const imagesSliders = Array.from(
        document.querySelectorAll(".image-slider__slides")
    );

    if (imagesSliders) {
        imagesSliders.forEach((slider) => {
            const sliderInit = tns({
                container: slider,
                items: 1,
                autoplay: true,
                // uncomment for enable dots
                // nav: true,
                // navPosition: "bottom",
                nav: false,
                autoplayButtonOutput: false,
                mouseDrag: true,
                swipeAngle: false,
                controlsPosition: "bottom",
                controlsText: ["", ""],
                autoHeight: true,
                responsive: {
                    576: {
                        items: 2,
                        gutter: 20,
                    },
                    992: {
                        items: 3,
                        gutter: 20,
                    },
                    1200: {
                        items: 4,
                    },
                    1920: {
                        gutter: 40,
                    },
                },
            });
        });
    }
};
