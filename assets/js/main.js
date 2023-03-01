/*********************************************************************************

	Template Name: Belle - Multipurpose eCommerce Bootstrap4 HTML Template
	Description: A perfect template to build beautiful and unique Glasses websites. It comes with nice and clean design.
	Version: 1.0

**********************************************************************************/

/*************************************************
  1. Preloader Loading
  2. Promotional Bar Header
  3. Currency Show/Hide dropdown  
  4. Language Show/Hide dropdown
  5. Top Links Show/Hide dropdown
  6. Minicart Dropdown
  7. Sticky Header
  8. Search Trigger
  9. Mobile Menu
  10 Slick Slider
	 10.1 Homepage Slideshow 
	 10.2 Product Slider Slick
	 10.3 Product Slider Slick Style2
	 10.4 Product Slider Slick Style3
	 10.5 Product Slider Slick Fullwidth
	 10.6 Product Slider Slick Product Page
	 10.7 Collection Slider Slick
	 10.8 Collection Slider Slick 4 items
	 10.9 Logo Slider Slick
	 10.10 Testimonial Slider Slick
  11. Tabs With Accordian Responsive
  12. Sidebar Categories Level links
  13. Price Range Slider
  14. Color Swacthes
  15. Footer links for mobiles
  16. Site Animation
  17. SHOW HIDE PRODUCT TAG
  18. SHOW HIDE PRODUCT Filters
  19. Timer Count Down
  20. Scroll Top
  21. Height Product Grid Image
  22. Product details slider 2
  23. Product details slider 1
  24. Product Zoom
  25. Product Page Popup
  26. Quantity Plus Minus
  27. Visitor Fake Message
  28. Product Tabs
  29. Promotion / Notification Cookie Bar 
  30. Image to background js
  31. COLOR SWATCH ON COLLECTION PAGE
  32. Related Product Slider
  33. Infinite Scroll js
*************************************************/
// var a = 0;
// $(window).scroll(function() {

//     var oTop = $('#dome-section').offset().top - window.innerHeight;
//     if (a == 0 && $(window).scrollTop() > oTop) {
//         let valuesDisplays = document.querySelectorAll('.counter-number');
//         let interval = 1000;
//         valuesDisplays.forEach((valuesDisplay) => {
//             let startValue = 0;
//             let endValue = parseInt(valuesDisplay.getAttribute("data-val"));
//             let duration = Math.floor(interval / endValue);
//             let counter = setInterval(function() {
//                 startValue += 1;
//                 valuesDisplay.textContent = startValue;
//                 if (startValue == endValue) {
//                     clearInterval(counter);
//                 }
//             }, duration)
//         });
//     }
// });


$('.counter-number').each(function() {
    let $this = $(this),
        countTo = $this.attr('data-val');
    
    $({ countNum: $this.text()}).animate({
      countNum: countTo
    },
  
    {
      duration: 6000,
      easing:'linear',
      step: function() {
        $this.text(Math.floor(this.countNum));
      },
      complete: function() {
        $this.text(this.countNum);
      }
    });  
    
  
  });
