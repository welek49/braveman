/*
*
* Script for video popup
*
*/


export const videoPopup = () => {

    const videoButtons = document.querySelectorAll('.bn-video__cover--button');
    const footer = document.querySelector('.footer');
    let videosPopup = null;

    const preFrame = '<iframe src="';
    const afterFrame = '" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen=""></iframe>';

    if (videoButtons) {
        footer.insertAdjacentHTML('beforebegin', '<div class="bn-video__popup"></div>');
        videosPopup = document.querySelector('.bn-video__popup');
    }

    if (videosPopup && videoButtons) {
        videoButtons.forEach(button => {
            button.addEventListener('click', () => {
                videosPopup.classList.add('--active');
                videosPopup.innerHTML = preFrame + button.dataset.video + afterFrame;
                videosPopup.addEventListener('click', e => {
                    if (e.target === e.currentTarget) {
                        videosPopup.classList.remove('--active');
                        videosPopup.innerHTML = '';
                    }
                })
            })
        });

        document.addEventListener('keydown', e => {
            if (e.key === 'Escape') {
                if (videosPopup.classList.contains('--active')) {
                    videosPopup.classList.remove('--active');
                    videosPopup.innerHTML = '';
                }
            }
        });
    }
}