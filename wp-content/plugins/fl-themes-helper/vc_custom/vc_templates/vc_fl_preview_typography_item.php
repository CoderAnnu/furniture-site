<?php
/*
 * Shortcode Button
 */

if ( ! defined( 'ABSPATH' ) ) { exit; }
if ( ! function_exists( 'vc_fl_preview_typography_item_function' ) ) {
    function vc_fl_preview_typography_item_function($atts, $content = null)
    {

        $css_classes[] = 'fl-preview-typography-wrapper-vc';

        global $fl_helping_responsive_style, $fl_helping_css_style;

        $atts = vc_map_get_attributes('vc_fl_preview_typography_item', $atts);
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

        $css_class = preg_replace( '/\s+/', ' ', implode( ' ', array_filter( array_unique( $css_classes ) ) ) );

        $result .= '<div class="' . esc_attr( trim( $css_class ) ) .' " '. implode( ' ', $wrapper_attributes ).'>';
            if( ! empty($preview_item) and $preview_item == 'pagination'){
                $result .='<div class="pagination fl-default-pagination cf">
                                <span class="prev page-numbers"><i class="fa fa-chevron-left"></i></span>
                                        <span aria-current="page" class="page-numbers current">1</span>
                                        <a class="page-numbers" href="#">2</a>
                                        <a class="page-numbers" href="#">3</a>                   
                                <span class="next page-numbers"><i class="fa fa-chevron-right"></i></span>
                            </div>';
            }
            if( ! empty($preview_item) and $preview_item == 'blockquote'){
                $result .='<blockquote>'.$text_content.'</blockquote>';
            }

        $result .= '</div>';



        // Responsive CSS Box
        if(isset($custom_responsive_option) && $custom_responsive_option !='off') {
            $fl_helping_responsive_style .= $responsive_style;
        }

        return $result;
    }
}
add_shortcode('vc_fl_preview_typography_item', 'vc_fl_preview_typography_item_function');