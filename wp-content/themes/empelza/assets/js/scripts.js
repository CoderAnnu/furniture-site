jQuery.noConflict()(function($) {

    "use strict";

    var $window = window,
        offset = '90%',
        $doc = $(document),
        self = this,
        $body = $('body'),
        page_preloader  = $body.data('page-preloader'),
        TweenMax = window.TweenMax,
        TweenLite = window.TweenLite,
        fl_theme = window.fl_theme || {};

    fl_theme.window = $(window);
    fl_theme.document = $(document);
    window.fl_theme = fl_theme;
    fl_theme.window = $(window);
    fl_theme.sameOrigin = true;

// Header Events
    fl_theme.initEventsCustom = function() {
        fl_theme.window.load(function() {
            if(fl_theme.sameOrigin && typeof parent.vc != 'undefined' && typeof parent.vc.events != 'undefined') {
                parent.vc.events.on('shortcodeView:ready', function() {
                    $('body').trigger('post-load');
                });
            }
        });
    };
// Stiky Sidebar
    fl_theme.initStikySidebar = function(){
        var sidebar_stiky = $('.sidebar-sticky');
        if(sidebar_stiky.length){
            sidebar_stiky.theiaStickySidebar({
                additionalMarginTop: 30,
                additionalMarginBottom: 30
            });
        }
    };

// Resize iframe video
    fl_theme.initResponsiveIframe = function(){
        var resizeitem = $('iframe');
        resizeitem.height(
            resizeitem.attr("height") / resizeitem.attr("width") * resizeitem.width()
        );
    };

//Image Popups
    fl_theme.initImagePopup = function(){
        $('.fl-gallery-image-popup').magnificPopup({
            delegate: 'a',
            type: 'image',
            removalDelay: 500,
            image: {
                markup: '<div class="mfp-figure">'+
                    '<div class="mfp-img"></div>'+
                    '<div class="mfp-bottom-bar">'+
                    '<div class="mfp-title"></div>'+
                    '</div>'+
                    '</div>'+
                    '<div class="mfp-close"></div>'+
                    '<div class="mfp-counter"></div>'
            },
            callbacks: {
                beforeOpen: function() {
                    this.st.image.markup = this.st.image.markup.replace('mfp-figure', 'mfp-figure mfp-with-anim');
                    this.st.mainClass = 'fl-zoom-in-popup-animation';
                }
            },
            closeOnContentClick: true,
            midClick: true,
            gallery: {
                enabled: true,
                arrowMarkup: '<button title="%title%" type="button" class="mfp-arrow mfp-arrow-%dir%">' +
                    '<svg viewBox="0 0 40 40">'+
                    '<path d="M10,20 L30,20 M22,12 L30,20 L22,28"></path>'+
                    '</svg>'+
                    '</button>', // markup of an arrow button

                tPrev: 'Previous', // title for left button
                tNext: 'Next', // title for right button

                tCounter: '<span class="mfp-counter">%curr% of %total%</span>' // markup of counter
            }
        });
    };
// Gallery Popups
    fl_theme.initGalleryPopup = function(){
        $('.fl-magic-popup').each(function() {
            var popup_gallery_custom_class = $(this).attr('data-custom-class'),
                gallery_enable = true,
                popup_type = 'image';
            if($(this).hasClass('fl-single-popup')){
                gallery_enable = false;
                popup_gallery_custom_class = 'fl-single-popup';
            } else if ($(this).hasClass('fl-video-popup')) {
                popup_type = 'iframe';
                gallery_enable = false;
                popup_gallery_custom_class = 'fl-video-popup';
            }

            $("." + popup_gallery_custom_class).magnificPopup({
                delegate: 'a',
                type: popup_type,
                gallery: {
                    enabled: gallery_enable,
                    tPrev: 'Previous',
                    tNext: 'Next',
                    tCounter: '<span class="mfp-counter">%curr% / %total%</span>' // markup of counter
                },
                image: {
                    markup:
                        '<div class="mfp-figure">'+
                        '<div class="mfp-img"></div>'+
                        '</div>'+
                        '<div class="mfp-close"></div>'+
                        '<div class="mfp-bottom-bar">'+
                        '<div class="mfp-title"></div>'+
                        '<div class="mfp-counter"></div>' +
                        '</div>'
                },
                iframe: {
                    markup: '<div class="mfp-iframe-scaler">'+
                        '<iframe class="mfp-iframe" frameborder="0" allowfullscreen></iframe>'+
                        '</div>'+
                        '<div class="mfp-close"></div>'
                },
                mainClass: 'mfp-zoom-in',
                removalDelay: 300,
                callbacks: {
                    open: function () {
                        $.magnificPopup.instance.next = function () {
                            var self = this;
                            self.wrap.removeClass('mfp-image-loaded');
                            setTimeout(function () {
                                $.magnificPopup.proto.next.call(self);
                            }, 120);
                        };
                        $.magnificPopup.instance.prev = function () {
                            var self = this;
                            self.wrap.removeClass('mfp-image-loaded');
                            setTimeout(function () {
                                $.magnificPopup.proto.prev.call(self);
                            }, 120);
                        }
                    },
                    imageLoadComplete: function () {
                        var self = this;
                        setTimeout(function () {
                            self.wrap.addClass('mfp-image-loaded');
                        }, 16);
                    }
                }
            });

        });
    };

// Isotope Indicator
    fl_theme.initIsotopeCustomFunction = function() {
        var $grid = $('.fl-isotope-wrapper');
        $grid.isotope({
            itemSelector: '.fl-grid-item',
            isAnimated: true,
            percentPosition: true,
            masonry: {
                columnWidth: '.fl-grid-item'
            }
        });

        $grid.imagesLoaded().progress( function() {
            $grid.isotope('layout');
        });
    };



// Fixed Nav Bar
    fl_theme.initNavBarFixed = function() {
        var c, currentScrollTop = 0;
        var body = $('body'),
            nav_bar = $('.fl--header'),
            nav_bar_height = nav_bar.height();

        if(nav_bar.length && nav_bar.hasClass( "fixed-navbar" )){
            body.find('.header-padding').css("padding-top",nav_bar_height+"px");
            $(window).scroll(function () {
                var a = $(window).scrollTop();
                var b = nav_bar.height();
                var d = nav_bar.find('.fl-top-header-content').outerHeight();
                currentScrollTop = a;

                if (c < currentScrollTop && a > b + b * 2) {
                    nav_bar.addClass("scrollUp");
                } else if (c > currentScrollTop && !(a <= b) || !(a >= b) ) {
                    nav_bar.removeClass("scrollUp");
                }

                if (c < currentScrollTop && a > b) {
                    nav_bar.addClass("padding-disable");
                } else if (c > currentScrollTop && a < b + d ) {
                    nav_bar.removeClass("padding-disable");
                }

                if (c < currentScrollTop && a > d ) {
                    nav_bar.addClass("fixed-enable");
                }else if (c > currentScrollTop && a < d ) {
                    nav_bar.removeClass("fixed-enable");
                }


                c = currentScrollTop;
            });
        }
    };


    fl_theme.initCustomWidgetFunction = function(){
        /*Widgets*/
        $('.widget.widget_categories .children').parent('.cat-item').addClass('has-sub-category');
    };


// Open Close Mobile Navigation
    fl_theme.initMobileNavigationOpenClose = function () {
        var $navbar_wrapper         = $('.fl-mobile-menu-wrapper'),
            $navbar_menu_sidebar    = $('.fl--mobile-menu-navigation-wrapper'),
            $hamburgerbars          = $('.fl--hamburger-menu-wrapper,.fl--hamburger-menu'),
            $social_profiles        = $('.fl-mobile-menu-wrapper ul.fl-sidebar-social-profiles li a'),
            OpenNavBar              = void 0;

        self.fullscreenNavbarIsOpened = function () {
            return OpenNavBar;
        };

        self.toogleOpenCloseMobileMenu = function () {
            self[OpenNavBar ? 'closeFullscreenNavbar' : 'openFullscreenNavbar']();
        };
        self.openFullscreenNavbar = function () {
            if (OpenNavBar || !$navbar_wrapper.length) {
                return;
            }
            OpenNavBar = 1;

            var $navbarMenuItems = $navbar_wrapper.find('.fl--mobile-menu >li >a,.fl--mobile-menu li.opened .sub-menu >li >a');
            if (!$navbar_wrapper.find('.fl--mobile-menu >li.opened').length) {
                $navbarMenuItems = $navbar_wrapper.find('.fl--mobile-menu >li >a');
            }

            $hamburgerbars.addClass('opened');
            $hamburgerbars.removeClass('closed');

            // NavBarMenu Items Animation
            TweenMax.set($navbarMenuItems, {
                opacity: 0,
                x: '-20%',
                force3D: true
            });

            TweenMax.staggerTo($navbarMenuItems, 0.2, {
                opacity: 1,
                x: '0%',
                delay: 0.4
            }, 0.04);

            // Social Profiles Animation
            TweenMax.set($social_profiles, {
                opacity: 0,
                y: '-100%',
                force3D: true
            });

            TweenMax.staggerTo($social_profiles, 0.2, {
                opacity: 1,
                y: '0%',
                delay: 0.6
            }, 0.04);

            // NavBarMenu wrapper Animation
            TweenMax.set($navbar_wrapper, {
                display: 'none',
                force3D: true
            });

            TweenMax.to($navbar_wrapper, 0.4, {
                opacity: 1,
                display: 'block'
            }, 0.04);

            // NavBarMenu menu sidebar Animation
            TweenMax.set($navbar_menu_sidebar, {
                opacity: 0,
                x: '-100%',
                force3D: true
            });

            TweenMax.to($navbar_menu_sidebar, 0.4, {
                opacity: 1,
                x: '0%',
                display: 'block'
            }, 0.04);

            $navbar_wrapper.addClass('open');

        };

        self.closeFullscreenNavbar = function (dontTouchBody) {
            if (!OpenNavBar || !$navbar_wrapper.length) {
                return;
            }
            OpenNavBar = 0;


            // disactive all togglers
            $hamburgerbars.removeClass('opened');
            $hamburgerbars.addClass('closed');


            var $navbarMenuItems = $navbar_wrapper.find('.fl--mobile-menu >li >a');


            // set top position and animate
            TweenMax.to($navbar_wrapper, 0.4, {
                force3D: true,
                opacity: 0,
                display: 'none',
                delay: 0.1
            });

            TweenMax.to($navbar_menu_sidebar, 0.2, {
                opacity: 0,
                x: '-100%',
                force3D: true,
                delay: 0.3
            }, 0.1);

            TweenMax.to($navbarMenuItems, 0.2, {
                opacity: 0,
                x: '-20%',
                delay: 0.2
            }, 0.1);



            // open navbar block
            $navbar_wrapper.removeClass('open');

        };

        $doc.on('click', '.fl--hamburger-menu-wrapper,.fl--mobile-menu-icon,.fl--hamburger-menu', function (e) {
            self.toogleOpenCloseMobileMenu();
            e.preventDefault();
        });
    };
// Mobile Menu
    fl_theme.initMobileNavigationSubMenuAnimation = function () {
        var $mobileMenu = $('.fl--mobile-menu');

        $mobileMenu.find('li').each(function(){
            var $this = $(this);
            if($this.find('ul').length > 0) {
                $this.find('> a').append('<span class="fl-menu-flipper-icon fl--open-child-menu"><span class="fl-front-content"><i class="fl-custom-icon-list-style-6"></i></span><span class="fl-back-content"><i class="fl-custom-icon-cancel-5"></i></span></span>');
            }
        });

        // open -> close sub-menu
        function toggleSub_menu($sub_menu_find) {
            var $navigation_Items = $sub_menu_find.find('.sub-nav >.sub-menu >li >a');

            if (!$sub_menu_find.find('.sub-nav >.sub-menu >li.opened').length) {
                $navigation_Items = $sub_menu_find.find('.sub-menu >li >a');
            }

            TweenMax.set($navigation_Items, {
                opacity: 0,
                x: '-20%',
                force3D: true
            }, 0.04);
            if ($sub_menu_find.hasClass('opened')) {
                $sub_menu_find.removeClass('opened');
                $sub_menu_find.find('li').removeClass('opened');
                $sub_menu_find.find('ul').slideUp(200);
                TweenMax.staggerTo($navigation_Items, 0.3, {
                    opacity: 0,
                    x: '-20%',
                    force3D: true
                }, 0.04);
                console.log($navigation_Items);
            } else {
                TweenMax.staggerTo($navigation_Items, 0.3, {
                    x: '0%',
                    opacity: 1,
                    delay: 0.2
                }, 0.04);

                $sub_menu_find.addClass('opened');
                if (!$sub_menu_find.children('ul').length) {
                    $sub_menu_find.find('div').children('ul').slideDown();
                } else {
                    $sub_menu_find.children('ul').slideDown();
                }
                // Sub menu Children
                $sub_menu_find.siblings('li').children('ul').slideUp(200);
                $sub_menu_find.siblings('li').removeClass('opened');
                $sub_menu_find.siblings('li').find('li').removeClass('opened');
                $sub_menu_find.siblings('li').find('ul').slideUp(200);
            }
        }

        $mobileMenu.on('click', 'li.has-submenu >a', function (e) {
            toggleSub_menu($(this).parent());
            e.preventDefault();
        });
    };

// Demo Click WPML
    fl_theme.initWPMLDemoClickLink = function(){

        $body.on('click', '.demo-language-selector a', function (e) {

            alert('The language switcher requires WPML plugin to be installed and activated.If you don\'t need this option do not install the plugin');

            e.preventDefault();
        });
    };
// Velocity Animation Save
    fl_theme.initVelocityAnimationSave = function(){
        var animated_velocity = $('.fl-animated-item-velocity');

        // Hided item if animated not complete
        animated_velocity.each(function () {
            var $this = $(this),
                $item;

            if ($this.data('item-for-animated')) {
                $item = $this.find($this.data('item-for-animated'));
                $item.each(function() {
                    if(!$(this).hasClass('animation-complete')) {
                        $(this).css('opacity','0');
                    }
                });
            } else {
                if(!$this.hasClass('animation-complete')) {
                    $this.css('opacity','0');
                }
            }
        });

        // animated Function
        animated_velocity.each(function () {
            var $this_item = $(this), $item, $animation;
            $animation = $this_item.data('animate-type');
            if ($this_item.data('item-for-animated')) {
                $item = $this_item.find($this_item.data('item-for-animated'));
                $item.each(function() {
                    var $this = $(this);
                    var delay='';
                    if ($this_item.data('item-delay')) {
                        delay = $this_item.data('item-delay');
                    }else {
                        if ($this.data('item-delay')) {
                            delay = $this.data('item-delay');
                        }
                    }
                    $this.waypoint(function () {
                            if(!$this.hasClass('animation-complete')) {
                                $this.addClass('animation-complete')
                                    .velocity('transition.'+$animation,{delay:delay,display:'undefined',opacity:1});
                            }
                        },
                        {
                            offset: offset
                        });
                });
            } else {
                $this_item.waypoint(function () {
                        var delay='';
                        if ($this_item.data('item-delay')) {
                            delay = $this_item.data('item-delay');
                        }

                        if(!$this_item.hasClass('animation-complete')) {
                            $this_item.addClass('animation-complete')
                                .velocity('transition.'+$animation,{  delay:delay,display:'undefined',opacity:1});
                        }

                    },
                    {
                        offset: offset
                    });
            }
        });
    };
// VC Custom Function
    fl_theme.initVcCustomFunction = function(){

        var initVcShortcodeFunction = function(){
                initVelocityAnimation();
                initCounterFunction();
                initTespimonialSlider();
                initProgressBarFunction();
                initAccordionFunction();
                initTabsVCFunction();
                initIsotopeVCFunction();
            },

            // Velocity Animation
            initVelocityAnimation = function(){
                var animated_velocity = $('.fl-animated-item-velocity');

                // Hided item if animated not complete
                animated_velocity.each(function () {
                    var $this = $(this),
                        $item;

                    if ($this.data('item-for-animated')) {
                        $item = $this.find($this.data('item-for-animated'));
                        $item.each(function() {
                            if(!$(this).hasClass('animation-complete')) {
                                $(this).css('opacity','0');
                            }
                        });
                    } else {
                        if(!$this.hasClass('animation-complete')) {
                            $this.css('opacity','0');
                        }
                    }
                });

                // animated Function
                animated_velocity.each(function () {
                    var $this_item = $(this), $item, $animation;
                    $animation = $this_item.data('animate-type');
                    if ($this_item.data('item-for-animated')) {
                        $item = $this_item.find($this_item.data('item-for-animated'));
                        $item.each(function() {
                            var $this = $(this);
                            var delay='';
                            if ($this_item.data('item-delay')) {
                                delay = $this_item.data('item-delay');
                            }else {
                                if ($this.data('item-delay')) {
                                    delay = $this.data('item-delay');
                                }
                            }
                            $this.waypoint(function () {
                                    if(!$this.hasClass('animation-complete')) {
                                        $this.addClass('animation-complete')
                                            .velocity('transition.'+$animation,{delay:delay,display:'undefined',opacity:1});
                                    }
                                },
                                {
                                    offset: offset
                                });
                        });
                    } else {
                        $this_item.waypoint(function () {
                                var delay='';
                                if ($this_item.data('item-delay')) {
                                    delay = $this_item.data('item-delay');
                                }

                                if(!$this_item.hasClass('animation-complete')) {
                                    $this_item.addClass('animation-complete')
                                        .velocity('transition.'+$animation,{  delay:delay,display:'undefined',opacity:1});
                                }

                            },
                            {
                                offset: offset
                            });
                    }
                });
            },
            // Counter
            initCounterFunction = function () {
                var fl_counter = $('.fl-counter');
                fl_counter.each(function() {
                    var $this = $(this);
                    $this.waypoint(function () {
                        $this.countTo();
                    },{
                        offset: offset
                    });
                });
            },
            // Testimonial Slider
            initTespimonialSlider = function () {
                var testimonila_slider = $('.testimonial-slider');
                if(testimonila_slider.length){
                    testimonila_slider.each(function() {
                        var $this = $(this);
                        $this.not('.slick-initialized').slick({
                            dots: false,
                            infinite: true,
                            prevArrow: null,
                            nextArrow: null,
                            autoplay:true,
                            autoplaySpeed: 6000,
                            speed: 500,
                            slidesToShow: 1,
                            slidesToScroll: 1,
                            draggable: true,
                            responsive: [
                                {
                                    breakpoint: 900,
                                    settings: {
                                        slidesToShow: 1,
                                        slidesToScroll: 1
                                    }
                                },
                            ]
                        });
                    });
                }

            },
            // Progress Bar
            initProgressBarFunction = function () {
                var fl_progress_bar = $('.fl-progress-bar');
                fl_progress_bar.each(function() {
                    var $this = $(this);
                    $this.waypoint(function () {
                        var duration_progress = Number($this.attr("data-duration"));
                        $this.find('.fl-tracking-progress-bar__item').animate({
                            width:$this.attr('data-progress-width')
                        },duration_progress);
                        $this.find('.fl-progress-wrapper').animate(
                            {text:$this.attr('data-progress-width')},
                            {
                                duration: duration_progress,
                                step: function(now) {
                                    var data = Math.round(now);
                                    $this.find('.fl-progress-bar__number .fl-animated-number').html(data + '%');
                                }
                            });
                    },{
                        offset: offset
                    });
                });
            },
            // Accordion
            initAccordionFunction = function (){
                var fl_accordion = $('.fl-accordion');
                fl_accordion.each(function(){
                    var $this = $(this);
                    $this.find('.vc_tta-panel-heading .vc_tta-panel-title a').append( "<span class='fl-counter-animated-icon'><i class='fa fa-angle-right'></i></span>" );
                });
            },
            // Tabs
            initTabsVCFunction = function (){
                var tabs = $(".fl-tabs-wrapper");
                tabs.each(function() {
                    var customClass = $(this).attr('data-custom-tabs-class');
                    $(customClass).on('click','.nav-tabs li',  function(e){
                        var $this = $(this),data = $this.attr('data-tab');
                        $(customClass).find('.nav-tabs li').removeClass('active');
                        $this.addClass('active');
                        $(customClass).find('.tab-content-container .tab-pane').addClass('loading').removeClass('active');
                        $(customClass).find('.'+data).addClass('active');
                        e.preventDefault();
                    });
                })
            },
            // Isotope
            initIsotopeVCFunction = function (){
                var $grid_vc = $('.fl-isotope-wrapper'),
                    $blog_filter_btn = $('.fl-filter--btn'),
                    $blog_btn_group = $('.fl-filter-blog--group');

                $grid_vc.isotope({
                    itemSelector: '.fl-grid-item',
                    isAnimated: true,
                    percentPosition: true,
                    masonry: {
                        columnWidth: '.fl-grid-item'
                    }
                });

                $blog_filter_btn.each(function () {
                    $blog_filter_btn.on('click', function () {
                        $blog_btn_group.find('.active').removeClass('active');
                        $(this).addClass('active');
                    });
                });
                // filter items on button click
                $blog_filter_btn.on('click', function () {
                    var filterValue = $(this).attr('data-filter');
                    $grid_vc.isotope({filter: filterValue});
                });

                $grid_vc.imagesLoaded().progress(function () {
                    $grid_vc.isotope('layout');
                });
            };

        fl_theme.document.ready(function() {
            initVcShortcodeFunction();
        });
        $('body').on('post-load', initVcShortcodeFunction);

    };
// Menu Hover
    fl_theme.initMenuHoverFunction = function(){
        let menu_hover_wrap = $('.fl-mega-menu');

        menu_hover_wrap.on("mouseenter",'ul li.menu-item-depth-0>a',(function() {
            let $this = $(this);
            menu_hover_wrap.find('.menu-item-depth-0').addClass('not-hover');
            $this.parent().removeClass('not-hover');
            menu_hover_wrap.on("mouseleave",(function(){
                menu_hover_wrap.find('.menu-item-depth-0.not-hover').removeClass('not-hover');
            }));
        }));

        menu_hover_wrap.on("mouseenter",'ul li.menu-item-depth-0 .sub-nav',(function() {
            menu_hover_wrap.find('.menu-item-depth-0').addClass('not-hover');
            let $this = $(this);
            $this.parent().removeClass('not-hover');
        }));

    };
// Hover Parallax image Header
    fl_theme.initHoverParallaxImageHeaderFunction = function(){
        var parallaxSelector = $('.header-parallax-image-hover-wrap');
        parallaxSelector.each(function() {
            var $this_item = $(this);
            $this_item.parallaxBackground({
                event: 'mouse_move',
                animation_type: 'shift',
                animate_duration: 20
            });
        });
    };
// Jarallax
    fl_theme.initJarallaxFunction = function(){
        var jarallaxSelector = $('.jarallax');
        jarallaxSelector.each(function() {
            var $this_item = $(this);
            $this_item.jarallax({
                speed: 0.8
            });
        });

    };

// Opacity header With Scroll
    fl_theme.initOpacityScrollFunction = function(){
        window.addEventListener("scroll", function() {
            let header = $('.enable-opacity-with-scroll .content_header');
            let wScroll = $(this).scrollTop();
            let targetHeight = header.outerHeight();
            let scrollPercent = (targetHeight*1.9 - window.scrollY) / targetHeight ;
            header.each(function () {
                let $this = $(this);
                $this.waypoint(function () {
                        TweenMax.to( $this, 0, {
                            y:wScroll / 4,
                            opacity: scrollPercent,
                            ease: Power2.easeOut
                        });
                    },
                    {
                        offset: offset
                    });

            });
        });
    };
// Testimonial Slider
    fl_theme.initPostImageSliderFunction = function () {
        var testimonila_slider = $('.fl-post-image-slider');
        if(testimonila_slider.length){
            testimonila_slider.each(function() {
                var $this = $(this);
                $this.not('.slick-initialized').slick({
                    dots: false,
                    infinite: true,
                    arrows: true,
                    autoplay:true,
                    autoplaySpeed: 6000,
                    speed: 500,
                    slidesToShow: 1,
                    slidesToScroll: 1,
                    draggable: true,
                    prevArrow: $('.post-prev-slider-btn'),
                    nextArrow: $('.post-next-slider-btn'),
                });
            });
        }
    };
// Venobox
    fl_theme.initVenoBoxFunction = function () {
        var venobox = $('.venobox');
        if(venobox.length){
            venobox.each(function() {
                $(this).venobox();
            });
        }
    };
// Line Height Check
    fl_theme.initLineHeightСheck = function () {
       var $element = $('.post-inner_content >p ,.single-page-wrapper >p');
        $element.each(function() {
            if ($(this).css("font-size") >= "20px") {
                $(this).css('line-height','1.6');
            }
        });
    };
//Search Form Navigatop
    fl_theme.initHeaderSearchForm = function() {
        var $SearchForm = $('.header-search-form'),
            OpenSearchForm = void 0,
            search_form_input = $('form.search_global input'),
            search_form_info_text = $('form.search_global .info-text'),
            $searchformicon =  $('.header-search');

        self.toggleFullscreenSearchForm = function () {
            self[OpenSearchForm ? 'closeFullscreenSearchForm' : 'openFullscreenSearchForm']();
        };




        self.openFullscreenSearchForm = function () {
            if (OpenSearchForm || !$SearchForm.length) {
                return;
            }
            OpenSearchForm = 1;
            //Default
            $searchformicon.addClass('opened');
            $searchformicon.removeClass('closed');

            // set top position and animate
            TweenMax.to($SearchForm, 0.4, {
                opacity: 1,
                display: 'block'
            });
            // Search Input
            TweenMax.to(search_form_input, .2, {
                opacity: 1,
                y: '0',
                delay: .3
            });
            //Info Text
            TweenMax.to(search_form_info_text, .2, {
                opacity: 1,
                y: '0',
                delay: .5
            });


            $SearchForm.addClass('open');
        };

        self.closeFullscreenSearchForm = function () {
            if (!OpenSearchForm || !$SearchForm.length) {
                return;
            }
            OpenSearchForm = 0;
            // disactive all togglers
            $searchformicon.removeClass('opened');
            $searchformicon.addClass('closed');
            // Search input
            TweenMax.to(search_form_input, .4, {
                opacity: 0,
                y: '-20px',

            });
            // Search info text
            TweenMax.to(search_form_info_text, .4, {
                opacity: 0,
                y: '20px',
                delay: .3
            });
            // set top position and animate
            TweenMax.to($SearchForm, .4, {
                force3D: true,
                display: 'none',
                opacity: 0,
                delay: .7
            });

            // open search form wrapper block
            $SearchForm.removeClass('open');

        };

        $(document).keyup(function(e) {
            if(OpenSearchForm === 1){
                if (e.keyCode === 27 )  {
                    $searchformicon.trigger('click');
                }
            }
        });

        $(document).on("scroll",function(e) {
            if(OpenSearchForm === 1){
                $searchformicon.trigger('click');
            }
        });


        $doc.on('click', '.header-search', function (e) {
            self.toggleFullscreenSearchForm();
            e.preventDefault();
        });



    };



    fl_theme.initCustomFunction = function(){
        fl_theme.initEventsCustom();
        // Sidebar
        fl_theme.initStikySidebar();
        // Resize iframe video
        fl_theme.initResponsiveIframe();
        // Image Popup
        fl_theme.initImagePopup();
        // Gallery Popups
        fl_theme.initGalleryPopup();
        // Open Close Mobile Navigation
        fl_theme.initMobileNavigationOpenClose();
        // Sub Menu Animation
        fl_theme.initMobileNavigationSubMenuAnimation();
        //Navbar fixed
        fl_theme.initNavBarFixed();
        // Custom Widget Function
        fl_theme.initCustomWidgetFunction();
        //  WPML Demo Click Link
        fl_theme.initWPMLDemoClickLink();
        //
        fl_theme.initVcCustomFunction();
        //Menu Hover
        fl_theme.initMenuHoverFunction();
        //
        fl_theme.initHoverParallaxImageHeaderFunction();
        // Jarallax
        fl_theme.initJarallaxFunction();
        //
        fl_theme.initOpacityScrollFunction();
        // Post Image Slider
        fl_theme.initPostImageSliderFunction();
        // Venobox
        fl_theme.initVenoBoxFunction();
        // Isotope
        fl_theme.initIsotopeCustomFunction();
        // Line Height Check
        fl_theme.initLineHeightСheck();
        // FullscreenSearch
        fl_theme.initHeaderSearchForm();
    };




    fl_theme.initCustomFunction();
    $($window).on('resize', function() {
        fl_theme.initResponsiveIframe();
        fl_theme.initNavBarFixed();
        // Resize iframe video
        fl_theme.initResponsiveIframe();
    });




});