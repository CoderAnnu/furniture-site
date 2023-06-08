function kswr_reanimate_block(t) {
    t.find(".kswr-animationblock").each(function() {
        var t = jQuery(this),
            a = t.attr("data-animation");
        1 == kswr_return_bool(t.attr("data-reanimation")) && t.removeClass("animated " + a)
    })
}

function kswr_animationblock_trigger() {
    jQuery(".kswr-animationblock").each(function() {
        var t = jQuery(this),
            a = t.attr("data-animation"),
            e = t.attr("data-reanimation");
        t.visible("partial") || 1 == kswr_return_bool(e) && t.removeClass("animated " + a)
    })
}

function kswr_repsponsive_size_manager() {
    jQuery(".kswr-shortcode-element, .rhs-font-elem, .syn-font-elem").each(function() {
        var t = jQuery(this).attr("data-fontsettings");
        if (void 0 != t && "" != t) {
            var a = t.split(";");
            jQuery(window).width() > 991 && kswr_font_size_printer(jQuery(this), a, "font-size"), jQuery(window).width() <= 991 && jQuery(window).width() > 550 && kswr_font_size_printer(jQuery(this), a, "--tablet-font-size"), jQuery(window).width() <= 550 && kswr_font_size_printer(jQuery(this), a, "--phone-font-size")
        }
    }), jQuery(".kswr-responsive-spacer").each(function() {
        var t = jQuery(this);
        jQuery(window).width() > 1200 && t.css({
            height: t.attr("data-desk")
        }), jQuery(window).width() <= 1199 && t.css({
            height: t.attr("data-tablet")
        }), jQuery(window).width() <= 991 && t.css({
            height: t.attr("data-tablet-sm")
        }), jQuery(window).width() <= 767 && t.css({
            height: t.attr("data-phone")
        }), jQuery(window).width() <= 479 && t.css({
            height: t.attr("data-phone-sm")
        })
    })
}

function kswr_font_size_printer(t, a, e) {
    void 0 != a && "" != jQuery.trim(a) && a.forEach(function(a) {
        var r = a.split(":");
        r[0] == e && "" != r[1] && jQuery(t).css("font-size", r[1])
    })
}

function kswr_show_modalwindow(t) {
    
    jQuery(".layout-theme").addClass("ksw-modal");
    
    var a = jQuery(t),
        e = a.attr("data-modal");
    jQuery('.km-overlay[data-modal="' + e + '"]').fadeIn(10, function() {
        jQuery("#" + e).addClass("km-show"), a.hasClass("km-setperspective") && setTimeout(function() {
            jQuery("html").addClass("km-perspective")
        }, 25)
    })
}

function kswr_close_modalwindow(t) {
    
     jQuery(".layout-theme").removeClass("ksw-modal");
    
    jQuery("html").removeClass("km-perspective"), jQuery(".km-modal").removeClass("km-show"), jQuery(".km-modal-video").find("iframe").each(function() {
        jQuery(this).attr("src", jQuery(this).attr("src"))
    }), jQuery(".km-overlay").hide(200), t.preventDefault()
}

function kswr_prevent_default(t) {
    t.stopPropagation()
}

function kswr_cards_gallery(t) {
    var a = (t = jQuery(t)).parent(".kswr-imcgal-insider"),
        e = a.children(".kswr-imcgal-item:first-of-type");
    a.children(".kswr-imcgal-item:nth-of-type(2)");
    t.is(":first-child") || (a.addClass("changed"), setTimeout(function() {
        e.remove(), a.append(e), a.removeClass("changed")
    }, 400))
}

function kswr_return_bool(t) {
    return "true" == t || "false" != t && void 0
}

function kaswara_to_bool(t) {
    return "true" == jQuery.trim(t)
}

function km_cf7_designer_focus(t) {
    jQuery(".km_cf7-input-container").removeClass("filled"), jQuery(t).parent(".km_cf7-input-container").addClass("filled"), km_cf7_designer_checkfill()
}

function km_cf7_designer_blur(t) {
    jQuery(".km_cf7-input-container").removeClass("filled"), km_cf7_designer_checkfill()
}

function km_cf7_designer_checkfill() {
    jQuery(".km_cf7-input").each(function() {
        var t = jQuery(this);
        "" != jQuery.trim(t.val()) && t.parent(".km_cf7-input-container").addClass("filled")
    })
}

function km_cf7_designer_checkfill() {
    jQuery(".km_cf7-input").each(function() {
        var t = jQuery(this);
        "" != jQuery.trim(t.val()) && (t.css({
            "z-index": "99999999999",
            opacity: "1"
        }), t.parent(".km_cf7-input-container").addClass("filled"))
    })
}

function kmfc7_svg_adder_plugin() {
    jQuery(".km_cf7-input-container").find(".km_cf7-graphic").remove(), jQuery('.kameleon-cf7-container[data-style="shoko"]').find(".km_cf7-input-container").append('<svg class="graphic km_cf7-graphic" width="300%" height="100%" viewBox="0 0 1200 60" preserveAspectRatio="none"><path vector-effect="non-scaling-stroke" d="M0,56.5c0,0,298.666,0,399.333,0C448.336,56.5,513.994,46,597,46c77.327,0,135,10.5,200.999,10.5c95.996,0,402.001,0,402.001,0"/><path vector-effect="non-scaling-stroke" d="M0,2.5c0,0,298.666,0,399.333,0C448.336,2.5,513.994,13,597,13c77.327,0,135-10.5,200.999-10.5c95.996,0,402.001,0,402.001,0"/></svg>')
}

function kswr_countdown_updater(t, a) {
    void 0 != a.milliseconds && "undefined" != a.milliseconds && kswr_countdown_printer(t, "milliseconds", a.milliseconds), void 0 != a.seconds && "undefined" != a.seconds && kswr_countdown_printer(t, "seconds", a.seconds), void 0 != a.minutes && "undefined" != a.minutes && kswr_countdown_printer(t, "minutes", a.minutes), void 0 != a.hours && "undefined" != a.hours && kswr_countdown_printer(t, "hours", a.hours), void 0 != a.days && "undefined" != a.days && kswr_countdown_printer(t, "days", a.days), void 0 != a.weeks && "undefined" != a.weeks && kswr_countdown_printer(t, "weeks", a.weeks), void 0 != a.months && "undefined" != a.months && kswr_countdown_printer(t, "months", a.months), void 0 != a.years && "undefined" != a.years && kswr_countdown_printer(t, "years", a.years)
}

function kswr_countdown_printer(t, a, e) {
    var r = t.find('.kswr-countdown-elem[data-type="' + a + '"]'),
        n = r.attr("data-singular"),
        i = r.attr("data-plural"),
        s = r.find(".kswr-countdown-digit span");
    e <= 1 ? r.find(".kswr-countdown-unit span").html(n) : r.find(".kswr-countdown-unit span").html(i), e < 10 ? parseInt(s.html()) != parseInt(e) && s.html("0" + e) : parseInt(s.html()) != parseInt(e) && s.html(e)
}

function kswr_countdown_elements(t) {
    var a = null;
    return -1 !== (t = t.split(",")).indexOf("YEARS") && (a += countdown.YEARS), -1 !== t.indexOf("MONTHS") && (a += countdown.MONTHS), -1 !== t.indexOf("WEEKS") && (a += countdown.WEEKS), -1 !== t.indexOf("DAYS") && (a += countdown.DAYS), -1 !== t.indexOf("HOURS") && (a += countdown.HOURS), -1 !== t.indexOf("MINUTES") && (a += countdown.MINUTES), -1 !== t.indexOf("SECONDS") && (a += countdown.SECONDS), -1 !== t.indexOf("MILLISECONDS") && (a += countdown.MILLISECONDS), a
}

function sayen_isotope_show() {
    jQuery(".syn-isotope-item").bind("inview", function(t) {
        t && jQuery(this).attr({
            "data-isotope-situation": "shown"
        })
    })
}

function sayen_isotope_options(t) {
    var a = t.attr("data-gutter"),
        e = {
            itemSelector: ".syn-isotope-item",
            transitionDuration: "0",
            percentPosition: !0,
            masonry: {
                percentPosition: !0,
                columnWidth: t.find(".syn-isotope-item")[0],
                itemSelector: ".syn-isotope-item",
                gutter: parseInt(a)
            }
        };
    imagesLoaded(t, function() {
        t.isotope(e), t.css({
            opacity: "1"
        }), sayen_isotope_show()
    })
}
jQuery(function(t) {
    /MSIE 10/i.test(navigator.userAgent) || /MSIE 9/i.test(navigator.userAgent) || /rv:11.0/i.test(navigator.userAgent) || /Edge\/\d./i.test(navigator.userAgent), t(document).ready(function() {
        t("[data-tilt]").tilt({
            maxTilt: 20,
            perspective: 1e3,
            easing: "cubic-bezier(.03,.98,.52,.99)",
            scale: 1,
            speed: 100,
            transition: !0,
            axis: null,
            reset: !0,
            glare: !1,
            maxGlare: 1
        }), t(".syn-parallaxf-container").on("mousemove", function(a) {
            var e = t(this),
                r = e.offset(),
                n = 100 * (a.pageX - r.left) / e.width(),
                i = 100 * (a.pageY - r.top) / e.height();
            e.find('.syn-parallaxf-item[data-parallax-move="enabled"]').each(function(a, e) {
                var r = (e = t(e)).attr("data-parallax-sensitive");
                void 0 != t.trim(r) && "" == t.trim(r) || (r = 1), e.css({
                    "-webkit-transform": "translate(" + n * -r + "px, " + i * -r + "px)",
                    transform: "translate(" + n * -r + "px, " + i * -r + "px)"
                })
            })
        }), t(".syn-hotspot-container").find(".syn-hotspot-insider").sayenhotspot(), t(".kswr-row-element-back").each(function() {
            var a = t(this).children(".kswr-row-ver-separator-container-top"),
                e = t(this).children(".kswr-row-ver-separator-container-bottom");
            t(this).children(".kswr-row-ver-separator-container").remove();
            var r = t(this)[0].outerHTML,
                n = t(this).attr("data-classes");
            t(this).prevAll("div.vc_row:first").addClass(n).prepend(r), a.length > 0 && t(a[0].outerHTML).insertBefore(t(this).prevAll("div.vc_row:first")), e.length > 0 && t(e[0].outerHTML).insertAfter(t(this).prevAll("div.vc_row:first")), t(this).remove()
        }), t(".kswr-column-settings").each(function() {
            var a = t(this).attr("data-classes");
            if ("on" == t(this).attr("data-isminheight")) {
                var e = t(this).attr("data-minheight");
                console.log(e), t(this).prevAll("div.wpb_column:first").children(".vc_column-inner").css({
                    "min-height": e
                })
            }
            t(this).prevAll("div.wpb_column:first").addClass(a), t(this).remove()
        }), t(".km-twentytwenty-container[data-orientation!='vertical']").twentytwenty(), t(".km-twentytwenty-container[data-orientation='vertical']").twentytwenty({
            orientation: "vertical"
        }), kmfc7_svg_adder_plugin(), t(".kswr-countdown-container").each(function() {
            var a = t(this).attr("data-deadline"),
                e = t(this),
                r = t(this).attr("data-countdown");
            kswr_countdown_elements(r);
            countdown(new Date(Date.parse(a.replace(/-/g, "/"))), function(t) {
                kswr_countdown_updater(e, t)
            }, kswr_countdown_elements(r))
        }), t(".km-item-bind-view").bind("inview", function(a) {
            a ? t(this).removeClass("km-item-bind-hidden").addClass("km-item-bind-shown") : t(this).unbind("inview")
        }), kswr_animationblock_trigger(), t(".kswr-situation-bind").bind("inview", function(a) {
            var e = t(this);
            if (a) {
                var r = e.attr("data-delay");
                void 0 !== r && !1 !== r ? setTimeout(function() {
                    e.attr({
                        "data-situation": "shown"
                    })
                }, r) : e.attr({
                    "data-situation": "shown"
                })
            } else t(this).unbind("inview")
        }), t(window).width() <= 930 && t(".pp-tableCell").addClass("ppkswr-responsive"), t(".kswr-piling-container").each(function() {
            var a = t(this);
            a.find(".vc_row").css({
                width: a.parents(".vc_row").width(),
                margin: "auto"
            });
            var e = parseInt(a.attr("data-speed")),
                r = kaswara_to_bool(a.attr("data-css3")),
                n = kaswara_to_bool(a.attr("data-looptop")),
                i = kaswara_to_bool(a.attr("data-loopbottom")),
                s = a.attr("data-navbulletcolor"),
                o = a.attr("data-navtooltipcolor"),
                d = a.attr("data-navposition"),
                l = a.attr("data-transanimation"),
                p = kaswara_to_bool(a.attr("data-verticalcentered")),
                c = [];
            a.children(".kswr-piling-section").each(function() {
                "" != t.trim(t(this).attr("data-tooltip")) && c.push(t(this).attr("data-tooltip"))
            }), a.pagepiling({
                verticalCentered: p,
                scrollingSpeed: e,
                easing: "swing",
                loopBottom: i,
                loopTop: n,
                css3: r,
                navigation: {
                    position: d,
                    tooltips: c
                },
                normalScrollElements: ".pp-tableCell.ppkswr-responsive",
                animateAnchor: !0,
                touchSensitivity: 5,
                keyboardScrolling: !0,
                sectionSelector: ".kswr-piling-section",
                onLeave: function(t, e, r) {
                    var n = a.children(".kswr-piling-section:nth-of-type(" + t + ")"),
                        i = a.children(".kswr-piling-section:nth-of-type(" + e + ")"),
                        s = a.children(".kswr-piling-section:nth-of-type(" + parseInt(t - 1) + ")");
                    "down" == r && ("normal" == l && (i.addClass("no-transition").css({
                        transform: "translate3d(0px, 0px, 0px)",
                        "-webkit-transform": "translate3d(0px, 0px, 0px)"
                    }), a.children(".kswr-piling-section:not(.kswr-piling-section:nth-of-type(" + e + "))").removeClass("no-transition").css({
                        transform: "translate3d(0px, -100%, 0px)",
                        "-webkit-transform": "translate3d(0px, -100%, 0px)"
                    })), "scale" == l && (i.addClass("no-transition").css({
                        transform: "translate3d(0px, 0px, 0px) scale(1)",
                        "-webkit-transform": "translate3d(0px, 0px, 0px) scale(1)"
                    }), a.children(".kswr-piling-section:not(.kswr-piling-section:nth-of-type(" + e + "))").removeClass("no-transition").css({
                        transform: "translate3d(0px, -100%, 0px) scale(.85)",
                        "-webkit-transform": "translate3d(0px, -100%, 0px) scale(.85)"
                    })), "modern" == l && (n.attr({
                        style: "transform:scale(.85) !important;-webkit-transform:scale(.85) !important; z-index:1!important; transform-origin: center bottom !important;"
                    }), i.attr({
                        style: "z-index:2!important; transform:translate3d(0px, 0px, 0px)!important;-webkit-transform: translate3d(0px, 0px, 0px)!important; "
                    })), "parallax" == l && (i.removeClass("small-transition").attr({
                        style: "z-index:2!important; transform:translate3d(0px, 0px, 0px)!important;-webkit-transform: translate3d(0px, 0px, 0px)!important; "
                    }), n.addClass("small-transition").attr({
                        style: "transform:translate3d(0px, -70%, 0px)!important;-webkit-transform:translate3d(0px, -70%, 0px)!important; z-index:1!important;"
                    }))), "up" == r && ("normal" == l && i.css({
                        transform: "translate3d(0px, 0px, 0px)",
                        "-webkit-transform": "translate3d(0px, 0px, 0px)"
                    }), "scale" == l && i.css({
                        transform: "translate3d(0px, 0px, 0px) scale(1)",
                        "-webkit-transform": "translate3d(0px, 0px, 0px) scale(1)"
                    }), "parallax" == l && (i.removeClass("small-transition").attr({
                        style: "z-index:2!important; transform:translate3d(0px, 0%, 0px)!important;-webkit-transform:translate3d(0px, 0%, 0px)!important;"
                    }), n.addClass("small-transition").attr({
                        style: " z-index:1!important; transform::translate3d(0px, 70%, 0px)!important;-webkit-transform:translate3d(0px, 70%, 0px)!important;"
                    })), "modern" == l && (i.attr({
                        style: "z-index:2!important; transform:translate3d(0px, 0px, 0px)!important;-webkit-transform: translate3d(0px, 0px, 0px)!important;"
                    }), n.attr({
                        style: " z-index:1!important; transform:scale(.85) !important;-webkit-transform:scale(.85) !important; transform-origin: center top!important;"
                    }))), kswr_reanimate_block(s), kswr_reanimate_block(i)
                },
                afterLoad: function(t, e) {
                    var r = a.children(".kswr-piling-section:nth-of-type(" + e + ")"),
                        n = a.children(".kswr-piling-section:nth-of-type(" + parseInt(e - 1) + ")"),
                        i = a.children(".kswr-piling-section:nth-of-type(" + parseInt(e + 1) + ")");
                    "normal" == l && (r.addClass("no-transition").css({
                        transform: "translate3d(0px, 0px, 0px)",
                        "-webkit-transform": "translate3d(0px, 0px, 0px)"
                    }), a.children(".kswr-piling-section:not(.kswr-piling-section:nth-of-type(" + e + "))").removeClass("no-transition").css({
                        transform: "translate3d(0px, -100%, 0px)",
                        "-webkit-transform": "translate3d(0px, -100%, 0px)"
                    })), "modern" == l && (n.attr({
                        style: " z-index:1!important; transform:translate3d(0px, -100%, 0px) scale(1) !important;-webkit-transform:translate3d(0px, -100%, 0px) scale(1) !important; "
                    }), i.attr({
                        style: " z-index:1!important; transform:translate3d(0px, 100%, 0px) scale(1) !important;-webkit-transform:translate3d(0px, 100%, 0px) scale(1) !important;"
                    })), "parallax" == l && (n.removeClass("small-transition").attr({
                        style: " z-index:1!important; transform:translate3d(0px, -100%, 0px)!important;-webkit-transform:translate3d(0px, -100%, 0px)!important; "
                    }), i.removeClass("small-transition").attr({
                        style: " z-index:1!important; transform:translate3d(0px, 100%, 0px)!important;-webkit-transform:translate3d(0px, 100%, 0px)!important;"
                    }))
                },
                afterRender: function() {}
            }), t("#pp-nav").find("span").attr({
                style: "color:" + o + "!important;background:" + s + " !important;border-color:" + s + "!important;"
            })
        }), t(window).scroll(function() {
            kswr_animationblock_trigger(), t('.kswr-row-parallax[data-parallaxtype="vertical_prlx"] .kswr-element-back-overlay, .kswr-row-parallax[data-parallaxtype="horizontal_prlx"] .kswr-element-back-overlay').each(function() {
                var a = t(this).parent(".kswr-row-parallax"),
                    e = t(this),
                    r = a.attr("data-parallaxtype"),
                    n = a.attr("data-parallaxspeed"),
                    i = (window.pageYOffset, e.css("backgroundPosition").split(" "));
                a.visible("partial");
                if ("vertical_prlx" == t.trim(r)) {
                    "" != a.attr("data-ypos-start") && void 0 != a.attr("data-ypos-start") || a.attr("data-ypos-start", i[1]);
                    var s = parseFloat(i[1]) * parseFloat(a.css("height")) / 100;
                    "" != a.attr("data-ypos") && void 0 != a.attr("data-ypos") || a.attr("data-ypos", s), "100%" == i[1] && (s = -s);
                    var o = window.pageYOffset * Number(n) - parseFloat(a.attr("data-ypos")) + "px";
                    "0%" == a.attr("data-ypos-start") && (o = parseFloat(a.attr("data-ypos")) - window.pageYOffset * Number(n) + "px"), "50%" == a.attr("data-ypos-start") && (o = "calc(50% + " + window.pageYOffset * Number(n) + "px)"), e.css("background-position-y", o)
                }
                if ("horizontal_prlx" == t.trim(r)) {
                    "" != a.attr("data-xpos-start") && void 0 != a.attr("data-xpos-start") || a.attr("data-xpos-start", i[0]);
                    var d = parseFloat(i[0]) * parseFloat(a.css("width")) / 100;
                    "" != a.attr("data-xpos") && void 0 != a.attr("data-xpos") || a.attr("data-xpos", d), "100%" == i[0] && (d = -d);
                    var l = window.pageYOffset * Number(n) - parseFloat(a.attr("data-xpos")) + "px";
                    "0%" == a.attr("data-xpos-start") && (l = parseFloat(a.attr("data-xpos")) - window.pageYOffset * Number(n) + "px"), "50%" == a.attr("data-xpos-start") && (l = "calc(50% - " + window.pageYOffset * Number(n) * .5 + "px)"), e.css("background-position-x", l)
                }
            })
        }), t('.kswr-row-parallax[data-parallaxtype="vertical_move"] .kswr-element-back-overlay, .kswr-row-parallax[data-parallaxtype="horizontal_move"] .kswr-element-back-overlay').each(function() {
            var a = t(this).parent(".kswr-row-parallax"),
                e = t(this),
                r = a.attr("data-parallaxtype"),
                n = a.attr("data-parallaxautospeed");
            n = 100 - n;
            var i = 0;
            if ("horizontal_move" == t.trim(r)) {
                s = a.attr("data-horizmoveto");
                setInterval(function(t) {
                    "left" == s ? i -= 1 : i += 1, e.css("background-position-x", i + "px")
                }, n)
            }
            if ("vertical_move" == t.trim(r)) {
                var s = a.attr("data-vertmoveto");
                setInterval(function(t) {
                    "top" == s ? i -= 1 : i += 1, e.css("background-position-y", i + "px")
                }, n)
            }
        }), t(".vc_row").mousemove(function(a) {
            var e = t(this).find('.kswr-row-parallax[data-parallaxtype="follow_mouse"] .kswr-row-parallax-followmouse'),
                r = e.children(".kswr-element-back-overlay");
            if (void 0 != e && "" != e) {
                void 0 != e.attr("data-theX") && "" != e.attr("data-theX") || e.attr("data-theX", r.css("background-position-x")), void 0 != e.attr("data-theY") && "" != e.attr("data-theY") || e.attr("data-theY", r.css("background-position-y"));
                var n = e.attr("data-theX"),
                    i = e.attr("data-theY"),
                    s = 50 / t(window).height(),
                    o = 50 / t(window).width() * (a.pageX - t(window).width() / 2) * -1 - 25,
                    d = s * (a.pageY - t(window).height() / 2) * -1 - 50;
                void 0 != n && void 0 != i && r.css("background-position", "calc(" + n + " + " + o + "px) calc(" + i + " + " + d + "px)")
            }
        }), t(".kswr-slickslider-container").each(function() {
            t(this).attr("data-vertical");
            
            
            var a = t(this).attr("data-slidestoshow-desk"),
                e = t(this).attr("data-slidestoscroll-desk"),
                r = t(this).attr("data-slidestoshow-tablet"),
                n = t(this).attr("data-slidestoscroll-tablet"),
                i = t(this).attr("data-slidestoshow-mobile"),
                s = t(this).attr("data-slidestoscroll-mobile"),
                o = t(this).attr("data-speed"),
                d = kswr_return_bool(t(this).attr("data-infinite")),
                l = kswr_return_bool(t(this).attr("data-autoplay")),
                p = t(this).attr("data-autoplayspeed"),
                c = kswr_return_bool(t(this).attr("data-adaptiveheight")),
                m = kswr_return_bool(t(this).attr("data-centermode")),
                w = t(this).attr("data-centerpadding"),
                u = t(this).attr("data-centerpaddingtablet"),
                f = t(this).attr("data-centerpaddingmobile"),
                h = kswr_return_bool(t(this).attr("data-dots")),
                k = kswr_return_bool(t(this).attr("data-arrows")),
                v = t(this).attr("data-tabletbreakpoint"),
                y = t(this).attr("data-phonebreakpoint");
            t(this).slick({
                slidesToShow: parseInt(a),
                slidesToScroll: parseInt(e),
                speed: parseInt(o),
                infinite: d,
                dots: h,
                arrows: k,
                autoplay: l,
                autoplaySpeed: parseInt(p),
                adaptiveHeight: c,
                centerMode: m,
                centerPadding: w,
                
                
           
                
                
               /* responsive: [{
                    breakpoint: parseInt(v),
                    settings: {
                        slidesToShow: parseInt(r),
                        centerPadding: u,
                        slidesToScroll: parseInt(n)
                    }
                }]
                
                ,
                
                  responsive: [{
                    breakpoint: parseInt(y),
                    settings: {
                        slidesToShow: parseInt(i),
                        centerPadding: f,
                        slidesToScroll: parseInt(s)
                    }
                }] */
                
                
                
       responsive: [
   
    {
       breakpoint: parseInt(v),
                    settings: {
                        slidesToShow: parseInt(r),
                        centerPadding: u,
                        slidesToScroll: parseInt(n)
      }
    },
    {
      breakpoint: parseInt(y),
                    settings: {
                        slidesToShow: parseInt(i),
                        centerPadding: f,
                        slidesToScroll: parseInt(s)
      }
    }

  ]
     
                          
                          
                          
                
                
            })
        }), t(window).keydown(function(t) {
            27 == t.keyCode && kswr_close_modalwindow(event)
        }), t(".kswr-imcgal-container").each(function() {
            var a = t(this);
            a.find(".kswr-imcgal-fakeone").html(a.find(".kswr-imcgal-item:first-of-type").html())
        }), t(".kswr-fancytext").each(function() {
            var a = t(this),
                e = a.attr("data-style"),
                r = {
                    content: ""
                };
            "" != t.trim(a.attr("data-words")) && (r = JSON.parse(a.attr("data-words")));
            var n = [];
            for (var i in r) "" != t.trim(r[i]) && n.push({
                content: r[i]
            });
            var s = {
                cursor: kswr_return_bool(a.attr("data-cursor")),
                holdTime: a.attr("data-holdtime"),
                words: n
            };
            "typing" == t.trim(e) && (s.typing = !0, s.typeSpeed = a.attr("data-typespeed"), s.typeAnimation = a.attr("data-typeanimation")), t(this).sayenft(s)
        }), t(".kswr-animationblock").on("inview", function(a) {
            var e = t(this),
                r = e.attr("data-animation");
            a && e.addClass("animated " + r)
        }), t(".kswr-counter-value").bind("inview", function(a) {
            if (a) {
                var e = t(this);
                if ("done" != e.attr("data-done")) {
                    var r = {
                        endVal: e.attr("data-endVal"),
                        separator: e.attr("data-separator"),
                        decimal: e.attr("data-decimal"),
                        duration: e.attr("data-duration")
                    };
                    e.kaswaracount(r), e.attr("data-done", "done")
                }
            } else t(this).unbind("inview")
        }), t(".kswr-vsklbr-container").bind("inview", function(a) {
            if (a) {
                var e = t(this).attr("data-percent");
                t(this).find(".kswr-vsklbr-bar-value").animate({
                    height: e + "%"
                }, 1)
            } else t(this).unbind("inview")
        }), t(".syn-isotope-container").each(function(a, e) {
            sayen_isotope_options(e = t(e))
        }), t(".km-progressbar-container").bind("inview", function(a) {
            if (a) {
                var e = t(this).attr("data-percent");
                "style_1" == t(this).attr("data-style") && t(this).find(".km-progressbar-tooltip").css({
                    left: "calc( " + e + "% - 35px )"
                }), t(this).find(".km-progressbar-thebar").css({
                    width: e + "%"
                })
            } else t(this).unbind("inview")
        }), t(".km-radial-progressbar").bind("inview", function(a) {
            var e = t(this);
            if (a) {
                setTimeout(function() {
                    e.attr("data-progress", parseInt(e.attr("data-value")))
                }, 200);
                var r = 0,
                    n = parseInt(e.attr("data-value")),
                    i = function() {
                        if (parseInt(e.find(".perc-value").html()) != n) setTimeout(function() {
                            e.find(".perc-value").html(r), r < n && i(), r += 1
                        }, 30)
                    };
                i()
            } else t(this).unbind("inview")
        }), t(".km-line-sep-container").bind("inview", function(a) {
            a ? t(this).addClass("km-line-shown") : t(this).unbind("inview")
        }), t(".syp-items-wrapper, .syp-items-wrapper-post").each(function(a, e) {
            var e = t(e),
                r = {
                    itemSelector: ".syp-item",
                    transitionDuration: 0,
                    percentPosition: !0,
                    masonry: {
                        columnWidth: ".syp-item",
                        gutter: parseInt(e.attr("data-gutter"))
                    }
                };
            imagesLoaded(e, function() {
                e.isotope(r), e.css({
                    opacity: "1"
                })
            })
        }), t(".km-masonry-item").bind("inview", function(a) {
            a ? t(this).removeClass("km-masonry-item-hidden").addClass("km-masonry-item-shown") : t(this).unbind("inview")
        }), t(".km-filteri-items-list,.km-portfolio-loop,.syp-items-wrapper").each(function(a) {
            var e = t(this),
                r = e.attr("data-columns"),
                n = 0,
                i = 1,
                s = 1;
            e.children(".km-masonry-item,.portfolio-item").each(function(a, e) {
                a += 1, n = "." + (s += 2) + "s", t(this).css({
                    "-webkit-transition": "all .4s ease-in-out " + n + ", box-shadow .3s ease-in-out",
                    transition: "all .4s ease-in-out " + n + ", box-shadow .3s ease-in-out"
                }), a == r * i && (i += 1, s = 1)
            })
        }), t(".km-filteri-items-list").each(function(a, e) {
            var e = t(e),
                r = {
                    itemSelector: ".km-filteri-item",
                    transitionDuration: 0,
                    percentPosition: !0,
                    masonry: {
                        columnWidth: ".km-filteri-item",
                        gutter: 25
                    }
                };
            imagesLoaded(e, function() {
                e.isotope(r), e.css({
                    opacity: "1"
                })
            })
        }), t(".km-filteri-cats").children(".km-filteri-link").click(function() {
            var a = t(this),
                e = a.parent(".km-filteri-cats").next(".km-filteri-items-list, .rhs-isotope-container, .syn-isotope-container");
            a.parent(".km-filteri-cats").children(".km-filteri-link").attr({
                "data-active": "false"
            }), a.attr({
                "data-active": "true"
            });
            var r = a.attr("data-filter");
            e.isotope({
                filter: r
            })
        }), kswr_repsponsive_size_manager(), t(window).resize(function() {
            t(window).width() <= 930 ? t(".pp-tableCell").addClass("ppkswr-responsive") : t(".pp-tableCell").removeClass("ppkswr-responsive"), t(".kswr-piling-container").find(".vc_row").css({
                width: t(".kswr-piling-container").parents(".vc_row").width(),
                margin: "auto"
            }), kswr_repsponsive_size_manager()
        }), sayen_isotope_show()
    })
}), jQuery(document).ready(function() {
    jQuery("html").addClass("sidebysidepage"), jQuery(".sidebysidepage").children("body").attr({
        style: "--nav-color-nav:" + jQuery(".km-sidebyside-container").attr("data-color")
    }), jQuery(window).width() >= 1050 && jQuery(".km-sidebyside-container").each(function(t) {
        $ctn = jQuery(this);
        var a = {
            scrollingSpeed: parseInt(jQuery(this).attr("data-speed")),
            navigation: kaswara_to_bool(jQuery(this).attr("data-navigation")),
            navigationPosition: jQuery(this).attr("data-position"),
            easing: jQuery(this).attr("data-easing"),
            loopBottom: kaswara_to_bool(jQuery(this).attr("data-loop")),
            loopTop: kaswara_to_bool(jQuery(this).attr("data-loop")),
            css3: kaswara_to_bool(jQuery(this).attr("data-css3")),
            onLeave: function(t, a, e) {
                var r = $ctn.find(".km-sidebyside-element-container:nth-of-type(" + a + ")");
                kswr_reanimate_block($ctn.find(".km-sidebyside-element-container:nth-of-type(" + parseInt(t - 1) + ")")), kswr_reanimate_block(r)
            }
        };
        jQuery(this).multiscroll(a)
    })
});

