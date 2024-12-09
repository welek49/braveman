/*
*
* Script for posts slider
* require Tiny Slider plugin
*
*/

const { tns } = require("tiny-slider");

export const postsSliderInit = () => {
    const postsSliders = Array.from(document.querySelectorAll('.post-slider'));

    if (postsSliders) {
        postsSliders.forEach(slider => {
            const sliderInit = tns({
                container: slider,
                items: 1,
                controls: false,
                navPosition: "bottom",
                mouseDrag: true,
                swipeAngle: false,
                autoplay: true,
                autoplayButtonOutput: false,
                nav: true,
                responsive: {
                    576: {

                        items: 2,
                    },
                    992: {
                        items: 3,
                    }
                }
            })
        })
    }
}