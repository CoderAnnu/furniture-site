<?php
    if ( ! function_exists( 'vc_fl_partner_function' ) ) {
        function vc_fl_partner_function($atts, $content = null)
        {

            $css_classes[] = 'fl-partner-wrapper';

            global $fl_helping_responsive_style;

            $atts = vc_map_get_attributes('vc_fl_partner', $atts);

            extract($atts);


            $result=  $css_classes[] = $wrapper_attributes[] = $responsive_style =$link='';


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
                    $responsive_id = uniqid('fl--responsive-partner').'-'.rand(100,9999);
                    $column_selector = $responsive_id;
                    $responsive_style = fl_helping__addons_get_responsive_style($responsive_css, $column_selector);
                    $css_classes[] = $responsive_id;
                }
            }

            // Animation option
            if ( ! empty( $animation ) and ($animation !='none')) {
                $css_classes[] = 'fl-animated-item-velocity';
                $wrapper_attributes[] = 'data-animate-type="'.$animation.'"';
                $wrapper_attributes[] = 'data-item-for-animated=".partner-item"';

                if ( ! empty( $custom_delay ) and ( $custom_delay !='off')) {
                    if ( ! empty( $animation_delay ) and ($animation_delay !='')) {
                        $wrapper_attributes[] = 'data-item-delay="'.$animation_delay.'"';
                    }
                }
            }


            $css_class = preg_replace( '/\s+/', ' ', implode( ' ', array_filter( array_unique( $css_classes ) ) ) );


            $result .= '<div class="' . esc_attr( trim( $css_class ) ) . '" '. implode( ' ', $wrapper_attributes ).'>';

                $result .='<div class="partner-content">';

                    if(isset($list_fields_partner) && !empty($list_fields_partner) && function_exists('vc_param_group_parse_atts')) {

                        $list_fields_partner = (array) vc_param_group_parse_atts($list_fields_partner);



                        foreach($list_fields_partner as $partner_fields_item) {
                            $html_class = '';
                            $link = $partner_fields_item['link'];
                            if (isset($partner_fields_item['image_hover_id']) && !empty($partner_fields_item['image_hover_id'])) {
                                $html_class = 'hover_enable';
                            }
                                // Image
                                if (isset($partner_fields_item['image_id']) && !empty($partner_fields_item['image_id'])) {

                                    $result .='<div class="partner-item '.$html_class.'">';

                                        $result .='<a href="'.$link .'">';

                                            $result .= '<div class="static-image">'.wp_get_attachment_image($partner_fields_item['image_id'], 'full').'</div>';
                                            if (isset($partner_fields_item['image_hover_id']) && !empty($partner_fields_item['image_hover_id'])) {
                                                $result .= '<div class="hover-image">'.wp_get_attachment_image($partner_fields_item['image_hover_id'], 'full').'</div>';
                                            }

                                        $result .='</a>';

                                    $result .='</div>';

                                }
                            }

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
    add_shortcode('vc_fl_partner', 'vc_fl_partner_function');