//All the External Plugins
//Isotope Js
! function(a) {
    function b() {}

    function c(a) {
        function c(b) {
            b.prototype.option || (b.prototype.option = function(b) {
                a.isPlainObject(b) && (this.options = a.extend(!0, this.options, b))
            })
        }

        function e(b, c) {
            a.fn[b] = function(e) {
                if ("string" == typeof e) {
                    for (var g = d.call(arguments, 1), h = 0, i = this.length; i > h; h++) {
                        var j = this[h],
                            k = a.data(j, b);
                        if (k)
                            if (a.isFunction(k[e]) && "_" !== e.charAt(0)) {
                                var l = k[e].apply(k, g);
                                if (void 0 !== l) return l
                            } else f("no such method '" + e + "' for " + b + " instance");
                        else f("cannot call methods on " + b + " prior to initialization; attempted to call '" + e + "'")
                    }
                    return this
                }
                return this.each(function() {
                    var d = a.data(this, b);
                    d ? (d.option(e), d._init()) : (d = new c(this, e), a.data(this, b, d))
                })
            }
        }
        if (a) {
            var f = "undefined" == typeof console ? b : function(a) {
                console.error(a)
            };
            return a.bridget = function(a, b) {
                c(b), e(a, b)
            }, a.bridget
        }
    }
    var d = Array.prototype.slice;
    "function" == typeof define && define.amd ? define("jquery-bridget/jquery.bridget", ["jquery"], c) : c("object" == typeof exports ? require("jquery") : a.jQuery)
}(window),
function(a) {
    function b(b) {
        var c = a.event;
        return c.target = c.target || c.srcElement || b, c
    }
    var c = document.documentElement,
        d = function() {};
    c.addEventListener ? d = function(a, b, c) {
        a.addEventListener(b, c, !1)
    } : c.attachEvent && (d = function(a, c, d) {
        a[c + d] = d.handleEvent ? function() {
            var c = b(a);
            d.handleEvent.call(d, c)
        } : function() {
            var c = b(a);
            d.call(a, c)
        }, a.attachEvent("on" + c, a[c + d])
    });
    var e = function() {};
    c.removeEventListener ? e = function(a, b, c) {
        a.removeEventListener(b, c, !1)
    } : c.detachEvent && (e = function(a, b, c) {
        a.detachEvent("on" + b, a[b + c]);
        try {
            delete a[b + c]
        } catch (d) {
            a[b + c] = void 0
        }
    });
    var f = {
        bind: d,
        unbind: e
    };
    "function" == typeof define && define.amd ? define("eventie/eventie", f) : "object" == typeof exports ? module.exports = f : a.eventie = f
}(window),
function() {
    "use strict";

    function a() {}

    function b(a, b) {
        for (var c = a.length; c--;)
            if (a[c].listener === b) return c;
        return -1
    }

    function c(a) {
        return function() {
            return this[a].apply(this, arguments)
        }
    }
    var d = a.prototype,
        e = this,
        f = e.EventEmitter;
    d.getListeners = function(a) {
        var b, c, d = this._getEvents();
        if (a instanceof RegExp) {
            b = {};
            for (c in d) d.hasOwnProperty(c) && a.test(c) && (b[c] = d[c])
        } else b = d[a] || (d[a] = []);
        return b
    }, d.flattenListeners = function(a) {
        var b, c = [];
        for (b = 0; b < a.length; b += 1) c.push(a[b].listener);
        return c
    }, d.getListenersAsObject = function(a) {
        var b, c = this.getListeners(a);
        return c instanceof Array && (b = {}, b[a] = c), b || c
    }, d.addListener = function(a, c) {
        var d, e = this.getListenersAsObject(a),
            f = "object" == typeof c;
        for (d in e) e.hasOwnProperty(d) && -1 === b(e[d], c) && e[d].push(f ? c : {
            listener: c,
            once: !1
        });
        return this
    }, d.on = c("addListener"), d.addOnceListener = function(a, b) {
        return this.addListener(a, {
            listener: b,
            once: !0
        })
    }, d.once = c("addOnceListener"), d.defineEvent = function(a) {
        return this.getListeners(a), this
    }, d.defineEvents = function(a) {
        for (var b = 0; b < a.length; b += 1) this.defineEvent(a[b]);
        return this
    }, d.removeListener = function(a, c) {
        var d, e, f = this.getListenersAsObject(a);
        for (e in f) f.hasOwnProperty(e) && (d = b(f[e], c), -1 !== d && f[e].splice(d, 1));
        return this
    }, d.off = c("removeListener"), d.addListeners = function(a, b) {
        return this.manipulateListeners(!1, a, b)
    }, d.removeListeners = function(a, b) {
        return this.manipulateListeners(!0, a, b)
    }, d.manipulateListeners = function(a, b, c) {
        var d, e, f = a ? this.removeListener : this.addListener,
            g = a ? this.removeListeners : this.addListeners;
        if ("object" != typeof b || b instanceof RegExp)
            for (d = c.length; d--;) f.call(this, b, c[d]);
        else
            for (d in b) b.hasOwnProperty(d) && (e = b[d]) && ("function" == typeof e ? f.call(this, d, e) : g.call(this, d, e));
        return this
    }, d.removeEvent = function(a) {
        var b, c = typeof a,
            d = this._getEvents();
        if ("string" === c) delete d[a];
        else if (a instanceof RegExp)
            for (b in d) d.hasOwnProperty(b) && a.test(b) && delete d[b];
        else delete this._events;
        return this
    }, d.removeAllListeners = c("removeEvent"), d.emitEvent = function(a, b) {
        var c, d, e, f, g = this.getListenersAsObject(a);
        for (e in g)
            if (g.hasOwnProperty(e))
                for (d = g[e].length; d--;) c = g[e][d], c.once === !0 && this.removeListener(a, c.listener), f = c.listener.apply(this, b || []), f === this._getOnceReturnValue() && this.removeListener(a, c.listener);
        return this
    }, d.trigger = c("emitEvent"), d.emit = function(a) {
        var b = Array.prototype.slice.call(arguments, 1);
        return this.emitEvent(a, b)
    }, d.setOnceReturnValue = function(a) {
        return this._onceReturnValue = a, this
    }, d._getOnceReturnValue = function() {
        return this.hasOwnProperty("_onceReturnValue") ? this._onceReturnValue : !0
    }, d._getEvents = function() {
        return this._events || (this._events = {})
    }, a.noConflict = function() {
        return e.EventEmitter = f, a
    }, "function" == typeof define && define.amd ? define("eventEmitter/EventEmitter", [], function() {
        return a
    }) : "object" == typeof module && module.exports ? module.exports = a : e.EventEmitter = a
}.call(this),
    function(a) {
        function b(a) {
            if (a) {
                if ("string" == typeof d[a]) return a;
                a = a.charAt(0).toUpperCase() + a.slice(1);
                for (var b, e = 0, f = c.length; f > e; e++)
                    if (b = c[e] + a, "string" == typeof d[b]) return b
            }
        }
        var c = "Webkit Moz ms Ms O".split(" "),
            d = document.documentElement.style;
        "function" == typeof define && define.amd ? define("get-style-property/get-style-property", [], function() {
            return b
        }) : "object" == typeof exports ? module.exports = b : a.getStyleProperty = b
    }(window),
    function(a, b) {
        function c(a) {
            var b = parseFloat(a),
                c = -1 === a.indexOf("%") && !isNaN(b);
            return c && b
        }

        function d() {}

        function e() {
            for (var a = {
                    width: 0,
                    height: 0,
                    innerWidth: 0,
                    innerHeight: 0,
                    outerWidth: 0,
                    outerHeight: 0
                }, b = 0, c = h.length; c > b; b++) {
                var d = h[b];
                a[d] = 0
            }
            return a
        }

        function f(b) {
            function d() {
                if (!m) {
                    m = !0;
                    var d = a.getComputedStyle;
                    if (j = function() {
                            var a = d ? function(a) {
                                return d(a, null)
                            } : function(a) {
                                return a.currentStyle
                            };
                            return function(b) {
                                var c = a(b);
                                return c || g("Style returned " + c + ". Are you running this code in a hidden iframe on Firefox? See http://bit.ly/getsizebug1"), c
                            }
                        }(), k = b("boxSizing")) {
                        var e = document.createElement("div");
                        e.style.width = "200px", e.style.padding = "1px 2px 3px 4px", e.style.borderStyle = "solid", e.style.borderWidth = "1px 2px 3px 4px", e.style[k] = "border-box";
                        var f = document.body || document.documentElement;
                        f.appendChild(e);
                        var h = j(e);
                        l = 200 === c(h.width), f.removeChild(e)
                    }
                }
            }

            function f(a) {
                if (d(), "string" == typeof a && (a = document.querySelector(a)), a && "object" == typeof a && a.nodeType) {
                    var b = j(a);
                    if ("none" === b.display) return e();
                    var f = {};
                    f.width = a.offsetWidth, f.height = a.offsetHeight;
                    for (var g = f.isBorderBox = !(!k || !b[k] || "border-box" !== b[k]), m = 0, n = h.length; n > m; m++) {
                        var o = h[m],
                            p = b[o];
                        p = i(a, p);
                        var q = parseFloat(p);
                        f[o] = isNaN(q) ? 0 : q
                    }
                    var r = f.paddingLeft + f.paddingRight,
                        s = f.paddingTop + f.paddingBottom,
                        t = f.marginLeft + f.marginRight,
                        u = f.marginTop + f.marginBottom,
                        v = f.borderLeftWidth + f.borderRightWidth,
                        w = f.borderTopWidth + f.borderBottomWidth,
                        x = g && l,
                        y = c(b.width);
                    y !== !1 && (f.width = y + (x ? 0 : r + v));
                    var z = c(b.height);
                    return z !== !1 && (f.height = z + (x ? 0 : s + w)), f.innerWidth = f.width - (r + v), f.innerHeight = f.height - (s + w), f.outerWidth = f.width + t, f.outerHeight = f.height + u, f
                }
            }

            function i(b, c) {
                if (a.getComputedStyle || -1 === c.indexOf("%")) return c;
                var d = b.style,
                    e = d.left,
                    f = b.runtimeStyle,
                    g = f && f.left;
                return g && (f.left = b.currentStyle.left), d.left = c, c = d.pixelLeft, d.left = e, g && (f.left = g), c
            }
            var j, k, l, m = !1;
            return f
        }
        var g = "undefined" == typeof console ? d : function(a) {
                console.error(a)
            },
            h = ["paddingLeft", "paddingRight", "paddingTop", "paddingBottom", "marginLeft", "marginRight", "marginTop", "marginBottom", "borderLeftWidth", "borderRightWidth", "borderTopWidth", "borderBottomWidth"];
        "function" == typeof define && define.amd ? define("get-size/get-size", ["get-style-property/get-style-property"], f) : "object" == typeof exports ? module.exports = f(require("desandro-get-style-property")) : a.getSize = f(a.getStyleProperty)
    }(window),
    function(a) {
        function b(a) {
            "function" == typeof a && (b.isReady ? a() : g.push(a))
        }

        function c(a) {
            var c = "readystatechange" === a.type && "complete" !== f.readyState;
            b.isReady || c || d()
        }

        function d() {
            b.isReady = !0;
            for (var a = 0, c = g.length; c > a; a++) {
                var d = g[a];
                d()
            }
        }

        function e(e) {
            return "complete" === f.readyState ? d() : (e.bind(f, "DOMContentLoaded", c), e.bind(f, "readystatechange", c), e.bind(a, "load", c)), b
        }
        var f = a.document,
            g = [];
        b.isReady = !1, "function" == typeof define && define.amd ? define("doc-ready/doc-ready", ["eventie/eventie"], e) : "object" == typeof exports ? module.exports = e(require("eventie")) : a.docReady = e(a.eventie)
    }(window),
    function(a) {
        "use strict";

        function b(a, b) {
            return a[g](b)
        }

        function c(a) {
            if (!a.parentNode) {
                var b = document.createDocumentFragment();
                b.appendChild(a)
            }
        }

        function d(a, b) {
            c(a);
            for (var d = a.parentNode.querySelectorAll(b), e = 0, f = d.length; f > e; e++)
                if (d[e] === a) return !0;
            return !1
        }

        function e(a, d) {
            return c(a), b(a, d)
        }
        var f, g = function() {
            if (a.matches) return "matches";
            if (a.matchesSelector) return "matchesSelector";
            for (var b = ["webkit", "moz", "ms", "o"], c = 0, d = b.length; d > c; c++) {
                var e = b[c],
                    f = e + "MatchesSelector";
                if (a[f]) return f
            }
        }();
        if (g) {
            var h = document.createElement("div"),
                i = b(h, "div");
            f = i ? b : e
        } else f = d;
        "function" == typeof define && define.amd ? define("matches-selector/matches-selector", [], function() {
            return f
        }) : "object" == typeof exports ? module.exports = f : window.matchesSelector = f
    }(Element.prototype),
    function(a, b) {
        "use strict";
        "function" == typeof define && define.amd ? define("fizzy-ui-utils/utils", ["doc-ready/doc-ready", "matches-selector/matches-selector"], function(c, d) {
            return b(a, c, d)
        }) : "object" == typeof exports ? module.exports = b(a, require("doc-ready"), require("desandro-matches-selector")) : a.fizzyUIUtils = b(a, a.docReady, a.matchesSelector)
    }(window, function(a, b, c) {
        var d = {};
        d.extend = function(a, b) {
            for (var c in b) a[c] = b[c];
            return a
        }, d.modulo = function(a, b) {
            return (a % b + b) % b
        };
        var e = Object.prototype.toString;
        d.isArray = function(a) {
            return "[object Array]" == e.call(a)
        }, d.makeArray = function(a) {
            var b = [];
            if (d.isArray(a)) b = a;
            else if (a && "number" == typeof a.length)
                for (var c = 0, e = a.length; e > c; c++) b.push(a[c]);
            else b.push(a);
            return b
        }, d.indexOf = Array.prototype.indexOf ? function(a, b) {
            return a.indexOf(b)
        } : function(a, b) {
            for (var c = 0, d = a.length; d > c; c++)
                if (a[c] === b) return c;
            return -1
        }, d.removeFrom = function(a, b) {
            var c = d.indexOf(a, b); - 1 != c && a.splice(c, 1)
        }, d.isElement = "function" == typeof HTMLElement || "object" == typeof HTMLElement ? function(a) {
            return a instanceof HTMLElement
        } : function(a) {
            return a && "object" == typeof a && 1 == a.nodeType && "string" == typeof a.nodeName
        }, d.setText = function() {
            function a(a, c) {
                b = b || (void 0 !== document.documentElement.textContent ? "textContent" : "innerText"), a[b] = c
            }
            var b;
            return a
        }(), d.getParent = function(a, b) {
            for (; a != document.body;)
                if (a = a.parentNode, c(a, b)) return a
        }, d.getQueryElement = function(a) {
            return "string" == typeof a ? document.querySelector(a) : a
        }, d.handleEvent = function(a) {
            var b = "on" + a.type;
            this[b] && this[b](a)
        }, d.filterFindElements = function(a, b) {
            a = d.makeArray(a);
            for (var e = [], f = 0, g = a.length; g > f; f++) {
                var h = a[f];
                if (d.isElement(h))
                    if (b) {
                        c(h, b) && e.push(h);
                        for (var i = h.querySelectorAll(b), j = 0, k = i.length; k > j; j++) e.push(i[j])
                    } else e.push(h)
            }
            return e
        }, d.debounceMethod = function(a, b, c) {
            var d = a.prototype[b],
                e = b + "Timeout";
            a.prototype[b] = function() {
                var a = this[e];
                a && clearTimeout(a);
                var b = arguments,
                    f = this;
                this[e] = setTimeout(function() {
                    d.apply(f, b), delete f[e]
                }, c || 100)
            }
        }, d.toDashed = function(a) {
            return a.replace(/(.)([A-Z])/g, function(a, b, c) {
                return b + "-" + c
            }).toLowerCase()
        };
        var f = a.console;
        return d.htmlInit = function(c, e) {
            b(function() {
                for (var b = d.toDashed(e), g = document.querySelectorAll(".js-" + b), h = "data-" + b + "-options", i = 0, j = g.length; j > i; i++) {
                    var k, l = g[i],
                        m = l.getAttribute(h);
                    try {
                        k = m && JSON.parse(m)
                    } catch (n) {
                        f && f.error("Error parsing " + h + " on " + l.nodeName.toLowerCase() + (l.id ? "#" + l.id : "") + ": " + n);
                        continue
                    }
                    var o = new c(l, k),
                        p = a.jQuery;
                    p && p.data(l, e, o)
                }
            })
        }, d
    }),
    function(a, b) {
        "use strict";
        "function" == typeof define && define.amd ? define("outlayer/item", ["eventEmitter/EventEmitter", "get-size/get-size", "get-style-property/get-style-property", "fizzy-ui-utils/utils"], function(c, d, e, f) {
            return b(a, c, d, e, f)
        }) : "object" == typeof exports ? module.exports = b(a, require("wolfy87-eventemitter"), require("get-size"), require("desandro-get-style-property"), require("fizzy-ui-utils")) : (a.Outlayer = {}, a.Outlayer.Item = b(a, a.EventEmitter, a.getSize, a.getStyleProperty, a.fizzyUIUtils))
    }(window, function(a, b, c, d, e) {
        "use strict";

        function f(a) {
            for (var b in a) return !1;
            return b = null, !0
        }

        function g(a, b) {
            a && (this.element = a, this.layout = b, this.position = {
                x: 0,
                y: 0
            }, this._create())
        }

        function h(a) {
            return a.replace(/([A-Z])/g, function(a) {
                return "-" + a.toLowerCase()
            })
        }
        var i = a.getComputedStyle,
            j = i ? function(a) {
                return i(a, null)
            } : function(a) {
                return a.currentStyle
            },
            k = d("transition"),
            l = d("transform"),
            m = k && l,
            n = !!d("perspective"),
            o = {
                WebkitTransition: "webkitTransitionEnd",
                MozTransition: "transitionend",
                OTransition: "otransitionend",
                transition: "transitionend"
            }[k],
            p = ["transform", "transition", "transitionDuration", "transitionProperty"],
            q = function() {
                for (var a = {}, b = 0, c = p.length; c > b; b++) {
                    var e = p[b],
                        f = d(e);
                    f && f !== e && (a[e] = f)
                }
                return a
            }();
        e.extend(g.prototype, b.prototype), g.prototype._create = function() {
            this._transn = {
                ingProperties: {},
                clean: {},
                onEnd: {}
            }, this.css({
                position: "absolute"
            })
        }, g.prototype.handleEvent = function(a) {
            var b = "on" + a.type;
            this[b] && this[b](a)
        }, g.prototype.getSize = function() {
            this.size = c(this.element)
        }, g.prototype.css = function(a) {
            var b = this.element.style;
            for (var c in a) {
                var d = q[c] || c;
                b[d] = a[c]
            }
        }, g.prototype.getPosition = function() {
            var a = j(this.element),
                b = this.layout.options,
                c = b.isOriginLeft,
                d = b.isOriginTop,
                e = a[c ? "left" : "right"],
                f = a[d ? "top" : "bottom"],
                g = this.layout.size,
                h = -1 != e.indexOf("%") ? parseFloat(e) / 100 * g.width : parseInt(e, 10),
                i = -1 != f.indexOf("%") ? parseFloat(f) / 100 * g.height : parseInt(f, 10);
            h = isNaN(h) ? 0 : h, i = isNaN(i) ? 0 : i, h -= c ? g.paddingLeft : g.paddingRight, i -= d ? g.paddingTop : g.paddingBottom, this.position.x = h, this.position.y = i
        }, g.prototype.layoutPosition = function() {
            var a = this.layout.size,
                b = this.layout.options,
                c = {},
                d = b.isOriginLeft ? "paddingLeft" : "paddingRight",
                e = b.isOriginLeft ? "left" : "right",
                f = b.isOriginLeft ? "right" : "left",
                g = this.position.x + a[d];
            c[e] = this.getXValue(g), c[f] = "";
            var h = b.isOriginTop ? "paddingTop" : "paddingBottom",
                i = b.isOriginTop ? "top" : "bottom",
                j = b.isOriginTop ? "bottom" : "top",
                k = this.position.y + a[h];
            c[i] = this.getYValue(k), c[j] = "", this.css(c), this.emitEvent("layout", [this])
        }, g.prototype.getXValue = function(a) {
            var b = this.layout.options;
            return b.percentPosition && !b.isHorizontal ? a / this.layout.size.width * 100 + "%" : a + "px"
        }, g.prototype.getYValue = function(a) {
            var b = this.layout.options;
            return b.percentPosition && b.isHorizontal ? a / this.layout.size.height * 100 + "%" : a + "px"
        }, g.prototype._transitionTo = function(a, b) {
            this.getPosition();
            var c = this.position.x,
                d = this.position.y,
                e = parseInt(a, 10),
                f = parseInt(b, 10),
                g = e === this.position.x && f === this.position.y;
            if (this.setPosition(a, b), g && !this.isTransitioning) return void this.layoutPosition();
            var h = a - c,
                i = b - d,
                j = {};
            j.transform = this.getTranslate(h, i), this.transition({
                to: j,
                onTransitionEnd: {
                    transform: this.layoutPosition
                },
                isCleaning: !0
            })
        }, g.prototype.getTranslate = function(a, b) {
            var c = this.layout.options;
            return a = c.isOriginLeft ? a : -a, b = c.isOriginTop ? b : -b, n ? "translate3d(" + a + "px, " + b + "px, 0)" : "translate(" + a + "px, " + b + "px)"
        }, g.prototype.goTo = function(a, b) {
            this.setPosition(a, b), this.layoutPosition()
        }, g.prototype.moveTo = m ? g.prototype._transitionTo : g.prototype.goTo, g.prototype.setPosition = function(a, b) {
            this.position.x = parseInt(a, 10), this.position.y = parseInt(b, 10)
        }, g.prototype._nonTransition = function(a) {
            this.css(a.to), a.isCleaning && this._removeStyles(a.to);
            for (var b in a.onTransitionEnd) a.onTransitionEnd[b].call(this)
        }, g.prototype._transition = function(a) {
            if (!parseFloat(this.layout.options.transitionDuration)) return void this._nonTransition(a);
            var b = this._transn;
            for (var c in a.onTransitionEnd) b.onEnd[c] = a.onTransitionEnd[c];
            for (c in a.to) b.ingProperties[c] = !0, a.isCleaning && (b.clean[c] = !0);
            if (a.from) {
                this.css(a.from);
                var d = this.element.offsetHeight;
                d = null
            }
            this.enableTransition(a.to), this.css(a.to), this.isTransitioning = !0
        };
        var r = "opacity," + h(q.transform || "transform");
        g.prototype.enableTransition = function() {
            this.isTransitioning || (this.css({
                transitionProperty: r,
                transitionDuration: this.layout.options.transitionDuration
            }), this.element.addEventListener(o, this, !1))
        }, g.prototype.transition = g.prototype[k ? "_transition" : "_nonTransition"], g.prototype.onwebkitTransitionEnd = function(a) {
            this.ontransitionend(a)
        }, g.prototype.onotransitionend = function(a) {
            this.ontransitionend(a)
        };
        var s = {
            "-webkit-transform": "transform",
            "-moz-transform": "transform",
            "-o-transform": "transform"
        };
        g.prototype.ontransitionend = function(a) {
            if (a.target === this.element) {
                var b = this._transn,
                    c = s[a.propertyName] || a.propertyName;
                if (delete b.ingProperties[c], f(b.ingProperties) && this.disableTransition(), c in b.clean && (this.element.style[a.propertyName] = "", delete b.clean[c]), c in b.onEnd) {
                    var d = b.onEnd[c];
                    d.call(this), delete b.onEnd[c]
                }
                this.emitEvent("transitionEnd", [this])
            }
        }, g.prototype.disableTransition = function() {
            this.removeTransitionStyles(), this.element.removeEventListener(o, this, !1), this.isTransitioning = !1
        }, g.prototype._removeStyles = function(a) {
            var b = {};
            for (var c in a) b[c] = "";
            this.css(b)
        };
        var t = {
            transitionProperty: "",
            transitionDuration: ""
        };
        return g.prototype.removeTransitionStyles = function() {
            this.css(t)
        }, g.prototype.removeElem = function() {
            this.element.parentNode.removeChild(this.element), this.css({
                display: ""
            }), this.emitEvent("remove", [this])
        }, g.prototype.remove = function() {
            if (!k || !parseFloat(this.layout.options.transitionDuration)) return void this.removeElem();
            var a = this;
            this.once("transitionEnd", function() {
                a.removeElem()
            }), this.hide()
        }, g.prototype.reveal = function() {
            delete this.isHidden, this.css({
                display: ""
            });
            var a = this.layout.options,
                b = {},
                c = this.getHideRevealTransitionEndProperty("visibleStyle");
            b[c] = this.onRevealTransitionEnd, this.transition({
                from: a.hiddenStyle,
                to: a.visibleStyle,
                isCleaning: !0,
                onTransitionEnd: b
            })
        }, g.prototype.onRevealTransitionEnd = function() {
            this.isHidden || this.emitEvent("reveal")
        }, g.prototype.getHideRevealTransitionEndProperty = function(a) {
            var b = this.layout.options[a];
            if (b.opacity) return "opacity";
            for (var c in b) return c
        }, g.prototype.hide = function() {
            this.isHidden = !0, this.css({
                display: ""
            });
            var a = this.layout.options,
                b = {},
                c = this.getHideRevealTransitionEndProperty("hiddenStyle");
            b[c] = this.onHideTransitionEnd, this.transition({
                from: a.visibleStyle,
                to: a.hiddenStyle,
                isCleaning: !0,
                onTransitionEnd: b
            })
        }, g.prototype.onHideTransitionEnd = function() {
            this.isHidden && (this.css({
                display: "none"
            }), this.emitEvent("hide"))
        }, g.prototype.destroy = function() {
            this.css({
                position: "",
                left: "",
                right: "",
                top: "",
                bottom: "",
                transition: "",
                transform: ""
            })
        }, g
    }),
    function(a, b) {
        "use strict";
        "function" == typeof define && define.amd ? define("outlayer/outlayer", ["eventie/eventie", "eventEmitter/EventEmitter", "get-size/get-size", "fizzy-ui-utils/utils", "./item"], function(c, d, e, f, g) {
            return b(a, c, d, e, f, g)
        }) : "object" == typeof exports ? module.exports = b(a, require("eventie"), require("wolfy87-eventemitter"), require("get-size"), require("fizzy-ui-utils"), require("./item")) : a.Outlayer = b(a, a.eventie, a.EventEmitter, a.getSize, a.fizzyUIUtils, a.Outlayer.Item)
    }(window, function(a, b, c, d, e, f) {
        "use strict";

        function g(a, b) {
            var c = e.getQueryElement(a);
            if (!c) return void(h && h.error("Bad element for " + this.constructor.namespace + ": " + (c || a)));
            this.element = c, i && (this.$element = i(this.element)), this.options = e.extend({}, this.constructor.defaults), this.option(b);
            var d = ++k;
            this.element.outlayerGUID = d, l[d] = this, this._create(), this.options.isInitLayout && this.layout()
        }
        var h = a.console,
            i = a.jQuery,
            j = function() {},
            k = 0,
            l = {};
        return g.namespace = "outlayer", g.Item = f, g.defaults = {
            containerStyle: {
                position: "relative"
            },
            isInitLayout: !0,
            isOriginLeft: !0,
            isOriginTop: !0,
            isResizeBound: !0,
            isResizingContainer: !0,
            transitionDuration: "0.4s",
            hiddenStyle: {
                opacity: 0,
                transform: "scale(0.001)"
            },
            visibleStyle: {
                opacity: 1,
                transform: "scale(1)"
            }
        }, e.extend(g.prototype, c.prototype), g.prototype.option = function(a) {
            e.extend(this.options, a)
        }, g.prototype._create = function() {
            this.reloadItems(), this.stamps = [], this.stamp(this.options.stamp), e.extend(this.element.style, this.options.containerStyle), this.options.isResizeBound && this.bindResize()
        }, g.prototype.reloadItems = function() {
            this.items = this._itemize(this.element.children)
        }, g.prototype._itemize = function(a) {
            for (var b = this._filterFindItemElements(a), c = this.constructor.Item, d = [], e = 0, f = b.length; f > e; e++) {
                var g = b[e],
                    h = new c(g, this);
                d.push(h)
            }
            return d
        }, g.prototype._filterFindItemElements = function(a) {
            return e.filterFindElements(a, this.options.itemSelector)
        }, g.prototype.getItemElements = function() {
            for (var a = [], b = 0, c = this.items.length; c > b; b++) a.push(this.items[b].element);
            return a
        }, g.prototype.layout = function() {
            this._resetLayout(), this._manageStamps();
            var a = void 0 !== this.options.isLayoutInstant ? this.options.isLayoutInstant : !this._isLayoutInited;
            this.layoutItems(this.items, a), this._isLayoutInited = !0
        }, g.prototype._init = g.prototype.layout, g.prototype._resetLayout = function() {
            this.getSize()
        }, g.prototype.getSize = function() {
            this.size = d(this.element)
        }, g.prototype._getMeasurement = function(a, b) {
            var c, f = this.options[a];
            f ? ("string" == typeof f ? c = this.element.querySelector(f) : e.isElement(f) && (c = f), this[a] = c ? d(c)[b] : f) : this[a] = 0
        }, g.prototype.layoutItems = function(a, b) {
            a = this._getItemsForLayout(a), this._layoutItems(a, b), this._postLayout()
        }, g.prototype._getItemsForLayout = function(a) {
            for (var b = [], c = 0, d = a.length; d > c; c++) {
                var e = a[c];
                e.isIgnored || b.push(e)
            }
            return b
        }, g.prototype._layoutItems = function(a, b) {
            if (this._emitCompleteOnItems("layout", a), a && a.length) {
                for (var c = [], d = 0, e = a.length; e > d; d++) {
                    var f = a[d],
                        g = this._getItemLayoutPosition(f);
                    g.item = f, g.isInstant = b || f.isLayoutInstant, c.push(g)
                }
                this._processLayoutQueue(c)
            }
        }, g.prototype._getItemLayoutPosition = function() {
            return {
                x: 0,
                y: 0
            }
        }, g.prototype._processLayoutQueue = function(a) {
            for (var b = 0, c = a.length; c > b; b++) {
                var d = a[b];
                this._positionItem(d.item, d.x, d.y, d.isInstant)
            }
        }, g.prototype._positionItem = function(a, b, c, d) {
            d ? a.goTo(b, c) : a.moveTo(b, c)
        }, g.prototype._postLayout = function() {
            this.resizeContainer()
        }, g.prototype.resizeContainer = function() {
            if (this.options.isResizingContainer) {
                var a = this._getContainerSize();
                a && (this._setContainerMeasure(a.width, !0), this._setContainerMeasure(a.height, !1))
            }
        }, g.prototype._getContainerSize = j, g.prototype._setContainerMeasure = function(a, b) {
            if (void 0 !== a) {
                var c = this.size;
                c.isBorderBox && (a += b ? c.paddingLeft + c.paddingRight + c.borderLeftWidth + c.borderRightWidth : c.paddingBottom + c.paddingTop + c.borderTopWidth + c.borderBottomWidth), a = Math.max(a, 0), this.element.style[b ? "width" : "height"] = a + "px"
            }
        }, g.prototype._emitCompleteOnItems = function(a, b) {
            function c() {
                e.dispatchEvent(a + "Complete", null, [b])
            }

            function d() {
                g++, g === f && c()
            }
            var e = this,
                f = b.length;
            if (!b || !f) return void c();
            for (var g = 0, h = 0, i = b.length; i > h; h++) {
                var j = b[h];
                j.once(a, d)
            }
        }, g.prototype.dispatchEvent = function(a, b, c) {
            var d = b ? [b].concat(c) : c;
            if (this.emitEvent(a, d), i)
                if (this.$element = this.$element || i(this.element), b) {
                    var e = i.Event(b);
                    e.type = a, this.$element.trigger(e, c)
                } else this.$element.trigger(a, c)
        }, g.prototype.ignore = function(a) {
            var b = this.getItem(a);
            b && (b.isIgnored = !0)
        }, g.prototype.unignore = function(a) {
            var b = this.getItem(a);
            b && delete b.isIgnored
        }, g.prototype.stamp = function(a) {
            if (a = this._find(a)) {
                this.stamps = this.stamps.concat(a);
                for (var b = 0, c = a.length; c > b; b++) {
                    var d = a[b];
                    this.ignore(d)
                }
            }
        }, g.prototype.unstamp = function(a) {
            if (a = this._find(a))
                for (var b = 0, c = a.length; c > b; b++) {
                    var d = a[b];
                    e.removeFrom(this.stamps, d), this.unignore(d)
                }
        }, g.prototype._find = function(a) {
            return a ? ("string" == typeof a && (a = this.element.querySelectorAll(a)), a = e.makeArray(a)) : void 0
        }, g.prototype._manageStamps = function() {
            if (this.stamps && this.stamps.length) {
                this._getBoundingRect();
                for (var a = 0, b = this.stamps.length; b > a; a++) {
                    var c = this.stamps[a];
                    this._manageStamp(c)
                }
            }
        }, g.prototype._getBoundingRect = function() {
            var a = this.element.getBoundingClientRect(),
                b = this.size;
            this._boundingRect = {
                left: a.left + b.paddingLeft + b.borderLeftWidth,
                top: a.top + b.paddingTop + b.borderTopWidth,
                right: a.right - (b.paddingRight + b.borderRightWidth),
                bottom: a.bottom - (b.paddingBottom + b.borderBottomWidth)
            }
        }, g.prototype._manageStamp = j, g.prototype._getElementOffset = function(a) {
            var b = a.getBoundingClientRect(),
                c = this._boundingRect,
                e = d(a),
                f = {
                    left: b.left - c.left - e.marginLeft,
                    top: b.top - c.top - e.marginTop,
                    right: c.right - b.right - e.marginRight,
                    bottom: c.bottom - b.bottom - e.marginBottom
                };
            return f
        }, g.prototype.handleEvent = function(a) {
            var b = "on" + a.type;
            this[b] && this[b](a)
        }, g.prototype.bindResize = function() {
            this.isResizeBound || (b.bind(a, "resize", this), this.isResizeBound = !0)
        }, g.prototype.unbindResize = function() {
            this.isResizeBound && b.unbind(a, "resize", this), this.isResizeBound = !1
        }, g.prototype.onresize = function() {
            function a() {
                b.resize(), delete b.resizeTimeout
            }
            this.resizeTimeout && clearTimeout(this.resizeTimeout);
            var b = this;
            this.resizeTimeout = setTimeout(a, 100)
        }, g.prototype.resize = function() {
            this.isResizeBound && this.needsResizeLayout() && this.layout()
        }, g.prototype.needsResizeLayout = function() {
            var a = d(this.element),
                b = this.size && a;
            return b && a.innerWidth !== this.size.innerWidth
        }, g.prototype.addItems = function(a) {
            var b = this._itemize(a);
            return b.length && (this.items = this.items.concat(b)), b
        }, g.prototype.appended = function(a) {
            var b = this.addItems(a);
            b.length && (this.layoutItems(b, !0), this.reveal(b))
        }, g.prototype.prepended = function(a) {
            var b = this._itemize(a);
            if (b.length) {
                var c = this.items.slice(0);
                this.items = b.concat(c), this._resetLayout(), this._manageStamps(), this.layoutItems(b, !0), this.reveal(b), this.layoutItems(c)
            }
        }, g.prototype.reveal = function(a) {
            this._emitCompleteOnItems("reveal", a);
            for (var b = a && a.length, c = 0; b && b > c; c++) {
                var d = a[c];
                d.reveal()
            }
        }, g.prototype.hide = function(a) {
            this._emitCompleteOnItems("hide", a);
            for (var b = a && a.length, c = 0; b && b > c; c++) {
                var d = a[c];
                d.hide()
            }
        }, g.prototype.revealItemElements = function(a) {
            var b = this.getItems(a);
            this.reveal(b)
        }, g.prototype.hideItemElements = function(a) {
            var b = this.getItems(a);
            this.hide(b)
        }, g.prototype.getItem = function(a) {
            for (var b = 0, c = this.items.length; c > b; b++) {
                var d = this.items[b];
                if (d.element === a) return d
            }
        }, g.prototype.getItems = function(a) {
            a = e.makeArray(a);
            for (var b = [], c = 0, d = a.length; d > c; c++) {
                var f = a[c],
                    g = this.getItem(f);
                g && b.push(g)
            }
            return b
        }, g.prototype.remove = function(a) {
            var b = this.getItems(a);
            if (this._emitCompleteOnItems("remove", b), b && b.length)
                for (var c = 0, d = b.length; d > c; c++) {
                    var f = b[c];
                    f.remove(), e.removeFrom(this.items, f)
                }
        }, g.prototype.destroy = function() {
            var a = this.element.style;
            a.height = "", a.position = "", a.width = "";
            for (var b = 0, c = this.items.length; c > b; b++) {
                var d = this.items[b];
                d.destroy()
            }
            this.unbindResize();
            var e = this.element.outlayerGUID;
            delete l[e], delete this.element.outlayerGUID, i && i.removeData(this.element, this.constructor.namespace)
        }, g.data = function(a) {
            a = e.getQueryElement(a);
            var b = a && a.outlayerGUID;
            return b && l[b]
        }, g.create = function(a, b) {
            function c() {
                g.apply(this, arguments)
            }
            return Object.create ? c.prototype = Object.create(g.prototype) : e.extend(c.prototype, g.prototype), c.prototype.constructor = c, c.defaults = e.extend({}, g.defaults), e.extend(c.defaults, b), c.prototype.settings = {}, c.namespace = a, c.data = g.data, c.Item = function() {
                f.apply(this, arguments)
            }, c.Item.prototype = new f, e.htmlInit(c, a), i && i.bridget && i.bridget(a, c), c
        }, g.Item = f, g
    }),
    function(a, b) {
        "use strict";
        "function" == typeof define && define.amd ? define("isotope/js/item", ["outlayer/outlayer"], b) : "object" == typeof exports ? module.exports = b(require("outlayer")) : (a.Isotope = a.Isotope || {}, a.Isotope.Item = b(a.Outlayer))
    }(window, function(a) {
        "use strict";

        function b() {
            a.Item.apply(this, arguments)
        }
        b.prototype = new a.Item, b.prototype._create = function() {
            this.id = this.layout.itemGUID++, a.Item.prototype._create.call(this), this.sortData = {}
        }, b.prototype.updateSortData = function() {
            if (!this.isIgnored) {
                this.sortData.id = this.id, this.sortData["original-order"] = this.id, this.sortData.random = Math.random();
                var a = this.layout.options.getSortData,
                    b = this.layout._sorters;
                for (var c in a) {
                    var d = b[c];
                    this.sortData[c] = d(this.element, this)
                }
            }
        };
        var c = b.prototype.destroy;
        return b.prototype.destroy = function() {
            c.apply(this, arguments), this.css({
                display: ""
            })
        }, b
    }),
    function(a, b) {
        "use strict";
        "function" == typeof define && define.amd ? define("isotope/js/layout-mode", ["get-size/get-size", "outlayer/outlayer"], b) : "object" == typeof exports ? module.exports = b(require("get-size"), require("outlayer")) : (a.Isotope = a.Isotope || {}, a.Isotope.LayoutMode = b(a.getSize, a.Outlayer))
    }(window, function(a, b) {
        "use strict";

        function c(a) {
            this.isotope = a, a && (this.options = a.options[this.namespace], this.element = a.element, this.items = a.filteredItems, this.size = a.size)
        }
        return function() {
            function a(a) {
                return function() {
                    return b.prototype[a].apply(this.isotope, arguments)
                }
            }
            for (var d = ["_resetLayout", "_getItemLayoutPosition", "_manageStamp", "_getContainerSize", "_getElementOffset", "needsResizeLayout"], e = 0, f = d.length; f > e; e++) {
                var g = d[e];
                c.prototype[g] = a(g)
            }
        }(), c.prototype.needsVerticalResizeLayout = function() {
            var b = a(this.isotope.element),
                c = this.isotope.size && b;
            return c && b.innerHeight != this.isotope.size.innerHeight
        }, c.prototype._getMeasurement = function() {
            this.isotope._getMeasurement.apply(this, arguments)
        }, c.prototype.getColumnWidth = function() {
            this.getSegmentSize("column", "Width")
        }, c.prototype.getRowHeight = function() {
            this.getSegmentSize("row", "Height")
        }, c.prototype.getSegmentSize = function(a, b) {
            var c = a + b,
                d = "outer" + b;
            if (this._getMeasurement(c, d), !this[c]) {
                var e = this.getFirstItemSize();
                this[c] = e && e[d] || this.isotope.size["inner" + b]
            }
        }, c.prototype.getFirstItemSize = function() {
            var b = this.isotope.filteredItems[0];
            return b && b.element && a(b.element)
        }, c.prototype.layout = function() {
            this.isotope.layout.apply(this.isotope, arguments)
        }, c.prototype.getSize = function() {
            this.isotope.getSize(), this.size = this.isotope.size
        }, c.modes = {}, c.create = function(a, b) {
            function d() {
                c.apply(this, arguments)
            }
            return d.prototype = new c, b && (d.options = b), d.prototype.namespace = a, c.modes[a] = d, d
        }, c
    }),
    function(a, b) {
        "use strict";
        "function" == typeof define && define.amd ? define("masonry/masonry", ["outlayer/outlayer", "get-size/get-size", "fizzy-ui-utils/utils"], b) : "object" == typeof exports ? module.exports = b(require("outlayer"), require("get-size"), require("fizzy-ui-utils")) : a.Masonry = b(a.Outlayer, a.getSize, a.fizzyUIUtils)
    }(window, function(a, b, c) {
        var d = a.create("masonry");
        return d.prototype._resetLayout = function() {
            this.getSize(), this._getMeasurement("columnWidth", "outerWidth"), this._getMeasurement("gutter", "outerWidth"), this.measureColumns();
            var a = this.cols;
            for (this.colYs = []; a--;) this.colYs.push(0);
            this.maxY = 0
        }, d.prototype.measureColumns = function() {
            if (this.getContainerWidth(), !this.columnWidth) {
                var a = this.items[0],
                    c = a && a.element;
                this.columnWidth = c && b(c).outerWidth || this.containerWidth
            }
            var d = this.columnWidth += this.gutter,
                e = this.containerWidth + this.gutter,
                f = e / d,
                g = d - e % d,
                h = g && 1 > g ? "round" : "floor";
            f = Math[h](f), this.cols = Math.max(f, 1)
        }, d.prototype.getContainerWidth = function() {
            var a = this.options.isFitWidth ? this.element.parentNode : this.element,
                c = b(a);
            this.containerWidth = c && c.innerWidth
        }, d.prototype._getItemLayoutPosition = function(a) {
            a.getSize();
            var b = a.size.outerWidth % this.columnWidth,
                d = b && 1 > b ? "round" : "ceil",
                e = Math[d](a.size.outerWidth / this.columnWidth);
            e = Math.min(e, this.cols);
            for (var f = this._getColGroup(e), g = Math.min.apply(Math, f), h = c.indexOf(f, g), i = {
                    x: this.columnWidth * h,
                    y: g
                }, j = g + a.size.outerHeight, k = this.cols + 1 - f.length, l = 0; k > l; l++) this.colYs[h + l] = j;
            return i
        }, d.prototype._getColGroup = function(a) {
            if (2 > a) return this.colYs;
            for (var b = [], c = this.cols + 1 - a, d = 0; c > d; d++) {
                var e = this.colYs.slice(d, d + a);
                b[d] = Math.max.apply(Math, e)
            }
            return b
        }, d.prototype._manageStamp = function(a) {
            var c = b(a),
                d = this._getElementOffset(a),
                e = this.options.isOriginLeft ? d.left : d.right,
                f = e + c.outerWidth,
                g = Math.floor(e / this.columnWidth);
            g = Math.max(0, g);
            var h = Math.floor(f / this.columnWidth);
            h -= f % this.columnWidth ? 0 : 1, h = Math.min(this.cols - 1, h);
            for (var i = (this.options.isOriginTop ? d.top : d.bottom) + c.outerHeight, j = g; h >= j; j++) this.colYs[j] = Math.max(i, this.colYs[j])
        }, d.prototype._getContainerSize = function() {
            this.maxY = Math.max.apply(Math, this.colYs);
            var a = {
                height: this.maxY
            };
            return this.options.isFitWidth && (a.width = this._getContainerFitWidth()), a
        }, d.prototype._getContainerFitWidth = function() {
            for (var a = 0, b = this.cols; --b && 0 === this.colYs[b];) a++;
            return (this.cols - a) * this.columnWidth - this.gutter
        }, d.prototype.needsResizeLayout = function() {
            var a = this.containerWidth;
            return this.getContainerWidth(), a !== this.containerWidth
        }, d
    }),
    function(a, b) {
        "use strict";
        "function" == typeof define && define.amd ? define("isotope/js/layout-modes/masonry", ["../layout-mode", "masonry/masonry"], b) : "object" == typeof exports ? module.exports = b(require("../layout-mode"), require("masonry-layout")) : b(a.Isotope.LayoutMode, a.Masonry)
    }(window, function(a, b) {
        "use strict";

        function c(a, b) {
            for (var c in b) a[c] = b[c];
            return a
        }
        var d = a.create("masonry"),
            e = d.prototype._getElementOffset,
            f = d.prototype.layout,
            g = d.prototype._getMeasurement;
        c(d.prototype, b.prototype), d.prototype._getElementOffset = e, d.prototype.layout = f, d.prototype._getMeasurement = g;
        var h = d.prototype.measureColumns;
        d.prototype.measureColumns = function() {
            this.items = this.isotope.filteredItems, h.call(this)
        };
        var i = d.prototype._manageStamp;
        return d.prototype._manageStamp = function() {
            this.options.isOriginLeft = this.isotope.options.isOriginLeft, this.options.isOriginTop = this.isotope.options.isOriginTop, i.apply(this, arguments)
        }, d
    }),
    function(a, b) {
        "use strict";
        "function" == typeof define && define.amd ? define("isotope/js/layout-modes/fit-rows", ["../layout-mode"], b) : "object" == typeof exports ? module.exports = b(require("../layout-mode")) : b(a.Isotope.LayoutMode)
    }(window, function(a) {
        "use strict";
        var b = a.create("fitRows");
        return b.prototype._resetLayout = function() {
            this.x = 0, this.y = 0, this.maxY = 0, this._getMeasurement("gutter", "outerWidth")
        }, b.prototype._getItemLayoutPosition = function(a) {
            a.getSize();
            var b = a.size.outerWidth + this.gutter,
                c = this.isotope.size.innerWidth + this.gutter;
            0 !== this.x && b + this.x > c && (this.x = 0, this.y = this.maxY);
            var d = {
                x: this.x,
                y: this.y
            };
            return this.maxY = Math.max(this.maxY, this.y + a.size.outerHeight), this.x += b, d
        }, b.prototype._getContainerSize = function() {
            return {
                height: this.maxY
            }
        }, b
    }),
    function(a, b) {
        "use strict";
        "function" == typeof define && define.amd ? define("isotope/js/layout-modes/vertical", ["../layout-mode"], b) : "object" == typeof exports ? module.exports = b(require("../layout-mode")) : b(a.Isotope.LayoutMode)
    }(window, function(a) {
        "use strict";
        var b = a.create("vertical", {
            horizontalAlignment: 0
        });
        return b.prototype._resetLayout = function() {
            this.y = 0
        }, b.prototype._getItemLayoutPosition = function(a) {
            a.getSize();
            var b = (this.isotope.size.innerWidth - a.size.outerWidth) * this.options.horizontalAlignment,
                c = this.y;
            return this.y += a.size.outerHeight, {
                x: b,
                y: c
            }
        }, b.prototype._getContainerSize = function() {
            return {
                height: this.y
            }
        }, b
    }),
    function(a, b) {
        "use strict";
        "function" == typeof define && define.amd ? define(["outlayer/outlayer", "get-size/get-size", "matches-selector/matches-selector", "fizzy-ui-utils/utils", "isotope/js/item", "isotope/js/layout-mode", "isotope/js/layout-modes/masonry", "isotope/js/layout-modes/fit-rows", "isotope/js/layout-modes/vertical"], function(c, d, e, f, g, h) {
            return b(a, c, d, e, f, g, h)
        }) : "object" == typeof exports ? module.exports = b(a, require("outlayer"), require("get-size"), require("desandro-matches-selector"), require("fizzy-ui-utils"), require("./item"), require("./layout-mode"), require("./layout-modes/masonry"), require("./layout-modes/fit-rows"), require("./layout-modes/vertical")) : a.Isotope = b(a, a.Outlayer, a.getSize, a.matchesSelector, a.fizzyUIUtils, a.Isotope.Item, a.Isotope.LayoutMode)
    }(window, function(a, b, c, d, e, f, g) {
        function h(a, b) {
            return function(c, d) {
                for (var e = 0, f = a.length; f > e; e++) {
                    var g = a[e],
                        h = c.sortData[g],
                        i = d.sortData[g];
                    if (h > i || i > h) {
                        var j = void 0 !== b[g] ? b[g] : b,
                            k = j ? 1 : -1;
                        return (h > i ? 1 : -1) * k
                    }
                }
                return 0
            }
        }
        var i = a.jQuery,
            j = String.prototype.trim ? function(a) {
                return a.trim()
            } : function(a) {
                return a.replace(/^\s+|\s+$/g, "")
            },
            k = document.documentElement,
            l = k.textContent ? function(a) {
                return a.textContent
            } : function(a) {
                return a.innerText
            },
            m = b.create("isotope", {
                layoutMode: "masonry",
                isJQueryFiltering: !0,
                sortAscending: !0
            });
        m.Item = f, m.LayoutMode = g, m.prototype._create = function() {
            this.itemGUID = 0, this._sorters = {}, this._getSorters(), b.prototype._create.call(this), this.modes = {}, this.filteredItems = this.items, this.sortHistory = ["original-order"];
            for (var a in g.modes) this._initLayoutMode(a)
        }, m.prototype.reloadItems = function() {
            this.itemGUID = 0, b.prototype.reloadItems.call(this)
        }, m.prototype._itemize = function() {
            for (var a = b.prototype._itemize.apply(this, arguments), c = 0, d = a.length; d > c; c++) {
                var e = a[c];
                e.id = this.itemGUID++
            }
            return this._updateItemsSortData(a), a
        }, m.prototype._initLayoutMode = function(a) {
            var b = g.modes[a],
                c = this.options[a] || {};
            this.options[a] = b.options ? e.extend(b.options, c) : c, this.modes[a] = new b(this)
        }, m.prototype.layout = function() {
            return !this._isLayoutInited && this.options.isInitLayout ? void this.arrange() : void this._layout()
        }, m.prototype._layout = function() {
            var a = this._getIsInstant();
            this._resetLayout(), this._manageStamps(), this.layoutItems(this.filteredItems, a), this._isLayoutInited = !0
        }, m.prototype.arrange = function(a) {
            function b() {
                d.reveal(c.needReveal), d.hide(c.needHide)
            }
            this.option(a), this._getIsInstant();
            var c = this._filter(this.items);
            this.filteredItems = c.matches;
            var d = this;
            this._bindArrangeComplete(), this._isInstant ? this._noTransition(b) : b(), this._sort(), this._layout()
        }, m.prototype._init = m.prototype.arrange, m.prototype._getIsInstant = function() {
            var a = void 0 !== this.options.isLayoutInstant ? this.options.isLayoutInstant : !this._isLayoutInited;
            return this._isInstant = a, a
        }, m.prototype._bindArrangeComplete = function() {
            function a() {
                b && c && d && e.dispatchEvent("arrangeComplete", null, [e.filteredItems])
            }
            var b, c, d, e = this;
            this.once("layoutComplete", function() {
                b = !0, a()
            }), this.once("hideComplete", function() {
                c = !0, a()
            }), this.once("revealComplete", function() {
                d = !0, a()
            })
        }, m.prototype._filter = function(a) {
            var b = this.options.filter;
            b = b || "*";
            for (var c = [], d = [], e = [], f = this._getFilterTest(b), g = 0, h = a.length; h > g; g++) {
                var i = a[g];
                if (!i.isIgnored) {
                    var j = f(i);
                    j && c.push(i), j && i.isHidden ? d.push(i) : j || i.isHidden || e.push(i)
                }
            }
            return {
                matches: c,
                needReveal: d,
                needHide: e
            }
        }, m.prototype._getFilterTest = function(a) {
            return i && this.options.isJQueryFiltering ? function(b) {
                return i(b.element).is(a)
            } : "function" == typeof a ? function(b) {
                return a(b.element)
            } : function(b) {
                return d(b.element, a)
            }
        }, m.prototype.updateSortData = function(a) {
            var b;
            a ? (a = e.makeArray(a), b = this.getItems(a)) : b = this.items, this._getSorters(), this._updateItemsSortData(b)
        }, m.prototype._getSorters = function() {
            var a = this.options.getSortData;
            for (var b in a) {
                var c = a[b];
                this._sorters[b] = n(c)
            }
        }, m.prototype._updateItemsSortData = function(a) {
            for (var b = a && a.length, c = 0; b && b > c; c++) {
                var d = a[c];
                d.updateSortData()
            }
        };
        var n = function() {
            function a(a) {
                if ("string" != typeof a) return a;
                var c = j(a).split(" "),
                    d = c[0],
                    e = d.match(/^\[(.+)\]$/),
                    f = e && e[1],
                    g = b(f, d),
                    h = m.sortDataParsers[c[1]];
                return a = h ? function(a) {
                    return a && h(g(a))
                } : function(a) {
                    return a && g(a)
                }
            }

            function b(a, b) {
                var c;
                return c = a ? function(b) {
                    return b.getAttribute(a)
                } : function(a) {
                    var c = a.querySelector(b);
                    return c && l(c)
                }
            }
            return a
        }();
        m.sortDataParsers = {
            parseInt: function(a) {
                return parseInt(a, 10)
            },
            parseFloat: function(a) {
                return parseFloat(a)
            }
        }, m.prototype._sort = function() {
            var a = this.options.sortBy;
            if (a) {
                var b = [].concat.apply(a, this.sortHistory),
                    c = h(b, this.options.sortAscending);
                this.filteredItems.sort(c), a != this.sortHistory[0] && this.sortHistory.unshift(a)
            }
        }, m.prototype._mode = function() {
            var a = this.options.layoutMode,
                b = this.modes[a];
            if (!b) throw new Error("No layout mode: " + a);
            return b.options = this.options[a], b
        }, m.prototype._resetLayout = function() {
            b.prototype._resetLayout.call(this), this._mode()._resetLayout()
        }, m.prototype._getItemLayoutPosition = function(a) {
            return this._mode()._getItemLayoutPosition(a)
        }, m.prototype._manageStamp = function(a) {
            this._mode()._manageStamp(a)
        }, m.prototype._getContainerSize = function() {
            return this._mode()._getContainerSize()
        }, m.prototype.needsResizeLayout = function() {
            return this._mode().needsResizeLayout()
        }, m.prototype.appended = function(a) {
            var b = this.addItems(a);
            if (b.length) {
                var c = this._filterRevealAdded(b);
                this.filteredItems = this.filteredItems.concat(c)
            }
        }, m.prototype.prepended = function(a) {
            var b = this._itemize(a);
            if (b.length) {
                this._resetLayout(), this._manageStamps();
                var c = this._filterRevealAdded(b);
                this.layoutItems(this.filteredItems), this.filteredItems = c.concat(this.filteredItems), this.items = b.concat(this.items)
            }
        }, m.prototype._filterRevealAdded = function(a) {
            var b = this._filter(a);
            return this.hide(b.needHide), this.reveal(b.matches), this.layoutItems(b.matches, !0), b.matches
        }, m.prototype.insert = function(a) {
            var b = this.addItems(a);
            if (b.length) {
                var c, d, e = b.length;
                for (c = 0; e > c; c++) d = b[c], this.element.appendChild(d.element);
                var f = this._filter(b).matches;
                for (c = 0; e > c; c++) b[c].isLayoutInstant = !0;
                for (this.arrange(), c = 0; e > c; c++) delete b[c].isLayoutInstant;
                this.reveal(f)
            }
        };
        var o = m.prototype.remove;
        return m.prototype.remove = function(a) {
            a = e.makeArray(a);
            var b = this.getItems(a);
            o.call(this, a);
            var c = b && b.length;
            if (c)
                for (var d = 0; c > d; d++) {
                    var f = b[d];
                    e.removeFrom(this.filteredItems, f)
                }
        }, m.prototype.shuffle = function() {
            for (var a = 0, b = this.items.length; b > a; a++) {
                var c = this.items[a];
                c.sortData.random = Math.random()
            }
            this.options.sortBy = "random", this._sort(), this._layout()
        }, m.prototype._noTransition = function(a) {
            var b = this.options.transitionDuration;
            this.options.transitionDuration = 0;
            var c = a.call(this);
            return this.options.transitionDuration = b, c
        }, m.prototype.getFilteredItemElements = function() {
            for (var a = [], b = 0, c = this.filteredItems.length; c > b; b++) a.push(this.filteredItems[b].element);
            return a
        }, m
    });
