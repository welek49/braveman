/*
*
* Script for cookies popup
* require cookies.js from this themeplate
*
*/

const { setCookie, getCookie } = require("./cookies");

export const popup = () => {
    let c = getCookie("bn-popup");
    if (document.querySelector('.bn-popup')) {
        let popup = document.querySelector('.bn-popup');
        let window = popup.querySelector('.bn-popup__window');
        let close = popup.querySelector('.bn-popup__window--close');
        let btn = popup.querySelector('.bn-popup__window--button');

        close.addEventListener('click', e => {
            popup.classList.remove('--open');
            setCookie("bn-popup", 1, 1);
        });
        popup.addEventListener('click', e => {
            if (!window.contains(e.target)) {
                popup.classList.remove('--open');
                setCookie("bn-popup", 1, 1);
            }
        });
        btn.addEventListener('click', () => {
            setCookie("bn-popup", 1, 1);
            popup.classList.remove('--open');
        });

    }
}
