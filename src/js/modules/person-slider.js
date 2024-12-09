/*
*
* Script for person slider
* require Tiny Slider plugin
*
*/

const { tns } = require("tiny-slider");

export const personSliderInit = () => {
    const personSliders = Array.from(document.querySelectorAll('.person-slider__slides'));

    if (personSliders) {
        personSliders.forEach(slider => {
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
                autoHeight: true,
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