//imagesLoaded
(function() {
    function e() {}

    function t(e, t) {
        for (var n = e.length; n--;)
            if (e[n].listener === t) return n;
        return -1
    }

    function n(e) {
        return function() {
            return this[e].apply(this, arguments)
        }
    }
    var i = e.prototype,
        r = this,
        o = r.EventEmitter;
    i.getListeners = function(e) {
        var t, n, i = this._getEvents();
        if ("object" == typeof e) {
            t = {};
            for (n in i) i.hasOwnProperty(n) && e.test(n) && (t[n] = i[n])
        } else t = i[e] || (i[e] = []);
        return t
    }, i.flattenListeners = function(e) {
        var t, n = [];
        for (t = 0; e.length > t; t += 1) n.push(e[t].listener);
        return n
    }, i.getListenersAsObject = function(e) {
        var t, n = this.getListeners(e);
        return n instanceof Array && (t = {}, t[e] = n), t || n
    }, i.addListener = function(e, n) {
        var i, r = this.getListenersAsObject(e),
            o = "object" == typeof n;
        for (i in r) r.hasOwnProperty(i) && -1 === t(r[i], n) && r[i].push(o ? n : {
            listener: n,
            once: !1
        });
        return this
    }, i.on = n("addListener"), i.addOnceListener = function(e, t) {
        return this.addListener(e, {
            listener: t,
            once: !0
        })
    }, i.once = n("addOnceListener"), i.defineEvent = function(e) {
        return this.getListeners(e), this
    }, i.defineEvents = function(e) {
        for (var t = 0; e.length > t; t += 1) this.defineEvent(e[t]);
        return this
    }, i.removeListener = function(e, n) {
        var i, r, o = this.getListenersAsObject(e);
        for (r in o) o.hasOwnProperty(r) && (i = t(o[r], n), -1 !== i && o[r].splice(i, 1));
        return this
    }, i.off = n("removeListener"), i.addListeners = function(e, t) {
        return this.manipulateListeners(!1, e, t)
    }, i.removeListeners = function(e, t) {
        return this.manipulateListeners(!0, e, t)
    }, i.manipulateListeners = function(e, t, n) {
        var i, r, o = e ? this.removeListener : this.addListener,
            s = e ? this.removeListeners : this.addListeners;
        if ("object" != typeof t || t instanceof RegExp)
            for (i = n.length; i--;) o.call(this, t, n[i]);
        else
            for (i in t) t.hasOwnProperty(i) && (r = t[i]) && ("function" == typeof r ? o.call(this, i, r) : s.call(this, i, r));
        return this
    }, i.removeEvent = function(e) {
        var t, n = typeof e,
            i = this._getEvents();
        if ("string" === n) delete i[e];
        else if ("object" === n)
            for (t in i) i.hasOwnProperty(t) && e.test(t) && delete i[t];
        else delete this._events;
        return this
    }, i.removeAllListeners = n("removeEvent"), i.emitEvent = function(e, t) {
        var n, i, r, o, s = this.getListenersAsObject(e);
        for (r in s)
            if (s.hasOwnProperty(r))
                for (i = s[r].length; i--;) n = s[r][i], n.once === !0 && this.removeListener(e, n.listener), o = n.listener.apply(this, t || []), o === this._getOnceReturnValue() && this.removeListener(e, n.listener);
        return this
    }, i.trigger = n("emitEvent"), i.emit = function(e) {
        var t = Array.prototype.slice.call(arguments, 1);
        return this.emitEvent(e, t)
    }, i.setOnceReturnValue = function(e) {
        return this._onceReturnValue = e, this
    }, i._getOnceReturnValue = function() {
        return this.hasOwnProperty("_onceReturnValue") ? this._onceReturnValue : !0
    }, i._getEvents = function() {
        return this._events || (this._events = {})
    }, e.noConflict = function() {
        return r.EventEmitter = o, e
    }, "function" == typeof define && define.amd ? define("eventEmitter/EventEmitter", [], function() {
        return e
    }) : "object" == typeof module && module.exports ? module.exports = e : this.EventEmitter = e
}).call(this),
    function(e) {
        function t(t) {
            var n = e.event;
            return n.target = n.target || n.srcElement || t, n
        }
        var n = document.documentElement,
            i = function() {};
        n.addEventListener ? i = function(e, t, n) {
            e.addEventListener(t, n, !1)
        } : n.attachEvent && (i = function(e, n, i) {
            e[n + i] = i.handleEvent ? function() {
                var n = t(e);
                i.handleEvent.call(i, n)
            } : function() {
                var n = t(e);
                i.call(e, n)
            }, e.attachEvent("on" + n, e[n + i])
        });
        var r = function() {};
        n.removeEventListener ? r = function(e, t, n) {
            e.removeEventListener(t, n, !1)
        } : n.detachEvent && (r = function(e, t, n) {
            e.detachEvent("on" + t, e[t + n]);
            try {
                delete e[t + n]
            } catch (i) {
                e[t + n] = void 0
            }
        });
        var o = {
            bind: i,
            unbind: r
        };
        "function" == typeof define && define.amd ? define("eventie/eventie", o) : e.eventie = o
    }(this),
    function(e, t) {
        "function" == typeof define && define.amd ? define(["eventEmitter/EventEmitter", "eventie/eventie"], function(n, i) {
            return t(e, n, i)
        }) : "object" == typeof exports ? module.exports = t(e, require("wolfy87-eventemitter"), require("eventie")) : e.imagesLoaded = t(e, e.EventEmitter, e.eventie)
    }(window, function(e, t, n) {
        function i(e, t) {
            for (var n in t) e[n] = t[n];
            return e
        }

        function r(e) {
            return "[object Array]" === d.call(e)
        }

        function o(e) {
            var t = [];
            if (r(e)) t = e;
            else if ("number" == typeof e.length)
                for (var n = 0, i = e.length; i > n; n++) t.push(e[n]);
            else t.push(e);
            return t
        }

        function s(e, t, n) {
            if (!(this instanceof s)) return new s(e, t);
            "string" == typeof e && (e = document.querySelectorAll(e)), this.elements = o(e), this.options = i({}, this.options), "function" == typeof t ? n = t : i(this.options, t), n && this.on("always", n), this.getImages(), a && (this.jqDeferred = new a.Deferred);
            var r = this;
            setTimeout(function() {
                r.check()
            })
        }

        function f(e) {
            this.img = e
        }

        function c(e) {
            this.src = e, v[e] = this
        }
        var a = e.jQuery,
            u = e.console,
            h = u !== void 0,
            d = Object.prototype.toString;
        s.prototype = new t, s.prototype.options = {}, s.prototype.getImages = function() {
            this.images = [];
            for (var e = 0, t = this.elements.length; t > e; e++) {
                var n = this.elements[e];
                "IMG" === n.nodeName && this.addImage(n);
                var i = n.nodeType;
                if (i && (1 === i || 9 === i || 11 === i))
                    for (var r = n.querySelectorAll("img"), o = 0, s = r.length; s > o; o++) {
                        var f = r[o];
                        this.addImage(f)
                    }
            }
        }, s.prototype.addImage = function(e) {
            var t = new f(e);
            this.images.push(t)
        }, s.prototype.check = function() {
            function e(e, r) {
                return t.options.debug && h && u.log("confirm", e, r), t.progress(e), n++, n === i && t.complete(), !0
            }
            var t = this,
                n = 0,
                i = this.images.length;
            if (this.hasAnyBroken = !1, !i) return this.complete(), void 0;
            for (var r = 0; i > r; r++) {
                var o = this.images[r];
                o.on("confirm", e), o.check()
            }
        }, s.prototype.progress = function(e) {
            this.hasAnyBroken = this.hasAnyBroken || !e.isLoaded;
            var t = this;
            setTimeout(function() {
                t.emit("progress", t, e), t.jqDeferred && t.jqDeferred.notify && t.jqDeferred.notify(t, e)
            })
        }, s.prototype.complete = function() {
            var e = this.hasAnyBroken ? "fail" : "done";
            this.isComplete = !0;
            var t = this;
            setTimeout(function() {
                if (t.emit(e, t), t.emit("always", t), t.jqDeferred) {
                    var n = t.hasAnyBroken ? "reject" : "resolve";
                    t.jqDeferred[n](t)
                }
            })
        }, a && (a.fn.imagesLoaded = function(e, t) {
            var n = new s(this, e, t);
            return n.jqDeferred.promise(a(this))
        }), f.prototype = new t, f.prototype.check = function() {
            var e = v[this.img.src] || new c(this.img.src);
            if (e.isConfirmed) return this.confirm(e.isLoaded, "cached was confirmed"), void 0;
            if (this.img.complete && void 0 !== this.img.naturalWidth) return this.confirm(0 !== this.img.naturalWidth, "naturalWidth"), void 0;
            var t = this;
            e.on("confirm", function(e, n) {
                return t.confirm(e.isLoaded, n), !0
            }), e.check()
        }, f.prototype.confirm = function(e, t) {
            this.isLoaded = e, this.emit("confirm", this, t)
        };
        var v = {};
        return c.prototype = new t, c.prototype.check = function() {
            if (!this.isChecked) {
                var e = new Image;
                n.bind(e, "load", this), n.bind(e, "error", this), e.src = this.src, this.isChecked = !0
            }
        }, c.prototype.handleEvent = function(e) {
            var t = "on" + e.type;
            this[t] && this[t](e)
        }, c.prototype.onload = function(e) {
            this.confirm(!0, "onload"), this.unbindProxyEvents(e)
        }, c.prototype.onerror = function(e) {
            this.confirm(!1, "onerror"), this.unbindProxyEvents(e)
        }, c.prototype.confirm = function(e, t) {
            this.isConfirmed = !0, this.isLoaded = e, this.emit("confirm", this, t)
        }, c.prototype.unbindProxyEvents = function(e) {
            n.unbind(e.target, "load", this), n.unbind(e.target, "error", this)
        }, s
    });
