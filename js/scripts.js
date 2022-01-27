jQuery(document).ready(function ($) {
    "use strict";

    /* Lazy Loading */
    $('.lazy').Lazy({
        effect: "fadeIn",
        effectTime: 500,
        threshold: 1500,
    });


    // Mobile cart link
    $('header.primary-mobile .sh-nav-cart-content').on( 'click', function(){
        if( $(this).parent().attr('href') ) {
            window.location.href = $(this).parent().attr('href');
        }
    });


    /* Mobile Classic - Navigation Render */
    if( $('.sh-header-right-side .sh-nav-mobile').length ) {
        $('.primary-mobile .sh-nav-mobile').html( $('.sh-header-right-side .sh-nav-mobile').html() );
    } else if( $('.sh-header-left-side .sh-nav').length ) {
        $('.primary-mobile .sh-nav-mobile').html( $('.sh-header-left-side .sh-nav').html() );
    } else {
        $('.primary-mobile .sh-nav-mobile').html( $('.primary-desktop #header-navigation .sh-nav').html() );
    }
    $('.primary-mobile .sh-nav-mobile > li.sh-nav-special').remove();


    /* Header Builder - Mobile Navigation Render */
    if( $('.sh-header-builder').length ) {
        $('.sh-header-builder').each( function() {
            var nav_html = '';
            $(this).find( '.sh-header-builder-main-element-navigation .sh-nav' ).each( function() {
                nav_html = nav_html + $(this).html();
            });

            $(this).find('.sh-nav-mobile').html( nav_html );

        });
    }

    $('.sh-header-builder-mobile-menu').on('click', function(e) {
        /*$(this).closest('.sh-header-builder-mobile').find('.sh-header-mobile-dropdown').toggle();*/

        $(this).closest('.sh-header-builder-mobile').find('.sh-header-mobile-dropdown').stop(true, true).slideToggle( 300, 'linear' );

        var menu = $(this).find(".c-hamburger");
        if( menu.hasClass("is-active") === true ) {
            menu.removeClass("is-active");
        } else {
            menu.addClass("is-active");
        }
    });


    /* Mobile header dropdown (close if needed) */
    setTimeout(function(){
        if( $(document).width() < 1025 ) {
            $('.primary-desktop .sh-nav ul.sub-menu, .sh-header-builder-main ul.sub-menu').css('display', 'none');
        }
    }, 50);
    function jevelin_header_dropdown() {
        if ($(document).width() > 1025) {
            $('.sh-header-mobile-dropdown').hide();
        }

        if ($(document).width() < 1025) {
            $('body').removeClass('page-layout-right-fixed');
            $('.primary-desktop ul.sub-menu, .sh-header-builder-main ul.sub-menu').css( 'display', 'none' );
            $('.sh-sticky-mobile-header .sh-header-mobile-dropdown').css( 'overflow', 'auto' );
            if( $('#wpadminbar').length ) {
                $('.sh-sticky-mobile-header .sh-header-mobile-dropdown').css( 'max-height',  $(window).height() - $('.sh-header-mobile-navigation').height() - $('#wpadminbar').height() );
            } else {
                $('.sh-sticky-mobile-header .sh-header-mobile-dropdown').css( 'max-height',  $(window).height() - $('.sh-header-mobile-navigation').height() );
            }
        }
    }
    jevelin_header_dropdown();


    /* Header navigation position fix */
    function jevelin_navigation_position() {
        var new_position, menu_status, menu_width, menu_offset, window_width;
        window_width = $(document).width();
        $('ul.sh-nav ul').mouseover(function() {

            menu_status = $(this).find('.sub-menu').length;
            if( menu_status > 0 ) {

                menu_width = $(this).find('.sub-menu').actual( 'outerWidth' );
                //console.log( menu_width );
                menu_offset = $(this).find('.sub-menu').parent().offset().left + menu_width;
                if( (menu_offset + menu_width) > window_width ) {

                    if( $('.sh-header.sh-header-megamenu-style2').length ) {
                        new_position = menu_width + 0 + 15;
                    } else {
                        new_position = menu_width + 0;
                    }

                    $(this).find('.sub-menu').css({
                        left: -new_position-0,
                        top: '0',
                    });

                } else {

                    $(this).find('.sub-menu').css({
                        left: new_position+0,
                        top: '0',
                    });

                }

            }
        });
    }
    jevelin_navigation_position();


    /* Mega menu helper */
    function jevelin_megamenu() {
        $('.sh-nav .mega-menu-row').each(function(){
            $(this).children().css('height','');
            var self = $(this);
            var count = parseInt( $(this).children().length );
            if( count > 0 && count <= 4 ) {
                $(this).addClass( 'mega-menu-row-'+count );

                var maxHeight = $(self).actual( 'height' );
                $(this).find('>:nth-child(-n+'+count+')').each(function() {
                    $(this).height( maxHeight );
                });
            } else {
                $(this).addClass( 'mega-menu-row-5' );

                var count_now = 0;
                while( count >= count_now ) {
                    count_now += 4;

                    var maxHeight = -1;
                    $(this).find('>:nth-child(n+'+(count_now-3)+'):nth-child(-n+'+count_now+')').each(function() {
                        maxHeight = maxHeight > $(this).actual( 'height' ) ? maxHeight : $(this).actual( 'height' );
                    });

                    $(this).find('>:nth-child(n+'+(count_now-3)+'):nth-child(-n+'+count_now+')').each(function() {
                        $(this).height(maxHeight);
                    });
                }
            }
        });
    }
    jevelin_megamenu();


    /* Page builder section option */
    $('.sh-column-adjust-left .fw-row:first-child .sh-column:first-child > div').append( '<div class="fw-row">'+$('.sh-section-3e0cbbb965eff9a43388283e981cfa23 .fw-row:not(:first-child)').html()+'</div>' );
    $('.sh-column-adjust-left .sh-section-container > .fw-row:not(:first-child)').remove();

    var section_justify_height_init = 1;
    var section_justify_height_last = 0;
    if( $('.sh-google-map').length > 0 ) {
        section_justify_height_init = 0;
    }
    function jevelin_section_justify_height() {
        $( '.section-justify-height .fw-row' ).each(function() {
            if( $(this).children().length > 1 ) {

                $(this).children().css( 'height', '' );
                $('.section-justify-height-google-maps').css( 'max-height', '' ).css( 'min-height', '' );
                if (window.matchMedia('(min-width: 800px)').matches) {
                    $(this).children().css( 'height', $(this).height() );
                    section_justify_height_last = $(this).height();

                    $(this).find('.section-justify-height-google-maps').css( 'max-height', section_justify_height_last+'px' ).css( 'min-height', section_justify_height_last+'px' );
                }

                if( section_justify_height_init < 1 ) {
                    $(this).children().children().each(function() {
                        if( $(this).children().length == '1' && $(this).children().hasClass('sh-google-map') == true ) {
                            $(this).find('.fw-map > .fw-map-canvas').addClass('section-justify-height-google-maps').css( 'max-height', section_justify_height_last+'px' ).css( 'min-height', section_justify_height_last+'px' );
                        }
                    });
                }

            }

        });
        section_justify_height_init++;
    }

    jevelin_section_justify_height();
    $(window).load(function (){
        jevelin_section_justify_height();
    });


    function jevelin_nan_to_0( number ) {
        if( isNaN( number ) ) {
            return 0;
        } else {
            return number;
        }
    }



    /* Header Height */
    $('.sh-header-7 #header-logo').css('height',$('.sh-header-7').height());
    $('.sh-header-top-10 .header-contacts').css('height',$('.sh-header-top-10').height());
    $('header.primary-desktop').css('height', $('header.primary-desktop').actual( 'height' ) );

    if( $('header.primary-mobile .sh-page-notice').is(":visible") ) {
        $('header.primary-mobile').css('height', jevelin_nan_to_0( parseInt( $('.sh-header-mobile-navigation').actual( 'height' ) ) ) + jevelin_nan_to_0( parseInt( $('header.primary-mobile .sh-page-notice').actual( 'outerHeight' ) ) ) );
    } else {
        $('header.primary-mobile').css('height', jevelin_nan_to_0( parseInt( $('.sh-header-mobile-navigation').actual( 'height' ) ) ) );
    }





    
    
    /* Resize action (slow) */
    $(window).resize(function() {
        clearTimeout(window.resizedFinished);
        window.resizedFinished = setTimeout(function(){

            jevelin_header_dropdown();
            jevelin_navigation_position();
            jevelin_megamenu();
            jevelin_section_justify_height();

        }, 500);
    });


    /* Resize action (fast) */
    function jevelin_header_height() {
        if( $(document).width() > 1025 ) {
            $('header.primary-desktop').css('height','');

            if( $('.sh-header-top').length ) {
                primary_desktop = $('.sh-header').actual( 'outerHeight') + $('.sh-header-top').actual( 'outerHeight');
            } else {
                primary_desktop = $('.sh-header').actual( 'outerHeight');
            }

            $('header.primary-desktop').css('height', primary_desktop );
        }
    }
    var primary_desktop = ''
    window.addEventListener( 'load', jevelin_header_height );
    window.addEventListener( 'resize', jevelin_header_height ),


    /* Header Builder - Search */
    $(".sh-header-builder-search-trigger").on( 'click', function(e) {
        $(this).closest( '.sh-header-builder' ).find( '.sh-header-search' ).fadeIn("fast");
        $(this).closest( '.sh-header-builder' ).find( '.sh-header-search-input' ).focus();
        e.preventDefault();
        return false;
    });

    $(".sh-header-builder-main .close-header-search").on( 'click', function(e) {
        $(this).closest( '.sh-header-search' ).fadeOut("fast");
        e.preventDefault();
        return false;
    });


    /* Header Classic - Search */
    $(".sh-nav-search, .sh-side-button-search").on( 'click', function() {
        if( $("#primary-desktop").actual( 'height' ) > 200 ) {
            $("#header-search").addClass( 'sh-side-button-search-line' );
        }

        $("#header-search").fadeIn("fast");
        $("#header-search").find(".sh-header-search-input").focus();
        return false;
    });
    $(".close-header-search").on( 'click', function() {
        $("#header-search").fadeOut("fast");
        return false;
    });
    $( ".sh-header-search-form" ).submit(function( event ) {
        $(this).fadeTo( "fast", 0.45 );
    });

    $(document).keyup(function(e) {
        if (e.keyCode == 27) {
            $(".sh-header-search").fadeOut("fast");

            if( $('body').hasClass('page-layout-right-fixed') ) {
                $("body").removeClass('page-layout-right-fixed');

                var menu = $(".sh-header .sh-nav-dropdown").find(".c-hamburger");
                if( e.target != 'div.sh-table-cell' ) {
                    if( menu.hasClass("is-active") === true ) {
                        menu.removeClass("is-active");
                    } else {
                        menu.addClass("is-active");
                    }
                }
            }
        }
    });


    /* Header side menu */
    $(".sh-header .sh-nav-dropdown").on( 'click', function(e) {
        var self = $(this);

        if( !$("body").hasClass('page-layout-right-fixed') ) {

            $(".sh-header").addClass("sh-animation-left");
            $("body").addClass('page-layout-right-fixed');
            setTimeout(function(){
                $(".sh-header").removeClass("sh-animation-left");
            }, 301);

        } else {

            $(".sh-header").addClass("sh-animation-left");
            $("body").removeClass('page-layout-right-fixed');
            setTimeout(function(){
                $(".sh-header").removeClass("sh-animation-left");
                jQuery(window).trigger('resize');
            }, 301);

            setTimeout(function(){
                jQuery(window).trigger('resize');
            }, 350);

            setTimeout(function(){
                jQuery(window).trigger('resize');
            }, 450);
        }

        var menu = self.find(".c-hamburger");
        if( e.target != 'div.sh-table-cell' ) {
            if( menu.hasClass("is-active") === true ) {
                menu.removeClass("is-active");
            } else {
                menu.addClass("is-active");
            }
        }

        var self_icon_image = self.find('.sh-nav-custom-icon-image');
        if( self_icon_image.hasClass( 'active' ) ) {
            self_icon_image.removeClass( 'active' );
        } else {
            self_icon_image.addClass( 'active' );
        }

        return false;
    });


    /* Mobile header dropdown folders */
    $('.sh-header-mobile-dropdown ul li:has(">ul") a').on( 'click', function() {
        $(this).parent().toggleClass('open');
        $(this).parent().find('> ul').stop(true, true).slideToggle(300, 'easeOutQuint');
        if( $(this).parent().hasClass('open') ) {
            $(this).parent().find('ul ul').stop(true, true).slideUp(0, 'easeOutQuint');
        }

        if( $(this).parent().hasClass('menu-item-has-children') ) {
            return false;
        }
    });
    if( $(document).width() < 1025 ) {
        $('html').on( 'click', function(e) {
            if( !$(e.target).hasClass('header-mobile-form-input') && $('.sh-header-mobile-dropdown').is(':visible') ) {
                $('.sh-nav-dropdown .c-hamburger').trigger('click').toggleClass('is-active');
            }
        });
    }
    /*$('.sh-header-mobile-dropdown').click(function(event){
        event.stopPropagation();
    });*/


    /* Close mobile dropdown on click */
    $('.sh-header-mobile-dropdown li.menu-item:not(.menu-item-has-children)').on( 'click', function() {
        if( $(this).find('> a').attr('href').indexOf("#") >= 0 ) {
            setTimeout(function(){
                if( $('.sh-header-mobile .sh-nav-dropdown .c-hamburger').hasClass( 'is-active' ) ) {
                    $('.sh-header-mobile .sh-nav-dropdown .c-hamburger').trigger('click').toggleClass('is-active');
                }
            }, 50);
        }
    });


    /* Popover */
    $('.sh-popover-mini').addClass('sh-animated fadeIn');


    /* Image Compare */
    $(window).load(function (){
        $('.sh-image-comparison .twentytwenty-handle').addClass('sh-animated pulse');
        $('.sh-image-comparison .twentytwenty-before').addClass('sh-animated fadeIn');
        $('.sh-image-comparison .twentytwenty-handle').on('mouseover', function() {
            $(this).addClass('sh-stop-animation');
        });
    });


    /* Animations */
    if( ( typeof( WOW ) == typeof( Function) ) ) {
        var wow = new WOW({
            boxClass: 'sh-animated',
            animateClass: 'animated',
            offset: 100,
            mobile: true,
            live: true,
            scrollContainer: null
        });
        wow.init();
    }


    /* Blog masonry layout */
    $('.blog-style-masonry:not(.sh-recent-posts-list-carousel)').each( function() {
        var $masonry = $(this).isotope({
            itemSelector: '.post-item',
            columnWidth: 0,
            gutter: 0,
        }).isotope('reloadItems');
        $masonry.imagesLoaded( function() {
            $masonry.isotope('layout').css( 'opacity', 1 );
        });
        $(window).load(function (){
            setTimeout(function(){
                $masonry.isotope('layout');
            }, 0);
        });
    });


    /* Portfolio masonry layout */
    $('.sh-portfolio').each( function() {
        var portfolio_filter = '*';
        if( $(this).attr( 'data-all-filter' ) ) {
            portfolio_filter = $(this).attr( 'data-all-filter' );
        }
        var $portfolio = $(this).isotope({
            itemSelector: '.sh-portfolio-item',
            columnWidth: 0,
            gutter: 0,
            filter: portfolio_filter
        }).isotope('reloadItems').css( 'opacity', 1 );

        $(window).load(function (){
            $portfolio.imagesLoaded( function() {
                $portfolio.isotope('layout');
            });
        });
    });



    /* Portfolio filter */
    $('.sh-filter:not(.sh-filter-pagination)').on( 'click', 'span', function() {

        var filterValue = $(this).attr('data-filter');
        if( $(this).parent().attr('data-type') != 'woocommerce' ) {
            $(this).parent().parent().parent().find('.sh-portfolio').isotope({ filter: filterValue });
        } else {
            $(this).parent().parent().parent().find('ul.products').isotope({ filter: filterValue });
        }

        $(this).parent().children().removeClass('active');
        $(this).addClass('active');

    });


    /* Portfolio fancy filter */
    $('.sh-filter:not(.sh-filter-pagination)').on( 'click', 'span', function() {

        var filterValue = $(this).attr('data-filter');
        $(this).parent().parent().parent().find('.sh-portfolio-fancy .sh-portfolio-fancy-item').each( function() {
            $(this).removeClass('sh-portfolio-fancy-item-active').addClass('sh-portfolio-fancy-item-active-cat');
        });
        $(this).parent().parent().parent().find('.sh-portfolio-fancy').isotope({ filter: filterValue });

        $(this).parent().children().removeClass('active');
        $(this).addClass('active');

    });


    /* Portfolio filter with enabled pagination */
    $('.sh-filter.sh-filter-pagination').on( 'click', 'span', function() {
        window.location.href = $(this).attr('data-href');
        $(this).parent().children().removeClass('active');
        $(this).addClass('active');
    });


    /* Portfolio fancy masonry layout */
    $.fn.isVisible = function() {
        var rect = this[0].getBoundingClientRect();
        //console.log( rect );
        return (
            (rect.height > 0 || rect.width > 0) &&
            rect.bottom >= 0 &&
            rect.right >= 0 &&
            rect.top <= (window.innerHeight || document.documentElement.clientHeight) &&
            rect.left <= (window.innerWidth || document.documentElement.clientWidth)
        );
    };
    $.fn.isVisibleAbove = function() {
        var rect = this[0].getBoundingClientRect();
        //console.log( rect );
        return (
            (rect.height > 0 || rect.width > 0) &&
            rect.bottom < 0 &&
            rect.right >= 0 &&
            rect.top < 0 &&
            rect.left <= (window.innerWidth || document.documentElement.clientWidth)
        );
    };
    $.fn.portfolioFancy = function(){ };

    var $portfolio2 = $('.sh-portfolio-fancy').isotope({
        itemSelector: '.sh-portfolio-fancy-item',
        columnWidth: 0,
        gutter: 0,
    }).isotope('reloadItems');


    /* Onepage navigation */
    if( jevelin.one_pager == true ) {

        /* Onepage navigation - On load */
        if( window.location.href && window.location.href.split("#")[1] ) {
            var topbar = 0;
            if ($(document).width() > 1000 && $(".sh-header").hasClass('sh-sticky-header-active') ) {
                topbar = topbar + parseInt( $('.sh-header').height() );
            } else if ($(document).width() > 1000 && $(".sh-header").hasClass('sh-sticky-header') ) {
                topbar = topbar + parseInt( $('.sh-header').height() ) - 30;
            }

            if( $(document).width() > 600 && $('#wpadminbar').height() > 0 ) {
                topbar = topbar + $('#wpadminbar').height();
            }

            $(window).load(function (){
                if( $('#'+window.location.href.split("#")[1]).length  && !$('#'+window.location.href.split("#")[1]).hasClass('vc_tta-panel') ) {
                    $('html, body').animate({
                        scrollTop: ( $('#'+window.location.href.split("#")[1]).offset().top - topbar )
                    }, parseInt( jevelin.anchor_scroll_speed ) );
                }
            });
        }




        /* Close mobile menu, when clicking internal links  */
        $('nav.sh-header-mobile-dropdown li.menu-item:not(.menu-item-has-children) > a[href*="#"]').on("click", function (e){
            $('.sh-header-builder-mobile-menu').trigger('click');
        })


        /* Onepage navigation - On click custom actions */
        $('a[href^="#goto-"], a[href^="#backtotop"], a[href$="#backtotop"]').on("click", function (e){

            if( $(this).attr('href').indexOf( '#backtotop' ) == -1  ) {

                var url = $(this).attr('href');
                if (url.indexOf("goto-") !=-1) {
                    url = url.replace("goto-", "");
                }

                if( url && url.substring(0,1) == '#' ) {
                    e.preventDefault();
                    if( $(url).length ) {

                        var topbar = 0;
                        if ($(document).width() > 1000 && $(".sh-header").hasClass('sh-sticky-header-active') ) {
                            topbar = topbar + $('.sh-header').height();
                        }

                        if( $(document).width() > 600 && $('#wpadminbar').height() > 0 ) {
                            topbar = topbar + $('#wpadminbar').height();
                        }

                        $('html, body').animate({
                            scrollTop: ( $(url).offset().top - topbar )
                        }, parseInt( jevelin.anchor_scroll_speed ) );

                    }
                }

            } else {

                // set hash
                if( history.pushState ) {
                    history.pushState( null, null, '#backtotop' );
                } else {
                    location.hash = '#backtotop';
                }

                // scroll to
                $('html, body').animate({
                    scrollTop: 0
                }, parseInt( jevelin.anchor_scroll_speed ) );

            }
        });


        /* Onepage navigation - On click */
        $('a[href*="#"]').on('click', function(e) {
            if( !$(this).is('[data-vc-tabs]') && !$(this).is('[data-vc-accordion]') && !$(this).hasClass('vc_carousel-control') ) {
                var hash_url = $(this).attr('href');
        		var hash_val = hash_url.substring(hash_url.indexOf('#'));
                var hash_full_url = $(this).attr('href').split("#")[0];
                hash_full_url = hash_full_url.replace( 'http:', '' );
                hash_full_url = hash_full_url.replace( 'https:', '' );

                var current_hash_full_url = window.location.href.split("#")[0];
                current_hash_full_url = current_hash_full_url.replace( 'http:', '' );
                current_hash_full_url = current_hash_full_url.replace( 'https:', '' );


                // redirect if not the same page
                if( hash_full_url && hash_full_url != current_hash_full_url ) {
                    window.location.href = $(this).attr('href');
                }


                // scroll to element
        		if( hash_val &&
                    $(hash_val).length &&
                    hash_val.indexOf("goto-") < 0 &&
                    hash_val.indexOf("backtotop") < 0 &&
                    $(this).attr('data-toggle') != 'collapse' &&
                    $(this).attr('data-toggle') != 'tab' &&
                    !$(this).parent().parent().hasClass('wc-tabs') ) {

                    e.preventDefault();
                    e.stopPropagation();

        	        var topbar = 0;
        	        if ($(document).width() > 1000 && $(".sh-header").hasClass('sh-sticky-header-active') ) {
        	            topbar = topbar + parseInt( $('.sh-header').height() );
        	        } else if ($(document).width() > 1000 && $(".sh-header").hasClass('sh-sticky-header') ) {
        	            topbar = topbar + parseInt( $('.sh-header').height() ) - 30;
        	        }

        	        if( $(document).width() > 600 && $('#wpadminbar').height() > 0 ) {
        	            topbar = topbar + $('#wpadminbar').height();
        	        }

                    // set hash
                    if( history.pushState ) {
                        history.pushState(null, null, hash_val);
                    } else {
                        location.hash = hash_val;
                    }

                    // scroll to
        	        $('html, body').animate({
        	            scrollTop: ( $(hash_val).offset().top - topbar )
        	        }, parseInt( jevelin.anchor_scroll_speed ) );
        		}
            }
    	});
    }


    /* Header Builder - Content Above */
    var headers_above_content = 0;
    $('.sh-header-builder').each( function() {
        if( $(this).hasClass( 'sh-header-builder-main-above-content' ) ) {
            if( headers_above_content > 0 ) {
                var self = $(this);
                setTimeout(function(){
                    self.removeClass( 'sh-header-builder-main-above-content' );
                }, 10);
            }

            headers_above_content++;
        }
    });


    /* Header Builder - Sticky */
    function heade_builder_sticky() {
        if( $(document).width() >= 1025 ) {

            if( $('#wpadminbar').length ) {
                var header_builder_admin = $('#wpadminbar').actual( 'height' );
            } else {
                var header_builder_admin = 0;
            }
            $('.sh-header-builder-main-sticky-enabled').first().height( $('.sh-header-builder-main-sticky-enabled').first().actual('height') );

            var header_builder_sticky = $('.sh-header-builder-main-sticky-enabled').first();
            if( $(window).scrollTop() && $(window).scrollTop() > header_builder_sticky.offset().top - header_builder_admin ) {
                if( !header_builder_sticky.hasClass( 'sh-header-builder-main-sticky-fixed' ) ) {
                    header_builder_sticky.addClass('sh-header-builder-main-sticky-fixed').find('.sh-header-builder-main-container').css( 'top',  header_builder_admin );
                }
            } else {
                header_builder_sticky.removeClass('sh-header-builder-main-sticky-fixed').find('.sh-header-builder-main-container').css( 'top', '' );
            }

        }
    }

    if( $('.sh-header-builder-main-sticky-enabled').length ) {
        heade_builder_sticky();
        $(window).scroll( heade_builder_sticky );
    }


    /* Header Builder - Mobile Sticky */
    function heade_builder_mobile_sticky() {
        if( $(document).width() < 1025 ) {

            if( $('#wpadminbar').length ) {
                var header_builder_admin = $('#wpadminbar').actual( 'height' );
            } else {
                var header_builder_admin = 0;
            }

            var header_builder_sticky = $('.sh-header-builder-mobile-sticky-enabled').first();

            if( $(window).scrollTop() && $(window).scrollTop() > 1 ) {
                if( !header_builder_sticky.hasClass('sh-sticky-mobile-header') ) {
                    $('.sh-header-builder-mobile-sticky-enabled').first().height( $('.sh-header-builder-mobile-sticky-enabled').first().actual('height') );
                    header_builder_sticky.addClass('sh-header-builder-mobile-sticky-fixed').addClass('sh-sticky-mobile-header');
                    /*alert( 'CHANGE:' +  $(window).scrollTop() + ' // ' + ( header_builder_sticky.offset().top - header_builder_admin ) );*/
                }
            } else {
                header_builder_sticky.removeClass('sh-header-builder-mobile-sticky-fixed').removeClass('sh-sticky-mobile-header');
            }

            // console.log(  $(window).scrollTop() + ' // ' + ( header_builder_sticky.offset().top - header_builder_admin ) );

        }
    }

    if( $('.sh-header-builder-mobile-sticky-enabled').length ) {
        heade_builder_mobile_sticky();
        $(window).scroll( heade_builder_mobile_sticky );
    }




    /* Header Classic - Sticky */
    function jevelin_sticky(){
        if( $(document).width() > 1025 && !$('body').hasClass('compose-mode') ) {

            if( header_height < 0 ) {
                header_height = $('.sh-header').actual( 'height' );
            }

            if( header_offset_total < 0 ) {
                if( $('#wpadminbar').length ) {
                    var header_admin = $('#wpadminbar').actual( 'height' );
                } else {
                    var header_admin = 0;
                }

                if( $('.sh-header').length ) {
                    var header_offset = $('.sh-header').offset().top - header_admin;
                } else {
                    var header_offset = 0;
                }
                header_offset_total = header_offset;
            }

            if( $(document).scrollTop() > header_offset_total ){
                if( !$('body').hasClass('compose-mode') ) {
                    $('.sh-header').addClass('sh-sticky-header-active').css('top', $('#wpadminbar').actual( 'height' ));
                } else {
                    $('.sh-header').addClass('sh-sticky-header-active').css('top', 0);
                }
            } else {
                if( primary_desktop > 0 ) {
                    $('.sh-header-height').css( 'height', primary_desktop );
                    $('.sh-header:not(.sh-header-2):not(.sh-header-3):not(.sh-header-4)').css( 'height', primary_desktop );

                    setTimeout(function(){
                        $('.sh-header-height').css( 'height', '' );
                        $('.sh-header:not(.sh-header-2):not(.sh-header-3):not(.sh-header-4)').css( 'height', '' );
                    }, 300);
                }

                $('.sh-header').removeClass('sh-sticky-header-active').css('top', 0);
            }
        }

        if($(document).scrollTop() > 0 ){
            $('.sh-header-mobile').addClass('sh-sticky-mobile-header-active');
        } else {
            $('.sh-header-mobile').removeClass('sh-sticky-mobile-header-active');
        }
    }

    if( $('.sh-sticky-header').length ) {

        if( $('#wpadminbar').length ) {
            var header_admin = $('#wpadminbar').height();
        } else {
            var header_admin = 0;
        }

        if( $('.sh-header').length ) {
            var header_offset = $('.sh-header').offset().top - header_admin;
        } else {
            var header_offset = 0;
        }

        var header_height = $('.sh-header').height();
        var header_offset_total = header_offset;
        var header_offset_sticky = 0;

        jevelin_sticky();
        $(window).scroll(jevelin_sticky);
    }
    $(window).on( 'ready load', function() {
        if( $('body').hasClass('compose-mode') ) {
            $('.sh-header').removeClass('sh-sticky-header-active').css('top', 0);
        }
    });


    /*  Footer copyrights */
    if( $('.sh-copyrights-image').height() > 0 ) {
        $('.sh-copyrights-text, .sh-copyrights-social').css('line-height', $('.sh-copyrights-image').height()+'px');
    }


    /* Alert Message - Close */
    $('.sh-alert-close').on('click', function() {
        $(this).parent().fadeTo(400, 0.00, function(){ //fade
             $(this).slideUp(400, function() { //slide up
                 $(this).remove(); //then remove from the DOM
             });
        });
    });


    /* Counter SC  */
    if(jQuery().counterUp) {
        $('.sh-counter-animate').counterUp({
            delay: 14,
            time: 1500,
            triggerOnce: true
        });
    }


    /* Share  */
    $(".sh-social-share-networks").jsSocials({
        showLabel: false,
        showCount: "inside",
        shares: ["facebook", "twitter", "email", "pinterest"],
        shareIn: "blank",
    });


    /* Blog, Portfolio Gallery  */
    $('.sh-gallery:not(.sh-gallery-autoplay)').slick({
        accessibility: true,
        dots: true,
        arrows: true,
        infinite: true,
        speed: 300,
        slidesToShow: 1,
        adaptiveHeight: true,
        prevArrow: '<button type="button" class="slick-prev"><span class="ti-angle-left"></span></button>',
        nextArrow: '<button type="button" class="slick-next"><span class="ti-angle-right"></span></button>',
    });


    /* Blog, Portfolio Gallery Autoplay */
    $('.sh-gallery-autoplay').slick({
        accessibility: true,
        dots: true,
        arrows: true,
        infinite: true,
        speed: 300,
        slidesToShow: 1,
        autoplay: true,
        autoplaySpeed: 5000,
        adaptiveHeight: true,
        prevArrow: '<button type="button" class="slick-prev"><span class="ti-angle-left"></span></button>',
        nextArrow: '<button type="button" class="slick-next"><span class="ti-angle-right"></span></button>',
    });


    /* Sidebar Search  */
    $('.sh-sidebar-search').blur(function() {
        $(this).parent().parent().parent().removeClass("sh-sidebar-search-active");
    })
    .focus(function() {
        $(this).parent().parent().parent().addClass("sh-sidebar-search-active")
    });


    /* Quantity buttons */
    function sh_increase_number_update() {
        if( $('body').hasClass('woocommerce-cart') ) {
            $('input[name="update_cart"]').removeAttr('disabled');

            setTimeout(function(){
            }, 500);

        }
    }

    if( jevelin.quantity_button != 'off' ) {
        $('.quantity').each( function() {
            if( $(this).children().is( 'input' ) ) {

                $(this).children().attr( 'type', 'text' );
                $(this).children().attr( 'class', 'sh-quantity-number' );
                $(this).prepend( '<span class="sh-noselect sh-increase-number-down"><i class="ti-arrow-down"></i></span>' );
                $(this).append( '<span class="sh-noselect sh-increase-number-up"><i class="ti-arrow-up"></i></span>' );
                $(this).addClass( 'sh-increase-numbers' );

            }
        });

        $("input.sh-quantity-number").on('keyup keypress blur change', function(e) {
            if (e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57)) {
                return false;
            }else{
                if( $(this).val().length >= parseInt($(this).attr('maxlength')) && (e.which != 8 && e.which != 0)){
                    return false;
                }
            }
        });

        $('body').on( 'updated_cart_totals', function(){
            if( $('.woocommerce .sh-alert-error').length > 1 ) {
                $('.woocommerce .sh-alert-error').first().remove();
            }

            $('.quantity').each( function() {
                if( $(this).children().is( 'input' ) ) {
                    $(this).find('.sh-increase-number-down').remove();
                    $(this).find('.sh-increase-number-up').remove();

                    $(this).children().attr( 'type', 'text' );
                    $(this).children().attr( 'class', 'sh-quantity-number' );
                    $(this).prepend( '<span class="sh-noselect sh-increase-number-down"><i class="ti-arrow-down"></i></span>' );
                    $(this).append( '<span class="sh-noselect sh-increase-number-up"><i class="ti-arrow-up"></i></span>' );
                    $(this).addClass( 'sh-increase-numbers' );

                }
            });
        });


        var gillion_product_increase_number_min = ( $('.woocommerce-grouped-product-list.group_table').length ) ? 0 : 1;
        $(document).on('click', '.sh-increase-number-down', function(){
            var current_number_val = parseInt( $(this).parent().find('input.sh-quantity-number').val() );
            var current_number = isNaN( current_number_val ) ? 0 : current_number_val;
            current_number = current_number - 1;

            if( current_number >= gillion_product_increase_number_min ) {
                $(this).parent().find('input.sh-quantity-number').val( current_number );
                sh_increase_number_update();
            }
        });

        $(document).on('click', '.sh-increase-number-up', function(){
            var current_number_val = parseInt( $(this).parent().find('input.sh-quantity-number').val() );
            var current_number = isNaN( current_number_val ) ? 0 : current_number_val;
            current_number = current_number + 1;

            if( current_number >= 0 ) {
                $(this).parent().find('input.sh-quantity-number').val( current_number );
                sh_increase_number_update();
            }
        });
    } else {
        $('.woocommerce .quantity').addClass( 'quantity-basic' );
    }


    /* Added to cart notification */
    $('body').on('click', '.product .add_to_cart_button', function () {
        var name = '';
        if( $(this).attr( 'data-product_title' ) ) {
            name = $(this).attr( 'data-product_title' );
        } else {
            name = $(this).closest('li.product').find('.woocommerce-loop-product__title').text();
        }

        $('.sh-notification-item-example .sh-notification-item-name').html( name );
    });


    $('body').on('click', '.sh-notification-item-close', function() {
        $(this).parent().animate({ 'opacity': '0', 'margin-bottom': '15px'}, 300);
    });


    var added_to_cart_timout = 0;
    $( document.body ).on( 'added_to_cart', function() {
        $('.sh-notifications').html( '<div class="sh-notification-item">' + $('.sh-notification-item-example').html() + '</div>' );
        $('.sh-notification-item').animate({ 'opacity': '1', 'margin-bottom': '0px'}, 300);
        added_to_cart_timout = setTimeout( function(){
            $('.sh-notification-item').animate({ 'opacity': '0', 'margin-bottom': '15px'}, 300);
        }, 5000);
    });


    $('body').on('mouseover', '.sh-notification-item', function() {
        clearTimeout( added_to_cart_timout );
    });



    /* Back To Top  */
    if ($('.sh-back-to-top').length) {
        var scrollTrigger = 100, // px
            backToTop = function () {
                var scrollTop = $(window).scrollTop();
                if (scrollTop > scrollTrigger) {
                    $('.sh-back-to-top').addClass('active');
                } else {
                    $('.sh-back-to-top').removeClass('active');
                }
            };
        backToTop();
        $(window).on('scroll', function () {
            backToTop();
        });

        $('.sh-back-to-top').on('click', function (e) {
            e.preventDefault();
            $(this).blur();
            $('html,body').animate({
                scrollTop: 0
            }, 500);
        });
    }


    /* Hamburger Animation  */
    var toggles = document.querySelectorAll(".sh-header-mobile-navigation .c-hamburger");
    for (var i = toggles.length - 1; i >= 0; i--) {
        var toggle = toggles[i];
        toggleHandler(toggle);
    };
    function toggleHandler(toggle) {
        toggle.addEventListener( "click", function(e) {
            e.preventDefault();
            (this.classList.contains("is-active") === true) ? this.classList.remove("is-active") : this.classList.add("is-active");
        });
    }


    /* Left header fix */
    if( $('.sh-header-left-side').length ) {
        $('.sh-header-left-side .sh-nav-cart .sub-menu').css( 'top', -parseInt( $('.sh-header-left-side .sh-nav-cart .sub-menu').height()) );
        $(window).on( 'load resize', function() {
            var side_logo_spacing = ( $('#wpadminbar').length ) ? 100 : 68;
            $(".sh-header-left-side #header-logo img").css('max-height', parseInt( $(".sh-header-left-side .header-standard-position").position().top ) - side_logo_spacing );
            $('.sh-header-left-side #header-logo').animate( { opacity: 1 }, 150 );
        });
    }


    /* Progress bar */
    if( ( typeof( WOW ) == typeof( Function) ) ) {
        var wow_progress = new WOW({
            boxClass:     'sh-progress',
            animateClass: '',
            mobile:       true,
            live:         true,
            callback:     function(box, test) {

                $('#'+box.id).find('.sh-progress-status-value').each( function() {
                    $(this).animate(
                        {
                            width: $(this).attr('data-width')+'%'
                        }, {
                            duration: 1300,
                            easing: 'easeOutExpo',
                        }
                    );
                });

            },
            scrollContainer: null
        });
        wow_progress.init();
    }


    /* Pie chart */
    setTimeout(function(){
        var wow_progress = new WOW({
            boxClass:     'sh-piechart',
            animateClass: '',
            mobile:       true,
            live:         true,
            callback:     function(box, test) {

                $('#'+box.id).addClass('sh-piechart-animated');

                if( $('#'+box.id).hasClass('sh-piechart-circle') ) {
                    if( !$('#'+box.id).find('.circle_animation').css('animation') ) {
                        $('#'+box.id).find('.circle_animation').velocity({
                            strokeDashoffset: parseInt( $('#'+box.id).attr('data-id') )
                        }, {
                            duration: 2000,
                            easing: [ 0.785, 0.135, 0.150, 0.860 ]
                        });
                    }
                } else if( $('#'+box.id).hasClass('sh-piechart-rhomb') ) {
                    if( !$('#'+box.id).find('.rhomb_animation').css('animation') ) {
                        $('#'+box.id).find('.rhomb_animation').velocity({
                            strokeDashoffset: parseInt( $('#'+box.id).attr('data-id') )
                        }, {
                            duration: 2000,
                            easing: [ 0.785, 0.135, 0.150, 0.860 ]
                        });
                    }
                }

                $('#'+box.id).find('.sh-piechart-percentage-number').each(function() {
                    var self = $(this);
                    var percent_hours = self.text();
                    $({numberValue: 0}).animate({numberValue: percent_hours}, {
                        duration: 2000,
                        easing: 'easeOutCirc',
                        progress: function() {
                            self.text(Math.round(Math.ceil(this.numberValue*100)/100));
                        }
                    });
                });

            },
            scrollContainer: null
        });
        wow_progress.init();

        /*$('.sh-piechart').viewportChecker({
            offset: 100,
            callbackFunction: function(box, test){

                $('#'+box.context.id).addClass('sh-piechart-animated');

                if( $('#'+box.context.id).hasClass('sh-piechart-circle') ) {
                    if( !$('#'+box.context.id).find('.circle_animation').css('animation') ) {
                        $('#'+box.context.id).find('.circle_animation').velocity({
                            strokeDashoffset: parseInt( $('#'+box.context.id).attr('data-id') )
                        }, {
                            duration: 2000,
                            easing: [ 0.785, 0.135, 0.150, 0.860 ]
                        });
                    }
                } else if( $('#'+box.context.id).hasClass('sh-piechart-rhomb') ) {
                    if( !$('#'+box.context.id).find('.rhomb_animation').css('animation') ) {
                        $('#'+box.context.id).find('.rhomb_animation').velocity({
                            strokeDashoffset: parseInt( $('#'+box.context.id).attr('data-id') )
                        }, {
                            duration: 2000,
                            easing: [ 0.785, 0.135, 0.150, 0.860 ]
                        });
                    }
                }

                $('#'+box.context.id).find('.sh-piechart-percentage-number').each(function() {
                    var self = $(this);
                    var percent_hours = self.text();
                    $({numberValue: 0}).animate({numberValue: percent_hours}, {
                        duration: 2000,
                        easing: 'easeOutCirc',
                        progress: function() {
                            self.text(Math.round(Math.ceil(this.numberValue*100)/100));
                        }
                    });
                });
            }
        });*/
    }, 500);


    /* WooCommerce Simple Select Init */
    $(".woocommerce select.country_select").SumoSelect({ search: true });
    $(".woocommerce-ordering .orderby").SumoSelect({ search: true });
    $(".contact-form select").SumoSelect();
    $(".wpcf7-select").SumoSelect();


    /* Portfolio Overlay 3 */
    $('.sh-portfolio-item .sh-portfolio-overlay3').hoverdir();


    /* Portfolio Disable*/
    $('.sh-portfolio-single-disabled').on( 'click', function() {
        return false;
    });


    /* Youtube Visual Improvements */
    $('iframe').each( function() {
        var iframe_src = $(this).attr('src');
        if( iframe_src ) {
        	if( iframe_src.indexOf("youtube.com") !== -1 ) {
        		return this.src + '?title=0&byline=0&portrait=0';
        	}
        }
    });


    /* Titlebar parallax */
    if( $(window).width() >= 768 ) {
        $('.sh-titlebar-parallax').jarallax({
            speed: 0.5
        });
    } else {
        $('.sh-titlebar-parallax').addClass('sh-titlebar-parallax-disabled');
    }


    /* Image Gallery SC */
    $('.sh-image-gallery:not(.sh-image-gallery-simple)').each( function() {
        var image_gallery_columns = parseInt( $(this).attr('data-columns') );
        if( isNaN( image_gallery_columns ) ) {
            image_gallery_columns = 1;
        }

        if( image_gallery_columns >= 3 ) {
            var image_gallery_1024 = 3;
        } else {
            var image_gallery_1024 = image_gallery_columns;
        }

        if( image_gallery_columns >= 2 ) {
            var image_gallery_600 = 2;
        } else {
            var image_gallery_600 = image_gallery_columns;
        }

        var image_gallery_autoplay = parseInt( $(this).attr('data-autoplay') );
        if( image_gallery_autoplay > 0 ) {
            var image_gallery_autoplay_status = true;
            var image_gallery_autoplay_speed = parseInt( image_gallery_autoplay );
        } else {
            var image_gallery_autoplay_status = false;
            var image_gallery_autoplay_speed = 0;
        }
        var image_gallery_infinite = ( image_gallery_autoplay_status == true ) ? true : false;

        $(this).slick({
            infinite: image_gallery_infinite,
            dots: true,
            slidesToShow: image_gallery_columns,
            slidesToScroll: image_gallery_columns,
            autoplay: image_gallery_autoplay_status,
            autoplaySpeed: image_gallery_autoplay_speed,
            responsive: [
                {
                    breakpoint: 1024,
                    settings: {
                        slidesToShow: image_gallery_1024,
                        slidesToScroll: image_gallery_1024,
                    }
                },{
                    breakpoint: 600,
                    settings: {
                        slidesToShow: image_gallery_600,
                        slidesToScroll: image_gallery_600
                    }
                },{
                    breakpoint: 480,
                    settings: {
                        slidesToShow: 1,
                        slidesToScroll: 1
                    }
                }
            ]
        });
    });
    $('.sh-image-gallery-item.slick-slide.slick-cloned a').attr( 'data-rel', '' );
    $('.sh-image-gallery-item .post-meta-thumb a').on( 'click', function(){
        $('.sh-image-gallery-item.slick-slide.slick-cloned a').attr( 'data-rel', '' );
    });


    /* WooCommerce Jevelin Lightbox */
    if( jevelin.wc_lightbox == 'jevelin' ) {
        $('.woocommerce div.product .woocommerce-product-gallery__wrapper a').attr('data-rel', 'lightcase:gallery');
    }


    /* Lightbox */
    $("a[data-rel^=lightcase], a[rel^='sh-lightbox'], a[rel^='lightbox']" ).lightcase({
        maxWidth: jevelin.lightbox_window_max_width,
        maxHeight: jevelin.lightbox_window_max_height,
        overlayOpacity: jevelin.lightbox_opacity,
        transition: jevelin.lightbox_transition,
        showSequenceInfo: true,
        showCaption: false,
        shrinkFactor: jevelin.lightbox_window_size,
    });


    /* Shop categories widget */
    $('.product-categories .count').each(function() {
        $(this).html( $(this).html().slice(1, -1)).show();
    });


    /* Blog categories widget */
    $('.widget_categories li').each(function() {
        var cat_count = $(this).clone().children().remove().end().text().trim().slice(1, -1);
        if( cat_count ) {
            $(this).append( '<span class="count">' + cat_count + '</span>' );
        }
    });


    /* Column shadow */
    $('.sh-column-shadow').parent().parent().css('z-index','500');


    /* Share */
    $('.sh-social-share-button').on( 'click', function() {
        $(this).next().toggleClass('sh-social-share-networks-active');
    });


    /* Vidoe Player */
    $('.sh-video-player-image-placeholder').on( 'click', function() {
        $(this).removeClass('sh-video-player-image-placeholder');

        var videoURL = $(this).find('iframe').prop('src');
        if( !videoURL.match(/vimeo.com/) ){
            videoURL += "&autoplay=1";
    	}
        $(this).find('iframe').prop('src',videoURL);
    });


    /* Partners Carousel */
    $('.sh-partners-carousel').each( function() {
        var partner_autoplay = parseInt( $(this).attr('data-autoplay') );
        var partner_carousel_columns = parseInt( $(this).attr('data-id') );
        var partner_carousel_columns_responsive1 = partner_carousel_columns;
        var partner_carousel_columns_responsive2 = 2;

        if( partner_carousel_columns > 4 ) {
            partner_carousel_columns_responsive1 = 4;
        }

        if( partner_carousel_columns == 1 ) {
            partner_carousel_columns_responsive2 = 1;
        }

        if( partner_autoplay < 1 || !partner_autoplay ) {
            partner_autoplay = 5000;
        }

        $(this).slick({
            infinite: true,
            dots: false,
            arrows: false,
            slidesToShow: partner_carousel_columns,
            slidesToScroll: 1,
            autoplay: true,
            autoplaySpeed: partner_autoplay,
            responsive: [
                {
                    breakpoint: 1025,
                    settings: {
                        slidesToShow: partner_carousel_columns_responsive1
                    }
                },{
                    breakpoint: 800,
                    settings: {
                        slidesToShow: partner_carousel_columns_responsive2,
                        pauseOnHover: false
                    }
                },{
                    breakpoint: 550,
                    settings: {
                        slidesToShow: 1,
                        pauseOnHover: false
                    }
                }
            ],
        });
    })


    /* WooCommerce Carousel */
    $('.sh-recent-products-carousel .products').each( function() {
        var carousel_columns = parseInt( $(this).closest('.sh-recent-products-carousel').attr('data-id') );
        var carousel_columns_responsive1 = carousel_columns;
        var carousel_columns_responsive2 = 2;

        if( carousel_columns > 4 ) {
            carousel_columns_responsive1 = 4;
        }

        if( carousel_columns == 1 ) {
            carousel_columns_responsive2 = 1;
        }

        $(this).slick({
            infinite: true,
            dots: true,
            arrows: false,
            slidesToShow: carousel_columns,
            slidesToScroll: carousel_columns,
            autoplay: true,
            autoplaySpeed: 5000,
            responsive: [
                {
                    breakpoint: 1025,
                    settings: {
                        slidesToShow: carousel_columns_responsive1,
                        slidesToScroll: carousel_columns_responsive1,
                    }
                },{
                    breakpoint: 800,
                    settings: {
                        slidesToShow: carousel_columns_responsive2,
                        slidesToScroll: carousel_columns_responsive2,
                        pauseOnHover: false
                    }
                },{
                    breakpoint: 550,
                    settings: {
                        slidesToShow: 1,
                        slidesToScroll: 1,
                        pauseOnHover: false
                    }
                }
            ],
        });
    })


    /* Blog Posts Carousel */
    $('.sh-recent-posts-carousel .blog-list').each( function() {
        var desktop_slides = parseInt( $(this).parent().attr('data-id') );
        if( desktop_slides == 4 || desktop_slides == 5 ) {
            var desktop_slides = 3;
        }

        $(this).slick({
            infinite: true,
            dots: true,
            arrows: false,
            slidesToShow: desktop_slides,
            slidesToScroll: desktop_slides,
            autoplay: true,
            autoplaySpeed: 5000,
            responsive: [
                {
                    breakpoint: 1025,
                    settings: {
                        slidesToShow: desktop_slides,
                        slidesToScroll: desktop_slides,
                    }
                },{
                    breakpoint: 800,
                    settings: {
                        slidesToShow: 2,
                        slidesToScroll: 2,
                        pauseOnHover: false
                    }
                },{
                    breakpoint: 550,
                    settings: {
                        slidesToShow: 1,
                        slidesToScroll: 1,
                        pauseOnHover: false
                    }
                }
            ],
        });
    });


    /* Partners Carousel Responsive */
    $('.sh-partners-carousel').on('init setPosition', function(event, slick, currentSlide, nextSlide){
        var self = $(this);
        var max_height = 0;
        self.find('.slick-slide img').each(function() {
            var cur_height = $(this).height();
            if (cur_height > max_height) {
                max_height = cur_height;
            }
        });

        if( max_height > 0 ) {
            self.css('max-height', max_height);
            self.find('.slick-slide').each( function() {
                $(this).height( max_height );
            });
        }

        self.css('height', 'auto').css('opacity', '1');
    });


    /* Header navigation */
    function jevelin_navigation() {
        if( $('.sh-header.sh-header-megamenu-style2').length ) {
            $("ul.sh-nav").superfish({
                delay: jevelin.header_animation_dropdown_delay,
                hoverClass: 'sh-hover',
                animation: { opacity: "show", marginTop: "0px" },
                animationOut: { opacity: "hide", marginTop: "-10px" },
                easing: jevelin.header_animation_dropdown,
                speed: parseInt( jevelin.header_animation_dropdown_speed ),
                speedOut: 0,
                cssArrows: false,
                pathLevels: 2,
            });
        } else {
            $("ul.sh-nav").superfish({
                delay: jevelin.header_animation_dropdown_delay,
                hoverClass: 'sh-hover',
                animation: { opacity: "show", height:'show' },
                animationOut: { opacity: "hide", height:'hide' },
                easing: jevelin.header_animation_dropdown,
                speed: parseInt( jevelin.header_animation_dropdown_speed ),
                speedOut: 0,
                cssArrows: false,
                pathLevels: 2,
            });
        }
    }
    jevelin_navigation();
    if( !$('header.primary-desktop .sh-nav-social').find('a').length ) {
        $('header.primary-desktop .sh-nav-social').remove();
    }


    /* Mobile header dropdown */
    var mobile_header_dropdown_align = 0;
    $('.sh-header-mobile .sh-nav-dropdown').on( 'click', function() {
        if( mobile_header_dropdown_align == 0 ) {
            mobile_header_dropdown_align++;
            $('.sh-nav-mobile > li > a, .sh-nav-mobile li.menu-item-has-children > a, .sh-header-mobile li.mega-menu-col > a').each( function() {
                if( $(this).attr('href') != '' && $(this).attr('href') != '#' ) {
                    var link_target = $(this).attr( 'target' );
                    if( link_target != '_blank' ) {
                        link_target = '_self';
                    }

                    $(this).parent().prepend('<a href="'+ $(this).attr('href') +'" target="'+ link_target +'" class="menu-item-open-fix">'+ $(this).html() +'</a>');
                    $(this).html('&nbsp;')
                }
            });
        }


        var self_icon_image = $(this).find('.sh-nav-custom-icon-image');
        if( self_icon_image.hasClass( 'active' ) ) {
            self_icon_image.removeClass( 'active' );
        } else {
            self_icon_image.addClass( 'active' );
        }


        $('.sh-header-mobile-dropdown').stop(true, true).slideToggle(
            jevelin.header_animation_dropdown_speed,
            jevelin.header_animation_dropdown
        );

        return false;
    });


    /* Mega Menu Column Link */
    $('.sh-header li.mega-menu-col > a').on( 'click', function() {
        window.location = $(this).attr('href');
    });


    /* Notice */
    if( jevelin.notice !== false ) {
        if( jevelin.notice == 'enable2' ) {

            $('.sh-page-notice').show();
            $(".sh-page-notice-button").on('click', function() {

                $('.sh-page-notice').hide();
                $('header.primary-mobile').css('height', $('.sh-header-mobile-navigation').actual( 'height' ) );
                return false;
            });

        } else {

            if ( 'set' !== $.cookie( 'sh-notice' ) ) {
                $('.sh-page-notice').show();
                $(".sh-page-notice-button").on('click', function() {
                    $.cookie( 'sh-notice', 'set', { expires: 356, path: '/' });

                    $('.sh-page-notice').hide();
                    $('header.primary-mobile').css('height', $('.sh-header-mobile-navigation').actual( 'height' ) );
                    return false;
                });
            }

        }


        $('header.primary-mobile').css('height', jevelin_nan_to_0( parseInt( $('.sh-header-mobile-navigation').actual( 'height' ) ) ) );
    }


    /* Page loader */
    if( jevelin.page_loader == 1 ) {
        $(".sh-page-loader").fadeOut(500);
        $("body").css('overflow', 'visible');

		$(window).bind('beforeunload', function(e){
			$('.sh-page-loader').fadeIn();
		});
    }


    /* WooCommerce - Page Numbers */
    $(".woocommerce-pagination .page-numbers .prev").html( jevelin.page_numbers_prev );
    $(".woocommerce-pagination .page-numbers .next").html( jevelin.page_numbers_next );


    /* RTL support */
    if( jevelin.rtl_support == 1 ) {
        $('.sh-filter').each(function(){
            $(this).find('.sh-filter-item:first-child').appendTo(this);
        });

        $('.sh-portfolio-single-info-item').each(function(){
            $(this).find('.sh-portfolio-single-info-left').appendTo(this);
        });

        $('.sh-progress-style4 .sh-progress-item .row').each(function(){
            $(this).find('.col-md-8').appendTo(this);
        });

        $('.sh-progress-style5 .sh-progress-item .row').each(function(){
            $(this).find('.col-md-8').appendTo(this);
        });

        $('.sh-counter-style3 > .sh-table').each(function(){
            $(this).find('.text-right').appendTo(this);
        });

        $('.sh-copyrights-style2 > .sh-table-full > .sh-table-cell:first-child').appendTo('.sh-copyrights-style2 > .sh-table-full');
        $('.sh-header:not(.sh-header-7) > .container > .sh-table > .sh-table-cell:first-child').appendTo('.sh-header > .container > .sh-table');

        $('.sh-header:not(.sh-header-7) .sh-nav .menu-item.sh-nav-cart').prependTo('.sh-header .sh-nav');
        $('.sh-header:not(.sh-header-7) .sh-nav .menu-item.sh-nav-search').prependTo('.sh-header .sh-nav');
        $('.sh-header:not(.sh-header-7) .sh-nav .menu-item.sh-nav-social').prependTo('.sh-header .sh-nav');

        $('.sh-header-top-2 > .container > .row > .header-contacts').appendTo('.sh-header-top-2 > .container > .row');
        $('.sh-header-top-3 > .container > .sh-table > .header-contacts').appendTo('.sh-header-top-3 > .container > .sh-table');
    }


    /* Footer Parallax */
    function jevelin_footer_parallax() {
        if ($(document).width() > 850) {
            $("#wrapper > .content-container").css( 'margin-bottom', $('.sh-footer').height() );
        } else {
            $("#wrapper > .content-container").css( 'margin-bottom', '' );
        }
    }

    function jevelin_footer_parallax_visible() {
        if ($(document).width() > 850) {
            if( ( $(document).height() - ($(window).scrollTop() + $(window).height()) ) < $('.sh-footer').height() ) {
                $('.sh-footer').css( 'opacity', '1');
            } else {
                $('.sh-footer').css( 'opacity', '0');
            }
        }
    }

    if( jevelin.footer_parallax == 1 ) {
        $("body").addClass( 'sh-footer-paralalx-init' );

        $(window).load(function (){
            jevelin_footer_parallax();
            jevelin_footer_parallax_visible();
        });

        $(window).resize(function() {
            clearTimeout(window.resizedFinishedFooter);
            window.resizedFinishedFooter = setTimeout(function(){

                jevelin_footer_parallax();

            }, 500);
        });

        $(window).scroll(jevelin_footer_parallax_visible);
    }


    /* WooCommerce Button Change */
    $('.sh-woocommerce-products-style2 li.product').each( function() {
        var button_html = '';
        if( $(this).find('.add_to_cart_button').length ) {
            button_html = $(this).find('.add_to_cart_button')[0].outerHTML;
        }
        $(this).find('.sh-woo-post-content-container > a:first-child').append( button_html );
        $(this).find('.sh-woo-post-content-container > .add_to_cart_button').remove();
    });


    /* Admin Preview (beta) */
    $('.sh-unyson-frontend-test').on( 'click', function() {
        $(this).toggleClass( "active" );
        $('#content.page-content').toggleClass( "sh-unyson-frontend-preview" );
    });


    /* AJAX - Lazy Load */
    if( $('.sh-load-more:not(.sh-load-more-product)').length ) {
        if( $('.sh-load-more.infinite').length ) {
            $(window).scroll( function() {
                if( $('.sh-load-more').length && $('.sh-load-more').isInViewport() ) {
                    if( $('.sh-load-more:not(.disabled)').length ) {
                        jevelin_loadmore();
                    }
                } else if( !$('.sh-load-more').length ) {
                    $(this).off();
                }
            });
        }

        jQuery( document ).on( 'click', '.sh-load-more:not(.disabled)', function() {
            jevelin_loadmore();
        });

        function jevelin_loadmore() {
            var lazy_self = $('.sh-load-more');
            lazy_self.addClass( 'disabled' );
            var lazy_categories = lazy_self.attr('data-categories');
            var lazy_post_style = lazy_self.attr('data-post-style');
            var lazy_posts_per_page = lazy_self.attr('data-posts-per-page');
            var lazy_paged = lazy_self.attr('data-paged');
            jQuery.ajax({
                url : jevelin_loadmore_posts.ajax_url,
                type : 'post',
                data : {
                    action : 'load_more_posts',
                    categories : lazy_categories,
                    per_page: lazy_posts_per_page,
                    post_style : lazy_post_style,
                    paged: lazy_paged,
                },
                success : function( response ) {
                    if( response == 'done' ) {
                        $('.sh-load-more').remove();
                    } else {
                        $('.sh-load-more').attr('data-paged', parseInt( $('.sh-load-more').attr('data-paged') ) + 1 );

                        if( lazy_self.attr( 'data-id' ) ) {

                            var lazy_add_posts = $( '.content-container .'+ lazy_self.attr( 'data-id' ) +' .blog-list' );
                            if( lazy_add_posts.hasClass('blog-style-masonry') ) {
                                // console.log('yes');
                                lazy_add_posts.isotope( 'insert', $(response) ).imagesLoaded( function() {
                                    lazy_add_posts.isotope('layout').css( 'opacity', 1 );
                                });
                            } else {
                                $(response).appendTo( '.content-container .'+ lazy_self.attr( 'data-id' ) +' .blog-list' );
                            }

                        } else {
                            if( $( '.blog-list.blog-style-masonry' ).length ) {
                                $( '.blog-list.blog-style-masonry' ).isotope( 'insert', $(response) ).imagesLoaded( function() {
                                    $( '.blog-list.blog-style-masonry' ).isotope('layout').css( 'opacity', 1 );
                                });
                            } else {
                                $(response).appendTo( '.content-container .blog-list' ).hide().fadeIn( 700 );
                            }
                        }

                        lazy_self.removeClass( 'disabled' );
                        if( $(response).filter('.post-item').length < lazy_posts_per_page ) {
                            $('.sh-load-more').remove();
                        }

                    }
                }
            });
        }
    }


    /* AJAX - Load more products */
    if( $('.sh-load-more.sh-load-more-product').length ) {
        if( $('.sh-load-more.sh-load-more-product.infinite').length ) {
            $(window).scroll( function() {
                if( $('.sh-load-more.sh-load-more-product').length && $('.sh-load-more.sh-load-more-product').isInViewport() ) {
                    if( $('.sh-load-more.sh-load-more-product:not(.disabled)').length ) {
                        jevelin_loadmore_products();
                    }
                } else if( !$('.sh-load-more.sh-load-more-product').length ) {
                    $(this).off();
                }
            });
        }

        jQuery( document ).on( 'click', '.sh-load-more-product:not(.disabled)', function() {
            jevelin_loadmore_products();
        });

        function jevelin_loadmore_products() {
            var lazy_self = $('.sh-load-more-product');
            lazy_self.addClass( 'disabled' );
            var lazy_categories = lazy_self.attr('data-categories');
            var lazy_post_style = lazy_self.attr('data-post-style');
            var lazy_posts_per_page = lazy_self.attr('data-posts-per-page');
            var lazy_paged = lazy_self.attr('data-paged');
            jQuery.ajax({
                url : jevelin_loadmore_posts.ajax_url,
                type : 'post',
                data : {
                    action : 'load_more_products',
                    per_page: lazy_posts_per_page,
                    paged: lazy_paged,
                },
                success : function( response ) {
                    if( response == 'done' ) {
                        $('.sh-load-more-product').remove();
                    } else {
                        $(response).appendTo( '.vcg-woocommerce-products ul.products' );

                        $('.sh-load-more-product').attr('data-paged', parseInt( $('.sh-load-more-product').attr('data-paged') ) + 1 );
                        lazy_self.removeClass( 'disabled' );

                        if( $(response).filter('.type-product').length < lazy_posts_per_page ) {
                            $('.sh-load-more-product').remove();
                        }

                    }
                }
            });
        }
    }


    /* One Page Navigation - On load */
    var opn_find_url = document.location.protocol +"//"+ document.location.hostname + document.location.pathname;
    var opn_find = 'a[href="'+opn_find_url+'#backtotop"]';
    if( $(opn_find).length ) {
        $('header.primary-desktop .sh-nav').find('li.current_page_item').each( function() {
            $(this).removeClass('current_page_item');
            $(opn_find).parent().addClass('current_page_item');
        });
    }


    /* One Page Navigation - Scroll */
    if( $('#content > .vc_row').is('[id]') ) {
        var opn_lock = 0;
        $(window).on( 'load scroll', function() {
            var opn_lock_scroll = 0;
            if( opn_lock == 0 ) {
                $('#content > .vc_row').each( function() {
                    if( opn_lock_scroll == 0 && $(this).is('[id]') && $(this).isInViewport() ) {
                        var opn_find_url = document.location.protocol +"//"+ document.location.hostname + document.location.pathname;
                        var opn_find = 'a[href="'+opn_find_url+'#'+$(this).attr('id')+'"]';
                        if( $(opn_find).length ) {
                            $(opn_find).closest('ul.sh-nav').find('li.current_page_item').removeClass('current_page_item');
                            $(opn_find).parent().addClass('current_page_item');
                        }
                        opn_lock_scroll = 1;
                    }
                });

                if( $(window).scrollTop() == 0 ) {
                    var opn_find_url = document.location.protocol +"//"+ document.location.hostname + document.location.pathname;
                    var opn_find = 'a[href="'+opn_find_url+'#backtotop"]';
                    if( $(opn_find).length ) {
                        $(opn_find).closest('ul.sh-nav').find('li.current_page_item').removeClass('current_page_item');
                        $(opn_find).parent().addClass('current_page_item');
                    }
                }
            }

        });
    }


    /* One Page Navigation - Click */
    $('header.primary-desktop .sh-nav a').on( 'click', function() {
        var opn_current = '';
        if( $(this).is('[href]') ) {
            if( $(this).attr('href').length ) {
                var opn_current = 'div#'+$(this).attr('href').replace(/^.*?(#|$)/,'');
            } else {
                return false;
            }
        }

        if( $(opn_current).length || opn_current == 'div#backtotop' ) {

            $(this).closest('ul.sh-nav').find('li.current_page_item').removeClass('current_page_item');
            $(this).parent().addClass('current_page_item');
            opn_lock = 1;

            setTimeout(function() {
                opn_lock = 0;
            }, 3000);

        }
    });


});


/* Load functions */
(function( $ ){

    /* Shufflehound Carousel */
    $.fn.isInViewport = function() {
        var elementTop = $(this).offset().top;
        var elementBottom = elementTop + $(this).outerHeight();

        var viewportTop = $(window).scrollTop();
        var viewportBottom = viewportTop + $(window).height();

        return elementBottom > viewportTop && elementTop < viewportBottom;
    };

    $.fn.sh_carousel = function() {

        /* Prepair Carusel */
        $(this).html( '<div class="sh-carousel-items">' + $(this).html() + '</div>' );
        var self_main = $(this);
        var self = $(this).find('.sh-carousel-items');
        self.find('.blog-textslider-post:first-child').addClass( 'sh-active' );


        /* Add Buttons */
        self_main.append( '<span class="sh-carousel-buttons sh-carousel-buttons-styling"></span>' );
        self_main.find( '.sh-carousel-buttons' ).append( '<span class="sh-carousel-prev"><i class="icon icon-arrow-left-circle"></i></span>' );
        self_main.find( '.sh-carousel-buttons' ).append( '<span class="sh-carousel-next"><i class="icon icon-arrow-right-circle"></i></span>' );


        /* Add Button Actions */
        self_main.find('.sh-carousel-prev').on( 'click', function() {
            var active = self.find( '.blog-textslider-post.sh-active' );
            var prev = active.prev();

            /* If one the last slide */
            if( !prev.length ) {
                prev = self.find( '.blog-textslider-post:last-child' );
            }

            active.removeClass( 'sh-active' );
            prev.addClass( 'sh-active' );
        });

        self_main.find('.sh-carousel-next').on( 'click', function() {
            if( self.isInViewport() && !document.hidden ) {
                var active = self.find( '.blog-textslider-post.sh-active' );
                var next = active.next();

                /* If one the last slide */
                if( !next.length ) {
                    next = self.find( '.blog-textslider-post:first-child' );
                }

                active.removeClass( 'sh-active' );
                next.addClass( 'sh-active' );
            }
        });


        /* Start Carousel */
        var speed = 5000;
        var run = setInterval( function(){ self_main.find('.sh-carousel-next').trigger('click'); }, speed);
        self_main.hover(
            function() {
                clearInterval(run);
            },
            function() {
                 run = setInterval( function(){ self_main.find('.sh-carousel-next').trigger('click'); }, speed);
            }
        );

    }

})( jQuery );



/*
** Portfolio Fancy Image Loading
*/
window.addEventListener( 'load', function() {
    jQuery( function($) {
        var $portfolio2 = $('.sh-portfolio-fancy');
        $portfolio2.imagesLoaded( function() {
            var time = 0;
            $('.sh-portfolio-fancy').find('.sh-portfolio-fancy-item').each( function() {

                var self = $(this);
                if( self.isVisible() ) {
                    setTimeout( function(){
                        self.addClass( 'sh-portfolio-fancy-item-active' );
                    }, time);
                    time += 300;
                } else if( self.isVisibleAbove() ) {
                    self.addClass( 'sh-portfolio-fancy-item-active' );
                }

            });
            $portfolio2.isotope('layout');
        });

        $(window).scroll(function() {
            clearTimeout(window.scrollFinished);
            window.scrollFinished = setTimeout(function(){

                var time2 = 0;
                $('.sh-portfolio-fancy').find('.sh-portfolio-fancy-item:not(.sh-portfolio-fancy-item-active)').each( function() {
                    var self = $(this);
                    if( self.isVisible() ) {
                        setTimeout( function(){
                            self.addClass( 'sh-portfolio-fancy-item-active' );
                        }, time2);
                        time2 += 300;
                    }
                });

            }, 100);
        });
    });
});




/*
** Font Awesome migration from 4 to 5 version
*/
/*jQuery( function($) {
    var icons = {
        "fa-500px": "fab fa-500px",
        "fa-address-book-o": "far fa-address-book",
        "fa-address-card-o": "far fa-address-card",
        "fa-adn": "fab fa-adn",
        "fa-amazon": "fab fa-amazon",
        "fa-android": "fab fa-android",
        "fa-angellist": "fab fa-angellist",
        "fa-apple": "fab fa-apple",
        "fa-area-chart": "fas fa-chart-area",
        "fa-arrow-circle-o-down": "far fa-arrow-alt-circle-down",
        "fa-arrow-circle-o-left": "far fa-arrow-alt-circle-left",
        "fa-arrow-circle-o-right": "far fa-arrow-alt-circle-right",
        "fa-arrow-circle-o-up": "far fa-arrow-alt-circle-up",
        "fa-arrows": "fas fa-arrows-alt",
        "fa-arrows-alt": "fas fa-expand-arrows-alt",
        "fa-arrows-h": "fas fa-arrows-alt-h",
        "fa-arrows-v": "fas fa-arrows-alt-v",
        "fa-asl-interpreting": "fas fa-american-sign-language-interpreting",
        "fa-automobile": "fas fa-car",
        "fa-bandcamp": "fab fa-bandcamp",
        "fa-bank": "fas fa-university",
        "fa-bar-chart": "far fa-chart-bar",
        "fa-bar-chart-o": "far fa-chart-bar",
        "fa-bathtub": "fas fa-bath",
        "fa-battery": "fas fa-battery-full",
        "fa-battery-0": "fas fa-battery-empty",
        "fa-battery-1": "fas fa-battery-quarter",
        "fa-battery-2": "fas fa-battery-half",
        "fa-battery-3": "fas fa-battery-three-quarters",
        "fa-battery-4": "fas fa-battery-full",
        "fa-behance": "fab fa-behance",
        "fa-behance-square": "fab fa-behance-square",
        "fa-bell-o": "far fa-bell",
        "fa-bell-slash-o": "far fa-bell-slash",
        "fa-bitbucket": "fab fa-bitbucket",
        "fa-bitbucket-square": "fab fa-bitbucket",
        "fa-bitcoin": "fab fa-btc",
        "fa-black-tie": "fab fa-black-tie",
        "fa-bluetooth": "fab fa-bluetooth",
        "fa-bluetooth-b": "fab fa-bluetooth-b",
        "fa-bookmark-o": "far fa-bookmark",
        "fa-btc": "fab fa-btc",
        "fa-building-o": "far fa-building",
        "fa-buysellads": "fab fa-buysellads",
        "fa-cab": "fas fa-taxi",
        "fa-calendar": "fas fa-calendar-alt",
        "fa-calendar-check-o": "far fa-calendar-check",
        "fa-calendar-minus-o": "far fa-calendar-minus",
        "fa-calendar-o": "far fa-calendar",
        "fa-calendar-plus-o": "far fa-calendar-plus",
        "fa-calendar-times-o": "far fa-calendar-times",
        "fa-caret-square-o-down": "far fa-caret-square-down",
        "fa-caret-square-o-left": "far fa-caret-square-left",
        "fa-caret-square-o-right": "far fa-caret-square-right",
        "fa-caret-square-o-up": "far fa-caret-square-up",
        "fa-cc": "far fa-closed-captioning",
        "fa-cc-amex": "fab fa-cc-amex",
        "fa-cc-diners-club": "fab fa-cc-diners-club",
        "fa-cc-discover": "fab fa-cc-discover",
        "fa-cc-jcb": "fab fa-cc-jcb",
        "fa-cc-mastercard": "fab fa-cc-mastercard",
        "fa-cc-paypal": "fab fa-cc-paypal",
        "fa-cc-stripe": "fab fa-cc-stripe",
        "fa-cc-visa": "fab fa-cc-visa",
        "fa-chain": "fas fa-link",
        "fa-chain-broken": "fas fa-unlink",
        "fa-check-circle-o": "far fa-check-circle",
        "fa-check-square-o": "far fa-check-square",
        "fa-chrome": "fab fa-chrome",
        "fa-circle-o": "far fa-circle",
        "fa-circle-o-notch": "fas fa-circle-notch",
        "fa-circle-thin": "far fa-circle",
        "fa-clipboard": "far fa-clipboard",
        "fa-clock-o": "far fa-clock",
        "fa-clone": "far fa-clone",
        "fa-close": "fas fa-times",
        "fa-cloud-download": "fas fa-cloud-download-alt",
        "fa-cloud-upload": "fas fa-cloud-upload-alt",
        "fa-cny": "fas fa-yen-sign",
        "fa-code-fork": "fas fa-code-branch",
        "fa-codepen": "fab fa-codepen",
        "fa-codiepie": "fab fa-codiepie",
        "fa-comment-o": "far fa-comment",
        "fa-commenting": "far fa-comment-dots",
        "fa-commenting-o": "far fa-comment-dots",
        "fa-comments-o": "far fa-comments",
        "fa-compass": "far fa-compass",
        "fa-connectdevelop": "fab fa-connectdevelop",
        "fa-contao": "fab fa-contao",
        "fa-copyright": "far fa-copyright",
        "fa-creative-commons": "fab fa-creative-commons",
        "fa-credit-card": "far fa-credit-card",
        "fa-credit-card-alt": "fas fa-credit-card",
        "fa-css3": "fab fa-css3",
        "fa-cutlery": "fas fa-utensils",
        "fa-dashboard": "fas fa-tachometer-alt",
        "fa-dashcube": "fab fa-dashcube",
        "fa-deafness": "fas fa-deaf",
        "fa-dedent": "fas fa-outdent",
        "fa-delicious": "fab fa-delicious",
        "fa-deviantart": "fab fa-deviantart",
        "fa-diamond": "far fa-gem",
        "fa-digg": "fab fa-digg",
        "fa-dollar": "fas fa-dollar-sign",
        "fa-dot-circle-o": "far fa-dot-circle",
        "fa-dribbble": "fab fa-dribbble",
        "fa-drivers-license": "fas fa-id-card",
        "fa-drivers-license-o": "far fa-id-card",
        "fa-dropbox": "fab fa-dropbox",
        "fa-drupal": "fab fa-drupal",
        "fa-edge": "fab fa-edge",
        "fa-eercast": "fab fa-sellcast",
        "fa-empire": "fab fa-empire",
        "fa-envelope-o": "far fa-envelope",
        "fa-envelope-open-o": "far fa-envelope-open",
        "fa-envira": "fab fa-envira",
        "fa-etsy": "fab fa-etsy",
        "fa-eur": "fas fa-euro-sign",
        "fa-euro": "fas fa-euro-sign",
        "fa-exchange": "fas fa-exchange-alt",
        "fa-expeditedssl": "fab fa-expeditedssl",
        "fa-external-link": "fas fa-external-link-alt",
        "fa-external-link-square": "fas fa-external-link-square-alt",
        "fa-eye": "far fa-eye",
        "fa-eye-slash": "far fa-eye-slash",
        "fa-eyedropper": "fas fa-eye-dropper",
        "fa-fa": "fab fa-font-awesome",
        "fa-facebook": "fab fa-facebook-f",
        "fa-facebook-f": "fab fa-facebook-f",
        "fa-facebook-official": "fab fa-facebook",
        "fa-facebook-square": "fab fa-facebook-square",
        "fa-feed": "fas fa-rss",
        "fa-file-archive-o": "far fa-file-archive",
        "fa-file-audio-o": "far fa-file-audio",
        "fa-file-code-o": "far fa-file-code",
        "fa-file-excel-o": "far fa-file-excel",
        "fa-file-image-o": "far fa-file-image",
        "fa-file-movie-o": "far fa-file-video",
        "fa-file-o": "far fa-file",
        "fa-file-pdf-o": "far fa-file-pdf",
        "fa-file-photo-o": "far fa-file-image",
        "fa-file-picture-o": "far fa-file-image",
        "fa-file-powerpoint-o": "far fa-file-powerpoint",
        "fa-file-sound-o": "far fa-file-audio",
        "fa-file-text": "fas fa-file-alt",
        "fa-file-text-o": "far fa-file-alt",
        "fa-file-video-o": "far fa-file-video",
        "fa-file-word-o": "far fa-file-word",
        "fa-file-zip-o": "far fa-file-archive",
        "fa-files-o": "far fa-copy",
        "fa-firefox": "fab fa-firefox",
        "fa-first-order": "fab fa-first-order",
        "fa-flag-o": "far fa-flag",
        "fa-flash": "fas fa-bolt",
        "fa-flickr": "fab fa-flickr",
        "fa-floppy-o": "far fa-save",
        "fa-folder-o": "far fa-folder",
        "fa-folder-open-o": "far fa-folder-open",
        "fa-font-awesome": "fab fa-font-awesome",
        "fa-fonticons": "fab fa-fonticons",
        "fa-fort-awesome": "fab fa-fort-awesome",
        "fa-forumbee": "fab fa-forumbee",
        "fa-foursquare": "fab fa-foursquare",
        "fa-free-code-camp": "fab fa-free-code-camp",
        "fa-frown-o": "far fa-frown",
        "fa-futbol-o": "far fa-futbol",
        "fa-gbp": "fas fa-pound-sign",
        "fa-ge": "fab fa-empire",
        "fa-gear": "fas fa-cog",
        "fa-gears": "fas fa-cogs",
        "fa-get-pocket": "fab fa-get-pocket",
        "fa-gg": "fab fa-gg",
        "fa-gg-circle": "fab fa-gg-circle",
        "fa-git": "fab fa-git",
        "fa-git-square": "fab fa-git-square",
        "fa-github": "fab fa-github",
        "fa-github-alt": "fab fa-github-alt",
        "fa-github-square": "fab fa-github-square",
        "fa-gitlab": "fab fa-gitlab",
        "fa-gittip": "fab fa-gratipay",
        "fa-glass": "fas fa-glass-martini",
        "fa-glide": "fab fa-glide",
        "fa-glide-g": "fab fa-glide-g",
        "fa-google": "fab fa-google",
        "fa-google-plus": "fab fa-google-plus-g",
        "fa-google-plus-circle": "fab fa-google-plus",
        "fa-google-plus-official": "fab fa-google-plus",
        "fa-google-plus-square": "fab fa-google-plus-square",
        "fa-google-wallet": "fab fa-google-wallet",
        "fa-gratipay": "fab fa-gratipay",
        "fa-grav": "fab fa-grav",
        "fa-group": "fas fa-users",
        "fa-hacker-news": "fab fa-hacker-news",
        "fa-hand-grab-o": "far fa-hand-rock",
        "fa-hand-lizard-o": "far fa-hand-lizard",
        "fa-hand-o-down": "far fa-hand-point-down",
        "fa-hand-o-left": "far fa-hand-point-left",
        "fa-hand-o-right": "far fa-hand-point-right",
        "fa-hand-o-up": "far fa-hand-point-up",
        "fa-hand-paper-o": "far fa-hand-paper",
        "fa-hand-peace-o": "far fa-hand-peace",
        "fa-hand-pointer-o": "far fa-hand-pointer",
        "fa-hand-rock-o": "far fa-hand-rock",
        "fa-hand-scissors-o": "far fa-hand-scissors",
        "fa-hand-spock-o": "far fa-hand-spock",
        "fa-hand-stop-o": "far fa-hand-paper",
        "fa-handshake-o": "far fa-handshake",
        "fa-hard-of-hearing": "fas fa-deaf",
        "fa-hdd-o": "far fa-hdd",
        "fa-header": "fas fa-heading",
        "fa-heart": "far fa-heart",
        "fa-heart-o": "far fa-heart",
        "fa-hospital-o": "far fa-hospital",
        "fa-hotel": "fas fa-bed",
        "fa-hourglass-1": "fas fa-hourglass-start",
        "fa-hourglass-2": "fas fa-hourglass-half",
        "fa-hourglass-3": "fas fa-hourglass-end",
        "fa-hourglass-o": "far fa-hourglass",
        "fa-houzz": "fab fa-houzz",
        "fa-html5": "fab fa-html5",
        "fa-id-badge": "far fa-id-badge",
        "fa-id-card-o": "far fa-id-card",
        "fa-ils": "fas fa-shekel-sign",
        "fa-image": "far fa-image",
        "fa-imdb": "fab fa-imdb",
        "fa-inr": "fas fa-rupee-sign",
        "fa-instagram": "fab fa-instagram",
        "fa-institution": "fas fa-university",
        "fa-internet-explorer": "fab fa-internet-explorer",
        "fa-intersex": "fas fa-transgender",
        "fa-ioxhost": "fab fa-ioxhost",
        "fa-joomla": "fab fa-joomla",
        "fa-jpy": "fas fa-yen-sign",
        "fa-jsfiddle": "fab fa-jsfiddle",
        "fa-keyboard-o": "far fa-keyboard",
        "fa-krw": "fas fa-won-sign",
        "fa-lastfm": "fab fa-lastfm",
        "fa-lastfm-square": "fab fa-lastfm-square",
        "fa-leanpub": "fab fa-leanpub",
        "fa-legal": "fas fa-gavel",
        "fa-lemon-o": "far fa-lemon",
        "fa-level-down": "fas fa-level-down-alt",
        "fa-level-up": "fas fa-level-up-alt",
        "fa-life-bouy": "far fa-life-ring",
        "fa-life-buoy": "far fa-life-ring",
        "fa-life-ring": "far fa-life-ring",
        "fa-life-saver": "far fa-life-ring",
        "fa-lightbulb-o": "far fa-lightbulb",
        "fa-line-chart": "fas fa-chart-line",
        "fa-linkedin": "fab fa-linkedin-in",
        "fa-linkedin-square": "fab fa-linkedin",
        "fa-linode": "fab fa-linode",
        "fa-linux": "fab fa-linux",
        "fa-list-alt": "far fa-list-alt",
        "fa-long-arrow-down": "fas fa-long-arrow-alt-down",
        "fa-long-arrow-left": "fas fa-long-arrow-alt-left",
        "fa-long-arrow-right": "fas fa-long-arrow-alt-right",
        "fa-long-arrow-up": "fas fa-long-arrow-alt-up",
        "fa-mail-forward": "fas fa-share",
        "fa-mail-reply": "fas fa-reply",
        "fa-mail-reply-all": "fas fa-reply-all",
        "fa-map-marker": "fas fa-map-marker-alt",
        "fa-map-o": "far fa-map",
        "fa-maxcdn": "fab fa-maxcdn",
        "fa-meanpath": "fab fa-font-awesome",
        "fa-medium": "fab fa-medium",
        "fa-meetup": "fab fa-meetup",
        "fa-meh-o": "far fa-meh",
        "fa-minus-square-o": "far fa-minus-square",
        "fa-mixcloud": "fab fa-mixcloud",
        "fa-mobile": "fas fa-mobile-alt",
        "fa-mobile-phone": "fas fa-mobile-alt",
        "fa-modx": "fab fa-modx",
        "fa-money": "far fa-money-bill-alt",
        "fa-moon-o": "far fa-moon",
        "fa-mortar-board": "fas fa-graduation-cap",
        "fa-navicon": "fas fa-bars",
        "fa-newspaper-o": "far fa-newspaper",
        "fa-object-group": "far fa-object-group",
        "fa-object-ungroup": "far fa-object-ungroup",
        "fa-odnoklassniki": "fab fa-odnoklassniki",
        "fa-odnoklassniki-square": "fab fa-odnoklassniki-square",
        "fa-opencart": "fab fa-opencart",
        "fa-openid": "fab fa-openid",
        "fa-opera": "fab fa-opera",
        "fa-optin-monster": "fab fa-optin-monster",
        "fa-pagelines": "fab fa-pagelines",
        "fa-paper-plane-o": "far fa-paper-plane",
        "fa-paste": "far fa-clipboard",
        "fa-pause-circle-o": "far fa-pause-circle",
        "fa-paypal": "fab fa-paypal",
        "fa-pencil": "fas fa-pencil-alt",
        "fa-pencil-square": "fas fa-pen-square",
        "fa-pencil-square-o": "far fa-edit",
        "fa-photo": "far fa-image",
        "fa-picture-o": "far fa-image",
        "fa-pie-chart": "fas fa-chart-pie",
        "fa-pied-piper": "fab fa-pied-piper",
        "fa-pied-piper-alt": "fab fa-pied-piper-alt",
        "fa-pied-piper-pp": "fab fa-pied-piper-pp",
        "fa-pinterest": "fab fa-pinterest",
        "fa-pinterest-p": "fab fa-pinterest-p",
        "fa-pinterest-square": "fab fa-pinterest-square",
        "fa-play-circle-o": "far fa-play-circle",
        "fa-plus-square-o": "far fa-plus-square",
        "fa-product-hunt": "fab fa-product-hunt",
        "fa-qq": "fab fa-qq",
        "fa-question-circle-o": "far fa-question-circle",
        "fa-quora": "fab fa-quora",
        "fa-ra": "fab fa-rebel",
        "fa-ravelry": "fab fa-ravelry",
        "fa-rebel": "fab fa-rebel",
        "fa-reddit": "fab fa-reddit",
        "fa-reddit-alien": "fab fa-reddit-alien",
        "fa-reddit-square": "fab fa-reddit-square",
        "fa-refresh": "fas fa-sync",
        "fa-registered": "far fa-registered",
        "fa-remove": "fas fa-times",
        "fa-renren": "fab fa-renren",
        "fa-reorder": "fas fa-bars",
        "fa-repeat": "fas fa-redo",
        "fa-resistance": "fab fa-rebel",
        "fa-rmb": "fas fa-yen-sign",
        "fa-rotate-left": "fas fa-undo",
        "fa-rotate-right": "fas fa-redo",
        "fa-rouble": "fas fa-ruble-sign",
        "fa-rub": "fas fa-ruble-sign",
        "fa-ruble": "fas fa-ruble-sign",
        "fa-rupee": "fas fa-rupee-sign",
        "fa-s15": "fas fa-bath",
        "fa-safari": "fab fa-safari",
        "fa-scissors": "fas fa-cut",
        "fa-scribd": "fab fa-scribd",
        "fa-sellsy": "fab fa-sellsy",
        "fa-send": "fas fa-paper-plane",
        "fa-send-o": "far fa-paper-plane",
        "fa-share-square-o": "far fa-share-square",
        "fa-shekel": "fas fa-shekel-sign",
        "fa-sheqel": "fas fa-shekel-sign",
        "fa-shield": "fas fa-shield-alt",
        "fa-shirtsinbulk": "fab fa-shirtsinbulk",
        "fa-sign-in": "fas fa-sign-in-alt",
        "fa-sign-out": "fas fa-sign-out-alt",
        "fa-signing": "fas fa-sign-language",
        "fa-simplybuilt": "fab fa-simplybuilt",
        "fa-skyatlas": "fab fa-skyatlas",
        "fa-skype": "fab fa-skype",
        "fa-slack": "fab fa-slack",
        "fa-sliders": "fas fa-sliders-h",
        "fa-slideshare": "fab fa-slideshare",
        "fa-smile-o": "far fa-smile",
        "fa-snapchat": "fab fa-snapchat",
        "fa-snapchat-ghost": "fab fa-snapchat-ghost",
        "fa-snapchat-square": "fab fa-snapchat-square",
        "fa-snowflake-o": "far fa-snowflake",
        "fa-soccer-ball-o": "far fa-futbol",
        "fa-sort-alpha-asc": "fas fa-sort-alpha-down",
        "fa-sort-alpha-desc": "fas fa-sort-alpha-up",
        "fa-sort-amount-asc": "fas fa-sort-amount-down",
        "fa-sort-amount-desc": "fas fa-sort-amount-up",
        "fa-sort-asc": "fas fa-sort-up",
        "fa-sort-desc": "fas fa-sort-down",
        "fa-sort-numeric-asc": "fas fa-sort-numeric-down",
        "fa-sort-numeric-desc": "fas fa-sort-numeric-up",
        "fa-soundcloud": "fab fa-soundcloud",
        "fa-spoon": "fas fa-utensil-spoon",
        "fa-spotify": "fab fa-spotify",
        "fa-square-o": "far fa-square",
        "fa-stack-exchange": "fab fa-stack-exchange",
        "fa-stack-overflow": "fab fa-stack-overflow",
        "fa-star-half-empty": "far fa-star-half",
        "fa-star-half-full": "far fa-star-half",
        "fa-star-half-o": "far fa-star-half",
        "fa-star-o": "far fa-star",
        "fa-steam": "fab fa-steam",
        "fa-steam-square": "fab fa-steam-square",
        "fa-sticky-note-o": "far fa-sticky-note",
        "fa-stop-circle-o": "far fa-stop-circle",
        "fa-stumbleupon": "fab fa-stumbleupon",
        "fa-stumbleupon-circle": "fab fa-stumbleupon-circle",
        "fa-sun-o": "far fa-sun",
        "fa-superpowers": "fab fa-superpowers",
        "fa-support": "far fa-life-ring",
        "fa-tablet": "fas fa-tablet-alt",
        "fa-tachometer": "fas fa-tachometer-alt",
        "fa-telegram": "fab fa-telegram",
        "fa-television": "fas fa-tv",
        "fa-tencent-weibo": "fab fa-tencent-weibo",
        "fa-themeisle": "fab fa-themeisle",
        "fa-thermometer": "fas fa-thermometer-full",
        "fa-thermometer-0": "fas fa-thermometer-empty",
        "fa-thermometer-1": "fas fa-thermometer-quarter",
        "fa-thermometer-2": "fas fa-thermometer-half",
        "fa-thermometer-3": "fas fa-thermometer-three-quarters",
        "fa-thermometer-4": "fas fa-thermometer-full",
        "fa-thumb-tack": "fas fa-thumbtack",
        "fa-thumbs-o-down": "far fa-thumbs-down",
        "fa-thumbs-o-up": "far fa-thumbs-up",
        "fa-ticket": "fas fa-ticket-alt",
        "fa-times-circle-o": "far fa-times-circle",
        "fa-times-rectangle": "fas fa-window-close",
        "fa-times-rectangle-o": "far fa-window-close",
        "fa-toggle-down": "far fa-caret-square-down",
        "fa-toggle-left": "far fa-caret-square-left",
        "fa-toggle-right": "far fa-caret-square-right",
        "fa-toggle-up": "far fa-caret-square-up",
        "fa-trash": "fas fa-trash-alt",
        "fa-trash-o": "far fa-trash-alt",
        "fa-trello": "fab fa-trello",
        "fa-tripadvisor": "fab fa-tripadvisor",
        "fa-try": "fas fa-lira-sign",
        "fa-tumblr": "fab fa-tumblr",
        "fa-tumblr-square": "fab fa-tumblr-square",
        "fa-turkish-lira": "fas fa-lira-sign",
        "fa-twitch": "fab fa-twitch",
        "fa-twitter": "fab fa-twitter",
        "fa-twitter-square": "fab fa-twitter-square",
        "fa-unsorted": "fas fa-sort",
        "fa-usb": "fab fa-usb",
        "fa-usd": "fas fa-dollar-sign",
        "fa-user-circle-o": "far fa-user-circle",
        "fa-user-o": "far fa-user",
        "fa-vcard": "fas fa-address-card",
        "fa-vcard-o": "far fa-address-card",
        "fa-viacoin": "fab fa-viacoin",
        "fa-viadeo": "fab fa-viadeo",
        "fa-viadeo-square": "fab fa-viadeo-square",
        "fa-video-camera": "fas fa-video",
        "fa-vimeo": "fab fa-vimeo-v",
        "fa-vimeo-square": "fab fa-vimeo-square",
        "fa-vine": "fab fa-vine",
        "fa-vk": "fab fa-vk",
        "fa-volume-control-phone": "fas fa-phone-volume",
        "fa-warning": "fas fa-exclamation-triangle",
        "fa-wechat": "fab fa-weixin",
        "fa-weibo": "fab fa-weibo",
        "fa-weixin": "fab fa-weixin",
        "fa-whatsapp": "fab fa-whatsapp",
        "fa-wheelchair-alt": "fab fa-accessible-icon",
        "fa-wikipedia-w": "fab fa-wikipedia-w",
        "fa-window-close-o": "far fa-window-close",
        "fa-window-maximize": "far fa-window-maximize",
        "fa-window-restore": "far fa-window-restore",
        "fa-windows": "fab fa-windows",
        "fa-won": "fas fa-won-sign",
        "fa-wordpress": "fab fa-wordpress",
        "fa-wpbeginner": "fab fa-wpbeginner",
        "fa-wpexplorer": "fab fa-wpexplorer",
        "fa-wpforms": "fab fa-wpforms",
        "fa-xing": "fab fa-xing",
        "fa-xing-square": "fab fa-xing-square",
        "fa-y-combinator": "fab fa-y-combinator",
        "fa-y-combinator-square": "fab fa-hacker-news",
        "fa-yahoo": "fab fa-yahoo",
        "fa-yc": "fab fa-y-combinator",
        "fa-yc-square": "fab fa-hacker-news",
        "fa-yelp": "fab fa-yelp",
        "fa-yen": "fas fa-yen-sign",
        "fa-yoast": "fab fa-yoast",
        "fa-youtube": "fab fa-youtube",
        "fa-youtube-play": "fab fa-youtube",
        "fa-youtube-square": "fab fa-youtube-square",
    };

    $.each( icons, function( fa4, fa5 ) {
        $( '.fa.'+fa4 ).removeClass('fa').removeClass(fa4).addClass(fa5);
    });
});
*/