(function($) {
    // Start of use strict
    'use strict';

    /*-----------------------------------------
	  1. Preloader Loading ----------------------- 
	  -----------------------------------------*/
    function pre_loader() {
        $("#load").fadeOut();
        $('#pre-loader').delay(0).fadeOut('slow');
    }
    pre_loader();

    /*-----------------------------------------
     2. Promotional Bar Header ------------------
      -----------------------------------------*/
    function promotional_bar() {
        $(".closeHeader").on('click', function() {
            $(".promotion-header").slideUp();
            Cookies.set('promotion', 'true', { expires: 1 });
            return false;
        });
    }
    promotional_bar();

    /*-----------------------------------------
     3. Currency Show/Hide dropdown -----------
      -----------------------------------------*/
    function currency_dropdown() {
        $(".selected-currency").on("click", function() {
            $("#currencies").slideToggle();
        });
        $("#currencies li").on("click", function() {
            $(this).parent().slideUp();
        });
    }
    currency_dropdown();

    /*-----------------------------------------
      4. Language Show/Hide dropdown ----------
      -----------------------------------------*/
    function language_dropdown() {
        $(".language-dd").on("click", function() {
            $("#language").slideToggle();
        });
        $("#language li").on("click", function() {
            $(this).parent().slideUp();
        });
    }
    language_dropdown();

    /*-----------------------------------------
      5. Top Links Show/Hide dropdown ---------
      -----------------------------------------*/
    function userlink_dropdown() {
        $('.top-header .user-menu').on("click", function() {
            if ($(window).width() < 990) {
                $(this).next().slideToggle(300);
                $(this).parent().toggleClass("active");
            }
        });
    }
    userlink_dropdown();

    /*-----------------------------------------
     6. Minicart Dropdown ---------------------
     ------------------------------------------ */
    function minicart_dropdown() {
        // $(".site-header__cart").on("click", function(i) {
        //     i.preventDefault();
        //     $("#header-cart").slideToggle();
        // });
        // Hide Cart on document click
        // $("body").on("click", function(event) {
        //     var $target = $(event.target);
        //     if (!$target.parents().is(".site-cart") && !$target.is(".site-cart")) {
        //         $("body").find("#header-cart").slideUp();
        //     }
        // });
    }
    minicart_dropdown();

    /*-----------------------------------------
      7. Sticky Header ------------------------
      -----------------------------------------*/
    window.onscroll = function() { myFunction() };

    function myFunction() {
        if ($(window).width() > 300) {
            if ($(window).scrollTop() > 145) {
                $('.header-wrap').addClass("stickyNav animated fadeInDown");
            } else {
                $('.header-wrap').removeClass("stickyNav fadeInDown");
            }
        }
    }

    /*-----------------------------------------
      8. Search Trigger -----------------------
      ----------------------------------------- */
    function search_bar() {
        $('.search-trigger').on('click', function() {
            const search = $('.search');

            if (search.is('.search--opened')) {
                search.removeClass('search--opened');
            } else {
                search.addClass('search--opened');
                $('.search__input')[0].focus();
            }
        });
    }
    search_bar();
    $(document).on('click', function(event) {
        if (!$(event.target).closest('.search, .search-trigger').length) {
            $('.search').removeClass('search--opened');
        }
    });

    /*-----------------------------------------
      9. Mobile Menu --------------------------
      -----------------------------------------*/
    var selectors = {
        body: 'body',
        sitenav: '#siteNav',
        navLinks: '#siteNav .lvl1 > a',
        menuToggle: '.js-mobile-nav-toggle',
        mobilenav: '.mobile-nav-wrapper',
        menuLinks: '#MobileNav .dropdownmenubar',
        closemenu: '.closemobileMenu'
    };

    $(selectors.navLinks).each(function() {
        if ($(this).attr('href') == window.location.pathname) $(this).addClass('active');
    })

    $(selectors.menuToggle).on("click", function() {
        body: 'body',
        $(selectors.mobilenav).toggleClass("active");
        $(selectors.body).toggleClass("menuOn");
        $(selectors.menuToggle).toggleClass('mobile-nav--open mobile-nav--close');
    });

    $(selectors.closemenu).on("click", function() {
        body: 'body',
        $(selectors.mobilenav).toggleClass("active");
        $(selectors.body).toggleClass("menuOn");
        $(selectors.menuToggle).toggleClass('mobile-nav--open mobile-nav--close');
    });
    $("body").on('click', function(event) {
        var $target = $(event.target);
        if (!$target.parents().is(selectors.mobilenav) && !$target.parents().is(selectors.menuToggle) && !$target.is(selectors.menuToggle)) {
            $(selectors.mobilenav).removeClass("active");
            $(selectors.body).removeClass("menuOn");
            $(selectors.menuToggle).removeClass('mobile-nav--close').addClass('mobile-nav--open');
        }
    });
    // $(selectors.menuLinks).on('click', function(e) {
    //     e.preventDefault();
    //     $(this).toggleClass('anm-plus-l anm-minus-l');
    //     $(this).parent().next().slideToggle();
    // });
    $(selectors.menuLinks).on('click', function(e) {
        e.preventDefault();
        $(this).children('.anm').toggleClass('anm-plus-l anm-minus-l');
        $(this).next('ul').slideToggle();
    });



    /*-----------------------------------------
      10.1 Homepage Slideshow -----------------
      -----------------------------------------*/
    function home_slider() {
        $('.home-slideshow').slick({
            dots: false,
            infinite: true,
            slidesToShow: 1,
            slidesToScroll: 1,
            fade: true,
            arrows: true,
            autoplay: true,
            autoplaySpeed: 4000,
            lazyLoad: 'ondemand'
        });
    }
    home_slider();

    // Full Size Banner on the Any Screen
    $(window).resize(function() {
        var bodyheight = $(this).height() - 20;
        $(".sliderFull .bg-size").height(bodyheight);
    }).resize();

    /*-----------------------------------------
      10.2 Product Slider Slick ---------------
      -----------------------------------------*/
    function product_slider() {
        $('.productSlider').slick({
            dots: false,
            infinite: true,
            slidesToShow: 4,
            slidesToScroll: 1,
            arrows: true,
            responsive: [{
                    breakpoint: 1024,
                    settings: {
                        slidesToShow: 3,
                        slidesToScroll: 1
                    }
                },
                {
                    breakpoint: 600,
                    settings: {
                        slidesToShow: 2,
                        slidesToScroll: 1
                    }
                },
                {
                    breakpoint: 480,
                    settings: {
                        slidesToShow: 1,
                        slidesToScroll: 1
                    }
                }
            ]

        });
    }
    product_slider();

    /*-----------------------------------------
      10.3 Product Slider Slick Style2 --------
      -----------------------------------------*/
    function product_slider1() {
        $('.productSlider-style1').slick({
            dots: false,
            infinite: true,
            slidesToShow: 3,
            slidesToScroll: 1,
            arrows: true,
            responsive: [{
                    breakpoint: 1024,
                    settings: {
                        slidesToShow: 3,
                        slidesToScroll: 1
                    }
                },
                {
                    breakpoint: 600,
                    settings: {
                        slidesToShow: 2,
                        slidesToScroll: 1
                    }
                },
                {
                    breakpoint: 480,
                    settings: {
                        slidesToShow: 1,
                        slidesToScroll: 1
                    }
                }
            ]
        });
    }
    product_slider1();

    /*-----------------------------------------
      10.4 Product Slider Slick Style3 --------
      -----------------------------------------*/
    function product_slider2() {
        $('.productSlider-style2').slick({
            dots: false,
            infinite: true,
            slidesToShow: 5,
            slidesToScroll: 1,
            arrows: true,
            responsive: [{
                    breakpoint: 1024,
                    settings: {
                        slidesToShow: 3,
                        slidesToScroll: 1
                    }
                },
                {
                    breakpoint: 600,
                    settings: {
                        slidesToShow: 2,
                        slidesToScroll: 1
                    }
                },
                {
                    breakpoint: 480,
                    settings: {
                        slidesToShow: 1,
                        slidesToScroll: 1
                    }
                }
            ]
        });
    }
    product_slider2();

    /*-----------------------------------------
      10.5 Product Slider Slick Fullwidth -----
      ----------------------------------------- */
    function product_slider_full() {
        $('.productSlider-fullwidth').slick({
            dots: false,
            infinite: true,
            slidesToShow: 6,
            slidesToScroll: 1,
            arrows: true,
            responsive: [{
                    breakpoint: 1024,
                    settings: {
                        slidesToShow: 3,
                        slidesToScroll: 1
                    }
                },
                {
                    breakpoint: 600,
                    settings: {
                        slidesToShow: 2,
                        slidesToScroll: 1
                    }
                },
                {
                    breakpoint: 480,
                    settings: {
                        slidesToShow: 1,
                        slidesToScroll: 1
                    }
                }
            ]
        });
    }
    product_slider_full();

    /*-----------------------------------------
      10.6 Product Slider Slick Product Page --
      ----------------------------------------- */
    function product_slider_ppage() {
        $('.productPageSlider').slick({
            dots: false,
            infinite: true,
            slidesToShow: 5,
            slidesToScroll: 1,
            arrows: true,
            responsive: [{
                    breakpoint: 1024,
                    settings: {
                        slidesToShow: 4,
                        slidesToScroll: 1
                    }
                },
                {
                    breakpoint: 680,
                    settings: {
                        slidesToShow: 2,
                        slidesToScroll: 1
                    }
                },
                {
                    breakpoint: 480,
                    settings: {
                        slidesToShow: 2,
                        slidesToScroll: 1
                    }
                },
                {
                    breakpoint: 380,
                    settings: {
                        slidesToShow: 1,
                        slidesToScroll: 1
                    }
                }
            ]
        });
    }
    product_slider_ppage();

    /*-----------------------------------------
      10.7 Collection Slider Slick ------------
      ----------------------------------------- */
    function collection_slider() {
        $('.collection-grid').slick({
            dots: false,
            infinite: true,
            slidesToShow: 5,
            slidesToScroll: 1,
            arrows: true,
            responsive: [{
                    breakpoint: 1024,
                    settings: {
                        slidesToShow: 4,
                        slidesToScroll: 1
                    }
                },
                {
                    breakpoint: 600,
                    settings: {
                        slidesToShow: 3,
                        slidesToScroll: 1
                    }
                },
                {
                    breakpoint: 480,
                    settings: {
                        slidesToShow: 2,
                        slidesToScroll: 1
                    }
                }
            ]
        });
    }
    collection_slider();

    /*-----------------------------------------
      10.8 Collection Slider Slick 4 items ----
      ----------------------------------------- */
    function collection_slider1() {
        $('.collection-grid-4item').slick({
            dots: false,
            infinite: true,
            slidesToShow: 4,
            slidesToScroll: 1,
            arrows: true,
            responsive: [{
                    breakpoint: 1024,
                    settings: {
                        slidesToShow: 3,
                        slidesToScroll: 1
                    }
                },
                {
                    breakpoint: 600,
                    settings: {
                        slidesToShow: 3,
                        slidesToScroll: 1
                    }
                },
                {
                    breakpoint: 480,
                    settings: {
                        slidesToShow: 2,
                        slidesToScroll: 1
                    }
                }
            ]
        });
    }
    collection_slider1();

    /*-----------------------------------------
      10.9 Logo Slider Slick ------------------
      -----------------------------------------*/
    function logo_slider() {
        $('.logo-bar').slick({
            dots: false,
            infinite: true,
            slidesToShow: 6,
            slidesToScroll: 1,
            arrows: true,
            responsive: [{
                    breakpoint: 1024,
                    settings: {
                        slidesToShow: 4,
                        slidesToScroll: 1
                    }
                },
                {
                    breakpoint: 600,
                    settings: {
                        slidesToShow: 3,
                        slidesToScroll: 1
                    }
                },
                {
                    breakpoint: 480,
                    settings: {
                        slidesToShow: 2,
                        slidesToScroll: 1
                    }
                }
            ]
        });
    }
    logo_slider();

    /*-----------------------------------------
      10.10 Testimonial Slider Slick ----------
      -----------------------------------------*/
    function testimonial_slider() {
        $('.quotes-slider').slick({
            dots: false,
            infinite: true,
            slidesToShow: 1,
            slidesToScroll: 1,
            arrows: true,
        });
    }
    testimonial_slider();

    /*-----------------------------------
      11. Tabs With Accordian Responsive
    -------------------------------------*/
    $(".tab_content").hide();
    $(".tab_content:first").show();

    /* if in tab mode */
    $("ul.tabs li").on('click', function() {
        $(".tab_content").hide();
        var activeTab = $(this).attr("rel");
        $("#" + activeTab).fadeIn();

        $("ul.tabs li").removeClass("active");
        $(this).addClass("active");

        $(".tab_drawer_heading").removeClass("d_active");
        $(".tab_drawer_heading[rel^='" + activeTab + "']").addClass("d_active");

        $('.productSlider').slick('refresh');

    });
    /* if in drawer mode */
    $(".tab_drawer_heading").on('click', function() {

        $(".tab_content").hide();
        var d_activeTab = $(this).attr("rel");
        $("#" + d_activeTab).fadeIn();

        $(".tab_drawer_heading").removeClass("d_active");
        $(this).addClass("d_active");

        $("ul.tabs li").removeClass("active");
        $("ul.tabs li[rel^='" + d_activeTab + "']").addClass("active");

        $('.productSlider').slick('refresh');
    });

    $('ul.tabs li').last().addClass("tab_last");

    /*-----------------------------------
      End Tabs With Accordian Responsive
    -------------------------------------*/

    /*-----------------------------------
      12. Sidebar Categories Level links
    -------------------------------------*/
    function categories_level() {
        $(".sidebar_categories .sub-level a").on("click", function() {
            $(this).toggleClass('active');
            $(this).next(".sublinks").slideToggle("slow");
        });
    }
    categories_level();

    $(".filter-widget .widget-title").on("click", function() {
        $(this).next().slideToggle('300');
        $(this).toggleClass("active");
    });

    /*-----------------------------------
     13. Price Range Slider
    -------------------------------------*/
    function price_slider() {
        $("#slider-range").slider({
            range: true,
            min: 12,
            max: 200,
            values: [0, 100],
            slide: function(event, ui) {
                $("#amount").val("$" + ui.values[0] + " - $" + ui.values[1]);
            }
        });
        $("#amount").val("$" + $("#slider-range").slider("values", 0) +
            " - $" + $("#slider-range").slider("values", 1));
    }
    price_slider();

    /*-----------------------------------
     14. Color Swacthes
    -------------------------------------*/
    function color_swacthes() {
        $.each($(".swacth-list"), function() {
            var n = $(".swacth-btn");
            n.on("click", function() {
                $(this).parent().find(n).removeClass("checked");
                $(this).addClass("checked")
            })
        });
    }
    color_swacthes();

    /*-----------------------------------
      15. Footer links for mobiles
    -------------------------------------*/
    function footer_dropdown() {
        $(".footer-links .h4").on('click', function() {
            if ($(window).width() < 766) {
                $(this).next().slideToggle();
                $(this).toggleClass("active");
            }
        });
    }
    footer_dropdown();

    //Resize Function 
    var resizeTimer;
    $(window).resize(function(e) {
        clearTimeout(resizeTimer);
        resizeTimer = setTimeout(function() {
            $(window).trigger('delayed-resize', e);
        }, 250);
    });
    $(window).on("load resize", function(e) {
        if ($(window).width() > 766) {
            $(".footer-links ul").show();
        } else {
            $(".footer-links ul").hide();
        }
    });


    /*-------------------------------
      16. Site Animation
    ----------------------------------*/
    if ($(window).width() < 771) {
        $('.wow').removeClass('wow');
    }
    var wow = new WOW({
        boxClass: 'wow', // animated element css class (default is wow)
        animateClass: 'animated', // animation css class (default is animated)
        offset: 0, // distance to the element when triggering the animation (default is 0)
        mobile: false, // trigger animations on mobile devices (default is true)
        live: true, // act on asynchronously loaded content (default is true)
        callback: function(box) {
            // the callback is fired every time an animation is started
            // the argument that is passed in is the DOM node being animated
        },
        scrollContainer: null // optional scroll container selector, otherwise use window
    });
    wow.init();

    /*-------------------------------
	  17. SHOW HIDE PRODUCT TAG
	----------------------------------*/
    $(".product-tags li").eq(10).nextAll().hide();
    $('.btnview').on('click', function() {
        $(".product-tags li").not('.filter--active').show();
        $(this).hide();
    });

    /*-------------------------------
	  18. SHOW HIDE PRODUCT Filters
	----------------------------------*/
    $('.btn-filter').on("click", function() {
        $(".filterbar").toggleClass("active");
    });
    $('.closeFilter').on("click", function() {
        $(".filterbar").removeClass("active");
    });
    // Hide Cart on document click
    $("body").on('click', function(event) {
        var $target = $(event.target);
        if (!$target.parents().is(".filterbar") && !$target.is(".btn-filter")) {
            $(".filterbar").removeClass("active");
        }
    });

    /*-------------------------------
     19. Timer Count Down
    ----------------------------------*/
    $('[data-countdown]').each(function() {
        var $this = $(this),
            finalDate = $(this).data('countdown');
        $this.countdown(finalDate, function(event) {
            $this.html(event.strftime('<span class="ht-count days"><span class="count-inner"><span class="time-count">%-D</span> <span>Days</span></span></span> <span class="ht-count hour"><span class="count-inner"><span class="time-count">%-H</span> <span>HR</span></span></span> <span class="ht-count minutes"><span class="count-inner"><span class="time-count">%M</span> <span>Min</span></span></span> <span class="ht-count second"><span class="count-inner"><span class="time-count">%S</span> <span>Sc</span></span></span>'));
        });
    });

    /*-------------------------------
     20.Scroll Top ------------------
    ---------------------------------*/
    function scroll_top() {
        $("#site-scroll").on("click", function() {
            $("html, body").animate({ scrollTop: 0 }, 1000);
            return false;
        });
    }
    scroll_top();

    $(window).scroll(function() {
        if ($(this).scrollTop() > 300) {
            $("#site-scroll").fadeIn();
        } else {
            $("#site-scroll").fadeOut();
        }
    });

    /*-------------------------------
      21. Height Product Grid Image
    ----------------------------------*/
    function productGridView() {
        var gridRows = [];
        var tempRow = [];
        productGridElements = $('.grid-products .item');
        productGridElements.each(function(index) {
            if ($(this).css('clear') != 'none' && index != 0) {
                gridRows.push(tempRow);
                tempRow = [];
            }
            tempRow.push(this);

            if (productGridElements.length == index + 1) {
                gridRows.push(tempRow);
            }
        });

        $.each(gridRows, function() {
            var tallestHeight = 0;
            var tallestHeight1 = 0;
            $.each(this, function() {
                $(this).find('.product-image > a').css('height', '');
                elHeight = parseInt($(this).find('.product-image').css('height'));
                if (elHeight > tallestHeight) { tallestHeight = elHeight; }
            });

            $.each(this, function() {
                if ($(window).width() > 768) {
                    $(this).find('.product-image > a').css('height', tallestHeight);
                }
            });
        });
    }

    /*----------------------------
       22. Product details slider 2
    ------------------------------ */
    function product_thumb() {
        $('.product-dec-slider-2').slick({
            infinite: true,
            slidesToShow: 5,
            vertical: true,
            slidesToScroll: 1,
            centerPadding: '60px'
        });
    }
    product_thumb();

    /*----------------------------
       23. Product details slider 1
    ------------------------------ */
    function product_thumb1() {
        $('.product-dec-slider-1').slick({
            infinite: true,
            slidesToShow: 6,
            stageMargin: 5,
            slidesToScroll: 1
        });
    }
    product_thumb1();

    /*--------------------------
      24. Product Zoom
	---------------------------- */
    function product_zoom() {
        $(".zoompro").elevateZoom({
            gallery: "gallery",
            galleryActiveClass: "active",
            zoomWindowWidth: 300,
            zoomWindowHeight: 100,
            scrollZoom: false,
            zoomType: "inner",
            cursor: "crosshair"
        });
    }
    product_zoom();

    /*--------------------------
      25. Product Page Popup ---
	---------------------------- */
    function video_popup() {
        if ($('.popup-video').length) {
            $('.popup-video').magnificPopup({
                type: 'iframe',
                mainClass: 'mfp-fade',
                removalDelay: 160,
                preloader: false,
                fixedContentPos: false
            });
        }
    }
    video_popup();

    function size_popup() {
        $('.sizelink').magnificPopup({
            type: 'inline',
            midClick: true
        });
    }
    size_popup();

    function inquiry_popup() {
        $('.emaillink').magnificPopup({
            type: 'inline',
            midClick: true
        });
    }
    inquiry_popup();

    /*----------------------------------
      26. Quantity Plus Minus
    ------------------------------------*/
    function qnt_incre() {
        $(".qtyBtn").on("click", function() {
            var qtyField = $(this).parent(".qtyField"),
                oldValue = $(qtyField).find(".qty").val(),
                newVal = 1;

            if ($(this).is(".plus")) {
                newVal = parseInt(oldValue) + 1;
            } else if (oldValue > 1) {
                newVal = parseInt(oldValue) - 1;
            }
            $(qtyField).find(".qty").val(newVal);
        });
    }
    qnt_incre();

    /*----------------------------------
      27. Visitor Fake Message
    ------------------------------------*/
    // var userLimit = $(".userViewMsg").attr('data-user'),
    //     userTime = $(".userViewMsg").attr('data-time');
    // $(".uersView").text(Math.floor((Math.random() * userLimit)));
    // setInterval(function(){
    // 	$(".uersView").text(Math.floor((Math.random() * userLimit)));
    // }, userTime);

    /*----------------------------------
      28. Product Tabs
    ------------------------------------*/
    // $(".tab-content").hide();
    $(".tab-content:first").show();
    /* if in tab mode */
    $(".product-tabs li").on('click', function() {
        $(".tab-content").hide();
        var activeTab = $(this).attr("rel");
        $("#" + activeTab).fadeIn();

        $(".product-tabs li").removeClass("active");
        $(this).addClass("active");

        $(this).fadeIn();
        if ($(window).width() < 767) {
            var tabposition = $(this).offset();
            $("html, body").animate({ scrollTop: tabposition.top }, 700);
        }
    });

    $('.product-tabs li:first-child').addClass("active");
    $('.tab-container h3:first-child + .tab-content').show();

    /* if in drawer mode */
    $(".acor-ttl").on("click", function() {
        $(".tab-content").hide();
        var activeTab = $(this).attr("rel");
        $("#" + activeTab).fadeIn();

        $(".acor-ttl").removeClass("active");
        $(this).addClass("active");
    });


    $(".reviewLink").on('click', function(e) {
        e.preventDefault();
        $(".product-tabs li").removeClass("active");
        $(".reviewtab").addClass("active");
        var tab = $(this).attr("href");
        $(".tab-content").not(tab).css("display", "none");
        $(tab).fadeIn();
        var tabposition = $("#tab2").offset();
        if ($(window).width() < 767) {
            $("html, body").animate({ scrollTop: tabposition.top - 50 }, 700);
        } else {
            $("html, body").animate({ scrollTop: tabposition.top - 80 }, 700);
        }
    });

    /*--------------------------------------
      29. Promotion / Notification Cookie Bar 
      -------------------------------------- */
    function cookie_promo() {
        if (Cookies.get('promotion') != 'true') {
            $(".notification-bar").show();
        }
        $(".close-announcement").on('click', function() {
            $(".notification-bar").slideUp();
            Cookies.set('promotion', 'true', { expires: 1 });
            return false;
        });
    }
    cookie_promo();
    /* --------------------------------------
    	End Promotion / Notification Cookie Bar 
    -------------------------------------- */

    /* --------------------------------------
    	30. Image to background js
    -------------------------------------- */
    $(".bg-top").parent().addClass('b-top');
    $(".bg-bottom").parent().addClass('b-bottom');
    $(".bg-center").parent().addClass('b-center');
    $(".bg-left").parent().addClass('b-left');
    $(".bg-right").parent().addClass('b-right');
    $(".bg_size_content").parent().addClass('b_size_content');
    $(".bg-img").parent().addClass('bg-size');
    $(".bg-img.blur-up").parent().addClass('');
    jQuery('.bg-img').each(function() {

        var el = $(this),
            src = el.attr('src'),
            parent = el.parent();

        parent.css({
            'background-image': 'url(' + src + ')',
            'background-size': 'cover',
            'background-position': 'center',
            'background-repeat': 'no-repeat'
        });

        el.hide();
    });
    /* --------------------------------------
     	End Image to background js
     -------------------------------------- */

    /*----------------------------------
    32. Related Product Slider ---------
    ------------------------------------*/
    function related_slider() {
        $('.related-product .productSlider').slick({
            dots: false,
            infinite: true,
            item: 5,
            slidesToScroll: 1,
            responsive: [{
                    breakpoint: 1024,
                    settings: {
                        slidesToScroll: 1,
                    }
                },
                {
                    breakpoint: 767,
                    settings: {
                        slidesToScroll: 1,
                    }
                }
            ]
        });
    }
    related_slider();
    /*----------------------------------
      End Related Product Slider
      ------------------------------------*/

    /*-----------------------------------
      33. Infinite Scroll js
      -------------------------------------*/
    function load_more() {
        $(".product-load-more .item").slice(0, 16).show();
        $(".loadMore").on('click', function(e) {
            e.preventDefault();
            $(".product-load-more .item:hidden").slice(0, 4).slideDown();
            if ($(".product-load-more .item:hidden").length == 0) {
                $(".infinitpagin").html('<div class="btn loadMore">no more products</div>');
            }
        });
    }
    load_more();

    function load_more_post() {
        $(".blog--grid-load-more .article").slice(0, 3).show();
        $(".loadMorepost").on('click', function(e) {
            e.preventDefault();
            $(".blog--grid-load-more .article:hidden").slice(0, 1).slideDown();
            if ($(".blog--grid-load-more .article:hidden").length == 0) {
                $(".loadmore-post").html('<div class="btn loadMorepost">No more Blog Post</div>');
            }
        });
    }
    load_more_post();
    /*-----------------------------------
      End Infinite Scroll js
      -------------------------------------*/
})(jQuery);