//Masonry Js
! function(a) {
    function b() {}

    function c(a) {
        function c(b) {
            b.prototype.option || (b.prototype.option = function(b) {
                a.isPlainObject(b) && (this.options = a.extend(!0, this.options, b))
            })
        }

        function e(b, c) {
            a.fn[b] = function(e) {
                if ("string" == typeof e) {
                    for (var g = d.call(arguments, 1), h = 0, i = this.length; i > h; h++) {
                        var j = this[h],
                            k = a.data(j, b);
                        if (k)
                            if (a.isFunction(k[e]) && "_" !== e.charAt(0)) {
                                var l = k[e].apply(k, g);
                                if (void 0 !== l) return l
                            } else f("no such method '" + e + "' for " + b + " instance");
                        else f("cannot call methods on " + b + " prior to initialization; attempted to call '" + e + "'")
                    }
                    return this
                }
                return this.each(function() {
                    var d = a.data(this, b);
                    d ? (d.option(e), d._init()) : (d = new c(this, e), a.data(this, b, d))
                })
            }
        }
        if (a) {
            var f = "undefined" == typeof console ? b : function(a) {
                console.error(a)
            };
            return a.bridget = function(a, b) {
                c(b), e(a, b)
            }, a.bridget
        }
    }
    var d = Array.prototype.slice;
    "function" == typeof define && define.amd ? define("jquery-bridget/jquery.bridget", ["jquery"], c) : c("object" == typeof exports ? require("jquery") : a.jQuery)
}(window),
function(a) {
    function b(b) {
        var c = a.event;
        return c.target = c.target || c.srcElement || b, c
    }
    var c = document.documentElement,
        d = function() {};
    c.addEventListener ? d = function(a, b, c) {
        a.addEventListener(b, c, !1)
    } : c.attachEvent && (d = function(a, c, d) {
        a[c + d] = d.handleEvent ? function() {
            var c = b(a);
            d.handleEvent.call(d, c)
        } : function() {
            var c = b(a);
            d.call(a, c)
        }, a.attachEvent("on" + c, a[c + d])
    });
    var e = function() {};
    c.removeEventListener ? e = function(a, b, c) {
        a.removeEventListener(b, c, !1)
    } : c.detachEvent && (e = function(a, b, c) {
        a.detachEvent("on" + b, a[b + c]);
        try {
            delete a[b + c]
        } catch (d) {
            a[b + c] = void 0
        }
    });
    var f = {
        bind: d,
        unbind: e
    };
    "function" == typeof define && define.amd ? define("eventie/eventie", f) : "object" == typeof exports ? module.exports = f : a.eventie = f
}(window),
function() {
    function a() {}

    function b(a, b) {
        for (var c = a.length; c--;)
            if (a[c].listener === b) return c;
        return -1
    }

    function c(a) {
        return function() {
            return this[a].apply(this, arguments)
        }
    }
    var d = a.prototype,
        e = this,
        f = e.EventEmitter;
    d.getListeners = function(a) {
        var b, c, d = this._getEvents();
        if (a instanceof RegExp) {
            b = {};
            for (c in d) d.hasOwnProperty(c) && a.test(c) && (b[c] = d[c])
        } else b = d[a] || (d[a] = []);
        return b
    }, d.flattenListeners = function(a) {
        var b, c = [];
        for (b = 0; b < a.length; b += 1) c.push(a[b].listener);
        return c
    }, d.getListenersAsObject = function(a) {
        var b, c = this.getListeners(a);
        return c instanceof Array && (b = {}, b[a] = c), b || c
    }, d.addListener = function(a, c) {
        var d, e = this.getListenersAsObject(a),
            f = "object" == typeof c;
        for (d in e) e.hasOwnProperty(d) && -1 === b(e[d], c) && e[d].push(f ? c : {
            listener: c,
            once: !1
        });
        return this
    }, d.on = c("addListener"), d.addOnceListener = function(a, b) {
        return this.addListener(a, {
            listener: b,
            once: !0
        })
    }, d.once = c("addOnceListener"), d.defineEvent = function(a) {
        return this.getListeners(a), this
    }, d.defineEvents = function(a) {
        for (var b = 0; b < a.length; b += 1) this.defineEvent(a[b]);
        return this
    }, d.removeListener = function(a, c) {
        var d, e, f = this.getListenersAsObject(a);
        for (e in f) f.hasOwnProperty(e) && (d = b(f[e], c), -1 !== d && f[e].splice(d, 1));
        return this
    }, d.off = c("removeListener"), d.addListeners = function(a, b) {
        return this.manipulateListeners(!1, a, b)
    }, d.removeListeners = function(a, b) {
        return this.manipulateListeners(!0, a, b)
    }, d.manipulateListeners = function(a, b, c) {
        var d, e, f = a ? this.removeListener : this.addListener,
            g = a ? this.removeListeners : this.addListeners;
        if ("object" != typeof b || b instanceof RegExp)
            for (d = c.length; d--;) f.call(this, b, c[d]);
        else
            for (d in b) b.hasOwnProperty(d) && (e = b[d]) && ("function" == typeof e ? f.call(this, d, e) : g.call(this, d, e));
        return this
    }, d.removeEvent = function(a) {
        var b, c = typeof a,
            d = this._getEvents();
        if ("string" === c) delete d[a];
        else if (a instanceof RegExp)
            for (b in d) d.hasOwnProperty(b) && a.test(b) && delete d[b];
        else delete this._events;
        return this
    }, d.removeAllListeners = c("removeEvent"), d.emitEvent = function(a, b) {
        var c, d, e, f, g = this.getListenersAsObject(a);
        for (e in g)
            if (g.hasOwnProperty(e))
                for (d = g[e].length; d--;) c = g[e][d], c.once === !0 && this.removeListener(a, c.listener), f = c.listener.apply(this, b || []), f === this._getOnceReturnValue() && this.removeListener(a, c.listener);
        return this
    }, d.trigger = c("emitEvent"), d.emit = function(a) {
        var b = Array.prototype.slice.call(arguments, 1);
        return this.emitEvent(a, b)
    }, d.setOnceReturnValue = function(a) {
        return this._onceReturnValue = a, this
    }, d._getOnceReturnValue = function() {
        return this.hasOwnProperty("_onceReturnValue") ? this._onceReturnValue : !0
    }, d._getEvents = function() {
        return this._events || (this._events = {})
    }, a.noConflict = function() {
        return e.EventEmitter = f, a
    }, "function" == typeof define && define.amd ? define("eventEmitter/EventEmitter", [], function() {
        return a
    }) : "object" == typeof module && module.exports ? module.exports = a : e.EventEmitter = a
}.call(this),
    function(a) {
        function b(a) {
            if (a) {
                if ("string" == typeof d[a]) return a;
                a = a.charAt(0).toUpperCase() + a.slice(1);
                for (var b, e = 0, f = c.length; f > e; e++)
                    if (b = c[e] + a, "string" == typeof d[b]) return b
            }
        }
        var c = "Webkit Moz ms Ms O".split(" "),
            d = document.documentElement.style;
        "function" == typeof define && define.amd ? define("get-style-property/get-style-property", [], function() {
            return b
        }) : "object" == typeof exports ? module.exports = b : a.getStyleProperty = b
    }(window),
    function(a) {
        function b(a) {
            var b = parseFloat(a),
                c = -1 === a.indexOf("%") && !isNaN(b);
            return c && b
        }

        function c() {}

        function d() {
            for (var a = {
                    width: 0,
                    height: 0,
                    innerWidth: 0,
                    innerHeight: 0,
                    outerWidth: 0,
                    outerHeight: 0
                }, b = 0, c = g.length; c > b; b++) {
                var d = g[b];
                a[d] = 0
            }
            return a
        }

        function e(c) {
            function e() {
                if (!m) {
                    m = !0;
                    var d = a.getComputedStyle;
                    if (j = function() {
                            var a = d ? function(a) {
                                return d(a, null)
                            } : function(a) {
                                return a.currentStyle
                            };
                            return function(b) {
                                var c = a(b);
                                return c || f("Style returned " + c + ". Are you running this code in a hidden iframe on Firefox? See http://bit.ly/getsizebug1"), c
                            }
                        }(), k = c("boxSizing")) {
                        var e = document.createElement("div");
                        e.style.width = "200px", e.style.padding = "1px 2px 3px 4px", e.style.borderStyle = "solid", e.style.borderWidth = "1px 2px 3px 4px", e.style[k] = "border-box";
                        var g = document.body || document.documentElement;
                        g.appendChild(e);
                        var h = j(e);
                        l = 200 === b(h.width), g.removeChild(e)
                    }
                }
            }

            function h(a) {
                if (e(), "string" == typeof a && (a = document.querySelector(a)), a && "object" == typeof a && a.nodeType) {
                    var c = j(a);
                    if ("none" === c.display) return d();
                    var f = {};
                    f.width = a.offsetWidth, f.height = a.offsetHeight;
                    for (var h = f.isBorderBox = !(!k || !c[k] || "border-box" !== c[k]), m = 0, n = g.length; n > m; m++) {
                        var o = g[m],
                            p = c[o];
                        p = i(a, p);
                        var q = parseFloat(p);
                        f[o] = isNaN(q) ? 0 : q
                    }
                    var r = f.paddingLeft + f.paddingRight,
                        s = f.paddingTop + f.paddingBottom,
                        t = f.marginLeft + f.marginRight,
                        u = f.marginTop + f.marginBottom,
                        v = f.borderLeftWidth + f.borderRightWidth,
                        w = f.borderTopWidth + f.borderBottomWidth,
                        x = h && l,
                        y = b(c.width);
                    y !== !1 && (f.width = y + (x ? 0 : r + v));
                    var z = b(c.height);
                    return z !== !1 && (f.height = z + (x ? 0 : s + w)), f.innerWidth = f.width - (r + v), f.innerHeight = f.height - (s + w), f.outerWidth = f.width + t, f.outerHeight = f.height + u, f
                }
            }

            function i(b, c) {
                if (a.getComputedStyle || -1 === c.indexOf("%")) return c;
                var d = b.style,
                    e = d.left,
                    f = b.runtimeStyle,
                    g = f && f.left;
                return g && (f.left = b.currentStyle.left), d.left = c, c = d.pixelLeft, d.left = e, g && (f.left = g), c
            }
            var j, k, l, m = !1;
            return h
        }
        var f = "undefined" == typeof console ? c : function(a) {
                console.error(a)
            },
            g = ["paddingLeft", "paddingRight", "paddingTop", "paddingBottom", "marginLeft", "marginRight", "marginTop", "marginBottom", "borderLeftWidth", "borderRightWidth", "borderTopWidth", "borderBottomWidth"];
        "function" == typeof define && define.amd ? define("get-size/get-size", ["get-style-property/get-style-property"], e) : "object" == typeof exports ? module.exports = e(require("desandro-get-style-property")) : a.getSize = e(a.getStyleProperty)
    }(window),
    function(a) {
        function b(a) {
            "function" == typeof a && (b.isReady ? a() : g.push(a))
        }

        function c(a) {
            var c = "readystatechange" === a.type && "complete" !== f.readyState;
            b.isReady || c || d()
        }

        function d() {
            b.isReady = !0;
            for (var a = 0, c = g.length; c > a; a++) {
                var d = g[a];
                d()
            }
        }

        function e(e) {
            return "complete" === f.readyState ? d() : (e.bind(f, "DOMContentLoaded", c), e.bind(f, "readystatechange", c), e.bind(a, "load", c)), b
        }
        var f = a.document,
            g = [];
        b.isReady = !1, "function" == typeof define && define.amd ? define("doc-ready/doc-ready", ["eventie/eventie"], e) : "object" == typeof exports ? module.exports = e(require("eventie")) : a.docReady = e(a.eventie)
    }(window),
    function(a) {
        function b(a, b) {
            return a[g](b)
        }

        function c(a) {
            if (!a.parentNode) {
                var b = document.createDocumentFragment();
                b.appendChild(a)
            }
        }

        function d(a, b) {
            c(a);
            for (var d = a.parentNode.querySelectorAll(b), e = 0, f = d.length; f > e; e++)
                if (d[e] === a) return !0;
            return !1
        }

        function e(a, d) {
            return c(a), b(a, d)
        }
        var f, g = function() {
            if (a.matches) return "matches";
            if (a.matchesSelector) return "matchesSelector";
            for (var b = ["webkit", "moz", "ms", "o"], c = 0, d = b.length; d > c; c++) {
                var e = b[c],
                    f = e + "MatchesSelector";
                if (a[f]) return f
            }
        }();
        if (g) {
            var h = document.createElement("div"),
                i = b(h, "div");
            f = i ? b : e
        } else f = d;
        "function" == typeof define && define.amd ? define("matches-selector/matches-selector", [], function() {
            return f
        }) : "object" == typeof exports ? module.exports = f : window.matchesSelector = f
    }(Element.prototype),
    function(a, b) {
        "function" == typeof define && define.amd ? define("fizzy-ui-utils/utils", ["doc-ready/doc-ready", "matches-selector/matches-selector"], function(c, d) {
            return b(a, c, d)
        }) : "object" == typeof exports ? module.exports = b(a, require("doc-ready"), require("desandro-matches-selector")) : a.fizzyUIUtils = b(a, a.docReady, a.matchesSelector)
    }(window, function(a, b, c) {
        var d = {};
        d.extend = function(a, b) {
            for (var c in b) a[c] = b[c];
            return a
        }, d.modulo = function(a, b) {
            return (a % b + b) % b
        };
        var e = Object.prototype.toString;
        d.isArray = function(a) {
            return "[object Array]" == e.call(a)
        }, d.makeArray = function(a) {
            var b = [];
            if (d.isArray(a)) b = a;
            else if (a && "number" == typeof a.length)
                for (var c = 0, e = a.length; e > c; c++) b.push(a[c]);
            else b.push(a);
            return b
        }, d.indexOf = Array.prototype.indexOf ? function(a, b) {
            return a.indexOf(b)
        } : function(a, b) {
            for (var c = 0, d = a.length; d > c; c++)
                if (a[c] === b) return c;
            return -1
        }, d.removeFrom = function(a, b) {
            var c = d.indexOf(a, b); - 1 != c && a.splice(c, 1)
        }, d.isElement = "function" == typeof HTMLElement || "object" == typeof HTMLElement ? function(a) {
            return a instanceof HTMLElement
        } : function(a) {
            return a && "object" == typeof a && 1 == a.nodeType && "string" == typeof a.nodeName
        }, d.setText = function() {
            function a(a, c) {
                b = b || (void 0 !== document.documentElement.textContent ? "textContent" : "innerText"), a[b] = c
            }
            var b;
            return a
        }(), d.getParent = function(a, b) {
            for (; a != document.body;)
                if (a = a.parentNode, c(a, b)) return a
        }, d.getQueryElement = function(a) {
            return "string" == typeof a ? document.querySelector(a) : a
        }, d.handleEvent = function(a) {
            var b = "on" + a.type;
            this[b] && this[b](a)
        }, d.filterFindElements = function(a, b) {
            a = d.makeArray(a);
            for (var e = [], f = 0, g = a.length; g > f; f++) {
                var h = a[f];
                if (d.isElement(h))
                    if (b) {
                        c(h, b) && e.push(h);
                        for (var i = h.querySelectorAll(b), j = 0, k = i.length; k > j; j++) e.push(i[j])
                    } else e.push(h)
            }
            return e
        }, d.debounceMethod = function(a, b, c) {
            var d = a.prototype[b],
                e = b + "Timeout";
            a.prototype[b] = function() {
                var a = this[e];
                a && clearTimeout(a);
                var b = arguments,
                    f = this;
                this[e] = setTimeout(function() {
                    d.apply(f, b), delete f[e]
                }, c || 100)
            }
        }, d.toDashed = function(a) {
            return a.replace(/(.)([A-Z])/g, function(a, b, c) {
                return b + "-" + c
            }).toLowerCase()
        };
        var f = a.console;
        return d.htmlInit = function(c, e) {
            b(function() {
                for (var b = d.toDashed(e), g = document.querySelectorAll(".js-" + b), h = "data-" + b + "-options", i = 0, j = g.length; j > i; i++) {
                    var k, l = g[i],
                        m = l.getAttribute(h);
                    try {
                        k = m && JSON.parse(m)
                    } catch (n) {
                        f && f.error("Error parsing " + h + " on " + l.nodeName.toLowerCase() + (l.id ? "#" + l.id : "") + ": " + n);
                        continue
                    }
                    var o = new c(l, k),
                        p = a.jQuery;
                    p && p.data(l, e, o)
                }
            })
        }, d
    }),
    function(a, b) {
        "function" == typeof define && define.amd ? define("outlayer/item", ["eventEmitter/EventEmitter", "get-size/get-size", "get-style-property/get-style-property", "fizzy-ui-utils/utils"], function(c, d, e, f) {
            return b(a, c, d, e, f)
        }) : "object" == typeof exports ? module.exports = b(a, require("wolfy87-eventemitter"), require("get-size"), require("desandro-get-style-property"), require("fizzy-ui-utils")) : (a.Outlayer = {}, a.Outlayer.Item = b(a, a.EventEmitter, a.getSize, a.getStyleProperty, a.fizzyUIUtils))
    }(window, function(a, b, c, d, e) {
        function f(a) {
            for (var b in a) return !1;
            return b = null, !0
        }

        function g(a, b) {
            a && (this.element = a, this.layout = b, this.position = {
                x: 0,
                y: 0
            }, this._create())
        }

        function h(a) {
            return a.replace(/([A-Z])/g, function(a) {
                return "-" + a.toLowerCase()
            })
        }
        var i = a.getComputedStyle,
            j = i ? function(a) {
                return i(a, null)
            } : function(a) {
                return a.currentStyle
            },
            k = d("transition"),
            l = d("transform"),
            m = k && l,
            n = !!d("perspective"),
            o = {
                WebkitTransition: "webkitTransitionEnd",
                MozTransition: "transitionend",
                OTransition: "otransitionend",
                transition: "transitionend"
            }[k],
            p = ["transform", "transition", "transitionDuration", "transitionProperty"],
            q = function() {
                for (var a = {}, b = 0, c = p.length; c > b; b++) {
                    var e = p[b],
                        f = d(e);
                    f && f !== e && (a[e] = f)
                }
                return a
            }();
        e.extend(g.prototype, b.prototype), g.prototype._create = function() {
            this._transn = {
                ingProperties: {},
                clean: {},
                onEnd: {}
            }, this.css({
                position: "absolute"
            })
        }, g.prototype.handleEvent = function(a) {
            var b = "on" + a.type;
            this[b] && this[b](a)
        }, g.prototype.getSize = function() {
            this.size = c(this.element)
        }, g.prototype.css = function(a) {
            var b = this.element.style;
            for (var c in a) {
                var d = q[c] || c;
                b[d] = a[c]
            }
        }, g.prototype.getPosition = function() {
            var a = j(this.element),
                b = this.layout.options,
                c = b.isOriginLeft,
                d = b.isOriginTop,
                e = a[c ? "left" : "right"],
                f = a[d ? "top" : "bottom"],
                g = parseInt(e, 10),
                h = parseInt(f, 10),
                i = this.layout.size;
            g = -1 != e.indexOf("%") ? g / 100 * i.width : g, h = -1 != f.indexOf("%") ? h / 100 * i.height : h, g = isNaN(g) ? 0 : g, h = isNaN(h) ? 0 : h, g -= c ? i.paddingLeft : i.paddingRight, h -= d ? i.paddingTop : i.paddingBottom, this.position.x = g, this.position.y = h
        }, g.prototype.layoutPosition = function() {
            var a = this.layout.size,
                b = this.layout.options,
                c = {},
                d = b.isOriginLeft ? "paddingLeft" : "paddingRight",
                e = b.isOriginLeft ? "left" : "right",
                f = b.isOriginLeft ? "right" : "left",
                g = this.position.x + a[d];
            c[e] = this.getXValue(g), c[f] = "";
            var h = b.isOriginTop ? "paddingTop" : "paddingBottom",
                i = b.isOriginTop ? "top" : "bottom",
                j = b.isOriginTop ? "bottom" : "top",
                k = this.position.y + a[h];
            c[i] = this.getYValue(k), c[j] = "", this.css(c), this.emitEvent("layout", [this])
        }, g.prototype.getXValue = function(a) {
            var b = this.layout.options;
            return b.percentPosition && !b.isHorizontal ? a / this.layout.size.width * 100 + "%" : a + "px"
        }, g.prototype.getYValue = function(a) {
            var b = this.layout.options;
            return b.percentPosition && b.isHorizontal ? a / this.layout.size.height * 100 + "%" : a + "px"
        }, g.prototype._transitionTo = function(a, b) {
            this.getPosition();
            var c = this.position.x,
                d = this.position.y,
                e = parseInt(a, 10),
                f = parseInt(b, 10),
                g = e === this.position.x && f === this.position.y;
            if (this.setPosition(a, b), g && !this.isTransitioning) return void this.layoutPosition();
            var h = a - c,
                i = b - d,
                j = {};
            j.transform = this.getTranslate(h, i), this.transition({
                to: j,
                onTransitionEnd: {
                    transform: this.layoutPosition
                },
                isCleaning: !0
            })
        }, g.prototype.getTranslate = function(a, b) {
            var c = this.layout.options;
            return a = c.isOriginLeft ? a : -a, b = c.isOriginTop ? b : -b, a = this.getXValue(a), b = this.getYValue(b), n ? "translate3d(" + a + ", " + b + ", 0)" : "translate(" + a + ", " + b + ")"
        }, g.prototype.goTo = function(a, b) {
            this.setPosition(a, b), this.layoutPosition()
        }, g.prototype.moveTo = m ? g.prototype._transitionTo : g.prototype.goTo, g.prototype.setPosition = function(a, b) {
            this.position.x = parseInt(a, 10), this.position.y = parseInt(b, 10)
        }, g.prototype._nonTransition = function(a) {
            this.css(a.to), a.isCleaning && this._removeStyles(a.to);
            for (var b in a.onTransitionEnd) a.onTransitionEnd[b].call(this)
        }, g.prototype._transition = function(a) {
            if (!parseFloat(this.layout.options.transitionDuration)) return void this._nonTransition(a);
            var b = this._transn;
            for (var c in a.onTransitionEnd) b.onEnd[c] = a.onTransitionEnd[c];
            for (c in a.to) b.ingProperties[c] = !0, a.isCleaning && (b.clean[c] = !0);
            if (a.from) {
                this.css(a.from);
                var d = this.element.offsetHeight;
                d = null
            }
            this.enableTransition(a.to), this.css(a.to), this.isTransitioning = !0
        };
        var r = "opacity," + h(q.transform || "transform");
        g.prototype.enableTransition = function() {
            this.isTransitioning || (this.css({
                transitionProperty: r,
                transitionDuration: this.layout.options.transitionDuration
            }), this.element.addEventListener(o, this, !1))
        }, g.prototype.transition = g.prototype[k ? "_transition" : "_nonTransition"], g.prototype.onwebkitTransitionEnd = function(a) {
            this.ontransitionend(a)
        }, g.prototype.onotransitionend = function(a) {
            this.ontransitionend(a)
        };
        var s = {
            "-webkit-transform": "transform",
            "-moz-transform": "transform",
            "-o-transform": "transform"
        };
        g.prototype.ontransitionend = function(a) {
            if (a.target === this.element) {
                var b = this._transn,
                    c = s[a.propertyName] || a.propertyName;
                if (delete b.ingProperties[c], f(b.ingProperties) && this.disableTransition(), c in b.clean && (this.element.style[a.propertyName] = "", delete b.clean[c]), c in b.onEnd) {
                    var d = b.onEnd[c];
                    d.call(this), delete b.onEnd[c]
                }
                this.emitEvent("transitionEnd", [this])
            }
        }, g.prototype.disableTransition = function() {
            this.removeTransitionStyles(), this.element.removeEventListener(o, this, !1), this.isTransitioning = !1
        }, g.prototype._removeStyles = function(a) {
            var b = {};
            for (var c in a) b[c] = "";
            this.css(b)
        };
        var t = {
            transitionProperty: "",
            transitionDuration: ""
        };
        return g.prototype.removeTransitionStyles = function() {
            this.css(t)
        }, g.prototype.removeElem = function() {
            this.element.parentNode.removeChild(this.element), this.css({
                display: ""
            }), this.emitEvent("remove", [this])
        }, g.prototype.remove = function() {
            if (!k || !parseFloat(this.layout.options.transitionDuration)) return void this.removeElem();
            var a = this;
            this.once("transitionEnd", function() {
                a.removeElem()
            }), this.hide()
        }, g.prototype.reveal = function() {
            delete this.isHidden, this.css({
                display: ""
            });
            var a = this.layout.options,
                b = {},
                c = this.getHideRevealTransitionEndProperty("visibleStyle");
            b[c] = this.onRevealTransitionEnd, this.transition({
                from: a.hiddenStyle,
                to: a.visibleStyle,
                isCleaning: !0,
                onTransitionEnd: b
            })
        }, g.prototype.onRevealTransitionEnd = function() {
            this.isHidden || this.emitEvent("reveal")
        }, g.prototype.getHideRevealTransitionEndProperty = function(a) {
            var b = this.layout.options[a];
            if (b.opacity) return "opacity";
            for (var c in b) return c
        }, g.prototype.hide = function() {
            this.isHidden = !0, this.css({
                display: ""
            });
            var a = this.layout.options,
                b = {},
                c = this.getHideRevealTransitionEndProperty("hiddenStyle");
            b[c] = this.onHideTransitionEnd, this.transition({
                from: a.visibleStyle,
                to: a.hiddenStyle,
                isCleaning: !0,
                onTransitionEnd: b
            })
        }, g.prototype.onHideTransitionEnd = function() {
            this.isHidden && (this.css({
                display: "none"
            }), this.emitEvent("hide"))
        }, g.prototype.destroy = function() {
            this.css({
                position: "",
                left: "",
                right: "",
                top: "",
                bottom: "",
                transition: "",
                transform: ""
            })
        }, g
    }),
    function(a, b) {
        "function" == typeof define && define.amd ? define("outlayer/outlayer", ["eventie/eventie", "eventEmitter/EventEmitter", "get-size/get-size", "fizzy-ui-utils/utils", "./item"], function(c, d, e, f, g) {
            return b(a, c, d, e, f, g)
        }) : "object" == typeof exports ? module.exports = b(a, require("eventie"), require("wolfy87-eventemitter"), require("get-size"), require("fizzy-ui-utils"), require("./item")) : a.Outlayer = b(a, a.eventie, a.EventEmitter, a.getSize, a.fizzyUIUtils, a.Outlayer.Item)
    }(window, function(a, b, c, d, e, f) {
        function g(a, b) {
            var c = e.getQueryElement(a);
            if (!c) return void(h && h.error("Bad element for " + this.constructor.namespace + ": " + (c || a)));
            this.element = c, i && (this.$element = i(this.element)), this.options = e.extend({}, this.constructor.defaults), this.option(b);
            var d = ++k;
            this.element.outlayerGUID = d, l[d] = this, this._create(), this.options.isInitLayout && this.layout()
        }
        var h = a.console,
            i = a.jQuery,
            j = function() {},
            k = 0,
            l = {};
        return g.namespace = "outlayer", g.Item = f, g.defaults = {
            containerStyle: {
                position: "relative"
            },
            isInitLayout: !0,
            isOriginLeft: !0,
            isOriginTop: !0,
            isResizeBound: !0,
            isResizingContainer: !0,
            transitionDuration: "0.4s",
            hiddenStyle: {
                opacity: 0,
                transform: "scale(0.001)"
            },
            visibleStyle: {
                opacity: 1,
                transform: "scale(1)"
            }
        }, e.extend(g.prototype, c.prototype), g.prototype.option = function(a) {
            e.extend(this.options, a)
        }, g.prototype._create = function() {
            this.reloadItems(), this.stamps = [], this.stamp(this.options.stamp), e.extend(this.element.style, this.options.containerStyle), this.options.isResizeBound && this.bindResize()
        }, g.prototype.reloadItems = function() {
            this.items = this._itemize(this.element.children)
        }, g.prototype._itemize = function(a) {
            for (var b = this._filterFindItemElements(a), c = this.constructor.Item, d = [], e = 0, f = b.length; f > e; e++) {
                var g = b[e],
                    h = new c(g, this);
                d.push(h)
            }
            return d
        }, g.prototype._filterFindItemElements = function(a) {
            return e.filterFindElements(a, this.options.itemSelector)
        }, g.prototype.getItemElements = function() {
            for (var a = [], b = 0, c = this.items.length; c > b; b++) a.push(this.items[b].element);
            return a
        }, g.prototype.layout = function() {
            this._resetLayout(), this._manageStamps();
            var a = void 0 !== this.options.isLayoutInstant ? this.options.isLayoutInstant : !this._isLayoutInited;
            this.layoutItems(this.items, a), this._isLayoutInited = !0
        }, g.prototype._init = g.prototype.layout, g.prototype._resetLayout = function() {
            this.getSize()
        }, g.prototype.getSize = function() {
            this.size = d(this.element)
        }, g.prototype._getMeasurement = function(a, b) {
            var c, f = this.options[a];
            f ? ("string" == typeof f ? c = this.element.querySelector(f) : e.isElement(f) && (c = f), this[a] = c ? d(c)[b] : f) : this[a] = 0
        }, g.prototype.layoutItems = function(a, b) {
            a = this._getItemsForLayout(a), this._layoutItems(a, b), this._postLayout()
        }, g.prototype._getItemsForLayout = function(a) {
            for (var b = [], c = 0, d = a.length; d > c; c++) {
                var e = a[c];
                e.isIgnored || b.push(e)
            }
            return b
        }, g.prototype._layoutItems = function(a, b) {
            if (this._emitCompleteOnItems("layout", a), a && a.length) {
                for (var c = [], d = 0, e = a.length; e > d; d++) {
                    var f = a[d],
                        g = this._getItemLayoutPosition(f);
                    g.item = f, g.isInstant = b || f.isLayoutInstant, c.push(g)
                }
                this._processLayoutQueue(c)
            }
        }, g.prototype._getItemLayoutPosition = function() {
            return {
                x: 0,
                y: 0
            }
        }, g.prototype._processLayoutQueue = function(a) {
            for (var b = 0, c = a.length; c > b; b++) {
                var d = a[b];
                this._positionItem(d.item, d.x, d.y, d.isInstant)
            }
        }, g.prototype._positionItem = function(a, b, c, d) {
            d ? a.goTo(b, c) : a.moveTo(b, c)
        }, g.prototype._postLayout = function() {
            this.resizeContainer()
        }, g.prototype.resizeContainer = function() {
            if (this.options.isResizingContainer) {
                var a = this._getContainerSize();
                a && (this._setContainerMeasure(a.width, !0), this._setContainerMeasure(a.height, !1))
            }
        }, g.prototype._getContainerSize = j, g.prototype._setContainerMeasure = function(a, b) {
            if (void 0 !== a) {
                var c = this.size;
                c.isBorderBox && (a += b ? c.paddingLeft + c.paddingRight + c.borderLeftWidth + c.borderRightWidth : c.paddingBottom + c.paddingTop + c.borderTopWidth + c.borderBottomWidth), a = Math.max(a, 0), this.element.style[b ? "width" : "height"] = a + "px"
            }
        }, g.prototype._emitCompleteOnItems = function(a, b) {
            function c() {
                e.dispatchEvent(a + "Complete", null, [b])
            }

            function d() {
                g++, g === f && c()
            }
            var e = this,
                f = b.length;
            if (!b || !f) return void c();
            for (var g = 0, h = 0, i = b.length; i > h; h++) {
                var j = b[h];
                j.once(a, d)
            }
        }, g.prototype.dispatchEvent = function(a, b, c) {
            var d = b ? [b].concat(c) : c;
            if (this.emitEvent(a, d), i)
                if (this.$element = this.$element || i(this.element), b) {
                    var e = i.Event(b);
                    e.type = a, this.$element.trigger(e, c)
                } else this.$element.trigger(a, c)
        }, g.prototype.ignore = function(a) {
            var b = this.getItem(a);
            b && (b.isIgnored = !0)
        }, g.prototype.unignore = function(a) {
            var b = this.getItem(a);
            b && delete b.isIgnored
        }, g.prototype.stamp = function(a) {
            if (a = this._find(a)) {
                this.stamps = this.stamps.concat(a);
                for (var b = 0, c = a.length; c > b; b++) {
                    var d = a[b];
                    this.ignore(d)
                }
            }
        }, g.prototype.unstamp = function(a) {
            if (a = this._find(a))
                for (var b = 0, c = a.length; c > b; b++) {
                    var d = a[b];
                    e.removeFrom(this.stamps, d), this.unignore(d)
                }
        }, g.prototype._find = function(a) {
            return a ? ("string" == typeof a && (a = this.element.querySelectorAll(a)), a = e.makeArray(a)) : void 0
        }, g.prototype._manageStamps = function() {
            if (this.stamps && this.stamps.length) {
                this._getBoundingRect();
                for (var a = 0, b = this.stamps.length; b > a; a++) {
                    var c = this.stamps[a];
                    this._manageStamp(c)
                }
            }
        }, g.prototype._getBoundingRect = function() {
            var a = this.element.getBoundingClientRect(),
                b = this.size;
            this._boundingRect = {
                left: a.left + b.paddingLeft + b.borderLeftWidth,
                top: a.top + b.paddingTop + b.borderTopWidth,
                right: a.right - (b.paddingRight + b.borderRightWidth),
                bottom: a.bottom - (b.paddingBottom + b.borderBottomWidth)
            }
        }, g.prototype._manageStamp = j, g.prototype._getElementOffset = function(a) {
            var b = a.getBoundingClientRect(),
                c = this._boundingRect,
                e = d(a),
                f = {
                    left: b.left - c.left - e.marginLeft,
                    top: b.top - c.top - e.marginTop,
                    right: c.right - b.right - e.marginRight,
                    bottom: c.bottom - b.bottom - e.marginBottom
                };
            return f
        }, g.prototype.handleEvent = function(a) {
            var b = "on" + a.type;
            this[b] && this[b](a)
        }, g.prototype.bindResize = function() {
            this.isResizeBound || (b.bind(a, "resize", this), this.isResizeBound = !0)
        }, g.prototype.unbindResize = function() {
            this.isResizeBound && b.unbind(a, "resize", this), this.isResizeBound = !1
        }, g.prototype.onresize = function() {
            function a() {
                b.resize(), delete b.resizeTimeout
            }
            this.resizeTimeout && clearTimeout(this.resizeTimeout);
            var b = this;
            this.resizeTimeout = setTimeout(a, 100)
        }, g.prototype.resize = function() {
            this.isResizeBound && this.needsResizeLayout() && this.layout()
        }, g.prototype.needsResizeLayout = function() {
            var a = d(this.element),
                b = this.size && a;
            return b && a.innerWidth !== this.size.innerWidth
        }, g.prototype.addItems = function(a) {
            var b = this._itemize(a);
            return b.length && (this.items = this.items.concat(b)), b
        }, g.prototype.appended = function(a) {
            var b = this.addItems(a);
            b.length && (this.layoutItems(b, !0), this.reveal(b))
        }, g.prototype.prepended = function(a) {
            var b = this._itemize(a);
            if (b.length) {
                var c = this.items.slice(0);
                this.items = b.concat(c), this._resetLayout(), this._manageStamps(), this.layoutItems(b, !0), this.reveal(b), this.layoutItems(c)
            }
        }, g.prototype.reveal = function(a) {
            this._emitCompleteOnItems("reveal", a);
            for (var b = a && a.length, c = 0; b && b > c; c++) {
                var d = a[c];
                d.reveal()
            }
        }, g.prototype.hide = function(a) {
            this._emitCompleteOnItems("hide", a);
            for (var b = a && a.length, c = 0; b && b > c; c++) {
                var d = a[c];
                d.hide()
            }
        }, g.prototype.revealItemElements = function(a) {
            var b = this.getItems(a);
            this.reveal(b)
        }, g.prototype.hideItemElements = function(a) {
            var b = this.getItems(a);
            this.hide(b)
        }, g.prototype.getItem = function(a) {
            for (var b = 0, c = this.items.length; c > b; b++) {
                var d = this.items[b];
                if (d.element === a) return d
            }
        }, g.prototype.getItems = function(a) {
            a = e.makeArray(a);
            for (var b = [], c = 0, d = a.length; d > c; c++) {
                var f = a[c],
                    g = this.getItem(f);
                g && b.push(g)
            }
            return b
        }, g.prototype.remove = function(a) {
            var b = this.getItems(a);
            if (this._emitCompleteOnItems("remove", b), b && b.length)
                for (var c = 0, d = b.length; d > c; c++) {
                    var f = b[c];
                    f.remove(), e.removeFrom(this.items, f)
                }
        }, g.prototype.destroy = function() {
            var a = this.element.style;
            a.height = "", a.position = "", a.width = "";
            for (var b = 0, c = this.items.length; c > b; b++) {
                var d = this.items[b];
                d.destroy()
            }
            this.unbindResize();
            var e = this.element.outlayerGUID;
            delete l[e], delete this.element.outlayerGUID, i && i.removeData(this.element, this.constructor.namespace)
        }, g.data = function(a) {
            a = e.getQueryElement(a);
            var b = a && a.outlayerGUID;
            return b && l[b]
        }, g.create = function(a, b) {
            function c() {
                g.apply(this, arguments)
            }
            return Object.create ? c.prototype = Object.create(g.prototype) : e.extend(c.prototype, g.prototype), c.prototype.constructor = c, c.defaults = e.extend({}, g.defaults), e.extend(c.defaults, b), c.prototype.settings = {}, c.namespace = a, c.data = g.data, c.Item = function() {
                f.apply(this, arguments)
            }, c.Item.prototype = new f, e.htmlInit(c, a), i && i.bridget && i.bridget(a, c), c
        }, g.Item = f, g
    }),
    function(a, b) {
        "function" == typeof define && define.amd ? define(["outlayer/outlayer", "get-size/get-size", "fizzy-ui-utils/utils"], b) : "object" == typeof exports ? module.exports = b(require("outlayer"), require("get-size"), require("fizzy-ui-utils")) : a.Masonry = b(a.Outlayer, a.getSize, a.fizzyUIUtils)
    }(window, function(a, b, c) {
        var d = a.create("masonry");
        return d.prototype._resetLayout = function() {
            this.getSize(), this._getMeasurement("columnWidth", "outerWidth"), this._getMeasurement("gutter", "outerWidth"), this.measureColumns();
            var a = this.cols;
            for (this.colYs = []; a--;) this.colYs.push(0);
            this.maxY = 0
        }, d.prototype.measureColumns = function() {
            if (this.getContainerWidth(), !this.columnWidth) {
                var a = this.items[0],
                    c = a && a.element;
                this.columnWidth = c && b(c).outerWidth || this.containerWidth
            }
            var d = this.columnWidth += this.gutter,
                e = this.containerWidth + this.gutter,
                f = e / d,
                g = d - e % d,
                h = g && 1 > g ? "round" : "floor";
            f = Math[h](f), this.cols = Math.max(f, 1)
        }, d.prototype.getContainerWidth = function() {
            var a = this.options.isFitWidth ? this.element.parentNode : this.element,
                c = b(a);
            this.containerWidth = c && c.innerWidth
        }, d.prototype._getItemLayoutPosition = function(a) {
            a.getSize();
            var b = a.size.outerWidth % this.columnWidth,
                d = b && 1 > b ? "round" : "ceil",
                e = Math[d](a.size.outerWidth / this.columnWidth);
            e = Math.min(e, this.cols);
            for (var f = this._getColGroup(e), g = Math.min.apply(Math, f), h = c.indexOf(f, g), i = {
                    x: this.columnWidth * h,
                    y: g
                }, j = g + a.size.outerHeight, k = this.cols + 1 - f.length, l = 0; k > l; l++) this.colYs[h + l] = j;
            return i
        }, d.prototype._getColGroup = function(a) {
            if (2 > a) return this.colYs;
            for (var b = [], c = this.cols + 1 - a, d = 0; c > d; d++) {
                var e = this.colYs.slice(d, d + a);
                b[d] = Math.max.apply(Math, e)
            }
            return b
        }, d.prototype._manageStamp = function(a) {
            var c = b(a),
                d = this._getElementOffset(a),
                e = this.options.isOriginLeft ? d.left : d.right,
                f = e + c.outerWidth,
                g = Math.floor(e / this.columnWidth);
            g = Math.max(0, g);
            var h = Math.floor(f / this.columnWidth);
            h -= f % this.columnWidth ? 0 : 1, h = Math.min(this.cols - 1, h);
            for (var i = (this.options.isOriginTop ? d.top : d.bottom) + c.outerHeight, j = g; h >= j; j++) this.colYs[j] = Math.max(i, this.colYs[j])
        }, d.prototype._getContainerSize = function() {
            this.maxY = Math.max.apply(Math, this.colYs);
            var a = {
                height: this.maxY
            };
            return this.options.isFitWidth && (a.width = this._getContainerFitWidth()), a
        }, d.prototype._getContainerFitWidth = function() {
            for (var a = 0, b = this.cols; --b && 0 === this.colYs[b];) a++;
            return (this.cols - a) * this.columnWidth - this.gutter
        }, d.prototype.needsResizeLayout = function() {
            var a = this.containerWidth;
            return this.getContainerWidth(), a !== this.containerWidth
        }, d
    });

! function(a) {
    "function" == typeof define && define.amd ? define(["jquery"], a) : "object" == typeof exports ? module.exports = a(require("jquery")) : a(jQuery)
}(function(a) {
    function i() {
        var b, c, d = {
            height: f.innerHeight,
            width: f.innerWidth
        };
        return d.height || (b = e.compatMode, (b || !a.support.boxModel) && (c = "CSS1Compat" === b ? g : e.body, d = {
            height: c.clientHeight,
            width: c.clientWidth
        })), d
    }

    function j() {
        return {
            top: f.pageYOffset || g.scrollTop || e.body.scrollTop,
            left: f.pageXOffset || g.scrollLeft || e.body.scrollLeft
        }
    }

    function k() {
        if (b.length) {
            var e = 0,
                f = a.map(b, function(a) {
                    var b = a.data.selector,
                        c = a.$element;
                    return b ? c.find(b) : c
                });
            for (c = c || i(), d = d || j(); e < b.length; e++)
                if (a.contains(g, f[e][0])) {
                    var h = a(f[e]),
                        k = {
                            height: h[0].offsetHeight,
                            width: h[0].offsetWidth
                        },
                        l = h.offset(),
                        m = h.data("inview");
                    if (!d || !c) return;
                    l.top + k.height > d.top && l.top < d.top + c.height && l.left + k.width > d.left && l.left < d.left + c.width ? m || h.data("inview", !0).trigger("inview", [!0]) : m && h.data("inview", !1).trigger("inview", [!1])
                }
        }
    }
    var c, d, h, b = [],
        e = document,
        f = window,
        g = e.documentElement;
    a.event.special.inview = {
        add: function(c) {
            b.push({
                data: c,
                $element: a(this),
                element: this
            }), !h && b.length && (h = setInterval(k, 250))
        },
        remove: function(a) {
            for (var c = 0; c < b.length; c++) {
                var d = b[c];
                if (d.element === this && d.data.guid === a.guid) {
                    b.splice(c, 1);
                    break
                }
            }
            b.length || (clearInterval(h), h = null)
        }
    }, a(f).on("scroll resize scrollstop", function() {
        c = d = null
    }), !g.addEventListener && g.attachEvent && g.attachEvent("onfocusin", function() {
        d = null
    })
});


//Before After Image
! function(t) {
    "function" == typeof define && define.amd ? define(["jquery"], t) : t(jQuery)
}(function(t, e) {
    function n(t) {
        function e(t) {
            a ? (n(), O(e), i = !0, a = !1) : i = !1
        }
        var n = t,
            a = !1,
            i = !1;
        this.kick = function(t) {
            a = !0, i || e()
        }, this.end = function(t) {
            var e = n;
            t && (i ? (n = a ? function() {
                e(), t()
            } : t, a = !0) : t())
        }
    }

    function a() {
        return !0
    }

    function i() {
        return !1
    }

    function o(t) {
        t.preventDefault()
    }

    function r(t) {
        z[t.target.tagName.toLowerCase()] || t.preventDefault()
    }

    function u(t) {
        return 1 === t.which && !t.ctrlKey && !t.altKey
    }

    function c(t, e) {
        var n, a;
        if (t.identifiedTouch) return t.identifiedTouch(e);
        for (n = -1, a = t.length; ++n < a;)
            if (t[n].identifier === e) return t[n]
    }

    function d(t, e) {
        var n = c(t.changedTouches, e.identifier);
        if (n && (n.pageX !== e.pageX || n.pageY !== e.pageY)) return n
    }

    function m(t) {
        var e;
        u(t) && (e = {
            target: t.target,
            startX: t.pageX,
            startY: t.pageY,
            timeStamp: t.timeStamp
        }, K(document, Q.move, f, e), K(document, Q.cancel, s, e))
    }

    function f(t) {
        var e = t.data;
        X(t, e, t, v)
    }

    function s(t) {
        v()
    }

    function v() {
        L(document, Q.move, f), L(document, Q.cancel, s)
    }

    function p(t) {
        var e, n;
        z[t.target.tagName.toLowerCase()] || (e = t.changedTouches[0], n = {
            target: e.target,
            startX: e.pageX,
            startY: e.pageY,
            timeStamp: t.timeStamp,
            identifier: e.identifier
        }, K(document, B.move + "." + e.identifier, g, n), K(document, B.cancel + "." + e.identifier, h, n))
    }

    function g(t) {
        var e = t.data,
            n = d(t, e);
        n && X(t, e, n, l)
    }

    function h(t) {
        var e = t.data,
            n = c(t.changedTouches, e.identifier);
        n && l(e.identifier)
    }

    function l(t) {
        L(document, "." + t, g), L(document, "." + t, h)
    }

    function X(t, e, n, a) {
        var i = n.pageX - e.startX,
            o = n.pageY - e.startY;
        C * C > i * i + o * o || y(t, e, n, i, o, a)
    }

    function Y() {
        return this._handled = a, !1
    }

    function w(t) {
        t._handled()
    }

    function y(t, e, n, a, i, o) {
        var r, u;
        e.target;
        r = t.targetTouches, u = t.timeStamp - e.timeStamp, e.type = "movestart", e.distX = a, e.distY = i, e.deltaX = a, e.deltaY = i, e.pageX = n.pageX, e.pageY = n.pageY, e.velocityX = a / u, e.velocityY = i / u, e.targetTouches = r, e.finger = r ? r.length : 1, e._handled = Y, e._preventTouchmoveDefault = function() {
            t.preventDefault()
        }, N(e.target, e), o(e.identifier)
    }

    function T(t) {
        var e = t.data.timer;
        t.data.touch = t, t.data.timeStamp = t.timeStamp, e.kick()
    }

    function S(t) {
        var e = t.data.event,
            n = t.data.timer;
        k(), F(e, n, function() {
            setTimeout(function() {
                L(e.target, "click", i)
            }, 0)
        })
    }

    function k(t) {
        L(document, Q.move, T), L(document, Q.end, S)
    }

    function _(t) {
        var e = t.data.event,
            n = t.data.timer,
            a = d(t, e);
        a && (t.preventDefault(), e.targetTouches = t.targetTouches, t.data.touch = a, t.data.timeStamp = t.timeStamp, n.kick())
    }

    function q(t) {
        var e = t.data.event,
            n = t.data.timer,
            a = c(t.changedTouches, e.identifier);
        a && (A(e), F(e, n))
    }

    function A(t) {
        L(document, "." + t.identifier, _), L(document, "." + t.identifier, q)
    }

    function D(t, e, n, a) {
        var i = n - t.timeStamp;
        t.type = "move", t.distX = e.pageX - t.startX, t.distY = e.pageY - t.startY, t.deltaX = e.pageX - t.pageX, t.deltaY = e.pageY - t.pageY, t.velocityX = .3 * t.velocityX + .7 * t.deltaX / i, t.velocityY = .3 * t.velocityY + .7 * t.deltaY / i, t.pageX = e.pageX, t.pageY = e.pageY
    }

    function F(t, e, n) {
        e.end(function() {
            return t.type = "moveend", N(t.target, t), n && n()
        })
    }

    function R(t, e, n) {
        return K(this, "movestart.move", w), !0
    }

    function x(t) {
        return L(this, "dragstart drag", o), L(this, "mousedown touchstart", r), L(this, "movestart", w), !0
    }

    function b(t) {
        "move" !== t.namespace && "moveend" !== t.namespace && (K(this, "dragstart." + t.guid + " drag." + t.guid, o, e, t.selector), K(this, "mousedown." + t.guid, r, e, t.selector))
    }

    function j(t) {
        "move" !== t.namespace && "moveend" !== t.namespace && (L(this, "dragstart." + t.guid + " drag." + t.guid), L(this, "mousedown." + t.guid))
    }
    var C = 6,
        K = t.event.add,
        L = t.event.remove,
        N = function(e, n, a) {
            t.event.trigger(n, a, e)
        },
        O = function() {
            return window.requestAnimationFrame || window.webkitRequestAnimationFrame || window.mozRequestAnimationFrame || window.oRequestAnimationFrame || window.msRequestAnimationFrame || function(t, e) {
                return window.setTimeout(function() {
                    t()
                }, 25)
            }
        }(),
        z = {
            textarea: !0,
            input: !0,
            select: !0,
            button: !0
        },
        Q = {
            move: "mousemove",
            cancel: "mouseup dragstart",
            end: "mouseup"
        },
        B = {
            move: "touchmove",
            cancel: "touchend",
            end: "touchend"
        };
    t.event.special.movestart = {
        setup: R,
        teardown: x,
        add: b,
        remove: j,
        _default: function(t) {
            function a(e) {
                D(o, r.touch, r.timeStamp), N(t.target, o)
            }
            var o, r;
            t._handled() && (o = {
                target: t.target,
                startX: t.startX,
                startY: t.startY,
                pageX: t.pageX,
                pageY: t.pageY,
                distX: t.distX,
                distY: t.distY,
                deltaX: t.deltaX,
                deltaY: t.deltaY,
                velocityX: t.velocityX,
                velocityY: t.velocityY,
                timeStamp: t.timeStamp,
                identifier: t.identifier,
                targetTouches: t.targetTouches,
                finger: t.finger
            }, r = {
                event: o,
                timer: new n(a),
                touch: e,
                timeStamp: e
            }, t.identifier === e ? (K(t.target, "click", i), K(document, Q.move, T, r), K(document, Q.end, S, r)) : (t._preventTouchmoveDefault(), K(document, B.move + "." + t.identifier, _, r), K(document, B.end + "." + t.identifier, q, r)))
        }
    }, t.event.special.move = {
        setup: function() {
            K(this, "movestart.move", t.noop)
        },
        teardown: function() {
            L(this, "movestart.move", t.noop)
        }
    }, t.event.special.moveend = {
        setup: function() {
            K(this, "movestart.moveend", t.noop)
        },
        teardown: function() {
            L(this, "movestart.moveend", t.noop)
        }
    }, K(document, "mousedown.move", m), K(document, "touchstart.move", p), "function" == typeof Array.prototype.indexOf && ! function(t, e) {
        for (var n = ["changedTouches", "targetTouches"], a = n.length; a--;) - 1 === t.event.props.indexOf(n[a]) && t.event.props.push(n[a])
    }(t)
});
! function(t) {
    t.fn.twentytwenty = function(e) {
        var e = t.extend({
            default_offset_pct: .5,
            orientation: "horizontal"
        }, e);
        return this.each(function() {
            var i = e.default_offset_pct,
                n = t(this),
                s = e.orientation;
            n.wrap("<div class='twentytwenty-wrapper twentytwenty-" + s + "'></div>");
            var a = n.find("img:first"),
                d = n.find("img:last"),
                o = n.find(".km-twentytwenty-handle");
            n.addClass("twentytwenty-container"), a.addClass("twentytwenty-before"), d.addClass("twentytwenty-after");
            var c = function(t) {
                    var e = a.width(),
                        i = a.height();
                    return {
                        w: e + "px",
                        h: i + "px",
                        cw: t * e + "px",
                        ch: t * i + "px"
                    }
                },
                r = function(t) {
                    "vertical" === s ? a.css("clip", "rect(0," + t.w + "," + t.ch + ",0)") : a.css("clip", "rect(0," + t.cw + "," + t.h + ",0)"), n.css("height", t.h)
                },
                f = function(t) {
                    var e = c(t);
                    o.css("vertical" === s ? "top" : "left", "vertical" === s ? e.ch : e.cw), r(e)
                };
            t(window).on("resize.twentytwenty", function(t) {
                f(i)
            });
            var w = 0,
                l = 0;
            o.on("movestart", function(t) {
                (t.distX > t.distY && t.distX < -t.distY || t.distX < t.distY && t.distX > -t.distY) && "vertical" !== s ? t.preventDefault() : (t.distX < t.distY && t.distX < -t.distY || t.distX > t.distY && t.distX > -t.distY) && "vertical" === s && t.preventDefault(), n.addClass("active"), w = n.offset().left, offsetY = n.offset().top, l = a.width(), imgHeight = a.height()
            }), o.on("moveend", function(t) {
                n.removeClass("active")
            }), o.on("move", function(t) {
                n.hasClass("active") && (i = "vertical" === s ? (t.pageY - offsetY) / imgHeight : (t.pageX - w) / l, 0 > i && (i = 0), i > 1 && (i = 1), f(i))
            }), n.find("img").on("mousedown", function(t) {
                t.preventDefault()
            }), t(window).trigger("resize.twentytwenty")
        })
    }
}(jQuery);
! function(t, o, e) {
    "use strict";
    t.HoverDir = function(o, e) {
        this.$el = t(e), this._init(o)
    }, t.HoverDir.defaults = {
        speed: 300,
        easing: "ease",
        hoverDelay: 0,
        inverse: !1
    }, t.HoverDir.prototype = {
        _init: function(o) {
            this.options = t.extend(!0, {}, t.HoverDir.defaults, o), this.transitionProp = "all " + this.options.speed + "ms " + this.options.easing, this.support = Modernizr.csstransitions, this._loadEvents()
        },
        _loadEvents: function() {
            var o = this;
            this.$el.on("mouseenter.hoverdir, mouseleave.hoverdir", function(e) {
                var i = t(this),
                    n = i.find(".km-overlay-follow"),
                    s = o._getDir(i, {
                        x: e.pageX,
                        y: e.pageY
                    }),
                    r = o._getStyle(s);
                "mouseenter" === e.type ? (n.hide().css(r.from), clearTimeout(o.tmhover), o.tmhover = setTimeout(function() {
                    n.show(0, function() {
                        var e = t(this);
                        o.support && e.css("transition", o.transitionProp), o._applyAnimation(e, r.to, o.options.speed)
                    })
                }, o.options.hoverDelay)) : (o.support && n.css("transition", o.transitionProp), clearTimeout(o.tmhover), o._applyAnimation(n, r.from, o.options.speed))
            })
        },
        _getDir: function(t, o) {
            var e = t.width(),
                i = t.height(),
                n = (o.x - t.offset().left - e / 2) * (e > i ? i / e : 1),
                s = (o.y - t.offset().top - i / 2) * (i > e ? e / i : 1),
                r = Math.round((Math.atan2(s, n) * (180 / Math.PI) + 180) / 90 + 3) % 4;
            return r
        },
        _getStyle: function(t) {
            var o, e, i = {
                    left: "0px",
                    top: "-100%"
                },
                n = {
                    left: "0px",
                    top: "100%"
                },
                s = {
                    left: "-100%",
                    top: "0px"
                },
                r = {
                    left: "100%",
                    top: "0px"
                },
                a = {
                    top: "0px"
                },
                p = {
                    left: "0px"
                };
            switch (t) {
                case 0:
                    o = this.options.inverse ? n : i, e = a;
                    break;
                case 1:
                    o = this.options.inverse ? s : r, e = p;
                    break;
                case 2:
                    o = this.options.inverse ? i : n, e = a;
                    break;
                case 3:
                    o = this.options.inverse ? r : s, e = p
            }
            return {
                from: o,
                to: e
            }
        },
        _applyAnimation: function(o, e, i) {
            t.fn.applyStyle = this.support ? t.fn.css : t.fn.animate, o.stop().applyStyle(e, t.extend(!0, [], {
                duration: i + "ms"
            }))
        }
    };
    var i = function(t) {
        o.console && o.console.error(t)
    };
    t.fn.hoverdir = function(o) {
        var e = t.data(this, "hoverdir");
        if ("string" == typeof o) {
            var n = Array.prototype.slice.call(arguments, 1);
            this.each(function() {
                return e ? t.isFunction(e[o]) && "_" !== o.charAt(0) ? void e[o].apply(e, n) : void i("no such method '" + o + "' for hoverdir instance") : void i("cannot call methods on hoverdir prior to initialization; attempted to call method '" + o + "'")
            })
        } else this.each(function() {
            e ? e._init() : e = t.data(this, "hoverdir", new t.HoverDir(o, this))
        });
        return e
    }
}(jQuery, window);

