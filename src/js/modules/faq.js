/*
*
* Script for faq tabs
*
*/

export const faq = () => {
    if (document.querySelector('.faq-list')) {
        [...document.querySelectorAll('.faq-list__tab')].forEach(el => {
            el.addEventListener('click', (e) => { //add listener for every tab
                e.currentTarget.classList.toggle('--open');
            });

        });
    }

}