$(document).on('keyup','#username',function(){
    fun_username();    
})
function fun_username(){
    let username=$('#username').val();
    let text=/^[A-Za-z ]+$/;

    if(!text.test(username)){
        $("#spanusername").show().html("Enter Alphabets only").css("color","red").focus();
        $('.signupbtn').prop('disabled',true);
        return false;
    }
    else{
        $("#spanusername").hide();
        $('.signupbtn').prop('disabled',false);
    }
}

$(document).on('keyup','#mobile',function(){
    fun_mobile();    
})
function fun_mobile(){
    let mobile=$('#mobile').val();

    if(mobile.length!=10){
        $("#spanmobile").show().html("Please Enter Valid Mobile Number").css("color","red").focus();
        $('.signupbtn').prop('disabled',true);
        return false;
    }
    else{
        $("#spanmobile").hide();
        $('.signupbtn').prop('disabled',false);
    }
}

$(document).on('keyup','#city',function(){
    fun_city();    
})
function fun_city(){
    let city=$('#city').val();
    let text=/^[A-Za-z ]+$/;

    if(!text.test(city)){
        $("#spancity").show().html("Enter Alphabets only").css("color","red").focus();
        $('.signupbtn').prop('disabled',true);
        return false;
    }
    else{
        $("#spancity").hide();
        $('.signupbtn').prop('disabled',false);
    }
}

