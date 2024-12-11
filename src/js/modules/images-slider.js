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
        let counter = 0;
        let sliders = [];
        imagesSliders.forEach((slider) => {
            sliders += tns({
                container: slider,
                items: 1,
                autoplay: true,
                center: true,
                // uncomment for enable dots
                // nav: true,
                // navPosition: "bottom",
                nav: false,
                autoplayButtonOutput: false,
                mouseDrag: true,
                swipeAngle: false,
                controlsPosition: "bottom",
                controlsText: ["", ""],
                autoHeight: true
            });

            counter++;
        });
    }
};
