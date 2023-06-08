<?php
if ( ! function_exists( 'vc_fl_google_map_function' ) ) {
    function vc_fl_google_map_function($atts, $content = null)
    {

        if(empelza_get_theme_mod('google_api_key')!=''){
            wp_print_scripts( 'google-maps-api' );
            wp_print_scripts( 'gmap3' );
        }

        $css_classes[] = 'fl-map';

        global $fl_helping_responsive_style;

        $atts = vc_map_get_attributes('vc_fl_google_map', $atts);

        extract($atts);

        $result=$wrapper_attributes[] = $map_wrapper_attributes[] =$responsive_style =$custom_id = $map_style_js = '';

        $css_classes[] .= fl_get_css_tab_class($atts);

        if(isset($id) && $id != '') {
            $wrapper_attributes[] .= 'id="'.fl_sanitize_class($id).'"';
        }


        if(isset($class) && $class != '') {
            $css_classes[] .= fl_sanitize_class($class);
        }

        $vc_init = uniqid('fl-google-maps').rand(100,9999);
        $css_classes[] = $vc_init;

        // Responsive CSS Box
        if(isset($custom_responsive_option) && $custom_responsive_option !='off') {
            if( !empty( $responsive_css ) && $responsive_css != '' ) {
                $responsive_id = $idf = uniqid('fl-helping-map-responsive-').'-'.rand(100,9999);
                $column_selector = $responsive_id;
                $responsive_style = fl_helping__addons_get_responsive_style($responsive_css, $column_selector);
                $css_classes[] = $responsive_id;
            }
        }

        // Animation option
        if ( ! empty( $animation ) and ($animation !='none')) {
            $css_classes[] = 'fl-animated-item-velocity';
            $wrapper_attributes[] = 'data-animate-type="'.$animation.'"';

            if ( ! empty( $custom_delay ) and ( $custom_delay !='off')) {
                if ( ! empty( $animation_delay ) and ($animation_delay !='')) {
                    $wrapper_attributes[] = 'data-item-delay="'.$animation_delay.'"';
                }
            }
        }

        $customstyle_map = $customstyle_map_style = $styles_map_text = $custom_id = $google_size = '';


        if(isset($map_style) && $map_style == 'map_light_coloured') {
            $customstyle_map = '[ { "featureType": "landscape", "stylers": [ { "hue": "#FFBB00" }, { "saturation": 43.400000000000006 }, { "lightness": 37.599999999999994 }, { "gamma": 1 } ] }, { "featureType": "road.highway", "stylers": [ { "hue": "#FFC200" }, { "saturation": -61.8 }, { "lightness": 45.599999999999994 }, { "gamma": 1 } ] }, { "featureType": "road.arterial", "stylers": [ { "hue": "#FF0300" }, { "saturation": -100 }, { "lightness": 51.19999999999999 }, { "gamma": 1 } ] }, { "featureType": "road.local", "stylers": [ { "hue": "#FF0300" }, { "saturation": -100 }, { "lightness": 52 }, { "gamma": 1 } ] }, { "featureType": "water", "stylers": [ { "hue": "#0078FF" }, { "saturation": -13.200000000000003 }, { "lightness": 2.4000000000000057 }, { "gamma": 1 } ] }, { "featureType": "poi", "stylers": [ { "hue": "#00FF6A" }, { "saturation": -1.0989010989011234 }, { "lightness": 11.200000000000017 }, { "gamma": 1 } ] } ]';
        }
        if(isset($map_style) && $map_style == 'map_ultra_light') {
            $customstyle_map = '[ { "featureType": "water", "elementType": "geometry", "stylers": [ { "color": "#e9e9e9" }, { "lightness": 17 } ] }, { "featureType": "landscape", "elementType": "geometry", "stylers": [ { "color": "#f5f5f5" }, { "lightness": 20 } ] }, { "featureType": "road.highway", "elementType": "geometry.fill", "stylers": [ { "color": "#ffffff" }, { "lightness": 17 } ] }, { "featureType": "road.highway", "elementType": "geometry.stroke", "stylers": [ { "color": "#ffffff" }, { "lightness": 29 }, { "weight": 0.2 } ] }, { "featureType": "road.arterial", "elementType": "geometry", "stylers": [ { "color": "#ffffff" }, { "lightness": 18 } ] }, { "featureType": "road.local", "elementType": "geometry", "stylers": [ { "color": "#ffffff" }, { "lightness": 16 } ] }, { "featureType": "poi", "elementType": "geometry", "stylers": [ { "color": "#f5f5f5" }, { "lightness": 21 } ] }, { "featureType": "poi.park", "elementType": "geometry", "stylers": [ { "color": "#dedede" }, { "lightness": 21 } ] }, { "elementType": "labels.text.stroke", "stylers": [ { "visibility": "on" }, { "color": "#ffffff" }, { "lightness": 16 } ] }, { "elementType": "labels.text.fill", "stylers": [ { "saturation": 36 }, { "color": "#333333" }, { "lightness": 40 } ] }, { "elementType": "labels.icon", "stylers": [ { "visibility": "off" } ] }, { "featureType": "transit", "elementType": "geometry", "stylers": [ { "color": "#f2f2f2" }, { "lightness": 19 } ] }, { "featureType": "administrative", "elementType": "geometry.fill", "stylers": [ { "color": "#fefefe" }, { "lightness": 20 } ] }, { "featureType": "administrative", "elementType": "geometry.stroke", "stylers": [ { "color": "#fefefe" }, { "lightness": 17 }, { "weight": 1.2 } ] } ]';
        }
        if(isset($map_style) && $map_style == 'map_light') {
            $customstyle_map = '[ { "featureType": "administrative", "elementType": "labels.text.fill", "stylers": [ { "color": "#444444" } ] }, { "featureType": "landscape", "elementType": "all", "stylers": [ { "color": "#f2f2f2" } ] }, { "featureType": "poi", "elementType": "all", "stylers": [ { "visibility": "on" } ] }, { "featureType": "poi", "elementType": "geometry.fill", "stylers": [ { "saturation": "-100" }, { "lightness": "57" } ] }, { "featureType": "poi", "elementType": "geometry.stroke", "stylers": [ { "lightness": "1" } ] }, { "featureType": "poi", "elementType": "labels", "stylers": [ { "visibility": "off" } ] }, { "featureType": "road", "elementType": "all", "stylers": [ { "saturation": -100 }, { "lightness": 45 } ] }, { "featureType": "road.highway", "elementType": "all", "stylers": [ { "visibility": "simplified" } ] }, { "featureType": "road.arterial", "elementType": "labels.icon", "stylers": [ { "visibility": "off" } ] }, { "featureType": "transit", "elementType": "all", "stylers": [ { "visibility": "off" } ] }, { "featureType": "transit.station.bus", "elementType": "all", "stylers": [ { "visibility": "on" } ] }, { "featureType": "transit.station.bus", "elementType": "labels.text.fill", "stylers": [ { "saturation": "0" }, { "lightness": "0" }, { "gamma": "1.00" }, { "weight": "1" } ] }, { "featureType": "transit.station.bus", "elementType": "labels.icon", "stylers": [ { "saturation": "-100" }, { "weight": "1" }, { "lightness": "0" } ] }, { "featureType": "transit.station.rail", "elementType": "all", "stylers": [ { "visibility": "on" } ] }, { "featureType": "transit.station.rail", "elementType": "labels.text.fill", "stylers": [ { "gamma": "1" }, { "lightness": "40" } ] }, { "featureType": "transit.station.rail", "elementType": "labels.icon", "stylers": [ { "saturation": "-100" }, { "lightness": "30" } ] }, { "featureType": "water", "elementType": "all", "stylers": [ { "color": "#d2d2d2" }, { "visibility": "on" } ] } ]';
        }
        if(isset($map_style) && $map_style == 'map_light_blue') {
            $customstyle_map = '[ { "featureType": "all", "elementType": "all", "stylers": [ { "hue": "#e7ecf0" } ] }, { "featureType": "administrative", "elementType": "labels.text.fill", "stylers": [ { "color": "#636c81" } ] }, { "featureType": "administrative.neighborhood", "elementType": "labels.text.fill", "stylers": [ { "color": "#636c81" } ] }, { "featureType": "administrative.land_parcel", "elementType": "labels.text.fill", "stylers": [ { "color": "#ff0000" } ] }, { "featureType": "landscape", "elementType": "geometry.fill", "stylers": [ { "color": "#f1f4f6" } ] }, { "featureType": "landscape", "elementType": "labels.text.fill", "stylers": [ { "color": "#496271" } ] }, { "featureType": "poi", "elementType": "all", "stylers": [ { "visibility": "off" } ] }, { "featureType": "road", "elementType": "all", "stylers": [ { "saturation": -70 } ] }, { "featureType": "road", "elementType": "geometry.fill", "stylers": [ { "color": "#ffffff" } ] }, { "featureType": "road", "elementType": "geometry.stroke", "stylers": [ { "color": "#c6d3dc" } ] }, { "featureType": "road", "elementType": "labels.text.fill", "stylers": [ { "color": "#898e9b" } ] }, { "featureType": "transit", "elementType": "all", "stylers": [ { "visibility": "off" } ] }, { "featureType": "water", "elementType": "all", "stylers": [ { "visibility": "simplified" }, { "saturation": -60 } ] }, { "featureType": "water", "elementType": "geometry.fill", "stylers": [ { "color": "#d3eaf8" } ] } ]';
        }
        if(isset($map_style) && $map_style == 'map_grey_blue') {
            $customstyle_map = '[ { "featureType": "administrative", "elementType": "labels.text.fill", "stylers": [ { "color": "#444444" } ] }, { "featureType": "landscape", "elementType": "all", "stylers": [ { "color": "#f2f2f2" } ] }, { "featureType": "poi", "elementType": "all", "stylers": [ { "visibility": "off" } ] }, { "featureType": "poi.business", "elementType": "geometry.fill", "stylers": [ { "visibility": "on" } ] }, { "featureType": "road", "elementType": "all", "stylers": [ { "saturation": -100 }, { "lightness": 45 } ] }, { "featureType": "road.highway", "elementType": "all", "stylers": [ { "visibility": "simplified" } ] }, { "featureType": "road.arterial", "elementType": "labels.icon", "stylers": [ { "visibility": "off" } ] }, { "featureType": "transit", "elementType": "all", "stylers": [ { "visibility": "on" } ] }, { "featureType": "transit", "elementType": "labels", "stylers": [ { "visibility": "off" } ] }, { "featureType": "water", "elementType": "all", "stylers": [ { "color": "#b2d0e3" }, { "visibility": "on" } ] } ]';
        }
        if(isset($map_style) && $map_style == 'map_flat') {
            $customstyle_map = '[ { "featureType": "poi", "elementType": "labels.text.fill", "stylers": [ { "color": "#747474" }, { "lightness": "23" } ] }, { "featureType": "poi.attraction", "elementType": "geometry.fill", "stylers": [ { "color": "#f38eb0" } ] }, { "featureType": "poi.government", "elementType": "geometry.fill", "stylers": [ { "color": "#ced7db" } ] }, { "featureType": "poi.medical", "elementType": "geometry.fill", "stylers": [ { "color": "#ffa5a8" } ] }, { "featureType": "poi.park", "elementType": "geometry.fill", "stylers": [ { "color": "#c7e5c8" } ] }, { "featureType": "poi.place_of_worship", "elementType": "geometry.fill", "stylers": [ { "color": "#d6cbc7" } ] }, { "featureType": "poi.school", "elementType": "geometry.fill", "stylers": [ { "color": "#c4c9e8" } ] }, { "featureType": "poi.sports_complex", "elementType": "geometry.fill", "stylers": [ { "color": "#b1eaf1" } ] }, { "featureType": "road", "elementType": "geometry", "stylers": [ { "lightness": "100" } ] }, { "featureType": "road", "elementType": "labels", "stylers": [ { "visibility": "off" }, { "lightness": "100" } ] }, { "featureType": "road.highway", "elementType": "geometry.fill", "stylers": [ { "color": "#ffd4a5" } ] }, { "featureType": "road.arterial", "elementType": "geometry.fill", "stylers": [ { "color": "#ffe9d2" } ] }, { "featureType": "road.local", "elementType": "all", "stylers": [ { "visibility": "simplified" } ] }, { "featureType": "road.local", "elementType": "geometry.fill", "stylers": [ { "weight": "3.00" } ] }, { "featureType": "road.local", "elementType": "geometry.stroke", "stylers": [ { "weight": "0.30" } ] }, { "featureType": "road.local", "elementType": "labels.text", "stylers": [ { "visibility": "on" } ] }, { "featureType": "road.local", "elementType": "labels.text.fill", "stylers": [ { "color": "#747474" }, { "lightness": "36" } ] }, { "featureType": "road.local", "elementType": "labels.text.stroke", "stylers": [ { "color": "#e9e5dc" }, { "lightness": "30" } ] }, { "featureType": "transit.line", "elementType": "geometry", "stylers": [ { "visibility": "on" }, { "lightness": "100" } ] }, { "featureType": "water", "elementType": "all", "stylers": [ { "color": "#d2e7f7" } ] } ]';
        }
        if(isset($map_style) && $map_style == 'map_pastel') {
            $customstyle_map = '[ { "featureType": "landscape", "stylers": [ { "saturation": -100 }, { "lightness": 60 } ] }, { "featureType": "road.local", "stylers": [ { "saturation": -100 }, { "lightness": 40 }, { "visibility": "on" } ] }, { "featureType": "transit", "stylers": [ { "saturation": -100 }, { "visibility": "simplified" } ] }, { "featureType": "administrative.province", "stylers": [ { "visibility": "off" } ] }, { "featureType": "water", "stylers": [ { "visibility": "on" }, { "lightness": 30 } ] }, { "featureType": "road.highway", "elementType": "geometry.fill", "stylers": [ { "color": "#ef8c25" }, { "lightness": 40 } ] }, { "featureType": "road.highway", "elementType": "geometry.stroke", "stylers": [ { "visibility": "off" } ] }, { "featureType": "poi.park", "elementType": "geometry.fill", "stylers": [ { "color": "#b6c54c" }, { "lightness": 40 }, { "saturation": -40 } ] }, {} ]';
        }
        if(isset($map_style) && $map_style == 'map_green') {
            $customstyle_map = '[ { "featureType": "administrative", "elementType": "all", "stylers": [ { "visibility": "off" } ] }, { "featureType": "administrative", "elementType": "geometry.stroke", "stylers": [ { "visibility": "on" } ] }, { "featureType": "administrative", "elementType": "labels", "stylers": [ { "visibility": "on" }, { "color": "#716464" }, { "weight": "0.01" } ] }, { "featureType": "administrative.country", "elementType": "labels", "stylers": [ { "visibility": "on" } ] }, { "featureType": "landscape", "elementType": "all", "stylers": [ { "visibility": "simplified" } ] }, { "featureType": "landscape.natural", "elementType": "geometry", "stylers": [ { "visibility": "simplified" } ] }, { "featureType": "landscape.natural.landcover", "elementType": "geometry", "stylers": [ { "visibility": "simplified" } ] }, { "featureType": "poi", "elementType": "all", "stylers": [ { "visibility": "simplified" } ] }, { "featureType": "poi", "elementType": "geometry.fill", "stylers": [ { "visibility": "simplified" } ] }, { "featureType": "poi", "elementType": "geometry.stroke", "stylers": [ { "visibility": "simplified" } ] }, { "featureType": "poi", "elementType": "labels.text", "stylers": [ { "visibility": "simplified" } ] }, { "featureType": "poi", "elementType": "labels.text.fill", "stylers": [ { "visibility": "simplified" } ] }, { "featureType": "poi", "elementType": "labels.text.stroke", "stylers": [ { "visibility": "simplified" } ] }, { "featureType": "poi.attraction", "elementType": "geometry", "stylers": [ { "visibility": "on" } ] }, { "featureType": "road", "elementType": "all", "stylers": [ { "visibility": "on" } ] }, { "featureType": "road.highway", "elementType": "all", "stylers": [ { "visibility": "off" } ] }, { "featureType": "road.highway", "elementType": "geometry", "stylers": [ { "visibility": "on" } ] }, { "featureType": "road.highway", "elementType": "geometry.fill", "stylers": [ { "visibility": "on" } ] }, { "featureType": "road.highway", "elementType": "geometry.stroke", "stylers": [ { "visibility": "simplified" }, { "color": "#a05519" }, { "saturation": "-13" } ] }, { "featureType": "road.local", "elementType": "all", "stylers": [ { "visibility": "on" } ] }, { "featureType": "transit", "elementType": "all", "stylers": [ { "visibility": "simplified" } ] }, { "featureType": "transit", "elementType": "geometry", "stylers": [ { "visibility": "simplified" } ] }, { "featureType": "transit.station", "elementType": "geometry", "stylers": [ { "visibility": "on" } ] }, { "featureType": "water", "elementType": "all", "stylers": [ { "visibility": "simplified" }, { "color": "#84afa3" }, { "lightness": 52 } ] }, { "featureType": "water", "elementType": "geometry", "stylers": [ { "visibility": "on" } ] }, { "featureType": "water", "elementType": "geometry.fill", "stylers": [ { "visibility": "on" } ] } ]';
        }
        if(isset($map_style) && $map_style == 'map_blue') {
            $customstyle_map = '[ { "featureType": "all", "elementType": "labels.text.fill", "stylers": [ { "color": "#7c93a3" }, { "lightness": "-10" } ] }, { "featureType": "administrative.country", "elementType": "geometry", "stylers": [ { "visibility": "on" } ] }, { "featureType": "administrative.country", "elementType": "geometry.stroke", "stylers": [ { "color": "#a0a4a5" } ] }, { "featureType": "administrative.province", "elementType": "geometry.stroke", "stylers": [ { "color": "#62838e" } ] }, { "featureType": "landscape", "elementType": "geometry.fill", "stylers": [ { "color": "#dde3e3" } ] }, { "featureType": "landscape.man_made", "elementType": "geometry.stroke", "stylers": [ { "color": "#3f4a51" }, { "weight": "0.30" } ] }, { "featureType": "poi", "elementType": "all", "stylers": [ { "visibility": "simplified" } ] }, { "featureType": "poi.attraction", "elementType": "all", "stylers": [ { "visibility": "on" } ] }, { "featureType": "poi.business", "elementType": "all", "stylers": [ { "visibility": "off" } ] }, { "featureType": "poi.government", "elementType": "all", "stylers": [ { "visibility": "off" } ] }, { "featureType": "poi.park", "elementType": "all", "stylers": [ { "visibility": "on" } ] }, { "featureType": "poi.place_of_worship", "elementType": "all", "stylers": [ { "visibility": "off" } ] }, { "featureType": "poi.school", "elementType": "all", "stylers": [ { "visibility": "off" } ] }, { "featureType": "poi.sports_complex", "elementType": "all", "stylers": [ { "visibility": "off" } ] }, { "featureType": "road", "elementType": "all", "stylers": [ { "saturation": "-100" }, { "visibility": "on" } ] }, { "featureType": "road", "elementType": "geometry.stroke", "stylers": [ { "visibility": "on" } ] }, { "featureType": "road.highway", "elementType": "geometry.fill", "stylers": [ { "color": "#bbcacf" } ] }, { "featureType": "road.highway", "elementType": "geometry.stroke", "stylers": [ { "lightness": "0" }, { "color": "#bbcacf" }, { "weight": "0.50" } ] }, { "featureType": "road.highway", "elementType": "labels", "stylers": [ { "visibility": "on" } ] }, { "featureType": "road.highway", "elementType": "labels.text", "stylers": [ { "visibility": "on" } ] }, { "featureType": "road.highway.controlled_access", "elementType": "geometry.fill", "stylers": [ { "color": "#ffffff" } ] }, { "featureType": "road.highway.controlled_access", "elementType": "geometry.stroke", "stylers": [ { "color": "#a9b4b8" } ] }, { "featureType": "road.arterial", "elementType": "labels.icon", "stylers": [ { "invert_lightness": true }, { "saturation": "-7" }, { "lightness": "3" }, { "gamma": "1.80" }, { "weight": "0.01" } ] }, { "featureType": "transit", "elementType": "all", "stylers": [ { "visibility": "off" } ] }, { "featureType": "water", "elementType": "geometry.fill", "stylers": [ { "color": "#a3c7df" } ] } ]';
        }
        if(isset($map_style) && $map_style == 'map_pale_dawn') {
            $customstyle_map = '[ { "featureType": "administrative", "elementType": "all", "stylers": [ { "visibility": "on" }, { "lightness": 33 } ] }, { "featureType": "landscape", "elementType": "all", "stylers": [ { "color": "#f2e5d4" } ] }, { "featureType": "poi.park", "elementType": "geometry", "stylers": [ { "color": "#c5dac6" } ] }, { "featureType": "poi.park", "elementType": "labels", "stylers": [ { "visibility": "on" }, { "lightness": 20 } ] }, { "featureType": "road", "elementType": "all", "stylers": [ { "lightness": 20 } ] }, { "featureType": "road.highway", "elementType": "geometry", "stylers": [ { "color": "#c5c6c6" } ] }, { "featureType": "road.arterial", "elementType": "geometry", "stylers": [ { "color": "#e4d7c6" } ] }, { "featureType": "road.local", "elementType": "geometry", "stylers": [ { "color": "#fbfaf7" } ] }, { "featureType": "water", "elementType": "all", "stylers": [ { "visibility": "on" }, { "color": "#acbcc9" } ] } ]';
        }
        if(isset($map_style) && $map_style == 'map_dark') {
            $customstyle_map = '[ { "featureType": "all", "elementType": "labels.text.fill", "stylers": [ { "saturation": 36 }, { "color": "#000000" }, { "lightness": 40 } ] }, { "featureType": "all", "elementType": "labels.text.stroke", "stylers": [ { "visibility": "on" }, { "color": "#000000" }, { "lightness": 16 } ] }, { "featureType": "all", "elementType": "labels.icon", "stylers": [ { "visibility": "off" } ] }, { "featureType": "administrative", "elementType": "geometry.fill", "stylers": [ { "color": "#000000" }, { "lightness": 20 } ] }, { "featureType": "administrative", "elementType": "geometry.stroke", "stylers": [ { "color": "#000000" }, { "lightness": 17 }, { "weight": 1.2 } ] }, { "featureType": "administrative", "elementType": "labels", "stylers": [ { "visibility": "off" } ] }, { "featureType": "administrative.country", "elementType": "all", "stylers": [ { "visibility": "simplified" } ] }, { "featureType": "administrative.country", "elementType": "geometry", "stylers": [ { "visibility": "simplified" } ] }, { "featureType": "administrative.country", "elementType": "labels.text", "stylers": [ { "visibility": "simplified" } ] }, { "featureType": "administrative.province", "elementType": "all", "stylers": [ { "visibility": "off" } ] }, { "featureType": "administrative.locality", "elementType": "all", "stylers": [ { "visibility": "simplified" }, { "saturation": "-100" }, { "lightness": "30" } ] }, { "featureType": "administrative.neighborhood", "elementType": "all", "stylers": [ { "visibility": "off" } ] }, { "featureType": "administrative.land_parcel", "elementType": "all", "stylers": [ { "visibility": "off" } ] }, { "featureType": "landscape", "elementType": "all", "stylers": [ { "visibility": "simplified" }, { "gamma": "0.00" }, { "lightness": "74" } ] }, { "featureType": "landscape", "elementType": "geometry", "stylers": [ { "color": "#000000" }, { "lightness": 20 } ] }, { "featureType": "landscape.man_made", "elementType": "all", "stylers": [ { "lightness": "3" } ] }, { "featureType": "poi", "elementType": "all", "stylers": [ { "visibility": "off" } ] }, { "featureType": "poi", "elementType": "geometry", "stylers": [ { "color": "#000000" }, { "lightness": 21 } ] }, { "featureType": "road", "elementType": "geometry", "stylers": [ { "visibility": "simplified" } ] }, { "featureType": "road.highway", "elementType": "geometry.fill", "stylers": [ { "color": "#000000" }, { "lightness": 17 } ] }, { "featureType": "road.highway", "elementType": "geometry.stroke", "stylers": [ { "color": "#000000" }, { "lightness": 29 }, { "weight": 0.2 } ] }, { "featureType": "road.arterial", "elementType": "geometry", "stylers": [ { "color": "#000000" }, { "lightness": 18 } ] }, { "featureType": "road.local", "elementType": "geometry", "stylers": [ { "color": "#000000" }, { "lightness": 16 } ] }, { "featureType": "transit", "elementType": "geometry", "stylers": [ { "color": "#000000" }, { "lightness": 19 } ] }, { "featureType": "water", "elementType": "geometry", "stylers": [ { "color": "#000000" }, { "lightness": 17 } ] } ]';
        }
        if(isset($map_style) && $map_style == 'map_dark2') {
            $customstyle_map = '[ { "elementType": "geometry", "stylers": [ { "color": "#242f3e" } ] }, { "elementType": "labels.text.fill", "stylers": [ { "color": "#746855" } ] }, { "elementType": "labels.text.stroke", "stylers": [ { "color": "#242f3e" } ] }, { "featureType": "administrative.locality", "elementType": "labels.text.fill", "stylers": [ { "color": "#d59563" } ] }, { "featureType": "poi", "elementType": "labels.text.fill", "stylers": [ { "color": "#d59563" } ] }, { "featureType": "poi.park", "elementType": "geometry", "stylers": [ { "color": "#263c3f" } ] }, { "featureType": "poi.park", "elementType": "labels.text.fill", "stylers": [ { "color": "#6b9a76" } ] }, { "featureType": "road", "elementType": "geometry", "stylers": [ { "color": "#38414e" } ] }, { "featureType": "road", "elementType": "geometry.stroke", "stylers": [ { "color": "#212a37" } ] }, { "featureType": "road", "elementType": "labels.text.fill", "stylers": [ { "color": "#9ca5b3" } ] }, { "featureType": "road.highway", "elementType": "geometry", "stylers": [ { "color": "#746855" } ] }, { "featureType": "road.highway", "elementType": "geometry.stroke", "stylers": [ { "color": "#1f2835" } ] }, { "featureType": "road.highway", "elementType": "labels.text.fill", "stylers": [ { "color": "#f3d19c" } ] }, { "featureType": "transit", "elementType": "geometry", "stylers": [ { "color": "#2f3948" } ] }, { "featureType": "transit.station", "elementType": "labels.text.fill", "stylers": [ { "color": "#d59563" } ] }, { "featureType": "water", "elementType": "geometry", "stylers": [ { "color": "#17263c" } ] }, { "featureType": "water", "elementType": "labels.text.fill", "stylers": [ { "color": "#515c6d" } ] }, { "featureType": "water", "elementType": "labels.text.stroke", "stylers": [ { "color": "#17263c" } ] } ]';
        }
        if(isset($map_style) && $map_style == 'map_trendsetter') {
            $customstyle_map = '[{"featureType":"administrative","elementType":"labels.text.fill","stylers":[{"color":"#444444"}]},{"featureType":"administrative.country","elementType":"labels.text.fill","stylers":[{"color":"#7d594d"}]},{"featureType":"administrative.province","elementType":"labels.text.fill","stylers":[{"color":"#7d594d"}]},{"featureType":"administrative.locality","elementType":"all","stylers":[{"visibility":"on"}]},{"featureType":"administrative.locality","elementType":"labels.text.fill","stylers":[{"color":"#7d594d"}]},{"featureType":"administrative.neighborhood","elementType":"all","stylers":[{"visibility":"off"}]},{"featureType":"administrative.neighborhood","elementType":"labels.text.fill","stylers":[{"color":"#7d594d"}]},{"featureType":"administrative.land_parcel","elementType":"labels.text.fill","stylers":[{"color":"#7d594d"},{"visibility":"on"}]},{"featureType":"landscape","elementType":"all","stylers":[{"visibility":"on"}]},{"featureType":"landscape","elementType":"geometry","stylers":[{"visibility":"on"}]},{"featureType":"poi","elementType":"all","stylers":[{"visibility":"off"}]},{"featureType":"poi.attraction","elementType":"all","stylers":[{"visibility":"off"}]},{"featureType":"poi.business","elementType":"all","stylers":[{"visibility":"off"}]},{"featureType":"poi.government","elementType":"all","stylers":[{"visibility":"off"}]},{"featureType":"poi.park","elementType":"all","stylers":[{"visibility":"simplified"},{"color":"#f6f6f6"}]},{"featureType":"road","elementType":"all","stylers":[{"visibility":"off"},{"weight":"1.01"}]},{"featureType":"road","elementType":"geometry","stylers":[{"visibility":"on"},{"color":"#b67c5a"}]},{"featureType":"road","elementType":"geometry.fill","stylers":[{"visibility":"off"}]},{"featureType":"road","elementType":"geometry.stroke","stylers":[{"visibility":"off"}]},{"featureType":"road","elementType":"labels","stylers":[{"visibility":"on"}]},{"featureType":"road","elementType":"labels.text","stylers":[{"visibility":"on"}]},{"featureType":"road","elementType":"labels.text.fill","stylers":[{"visibility":"on"}]},{"featureType":"road","elementType":"labels.text.stroke","stylers":[{"visibility":"on"}]},{"featureType":"road","elementType":"labels.icon","stylers":[{"visibility":"off"}]},{"featureType":"road.highway","elementType":"all","stylers":[{"visibility":"simplified"}]},{"featureType":"road.arterial","elementType":"all","stylers":[{"visibility":"simplified"}]},{"featureType":"road.arterial","elementType":"labels.text.fill","stylers":[{"color":"#7d594d"},{"lightness":"20"}]},{"featureType":"road.arterial","elementType":"labels.icon","stylers":[{"visibility":"off"}]},{"featureType":"road.local","elementType":"all","stylers":[{"visibility":"simplified"}]},{"featureType":"road.local","elementType":"geometry","stylers":[{"visibility":"on"}]},{"featureType":"road.local","elementType":"labels.text.fill","stylers":[{"color":"#7d594d"},{"lightness":"31"}]},{"featureType":"transit","elementType":"all","stylers":[{"visibility":"on"}]},{"featureType":"transit","elementType":"geometry","stylers":[{"visibility":"on"}]},{"featureType":"transit","elementType":"geometry.fill","stylers":[{"visibility":"on"}]},{"featureType":"transit","elementType":"geometry.stroke","stylers":[{"visibility":"on"}]},{"featureType":"transit","elementType":"labels","stylers":[{"visibility":"on"}]},{"featureType":"transit","elementType":"labels.text","stylers":[{"visibility":"on"}]},{"featureType":"transit","elementType":"labels.text.fill","stylers":[{"visibility":"on"}]},{"featureType":"transit","elementType":"labels.text.stroke","stylers":[{"visibility":"on"}]},{"featureType":"transit","elementType":"labels.icon","stylers":[{"visibility":"on"}]},{"featureType":"water","elementType":"all","stylers":[{"color":"#ddd5cb"},{"visibility":"on"}]},{"featureType":"water","elementType":"geometry.fill","stylers":[{"color":"#d0cbc3"}]}]';
        }



        if(isset($map_style) && $map_style != 'map_default_style') {
            $map_style_js='styles:'.$customstyle_map.'';
        }

        if(isset($size) && $size != '') {
            $google_size = 'height:'.$size.'px;';
        }



        $image_done = wp_get_attachment_image_src($map_img, 'full');





        $google_style_css = ($google_size ) ? 'style=' . $google_size . '' : '';

        $css_class = preg_replace( '/\s+/', ' ', implode( ' ', array_filter( array_unique( $css_classes ) ) ) );


        $result .= '<div class="' . esc_attr( trim( $css_class ) ) . '" '.$google_style_css . implode( ' ', $wrapper_attributes ).'>';

        $result.= '</div>';

        $result .= '<script>
                        jQuery.noConflict()(function ($) {
                            $(".'.$vc_init.'").gmap3({
                                 marker: {
                                    address: "'.$address.'",
                                    options: {
                                        icon: "'.$image_done[0].'"
                                    }
                                },map: {
                                    options: { 
                                        zoom:'.$zoom.',
                                        scrollwheel: '.$map_scrollwheel.',
                                        draggable: true,
                                        mapTypeControl: true,
                                        '.$map_style_js.'
                                    }
                                 }
                              });
                        }); 
                    </script>';

        // Responsive CSS Box
        if(isset($custom_responsive_option) && $custom_responsive_option !='off') {
            $fl_helping_responsive_style .= $responsive_style;
        }

        return $result;
    }
}
add_shortcode('vc_fl_google_map', 'vc_fl_google_map_function');

