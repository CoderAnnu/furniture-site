<?php
if ( ! function_exists( 'vc_fl_title_function' ) ) {
    function vc_fl_title_function($atts, $content = null)
    {
        $css_classes[]              = 'fl-vc-custom-title-container';

        $title_css_classes[]        = 'fl-title-vc';

        $subtitle_css_classes[]     = 'fl-subtitle-vc fl-font-style-bolt';

        global $fl_helping_responsive_style, $fl_helping_css_style;

        $atts = vc_map_get_attributes('vc_fl_title', $atts);

        extract($atts);


        $result = $wrapper_attributes[]=$title_wrapper_attributes[]=$subtitle_wrapper_attributes[]=$responsive_style='';



        $css_classes[] = fl_get_css_tab_class($atts);

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
        // Style HTML class
        if ( ! empty($title_text_align ) and ($title_text_align !='')) {
            $css_classes[] .= $title_text_align;
        }
        if ( ! empty($title_style_text ) and ($title_style_text !='title_default')) {
            $css_classes[] .= $title_style_text;
        }


        if ( ! empty($title_style_text ) and ($title_style_text =='title_default')) {
            $title_css_classes [] = 'vc-default-title';
        } elseif( ! empty($title_style_text ) and ($title_style_text =='custom-title')){
            if(isset($subtitle_style) && $subtitle_style != 'subtitle-custom-color'){
                $subtitle_css_classes []= $subtitle_style;
            }

        }

        if (isset($title_style_font_weight) && $title_style_font_weight != ''){
            $title_css_classes [] = $title_style_font_weight;
        }

        // Title Style Start
        $tl_cl = $tl_mt = $tl_mb ='';
        if (isset($title_font_options) && $title_font_options != ''
            || isset($custom_title_google_fonts) && $custom_title_google_fonts != 'off'
            || isset($title_custom_fonts) && $title_custom_fonts != '') {
            $title_options = _fl_parse_text_params($title_font_options, $custom_title_google_fonts, $title_custom_fonts,true);
        }

        if (isset($title_options['style']) && $title_options['style'] != ''
            || isset($title_color) && $title_color != ''
            || isset($title_mt) && $title_mt != ''
            || isset($title_mb) && $title_mb != '') {
            $custom_title_class = uniqid('fl-custom-title-').'-'.rand(100,9999);
            $title_css_classes []= $custom_title_class;
            if (isset($title_color) && $title_color != '') {
                $tl_cl = 'color:' . $title_color . '!important;';
            }
            if (isset($title_mt) && $title_mt != '') {
                $tl_mt = 'margin-top:' . $title_mt . 'px!important;';
            }
            if (isset($title_mb) && $title_mb != '') {
                $tl_mb = 'margin-bottom:' . $title_mb . 'px!important;';
            }

            $fl_helping_css_style[] = ( $title_options['style'] || $tl_cl || $tl_mt || $tl_mb ) ? '.' . $custom_title_class . ' {'. $tl_cl . $tl_mt . $tl_mb .$title_options['style'] .  '}' : '';
         }



        // Responsive Title Style Start
        if( isset($custom_responsive_option_title) && $custom_responsive_option_title != 'off' ){
            // Custom Class
            if( isset($title_font_size_responsive) && $title_font_size_responsive != ''
                || isset($title_line_height_responsive) && $title_line_height_responsive != ''
                || isset($title_letter_spacing_responsive) && $title_letter_spacing_responsive != ''
                || isset($title_margin_top_responsive) && $title_margin_top_responsive != ''
                || isset($title_margin_bottom_responsive) && $title_margin_bottom_responsive != ''){

                $responsive_class_text = uniqid('fl-title-responsive-').'-'.rand(100,9999);

                $title_css_classes [] = $responsive_class_text;

                $title_css_classes [] = 'fl-vc--responsive';

                $args = array(
                    'target'      =>  $responsive_class_text ,  // set targeted element e.g. unique class/id etc.
                    'media_sizes' => array(
                        'font-size'         => $title_font_size_responsive,
                        'line-height'       => $title_line_height_responsive,
                        'letter-spacing'    => $title_letter_spacing_responsive,
                        'margin-top'        => $title_margin_top_responsive,
                        'margin-bottom'     => $title_margin_bottom_responsive,
                    ),
                );

                $data_list = fl_helper_get_responsive_text_media_css($args);

                $title_wrapper_attributes[] = $data_list;

            }
        }

        // Subtitle Style Start
        $subtl_cl = $subtl_bg = $subtl_mt = $subtl_mb ='';
        if (isset($subtitle_font_options) && $subtitle_font_options != ''
            || isset($custom_subtitle_google_fonts) && $custom_subtitle_google_fonts != 'off'
            || isset($subtitle_custom_fonts) && $subtitle_custom_fonts != '') {
            $subtitle_options = _fl_parse_text_params($subtitle_font_options, $custom_subtitle_google_fonts, $subtitle_custom_fonts);
        }

        if (isset($subtitle_options['style']) && $subtitle_options['style'] != ''
            || isset($subtitle_color) && $subtitle_color != ''
            || isset($subtitle_mt) && $subtitle_mt != ''
            || isset($subtitle_mb) && $subtitle_mb != ''
            || isset($subtitle_color_bg) && $subtitle_color_bg != '') {
            $custom_subtitle_class = uniqid('fl-custom-subtitle-').'-'.rand(100,9999);
            $subtitle_css_classes []= $custom_subtitle_class;

            if (isset($subtitle_mt) && $subtitle_mt != '') {
                $subtl_mt = 'margin-top:' . $subtitle_mt . 'px;';
            }
            if (isset($subtitle_mb) && $subtitle_mb != '') {
                $subtl_mb = 'margin-bottom:' . $subtitle_mb . 'px;';
            }


            // Custom Color setting
            if(isset($subtitle_style) && $subtitle_style == 'subtitle-custom-color'){
                if (isset($subtitle_color) && $subtitle_color != '') {
                    $subtl_cl = 'color:' . $subtitle_color . '!important;';
                }
                if (isset($subtitle_color_bg) && $subtitle_color_bg != '') {
                    $subtl_bg = 'background-color:' . $subtitle_color_bg . '!important;';
                }
            }


            $fl_helping_css_style[] = ( $subtitle_options['style'] || $subtl_cl || $subtl_mt || $subtl_mb || $subtl_bg ) ? '.' . $custom_subtitle_class . ' {'. $subtl_cl . $subtl_bg . $subtl_mt . $subtl_mb .$subtitle_options['style'] .  '}' : '';
        }

        // Responsive Subtitle Style Start
        if( isset($custom_responsive_option_subtitle) && $custom_responsive_option_subtitle != 'off' ){
            // Custom Class
            if( isset($subtitle_font_size_responsive) && $subtitle_font_size_responsive != ''
                || isset($subtitle_line_height_responsive) && $subtitle_line_height_responsive != ''
                || isset($subtitle_letter_spacing_responsive) && $subtitle_letter_spacing_responsive != ''
                || isset($subtitle_margin_top_responsive) && $subtitle_margin_top_responsive != ''
                || isset($subtitle_margin_bottom_responsive) && $subtitle_margin_bottom_responsive != ''){

                $responsive_class_text = uniqid('fl-subtitle-responsive-').'-'.rand(100,9999);

                $subtitle_css_classes [] = $responsive_class_text;

                $subtitle_css_classes [] = 'fl-vc--responsive';

                $args = array(
                    'target'      =>  $responsive_class_text ,  // set targeted element e.g. unique class/id etc.
                    'media_sizes' => array(
                        'font-size'         => $subtitle_font_size_responsive,
                        'line-height'       => $subtitle_line_height_responsive,
                        'letter-spacing'    => $subtitle_letter_spacing_responsive,
                        'margin-top'        => $subtitle_margin_top_responsive,
                        'margin-bottom'     => $subtitle_margin_bottom_responsive,
                    ),
                );

                $data_subtitle_list = fl_helper_get_responsive_text_media_css($args);

                $subtitle_wrapper_attributes[] = $data_subtitle_list;

            }
        }

        $subtitle_class = preg_replace( '/\s+/', ' ', implode( ' ', array_filter( array_unique( $subtitle_css_classes ) ) ) );

        $title_class = preg_replace( '/\s+/', ' ', implode( ' ', array_filter( array_unique( $title_css_classes ) ) ) );

        $css_class = preg_replace( '/\s+/', ' ', implode( ' ', array_filter( array_unique( $css_classes ) ) ) );


        $result .= '<div class="' . esc_attr( trim( $css_class ) ) . '" '. implode( ' ', $wrapper_attributes ).'>';

        // Style Default
        if(isset($title_style_text) && $title_style_text == 'title_default'){

            if(isset($content) && $content != ''){

                $result .= '<'.$title_html_tag.' class="' . esc_attr( trim( $title_class ) ) . '" '. implode( ' ', $title_wrapper_attributes ).'>';

                    $result .=  fl_js_delete_wpautop($content,false);

                $result .= '</'.$title_html_tag.'>';

            }

        }

        // Style Custom
        if(isset($title_style_text) && $title_style_text == 'custom-title'){
            $result .='<div class="custom-title-content-wrapper">';

            if(isset($subtitle_text) && $subtitle_text != '' && isset($title_style_text) && $title_style_text == 'custom-title'){

                $result .='<div class="sub-title-wrap">';

                    $result .= '<div class="' . esc_attr( trim( $subtitle_class ) ) . '" '. implode( ' ', $subtitle_wrapper_attributes ).'>';

                    $result .=  $subtitle_text;

                    $result .= '</div>';

                $result .= '</div>';

            }

            if(isset($content) && $content != ''){

                $result .= '<'.$title_html_tag.' class="' . esc_attr( trim( $title_class ) ) . '" '. implode( ' ', $title_wrapper_attributes ).'>';

                $result .=  fl_js_delete_wpautop($content,false);

                $result .= '</'.$title_html_tag.'>';

            }

            $result .='</div>';
        }

        $result .= '</div>';



        // Responsive CSS Box
        if(isset($custom_responsive_option) && $custom_responsive_option !='off') {
            $fl_helping_responsive_style .= $responsive_style;
        }

        return $result;
    }
}
add_shortcode('vc_fl_title', 'vc_fl_title_function');