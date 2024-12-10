const { postsSliderInit } = require("./modules/posts-slider");
const { imagesSliderInit } = require("./modules/images-slider");
const { personSliderInit } = require("./modules/person-slider");
const { navMobile } = require("./modules/nav-mobile");
const { dropdownMenus } = require("./modules/dropdown-menus");
const { faq } = require("./modules/faq");
const { popup } = require("./modules/popup");
const { testimonialsSliderInit } = require("./modules/testimonials-slider");
const { galleryInit } = require("./modules/gallery");
const { lightBoxInit } = require("./modules/lightbox");
const { videoPopup } = require("./modules/video");
const { numbersTileCounter } = require("./modules/numbers-tile");
const { servicesSliderInit } = require("./modules/services-slider");
const { heroSliderInit } = require("./modules/hero-slider");
const { heroSliderVideoInit, heroSliderVideoResize } = require("./modules/hero-slider-video");
const { horizontalTabs } = require("./modules/horizontal-tabs");
const { animationDOMinit } = require("./modules/animation-dom");
const { navFixed } = require("./modules/nav-fixed");
const { contentFolding } = require("./modules/content-folding");
const { readMore } = require("./modules/read-more");
const { logotypesList } = require("./modules/logotypes-list");
const { sparks } = require("./modules/sparks");

document.addEventListener("DOMContentLoaded", () => {
    /* Add exported functions here, will be loaded after dom */

    AOS.init({
        offset: 80, // offset (in px) from the original trigger point
        duration: 1200,
    });
    postsSliderInit();
    imagesSliderInit();
    personSliderInit();
    navMobile();
    dropdownMenus();
    faq();
    popup();
    testimonialsSliderInit();
    galleryInit();
    lightBoxInit();
    videoPopup();
    numbersTileCounter();
    servicesSliderInit();
    heroSliderInit();
    heroSliderVideoInit();
    horizontalTabs();
    animationDOMinit();
    navFixed();
    readMore();
    logotypesList();
    sparks();
    contentFolding(
        "map-with-locations__locations--mobile",
        "map-with-locations__locations-list",
        "map-with-locations__open-button "
    );

    window.addEventListener("scroll", () => {
        /* Add exported functions here, will be loaded on scroll */
        animationDOMinit();
        navFixed();
    });

    window.addEventListener("resize", () => {
        /* Add exported functions here, will be loaded on resize */
        heroSliderVideoResize();
    });
});
