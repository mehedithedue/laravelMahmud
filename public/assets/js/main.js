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
        } else {
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
                    {scrollTop: target.offset().top - 40}, 1000
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
    $("#quote").backstretch("assets/img/bg_service.jpg");


    /*-------------------
     mixitup
     -------------------*/
    var containerEl = document.querySelector('.mixitup_container');
    var mixer = mixitup(containerEl);
    var limit = 16;
    var offset = 0


    $('#navbar ul.navbar-nav li a').on('click', function () {
        if ($('#navbar').hasClass('in')) {
            $('button.navbar-toggle').click();
        };
    });


    getPortfolioItem(limit, offset, '.mixitup_container #mixitup_container_elements', mixer, containerEl)

    $('.loadmore').on('click', function (event) {
        offset = offset + limit;
        limit = 4;

        var btn = $(this);
        var btn_content = btn.html();
        btn.html('<i class="fa fa-spinner fa-spin"></i>&nbsp;&nbsp;'+' Loading .....');
        btn.prop('disabled',true);

        //getPortfolioItem(limit, offset, '.mixitup_container #mixitup_container_elements', mixer, containerEl)
        setTimeout(function(){
            getPortfolioItem(limit, offset, '.mixitup_container #mixitup_container_elements', mixer, containerEl);
            btn.html(btn_content);
            btn.prop('disabled', false);
        }, 1000);

    });

})(jQuery);

function getPortfolioItem(limit, offset, appendToId, mixer,containerEl) {

    $.getJSON(fullPath + 'get-portfolio-item', {limit: limit, offset: offset})
        .done(function (response) {
            $(appendToId).append(response.html);
            mixer.destroy();
            mixitup(containerEl);
        })
        .fail(function (jqxhr, textStatus, error) {
            var err = textStatus + ", " + error;
            console.log("Request Failed: " + err);
        });
}