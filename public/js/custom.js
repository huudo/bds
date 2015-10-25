$(document).ready(function () {

    $("#partner").owlCarousel({
        items: 7,
        itemsCustom: false,
        itemsDesktop: [1199, 4],
        itemsDesktopSmall: [980, 3],
        itemsTablet: [768, 2],
        itemsTabletSmall: false,
        itemsMobile: [479, 2],
        singleItem: false,
        itemsScaleUp: false,
        rewindNav: true,
        scrollPerPage: false,
        responsive: true,
        responsiveRefreshRate: 200,
        responsiveBaseWidth: window,
    });
});