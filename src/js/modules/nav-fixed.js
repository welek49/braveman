/*
*
* Script for fixed navigation
*
*/

export const navFixed = () => {

    const nav = document.querySelector(".header");

    if (window.pageYOffset > 700) {
        nav.classList.add("--fixed");
    } else {
        nav.classList.remove("--fixed");
    }

}