$(document).on('keyup','#state',function(){
    fun_state();    
})
function fun_state(){
    let state=$('#state').val();
    let text=/^[A-Za-z ]+$/;

    if(!text.test(state)){
        $("#spanstate").show().html("Enter Alphabets only").css("color","red").focus();
        $('.signupbtn').prop('disabled',true);
        return false;
    }
    else{
        $("#spanstate").hide();
        $('.signupbtn').prop('disabled',false);
    }
}

// $('.signupbtn').prop('disabled',true);
// $(document).on('submit','.signup',function(){
//     let username = $("#username").val();
//     let mobile = $("#mobile").val();
//     let email_id = $("#email_id").val();
//     let password = $("#password").val();
//     let city = $("#city").val();
//     let state = $("#state").val();
//     let address = $("#address").val();
//     let pincode = $("#pincode").val();

//     if(username==''|| mobile==''|| email_id==''|| password=='' || city=='' || state=='' ||address=='' || pincode=='' ) {
//         $("#errorsubmit").show().html("Please Fill All the Field").css("color","red").focus();
//         return false;
//     }
//     else{
//         $("#errorsubmit").hide()
//         $('.signupbtn').prop('disabled',false);
//         return true;

//     }
// });

// Document is ready
$(document).ready(function () {
    // Validate Username
    $("#spanname").hide();
    $("#spanemail").hide();
    $("#spanecontact").hide();
    $("#spantext").hide();
    let usernameError = true;
    let useremailError = true;
    let userphoneError = true;
    let usertextError = true;
    $(".name").keyup(function () {
        validatename();
    });
    
    function validatename() {
        let usernameValue = $(".name").val();
        let text=/^[A-Za-z ]+$/;
        if (usernameValue.length == "") {
        $("#spanname").show();
        usernameError = false;
        return false;
        } else if (usernameValue.length < 3 ) {
        $("#spanname").show();
        $("#spanname").html("**length of username minimum 3 character");
        usernameError = false;
        return false;
        } else if(!text.test(usernameValue)){
        $("#spanname").show().html("Enter Alphabets only").css("color","red").focus();
        usernameError = false;
        return false;
        }else {
        $("#spanname").hide();
        }
    }
    
    // Validate Email
    $('.email').keyup(function(){
        validateEmail();
    });
    function validateEmail(){
        let useremail=$('.email').val();
        let regex = /^([_\-\.0-9a-zA-Z]+)@([_\-\.0-9a-zA-Z]+)\.([a-zA-Z]){2,7}$/;

        if(useremail.length==''){
            $('#spanemail').show();
            useremailError = false;
            return false;
        }else if(!regex.test(useremail)){
                $('#spanemail').show();
                useremailError = false;
                return false;
        }else{
            $('#spanemail').hide();
        }
    }

    //validate contact
    $('.contact').keyup(function(){
        validatecontact();
    });
    function validatecontact(){
        let contact= $('.contact').val();
        let filter = /^\d*(?:\.\d{1,2})?$/;
        if(contact.length==''){
            $("#spanecontact").show();
            userphoneError = false;
            return false;
        }else if(contact.length!=10){
            $("#spanecontact").show();
            userphoneError = false;
            return false;
        }else if(!filter.test(contact)){
            $("#spanecontact").show();
            userphoneError = false;
            return false;
        }else{
            $("#spanecontact").hide();
        }
    }

    //message validation
    $('.message').keyup(function(){
        validatemessage();
    });
    function validatemessage(){
        let message= $('.message').val();
        if(message.length==''){
            $("#spantext").show();
            usertextError = false;
            return false;
        }
        else{
            $("#spantext").hide();
        }
    }    
   
    // Submit button
    $(".btn_fill").click(function () {
      usernameError = true;
      useremailError = true;
      userphoneError = true;
      usertextError = true;
        validatename();
        validateEmail();
        validatecontact();
        validatemessage();
        if (usernameError == true  && useremailError == true && userphoneError == true && usertextError == true) {
    $('.load-wrapp').toggleClass('loadhide loadshow');
            return true;
            
        } else {
                    return false;
        }
    });
    });
    
