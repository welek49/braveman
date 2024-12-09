/*
*
* Script for posts slider
* require Tiny Slider plugin
*
*/

const { tns } = require("tiny-slider");

export const servicesSliderInit = () => {
    const sliders = Array.from(document.querySelectorAll('.services-slider__slides'));

    if (sliders) {
        sliders.forEach(slider => {
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
                controlsText: ['', ''],
                responsive: {
                    576: {
                        items: 2,
                        gutter: 20
                    },
                    992: {
                        items: 3,
                        gutter: 20
                    },
                    1200: {
                        items: 4
                    },
                    1920: {
                        gutter: 40
                    }
                }
            })
        })
    }
}