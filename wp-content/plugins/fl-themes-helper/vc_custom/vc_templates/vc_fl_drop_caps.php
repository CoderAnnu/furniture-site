<?php

if ( ! defined( 'ABSPATH' ) ) { exit; }
if ( ! function_exists( 'vc_fl_render_fl_drop_caps' ) ) {
    function vc_fl_render_fl_drop_caps($atts, $content = null)
    {

        $css_classes[] = 'fl-drop-caps-wrapper-vc';

        global $fl_helping_responsive_style, $fl_helping_css_style;

        $atts = vc_map_get_attributes('vc_fl_drop_caps', $atts);
        extract($atts);

        //Button sizes
        $result = $wrapper_attributes[] = $responsive_style = '';



        $css_classes[] .= fl_get_css_tab_class($atts);

        if(isset($id) && $id != '') {
            $wrapper_attributes[] = 'id="'.fl_sanitize_class($id).'"';
        }

        if(isset($class) && $class != '') {
            $css_classes[] .= fl_sanitize_class($class);
        }

        // Responsive CSS Box
        if(isset($custom_responsive_option) && $custom_responsive_option !='off') {
            if( !empty( $responsive_css ) && $responsive_css != '' ) {
                $responsive_id = $idf = uniqid('fl-helping-responsive-').'-'.rand(100,9999);
                $column_selector = $responsive_id;
                $responsive_style = fl_helping__addons_get_responsive_style($responsive_css, $column_selector);
                $css_classes[] .= $responsive_id;
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

        // Custom Color
        if(isset($custom_color) && $custom_color == 'on') {
            $custom_html_class = uniqid('fl-custom-').'-'.rand(100,9999);
            // Custom Color Setting
            $css_classes[] = $custom_html_class;
            // Color
            if ( ! empty( $f_letter_color ) && ($f_letter_color !='')) {
                $fl_helping_css_style[] = '.' . $custom_html_class . ' .first-letter{ color:' . $f_letter_color . '!important; }';
            }
            if ( ! empty( $f_letter_bg_cl ) && ($f_letter_bg_cl !='')) {
                $fl_helping_css_style[] = '.' . $custom_html_class . ' .first-letter{ background-color:' . $f_letter_bg_cl . '!important; }';
            }
            // Hover Color
            if ( ! empty( $text_color ) && ($text_color !='')) {
                $fl_helping_css_style[] = '.' . $custom_html_class . '{ color:' . $text_color. '!important; }';
            }

        }

        $css_class = preg_replace( '/\s+/', ' ', implode( ' ', array_filter( array_unique( $css_classes ) ) ) );

        $result .= '<div class="' . esc_attr( trim( $css_class ) ) .' " '. implode( ' ', $wrapper_attributes ).'>';

            if(  ! empty( $first_letter ) and $first_letter !=''){
                $result .= '<div class="first-letter fl-text-bold-style">'.$first_letter.'</div>';
            }

            if(  ! empty( $content ) and $content !=''){
                $result .= wpb_js_remove_wpautop($content, false);
            }

        $result .= '</div>';



        // Responsive CSS Box
        if(isset($custom_responsive_option) && $custom_responsive_option !='off') {
            $fl_helping_responsive_style .= $responsive_style;
        }

        return $result;
    }
}
add_shortcode('vc_fl_drop_caps', 'vc_fl_render_fl_drop_caps');