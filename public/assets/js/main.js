(function ($) {
    "use strict";

    /*----------------------------
     jQuery MeanMenu
     ------------------------------ */
//    jQuery('nav#dropdown').meanmenu();

    /*----------------------------
     wow js active
     ------------------------------ */
//    new WOW().init();


    /*----------------------------
     price-slider active
     ------------------------------ */
//    $("#slider-range").slider({
//        range: true,
//        min: 40,
//        max: 600,
//        values: [60, 570],
//        slide: function (event, ui) {
//            $("#amount").val("�" + ui.values[0] + " - �" + ui.values[1]);
//        }
//    });
//    $("#amount").val("�" + $("#slider-range").slider("values", 0) +
//        " - �" + $("#slider-range").slider("values", 1));

    /*--------------------------
     scrollUp
     ---------------------------- */
    $.scrollUp({
        scrollText: '<i class="fa fa-angle-up"></i>',
        easingType: 'linear',
        scrollSpeed: 900,
        animation: 'fade'
    });

    /*-------------------
     Header Animation
     -------------------*/

    $(window).on('scroll', function () {
        if ($(this).scrollTop() > 50) {
            $('.before').addClass("navbar-default");
            $('.before').removeClass("menu-item");
        }
        else {
            $('.before').removeClass("navbar-default");
            $('.before').addClass("menu-item");
        }
    });

    /*-----------------------------
     Smooth Scroll On Anchor Tag
     -----------------------------*/

    $('.scroll-to a[href*=\\#]:not([href=\\#])').on('click', function () {
        if (location.pathname.replace(/^\//, '') == this.pathname.replace(/^\//, '') && location.hostname == this.hostname) {
            var target = $(this.hash);
            target = target.length ? target : $('[name=' + this.hash.slice(1) + ']');
            if (target.length) {
                $('html,body').animate(
                        { scrollTop: target.offset().top -50}, 1000
                        );
                return false;
            }
        }
    });

    /*-------------------
     Backstretch
     -------------------*/

    //Image Background
    $(".with-background").backstretch("assets/img/bg.jpg");
    


})(jQuery);