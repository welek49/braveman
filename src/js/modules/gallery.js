/*
*
* Script for gallery
* need to work : https://photoswipe.com
*/

import PhotoSwipeLightbox from 'photoswipe/lightbox';

export const galleryInit = () => {

    const galleries = document.querySelectorAll('.bn-gallery-container');
    if (galleries) {
        galleries.forEach(gallery => {
            let lightbox = new PhotoSwipeLightbox({
                gallery: gallery,
                children: 'a',
                pswpModule: () => import('photoswipe')
            });

            lightbox.init();
        });
    }
}