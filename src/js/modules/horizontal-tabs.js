/*
*
* Script for horizontal tabs
*
*/

export const horizontalTabs = () => {

    /*
    *
    * update tabs content by enable/disable elements with class
    *
    */
    function updateTabs(key, tabNav) {
        [...tabNav.querySelectorAll(".horizontal-tabs-tab")].forEach(el => {
            if (el.dataset.tab == key) {
                el.classList.add("--show");
            } else {
                el.classList.remove("--show");
            }
        });
    }

    /*
    *
    * update actual navs by changing class
    *
    */
    function updateNav(key, tabNavButtons) {
        [...tabNavButtons].forEach(button => {
            if (button.dataset.tabNav == key) {
                button.classList.add("btn-flat-primary");
                button.classList.remove("btn-flat-secondary");
            } else {
                button.classList.remove("btn-flat-primary");
                button.classList.add("btn-flat-secondary");
            }
        });
    }

    if (document.querySelector(".horizontal-tabs")) { // if at least one exists

        [...document.querySelectorAll(".horizontal-tabs")].forEach(htab => {

            let tabNav = htab;
            let tabNavButtons = tabNav.querySelectorAll("span[data-tab-nav]");
            let tabSelect = tabNav.querySelector("select");

            if (tabNav) {
                tabNav.addEventListener('click', (e) => {
                    if (e.target.getAttribute("data-tab-nav")) {

                        updateNav(e.target.dataset.tabNav, tabNavButtons);

                        updateTabs(e.target.dataset.tabNav, tabNav);

                        tabSelect.value = e.target.dataset.tabNav;

                    }
                });
                tabSelect.addEventListener('change', (e) => {

                    updateNav(e.target.value, tabNavButtons);

                    updateTabs(e.target.value, tabNav);

                });
            }
        });
    }
}