$(document).ready(function(){
    $('#spanName').hide();
    $('#spanContact').hide();
    $('#spanEmail').hide();
    $('#spanCity').hide();
    $('#spanAddress').hide();
    $('#spanPin').hide();
    $('#spanPassword').hide();
    $('#spanterm').hide();
    let name_error = true;
    let contact_error = true;
    let email_error = true;
    let city_error = true;
    let address_error = true;
    let pin_error = true;
    let pass_error =true;
    let check_error = true;

    $('#c_name').keyup(function(){
        validatebookname();
    });
    function validatebookname(){
        let bookname=$('#c_name').val();
        let booktext=/^[A-Za-z ]+$/;
        if(bookname.length == ''){
            $('#spanName').show().css('color','red');
            name_error = false;
            return false;
        }else if(!booktext.test(bookname)){
                $('#spanName').show().html('** Enter Alphabets only').css('color','red');
                name_error = false;
                return false;
        }else{
            $('#spanName').hide();
        }
    }

    //contact
    $('#c_contact').keyup(function(){
        validatebookcontact();
    });
    function validatebookcontact(){
        let bookcontact=$('#c_contact').val();
        let booknumber=/^[0-9-+]+$/;

        if(bookcontact.length==''){
            $('#spanContact').show().css('color','red');
            contact_error = false;
            return false;
        }else if(!booknumber.test(bookcontact)){
            $('#spanContact').show().css('color','red').html('** Enter Only number');
            contact_error = false;
            return false;
        }else if(bookcontact.length != '10'){
            $('#spanContact').show().css('color','red').html('** Enter Only 10 digit number');
            contact_error = false;
            return false;
        } else{
            $('#spanContact').hide();
        }
    }

    //email
    $('#c_email').keyup(function(){
        validatebookemail();
    });
    function validatebookemail(){
        let bookemail=$('#c_email').val();
        let bookregex = /^([_\-\.0-9a-zA-Z]+)@([_\-\.0-9a-zA-Z]+)\.([a-zA-Z]){2,7}$/;
        if(bookemail.length==''){
            $('#spanEmail').show().css('color','red');
            email_error = false;
            return false;
        }else if(!bookregex.test(bookemail)){
            $('#spanEmail').show().css('color','red');
            email_error = false;
            return false;
        }
        else{
            $('#spanEmail').hide();
        }
    }
    
    //city
    $('#c_city').keyup(function(){
        validatebookcity();
    });
    function validatebookcity(){
        let bookcity =$('#c_city').val();
        let cityregrex=/^[A-za-z ]+$/;
        if(bookcity.length==''){
            $('#spanCity').show().css('color','red');
            city_error = false;
            return false;
        }
        else if(!cityregrex.test(bookcity)){
            $('#spanCity').show().css('color','red').html('** Please enter correct city');
            city_error = false;
            return false;
        }
        else{
            $('#spanCity').hide();
        }
    }

    //address
    $('#c_address').keyup(function(){
        validatebookaddress();
    });
    function validatebookaddress(){
        let bookaddress=$('#c_address').val();
        if(bookaddress.length==''){
            $('#spanAddress').show().css('color','red');
            address_error = false;
            return false;
        }
        else{
            $('#spanAddress').hide();
        }
    }

    //pincode
    $('#c_pincode').keyup(function(){
        validatebookpin();
    });
    function validatebookpin(){
        let bookpin=$('#c_pincode').val();
        let zipRegex = /^\d{5}$/;
        if(bookpin.length==''){
            $('#spanPin').show().css('color','red');
            pin_error = false;
            return false;
        }
        else if(!zipRegex.test(bookpin)){
            $('#spanPin').show().css('color','red').html('** zipcode should only be 5 digits');
            pin_error = false;
            return false;
        }
        else{
            $('#spanPin').hide();
        }
    }

    //checkbox
    $('#terms_services').click(function(){
        validatecheck();
    });
    function validatecheck(){
        if($('#terms_services').is(":not(:checked)")){
            $('#spanterm').show().css('color','red');
            check_error = false;
            return false;
        }
        else{
            $('#spanterm').hide();
        }
    }



    // Submit button
    $("#btn_fill").click(function () {
        name_error = true;
        contact_error = true;
         email_error = true;
        city_error = true;
         address_error = true;
         pin_error= true;
         pass_error = true;
         check_error = true;
         validatebookname();
         validatebookcontact();
         validatebookemail();
         validatebookcity();
         validatebookaddress();
         validatebookpin();
         validatecheck();
          if (name_error == true  && contact_error == true && email_error == true && city_error == true && address_error == true && pin_error==true && check_error == true) {
            return true;
              
          } else {
                      return false;
          }
      });
});

 //password
