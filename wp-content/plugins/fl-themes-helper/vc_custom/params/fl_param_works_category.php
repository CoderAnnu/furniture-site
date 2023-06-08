<?php
    if ( function_exists( 'vc_add_shortcode_param' ) ) {

        vc_add_shortcode_param( 'fl_custom_works_categories', 'fl_custom_works_category_settings_field');

    }

if ( ! function_exists( 'fl_custom_works_category' ) ) :
    function fl_custom_works_category_settings_field( $settings, $value ) {

        if( ! is_array( $value ) ) {
            $value = explode( ',', $value );
        }

        $output = $value1 = '';

        foreach( $value as $k => $v ) {
            $value1 .= $v;
        }

        $taxonomy = 'works-category';
        $args = array(
            'hide_empty'  => false,
        );
        $terms = get_terms( $taxonomy, $args );
        $multiple_attr = isset( $settings['multiple'] ) && empty( $settings['multiple'] ) ? '' : ' multiple="multiple" ';

        $output .= '<select '.$multiple_attr.' name="'. $settings['param_name'] .'" class="wpb_vc_param_value wpb-input wpb-rs-select wpb-select dropdown  '. $settings['param_name'] .' '. $settings['type'] .'">';

        if(!empty($value1)):
            $selected_all = ( in_array( '0' , $value ) ) ? ' selected="selected"' : '';
            $output .= '<option value="0" '.$selected_all.'>'.esc_html__('All Categories', 'fl-themes-helper').'</option>';
        else:
            $output .= '<option value="0" selected="selected">'.esc_html__('All Categories', 'fl-themes-helper').'</option>';
        endif;
        foreach ( $terms as $term ) {
            $selected = ( in_array( $term->slug, $value ) ) ? ' selected="selected"' : '';
            $output .= '<option value="'. $term->slug .'"'. $selected .'>'.htmlspecialchars( $term->name." - (".$term->slug." - ".$term->term_id.")").'</option>';
        }
        $output .= '</select>' . "\n";

        return $output;
    }
endif;