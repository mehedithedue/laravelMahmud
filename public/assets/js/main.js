(function ($) {
    "use strict";
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
                        { scrollTop: target.offset().top -40}, 1000
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
    $("#service").backstretch("assets/img/bg_service.jpg");
    

    /*-------------------
     mixitup
     -------------------*/
    var containerEl = document.querySelector('.mixitup_container');
    var mixer = mixitup(containerEl);



})(jQuery);