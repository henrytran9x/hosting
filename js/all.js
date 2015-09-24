(function($) {
    $(function() {
        $('.jv-checkdomain .dropdown-menu').on({
            "click": function(e) {
                e.stopPropagation();
            }
        });
        $(".portfolio-item").each(function() { // the containers for all your galleries
            $(this).magnificPopup({
                delegate: ".portfolio-imgpopup", // the selector for gallery item
                type: "image",
                mainClass: "my-mfp-zoom-in",
                removalDelay: 160,
                preloader: false,
                gallery: {
                    enabled: true
                }
            });
        });
        $(".btn-quickview").magnificPopup({
            type: "iframe",
            mainClass: "my-mfp-zoom-in portfolio",
            removalDelay: 160,
            preloader: false,
            closeBtnInside: true
        });
        $('.popup-video').magnificPopup({
            type: 'iframe',
            mainClass: 'my-mfp-zoom-in',
            removalDelay: 160,
            preloader: false,
            fixedContentPos: false
        });
        wow = new WOW({
            animateClass: 'animated',
            mobile: false,
            offset: 150
        });
        wow.init();


        /** max height feature jvpricing-item in front */
        var max_height = 0 ;
        $('.jvpricing-item.line_row').each(function(index, el) {
                item = $(this)
                if($(this).height() > max_height)
                {
                    max_height = $(this).height();
                }
        });
        $('.jvpricing-item.line_row').height(max_height);

        var max_row = 0;
        var output_item = '<div class="item">&nbsp;</div>';
        $('.jvpricing-item.line_row .jvpricing-content').each(function(index, el) {
            if ($(this).children('.item').length > max_row) {
                max_row = $(this).children('.item').length;
            }
        });
        
            $('.jvpricing-item.line_row .jvpricing-content').each(function(index, el) {
                if ($(this).children('.item').length < max_row) {
                    var number_du = max_row - $(this).children('.item').length;
                    for ($i = 1; $i <= number_du; $i++) {
                        $(this).append(output_item);
                    }
                }
            });
        
        // move erro newsletter after button subscribe
        $('#newsletter-error').insertAfter('#subscribe');
        /** mobile devices  */

        clone_main_menu_mobile();

    });

    function resize_slider_revolution() {
        var item_width = $(window).width();
        var item_height = $(window).height();
        if (item_width <= 460) {
            $('.block-art-revolution').height(item_height);
        }
    }
    function offcanvas_menu_mobile()
    {
        $('#offcanvas .mdtoggle-sub').click(function(event) {
            var sub_main = $(this).next().next();
            if(sub_main.is(":visible") != true)
            {
                sub_main.slideDown();
            }
            else
            {
                sub_main.slideUp();
            }
        });



    }
    function clone_main_menu_mobile() {
        if ($('#section-navigation .block-md-megamenu').length > 0) {
            var this_menu = $(this).children('.megamenu');
            var clone_menu = function() {
                var output = '';
                output += '<div id="offcanvas" class="uk-offcanvas" aria-hidden="true">';
                output += '<div class="uk-offcanvas-bar">';
                output += '<div class="uk-panel">';
                output += '<h3 class="menu-mobile-header">Main menu</h3>';
                output += '</div>';
                output += '</div>';
                output += '</div>';
                $('.dexp-body-inner').after(output);
                $('#section-navigation .block-md-megamenu .megamenu').clone().appendTo($('#offcanvas .uk-panel'));
                $('.block-mod-block-login .content').append('<a class="btn btn-outline btn-sm btn-canvas" href="#offcanvas" data-uk-offcanvas=""><span></span><span></span><span></span></a>');
                $('#offcanvas .mm-item-1 > a').text('Home');

            };
            var window_size = function() {
                var c = function() {
                    if ($(window).width() < 992) {
                        if (!$('#offcanvas').length) {
                            clone_menu();
                              offcanvas_menu_mobile();
                        }
                    } else {
                        $('#offcanvas').remove();
                         $('.block-mod-block-login .content .btn-canvas').remove();
                    }
                };
                c();
                $(window).resize(function() {
                    c();
                });
            };
            window_size();
        }
    }
}(jQuery));
