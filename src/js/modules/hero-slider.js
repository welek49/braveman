/*
*
* Script for hero sldier
* require Tiny Slider plugin
*
*/

const { tns } = require("tiny-slider");
export const heroSliderInit = () => {
    const sliders = Array.from(document.querySelectorAll('.hero-slider__slides'));

    if (sliders) {
        sliders.forEach(slider => {
            const sliderInit = tns({
                container: slider,
                items: 1,
                autoplay: true,
                controls: false,
                autoplayButtonOutput: false,
                mode: 'gallery',
                nav: false,
                autoplayTimeout: 5000,
            })
        })
    }
}
