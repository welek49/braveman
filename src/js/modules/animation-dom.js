/*
*
* Script for animation DOM on scroll
*
*/

const animationDOM = el => {
    let scroll = window.scrollY || window.pageYOffset
    let margin = 100;

    [...el].forEach(ele => {
        let boundsTop = ele.getBoundingClientRect().top + scroll
        let viewport = {
            top: scroll,
            bottom: scroll + window.innerHeight,
        }
        let bounds = {
            top: boundsTop + margin,
            bottom: boundsTop + ele.clientHeight - margin,
        }
        if ((bounds.bottom >= viewport.top && bounds.bottom <= viewport.bottom)
            || (bounds.top <= viewport.bottom && bounds.top >= viewport.top)) {
            ele.classList.add('in-view');
        }
    });
}

export const animationDOMinit = () => {
    animationDOM(document.querySelectorAll('.show-on'));
    animationDOM(document.querySelectorAll('.show-on__after'));
}