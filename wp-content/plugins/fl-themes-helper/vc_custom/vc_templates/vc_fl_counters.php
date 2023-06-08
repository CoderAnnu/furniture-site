<?php
/*
 * Shortcode counters
 * */
if ( ! function_exists( 'vc_fl_counters_function' ) ) {
    function vc_fl_counters_function($atts, $content = null)
    {

        $css_classes []           = 'fl-counter-wrapper';
        $counter_css_classes[]    = 'fl-counter fl--font-style-two';

        global $fl_helping_responsive_style, $fl_helping_css_style;
        $atts = vc_map_get_attributes('vc_fl_counters', $atts);
        extract($atts);

        $result = $wrapper_attributes[] = $responsive_style = $css=$counter_wrapper_attributes []= $icon_vc =$icon='';


        $css_classes[] .= fl_get_css_tab_class($atts);

        if(isset($id) && $id != '') {
            $wrapper_attributes[] = 'id="'.fl_sanitize_class($id).'"';
        }

        if(isset($class) && $class != '') {
            $css_classes[] = fl_sanitize_class($class);
        }

        // Responsive CSS Box
        if(isset($custom_responsive_option) && $custom_responsive_option !='off') {
            if( !empty( $responsive_css ) && $responsive_css != '' ) {
                $responsive_id = $idf = uniqid('fl-helping-alert-responsive-').'-'.rand(100,9999);
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
        // Bg Position Option
        if ( ! empty( $desktop_bg_image_position ) and $desktop_bg_image_position !='' ) {
            $css_classes[] = $desktop_bg_image_position;
        }
        // Min Height Option
        if ( ! empty( $desktop_height ) and $desktop_height !='' ) {
            $wrapper_attributes[]   = 'style="min-height:'.$desktop_height.';"';
        }
        // Box Shadow
        if ( ! empty( $box_shadow_param ) and $box_shadow_param !='' ) {
            $box_shadow_html = uniqid('fl-custom-shadow-').'-'.rand(100,9999);
            $css_classes[] = $box_shadow_html;
            $fl_helping_css_style[] = '.' . $box_shadow_html . ' {'. $box_shadow_param. '}';
        }
        // HTML
        if ( ! empty( $color_style ) and $color_style !='custom-color-style') {
            $css_classes[] .= $color_style;
        }

        if(isset($count) && $count != '') {
            $counter_wrapper_attributes[] .= 'data-from="0"';
            $counter_wrapper_attributes[] .= 'data-to="'.$count.'"';
        }
        if(isset($duration) && $duration != '') {
            $counter_wrapper_attributes[] .= 'data-speed="'.$duration.'"';
        }
        if(isset($refresh_interval) && $refresh_interval != '') {
            $counter_wrapper_attributes[] .= 'data-refresh-interval="'.$refresh_interval.'"';
        }
        if(isset($text_align) && $text_align != '') {
            $css_classes[] = $text_align;
        }



// Custom Color Setting
        if ( ! empty( $custom_color ) and ($custom_color !='disable')) {

            $idf = uniqid('fl-custom-counter-').rand(100,9999);
            $css_classes[] = $idf;
            // Border color
            if (!empty($cn_cl) and ($cn_cl != '')) {
                $fl_helping_css_style[] = '.' . $idf . ' .fl-counter-pref-styles span{color:' . $cn_cl . '!important;}';
            }
            // Background color
            if (!empty($tl_cl) and ($tl_cl != '')) {
                $fl_helping_css_style[] = '.' . $idf . ' .fl-counter-list__title{ color:' . $tl_cl . '!important; }';
            }
        }




        $css_class = preg_replace( '/\s+/', ' ', implode( ' ', array_filter( array_unique( $css_classes ) ) ) );

        $counter_css_class = preg_replace( '/\s+/', ' ', implode( ' ', array_filter( array_unique( $counter_css_classes ) ) ) );

        $result .= '<div class="' . esc_attr( trim( $css_class ) ) . '" '. implode( ' ', $wrapper_attributes ).'>';

        //Style Two
                $result .='<div class="fl-counter-wrapper-inner fl--font-style-two">';
                // Count
                $result .= '<div class="fl-counter-pref-styles fl-font-style-semi-bolt">';

                // Prefix
                if(isset($preffix) && $preffix != ''){
                    $result .= '<span>'.$preffix.'</span>';
                }

                $result .= '<span class="' . esc_attr(trim($counter_css_class)) . '" ' . implode(' ', $counter_wrapper_attributes) . '>0</span>';


                if(isset($suffix) && $suffix != ''){
                    $result .= '<span>'.$suffix.'</span>';
                }

                $result .= '</div>';

                // Content
                if(isset($content) && $content != ''){

                    $result .= '<div class="fl-counter-list__title">';

                    $result .=  wpb_js_remove_wpautop($content);

                    $result .= '</div>';
                }
                $result .= '</div>';


        $result .= '</div>';

        // Responsive CSS Box
        if(isset($custom_responsive_option) && $custom_responsive_option !='off') {
            $fl_helping_responsive_style .= $responsive_style;
        }


        return $result;
    }
}
add_shortcode('vc_fl_counters', 'vc_fl_counters_function');
