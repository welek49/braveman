/*
 *
 * Script for mobile navigation (hamburger)
 *
 */

function disableScrolling() {
    document.documentElement.classList.add("--scroll-disabled");
}

function enableScrolling() {
    document.documentElement.classList.remove("--scroll-disabled");
}

export const navMobile = () => {
    const hamburger = document.querySelector(".header__hamburger");
    const menu = document.querySelector(".header__nav");

    if (hamburger) {
        hamburger.addEventListener("click", (e) => {
            menu.classList.toggle("--open");
            hamburger.classList.toggle("--open");

            if (menu.classList.contains("--open")) {
                disableScrolling();
            } else {
                enableScrolling();
            }
        });
    }
    if (menu) {
        menu.addEventListener("click", (e) => {
            if (
                e.target.tagName.toLowerCase() == "a" &&
                window.getComputedStyle(hamburger, null).display !== "none"
            ) {
                // close menu after click link(for # purpose)

                menu.classList.toggle("--open");
                hamburger.classList.toggle("--open");
                if (menu.classList.contains("--open")) {
                    disableScrolling();
                } else {
                    enableScrolling();
                }
            }
        });
    }
};
