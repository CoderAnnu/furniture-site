<?php

    if ( function_exists( 'vc_add_shortcode_param' ) ) {

        vc_add_shortcode_param( 'fl_align_text', 'fl_align_text_settings_field', FL_THEME_HELPER_ROOT_DIR . '/assets/params/js/fl-custom-params.js');

    }

function fl_align_text_settings_field( $settings, $value ) {

    $settings = wp_parse_args( $settings );

    $grid = array(
        'text-left', 'text-center', 'text-right',
    );

    $align = '<div class="fl-param-text-align">';
    foreach ( $grid as $grid_item ) {
        $align_text = explode( '-', $grid_item );
        $align .= '<input id="' . esc_attr( $settings[ 'param_name' ] . '-radio_' . $grid_item ) . '" class="fl-align-radio" name="' . esc_attr( $settings[ 'param_name' ] ) . '-radio" type="radio" ' . checked( $grid_item, $value, false ) . ' value="' . esc_attr( $grid_item ) . '" />';
        $align .= '<label class="fl-align-single fl-align-' . esc_attr( $grid_item ) . '" for="' . esc_attr( $settings[ 'param_name' ] . '-radio_' . $grid_item ) . '">';
        $align .= '<i class="dashicons dashicons-editor-align' . esc_attr( array_pop( $align_text ) ) . '"></i>';
        $align .= '</label>';
    }
    $align .= '</div>';

    $align .= '<input class="fl-align-value" name="' . esc_attr( $settings[ 'param_name' ] ) . '" value="' . esc_attr( $value ) . '" type="hidden" />';

    return $align;
}