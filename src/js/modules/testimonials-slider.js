/*
*
* Script for testimonial slider
* require Tiny Slider plugin
*
*/

const { tns } = require("tiny-slider");

export const testimonialsSliderInit = () => {
    const sliders = Array.from(document.querySelectorAll('.testimonials-slider__wrapper'));

    if (sliders) {
        sliders.forEach(slider => {
            const sliderInit = tns({
                container: slider,
                items: 1,
                autoplay: false,
                controls: true,
                controlsPosition: "bottom",
                controlsText: ["", ""],
                autoplayButtonOutput: false,
                nav: false,
            })
        })
    }
}