//Count Up
var KaswaraCount = function(a, b, c, d, e, f) {
    for (var g = 0, h = ["webkit", "moz", "ms", "o"], i = 0; i < h.length && !window.requestAnimationFrame; ++i) window.requestAnimationFrame = window[h[i] + "RequestAnimationFrame"], window.cancelAnimationFrame = window[h[i] + "CancelAnimationFrame"] || window[h[i] + "CancelRequestAnimationFrame"];
    window.requestAnimationFrame || (window.requestAnimationFrame = function(a, b) {
        var c = (new Date).getTime(),
            d = Math.max(0, 16 - (c - g)),
            e = window.setTimeout(function() {
                a(c + d)
            }, d);
        return g = c + d, e
    }), window.cancelAnimationFrame || (window.cancelAnimationFrame = function(a) {
        clearTimeout(a)
    });
    var j = this;
    j.options = {
        useEasing: !0,
        useGrouping: !0,
        separator: ",",
        decimal: ".",
        easingFn: null,
        formattingFn: null
    };
    for (var k in f) f.hasOwnProperty(k) && (j.options[k] = f[k]);
    "" === j.options.separator && (j.options.useGrouping = !1), j.options.prefix || (j.options.prefix = ""), j.options.suffix || (j.options.suffix = ""), j.d = "string" == typeof a ? document.getElementById(a) : a, j.startVal = Number(b), j.endVal = Number(c), j.countDown = j.startVal > j.endVal, j.frameVal = j.startVal, j.decimals = Math.max(0, d || 0), j.dec = Math.pow(10, j.decimals), j.duration = 1e3 * Number(e) || 2e3, j.formatNumber = function(a) {
        a = a.toFixed(j.decimals), a += "";
        var b, c, d, e;
        if (b = a.split("."), c = b[0], d = b.length > 1 ? j.options.decimal + b[1] : "", e = /(\d+)(\d{3})/, j.options.useGrouping)
            for (; e.test(c);) c = c.replace(e, "$1" + j.options.separator + "$2");
        return j.options.prefix + c + d + j.options.suffix
    }, j.easeOutExpo = function(a, b, c, d) {
        return c * (-Math.pow(2, -10 * a / d) + 1) * 1024 / 1023 + b
    }, j.easingFn = j.options.easingFn ? j.options.easingFn : j.easeOutExpo, j.formattingFn = j.options.formattingFn ? j.options.formattingFn : j.formatNumber, j.version = function() {
        return "1.7.1"
    }, j.printValue = function(a) {
        var b = j.formattingFn(a);
        "INPUT" === j.d.tagName ? this.d.value = b : "text" === j.d.tagName || "tspan" === j.d.tagName ? this.d.textContent = b : this.d.innerHTML = b
    }, j.count = function(a) {
        j.startTime || (j.startTime = a), j.timestamp = a;
        var b = a - j.startTime;
        j.remaining = j.duration - b, j.options.useEasing ? j.countDown ? j.frameVal = j.startVal - j.easingFn(b, 0, j.startVal - j.endVal, j.duration) : j.frameVal = j.easingFn(b, j.startVal, j.endVal - j.startVal, j.duration) : j.countDown ? j.frameVal = j.startVal - (j.startVal - j.endVal) * (b / j.duration) : j.frameVal = j.startVal + (j.endVal - j.startVal) * (b / j.duration), j.countDown ? j.frameVal = j.frameVal < j.endVal ? j.endVal : j.frameVal : j.frameVal = j.frameVal > j.endVal ? j.endVal : j.frameVal, j.frameVal = Math.round(j.frameVal * j.dec) / j.dec, j.printValue(j.frameVal), b < j.duration ? j.rAF = requestAnimationFrame(j.count) : j.callback && j.callback()
    }, j.start = function(a) {
        return j.callback = a, j.rAF = requestAnimationFrame(j.count), !1
    }, j.pauseResume = function() {
        j.paused ? (j.paused = !1, delete j.startTime, j.duration = j.remaining, j.startVal = j.frameVal, requestAnimationFrame(j.count)) : (j.paused = !0, cancelAnimationFrame(j.rAF))
    }, j.reset = function() {
        j.paused = !1, delete j.startTime, j.startVal = b, cancelAnimationFrame(j.rAF), j.printValue(j.startVal)
    }, j.update = function(a) {
        cancelAnimationFrame(j.rAF), j.paused = !1, delete j.startTime, j.startVal = j.frameVal, j.endVal = Number(a), j.countDown = j.startVal > j.endVal, j.rAF = requestAnimationFrame(j.count)
    }, j.printValue(j.startVal)
};
! function(a) {
    a.fn.kaswaracount = function(b) {
        var c = {
            startVal: 0,
            decimals: 0,
            duration: 2
        };
        if ("number" == typeof b) c.endVal = b;
        else {
            if ("object" != typeof b) return;
            a.extend(c, b)
        }
        return this.each(function(a, b) {
            var d = new KaswaraCount(b, c.startVal, c.endVal, c.decimals, c.duration, c.options);
            d.start()
        }), this
    }
}(jQuery);

/*!
 * multiscroll.js 0.1.7 Beta 
 */
jQuery.effects || function(e, t) {
    var i = e.uiBackCompat !== !1,
        a = "ui-effects-";
    e.effects = {
            effect: {}
        },
        function(t, i) {
            function a(e, t, i) {
                var a = c[t.type] || {};
                return null == e ? i || !t.def ? null : t.def : (e = a.floor ? ~~e : parseFloat(e), isNaN(e) ? t.def : a.mod ? (e + a.mod) % a.mod : 0 > e ? 0 : e > a.max ? a.max : e)
            }

            function s(e) {
                var a = u(),
                    s = a._rgba = [];
                return e = e.toLowerCase(), m(l, function(t, n) {
                    var r, o = n.re.exec(e),
                        h = o && n.parse(o),
                        l = n.space || "rgba";
                    return h ? (r = a[l](h), a[d[l].cache] = r[d[l].cache], s = a._rgba = r._rgba, !1) : i
                }), s.length ? ("0,0,0,0" === s.join() && t.extend(s, r.transparent), a) : r[e]
            }

            function n(e, t, i) {
                return i = (i + 1) % 1, 1 > 6 * i ? e + 6 * (t - e) * i : 1 > 2 * i ? t : 2 > 3 * i ? e + 6 * (t - e) * (2 / 3 - i) : e
            }
            var r, o = "backgroundColor borderBottomColor borderLeftColor borderRightColor borderTopColor color columnRuleColor outlineColor textDecorationColor textEmphasisColor".split(" "),
                h = /^([\-+])=\s*(\d+\.?\d*)/,
                l = [{
                    re: /rgba?\(\s*(\d{1,3})\s*,\s*(\d{1,3})\s*,\s*(\d{1,3})\s*(?:,\s*(\d+(?:\.\d+)?)\s*)?\)/,
                    parse: function(e) {
                        return [e[1], e[2], e[3], e[4]]
                    }
                }, {
                    re: /rgba?\(\s*(\d+(?:\.\d+)?)\%\s*,\s*(\d+(?:\.\d+)?)\%\s*,\s*(\d+(?:\.\d+)?)\%\s*(?:,\s*(\d+(?:\.\d+)?)\s*)?\)/,
                    parse: function(e) {
                        return [2.55 * e[1], 2.55 * e[2], 2.55 * e[3], e[4]]
                    }
                }, {
                    re: /#([a-f0-9]{2})([a-f0-9]{2})([a-f0-9]{2})/,
                    parse: function(e) {
                        return [parseInt(e[1], 16), parseInt(e[2], 16), parseInt(e[3], 16)]
                    }
                }, {
                    re: /#([a-f0-9])([a-f0-9])([a-f0-9])/,
                    parse: function(e) {
                        return [parseInt(e[1] + e[1], 16), parseInt(e[2] + e[2], 16), parseInt(e[3] + e[3], 16)]
                    }
                }, {
                    re: /hsla?\(\s*(\d+(?:\.\d+)?)\s*,\s*(\d+(?:\.\d+)?)\%\s*,\s*(\d+(?:\.\d+)?)\%\s*(?:,\s*(\d+(?:\.\d+)?)\s*)?\)/,
                    space: "hsla",
                    parse: function(e) {
                        return [e[1], e[2] / 100, e[3] / 100, e[4]]
                    }
                }],
                u = t.Color = function(e, i, a, s) {
                    return new t.Color.fn.parse(e, i, a, s)
                },
                d = {
                    rgba: {
                        props: {
                            red: {
                                idx: 0,
                                type: "byte"
                            },
                            green: {
                                idx: 1,
                                type: "byte"
                            },
                            blue: {
                                idx: 2,
                                type: "byte"
                            }
                        }
                    },
                    hsla: {
                        props: {
                            hue: {
                                idx: 0,
                                type: "degrees"
                            },
                            saturation: {
                                idx: 1,
                                type: "percent"
                            },
                            lightness: {
                                idx: 2,
                                type: "percent"
                            }
                        }
                    }
                },
                c = {
                    "byte": {
                        floor: !0,
                        max: 255
                    },
                    percent: {
                        max: 1
                    },
                    degrees: {
                        mod: 360,
                        floor: !0
                    }
                },
                p = u.support = {},
                f = t("<p>")[0],
                m = t.each;
            f.style.cssText = "background-color:rgba(1,1,1,.5)", p.rgba = f.style.backgroundColor.indexOf("rgba") > -1, m(d, function(e, t) {
                t.cache = "_" + e, t.props.alpha = {
                    idx: 3,
                    type: "percent",
                    def: 1
                }
            }), u.fn = t.extend(u.prototype, {
                parse: function(n, o, h, l) {
                    if (n === i) return this._rgba = [null, null, null, null], this;
                    (n.jquery || n.nodeType) && (n = t(n).css(o), o = i);
                    var c = this,
                        p = t.type(n),
                        f = this._rgba = [];
                    return o !== i && (n = [n, o, h, l], p = "array"), "string" === p ? this.parse(s(n) || r._default) : "array" === p ? (m(d.rgba.props, function(e, t) {
                        f[t.idx] = a(n[t.idx], t)
                    }), this) : "object" === p ? (n instanceof u ? m(d, function(e, t) {
                        n[t.cache] && (c[t.cache] = n[t.cache].slice())
                    }) : m(d, function(t, i) {
                        var s = i.cache;
                        m(i.props, function(e, t) {
                            if (!c[s] && i.to) {
                                if ("alpha" === e || null == n[e]) return;
                                c[s] = i.to(c._rgba)
                            }
                            c[s][t.idx] = a(n[e], t, !0)
                        }), c[s] && 0 > e.inArray(null, c[s].slice(0, 3)) && (c[s][3] = 1, i.from && (c._rgba = i.from(c[s])))
                    }), this) : i
                },
                is: function(e) {
                    var t = u(e),
                        a = !0,
                        s = this;
                    return m(d, function(e, n) {
                        var r, o = t[n.cache];
                        return o && (r = s[n.cache] || n.to && n.to(s._rgba) || [], m(n.props, function(e, t) {
                            return null != o[t.idx] ? a = o[t.idx] === r[t.idx] : i
                        })), a
                    }), a
                },
                _space: function() {
                    var e = [],
                        t = this;
                    return m(d, function(i, a) {
                        t[a.cache] && e.push(i)
                    }), e.pop()
                },
                transition: function(e, t) {
                    var i = u(e),
                        s = i._space(),
                        n = d[s],
                        r = 0 === this.alpha() ? u("transparent") : this,
                        o = r[n.cache] || n.to(r._rgba),
                        h = o.slice();
                    return i = i[n.cache], m(n.props, function(e, s) {
                        var n = s.idx,
                            r = o[n],
                            l = i[n],
                            u = c[s.type] || {};
                        null !== l && (null === r ? h[n] = l : (u.mod && (l - r > u.mod / 2 ? r += u.mod : r - l > u.mod / 2 && (r -= u.mod)), h[n] = a((l - r) * t + r, s)))
                    }), this[s](h)
                },
                blend: function(e) {
                    if (1 === this._rgba[3]) return this;
                    var i = this._rgba.slice(),
                        a = i.pop(),
                        s = u(e)._rgba;
                    return u(t.map(i, function(e, t) {
                        return (1 - a) * s[t] + a * e
                    }))
                },
                toRgbaString: function() {
                    var e = "rgba(",
                        i = t.map(this._rgba, function(e, t) {
                            return null == e ? t > 2 ? 1 : 0 : e
                        });
                    return 1 === i[3] && (i.pop(), e = "rgb("), e + i.join() + ")"
                },
                toHslaString: function() {
                    var e = "hsla(",
                        i = t.map(this.hsla(), function(e, t) {
                            return null == e && (e = t > 2 ? 1 : 0), t && 3 > t && (e = Math.round(100 * e) + "%"), e
                        });
                    return 1 === i[3] && (i.pop(), e = "hsl("), e + i.join() + ")"
                },
                toHexString: function(e) {
                    var i = this._rgba.slice(),
                        a = i.pop();
                    return e && i.push(~~(255 * a)), "#" + t.map(i, function(e) {
                        return e = (e || 0).toString(16), 1 === e.length ? "0" + e : e
                    }).join("")
                },
                toString: function() {
                    return 0 === this._rgba[3] ? "transparent" : this.toRgbaString()
                }
            }), u.fn.parse.prototype = u.fn, d.hsla.to = function(e) {
                if (null == e[0] || null == e[1] || null == e[2]) return [null, null, null, e[3]];
                var t, i, a = e[0] / 255,
                    s = e[1] / 255,
                    n = e[2] / 255,
                    r = e[3],
                    o = Math.max(a, s, n),
                    h = Math.min(a, s, n),
                    l = o - h,
                    u = o + h,
                    d = .5 * u;
                return t = h === o ? 0 : a === o ? 60 * (s - n) / l + 360 : s === o ? 60 * (n - a) / l + 120 : 60 * (a - s) / l + 240, i = 0 === d || 1 === d ? d : .5 >= d ? l / u : l / (2 - u), [Math.round(t) % 360, i, d, null == r ? 1 : r]
            }, d.hsla.from = function(e) {
                if (null == e[0] || null == e[1] || null == e[2]) return [null, null, null, e[3]];
                var t = e[0] / 360,
                    i = e[1],
                    a = e[2],
                    s = e[3],
                    r = .5 >= a ? a * (1 + i) : a + i - a * i,
                    o = 2 * a - r;
                return [Math.round(255 * n(o, r, t + 1 / 3)), Math.round(255 * n(o, r, t)), Math.round(255 * n(o, r, t - 1 / 3)), s]
            }, m(d, function(e, s) {
                var n = s.props,
                    r = s.cache,
                    o = s.to,
                    l = s.from;
                u.fn[e] = function(e) {
                    if (o && !this[r] && (this[r] = o(this._rgba)), e === i) return this[r].slice();
                    var s, h = t.type(e),
                        d = "array" === h || "object" === h ? e : arguments,
                        c = this[r].slice();
                    return m(n, function(e, t) {
                        var i = d["object" === h ? e : t.idx];
                        null == i && (i = c[t.idx]), c[t.idx] = a(i, t)
                    }), l ? (s = u(l(c)), s[r] = c, s) : u(c)
                }, m(n, function(i, a) {
                    u.fn[i] || (u.fn[i] = function(s) {
                        var n, r = t.type(s),
                            o = "alpha" === i ? this._hsla ? "hsla" : "rgba" : e,
                            l = this[o](),
                            u = l[a.idx];
                        return "undefined" === r ? u : ("function" === r && (s = s.call(this, u), r = t.type(s)), null == s && a.empty ? this : ("string" === r && (n = h.exec(s), n && (s = u + parseFloat(n[2]) * ("+" === n[1] ? 1 : -1))), l[a.idx] = s, this[o](l)))
                    })
                })
            }), m(o, function(e, i) {
                t.cssHooks[i] = {
                    set: function(e, a) {
                        var n, r, o = "";
                        if ("string" !== t.type(a) || (n = s(a))) {
                            if (a = u(n || a), !p.rgba && 1 !== a._rgba[3]) {
                                for (r = "backgroundColor" === i ? e.parentNode : e;
                                    ("" === o || "transparent" === o) && r && r.style;) try {
                                    o = t.css(r, "backgroundColor"), r = r.parentNode
                                } catch (h) {}
                                a = a.blend(o && "transparent" !== o ? o : "_default")
                            }
                            a = a.toRgbaString()
                        }
                        try {
                            e.style[i] = a
                        } catch (l) {}
                    }
                }, t.fx.step[i] = function(e) {
                    e.colorInit || (e.start = u(e.elem, i), e.end = u(e.end), e.colorInit = !0), t.cssHooks[i].set(e.elem, e.start.transition(e.end, e.pos))
                }
            }), t.cssHooks.borderColor = {
                expand: function(e) {
                    var t = {};
                    return m(["Top", "Right", "Bottom", "Left"], function(i, a) {
                        t["border" + a + "Color"] = e
                    }), t
                }
            }, r = t.Color.names = {
                aqua: "#00ffff",
                black: "#000000",
                blue: "#0000ff",
                fuchsia: "#ff00ff",
                gray: "#808080",
                green: "#008000",
                lime: "#00ff00",
                maroon: "#800000",
                navy: "#000080",
                olive: "#808000",
                purple: "#800080",
                red: "#ff0000",
                silver: "#c0c0c0",
                teal: "#008080",
                white: "#ffffff",
                yellow: "#ffff00",
                transparent: [null, null, null, 0],
                _default: "#ffffff"
            }
        }(jQuery),
        function() {
            function i() {
                var t, i, a = this.ownerDocument.defaultView ? this.ownerDocument.defaultView.getComputedStyle(this, null) : this.currentStyle,
                    s = {};
                if (a && a.length && a[0] && a[a[0]])
                    for (i = a.length; i--;) t = a[i], "string" == typeof a[t] && (s[e.camelCase(t)] = a[t]);
                else
                    for (t in a) "string" == typeof a[t] && (s[t] = a[t]);
                return s
            }

            function a(t, i) {
                var a, s, r = {};
                for (a in i) s = i[a], t[a] !== s && (n[a] || (e.fx.step[a] || !isNaN(parseFloat(s))) && (r[a] = s));
                return r
            }
            var s = ["add", "remove", "toggle"],
                n = {
                    border: 1,
                    borderBottom: 1,
                    borderColor: 1,
                    borderLeft: 1,
                    borderRight: 1,
                    borderTop: 1,
                    borderWidth: 1,
                    margin: 1,
                    padding: 1
                };
            e.each(["borderLeftStyle", "borderRightStyle", "borderBottomStyle", "borderTopStyle"], function(t, i) {
                e.fx.step[i] = function(e) {
                    ("none" !== e.end && !e.setAttr || 1 === e.pos && !e.setAttr) && (jQuery.style(e.elem, i, e.end), e.setAttr = !0)
                }
            }), e.effects.animateClass = function(t, n, r, o) {
                var h = e.speed(n, r, o);
                return this.queue(function() {
                    var n, r = e(this),
                        o = r.attr("class") || "",
                        l = h.children ? r.find("*").andSelf() : r;
                    l = l.map(function() {
                        var t = e(this);
                        return {
                            el: t,
                            start: i.call(this)
                        }
                    }), n = function() {
                        e.each(s, function(e, i) {
                            t[i] && r[i + "Class"](t[i])
                        })
                    }, n(), l = l.map(function() {
                        return this.end = i.call(this.el[0]), this.diff = a(this.start, this.end), this
                    }), r.attr("class", o), l = l.map(function() {
                        var t = this,
                            i = e.Deferred(),
                            a = jQuery.extend({}, h, {
                                queue: !1,
                                complete: function() {
                                    i.resolve(t)
                                }
                            });
                        return this.el.animate(this.diff, a), i.promise()
                    }), e.when.apply(e, l.get()).done(function() {
                        n(), e.each(arguments, function() {
                            var t = this.el;
                            e.each(this.diff, function(e) {
                                t.css(e, "")
                            })
                        }), h.complete.call(r[0])
                    })
                })
            }, e.fn.extend({
                _addClass: e.fn.addClass,
                addClass: function(t, i, a, s) {
                    return i ? e.effects.animateClass.call(this, {
                        add: t
                    }, i, a, s) : this._addClass(t)
                },
                _removeClass: e.fn.removeClass,
                removeClass: function(t, i, a, s) {
                    return i ? e.effects.animateClass.call(this, {
                        remove: t
                    }, i, a, s) : this._removeClass(t)
                },
                _toggleClass: e.fn.toggleClass,
                toggleClass: function(i, a, s, n, r) {
                    return "boolean" == typeof a || a === t ? s ? e.effects.animateClass.call(this, a ? {
                        add: i
                    } : {
                        remove: i
                    }, s, n, r) : this._toggleClass(i, a) : e.effects.animateClass.call(this, {
                        toggle: i
                    }, a, s, n)
                },
                switchClass: function(t, i, a, s, n) {
                    return e.effects.animateClass.call(this, {
                        add: i,
                        remove: t
                    }, a, s, n)
                }
            })
        }(),
        function() {
            function s(t, i, a, s) {
                return e.isPlainObject(t) && (i = t, t = t.effect), t = {
                    effect: t
                }, null == i && (i = {}), e.isFunction(i) && (s = i, a = null, i = {}), ("number" == typeof i || e.fx.speeds[i]) && (s = a, a = i, i = {}), e.isFunction(a) && (s = a, a = null), i && e.extend(t, i), a = a || i.duration, t.duration = e.fx.off ? 0 : "number" == typeof a ? a : a in e.fx.speeds ? e.fx.speeds[a] : e.fx.speeds._default, t.complete = s || i.complete, t
            }

            function n(t) {
                return !t || "number" == typeof t || e.fx.speeds[t] ? !0 : "string" != typeof t || e.effects.effect[t] ? !1 : i && e.effects[t] ? !1 : !0
            }
            e.extend(e.effects, {
                version: "1.9.2",
                save: function(e, t) {
                    for (var i = 0; t.length > i; i++) null !== t[i] && e.data(a + t[i], e[0].style[t[i]])
                },
                restore: function(e, i) {
                    var s, n;
                    for (n = 0; i.length > n; n++) null !== i[n] && (s = e.data(a + i[n]), s === t && (s = ""), e.css(i[n], s))
                },
                setMode: function(e, t) {
                    return "toggle" === t && (t = e.is(":hidden") ? "show" : "hide"), t
                },
                getBaseline: function(e, t) {
                    var i, a;
                    switch (e[0]) {
                        case "top":
                            i = 0;
                            break;
                        case "middle":
                            i = .5;
                            break;
                        case "bottom":
                            i = 1;
                            break;
                        default:
                            i = e[0] / t.height
                    }
                    switch (e[1]) {
                        case "left":
                            a = 0;
                            break;
                        case "center":
                            a = .5;
                            break;
                        case "right":
                            a = 1;
                            break;
                        default:
                            a = e[1] / t.width
                    }
                    return {
                        x: a,
                        y: i
                    }
                },
                createWrapper: function(t) {
                    if (t.parent().is(".ui-effects-wrapper")) return t.parent();
                    var i = {
                            width: t.outerWidth(!0),
                            height: t.outerHeight(!0),
                            "float": t.css("float")
                        },
                        a = e("<div></div>").addClass("ui-effects-wrapper").css({
                            fontSize: "100%",
                            background: "transparent",
                            border: "none",
                            margin: 0,
                            padding: 0
                        }),
                        s = {
                            width: t.width(),
                            height: t.height()
                        },
                        n = document.activeElement;
                    try {
                        n.id
                    } catch (r) {
                        n = document.body
                    }
                    return t.wrap(a), (t[0] === n || e.contains(t[0], n)) && e(n).focus(), a = t.parent(), "static" === t.css("position") ? (a.css({
                        position: "relative"
                    }), t.css({
                        position: "relative"
                    })) : (e.extend(i, {
                        position: t.css("position"),
                        zIndex: t.css("z-index")
                    }), e.each(["top", "left", "bottom", "right"], function(e, a) {
                        i[a] = t.css(a), isNaN(parseInt(i[a], 10)) && (i[a] = "auto")
                    }), t.css({
                        position: "relative",
                        top: 0,
                        left: 0,
                        right: "auto",
                        bottom: "auto"
                    })), t.css(s), a.css(i).show()
                },
                removeWrapper: function(t) {
                    var i = document.activeElement;
                    return t.parent().is(".ui-effects-wrapper") && (t.parent().replaceWith(t), (t[0] === i || e.contains(t[0], i)) && e(i).focus()), t
                },
                setTransition: function(t, i, a, s) {
                    return s = s || {}, e.each(i, function(e, i) {
                        var n = t.cssUnit(i);
                        n[0] > 0 && (s[i] = n[0] * a + n[1])
                    }), s
                }
            }), e.fn.extend({
                effect: function() {
                    function t(t) {
                        function i() {
                            e.isFunction(n) && n.call(s[0]), e.isFunction(t) && t()
                        }
                        var s = e(this),
                            n = a.complete,
                            r = a.mode;
                        (s.is(":hidden") ? "hide" === r : "show" === r) ? i(): o.call(s[0], a, i)
                    }
                    var a = s.apply(this, arguments),
                        n = a.mode,
                        r = a.queue,
                        o = e.effects.effect[a.effect],
                        h = !o && i && e.effects[a.effect];
                    return e.fx.off || !o && !h ? n ? this[n](a.duration, a.complete) : this.each(function() {
                        a.complete && a.complete.call(this)
                    }) : o ? r === !1 ? this.each(t) : this.queue(r || "fx", t) : h.call(this, {
                        options: a,
                        duration: a.duration,
                        callback: a.complete,
                        mode: a.mode
                    })
                },
                _show: e.fn.show,
                show: function(e) {
                    if (n(e)) return this._show.apply(this, arguments);
                    var t = s.apply(this, arguments);
                    return t.mode = "show", this.effect.call(this, t)
                },
                _hide: e.fn.hide,
                hide: function(e) {
                    if (n(e)) return this._hide.apply(this, arguments);
                    var t = s.apply(this, arguments);
                    return t.mode = "hide", this.effect.call(this, t)
                },
                __toggle: e.fn.toggle,
                toggle: function(t) {
                    if (n(t) || "boolean" == typeof t || e.isFunction(t)) return this.__toggle.apply(this, arguments);
                    var i = s.apply(this, arguments);
                    return i.mode = "toggle", this.effect.call(this, i)
                },
                cssUnit: function(t) {
                    var i = this.css(t),
                        a = [];
                    return e.each(["em", "px", "%", "pt"], function(e, t) {
                        i.indexOf(t) > 0 && (a = [parseFloat(i), t])
                    }), a
                }
            })
        }(),
        function() {
            var t = {};
            e.each(["Quad", "Cubic", "Quart", "Quint", "Expo"], function(e, i) {
                t[i] = function(t) {
                    return Math.pow(t, e + 2)
                }
            }), e.extend(t, {
                Sine: function(e) {
                    return 1 - Math.cos(e * Math.PI / 2)
                },
                Circ: function(e) {
                    return 1 - Math.sqrt(1 - e * e)
                },
                Elastic: function(e) {
                    return 0 === e || 1 === e ? e : -Math.pow(2, 8 * (e - 1)) * Math.sin((80 * (e - 1) - 7.5) * Math.PI / 15)
                },
                Back: function(e) {
                    return e * e * (3 * e - 2)
                },
                Bounce: function(e) {
                    for (var t, i = 4;
                        ((t = Math.pow(2, --i)) - 1) / 11 > e;);
                    return 1 / Math.pow(4, 3 - i) - 7.5625 * Math.pow((3 * t - 2) / 22 - e, 2)
                }
            }), e.each(t, function(t, i) {
                e.easing["easeIn" + t] = i, e.easing["easeOut" + t] = function(e) {
                    return 1 - i(1 - e)
                }, e.easing["easeInOut" + t] = function(e) {
                    return .5 > e ? i(2 * e) / 2 : 1 - i(-2 * e + 2) / 2
                }
            })
        }()
}(jQuery);

! function(e, t, n, o, i) {
    e.fn.multiscroll = function(s) {
        function a() {
            var n = t.location.hash.replace("#", ""),
                o = n;
            if (o.length) {
                var i = e(".ms-left").find('[data-anchor="' + o + '"]'),
                    s = "undefined" == typeof lastScrolledDestiny;
                (s || o !== lastScrolledDestiny) && f(i)
            }
        }

        function l(t) {
            clearTimeout(U);
            var o = e(n.activeElement);
            if (!o.is("textarea") && !o.is("input") && !o.is("select") && s.keyboardScrolling) {
                var i = t.which,
                    a = [40, 38, 32, 33, 34];
                e.inArray(i, a) > -1 && t.preventDefault(), U = setTimeout(function() {
                    r(t)
                }, 150)
            }
        }

        function r(t) {
            var n = t.shiftKey;
            switch (t.which) {
                case 38:
                case 33:
                    B.moveSectionUp();
                    break;
                case 32:
                    if (n) {
                        B.moveSectionUp();
                        break
                    }
                case 40:
                case 34:
                    B.moveSectionDown();
                    break;
                case 36:
                    B.moveTo(1);
                    break;
                case 35:
                    B.moveTo(e(".ms-left .ms-section").length);
                    break;
                default:
                    return
            }
        }

        function c() {
            I = e(t).height(), e(".ms-tableCell").each(function() {
                e(this).css({
                    height: T(e(this).parent())
                })
            }), m(), e.isFunction(s.afterResize) && s.afterResize.call(this)
        }

        function m() {
            s.css3 ? (h(e(".ms-left"), "translate3d(0px, -" + e(".ms-left").find(".ms-section.active").position().top + "px, 0px)", !1), h(e(".ms-right"), "translate3d(0px, -" + e(".ms-right").find(".ms-section.active").position().top + "px, 0px)", !1)) : (e(".ms-left").css("top", -e(".ms-left").find(".ms-section.active").position().top), e(".ms-right").css("top", -e(".ms-right").find(".ms-section.active").position().top))
        }

        function f(t) {
            var n = t.index(),
                o = e(".ms-right").find(".ms-section").eq(X - 1 - n),
                i = t.data("anchor"),
                a = e(".ms-left .ms-section.active"),
                l = a.index() + 1,
                r = y(t);
            q = !0;
            var c = {
                left: t.position().top,
                right: o.position().top
            };
            if (o.addClass("active").siblings().removeClass("active"), t.addClass("active").siblings().removeClass("active"), x(i), s.css3) {
                e.isFunction(s.onLeave) && s.onLeave.call(this, l, n + 1, r);
                var m = "translate3d(0px, -" + c.left + "px, 0px)",
                    f = "translate3d(0px, -" + c.right + "px, 0px)";
                h(e(".ms-left"), m, !0), h(e(".ms-right"), f, !0), setTimeout(function() {
                    e.isFunction(s.afterLoad) && s.afterLoad.call(this, i, n + 1), setTimeout(function() {
                        q = !1
                    }, R)
                }, s.scrollingSpeed)
            } else e.isFunction(s.onLeave) && s.onLeave.call(this, l, n + 1, r), e(".ms-left").animate({
                top: -c.left
            }, s.scrollingSpeed, s.easing, function() {
                e.isFunction(s.afterLoad) && s.afterLoad.call(this, i, n + 1), setTimeout(function() {
                    q = !1
                }, R)
            }), e(".ms-right").animate({
                top: -c.right
            }, s.scrollingSpeed, s.easing);
            lastScrolledDestiny = i, S(i), g(i, n)
        }

        function d() {
            n.addEventListener ? (n.removeEventListener("mousewheel", v, !1), n.removeEventListener("wheel", v, !1)) : n.detachEvent("onmousewheel", v)
        }

        function u() {
            n.addEventListener ? (n.addEventListener("mousewheel", v, !1), n.addEventListener("wheel", v, !1)) : n.attachEvent("onmousewheel", v)
        }

        function v(e) {
            e = t.event || e;
            var n = o.max(-1, o.min(1, e.wheelDelta || -e.deltaY || -e.detail));
            return q || (0 > n ? B.moveSectionDown() : B.moveSectionUp()), !1
        }

        function h(e, t, n) {
            e.toggleClass("ms-easing", n), e.css(p(t))
        }

        function p(e) {
            return {
                "-webkit-transform": e,
                "-moz-transform": e,
                "-ms-transform": e,
                transform: e
            }
        }

        function g(t, n) {
            s.navigation && (e("#multiscroll-nav").find(".active").removeClass("active"), t ? e("#multiscroll-nav").find('a[href="#' + t + '"]').addClass("active") : e("#multiscroll-nav").find("li").eq(n).find("a").addClass("active"))
        }

        function S(t) {
            s.menu && (e(s.menu).find(".active").removeClass("active"), e(s.menu).find('[data-menuanchor="' + t + '"]').addClass("active"))
        }

        function y(t) {
            var n = e(".ms-left .ms-section.active").index(),
                o = t.index();
            return n > o ? "up" : "down"
        }

        function x(e) {
            s.anchors.length && (location.hash = e), b()
        }

        function b() {
            var t = e(".ms-left .ms-section.active"),
                n = t.data("anchor"),
                o = t.index(),
                i = String(o);
            s.anchors.length && (i = n), i = i.replace("/", "-").replace("#", "");
            var a = new RegExp("\\b\\s?ms-viewing-[^\\s]+\\b", "g");
            e("body")[0].className = e("body")[0].className.replace(a, ""), e("body").addClass("ms-viewing-" + i)
        }

        function w() {
            var e, o = n.createElement("p"),
                s = {
                    webkitTransform: "-webkit-transform",
                    OTransform: "-o-transform",
                    msTransform: "-ms-transform",
                    MozTransform: "-moz-transform",
                    transform: "transform"
                };
            n.body.insertBefore(o, null);
            for (var a in s) o.style[a] !== i && (o.style[a] = "translate3d(1px,1px,1px)", e = t.getComputedStyle(o).getPropertyValue(s[a]));
            return n.body.removeChild(o), e !== i && e.length > 0 && "none" !== e
        }

        function C(e) {
            e.addClass("ms-table").wrapInner('<div class="ms-tableCell" style="height: ' + T(e) + 'px" />')
        }

        function T(e) {
            var t = I;
            if (s.paddingTop || s.paddingBottom) {
                var n = parseInt(e.css("padding-top")) + parseInt(e.css("padding-bottom"));
                t = I - n
            }
            return t
        }

        function E() {
            var n = t.location.hash.replace("#", ""),
                o = e('.ms-left .ms-section[data-anchor="' + n + '"]');
            n.length && f(o)
        }

        function k(n) {
            var i = n.originalEvent;
            if (L(i)) {
                n.preventDefault();
                e(".ms-left .ms-section.active");
                if (!q) {
                    var a = z(i);
                    N = a.y, O = a.x, o.abs(W - N) > e(t).height() / 100 * s.touchSensitivity && (W > N ? B.moveSectionDown() : N > W && B.moveSectionUp())
                }
            }
        }

        function L(e) {
            return "undefined" == typeof e.pointerType || "mouse" != e.pointerType
        }

        function M(e) {
            var t = e.originalEvent;
            if (L(t)) {
                var n = z(t);
                W = n.y, K = n.x
            }
        }

        function P() {
            Y && (MSPointer = D(), e(n).off("touchstart " + MSPointer.down).on("touchstart " + MSPointer.down, M), e(n).off("touchmove " + MSPointer.move).on("touchmove " + MSPointer.move, k))
        }

        function D() {
            var e;
            return e = t.PointerEvent ? {
                down: "pointerdown",
                move: "pointermove"
            } : {
                down: "MSPointerDown",
                move: "MSPointerMove"
            }
        }

        function z(e) {
            var t = [];
            return t.y = "undefined" != typeof e.pageY && (e.pageY || e.pageX) ? e.pageY : e.touches[0].pageY, t.x = "undefined" != typeof e.pageX && (e.pageY || e.pageX) ? e.pageX : e.touches[0].pageX, Y && L(e) && (t.y = e.touches[0].pageY, t.x = e.touches[0].pageX), t
        }
        var B = e.fn.multiscroll;
        s = e.extend({
            verticalCentered: !0,
            scrollingSpeed: 700,
            easing: "easeInQuart",
            menu: !1,
            sectionsColor: [],
            anchors: [],
            navigation: !1,
            navigationPosition: "right",
            navigationColor: "#000",
            navigationTooltips: [],
            loopBottom: !1,
            loopTop: !1,
            css3: !1,
            paddingTop: 0,
            paddingBottom: 0,
            fixedElements: null,
            normalScrollElements: null,
            keyboardScrolling: !0,
            touchSensitivity: 5,
            sectionSelector: ".ms-section",
            leftSelector: ".ms-left",
            rightSelector: ".ms-right",
            afterLoad: null,
            onLeave: null,
            afterRender: null,
            afterResize: null
        }, s);
        var R = 600,
            Y = "ontouchstart" in t || navigator.msMaxTouchPoints > 0 || navigator.maxTouchPoints;
        ".ms-right" !== s.rightSelector && e(s.rightSelector).addClass("ms-right"), ".ms-left" !== s.leftSelector && e(s.leftSelector).addClass("ms-left");
        var F, X = e(".ms-left").find(".ms-section").length,
            q = !1,
            I = e(t).height();
        u(), P(), s.css3 && (s.css3 = w()), e("html, body").css({
            overflow: "hidden",
            height: "100%"
        }), ".ms-section" !== s.sectionSelector && e(s.sectionSelector).each(function() {
            e(this).addClass("ms-section")
        }), s.navigation && (e("body").append('<div id="multiscroll-nav"><ul></ul></div>'), F = e("#multiscroll-nav"), F.css("color", s.navigationColor), F.addClass(s.navigationPosition)), e(".ms-right, .ms-left").css({
            width: "50%",
            position: "absolute",
            height: "100%",
            "-ms-touch-action": "none"
        }), e(".ms-right").css({
            right: "1px",
            top: "0",
            "-ms-touch-action": "none",
            "touch-action": "none"
        }), e(".ms-left").css({
            left: "0",
            top: "0",
            "-ms-touch-action": "none",
            "touch-action": "none"
        }), e(".ms-left .ms-section, .ms-right .ms-section").each(function() {
            var t = e(this).index();
            if ((s.paddingTop || s.paddingBottom) && e(this).css("padding", s.paddingTop + " 0 " + s.paddingBottom + " 0"), "undefined" != typeof s.sectionsColor[t] && e(this).css("background-color", s.sectionsColor[t]), "undefined" != typeof s.anchors[t] && e(this).attr("data-anchor", s.anchors[t]), s.verticalCentered && C(e(this)), e(this).closest(".ms-left").length && s.navigation) {
                var n = "";
                s.anchors.length && (n = s.anchors[t]);
                var o = s.navigationTooltips[t];
                "undefined" == typeof o && (o = ""), s.navigation && F.find("ul").append('<li data-tooltip="' + o + '"><a href="#' + n + '"><span></span></a></li>')
            }
        }), e(".ms-right").html(e(".ms-right").find(".ms-section").get().reverse()), e(".ms-left .ms-section, .ms-right .ms-section").each(function() {
            var t = e(this).index();
            e(this).css({
                height: "100%"
            }), !t && s.navigation && F.find("li").eq(t).find("a").addClass("active")
        }).promise().done(function() {
            e(".ms-left .ms-section.active").length || (e(".ms-right").find(".ms-section").last().addClass("active"), e(".ms-left").find(".ms-section").first().addClass("active")), s.navigation && F.css("margin-top", "-" + F.height() / 2 + "px"), e.isFunction(s.afterRender) && s.afterRender.call(this), m(), b(), e(t).on("load", function() {
                E()
            })
        }), e(t).on("hashchange", a), e(n).keydown(l);
        var U;
        e(n).mousedown(function(e) {
            return 1 == e.button ? (e.preventDefault(), !1) : void 0
        }), e(n).on("click", "#multiscroll-nav a", function(t) {
            t.preventDefault();
            var n = e(this).parent().index();
            f(e(".ms-left .ms-section").eq(n))
        }), e(n).on({
            mouseenter: function() {
                var t = e(this).data("tooltip");
                e('<div class="multiscroll-tooltip ' + s.navigationPosition + '">' + t + "</div>").hide().appendTo(e(this)).fadeIn(200)
            },
            mouseleave: function() {
                e(this).find(".multiscroll-tooltip").fadeOut(200, function() {
                    e(this).remove()
                })
            }
        }, "#multiscroll-nav li"), s.normalScrollElements && (e(n).on("mouseenter", s.normalScrollElements, function() {
            B.setMouseWheelScrolling(!1)
        }), e(n).on("mouseleave", s.normalScrollElements, function() {
            B.setMouseWheelScrolling(!0)
        })), e(t).on("resize", c), B.moveSectionUp = function() {
            var t = e(".ms-left .ms-section.active").prev(".ms-section");
            !t.length && s.loopTop && (t = e(".ms-left .ms-section").last()), t.length && f(t)
        }, B.moveSectionDown = function() {
            var t = e(".ms-left .ms-section.active").next(".ms-section");
            !t.length && s.loopBottom && (t = e(".ms-left .ms-section").first()), t.length && f(t)
        }, B.moveTo = function(t) {
            var n = "";
            n = isNaN(t) ? e('.ms-left [data-anchor="' + t + '"]') : e(".ms-left .ms-section").eq(t - 1), f(n)
        }, B.setKeyboardScrolling = function(e) {
            s.keyboardScrolling = e
        }, B.setMouseWheelScrolling = function(e) {
            e ? u() : d()
        }, B.setScrollingSpeed = function(e) {
            s.scrollingSpeed = e
        };
        var W = 0,
            K = 0,
            N = 0,
            O = 0;
        B.destroy = function() {
            B.setKeyboardScrolling(!1), B.setMouseWheelScrolling(!1), e(t).off("hashchange", a).off("resize", c), e(n).off("mouseenter", "#multiscroll-nav li").off("mouseleave", "#multiscroll-nav li").off("click", "#multiscroll-nav a")
        }, B.build = function() {
            B.setKeyboardScrolling(!0), B.setMouseWheelScrolling(!0), e(t).on("hashchange", a).on("resize", c), e(n).on("mouseenter", "#multiscroll-nav li").on("mouseleave", "#multiscroll-nav li").on("click", "#multiscroll-nav a")
        }
    }
}(jQuery, window, document, Math);

