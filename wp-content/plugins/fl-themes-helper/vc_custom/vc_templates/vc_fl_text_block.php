<?php
if ( ! function_exists( 'vc_fl_custom_text_block_function' ) ) {
    function vc_fl_custom_text_block_function($atts, $content = null)
    {
        $css_classes[] = 'fl_custom_text__block';

        global $fl_helping_responsive_style, $fl_helping_css_style;

        $atts = vc_map_get_attributes('vc_column_text', $atts);

        extract($atts);


        $result = $wrapper_attributes[] = $css_classes[] =  '';


        $font_color = $font_size = $font_line_height = $responsive_style = $letter_spacing = '';

        $css_classes[] = fl_get_css_tab_class($atts);

        if(isset($id) && $id != '') {
            $wrapper_attributes[] = 'id="'.fl_sanitize_class($id).'"';
        }

        if(isset($class) && $class != '') {
            $css_classes[] = fl_sanitize_class($class);
        }

        $custom_class_text = uniqid('fl-custom-text-').'-'.rand(100,9999);

        $css_classes [] = $custom_class_text;

        // Responsive CSS Box
        if(isset($custom_responsive_option) && $custom_responsive_option !='off') {
            if( !empty( $responsive_css ) && $responsive_css != '' ) {
                $responsive_id = $idf = uniqid('fl-helping-responsive-').'-'.rand(100,9999);
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

        // Text Responsive Option Start
        if( isset($custom_responsive_option_text) && $custom_responsive_option_text != 'off' ){
            // Custom Class
            if( isset($text_font_size_responsive) && $text_font_size_responsive != '' || isset($text_line_height_responsive) && $text_line_height_responsive != ''
                || isset($text_letter_spacing_responsive) && $text_letter_spacing_responsive != '' ){

                $css_classes [] = 'fl-vc--responsive';

                $args = array(
                    'target'      =>  $custom_class_text ,  // set targeted element e.g. unique class/id etc.
                    'media_sizes' => array(
                        'font-size'         => $text_font_size_responsive,
                        'line-height'       => $text_line_height_responsive,
                        'letter-spacing'    => $text_letter_spacing_responsive,
                    ),
                );

                $data_list = fl_helper_get_responsive_text_media_css($args);

                $wrapper_attributes[] = $data_list;

            }
        }


        // Custom Style


        if(isset($ft_size) && $ft_size != '') {
            $font_size = 'font-size:' . $ft_size . 'px;';
        }
        if(isset($text_color) && $text_color != '') {
            $font_color = 'color:' . $text_color . ';';
        }
        if(isset($ln_height) && $ln_height != '') {
            $font_line_height = 'line-height:' . $ln_height . 'px;';
        }
        if(isset($l_spacing) && $l_spacing != '') {
            $letter_spacing = 'letter-spacing:' . $l_spacing . 'px;';
        }


        $fl_helping_css_style[] = ( $font_color || $font_size || $font_line_height || $letter_spacing ) ? '.' . $custom_class_text . ' {'. $font_color . $font_size . $font_line_height. $letter_spacing. '}' : '';



        $css_class = preg_replace( '/\s+/', ' ', implode( ' ', array_filter( array_unique( $css_classes ) ) ) );

        $result .= '<div class="' . esc_attr( trim( $css_class ) ) . '" '. implode( ' ', $wrapper_attributes ).'>';

        $result .= wpb_js_remove_wpautop($content, true);

        $result .= '</div>';

        // Responsive CSS Box
        if(isset($custom_responsive_option) && $custom_responsive_option !='off') {
            $fl_helping_responsive_style .= $responsive_style;
        }

        return $result;
    }
}


add_shortcode('vc_column_text', 'vc_fl_custom_text_block_function');

