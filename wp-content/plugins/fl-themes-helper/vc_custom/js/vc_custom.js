jQuery.noConflict()(function($) {

    "use strict";
    var $window = window,
        offset = '90%',
        $doc = $(document),
        self = this;


    $window.initResponsiveOptionVC = function (){
            var desktop		        = '',
                tablet				= '',
                mobile				= '';
            $(".fl-vc--responsive").each(function() {
                var responsive_param 		= $(this).attr('data-responsive-param'),
                    responsive_target 		= $(this).data('responsive-target'),
                    temp_desktop            = '',
                    temp_tablet				= '',
                    temp_mobile				= '';
                if (typeof responsive_param != "undefined" || responsive_param != null) {
                    $.each($.parseJSON(responsive_param), function (i, v) {
                        var css_prop_function = i;
                        if (typeof v != "undefined" && v != null) {
                            var vals = v.split(";");
                            $.each(vals, function(i, vl) {
                                if (typeof vl != "undefined" || vl != null) {
                                    var separator = vl.split(":");
                                    switch(separator[0]) {
                                        case 'desktop':         temp_desktop	        += css_prop_function+":"+separator[1]+"!important;"; break;
                                        case 'tablet': 			temp_tablet				+= css_prop_function+":"+separator[1]+"!important;"; break;
                                        case 'mobile': 			temp_mobile				+= css_prop_function+":"+separator[1]+"!important;"; break;
                                    }
                                }
                            });
                        }
                    });
                }
                if(temp_mobile!='')     { 			mobile				+= '.'+responsive_target+ '{'+temp_mobile+'}'; }
                if(temp_tablet!='')     { 			tablet				+= '.'+responsive_target+ '{'+temp_tablet+'}'; }
                if(temp_desktop!='')    { 			desktop				+= '.'+responsive_target+ '{'+temp_desktop+'}'; }
            });
            var ResponsiveTextMedia = '<style>/**Responsive Media **/';
            ResponsiveTextMedia	+= "@media (max-width: 1199px) { "+ desktop 	+"}";
            ResponsiveTextMedia	+= "@media (max-width: 991px)  { "+ tablet 	    +"}";
            ResponsiveTextMedia	+= "@media (max-width: 767px)  { "+ mobile 		+"}";
            ResponsiveTextMedia	+= '</style>';
            $('head').append(ResponsiveTextMedia);


    };




    $window.initVcCustomFunctionPlugin = function(){
        initResponsiveOptionVC();
    };



    $window.initCustomFunction = function(){
        initVcCustomFunctionPlugin();
    };


    $(document).ready(function(){
        initCustomFunction();
        initVcCustomFunctionPlugin();
        if($window && typeof parent.vc != 'undefined' && typeof parent.vc.events != 'undefined') {
            parent.vc.events.on('shortcodeView:ready', function() {
                setTimeout(initVcCustomFunctionPlugin, 200);
            });
        }
    });



});