/*!
 * Sayen Fancy Text 
 */
! function(a, b) {
    var c = function(a, c) {
        var d = this;
        d.el = a, d.$el = b(a), d.options = c, d.$el.append('<span class="sy-w-container"></span>'), d.$ctn = b(this.$el.children(".sy-w-container")), d.$wc = "", d.reverse = !1, d.i = d.c = 0, d.acWord = ""
    };
    c.prototype = {
        defaults: {
            holdTime: 500,
            typeSpeed: 80,
            cursor: !0,
            words: {
                content: ""
            },
            typing: !1,
            typeAnimation: "fade"
        },
        init: function() {
            var a = this;
            return a.cf = b.extend({}, a.defaults, a.options), a.cf.cursor === !0 && (a.$el.append('<span class="cursor">|</span>'), a.$cursor = b(this.$el.children(".cursor")), setInterval(function() {
                a.$cursor.fadeOut(300, function() {
                    a.$cursor.fadeIn(300)
                })
            }, 620)), 1 == a.cf.typing ? (a.$ctn.attr({
                "data-style": a.cf.typeAnimation
            }), a.fancyTextTyping()) : (a.$ctn.html('<span class="sy-wc" data-sit="hidden" data-word=""></span>'), a.$wc = a.$ctn.children(".sy-wc"), a.fancyText()), a
        },
        fancyText: function() {
            var a = this,
                b = a.cf.words[a.i];
            a.changeWord(b);
            var c = setTimeout(function() {
                a.$wc.attr("data-sit", "hidden"), a.i += 1, a.i < a.cf.words.length && a.changeWord(b), a.i >= a.cf.words.length && (clearInterval(c), a.i = 0), a.fancyText()
            }, a.cf.holdTime)
        },
        changeWord: function(a) {
            var b = this;
            b.$wc.attr("data-sit", "hidden");
            var c = setTimeout(function() {
                b.$wc.css({
                    color: a.color
                }).html(a.content).attr({
                    "data-sit": "way",
                    "data-word": a.content
                });
                var d = setTimeout(function() {
                    b.$wc.attr({
                        "data-sit": "shown"
                    }), clearInterval(d)
                }, 200);
                clearInterval(c)
            }, 200)
        },
        fancyTextTyping: function() {
            var a = this,
                c = a.cf.words[a.i],
                d = c.content.split("");
            if (a.$ctn.css({
                    color: c.color
                }), !a.reverse) var e = setTimeout(function() {
                if (a.c < d.length) {
                    var c = d[a.c];
                    "" == b.trim(d[a.c]) && (c = "&nbsp;"), a.$ctn.append('<span class="sy-c" data-at="false">' + c + "</span>");
                    var e = setTimeout(function() {
                        a.$ctn.children(".sy-c").attr({
                            "data-at": "true"
                        }), clearInterval(e)
                    }, 50);
                    a.fancyTextTyping(), a.c += 1
                }
            }, a.cf.typeSpeed);
            a.c + 1 == d.length && (a.i + 1 == a.cf.words.length ? a.i = 0 : a.i += 1, clearInterval(e), setTimeout(function() {
                a.acWord = c.content, a.fancyCharReverse()
            }, a.cf.holdTime))
        },
        fancyCharReverse: function() {
            var a = this,
                b = setTimeout(function() {
                    0 != a.acWord.length ? (a.acWord = a.acWord.slice(0, -1), a.$ctn.html(a.acWord), a.fancyCharReverse()) : (clearInterval(b), a.c = 0, a.fancyTextTyping())
                }, 80)
        }
    }, c.defaults = c.prototype.defaults, b.fn.sayenft = function(a) {
        return this.each(function() {
            new c(this, a).init()
        })
    }, a.sayenft = c
}(window, jQuery);

//Slick Slider
! function(a) {
    "use strict";
    "function" == typeof define && define.amd ? define(["jquery"], a) : "undefined" != typeof exports ? module.exports = a(require("jquery")) : a(jQuery)
}(function(a) {
    "use strict";
    var b = window.Slick || {};
    b = function() {
        function c(c, d) {
            var f, e = this;
            e.defaults = {
                accessibility: !0,
                adaptiveHeight: !1,
                appendArrows: a(c),
                appendDots: a(c),
                arrows: !0,
                asNavFor: null,
                prevArrow: '<button type="button" data-role="none" class="slick-prev" aria-label="Previous" tabindex="0" role="button">Previous</button>',
                nextArrow: '<button type="button" data-role="none" class="slick-next" aria-label="Next" tabindex="0" role="button">Next</button>',
                autoplay: !1,
                autoplaySpeed: 3e3,
                centerMode: !1,
                centerPadding: "50px",
                cssEase: "ease",
                customPaging: function(b, c) {
                    return a('<button type="button" data-role="none" role="button" tabindex="0" />').text(c + 1)
                },
                dots: !1,
                dotsClass: "slick-dots",
                draggable: !0,
                easing: "linear",
                edgeFriction: .35,
                fade: !1,
                focusOnSelect: !1,
                infinite: !0,
                initialSlide: 0,
                lazyLoad: "ondemand",
                mobileFirst: !1,
                pauseOnHover: !0,
                pauseOnFocus: !0,
                pauseOnDotsHover: !1,
                respondTo: "window",
                responsive: null,
                rows: 1,
                rtl: !1,
                slide: "",
                slidesPerRow: 1,
                slidesToShow: 1,
                slidesToScroll: 1,
                speed: 500,
                swipe: !0,
                swipeToSlide: !1,
                touchMove: !0,
                touchThreshold: 5,
                useCSS: !0,
                useTransform: !0,
                variableWidth: !1,
                vertical: !1,
                verticalSwiping: !1,
                waitForAnimate: !0,
                zIndex: 1e3
            }, e.initials = {
                animating: !1,
                dragging: !1,
                autoPlayTimer: null,
                currentDirection: 0,
                currentLeft: null,
                currentSlide: 0,
                direction: 1,
                $dots: null,
                listWidth: null,
                listHeight: null,
                loadIndex: 0,
                $nextArrow: null,
                $prevArrow: null,
                slideCount: null,
                slideWidth: null,
                $slideTrack: null,
                $slides: null,
                sliding: !1,
                slideOffset: 0,
                swipeLeft: null,
                $list: null,
                touchObject: {},
                transformsEnabled: !1,
                unslicked: !1
            }, a.extend(e, e.initials), e.activeBreakpoint = null, e.animType = null, e.animProp = null, e.breakpoints = [], e.breakpointSettings = [], e.cssTransitions = !1, e.focussed = !1, e.interrupted = !1, e.hidden = "hidden", e.paused = !0, e.positionProp = null, e.respondTo = null, e.rowCount = 1, e.shouldClick = !0, e.$slider = a(c), e.$slidesCache = null, e.transformType = null, e.transitionType = null, e.visibilityChange = "visibilitychange", e.windowWidth = 0, e.windowTimer = null, f = a(c).data("slick") || {}, e.options = a.extend({}, e.defaults, d, f), e.currentSlide = e.options.initialSlide, e.originalSettings = e.options, "undefined" != typeof document.mozHidden ? (e.hidden = "mozHidden", e.visibilityChange = "mozvisibilitychange") : "undefined" != typeof document.webkitHidden && (e.hidden = "webkitHidden", e.visibilityChange = "webkitvisibilitychange"), e.autoPlay = a.proxy(e.autoPlay, e), e.autoPlayClear = a.proxy(e.autoPlayClear, e), e.autoPlayIterator = a.proxy(e.autoPlayIterator, e), e.changeSlide = a.proxy(e.changeSlide, e), e.clickHandler = a.proxy(e.clickHandler, e), e.selectHandler = a.proxy(e.selectHandler, e), e.setPosition = a.proxy(e.setPosition, e), e.swipeHandler = a.proxy(e.swipeHandler, e), e.dragHandler = a.proxy(e.dragHandler, e), e.keyHandler = a.proxy(e.keyHandler, e), e.instanceUid = b++, e.htmlExpr = /^(?:\s*(<[\w\W]+>)[^>]*)$/, e.registerBreakpoints(), e.init(!0)
        }
        var b = 0;
        return c
    }(), b.prototype.activateADA = function() {
        var a = this;
        a.$slideTrack.find(".slick-active").attr({
            "aria-hidden": "false"
        }).find("a, input, button, select").attr({
            tabindex: "0"
        })
    }, b.prototype.addSlide = b.prototype.slickAdd = function(b, c, d) {
        var e = this;
        if ("boolean" == typeof c) d = c, c = null;
        else if (0 > c || c >= e.slideCount) return !1;
        e.unload(), "number" == typeof c ? 0 === c && 0 === e.$slides.length ? a(b).appendTo(e.$slideTrack) : d ? a(b).insertBefore(e.$slides.eq(c)) : a(b).insertAfter(e.$slides.eq(c)) : d === !0 ? a(b).prependTo(e.$slideTrack) : a(b).appendTo(e.$slideTrack), e.$slides = e.$slideTrack.children(this.options.slide), e.$slideTrack.children(this.options.slide).detach(), e.$slideTrack.append(e.$slides), e.$slides.each(function(b, c) {
            a(c).attr("data-slick-index", b)
        }), e.$slidesCache = e.$slides, e.reinit()
    }, b.prototype.animateHeight = function() {
        var a = this;
        if (1 === a.options.slidesToShow && a.options.adaptiveHeight === !0 && a.options.vertical === !1) {
            var b = a.$slides.eq(a.currentSlide).outerHeight(!0);
            a.$list.animate({
                height: b
            }, a.options.speed)
        }
    }, b.prototype.animateSlide = function(b, c) {
        var d = {},
            e = this;
        e.animateHeight(), e.options.rtl === !0 && e.options.vertical === !1 && (b = -b), e.transformsEnabled === !1 ? e.options.vertical === !1 ? e.$slideTrack.animate({
            left: b
        }, e.options.speed, e.options.easing, c) : e.$slideTrack.animate({
            top: b
        }, e.options.speed, e.options.easing, c) : e.cssTransitions === !1 ? (e.options.rtl === !0 && (e.currentLeft = -e.currentLeft), a({
            animStart: e.currentLeft
        }).animate({
            animStart: b
        }, {
            duration: e.options.speed,
            easing: e.options.easing,
            step: function(a) {
                a = Math.ceil(a), e.options.vertical === !1 ? (d[e.animType] = "translate(" + a + "px, 0px)", e.$slideTrack.css(d)) : (d[e.animType] = "translate(0px," + a + "px)", e.$slideTrack.css(d))
            },
            complete: function() {
                c && c.call()
            }
        })) : (e.applyTransition(), b = Math.ceil(b), e.options.vertical === !1 ? d[e.animType] = "translate3d(" + b + "px, 0px, 0px)" : d[e.animType] = "translate3d(0px," + b + "px, 0px)", e.$slideTrack.css(d), c && setTimeout(function() {
            e.disableTransition(), c.call()
        }, e.options.speed))
    }, b.prototype.getNavTarget = function() {
        var b = this,
            c = b.options.asNavFor;
        return c && null !== c && (c = a(c).not(b.$slider)), c
    }, b.prototype.asNavFor = function(b) {
        var c = this,
            d = c.getNavTarget();
        null !== d && "object" == typeof d && d.each(function() {
            var c = a(this).slick("getSlick");
            c.unslicked || c.slideHandler(b, !0)
        })
    }, b.prototype.applyTransition = function(a) {
        var b = this,
            c = {};
        b.options.fade === !1 ? c[b.transitionType] = b.transformType + " " + b.options.speed + "ms " + b.options.cssEase : c[b.transitionType] = "opacity " + b.options.speed + "ms " + b.options.cssEase, b.options.fade === !1 ? b.$slideTrack.css(c) : b.$slides.eq(a).css(c)
    }, b.prototype.autoPlay = function() {
        var a = this;
        a.autoPlayClear(), a.slideCount > a.options.slidesToShow && (a.autoPlayTimer = setInterval(a.autoPlayIterator, a.options.autoplaySpeed))
    }, b.prototype.autoPlayClear = function() {
        var a = this;
        a.autoPlayTimer && clearInterval(a.autoPlayTimer)
    }, b.prototype.autoPlayIterator = function() {
        var a = this,
            b = a.currentSlide + a.options.slidesToScroll;
        a.paused || a.interrupted || a.focussed || (a.options.infinite === !1 && (1 === a.direction && a.currentSlide + 1 === a.slideCount - 1 ? a.direction = 0 : 0 === a.direction && (b = a.currentSlide - a.options.slidesToScroll, a.currentSlide - 1 === 0 && (a.direction = 1))), a.slideHandler(b))
    }, b.prototype.buildArrows = function() {
        var b = this;
        b.options.arrows === !0 && (b.$prevArrow = a(b.options.prevArrow).addClass("slick-arrow"), b.$nextArrow = a(b.options.nextArrow).addClass("slick-arrow"), b.slideCount > b.options.slidesToShow ? (b.$prevArrow.removeClass("slick-hidden").removeAttr("aria-hidden tabindex"), b.$nextArrow.removeClass("slick-hidden").removeAttr("aria-hidden tabindex"), b.htmlExpr.test(b.options.prevArrow) && b.$prevArrow.prependTo(b.options.appendArrows), b.htmlExpr.test(b.options.nextArrow) && b.$nextArrow.appendTo(b.options.appendArrows), b.options.infinite !== !0 && b.$prevArrow.addClass("slick-disabled").attr("aria-disabled", "true")) : b.$prevArrow.add(b.$nextArrow).addClass("slick-hidden").attr({
            "aria-disabled": "true",
            tabindex: "-1"
        }))
    }, b.prototype.buildDots = function() {
        var c, d, b = this;
        if (b.options.dots === !0 && b.slideCount > b.options.slidesToShow) {
            for (b.$slider.addClass("slick-dotted"), d = a("<ul />").addClass(b.options.dotsClass), c = 0; c <= b.getDotCount(); c += 1) d.append(a("<li />").append(b.options.customPaging.call(this, b, c)));
            b.$dots = d.appendTo(b.options.appendDots), b.$dots.find("li").first().addClass("slick-active").attr("aria-hidden", "false")
        }
    }, b.prototype.buildOut = function() {
        var b = this;
        b.$slides = b.$slider.children(b.options.slide + ":not(.slick-cloned)").addClass("slick-slide"), b.slideCount = b.$slides.length, b.$slides.each(function(b, c) {
            a(c).attr("data-slick-index", b).data("originalStyling", a(c).attr("style") || "")
        }), b.$slider.addClass("slick-slider"), b.$slideTrack = 0 === b.slideCount ? a('<div class="slick-track"/>').appendTo(b.$slider) : b.$slides.wrapAll('<div class="slick-track"/>').parent(), b.$list = b.$slideTrack.wrap('<div aria-live="polite" class="slick-list"/>').parent(), b.$slideTrack.css("opacity", 0), (b.options.centerMode === !0 || b.options.swipeToSlide === !0) && (b.options.slidesToScroll = 1), a("img[data-lazy]", b.$slider).not("[src]").addClass("slick-loading"), b.setupInfinite(), b.buildArrows(), b.buildDots(), b.updateDots(), b.setSlideClasses("number" == typeof b.currentSlide ? b.currentSlide : 0), b.options.draggable === !0 && b.$list.addClass("draggable")
    }, b.prototype.buildRows = function() {
        var b, c, d, e, f, g, h, a = this;
        if (e = document.createDocumentFragment(), g = a.$slider.children(), a.options.rows > 1) {
            for (h = a.options.slidesPerRow * a.options.rows, f = Math.ceil(g.length / h), b = 0; f > b; b++) {
                var i = document.createElement("div");
                for (c = 0; c < a.options.rows; c++) {
                    var j = document.createElement("div");
                    for (d = 0; d < a.options.slidesPerRow; d++) {
                        var k = b * h + (c * a.options.slidesPerRow + d);
                        g.get(k) && j.appendChild(g.get(k))
                    }
                    i.appendChild(j)
                }
                e.appendChild(i)
            }
            a.$slider.empty().append(e), a.$slider.children().children().children().css({
                width: 100 / a.options.slidesPerRow + "%",
                display: "inline-block"
            })
        }
    }, b.prototype.checkResponsive = function(b, c) {
        var e, f, g, d = this,
            h = !1,
            i = d.$slider.width(),
            j = window.innerWidth || a(window).width();
        if ("window" === d.respondTo ? g = j : "slider" === d.respondTo ? g = i : "min" === d.respondTo && (g = Math.min(j, i)), d.options.responsive && d.options.responsive.length && null !== d.options.responsive) {
            f = null;
            for (e in d.breakpoints) d.breakpoints.hasOwnProperty(e) && (d.originalSettings.mobileFirst === !1 ? g < d.breakpoints[e] && (f = d.breakpoints[e]) : g > d.breakpoints[e] && (f = d.breakpoints[e]));
            null !== f ? null !== d.activeBreakpoint ? (f !== d.activeBreakpoint || c) && (d.activeBreakpoint = f, "unslick" === d.breakpointSettings[f] ? d.unslick(f) : (d.options = a.extend({}, d.originalSettings, d.breakpointSettings[f]), b === !0 && (d.currentSlide = d.options.initialSlide), d.refresh(b)), h = f) : (d.activeBreakpoint = f, "unslick" === d.breakpointSettings[f] ? d.unslick(f) : (d.options = a.extend({}, d.originalSettings, d.breakpointSettings[f]), b === !0 && (d.currentSlide = d.options.initialSlide), d.refresh(b)), h = f) : null !== d.activeBreakpoint && (d.activeBreakpoint = null, d.options = d.originalSettings, b === !0 && (d.currentSlide = d.options.initialSlide), d.refresh(b), h = f), b || h === !1 || d.$slider.trigger("breakpoint", [d, h])
        }
    }, b.prototype.changeSlide = function(b, c) {
        var f, g, h, d = this,
            e = a(b.currentTarget);
        switch (e.is("a") && b.preventDefault(), e.is("li") || (e = e.closest("li")), h = d.slideCount % d.options.slidesToScroll !== 0, f = h ? 0 : (d.slideCount - d.currentSlide) % d.options.slidesToScroll, b.data.message) {
            case "previous":
                g = 0 === f ? d.options.slidesToScroll : d.options.slidesToShow - f, d.slideCount > d.options.slidesToShow && d.slideHandler(d.currentSlide - g, !1, c);
                break;
            case "next":
                g = 0 === f ? d.options.slidesToScroll : f, d.slideCount > d.options.slidesToShow && d.slideHandler(d.currentSlide + g, !1, c);
                break;
            case "index":
                var i = 0 === b.data.index ? 0 : b.data.index || e.index() * d.options.slidesToScroll;
                d.slideHandler(d.checkNavigable(i), !1, c), e.children().trigger("focus");
                break;
            default:
                return
        }
    }, b.prototype.checkNavigable = function(a) {
        var c, d, b = this;
        if (c = b.getNavigableIndexes(), d = 0, a > c[c.length - 1]) a = c[c.length - 1];
        else
            for (var e in c) {
                if (a < c[e]) {
                    a = d;
                    break
                }
                d = c[e]
            }
        return a
    }, b.prototype.cleanUpEvents = function() {
        var b = this;
        b.options.dots && null !== b.$dots && a("li", b.$dots).off("click.slick", b.changeSlide).off("mouseenter.slick", a.proxy(b.interrupt, b, !0)).off("mouseleave.slick", a.proxy(b.interrupt, b, !1)), b.$slider.off("focus.slick blur.slick"), b.options.arrows === !0 && b.slideCount > b.options.slidesToShow && (b.$prevArrow && b.$prevArrow.off("click.slick", b.changeSlide), b.$nextArrow && b.$nextArrow.off("click.slick", b.changeSlide)), b.$list.off("touchstart.slick mousedown.slick", b.swipeHandler), b.$list.off("touchmove.slick mousemove.slick", b.swipeHandler), b.$list.off("touchend.slick mouseup.slick", b.swipeHandler), b.$list.off("touchcancel.slick mouseleave.slick", b.swipeHandler), b.$list.off("click.slick", b.clickHandler), a(document).off(b.visibilityChange, b.visibility), b.cleanUpSlideEvents(), b.options.accessibility === !0 && b.$list.off("keydown.slick", b.keyHandler), b.options.focusOnSelect === !0 && a(b.$slideTrack).children().off("click.slick", b.selectHandler), a(window).off("orientationchange.slick.slick-" + b.instanceUid, b.orientationChange), a(window).off("resize.slick.slick-" + b.instanceUid, b.resize), a("[draggable!=true]", b.$slideTrack).off("dragstart", b.preventDefault), a(window).off("load.slick.slick-" + b.instanceUid, b.setPosition), a(document).off("ready.slick.slick-" + b.instanceUid, b.setPosition)
    }, b.prototype.cleanUpSlideEvents = function() {
        var b = this;
        b.$list.off("mouseenter.slick", a.proxy(b.interrupt, b, !0)), b.$list.off("mouseleave.slick", a.proxy(b.interrupt, b, !1))
    }, b.prototype.cleanUpRows = function() {
        var b, a = this;
        a.options.rows > 1 && (b = a.$slides.children().children(), b.removeAttr("style"), a.$slider.empty().append(b))
    }, b.prototype.clickHandler = function(a) {
        var b = this;
        b.shouldClick === !1 && (a.stopImmediatePropagation(), a.stopPropagation(), a.preventDefault())
    }, b.prototype.destroy = function(b) {
        var c = this;
        c.autoPlayClear(), c.touchObject = {}, c.cleanUpEvents(), a(".slick-cloned", c.$slider).detach(), c.$dots && c.$dots.remove(), c.$prevArrow && c.$prevArrow.length && (c.$prevArrow.removeClass("slick-disabled slick-arrow slick-hidden").removeAttr("aria-hidden aria-disabled tabindex").css("display", ""), c.htmlExpr.test(c.options.prevArrow) && c.$prevArrow.remove()), c.$nextArrow && c.$nextArrow.length && (c.$nextArrow.removeClass("slick-disabled slick-arrow slick-hidden").removeAttr("aria-hidden aria-disabled tabindex").css("display", ""), c.htmlExpr.test(c.options.nextArrow) && c.$nextArrow.remove()), c.$slides && (c.$slides.removeClass("slick-slide slick-active slick-center slick-visible slick-current").removeAttr("aria-hidden").removeAttr("data-slick-index").each(function() {
            a(this).attr("style", a(this).data("originalStyling"))
        }), c.$slideTrack.children(this.options.slide).detach(), c.$slideTrack.detach(), c.$list.detach(), c.$slider.append(c.$slides)), c.cleanUpRows(), c.$slider.removeClass("slick-slider"), c.$slider.removeClass("slick-initialized"), c.$slider.removeClass("slick-dotted"), c.unslicked = !0, b || c.$slider.trigger("destroy", [c])
    }, b.prototype.disableTransition = function(a) {
        var b = this,
            c = {};
        c[b.transitionType] = "", b.options.fade === !1 ? b.$slideTrack.css(c) : b.$slides.eq(a).css(c)
    }, b.prototype.fadeSlide = function(a, b) {
        var c = this;
        c.cssTransitions === !1 ? (c.$slides.eq(a).css({
            zIndex: c.options.zIndex
        }), c.$slides.eq(a).animate({
            opacity: 1
        }, c.options.speed, c.options.easing, b)) : (c.applyTransition(a), c.$slides.eq(a).css({
            opacity: 1,
            zIndex: c.options.zIndex
        }), b && setTimeout(function() {
            c.disableTransition(a), b.call()
        }, c.options.speed))
    }, b.prototype.fadeSlideOut = function(a) {
        var b = this;
        b.cssTransitions === !1 ? b.$slides.eq(a).animate({
            opacity: 0,
            zIndex: b.options.zIndex - 2
        }, b.options.speed, b.options.easing) : (b.applyTransition(a), b.$slides.eq(a).css({
            opacity: 0,
            zIndex: b.options.zIndex - 2
        }))
    }, b.prototype.filterSlides = b.prototype.slickFilter = function(a) {
        var b = this;
        null !== a && (b.$slidesCache = b.$slides, b.unload(), b.$slideTrack.children(this.options.slide).detach(), b.$slidesCache.filter(a).appendTo(b.$slideTrack), b.reinit())
    }, b.prototype.focusHandler = function() {
        var b = this;
        b.$slider.off("focus.slick blur.slick").on("focus.slick blur.slick", "*:not(.slick-arrow)", function(c) {
            c.stopImmediatePropagation();
            var d = a(this);
            setTimeout(function() {
                b.options.pauseOnFocus && (b.focussed = d.is(":focus"), b.autoPlay())
            }, 0)
        })
    }, b.prototype.getCurrent = b.prototype.slickCurrentSlide = function() {
        var a = this;
        return a.currentSlide
    }, b.prototype.getDotCount = function() {
        var a = this,
            b = 0,
            c = 0,
            d = 0;
        if (a.options.infinite === !0)
            for (; b < a.slideCount;) ++d, b = c + a.options.slidesToScroll, c += a.options.slidesToScroll <= a.options.slidesToShow ? a.options.slidesToScroll : a.options.slidesToShow;
        else if (a.options.centerMode === !0) d = a.slideCount;
        else if (a.options.asNavFor)
            for (; b < a.slideCount;) ++d, b = c + a.options.slidesToScroll, c += a.options.slidesToScroll <= a.options.slidesToShow ? a.options.slidesToScroll : a.options.slidesToShow;
        else d = 1 + Math.ceil((a.slideCount - a.options.slidesToShow) / a.options.slidesToScroll);
        return d - 1
    }, b.prototype.getLeft = function(a) {
        var c, d, f, b = this,
            e = 0;
        return b.slideOffset = 0, d = b.$slides.first().outerHeight(!0), b.options.infinite === !0 ? (b.slideCount > b.options.slidesToShow && (b.slideOffset = b.slideWidth * b.options.slidesToShow * -1, e = d * b.options.slidesToShow * -1), b.slideCount % b.options.slidesToScroll !== 0 && a + b.options.slidesToScroll > b.slideCount && b.slideCount > b.options.slidesToShow && (a > b.slideCount ? (b.slideOffset = (b.options.slidesToShow - (a - b.slideCount)) * b.slideWidth * -1, e = (b.options.slidesToShow - (a - b.slideCount)) * d * -1) : (b.slideOffset = b.slideCount % b.options.slidesToScroll * b.slideWidth * -1, e = b.slideCount % b.options.slidesToScroll * d * -1))) : a + b.options.slidesToShow > b.slideCount && (b.slideOffset = (a + b.options.slidesToShow - b.slideCount) * b.slideWidth, e = (a + b.options.slidesToShow - b.slideCount) * d), b.slideCount <= b.options.slidesToShow && (b.slideOffset = 0, e = 0), b.options.centerMode === !0 && b.options.infinite === !0 ? b.slideOffset += b.slideWidth * Math.floor(b.options.slidesToShow / 2) - b.slideWidth : b.options.centerMode === !0 && (b.slideOffset = 0, b.slideOffset += b.slideWidth * Math.floor(b.options.slidesToShow / 2)), c = b.options.vertical === !1 ? a * b.slideWidth * -1 + b.slideOffset : a * d * -1 + e, b.options.variableWidth === !0 && (f = b.slideCount <= b.options.slidesToShow || b.options.infinite === !1 ? b.$slideTrack.children(".slick-slide").eq(a) : b.$slideTrack.children(".slick-slide").eq(a + b.options.slidesToShow), c = b.options.rtl === !0 ? f[0] ? -1 * (b.$slideTrack.width() - f[0].offsetLeft - f.width()) : 0 : f[0] ? -1 * f[0].offsetLeft : 0, b.options.centerMode === !0 && (f = b.slideCount <= b.options.slidesToShow || b.options.infinite === !1 ? b.$slideTrack.children(".slick-slide").eq(a) : b.$slideTrack.children(".slick-slide").eq(a + b.options.slidesToShow + 1), c = b.options.rtl === !0 ? f[0] ? -1 * (b.$slideTrack.width() - f[0].offsetLeft - f.width()) : 0 : f[0] ? -1 * f[0].offsetLeft : 0, c += (b.$list.width() - f.outerWidth()) / 2)), c
    }, b.prototype.getOption = b.prototype.slickGetOption = function(a) {
        var b = this;
        return b.options[a]
    }, b.prototype.getNavigableIndexes = function() {
        var e, a = this,
            b = 0,
            c = 0,
            d = [];
        for (a.options.infinite === !1 ? e = a.slideCount : (b = -1 * a.options.slidesToScroll, c = -1 * a.options.slidesToScroll, e = 2 * a.slideCount); e > b;) d.push(b), b = c + a.options.slidesToScroll, c += a.options.slidesToScroll <= a.options.slidesToShow ? a.options.slidesToScroll : a.options.slidesToShow;
        return d
    }, b.prototype.getSlick = function() {
        return this
    }, b.prototype.getSlideCount = function() {
        var c, d, e, b = this;
        return e = b.options.centerMode === !0 ? b.slideWidth * Math.floor(b.options.slidesToShow / 2) : 0, b.options.swipeToSlide === !0 ? (b.$slideTrack.find(".slick-slide").each(function(c, f) {
            return f.offsetLeft - e + a(f).outerWidth() / 2 > -1 * b.swipeLeft ? (d = f, !1) : void 0
        }), c = Math.abs(a(d).attr("data-slick-index") - b.currentSlide) || 1) : b.options.slidesToScroll
    }, b.prototype.goTo = b.prototype.slickGoTo = function(a, b) {
        var c = this;
        c.changeSlide({
            data: {
                message: "index",
                index: parseInt(a)
            }
        }, b)
    }, b.prototype.init = function(b) {
        var c = this;
        a(c.$slider).hasClass("slick-initialized") || (a(c.$slider).addClass("slick-initialized"), c.buildRows(), c.buildOut(), c.setProps(), c.startLoad(), c.loadSlider(), c.initializeEvents(), c.updateArrows(), c.updateDots(), c.checkResponsive(!0), c.focusHandler()), b && c.$slider.trigger("init", [c]), c.options.accessibility === !0 && c.initADA(), c.options.autoplay && (c.paused = !1, c.autoPlay())
    }, b.prototype.initADA = function() {
        var b = this;
        b.$slides.add(b.$slideTrack.find(".slick-cloned")).attr({
            "aria-hidden": "true",
            tabindex: "-1"
        }).find("a, input, button, select").attr({
            tabindex: "-1"
        }), b.$slideTrack.attr("role", "listbox"), b.$slides.not(b.$slideTrack.find(".slick-cloned")).each(function(c) {
            a(this).attr({
                role: "option",
                "aria-describedby": "slick-slide" + b.instanceUid + c
            })
        }), null !== b.$dots && b.$dots.attr("role", "tablist").find("li").each(function(c) {
            a(this).attr({
                role: "presentation",
                "aria-selected": "false",
                "aria-controls": "navigation" + b.instanceUid + c,
                id: "slick-slide" + b.instanceUid + c
            })
        }).first().attr("aria-selected", "true").end().find("button").attr("role", "button").end().closest("div").attr("role", "toolbar"), b.activateADA()
    }, b.prototype.initArrowEvents = function() {
        var a = this;
        a.options.arrows === !0 && a.slideCount > a.options.slidesToShow && (a.$prevArrow.off("click.slick").on("click.slick", {
            message: "previous"
        }, a.changeSlide), a.$nextArrow.off("click.slick").on("click.slick", {
            message: "next"
        }, a.changeSlide))
    }, b.prototype.initDotEvents = function() {
        var b = this;
        b.options.dots === !0 && b.slideCount > b.options.slidesToShow && a("li", b.$dots).on("click.slick", {
            message: "index"
        }, b.changeSlide), b.options.dots === !0 && b.options.pauseOnDotsHover === !0 && a("li", b.$dots).on("mouseenter.slick", a.proxy(b.interrupt, b, !0)).on("mouseleave.slick", a.proxy(b.interrupt, b, !1))
    }, b.prototype.initSlideEvents = function() {
        var b = this;
        b.options.pauseOnHover && (b.$list.on("mouseenter.slick", a.proxy(b.interrupt, b, !0)), b.$list.on("mouseleave.slick", a.proxy(b.interrupt, b, !1)))
    }, b.prototype.initializeEvents = function() {
        var b = this;
        b.initArrowEvents(), b.initDotEvents(), b.initSlideEvents(), b.$list.on("touchstart.slick mousedown.slick", {
            action: "start"
        }, b.swipeHandler), b.$list.on("touchmove.slick mousemove.slick", {
            action: "move"
        }, b.swipeHandler), b.$list.on("touchend.slick mouseup.slick", {
            action: "end"
        }, b.swipeHandler), b.$list.on("touchcancel.slick mouseleave.slick", {
            action: "end"
        }, b.swipeHandler), b.$list.on("click.slick", b.clickHandler), a(document).on(b.visibilityChange, a.proxy(b.visibility, b)), b.options.accessibility === !0 && b.$list.on("keydown.slick", b.keyHandler), b.options.focusOnSelect === !0 && a(b.$slideTrack).children().on("click.slick", b.selectHandler), a(window).on("orientationchange.slick.slick-" + b.instanceUid, a.proxy(b.orientationChange, b)), a(window).on("resize.slick.slick-" + b.instanceUid, a.proxy(b.resize, b)), a("[draggable!=true]", b.$slideTrack).on("dragstart", b.preventDefault), a(window).on("load.slick.slick-" + b.instanceUid, b.setPosition), a(document).on("ready.slick.slick-" + b.instanceUid, b.setPosition)
    }, b.prototype.initUI = function() {
        var a = this;
        a.options.arrows === !0 && a.slideCount > a.options.slidesToShow && (a.$prevArrow.show(), a.$nextArrow.show()), a.options.dots === !0 && a.slideCount > a.options.slidesToShow && a.$dots.show()
    }, b.prototype.keyHandler = function(a) {
        var b = this;
        a.target.tagName.match("TEXTAREA|INPUT|SELECT") || (37 === a.keyCode && b.options.accessibility === !0 ? b.changeSlide({
            data: {
                message: b.options.rtl === !0 ? "next" : "previous"
            }
        }) : 39 === a.keyCode && b.options.accessibility === !0 && b.changeSlide({
            data: {
                message: b.options.rtl === !0 ? "previous" : "next"
            }
        }))
    }, b.prototype.lazyLoad = function() {
        function g(c) {
            a("img[data-lazy]", c).each(function() {
                var c = a(this),
                    d = a(this).attr("data-lazy"),
                    e = document.createElement("img");
                e.onload = function() {
                    c.animate({
                        opacity: 0
                    }, 100, function() {
                        c.attr("src", d).animate({
                            opacity: 1
                        }, 200, function() {
                            c.removeAttr("data-lazy").removeClass("slick-loading")
                        }), b.$slider.trigger("lazyLoaded", [b, c, d])
                    })
                }, e.onerror = function() {
                    c.removeAttr("data-lazy").removeClass("slick-loading").addClass("slick-lazyload-error"), b.$slider.trigger("lazyLoadError", [b, c, d])
                }, e.src = d
            })
        }
        var c, d, e, f, b = this;
        b.options.centerMode === !0 ? b.options.infinite === !0 ? (e = b.currentSlide + (b.options.slidesToShow / 2 + 1), f = e + b.options.slidesToShow + 2) : (e = Math.max(0, b.currentSlide - (b.options.slidesToShow / 2 + 1)), f = 2 + (b.options.slidesToShow / 2 + 1) + b.currentSlide) : (e = b.options.infinite ? b.options.slidesToShow + b.currentSlide : b.currentSlide, f = Math.ceil(e + b.options.slidesToShow), b.options.fade === !0 && (e > 0 && e--, f <= b.slideCount && f++)), c = b.$slider.find(".slick-slide").slice(e, f), g(c), b.slideCount <= b.options.slidesToShow ? (d = b.$slider.find(".slick-slide"), g(d)) : b.currentSlide >= b.slideCount - b.options.slidesToShow ? (d = b.$slider.find(".slick-cloned").slice(0, b.options.slidesToShow), g(d)) : 0 === b.currentSlide && (d = b.$slider.find(".slick-cloned").slice(-1 * b.options.slidesToShow), g(d))
    }, b.prototype.loadSlider = function() {
        var a = this;
        a.setPosition(), a.$slideTrack.css({
            opacity: 1
        }), a.$slider.removeClass("slick-loading"), a.initUI(), "progressive" === a.options.lazyLoad && a.progressiveLazyLoad()
    }, b.prototype.next = b.prototype.slickNext = function() {
        var a = this;
        a.changeSlide({
            data: {
                message: "next"
            }
        })
    }, b.prototype.orientationChange = function() {
        var a = this;
        a.checkResponsive(), a.setPosition()
    }, b.prototype.pause = b.prototype.slickPause = function() {
        var a = this;
        a.autoPlayClear(), a.paused = !0
    }, b.prototype.play = b.prototype.slickPlay = function() {
        var a = this;
        a.autoPlay(), a.options.autoplay = !0, a.paused = !1, a.focussed = !1, a.interrupted = !1
    }, b.prototype.postSlide = function(a) {
        var b = this;
        b.unslicked || (b.$slider.trigger("afterChange", [b, a]), b.animating = !1, b.setPosition(), b.swipeLeft = null, b.options.autoplay && b.autoPlay(), b.options.accessibility === !0 && b.initADA())
    }, b.prototype.prev = b.prototype.slickPrev = function() {
        var a = this;
        a.changeSlide({
            data: {
                message: "previous"
            }
        })
    }, b.prototype.preventDefault = function(a) {
        a.preventDefault()
    }, b.prototype.progressiveLazyLoad = function(b) {
        b = b || 1;
        var e, f, g, c = this,
            d = a("img[data-lazy]", c.$slider);
        d.length ? (e = d.first(), f = e.attr("data-lazy"), g = document.createElement("img"), g.onload = function() {
            e.attr("src", f).removeAttr("data-lazy").removeClass("slick-loading"), c.options.adaptiveHeight === !0 && c.setPosition(), c.$slider.trigger("lazyLoaded", [c, e, f]), c.progressiveLazyLoad()
        }, g.onerror = function() {
            3 > b ? setTimeout(function() {
                c.progressiveLazyLoad(b + 1)
            }, 500) : (e.removeAttr("data-lazy").removeClass("slick-loading").addClass("slick-lazyload-error"), c.$slider.trigger("lazyLoadError", [c, e, f]), c.progressiveLazyLoad())
        }, g.src = f) : c.$slider.trigger("allImagesLoaded", [c])
    }, b.prototype.refresh = function(b) {
        var d, e, c = this;
        e = c.slideCount - c.options.slidesToShow, !c.options.infinite && c.currentSlide > e && (c.currentSlide = e), c.slideCount <= c.options.slidesToShow && (c.currentSlide = 0), d = c.currentSlide, c.destroy(!0), a.extend(c, c.initials, {
            currentSlide: d
        }), c.init(), b || c.changeSlide({
            data: {
                message: "index",
                index: d
            }
        }, !1)
    }, b.prototype.registerBreakpoints = function() {
        var c, d, e, b = this,
            f = b.options.responsive || null;
        if ("array" === a.type(f) && f.length) {
            b.respondTo = b.options.respondTo || "window";
            for (c in f)
                if (e = b.breakpoints.length - 1, d = f[c].breakpoint, f.hasOwnProperty(c)) {
                    for (; e >= 0;) b.breakpoints[e] && b.breakpoints[e] === d && b.breakpoints.splice(e, 1), e--;
                    b.breakpoints.push(d), b.breakpointSettings[d] = f[c].settings
                }
            b.breakpoints.sort(function(a, c) {
                return b.options.mobileFirst ? a - c : c - a
            })
        }
    }, b.prototype.reinit = function() {
        var b = this;
        b.$slides = b.$slideTrack.children(b.options.slide).addClass("slick-slide"), b.slideCount = b.$slides.length, b.currentSlide >= b.slideCount && 0 !== b.currentSlide && (b.currentSlide = b.currentSlide - b.options.slidesToScroll), b.slideCount <= b.options.slidesToShow && (b.currentSlide = 0), b.registerBreakpoints(), b.setProps(), b.setupInfinite(), b.buildArrows(), b.updateArrows(), b.initArrowEvents(), b.buildDots(), b.updateDots(), b.initDotEvents(), b.cleanUpSlideEvents(), b.initSlideEvents(), b.checkResponsive(!1, !0), b.options.focusOnSelect === !0 && a(b.$slideTrack).children().on("click.slick", b.selectHandler), b.setSlideClasses("number" == typeof b.currentSlide ? b.currentSlide : 0), b.setPosition(), b.focusHandler(), b.paused = !b.options.autoplay, b.autoPlay(), b.$slider.trigger("reInit", [b])
    }, b.prototype.resize = function() {
        var b = this;
        a(window).width() !== b.windowWidth && (clearTimeout(b.windowDelay), b.windowDelay = window.setTimeout(function() {
            b.windowWidth = a(window).width(), b.checkResponsive(), b.unslicked || b.setPosition()
        }, 50))
    }, b.prototype.removeSlide = b.prototype.slickRemove = function(a, b, c) {
        var d = this;
        return "boolean" == typeof a ? (b = a, a = b === !0 ? 0 : d.slideCount - 1) : a = b === !0 ? --a : a, d.slideCount < 1 || 0 > a || a > d.slideCount - 1 ? !1 : (d.unload(), c === !0 ? d.$slideTrack.children().remove() : d.$slideTrack.children(this.options.slide).eq(a).remove(), d.$slides = d.$slideTrack.children(this.options.slide), d.$slideTrack.children(this.options.slide).detach(), d.$slideTrack.append(d.$slides), d.$slidesCache = d.$slides, void d.reinit())
    }, b.prototype.setCSS = function(a) {
        var d, e, b = this,
            c = {};
        b.options.rtl === !0 && (a = -a), d = "left" == b.positionProp ? Math.ceil(a) + "px" : "0px", e = "top" == b.positionProp ? Math.ceil(a) + "px" : "0px", c[b.positionProp] = a, b.transformsEnabled === !1 ? b.$slideTrack.css(c) : (c = {}, b.cssTransitions === !1 ? (c[b.animType] = "translate(" + d + ", " + e + ")", b.$slideTrack.css(c)) : (c[b.animType] = "translate3d(" + d + ", " + e + ", 0px)", b.$slideTrack.css(c)))
    }, b.prototype.setDimensions = function() {
        var a = this;
        a.options.vertical === !1 ? a.options.centerMode === !0 && a.$list.css({
            padding: "0px " + a.options.centerPadding
        }) : (a.$list.height(a.$slides.first().outerHeight(!0) * a.options.slidesToShow), a.options.centerMode === !0 && a.$list.css({
            padding: a.options.centerPadding + " 0px"
        })), a.listWidth = a.$list.width(), a.listHeight = a.$list.height(), a.options.vertical === !1 && a.options.variableWidth === !1 ? (a.slideWidth = Math.ceil(a.listWidth / a.options.slidesToShow), a.$slideTrack.width(Math.ceil(a.slideWidth * a.$slideTrack.children(".slick-slide").length))) : a.options.variableWidth === !0 ? a.$slideTrack.width(5e3 * a.slideCount) : (a.slideWidth = Math.ceil(a.listWidth), a.$slideTrack.height(Math.ceil(a.$slides.first().outerHeight(!0) * a.$slideTrack.children(".slick-slide").length)));
        var b = a.$slides.first().outerWidth(!0) - a.$slides.first().width();
        a.options.variableWidth === !1 && a.$slideTrack.children(".slick-slide").width(a.slideWidth - b)
    }, b.prototype.setFade = function() {
        var c, b = this;
        b.$slides.each(function(d, e) {
            c = b.slideWidth * d * -1, b.options.rtl === !0 ? a(e).css({
                position: "relative",
                right: c,
                top: 0,
                zIndex: b.options.zIndex - 2,
                opacity: 0
            }) : a(e).css({
                position: "relative",
                left: c,
                top: 0,
                zIndex: b.options.zIndex - 2,
                opacity: 0
            })
        }), b.$slides.eq(b.currentSlide).css({
            zIndex: b.options.zIndex - 1,
            opacity: 1
        })
    }, b.prototype.setHeight = function() {
        var a = this;
        if (1 === a.options.slidesToShow && a.options.adaptiveHeight === !0 && a.options.vertical === !1) {
            var b = a.$slides.eq(a.currentSlide).outerHeight(!0);
            a.$list.css("height", b)
        }
    }, b.prototype.setOption = b.prototype.slickSetOption = function() {
        var c, d, e, f, h, b = this,
            g = !1;
        if ("object" === a.type(arguments[0]) ? (e = arguments[0], g = arguments[1], h = "multiple") : "string" === a.type(arguments[0]) && (e = arguments[0], f = arguments[1], g = arguments[2], "responsive" === arguments[0] && "array" === a.type(arguments[1]) ? h = "responsive" : "undefined" != typeof arguments[1] && (h = "single")), "single" === h) b.options[e] = f;
        else if ("multiple" === h) a.each(e, function(a, c) {
            b.options[a] = c
        });
        else if ("responsive" === h)
            for (d in f)
                if ("array" !== a.type(b.options.responsive)) b.options.responsive = [f[d]];
                else {
                    for (c = b.options.responsive.length - 1; c >= 0;) b.options.responsive[c].breakpoint === f[d].breakpoint && b.options.responsive.splice(c, 1), c--;
                    b.options.responsive.push(f[d])
                }
        g && (b.unload(), b.reinit())
    }, b.prototype.setPosition = function() {
        var a = this;
        a.setDimensions(), a.setHeight(), a.options.fade === !1 ? a.setCSS(a.getLeft(a.currentSlide)) : a.setFade(), a.$slider.trigger("setPosition", [a])
    }, b.prototype.setProps = function() {
        var a = this,
            b = document.body.style;
        a.positionProp = a.options.vertical === !0 ? "top" : "left", "top" === a.positionProp ? a.$slider.addClass("slick-vertical") : a.$slider.removeClass("slick-vertical"), (void 0 !== b.WebkitTransition || void 0 !== b.MozTransition || void 0 !== b.msTransition) && a.options.useCSS === !0 && (a.cssTransitions = !0), a.options.fade && ("number" == typeof a.options.zIndex ? a.options.zIndex < 3 && (a.options.zIndex = 3) : a.options.zIndex = a.defaults.zIndex), void 0 !== b.OTransform && (a.animType = "OTransform", a.transformType = "-o-transform", a.transitionType = "OTransition", void 0 === b.perspectiveProperty && void 0 === b.webkitPerspective && (a.animType = !1)), void 0 !== b.MozTransform && (a.animType = "MozTransform", a.transformType = "-moz-transform", a.transitionType = "MozTransition", void 0 === b.perspectiveProperty && void 0 === b.MozPerspective && (a.animType = !1)), void 0 !== b.webkitTransform && (a.animType = "webkitTransform", a.transformType = "-webkit-transform", a.transitionType = "webkitTransition", void 0 === b.perspectiveProperty && void 0 === b.webkitPerspective && (a.animType = !1)), void 0 !== b.msTransform && (a.animType = "msTransform", a.transformType = "-ms-transform", a.transitionType = "msTransition", void 0 === b.msTransform && (a.animType = !1)), void 0 !== b.transform && a.animType !== !1 && (a.animType = "transform", a.transformType = "transform", a.transitionType = "transition"), a.transformsEnabled = a.options.useTransform && null !== a.animType && a.animType !== !1
    }, b.prototype.setSlideClasses = function(a) {
        var c, d, e, f, b = this;
        d = b.$slider.find(".slick-slide").removeClass("slick-active slick-center slick-current").attr("aria-hidden", "true"), b.$slides.eq(a).addClass("slick-current"), b.options.centerMode === !0 ? (c = Math.floor(b.options.slidesToShow / 2), b.options.infinite === !0 && (a >= c && a <= b.slideCount - 1 - c ? b.$slides.slice(a - c, a + c + 1).addClass("slick-active").attr("aria-hidden", "false") : (e = b.options.slidesToShow + a,
            d.slice(e - c + 1, e + c + 2).addClass("slick-active").attr("aria-hidden", "false")), 0 === a ? d.eq(d.length - 1 - b.options.slidesToShow).addClass("slick-center") : a === b.slideCount - 1 && d.eq(b.options.slidesToShow).addClass("slick-center")), b.$slides.eq(a).addClass("slick-center")) : a >= 0 && a <= b.slideCount - b.options.slidesToShow ? b.$slides.slice(a, a + b.options.slidesToShow).addClass("slick-active").attr("aria-hidden", "false") : d.length <= b.options.slidesToShow ? d.addClass("slick-active").attr("aria-hidden", "false") : (f = b.slideCount % b.options.slidesToShow, e = b.options.infinite === !0 ? b.options.slidesToShow + a : a, b.options.slidesToShow == b.options.slidesToScroll && b.slideCount - a < b.options.slidesToShow ? d.slice(e - (b.options.slidesToShow - f), e + f).addClass("slick-active").attr("aria-hidden", "false") : d.slice(e, e + b.options.slidesToShow).addClass("slick-active").attr("aria-hidden", "false")), "ondemand" === b.options.lazyLoad && b.lazyLoad()
    }, b.prototype.setupInfinite = function() {
        var c, d, e, b = this;
        if (b.options.fade === !0 && (b.options.centerMode = !1), b.options.infinite === !0 && b.options.fade === !1 && (d = null, b.slideCount > b.options.slidesToShow)) {
            for (e = b.options.centerMode === !0 ? b.options.slidesToShow + 1 : b.options.slidesToShow, c = b.slideCount; c > b.slideCount - e; c -= 1) d = c - 1, a(b.$slides[d]).clone(!0).attr("id", "").attr("data-slick-index", d - b.slideCount).prependTo(b.$slideTrack).addClass("slick-cloned");
            for (c = 0; e > c; c += 1) d = c, a(b.$slides[d]).clone(!0).attr("id", "").attr("data-slick-index", d + b.slideCount).appendTo(b.$slideTrack).addClass("slick-cloned");
            b.$slideTrack.find(".slick-cloned").find("[id]").each(function() {
                a(this).attr("id", "")
            })
        }
    }, b.prototype.interrupt = function(a) {
        var b = this;
        a || b.autoPlay(), b.interrupted = a
    }, b.prototype.selectHandler = function(b) {
        var c = this,
            d = a(b.target).is(".slick-slide") ? a(b.target) : a(b.target).parents(".slick-slide"),
            e = parseInt(d.attr("data-slick-index"));
        return e || (e = 0), c.slideCount <= c.options.slidesToShow ? (c.setSlideClasses(e), void c.asNavFor(e)) : void c.slideHandler(e)
    }, b.prototype.slideHandler = function(a, b, c) {
        var d, e, f, g, j, h = null,
            i = this;
        return b = b || !1, i.animating === !0 && i.options.waitForAnimate === !0 || i.options.fade === !0 && i.currentSlide === a || i.slideCount <= i.options.slidesToShow ? void 0 : (b === !1 && i.asNavFor(a), d = a, h = i.getLeft(d), g = i.getLeft(i.currentSlide), i.currentLeft = null === i.swipeLeft ? g : i.swipeLeft, i.options.infinite === !1 && i.options.centerMode === !1 && (0 > a || a > i.getDotCount() * i.options.slidesToScroll) ? void(i.options.fade === !1 && (d = i.currentSlide, c !== !0 ? i.animateSlide(g, function() {
            i.postSlide(d)
        }) : i.postSlide(d))) : i.options.infinite === !1 && i.options.centerMode === !0 && (0 > a || a > i.slideCount - i.options.slidesToScroll) ? void(i.options.fade === !1 && (d = i.currentSlide, c !== !0 ? i.animateSlide(g, function() {
            i.postSlide(d)
        }) : i.postSlide(d))) : (i.options.autoplay && clearInterval(i.autoPlayTimer), e = 0 > d ? i.slideCount % i.options.slidesToScroll !== 0 ? i.slideCount - i.slideCount % i.options.slidesToScroll : i.slideCount + d : d >= i.slideCount ? i.slideCount % i.options.slidesToScroll !== 0 ? 0 : d - i.slideCount : d, i.animating = !0, i.$slider.trigger("beforeChange", [i, i.currentSlide, e]), f = i.currentSlide, i.currentSlide = e, i.setSlideClasses(i.currentSlide), i.options.asNavFor && (j = i.getNavTarget(), j = j.slick("getSlick"), j.slideCount <= j.options.slidesToShow && j.setSlideClasses(i.currentSlide)), i.updateDots(), i.updateArrows(), i.options.fade === !0 ? (c !== !0 ? (i.fadeSlideOut(f), i.fadeSlide(e, function() {
            i.postSlide(e)
        })) : i.postSlide(e), void i.animateHeight()) : void(c !== !0 ? i.animateSlide(h, function() {
            i.postSlide(e)
        }) : i.postSlide(e))))
    }, b.prototype.startLoad = function() {
        var a = this;
        a.options.arrows === !0 && a.slideCount > a.options.slidesToShow && (a.$prevArrow.hide(), a.$nextArrow.hide()), a.options.dots === !0 && a.slideCount > a.options.slidesToShow && a.$dots.hide(), a.$slider.addClass("slick-loading")
    }, b.prototype.swipeDirection = function() {
        var a, b, c, d, e = this;
        return a = e.touchObject.startX - e.touchObject.curX, b = e.touchObject.startY - e.touchObject.curY, c = Math.atan2(b, a), d = Math.round(180 * c / Math.PI), 0 > d && (d = 360 - Math.abs(d)), 45 >= d && d >= 0 ? e.options.rtl === !1 ? "left" : "right" : 360 >= d && d >= 315 ? e.options.rtl === !1 ? "left" : "right" : d >= 135 && 225 >= d ? e.options.rtl === !1 ? "right" : "left" : e.options.verticalSwiping === !0 ? d >= 35 && 135 >= d ? "down" : "up" : "vertical"
    }, b.prototype.swipeEnd = function(a) {
        var c, d, b = this;
        if (b.dragging = !1, b.interrupted = !1, b.shouldClick = b.touchObject.swipeLength > 10 ? !1 : !0, void 0 === b.touchObject.curX) return !1;
        if (b.touchObject.edgeHit === !0 && b.$slider.trigger("edge", [b, b.swipeDirection()]), b.touchObject.swipeLength >= b.touchObject.minSwipe) {
            switch (d = b.swipeDirection()) {
                case "left":
                case "down":
                    c = b.options.swipeToSlide ? b.checkNavigable(b.currentSlide + b.getSlideCount()) : b.currentSlide + b.getSlideCount(), b.currentDirection = 0;
                    break;
                case "right":
                case "up":
                    c = b.options.swipeToSlide ? b.checkNavigable(b.currentSlide - b.getSlideCount()) : b.currentSlide - b.getSlideCount(), b.currentDirection = 1
            }
            "vertical" != d && (b.slideHandler(c), b.touchObject = {}, b.$slider.trigger("swipe", [b, d]))
        } else b.touchObject.startX !== b.touchObject.curX && (b.slideHandler(b.currentSlide), b.touchObject = {})
    }, b.prototype.swipeHandler = function(a) {
        var b = this;
        if (!(b.options.swipe === !1 || "ontouchend" in document && b.options.swipe === !1 || b.options.draggable === !1 && -1 !== a.type.indexOf("mouse"))) switch (b.touchObject.fingerCount = a.originalEvent && void 0 !== a.originalEvent.touches ? a.originalEvent.touches.length : 1, b.touchObject.minSwipe = b.listWidth / b.options.touchThreshold, b.options.verticalSwiping === !0 && (b.touchObject.minSwipe = b.listHeight / b.options.touchThreshold), a.data.action) {
            case "start":
                b.swipeStart(a);
                break;
            case "move":
                b.swipeMove(a);
                break;
            case "end":
                b.swipeEnd(a)
        }
    }, b.prototype.swipeMove = function(a) {
        var d, e, f, g, h, b = this;
        return h = void 0 !== a.originalEvent ? a.originalEvent.touches : null, !b.dragging || h && 1 !== h.length ? !1 : (d = b.getLeft(b.currentSlide), b.touchObject.curX = void 0 !== h ? h[0].pageX : a.clientX, b.touchObject.curY = void 0 !== h ? h[0].pageY : a.clientY, b.touchObject.swipeLength = Math.round(Math.sqrt(Math.pow(b.touchObject.curX - b.touchObject.startX, 2))), b.options.verticalSwiping === !0 && (b.touchObject.swipeLength = Math.round(Math.sqrt(Math.pow(b.touchObject.curY - b.touchObject.startY, 2)))), e = b.swipeDirection(), "vertical" !== e ? (void 0 !== a.originalEvent && b.touchObject.swipeLength > 4 && a.preventDefault(), g = (b.options.rtl === !1 ? 1 : -1) * (b.touchObject.curX > b.touchObject.startX ? 1 : -1), b.options.verticalSwiping === !0 && (g = b.touchObject.curY > b.touchObject.startY ? 1 : -1), f = b.touchObject.swipeLength, b.touchObject.edgeHit = !1, b.options.infinite === !1 && (0 === b.currentSlide && "right" === e || b.currentSlide >= b.getDotCount() && "left" === e) && (f = b.touchObject.swipeLength * b.options.edgeFriction, b.touchObject.edgeHit = !0), b.options.vertical === !1 ? b.swipeLeft = d + f * g : b.swipeLeft = d + f * (b.$list.height() / b.listWidth) * g, b.options.verticalSwiping === !0 && (b.swipeLeft = d + f * g), b.options.fade === !0 || b.options.touchMove === !1 ? !1 : b.animating === !0 ? (b.swipeLeft = null, !1) : void b.setCSS(b.swipeLeft)) : void 0)
    }, b.prototype.swipeStart = function(a) {
        var c, b = this;
        return b.interrupted = !0, 1 !== b.touchObject.fingerCount || b.slideCount <= b.options.slidesToShow ? (b.touchObject = {}, !1) : (void 0 !== a.originalEvent && void 0 !== a.originalEvent.touches && (c = a.originalEvent.touches[0]), b.touchObject.startX = b.touchObject.curX = void 0 !== c ? c.pageX : a.clientX, b.touchObject.startY = b.touchObject.curY = void 0 !== c ? c.pageY : a.clientY, void(b.dragging = !0))
    }, b.prototype.unfilterSlides = b.prototype.slickUnfilter = function() {
        var a = this;
        null !== a.$slidesCache && (a.unload(), a.$slideTrack.children(this.options.slide).detach(), a.$slidesCache.appendTo(a.$slideTrack), a.reinit())
    }, b.prototype.unload = function() {
        var b = this;
        a(".slick-cloned", b.$slider).remove(), b.$dots && b.$dots.remove(), b.$prevArrow && b.htmlExpr.test(b.options.prevArrow) && b.$prevArrow.remove(), b.$nextArrow && b.htmlExpr.test(b.options.nextArrow) && b.$nextArrow.remove(), b.$slides.removeClass("slick-slide slick-active slick-visible slick-current").attr("aria-hidden", "true").css("width", "")
    }, b.prototype.unslick = function(a) {
        var b = this;
        b.$slider.trigger("unslick", [b, a]), b.destroy()
    }, b.prototype.updateArrows = function() {
        var b, a = this;
        b = Math.floor(a.options.slidesToShow / 2), a.options.arrows === !0 && a.slideCount > a.options.slidesToShow && !a.options.infinite && (a.$prevArrow.removeClass("slick-disabled").attr("aria-disabled", "false"), a.$nextArrow.removeClass("slick-disabled").attr("aria-disabled", "false"), 0 === a.currentSlide ? (a.$prevArrow.addClass("slick-disabled").attr("aria-disabled", "true"), a.$nextArrow.removeClass("slick-disabled").attr("aria-disabled", "false")) : a.currentSlide >= a.slideCount - a.options.slidesToShow && a.options.centerMode === !1 ? (a.$nextArrow.addClass("slick-disabled").attr("aria-disabled", "true"), a.$prevArrow.removeClass("slick-disabled").attr("aria-disabled", "false")) : a.currentSlide >= a.slideCount - 1 && a.options.centerMode === !0 && (a.$nextArrow.addClass("slick-disabled").attr("aria-disabled", "true"), a.$prevArrow.removeClass("slick-disabled").attr("aria-disabled", "false")))
    }, b.prototype.updateDots = function() {
        var a = this;
        null !== a.$dots && (a.$dots.find("li").removeClass("slick-active").attr("aria-hidden", "true"), a.$dots.find("li").eq(Math.floor(a.currentSlide / a.options.slidesToScroll)).addClass("slick-active").attr("aria-hidden", "false"))
    }, b.prototype.visibility = function() {
        var a = this;
        a.options.autoplay && (document[a.hidden] ? a.interrupted = !0 : a.interrupted = !1)
    }, a.fn.slick = function() {
        var f, g, a = this,
            c = arguments[0],
            d = Array.prototype.slice.call(arguments, 1),
            e = a.length;
        for (f = 0; e > f; f++)
            if ("object" == typeof c || "undefined" == typeof c ? a[f].slick = new b(a[f], c) : g = a[f].slick[c].apply(a[f].slick, d), "undefined" != typeof g) return g;
        return a
    }
});