//  $('#c_password').keyup(function(){
//     validatepass(); 
// });
// function validatepass(){
//     let pass=$('#c_password').val();
//     let passcheck=0;
//          for(let a1=0;a1<=pass.length;a1++){
//            if(pass.charCodeAt(a1)>=65 && pass.charCodeAt(a1)<=90){
//               passcheck=1;
//            }
//          }

//          let pass_check=0;
//          for(let a1=0;a1<=pass.length;a1++){
//            if(pass.charCodeAt(a1)>=33 && pass.charCodeAt(a1)<=42 || pass.charCodeAt(a1)==64){
//               pass_check=1;
//            }
//          }
//     if(pass.length==''){
//         $('#spanPassword').show().css('color','red');
//         pass_error = false;
//         return false;
//     }
//     else if(pass.length < 6 || pass.length > 8){
//         $('#spanPassword').show().css('color','red').html('** length of your password must be between 6 and 8 and one special character and one upper case');
//         pass_error = false;
//         return false;
//     }
//     else if(passcheck==0){
//         $('#spanPassword').show().css('color','red').html('** You must contain atleast one Upper character in password');
//         pass_error = false;
//         return false;
//     }
//     else if(pass_check==0){
//         $('#spanPassword').show().css('color','red').html('** You must contain atleast one special character in password');
//         pass_error = false;
//         return false;
//     }
//     else{
//         $('#spanPassword').hide()
//     }
// }