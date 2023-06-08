<?php
if ( ! function_exists( 'vc_fl_pricing_table_function' ) ) {
    function vc_fl_pricing_table_function($atts, $content = null)
    {
        $css_classes[] = 'fl-pricing--table-wrapper';

        $css_pr_tb [] = '';

        global $fl_helping_responsive_style;

        $atts = vc_map_get_attributes('vc_fl_pricing_table', $atts);

        extract($atts);

        $result = $wrapper_attributes[] = $responsive_style =$pg_prefix = $css=  $icon_class ='';


        // Custom Class
        $css_classes_table[] = 'pricing--table';

        $btn_css_classes[] = 'fl-custom-btn fl-font-style-bolt-two secondary-style';


        $css_classes[] .= fl_get_css_tab_class($atts);

        if(isset($id) && $id != '') {
            $wrapper_attributes[] .= 'id="'.fl_sanitize_class($id).'"';
        }

        if(isset($class) && $class != '') {
            $css_classes[] .= fl_sanitize_class($class);
        }

        // Responsive CSS Box
        if(isset($custom_responsive_option) && $custom_responsive_option !='off') {
            if( !empty( $responsive_css ) && $responsive_css != '' ) {
                $responsive_id = $idf = uniqid('fl-responsive-pricing-table-').'-'.rand(100,9999);
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



        if(isset($pricing_prefix) && $pricing_prefix != ''){
            $pg_prefix = $pricing_prefix;
        }

        // HTML CLASS

         if(isset($premium_pricing) && $premium_pricing == 'enable'){
             $css_classes_table[] = 'premium-table';
         }

        // Button Link Option
        //Btn link
        $tag_link = 'span';$link_atts=$btn='';
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

        if(isset($btn_text) && $btn_text != '') {
            $btn = '<'.$tag_link.' class="' . esc_attr( trim( $btn_css_class ) ) . '" '.$link_atts.'><span>'.$btn_text.'</span></'.$tag_link.'>';
        }






        $css_class = preg_replace( '/\s+/', ' ', implode( ' ', array_filter( array_unique( $css_classes ) ) ) );

        $css_class_table = preg_replace( '/\s+/', ' ', implode( ' ', array_filter( array_unique( $css_classes_table ) ) ) );


        $result .= '<div class="' . esc_attr( trim( $css_class ) ) . '" '. implode( ' ', $wrapper_attributes ).'>';

        $result .= '<div class="' . esc_attr( trim( $css_class_table ) ) . '">';

        //Title
        if(isset($title) && $title != '') {
            $result .= '<div class="pricing-title fl-text-bold-style">'.$title.'</div>';
        }

        // Pricing
        if(isset($pricing) && $pricing != '') {
            $result .= '<div class="pricing fl-text-bold-style"><span class="prefix-price fl-text-light-style">'.$pg_prefix.'</span>'.$pricing.'</div>';
        }
        // Pricing period
        if(isset($pricing_period) && $pricing_period != '') {
            $result .= '<div class="pricing-period fl-text-bold-style">'.$pricing_period.'</div>';
        }

        // Foreach
        $list_fields = (array) vc_param_group_parse_atts($list_fields);
        $result .='<ul class="pricing-list">';
            foreach($list_fields as $fields2) {
                if(isset($fields2['text_content']) && !empty($fields2['text_content'])) {
                        $result .= '<li class="list-vc-li fl-text-regular-style"><span class="left-content"><i class="fa fa-check" aria-hidden="true"></i></span>'.$fields2['text_content'].'</li>';
                }
            }
        $result .='</ul>';
        // Pricing Button
        if(isset($btn_text) && $btn_text != '') {
            $result .='<div class="price-btn-wrap">';
                $result .= $btn;
            $result .='</div>';
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
add_shortcode('vc_fl_pricing_table', 'vc_fl_pricing_table_function');