//CountDown
var module, countdown = function(v) {
    function A(a, b) {
        var c = a.getTime();
        a.setMonth(a.getMonth() + b);
        return Math.round((a.getTime() - c) / 864E5)
    }

    function w(a) {
        var b = a.getTime(),
            c = new Date(b);
        c.setMonth(a.getMonth() + 1);
        return Math.round((c.getTime() - b) / 864E5)
    }

    function x(a, b) {
        b = b instanceof Date || null !== b && isFinite(b) ? new Date(+b) : new Date;
        if (!a) return b;
        var c = +a.value || 0;
        if (c) return b.setTime(b.getTime() + c), b;
        (c = +a.milliseconds || 0) && b.setMilliseconds(b.getMilliseconds() + c);
        (c = +a.seconds || 0) && b.setSeconds(b.getSeconds() +
            c);
        (c = +a.minutes || 0) && b.setMinutes(b.getMinutes() + c);
        (c = +a.hours || 0) && b.setHours(b.getHours() + c);
        (c = +a.weeks || 0) && (c *= 7);
        (c += +a.days || 0) && b.setDate(b.getDate() + c);
        (c = +a.months || 0) && b.setMonth(b.getMonth() + c);
        (c = +a.millennia || 0) && (c *= 10);
        (c += +a.centuries || 0) && (c *= 10);
        (c += +a.decades || 0) && (c *= 10);
        (c += +a.years || 0) && b.setFullYear(b.getFullYear() + c);
        return b
    }

    function D(a, b) {
        return y(a) + (1 === a ? p[b] : q[b])
    }

    function n() {}

    function k(a, b, c, e, l, d) {
        0 <= a[c] && (b += a[c], delete a[c]);
        b /= l;
        if (1 >= b + 1) return 0;
        if (0 <= a[e]) {
            a[e] = +(a[e] + b).toFixed(d);
            switch (e) {
                case "seconds":
                    if (60 !== a.seconds || isNaN(a.minutes)) break;
                    a.minutes++;
                    a.seconds = 0;
                case "minutes":
                    if (60 !== a.minutes || isNaN(a.hours)) break;
                    a.hours++;
                    a.minutes = 0;
                case "hours":
                    if (24 !== a.hours || isNaN(a.days)) break;
                    a.days++;
                    a.hours = 0;
                case "days":
                    if (7 !== a.days || isNaN(a.weeks)) break;
                    a.weeks++;
                    a.days = 0;
                case "weeks":
                    if (a.weeks !== w(a.refMonth) / 7 || isNaN(a.months)) break;
                    a.months++;
                    a.weeks = 0;
                case "months":
                    if (12 !== a.months || isNaN(a.years)) break;
                    a.years++;
                    a.months = 0;
                case "years":
                    if (10 !==
                        a.years || isNaN(a.decades)) break;
                    a.decades++;
                    a.years = 0;
                case "decades":
                    if (10 !== a.decades || isNaN(a.centuries)) break;
                    a.centuries++;
                    a.decades = 0;
                case "centuries":
                    if (10 !== a.centuries || isNaN(a.millennia)) break;
                    a.millennia++;
                    a.centuries = 0
            }
            return 0
        }
        return b
    }

    function B(a, b, c, e, l, d) {
        var f = new Date;
        a.start = b = b || f;
        a.end = c = c || f;
        a.units = e;
        a.value = c.getTime() - b.getTime();
        0 > a.value && (f = c, c = b, b = f);
        a.refMonth = new Date(b.getFullYear(), b.getMonth(), 15, 12, 0, 0);
        try {
            a.millennia = 0;
            a.centuries = 0;
            a.decades = 0;
            a.years = c.getFullYear() -
                b.getFullYear();
            a.months = c.getMonth() - b.getMonth();
            a.weeks = 0;
            a.days = c.getDate() - b.getDate();
            a.hours = c.getHours() - b.getHours();
            a.minutes = c.getMinutes() - b.getMinutes();
            a.seconds = c.getSeconds() - b.getSeconds();
            a.milliseconds = c.getMilliseconds() - b.getMilliseconds();
            var g;
            0 > a.milliseconds ? (g = s(-a.milliseconds / 1E3), a.seconds -= g, a.milliseconds += 1E3 * g) : 1E3 <= a.milliseconds && (a.seconds += m(a.milliseconds / 1E3), a.milliseconds %= 1E3);
            0 > a.seconds ? (g = s(-a.seconds / 60), a.minutes -= g, a.seconds += 60 * g) : 60 <= a.seconds && (a.minutes +=
                m(a.seconds / 60), a.seconds %= 60);
            0 > a.minutes ? (g = s(-a.minutes / 60), a.hours -= g, a.minutes += 60 * g) : 60 <= a.minutes && (a.hours += m(a.minutes / 60), a.minutes %= 60);
            0 > a.hours ? (g = s(-a.hours / 24), a.days -= g, a.hours += 24 * g) : 24 <= a.hours && (a.days += m(a.hours / 24), a.hours %= 24);
            for (; 0 > a.days;) a.months--, a.days += A(a.refMonth, 1);
            7 <= a.days && (a.weeks += m(a.days / 7), a.days %= 7);
            0 > a.months ? (g = s(-a.months / 12), a.years -= g, a.months += 12 * g) : 12 <= a.months && (a.years += m(a.months / 12), a.months %= 12);
            10 <= a.years && (a.decades += m(a.years / 10), a.years %=
                10, 10 <= a.decades && (a.centuries += m(a.decades / 10), a.decades %= 10, 10 <= a.centuries && (a.millennia += m(a.centuries / 10), a.centuries %= 10)));
            b = 0;
            !(e & 1024) || b >= l ? (a.centuries += 10 * a.millennia, delete a.millennia) : a.millennia && b++;
            !(e & 512) || b >= l ? (a.decades += 10 * a.centuries, delete a.centuries) : a.centuries && b++;
            !(e & 256) || b >= l ? (a.years += 10 * a.decades, delete a.decades) : a.decades && b++;
            !(e & 128) || b >= l ? (a.months += 12 * a.years, delete a.years) : a.years && b++;
            !(e & 64) || b >= l ? (a.months && (a.days += A(a.refMonth, a.months)), delete a.months,
                7 <= a.days && (a.weeks += m(a.days / 7), a.days %= 7)) : a.months && b++;
            !(e & 32) || b >= l ? (a.days += 7 * a.weeks, delete a.weeks) : a.weeks && b++;
            !(e & 16) || b >= l ? (a.hours += 24 * a.days, delete a.days) : a.days && b++;
            !(e & 8) || b >= l ? (a.minutes += 60 * a.hours, delete a.hours) : a.hours && b++;
            !(e & 4) || b >= l ? (a.seconds += 60 * a.minutes, delete a.minutes) : a.minutes && b++;
            !(e & 2) || b >= l ? (a.milliseconds += 1E3 * a.seconds, delete a.seconds) : a.seconds && b++;
            if (!(e & 1) || b >= l) {
                var h = k(a, 0, "milliseconds", "seconds", 1E3, d);
                if (h && (h = k(a, h, "seconds", "minutes", 60, d)) && (h =
                        k(a, h, "minutes", "hours", 60, d)) && (h = k(a, h, "hours", "days", 24, d)) && (h = k(a, h, "days", "weeks", 7, d)) && (h = k(a, h, "weeks", "months", w(a.refMonth) / 7, d))) {
                    e = h;
                    var n, p = a.refMonth,
                        q = p.getTime(),
                        r = new Date(q);
                    r.setFullYear(p.getFullYear() + 1);
                    n = Math.round((r.getTime() - q) / 864E5);
                    if (h = k(a, e, "months", "years", n / w(a.refMonth), d))
                        if (h = k(a, h, "years", "decades", 10, d))
                            if (h = k(a, h, "decades", "centuries", 10, d))
                                if (h = k(a, h, "centuries", "millennia", 10, d)) throw Error("Fractional unit overflow");
                }
            }
        } finally {
            delete a.refMonth
        }
        return a
    }

    function d(a, b, c, e, d) {
        var f;
        c = +c || 222;
        e = 0 < e ? e : NaN;
        d = 0 < d ? 20 > d ? Math.round(d) : 20 : 0;
        var k = null;
        "function" === typeof a ? (f = a, a = null) : a instanceof Date || (null !== a && isFinite(a) ? a = new Date(+a) : ("object" === typeof k && (k = a), a = null));
        var g = null;
        "function" === typeof b ? (f = b, b = null) : b instanceof Date || (null !== b && isFinite(b) ? b = new Date(+b) : ("object" === typeof b && (g = b), b = null));
        k && (a = x(k, b));
        g && (b = x(g, a));
        if (!a && !b) return new n;
        if (!f) return B(new n, a, b, c, e, d);
        var k = c & 1 ? 1E3 / 30 : c & 2 ? 1E3 : c & 4 ? 6E4 : c & 8 ? 36E5 : c & 16 ? 864E5 : 6048E5,
            h, g = function() {
                f(B(new n, a, b, c, e, d), h)
            };
        g();
        return h = setInterval(g, k)
    }
    var s = Math.ceil,
        m = Math.floor,
        p, q, r, t, u, f, y, z;
    n.prototype.toString = function(a) {
        var b = z(this),
            c = b.length;
        if (!c) return a ? "" + a : u;
        if (1 === c) return b[0];
        a = r + b.pop();
        return b.join(t) + a
    };
    n.prototype.toHTML = function(a, b) {
        a = a || "span";
        var c = z(this),
            e = c.length;
        if (!e) return (b = b || u) ? "\x3c" + a + "\x3e" + b + "\x3c/" + a + "\x3e" : b;
        for (var d = 0; d < e; d++) c[d] = "\x3c" + a + "\x3e" + c[d] + "\x3c/" + a + "\x3e";
        if (1 === e) return c[0];
        e = r + c.pop();
        return c.join(t) + e
    };
    n.prototype.addTo =
        function(a) {
            return x(this, a)
        };
    z = function(a) {
        var b = [],
            c = a.millennia;
        c && b.push(f(c, 10));
        (c = a.centuries) && b.push(f(c, 9));
        (c = a.decades) && b.push(f(c, 8));
        (c = a.years) && b.push(f(c, 7));
        (c = a.months) && b.push(f(c, 6));
        (c = a.weeks) && b.push(f(c, 5));
        (c = a.days) && b.push(f(c, 4));
        (c = a.hours) && b.push(f(c, 3));
        (c = a.minutes) && b.push(f(c, 2));
        (c = a.seconds) && b.push(f(c, 1));
        (c = a.milliseconds) && b.push(f(c, 0));
        return b
    };
    d.MILLISECONDS = 1;
    d.SECONDS = 2;
    d.MINUTES = 4;
    d.HOURS = 8;
    d.DAYS = 16;
    d.WEEKS = 32;
    d.MONTHS = 64;
    d.YEARS = 128;
    d.DECADES = 256;
    d.CENTURIES = 512;
    d.MILLENNIA = 1024;
    d.DEFAULTS = 222;
    d.ALL = 2047;
    var E = d.setFormat = function(a) {
            if (a) {
                if ("singular" in a || "plural" in a) {
                    var b = a.singular || [];
                    b.split && (b = b.split("|"));
                    var c = a.plural || [];
                    c.split && (c = c.split("|"));
                    for (var d = 0; 10 >= d; d++) p[d] = b[d] || p[d], q[d] = c[d] || q[d]
                }
                "string" === typeof a.last && (r = a.last);
                "string" === typeof a.delim && (t = a.delim);
                "string" === typeof a.empty && (u = a.empty);
                "function" === typeof a.formatNumber && (y = a.formatNumber);
                "function" === typeof a.formatter && (f = a.formatter)
            }
        },
        C = d.resetFormat =
        function() {
            p = " millisecond; second; minute; hour; day; week; month; year; decade; century; millennium".split(";");
            q = " milliseconds; seconds; minutes; hours; days; weeks; months; years; decades; centuries; millennia".split(";");
            r = " and ";
            t = ", ";
            u = "";
            y = function(a) {
                return a
            };
            f = D
        };
    d.setLabels = function(a, b, c, d, f, k, m) {
        E({
            singular: a,
            plural: b,
            last: c,
            delim: d,
            empty: f,
            formatNumber: k,
            formatter: m
        })
    };
    d.resetLabels = C;
    C();
    v && v.exports ? v.exports = d : "function" === typeof window.define && "undefined" !== typeof window.define.amd &&
        window.define("countdown", [], function() {
            return d
        });
    return d
}(module);



