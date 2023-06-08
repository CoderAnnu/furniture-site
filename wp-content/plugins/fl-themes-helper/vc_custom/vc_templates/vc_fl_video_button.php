<?php
/*
 * Shortcode Button
 */

if ( ! defined( 'ABSPATH' ) ) { exit; }
if ( ! function_exists( 'vc_fl_video_button_function' ) ) {
    function vc_fl_video_button_function($atts, $content = null)
    {

        $css_classes[] = 'fl-video-btn-wrapper-vc';

        $btn_css_classes[] = 'video-btn venobox vbox-item ';

        global $fl_helping_responsive_style, $fl_helping_css_style;

        $atts = vc_map_get_attributes('vc_fl_video_button', $atts);
        extract($atts);

        //Button sizes
        $result = $wrapper_attributes[] =$button_container_wrapper_attributes[]= $responsive_style = $css = '';



        $css_classes[] .= fl_get_css_tab_class($atts);

        if(isset($id) && $id != '') {
            $wrapper_attributes[] = 'id="'.fl_sanitize_class($id).'"';
        }

        if(isset($class) && $class != '') {
            $css_classes[] .= fl_sanitize_class($class);
        }

        $custom_html_class = uniqid('fl-vc-video-button').'-'.rand(100,9999);

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


        //HTML Class
        if(isset($btn_wrap) && $btn_wrap != ''){
            $css_classes[] = $btn_wrap;
        }
        if(isset($btn_align) && $btn_align != '') {
            $css_classes[] = $btn_align;
        }
        // Button Size
        if(isset($size) && $size != '') {
            $btn_css_classes[] = $size;
        }
        // Button Style
        if(isset($color_style) && $color_style != '') {
            $btn_css_classes[] = $color_style;
        }


        // Custom Color Setting
        // Text color
        if ( ! empty( $text_color ) && ($text_color !='')) {
            $css_classes[] = $custom_html_class;
            $fl_helping_css_style[] = '.' . $custom_html_class . ' .video-btn-text{ color:' . $text_color . '!important; }';
        }



        //Btn link
        $tag_link = 'span'; $link_atts='';
        if ( fl_check_option($link) && function_exists('vc_build_link')) {
            $link = vc_build_link($link);
            if(isset($link['url']) && $link['url']) {
                $tag_link = 'a';
                $link_atts = ' href="' . esc_attr($link['url']) . '"';

                if(isset($link['title']) && $link['title']) {
                    $link_atts .= ' title="' . esc_attr($link['title']) . '"';
                }
                if(isset($link['target']) && $link['target']) {
                    $link_atts .= ' target="' . esc_attr(trim($link['target'])) . '"';
                }
                if(isset($link['rel']) && $link['rel']) {
                    $link_atts .= ' rel="' . esc_attr(trim($link['rel'])) . '"';
                }
            }
            $link_atts .=' data-vbtype="video" data-autoplay="true"';
        }


        $btn_css_class = preg_replace( '/\s+/', ' ', implode( ' ', array_filter( array_unique( $btn_css_classes ) ) ) );


        $btn = '<'.$tag_link.' class="' . esc_attr( trim( $btn_css_class ) ) . '" '.$link_atts.'><i class="fa fa-play"></i><div class="pulsing-bg"></div></'.$tag_link.'>';


        $css_class = preg_replace( '/\s+/', ' ', implode( ' ', array_filter( array_unique( $css_classes ) ) ) );

        $result .= '<div class="' . esc_attr( trim( $css_class ) ) .' " '. implode( ' ', $wrapper_attributes ).'>';

             $result .= $btn;

            if(isset($btn_text) && $btn_text != '') {
                $result .= '<span class="video-btn-text fl-text-medium-style">'.$btn_text.'</span>';
            }


        $result .= '</div>';



        // Responsive CSS Box
        if(isset($custom_responsive_option) && $custom_responsive_option !='off') {
            $fl_helping_responsive_style .= $responsive_style;
        }

        return $result;
    }
}
add_shortcode('vc_fl_video_button', 'vc_fl_video_button_function');