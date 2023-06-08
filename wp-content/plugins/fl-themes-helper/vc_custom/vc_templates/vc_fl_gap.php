<?php
/*
 * Gap function
* */
if ( ! function_exists( 'vc_gap_function' ) ) {
    function vc_gap_function($atts, $content = null)
    {

        $css_classes[] = 'fl-vc-responsive--gap cf';

        $atts = vc_map_get_attributes('vc_gap', $atts);

        extract($atts);


        $result = $wrapper_attributes[] =  $gap_h = '';

        if(isset($height) && $height != '') {
            $gap_h = 'height:'.$height.'px;';
        }

        $text_block_css = ($gap_h ) ? 'style=' . $gap_h .  '' : '';


        // Responsive Option Start
        if( isset($custom_responsive_option) && $custom_responsive_option != 'off' ){

            if( isset($gap_height_responsive) && $gap_height_responsive != '' ){

                $responsive_class_gap = uniqid('fl-responsive-gap-').'-'.rand(100,9999);

                $css_classes [] = $responsive_class_gap;

                $css_classes [] = 'fl-vc--responsive';

                $args = array(
                    'target'      =>  $responsive_class_gap ,
                    'media_sizes' => array(
                        'height'         => $gap_height_responsive,
                    ),
                );

                $data_list = fl_helper_get_responsive_text_media_css($args);

                $wrapper_attributes[] = $data_list;

            }
        }


        $css_class = preg_replace( '/\s+/', ' ', implode( ' ', array_filter( array_unique( $css_classes ) ) ) );

        $result .= '<div class="' . esc_attr( trim( $css_class ) ) . '" '. implode( ' ', $wrapper_attributes ).' '.$text_block_css.'></div>';

        return $result;
    }
}
add_shortcode('vc_gap', 'vc_gap_function');