! function(t) {
    var i = t(window);
    t.fn.visible = function(t, e, o) {
        if (!(this.length < 1)) {
            var r = this.length > 1 ? this.eq(0) : this,
                n = r.get(0),
                f = i.width(),
                h = i.height(),
                o = o ? o : "both",
                l = e === !0 ? n.offsetWidth * n.offsetHeight : !0;
            if ("function" == typeof n.getBoundingClientRect) {
                var g = n.getBoundingClientRect(),
                    u = g.top >= 0 && g.top < h,
                    s = g.bottom > 0 && g.bottom <= h,
                    c = g.left >= 0 && g.left < f,
                    a = g.right > 0 && g.right <= f,
                    v = t ? u || s : u && s,
                    b = t ? c || a : c && a;
                if ("both" === o) return l && v && b;
                if ("vertical" === o) return l && v;
                if ("horizontal" === o) return l && b
            } else {
                var d = i.scrollTop(),
                    p = d + h,
                    w = i.scrollLeft(),
                    m = w + f,
                    y = r.offset(),
                    z = y.top,
                    B = z + r.height(),
                    C = y.left,
                    R = C + r.width(),
                    j = t === !0 ? B : z,
                    q = t === !0 ? z : B,
                    H = t === !0 ? R : C,
                    L = t === !0 ? C : R;
                if ("both" === o) return !!l && p >= q && j >= d && m >= L && H >= w;
                if ("vertical" === o) return !!l && p >= q && j >= d;
                if ("horizontal" === o) return !!l && m >= L && H >= w
            }
        }
    }
}(jQuery);


/*!
 * pagepiling.js 1.5.4
 *
 * https://github.com/alvarotrigo/pagePiling.js
 * MIT licensed
 *
 * Copyright (C) 2013 alvarotrigo.com - A project by Alvaro Trigo
 */
! function(a, b, c, d) {
    "use strict";
    a.fn.pagepiling = function(e) {
        function s(a) {
            a.addClass("pp-table").wrapInner('<div class="pp-tableCell" style="height:100%" />')
        }

        function t(b) {
            var c = a(".pp-section.active").index(".pp-section"),
                d = b.index(".pp-section");
            return c > d ? "up" : "down"
        }

        function u(b, c) {
            var d = {
                destination: b,
                animated: c,
                activeSection: a(".pp-section.active"),
                anchorLink: b.data("anchor"),
                sectionIndex: b.index(".pp-section"),
                toMove: b,
                yMovement: t(b),
                leavingSection: a(".pp-section.active").index(".pp-section") + 1
            };
            if (!d.activeSection.is(b)) {
                "undefined" == typeof d.animated && (d.animated = !0), "undefined" != typeof d.anchorLink && B(d.anchorLink, d.sectionIndex), d.destination.addClass("active").siblings().removeClass("active"), d.sectionsToMove = x(d), "down" === d.yMovement ? (d.translate3d = aa(), d.scrolling = "", q.css3 || d.sectionsToMove.each(function(b) {
                    b != d.activeSection.index(".pp-section") && a(this).css(z(d.scrolling))
                }), d.animateSection = d.activeSection) : (d.translate3d = "", d.scrolling = "0", d.animateSection = b), a.isFunction(q.onLeave) && q.onLeave.call(this, d.leavingSection, d.sectionIndex + 1, d.yMovement), v(d), $(d.anchorLink), Z(d.anchorLink, d.sectionIndex), h = d.anchorLink;
                var e = (new Date).getTime();
                i = e
            }
        }

        function v(b) {
            q.css3 ? (H(b.animateSection, b.translate3d, b.animated), b.sectionsToMove.each(function() {
                H(a(this), b.translate3d, b.animated)
            }), setTimeout(function() {
                w(b)
            }, q.scrollingSpeed)) : (b.scrollOptions = z(b.scrolling), b.animated ? b.animateSection.animate(b.scrollOptions, q.scrollingSpeed, q.easing, function() {
                y(b), w(b)
            }) : (b.animateSection.css(z(b.scrolling)), setTimeout(function() {
                y(b), w(b)
            }, 400)))
        }

        function w(b) {
            a.isFunction(q.afterLoad) && q.afterLoad.call(this, b.anchorLink, b.sectionIndex + 1)
        }

        function x(b) {
            var c;
            return c = "down" === b.yMovement ? a(".pp-section").map(function(c) {
                if (c < b.destination.index(".pp-section")) return a(this)
            }) : a(".pp-section").map(function(c) {
                if (c > b.destination.index(".pp-section")) return a(this)
            })
        }

        function y(b) {
            "up" === b.yMovement && b.sectionsToMove.each(function(c) {
                a(this).css(z(b.scrolling))
            })
        }

        function z(a) {
            return "vertical" === q.direction ? {
                top: a
            } : {
                left: a
            }
        }

        function B(a, b) {
            q.anchors.length ? (location.hash = a, C(location.hash)) : C(String(b))
        }

        function C(b) {
            b = b.replace("#", ""), a("body")[0].className = a("body")[0].className.replace(/\b\s?pp-viewing-[^\s]+\b/g, ""), a("body").addClass("pp-viewing-" + b)
        }

        function D() {
            var d = c.location.hash.replace("#", ""),
                e = d,
                f = a(b).find('.pp-section[data-anchor="' + e + '"]');
            f.length > 0 && u(f, q.animateAnchor)
        }

        function E() {
            var a = (new Date).getTime();
            return a - i < p + q.scrollingSpeed
        }

        function F() {
            var d = c.location.hash.replace("#", "").split("/"),
                e = d[0];
            if (e.length && e && e !== h) {
                var f;
                f = isNaN(e) ? a(b).find('[data-anchor="' + e + '"]') : a(".pp-section").eq(e - 1), u(f)
            }
        }

        function G(a) {
            return {
                "-webkit-transform": a,
                "-moz-transform": a,
                "-ms-transform": a,
                transform: a
            }
        }

        function H(a, b, c) {
            a.toggleClass("pp-easing", c), a.css(G(b))
        }

        function J(b) {
            var d = (new Date).getTime();
            b = b || c.event;
            var e = b.wheelDelta || -b.deltaY || -b.detail,
                f = Math.max(-1, Math.min(1, e)),
                g = "undefined" != typeof b.wheelDeltaX || "undefined" != typeof b.deltaX,
                h = Math.abs(b.wheelDeltaX) < Math.abs(b.wheelDelta) || Math.abs(b.deltaX) < Math.abs(b.deltaY) || !g;
            o.length > 149 && o.shift(), o.push(Math.abs(e));
            var i = d - I;
            if (I = d, i > 200 && (o = []), !E()) {
                var j = a(".pp-section.active"),
                    k = N(j),
                    l = K(o, 10),
                    m = K(o, 70),
                    n = l >= m;
                return n && h && (f < 0 ? L("down", k) : f > 0 && L("up", k)), !1
            }
        }

        function K(a, b) {
            for (var c = 0, d = a.slice(Math.max(a.length - b, 1)), e = 0; e < d.length; e++) c += d[e];
            return Math.ceil(c / b)
        }

        function L(a, b) {
            var c, d;
            if ("down" == a ? (c = "bottom", d = f.moveSectionDown) : (c = "top", d = f.moveSectionUp), b.length > 0) {
                if (!M(c, b)) return !0;
                d()
            } else d()
        }

        function M(a, b) {
            return "top" === a ? !b.scrollTop() : "bottom" === a ? b.scrollTop() + 1 + b.innerHeight() >= b[0].scrollHeight : void 0
        }

        function N(a) {
            return a.filter(".pp-scrollable")
        }

        function O() {
            g.get(0).addEventListener ? (g.get(0).removeEventListener("mousewheel", J, !1), g.get(0).removeEventListener("wheel", J, !1)) : g.get(0).detachEvent("onmousewheel", J)
        }

        function P() {
            g.get(0).addEventListener ? (g.get(0).addEventListener("mousewheel", J, !1), g.get(0).addEventListener("wheel", J, !1)) : g.get(0).attachEvent("onmousewheel", J)
        }

        function Q() {
            if (j) {
                var a = S();
                g.off("touchstart " + a.down).on("touchstart " + a.down, V), g.off("touchmove " + a.move).on("touchmove " + a.move, W)
            }
        }

        function R() {
            if (j) {
                var a = S();
                g.off("touchstart " + a.down), g.off("touchmove " + a.move)
            }
        }

        function S() {
            var a;
            return a = c.PointerEvent ? {
                down: "pointerdown",
                move: "pointermove",
                up: "pointerup"
            } : {
                down: "MSPointerDown",
                move: "MSPointerMove",
                up: "MSPointerUp"
            }
        }

        function T(a) {
            var b = new Array;
            return b.y = "undefined" != typeof a.pageY && (a.pageY || a.pageX) ? a.pageY : a.touches[0].pageY, b.x = "undefined" != typeof a.pageX && (a.pageY || a.pageX) ? a.pageX : a.touches[0].pageX, b
        }

        function U(a) {
            return "undefined" == typeof a.pointerType || "mouse" != a.pointerType
        }

        function V(a) {
            var b = a.originalEvent;
            if (U(b)) {
                var c = T(b);
                k = c.y, l = c.x
            }
        }

        function W(b) {
            var c = b.originalEvent;
            if (!X(b.target) && U(c)) {
                var d = a(".pp-section.active"),
                    e = N(d);
                if (e.length || b.preventDefault(), !E()) {
                    var f = T(c);
                    m = f.y, n = f.x, "horizontal" === q.direction && Math.abs(l - n) > Math.abs(k - m) ? Math.abs(l - n) > g.width() / 100 * q.touchSensitivity && (l > n ? L("down", e) : n > l && L("up", e)) : Math.abs(k - m) > g.height() / 100 * q.touchSensitivity && (k > m ? L("down", e) : m > k && L("up", e))
                }
            }
        }

        function X(b, c) {
            c = c || 0;
            var d = a(b).parent();
            return !!(c < q.normalScrollElementTouchThreshold && d.is(q.normalScrollElements)) || c != q.normalScrollElementTouchThreshold && X(d, ++c)
        }

        function Y() {
            a("body").append('<div id="pp-nav"><ul></ul></div>');
            var b = a("#pp-nav");
            b.css("color", q.navigation.textColor), b.addClass(q.navigation.position);
            for (var c = 0; c < a(".pp-section").length; c++) {
                var d = "";
                if (q.anchors.length && (d = q.anchors[c]), "undefined" !== q.navigation.tooltips) {
                    var e = q.navigation.tooltips[c];
                    "undefined" == typeof e && (e = "")
                }
                b.find("ul").append('<li data-tooltip="' + e + '"><a href="#' + d + '"><span></span></a></li>')
            }
            b.find("span").css("border-color", q.navigation.bulletsColor)
        }

        function Z(b, c) {
            q.navigation && (a("#pp-nav").find(".active").removeClass("active"), b ? a("#pp-nav").find('a[href="#' + b + '"]').addClass("active") : a("#pp-nav").find("li").eq(c).find("a").addClass("active"))
        }

        function $(b) {
            q.menu && (a(q.menu).find(".active").removeClass("active"), a(q.menu).find('[data-menuanchor="' + b + '"]').addClass("active"))
        }

        function _() {
            var e, a = b.createElement("p"),
                f = {
                    webkitTransform: "-webkit-transform",
                    OTransform: "-o-transform",
                    msTransform: "-ms-transform",
                    MozTransform: "-moz-transform",
                    transform: "transform"
                };
            b.body.insertBefore(a, null);
            for (var g in f) a.style[g] !== d && (a.style[g] = "", e = c.getComputedStyle(a).getPropertyValue(f[g]));
            return b.body.removeChild(a), e !== d && e.length > 0 && "none" !== e
        }

        function aa() {}
        var h, f = a.fn.pagepiling,
            g = a(this),
            i = 0,
            j = "ontouchstart" in c || navigator.msMaxTouchPoints > 0 || navigator.maxTouchPoints,
            k = 0,
            l = 0,
            m = 0,
            n = 0,
            o = [],
            p = 600,
            q = a.extend(!0, {
                direction: "vertical",
                menu: null,
                verticalCentered: !0,
                sectionsColor: [],
                anchors: [],
                scrollingSpeed: 700,
                easing: "easeInQuart",
                loopBottom: !1,
                loopTop: !1,
                css3: !0,
                navigation: {
                    textColor: "#000",
                    bulletsColor: "#000",
                    position: "right",
                    tooltips: []
                },
                normalScrollElements: null,
                normalScrollElementTouchThreshold: 5,
                touchSensitivity: 5,
                keyboardScrolling: !0,
                sectionSelector: ".section",
                animateAnchor: !1,
                afterLoad: null,
                onLeave: null,
                afterRender: null
            }, e);
        a.extend(a.easing, {
            easeInQuart: function(a, b, c, d, e) {
                return d * (b /= e) * b * b * b + c
            }
        }), f.setScrollingSpeed = function(a) {
            q.scrollingSpeed = a
        }, f.setMouseWheelScrolling = function(a) {
            a ? P() : O()
        }, f.setAllowScrolling = function(a) {
            a ? (f.setMouseWheelScrolling(!0), Q()) : (f.setMouseWheelScrolling(!1), R())
        }, f.setKeyboardScrolling = function(a) {
            q.keyboardScrolling = a
        }, f.moveSectionUp = function() {
            var b = a(".pp-section.active").prev(".pp-section");
            !b.length && q.loopTop && (b = a(".pp-section").last()), b.length && u(b)
        }, f.moveSectionDown = function() {
            var b = a(".pp-section.active").next(".pp-section");
            !b.length && q.loopBottom && (b = a(".pp-section").first()), b.length && u(b)
        }, f.moveTo = function(c) {
            var d = "";
            d = isNaN(c) ? a(b).find('[data-anchor="' + c + '"]') : a(".pp-section").eq(c - 1), d.length > 0 && u(d)
        }, a(q.sectionSelector).each(function() {
            a(this).addClass("pp-section")
        }), q.css3 && (q.css3 = _()), a(g).css({
            overflow: "hidden",
            "-ms-touch-action": "none",
            "touch-action": "none"
        }), f.setAllowScrolling(!0), a.isEmptyObject(q.navigation) || Y();
        var r = a(".pp-section").length;
        a(".pp-section").each(function(b) {
            a(this).data("data-index", b), a(this).css("z-index", r), b || 0 !== a(".pp-section.active").length || a(this).addClass("active"), "undefined" != typeof q.anchors[b] && a(this).attr("data-anchor", q.anchors[b]), "undefined" != typeof q.sectionsColor[b] && a(this).css("background-color", q.sectionsColor[b]), q.verticalCentered && !a(this).hasClass("pp-scrollable") && s(a(this)), r -= 1
        }).promise().done(function() {
            q.navigation && (a("#pp-nav").css("margin-top", "-" + a("#pp-nav").height() / 2 + "px"), a("#pp-nav").find("li").eq(a(".pp-section.active").index(".pp-section")).find("a").addClass("active")), a(c).on("load", function() {
                D()
            }), a.isFunction(q.afterRender) && q.afterRender.call(this)
        }), a(c).on("hashchange", F), a(b).keydown(function(b) {
            if (q.keyboardScrolling && !E()) switch (b.which) {
                case 38:
                case 33:
                    f.moveSectionUp();
                    break;
                case 40:
                case 34:
                    f.moveSectionDown();
                    break;
                case 36:
                    f.moveTo(1);
                    break;
                case 35:
                    f.moveTo(a(".pp-section").length);
                    break;
                case 37:
                    f.moveSectionUp();
                    break;
                case 39:
                    f.moveSectionDown();
                    break;
                default:
                    return
            }
        }), q.normalScrollElements && (a(b).on("mouseenter", q.normalScrollElements, function() {
            f.setMouseWheelScrolling(!1)
        }), a(b).on("mouseleave", q.normalScrollElements, function() {
            f.setMouseWheelScrolling(!0)
        }));
        var I = (new Date).getTime();
        a(b).on("click touchstart", "#pp-nav a", function(b) {
            b.preventDefault();
            var c = a(this).parent().index();
            u(a(".pp-section").eq(c))
        }), a(b).on({
            mouseenter: function() {
                var b = a(this).data("tooltip");
                a('<div class="pp-tooltip ' + q.navigation.position + '">' + b + "</div>").hide().appendTo(a(this)).fadeIn(200)
            },
            mouseleave: function() {
                a(this).find(".pp-tooltip").fadeOut(200, function() {
                    a(this).remove()
                })
            }
        }, "#pp-nav li")
    }
}(jQuery, document, window);

/*
	Tilt JS
*/

var _typeof = "function" == typeof Symbol && "symbol" == typeof Symbol.iterator ? function(t) {
    return typeof t
} : function(t) {
    return t && "function" == typeof Symbol && t.constructor === Symbol && t !== Symbol.prototype ? "symbol" : typeof t
};
! function(t) {
    "function" == typeof define && define.amd ? define(["jquery"], t) : "object" === ("undefined" == typeof module ? "undefined" : _typeof(module)) && module.exports ? module.exports = function(i, s) {
        return void 0 === s && (s = "undefined" != typeof window ? require("jquery") : require("jquery")(i)), t(s), s
    } : t(jQuery)
}(function(t) {
    return t.fn.tilt = function(i) {
        var s = function() {
                this.ticking || (requestAnimationFrame(g.bind(this)), this.ticking = !0)
            },
            e = function() {
                var i = this;
                t(this).on("mousemove", o), t(this).on("mouseenter", a), this.settings.reset && t(this).on("mouseleave", h), this.settings.glare && t(window).on("resize", u.bind(i))
            },
            n = function() {
                var i = this;
                void 0 !== this.timeout && clearTimeout(this.timeout), t(this).css({
                    transition: this.settings.speed + "ms " + this.settings.easing
                }), this.settings.glare && this.glareElement.css({
                    transition: "opacity " + this.settings.speed + "ms " + this.settings.easing
                }), this.timeout = setTimeout(function() {
                    t(i).css({
                        transition: ""
                    }), i.settings.glare && i.glareElement.css({
                        transition: ""
                    })
                }, this.settings.speed)
            },
            a = function(i) {
                this.ticking = !1, t(this).css({
                    "will-change": "transform"
                }), n.call(this), t(this).trigger("tilt.mouseEnter")
            },
            r = function(i) {
                return "undefined" == typeof i && (i = {
                    pageX: t(this).offset().left + t(this).outerWidth() / 2,
                    pageY: t(this).offset().top + t(this).outerHeight() / 2
                }), {
                    x: i.pageX,
                    y: i.pageY
                }
            },
            o = function(t) {
                this.mousePositions = r(t), s.call(this)
            },
            h = function() {
                n.call(this), this.reset = !0, s.call(this), t(this).trigger("tilt.mouseLeave")
            },
            l = function() {
                var i = t(this).outerWidth(),
                    s = t(this).outerHeight(),
                    e = t(this).offset().left,
                    n = t(this).offset().top,
                    a = (this.mousePositions.x - e) / i,
                    r = (this.mousePositions.y - n) / s,
                    o = (this.settings.maxTilt / 2 - a * this.settings.maxTilt).toFixed(2),
                    h = (r * this.settings.maxTilt - this.settings.maxTilt / 2).toFixed(2),
                    l = Math.atan2(this.mousePositions.x - (e + i / 2), -(this.mousePositions.y - (n + s / 2))) * (180 / Math.PI);
                return {
                    tiltX: o,
                    tiltY: h,
                    percentageX: 100 * a,
                    percentageY: 100 * r,
                    angle: l
                }
            },
            g = function() {
                return this.transforms = l.call(this), this.reset ? (this.reset = !1, t(this).css("transform", "perspective(" + this.settings.perspective + "px) rotateX(0deg) rotateY(0deg)"), void(this.settings.glare && (this.glareElement.css("transform", "rotate(180deg) translate(-50%, -50%)"), this.glareElement.css("opacity", "0")))) : (t(this).css("transform", "perspective(" + this.settings.perspective + "px) rotateX(" + ("x" === this.settings.axis ? 0 : this.transforms.tiltY) + "deg) rotateY(" + ("y" === this.settings.axis ? 0 : this.transforms.tiltX) + "deg) scale3d(" + this.settings.scale + "," + this.settings.scale + "," + this.settings.scale + ")"), this.settings.glare && (this.glareElement.css("transform", "rotate(" + this.transforms.angle + "deg) translate(-50%, -50%)"), this.glareElement.css("opacity", "" + this.transforms.percentageY * this.settings.maxGlare / 100)), t(this).trigger("change", [this.transforms]), void(this.ticking = !1))
            },
            c = function() {
                var i = this.settings.glarePrerender;
                if (i || t(this).append('<div class="js-tilt-glare"><div class="js-tilt-glare-inner"></div></div>'), this.glareElementWrapper = t(this).find(".js-tilt-glare"), this.glareElement = t(this).find(".js-tilt-glare-inner"), !i) {
                    var s = {
                        position: "absolute",
                        top: "0",
                        left: "0",
                        width: "100%",
                        height: "100%"
                    };
                    this.glareElementWrapper.css(s).css({
                        overflow: "hidden"
                    }), this.glareElement.css({
                        position: "absolute",
                        top: "50%",
                        left: "50%",
                        "pointer-events": "none",
                        "background-image": "linear-gradient(0deg, rgba(255,255,255,0) 0%, rgba(255,255,255,1) 100%)",
                        width: "" + 2 * t(this).outerWidth(),
                        height: "" + 2 * t(this).outerWidth(),
                        transform: "rotate(180deg) translate(-50%, -50%)",
                        "transform-origin": "0% 0%",
                        opacity: "0"
                    })
                }
            },
            u = function() {
                this.glareElement.css({
                    width: "" + 2 * t(this).outerWidth(),
                    height: "" + 2 * t(this).outerWidth()
                })
            };
        return t.fn.tilt.destroy = function() {
            t(this).each(function() {
                t(this).find(".js-tilt-glare").remove(), t(this).css({
                    "will-change": "",
                    transform: ""
                }), t(this).off("mousemove mouseenter mouseleave")
            })
        }, t.fn.tilt.getValues = function() {
            var i = [];
            return t(this).each(function() {
                this.mousePositions = r.call(this), i.push(l.call(this))
            }), i
        }, t.fn.tilt.reset = function() {
            t(this).each(function() {
                var i = this;
                this.mousePositions = r.call(this), this.settings = t(this).data("settings"), h.call(this), setTimeout(function() {
                    i.reset = !1
                }, this.settings.transition)
            })
        }, this.each(function() {
            var s = this;
            this.settings = t.extend({
                maxTilt: t(this).is("[data-tilt-max]") ? t(this).data("tilt-max") : 20,
                perspective: t(this).is("[data-tilt-perspective]") ? t(this).data("tilt-perspective") : 300,
                easing: t(this).is("[data-tilt-easing]") ? t(this).data("tilt-easing") : "cubic-bezier(.03,.98,.52,.99)",
                scale: t(this).is("[data-tilt-scale]") ? t(this).data("tilt-scale") : "1",
                speed: t(this).is("[data-tilt-speed]") ? t(this).data("tilt-speed") : "400",
                transition: !t(this).is("[data-tilt-transition]") || t(this).data("tilt-transition"),
                axis: t(this).is("[data-tilt-axis]") ? t(this).data("tilt-axis") : null,
                reset: !t(this).is("[data-tilt-reset]") || t(this).data("tilt-reset"),
                glare: !!t(this).is("[data-tilt-glare]") && t(this).data("tilt-glare"),
                maxGlare: t(this).is("[data-tilt-maxglare]") ? t(this).data("tilt-maxglare") : 1
            }, i), this.init = function() {
                t(s).data("settings", s.settings), s.settings.glare && c.call(s), e.call(s)
            }, this.init()
        })
    }, t("[data-tilt]").tilt(), !0
});




! function(t, n) {
    var o = function(t, o) {
        var i = this;
        i.el = t, i.$el = n(t), i.options = o
    };
    o.prototype = {
        defaults: {
            data: [],
            backend: !1
        },
        init: function() {
            var t = this;
            if (t.hotspot = n.extend({}, t.defaults, t.options), 0 == t.hotspot.backend && t.frontendStyleMaker(), 1 == t.hotspot.backend) {
                t.$el.find(".syn-hotspot-imgwrapper").click(function(n) {
                    t.backendAddHotspot(n)
                }), t.$el.append('<div class="syn-hotspot-editctn syn-elem-popup syn-centerhv syn-transition-4" data-situation="hidden" data-editing-id="">            \t\t<div class="syn-hotspot-edithead syn-hotspot-editsection">Edit Tooltip Content <div class="syn-popup-closer syn-popup-close syn-centerv">&#x2717;</div></div>\t\t\t\t\t\t<div class="syn-hotspot-editcontent syn-hotspot-editsection">\t\t\t\t\t\t\t<div class="syn-hotspot-editlabel">Title</div>\t\t\t\t\t\t\t<div><input type="text" class="syn-hotspot-edit-input syn-hotspot-titleinp syn-transition-4"></div>\t\t\t\t\t\t\t<div class="syn-hotspot-editlabel">Message</div>\t\t\t\t\t\t\t<div><textarea class="syn-hotspot-edit-input syn-hotspot-infoinp syn-transition-4"></textarea></div>\t\t\t\t\t\t\t<div class="syn-hotspot-editlabel">Tooltip Position</div>\t\t\t\t\t\t\t<div><select class="syn-hotspot-edit-input syn-hotspot-positioninp syn-transition-4"><option value="bottom">Bottom</option><option value="top">Top</option><option value="lefttop">Left Top</option><option value="leftcenter">Left Center</option><option value="leftbottom">Left Bottom</option><option value="righttop">Right Top</option><option value="rightcenter">Right Center</option><option value="rightbottom">Right Bottom</option></select>\t\t\t\t\t\t</div>\t\t\t\t\t\t<div class="syn-hotspot-editbuttons"> \t\t\t\t\t\t\t<div class="syn-hotspot-editbtn syn-save syn-transition-4 syn-back-btn" data-bxs-small-h>Save Changes</div> \t\t\t\t\t\t\t<div class="syn-hotspot-editbtn syn-transition-4 syn-back-btn syn-popup-close" data-bxs-small-h>Cancel</div> \t\t\t\t\t\t</div> \t\t\t\t\t</div>');
                var o = t.$el.parents(".syn-elem-parent").find(".syn-fake-input").val();
                if ("" != n.trim(o)) {
                    var i = JSON.parse(o);
                    if ("" != n.trim(i.data)) {
                        var s = JSON.parse(i.data);
                        t.hotspot.data = [], s.forEach(function(n, o) {
                            n = JSON.parse(n), t.hotspot.data.push(n), t.backendPrintHotspot(n, "hidden")
                        })
                    }
                }
                t.closePopup()
            }
            return t
        },
        frontendStyleMaker: function() {
            var t = this,
                o = "",
                i = t.$el.parents(".syn-hotspot-container"),
                s = JSON.parse(i.attr("data-marker-data")),
                e = JSON.parse(i.attr("data-tooltip-data")),
                a = JSON.parse(i.attr("data-hotspot"));
            o += ".syn-hotspot-itemfront .syn-hotspot-marker{background:" + s.markerBackground + "; color:" + s.markerColor + "; }", o += ".syn-hotspot-contentbig .syn-hotspot-content{color:" + s.markerColor + "; background:" + e.tooltipBackground + "}.syn-hotspot-contentbig .syn-hotspot-title{color:" + e.tooltipTitleColor + ";" + e.tooltipTitleFontSize + " " + e.tooltipTitleFontStyle + "}.syn-hotspot-contentbig .syn-hotspot-info{color:" + e.tooltipInfoColor + ";" + e.tooltipInfoFontSize + "}";
            var d = ["A", "B", "C", "D", "E", "F", "G", "H", "I", "J", "K", "L", "M", "N", "O", "P", "Q", "R", "S", "T", "U", "V", "W", "X", "Y", "Z"],
                p = "";
            "plussign" == s.markerType && (p = "+"), a.forEach(function(n, o) {
                "alphabet" == s.markerType && (p = d[o]), "numbers" == s.markerType && (p = o + 1), t.printHotspot(n, p, e.tooltipShowEvent, e.tooltipAnimation)
            }), n("style[data-sayenstyle]").length || n("head").append('<style type="text/css" media="screen" data-sayenstyle="sayen"></style>'), n('style[data-sayenstyle="sayen"]').append(o)
        },
        printHotspot: function(t, n, o, i) {
            var s = this;
            s.$el.append('<div class="syn-hotspot-contentbig syn-elem-isalign " data-position="' + t.position + '"  style="left:' + t.left + "%; top:" + t.top + '%;">            \t<div class="syn-hotspot-item syn-hotspot-itemfront syn-elem-isbxsh" data-id="' + t.theID + '" style="left:' + t.left + "%; top:" + t.top + '%;">\t\t\t\t\t<div class="syn-hotspot-marker syn-elem-idrounded"><div class="syn-hotspot-markerinsider">' + n + '</div></div></div><div class="syn-hotspot-contentanim syn-animated-elem syn-transition-3" data-animation="' + i + '" data-situation="hidden"><div class="syn-hotspot-contentctn" ><div class="syn-hotspot-content"><div class="syn-hotspot-closer syn-closer"><i class="km-icon-close2"></i></div>\t\t\t\t\t\t<div class="syn-hotspot-title">' + t.title + '</div>\t\t\t\t\t\t<div class="syn-hotspot-info">' + t.info + "</div>\t\t\t\t\t</div></div></div></div>"), s.frontendShowItem(o)
        },
        frontendShowItemHoverResponsive: function(t) {
            this.$el
        },
        frontendShowItem: function(o) {
            var i = this,
                s = i.$el;
            s.find(".syn-hotspot-closer").unbind("click").click(function() {
                var t = n(this).parents(".syn-hotspot-contentbig").find(".syn-hotspot-contentctn");
                i.frontendTooltipChangeSituation(t)
            }), "click" != o && "hover" != o || s.find(".syn-hotspot-contentbig").unbind("click").click(function() {
                if (n(t).width() < 850 || "click" == o) {
                    console.log("s");
                    var e = n(this).find(".syn-hotspot-contentanim");
                    s.find(".syn-hotspot-contentanim").not(e).attr({
                        "data-situation": "hidden"
                    }), i.frontendTooltipChangeSituation(e)
                }
            }), "hover" == o && s.find(".syn-hotspot-contentbig").unbind("hover").hover(function() {
                if (n(t).width() > 850) {
                    var o = n(this).find(".syn-hotspot-contentanim");
                    i.frontendTooltipChangeSituation(o)
                }
            })
        },
        frontendTooltipChangeSituation: function(t) {
            "hidden" == n.trim(t.attr("data-situation")) ? t.attr({
                "data-situation": "shown"
            }) : "shown" == n.trim(t.attr("data-situation")) && t.attr({
                "data-situation": "hidden"
            })
        },
        generateID: function(t) {
            for (var n = "", o = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789", i = 0; i < t; i++) n += o.charAt(Math.floor(Math.random() * o.length));
            return n
        },
        backendPrintHotspot: function(t, n) {
            var o = this;
            o.$el.append('<div class="syn-hotspot-item syn-hotspot-edititem" data-id="' + t.theID + '" data-hoverstyle="" data-situation="' + n + '" style="left:' + t.left + "%; top:" + t.top + '%;">\t\t\t\t\t<div class="syn-hotspot-marker syn-closer"></div><div class="syn-hotspot-content syn-hotspot-contentbackend syn-transition-4"><div class="syn-hotspot-closer syn-closer"><i class="km-icon-close2"></i></div>\t\t\t\t\t\t<div class="syn-hotspot-title">' + t.title + '</div>\t\t\t\t\t\t<div class="syn-hotspot-info">' + t.info + '</div>\t\t\t\t\t\t<div class="syn-hotspot-btn syn-hotspot-btnicon  syn-hotspot-btndelete" title="Delete" style="color:#d14836;"><i class="km-icon-trash"></i></div> <div class="syn-hotspot-btn syn-hotspot-btnicon syn-hotspot-btnedit" title="Edit" style="color:#2196f3;"><i class="km-icon-pencil2"></i></div>\t\t\t\t\t</div></div>'), o.backendShowTooltip(), o.backendSavePopup(), o.bakendEditPopup(), o.backendDeleteItem()
        },
        backendAddHotspot: function(t) {
            var n = this,
                o = n.$el,
                i = o.offset(),
                s = n.generateID(7),
                e = {
                    theID: s,
                    left: 100 * (t.pageX - i.left) / o.width(),
                    top: 100 * (t.pageY - i.top) / o.height(),
                    title: "",
                    info: "",
                    position: "bottom"
                };
            n.hotspot.data.push(e), n.backendPrintHotspot(e, "shown"), o.find(".syn-hotspot-editctn").attr({
                "data-situation": "shown",
                "data-editing-id": s
            }), o.find(".syn-hotspot-edit-input").val(""), n.backendFakeJson()
        },
        bakendEditPopup: function() {
            var t = this,
                o = t.$el;
            o.find(".syn-hotspot-btnedit").unbind().click(function() {
                var i = n(this).parents(".syn-hotspot-edititem").attr("data-id"),
                    s = t.backendGetSingleElement(i)[0];
                o.find(".syn-hotspot-titleinp").val(s.title), o.find(".syn-hotspot-infoinp").val(s.info), o.find(".syn-hotspot-positioninp").val(s.position), o.find(".syn-hotspot-editctn").attr({
                    "data-situation": "shown",
                    "data-editing-id": i
                })
            })
        },
        closePopup: function() {
            var t = this.$el;
            t.find(".syn-popup-close").unbind().click(function() {
                t.find(".syn-hotspot-editctn").attr({
                    "data-situation": "hidden",
                    "data-editing-id": ""
                }).find(".syn-hotspot-edit-input").val("")
            })
        },
        backendSavePopup: function() {
            var t = this,
                n = t.$el;
            n.find(".syn-hotspot-editbtn.syn-save").unbind().click(function() {
                var o = n.find(".syn-hotspot-editctn.syn-elem-popup").attr("data-editing-id"),
                    i = n.find(".syn-hotspot-titleinp").val(),
                    s = n.find(".syn-hotspot-infoinp").val(),
                    e = n.find(".syn-hotspot-positioninp").val(),
                    a = t.backendGetSingleElement(o)[0];
                a.title = i, a.info = s, a.position = e, n.find('.syn-hotspot-edititem[data-id="' + o + '"]').find(".syn-hotspot-title").html(i), n.find('.syn-hotspot-edititem[data-id="' + o + '"]').find(".syn-hotspot-info").html(s), t.backendFakeJson()
            })
        },
        backendDeleteItem: function() {
            var t = this,
                o = t.$el;
            o.find(".syn-hotspot-btndelete").unbind().click(function() {
                var i = n(this).parents(".syn-hotspot-item").attr("data-id"),
                    s = t.hotspot.data.indexOf(t.backendGetSingleElement(i)[0]);
                t.hotspot.data.splice(s, 1), o.find('.syn-hotspot-edititem[data-id="' + i + '"]').remove(), o.find(".syn-hotspot-editctn").attr({
                    "data-situation": "hidden",
                    "data-editing-id": ""
                }).find(".syn-hotspot-edit-input").val(""), t.backendFakeJson()
            })
        },
        backendGetSingleElement: function(t) {
            var o = this;
            return n.grep(o.hotspot.data, function(n) {
                return n.theID == t
            })
        },
        backendFakeJson: function() {
            var t = this,
                n = t.$el.parents(".syn-elem-parent").find(".syn-fake-input"),
                o = "";
            o = "" != jQuery.trim(n.val()) ? JSON.parse(n.val()) : JSON.parse('{"imageid":"", "data":""}');
            var i = [];
            t.hotspot.data.forEach(function(t, n) {
                i.push(JSON.stringify(t))
            }), o.data = JSON.stringify(i), n.val(JSON.stringify(o))
        },
        backendShowTooltip: function() {
            this.$el.find(".syn-closer").unbind().click(function() {
                var t = n(this).parents(".syn-hotspot-edititem");
                "hidden" == n.trim(t.attr("data-situation")) ? t.attr({
                    "data-situation": "shown"
                }) : "shown" == n.trim(t.attr("data-situation")) && t.attr({
                    "data-situation": "hidden"
                })
            })
        }
    }, o.defaults = o.prototype.defaults, n.fn.sayenhotspot = function(t) {
        return this.each(function() {
            new o(this, t).init()
        })
    }, t.sayenhotspot = o
}(window, jQuery);