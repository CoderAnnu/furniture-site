(function($){
	"use strict";
    var $window = $(window);
    var startMegaMenu = function() {
        $(".fl-mega-menu").accessibleMegaMenu({
                /* prefix for generated unique id attributes, which are required
                to indicate aria-owns, aria-controls and aria-labelledby */
                uuidPrefix: "accessible-megamenu",
                /* css class used to define the megamenu styling */
                menuClass: "nav-menu",
                /* css class for a top-level navigation item in the megamenu */
                topNavItemClass: "nav-item",
                /* css class for a megamenu panel */
                panelClass: "sub-nav",
                /* css class for a group of items within a megamenu panel */
                panelGroupClass: "sub-nav-group",
                /* css class for the hover state */
                hoverClass: "hover",
                /* css class for the focus state */
                focusClass: "focus",
                /* css class for the open state */
                openClass: "open"
        });


        var $sub_nav_mega_menu_item = $(".fl--header .mega-menu-item");
        if ($sub_nav_mega_menu_item.length !== 0) {
                $sub_nav_mega_menu_item.each( function() {
                    var $self = $(this);
                    if($self.hasClass('has-submenu') && !$self.hasClass("sub-menu-full-width")){
                        // ADD Mega menu ul width
                            $self.find('ul.sub-menu-wide').each(function(){
                                var $ul = $(this),
                                    total_width = 1,
                                    limit = $ul.data('max-columns'),
                                    i = 0;
                                if(typeof $ul.data('max-columns') !== 'undefined'){
                                    $ul.children().each(function(){
                                        if(!limit || limit > i) {
                                            total_width += Math.ceil($(this).outerWidth());
                                        }
                                        i++;
                                    });
                                    $ul.innerWidth(total_width);
                                    if( total_width > w_width){
                                        $ul.css({'max-width': w_width});
                                    }
                                }
                            });

                            var $sub_nav_child = $self.find('.sub-nav .sub-menu'),
                                w_width = $window.width(),
                                offset = $sub_nav_child.offset(),
                                offset_right = (offset.left + $sub_nav_child.outerWidth()) - $(window).width();
                            if(offset_right >= 0){
                                $(this).find('.sub-nav').css(
                                    {
                                        'max-width': w_width,
                                        'margin-left': -offset_right-20
                                    }
                                );
                            }
                    }


                });
        }

    };
    // Start
	$('document').ready(function() {
        startMegaMenu();
	});
})(jQuery);