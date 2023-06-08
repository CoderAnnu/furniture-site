<?php
/*
 * Shortcode Button
 */

if ( ! defined( 'ABSPATH' ) ) { exit; }
if ( ! function_exists( 'vc_fl_render_fl_btn' ) ) {
    function vc_fl_render_fl_btn($atts, $content = null)
    {

        $css_classes[] = 'fl-button-wrapper-vc';

        $button_container_css_classes[] = 'fl-custom-btn';

        $btn_css_classes[] = 'fl-vc-button fl-custom-btn fl-font-style-bolt-two';

        global $fl_helping_responsive_style, $fl_helping_css_style;

        $atts = vc_map_get_attributes('vc_fl_btn', $atts);
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

        $custom_html_class = uniqid('fl-vc-button').'-'.rand(100,9999);

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
        if(isset($btn_style) && $btn_style != 'custom-colors') {
            $btn_css_classes[] = $btn_style;
        }


        if(isset($btn_style) && $btn_style == 'custom-colors' && $btn_style == 'custom-border') {
            // Custom Color Setting
            $btn_css_classes[] = $custom_html_class;
            // Background color
            if ( ! empty( $btn_cl ) && ($btn_cl !='')) {
                $fl_helping_css_style[] = '.' . $custom_html_class . '{ color:' . $btn_cl . '!important; }';
            }
            if ( ! empty( $btn_bg ) && ($btn_bg !='')) {
                $fl_helping_css_style[] = '.' . $custom_html_class . ':before{ background-color:' . $btn_bg . '!important; }';
            }
            // Hover Color
            if ( ! empty( $btn_hv_bg ) && ($btn_hv_bg !='')) {
                $fl_helping_css_style[] = '.' . $custom_html_class . ':after{ background-color:' . $btn_hv_bg . '!important; }';
            }
            if ( ! empty( $btn_hv_cl ) && ($btn_hv_cl !='')) {
                $fl_helping_css_style[] = '.' . $custom_html_class . ':hover{ color:' . $btn_hv_cl . '!important; }';
            }
        }

        if(isset($btn_style) && $btn_style == 'custom-border') {
            // Custom Color Setting
            $btn_css_classes[] = $custom_html_class;
            $btn_css_classes[] = 'border-custom-style';
            // Border Color
            if ( ! empty( $border_style_btn_cl ) && ($border_style_btn_cl !='')) {
                $fl_helping_css_style[] = '.' . $custom_html_class . '{ color:' . $border_style_btn_cl . '!important; }';
            }
            if ( ! empty( $border_style_btn_br ) && ($border_style_btn_br !='')) {
                $fl_helping_css_style[] = '.' . $custom_html_class . '{ border:1px solid ' . $border_style_btn_br . '!important; }';
            }
            // Hover Color
            if ( ! empty( $border_style_btn_hv_bg ) && ($border_style_btn_hv_bg !='')) {
                $fl_helping_css_style[] = '.' . $custom_html_class . ':after{ background-color:' . $border_style_btn_hv_bg . '!important; }.' . $custom_html_class . '{border-color:transparent!important:}';
            }
            if ( ! empty( $border_style_btn_hv_cl ) && ($border_style_btn_hv_cl !='')) {
                $fl_helping_css_style[] = '.' . $custom_html_class . ':hover{ color:' . $border_style_btn_hv_cl . '!important; }';
            }
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
        }


        $btn_css_class = preg_replace( '/\s+/', ' ', implode( ' ', array_filter( array_unique( $btn_css_classes ) ) ) );


        $btn = '<'.$tag_link.' class="' . esc_attr( trim( $btn_css_class ) ) . '" '.$link_atts.'><span>'.$btn_text.'</span></'.$tag_link.'>';


        $css_class = preg_replace( '/\s+/', ' ', implode( ' ', array_filter( array_unique( $css_classes ) ) ) );

        $result .= '<div class="' . esc_attr( trim( $css_class ) ) .' " '. implode( ' ', $wrapper_attributes ).'>';

             $result .= $btn;

        $result .= '</div>';



        // Responsive CSS Box
        if(isset($custom_responsive_option) && $custom_responsive_option !='off') {
            $fl_helping_responsive_style .= $responsive_style;
        }

        return $result;
    }
}
add_shortcode('vc_fl_btn', 'vc_fl_render_fl_btn');