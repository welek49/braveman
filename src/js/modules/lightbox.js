/*
*
* Script for gallery
* need to work : https://photoswipe.com
*/

import PhotoSwipeLightbox from 'photoswipe/lightbox';

export const lightBoxInit = () => {

    const figures = document.querySelectorAll('figure');
    if (figures) {
        figures.forEach(figure => {
            let lightbox = new PhotoSwipeLightbox({
                gallery: figure,
                children: 'a',
                pswpModule: () => import('photoswipe')
            });

            lightbox.init();
        });
    }

    const images = document.querySelectorAll('.bn');
}