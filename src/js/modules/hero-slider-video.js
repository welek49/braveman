/*
*
* Script for hero slider video
*
*/

export const heroSliderVideoInit = () => {
    const videos = Array.from(document.querySelectorAll('.hero-slider__video'));

    if (videos) {
        videos.forEach(video => {
            const videoSrc = video.querySelector('.hero-slider__video-source');

            if (window.matchMedia('(min-width: 992px)').matches) {
                videoSrc.src = videoSrc.dataset.src;
                video.load();
            } else {
                videoSrc.src = videoSrc.dataset.mobile;
                video.load();
            }
        })
    }
}

export const heroSliderVideoResize = () => {
    const videos = Array.from(document.querySelectorAll('.hero-slider__video'));

    if (videos) {
        videos.forEach(video => {
            const videoSrc = video.querySelector('.hero-slider__video-source');

            if (window.matchMedia('(min-width: 992px)').matches) {
                videoSrc.src = videoSrc.dataset.src;
                video.load();
            } else {
                videoSrc.src = videoSrc.dataset.mobile;
                video.load();
            }
        })
    }
}