/*
 *
 * Script for dropdown menus
 *
 */

export const dropdownMenus = () => {
    const menuMobileBreakpoint = getComputedStyle(document.documentElement)
        .getPropertyValue("--breakpoint-menu-mobile")
        .trim();

    const dropdowns = Array.from(
        document.querySelectorAll(".menu-item-has-children")
    );

    if (dropdowns) {
        dropdowns.forEach((dropdown) => {
            dropdown.addEventListener("click", (e) => {
                if (e.target === e.currentTarget) {
                    if (
                        !window.matchMedia(
                            `(min-width: ${menuMobileBreakpoint})`
                        ).matches
                    ) {
                        e.preventDefault();
                        dropdown.classList.toggle("--active");
                        const subMenu = dropdown.querySelector(".sub-menu");
                        subMenu.classList.toggle("--active");

                        if (subMenu.classList.contains("--active")) {
                            subMenu.style.height = subMenu.scrollHeight + "px";
                        } else {
                            subMenu.style.height = "0";
                        }
                    }
                }
            });
        });
    }
};
