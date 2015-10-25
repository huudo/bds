jQuery(document).ready(function(){
    var top_slider = $('.slide');
    top_slider.owlCarousel({
        autoPlay: true,
        items: 1,
        itemsDesktop: [1200, 1],
        itemsDesktopSmall: [992, 1],
        itemsTablet: [768, 1]
    });
    var list_partner = $('.list-partner');
    list_partner.owlCarousel({
        autoPlay: true,
        items: 7, //10 items above 1000px browser width
        itemsDesktop: [1000, 7], //5 items between 1000px and 901px
        itemsDesktopSmall: [900, 5], // betweem 900px and 601px
        itemsTablet: [600, 4], //2 items between 600 and 0
        itemsMobile: [480, 2] // itemsMobile disabled - inherit from itemsTablet option
    });
    var list_new = $('#list_news');
    list_new.owlCarousel({
        autoPlay: true,
        items: 4, //10 items above 1000px browser width
        itemsDesktop: [1000, 4], //5 items between 1000px and 901px
        itemsDesktopSmall: [900, 3], // betweem 900px and 601px
        itemsTablet: [600, 2], //2 items between 600 and 0
        itemsMobile: [480, 1] // itemsMobile disabled - inherit from itemsTablet option
    });
})