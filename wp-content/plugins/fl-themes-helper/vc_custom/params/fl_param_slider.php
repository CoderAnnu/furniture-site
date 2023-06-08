<?php
    if ( function_exists( 'vc_add_shortcode_param' ) ) {

        vc_add_shortcode_param( 'fl_slider', 'fl_slider_settings_field', FL_THEME_HELPER_ROOT_DIR . '/assets/params/js/fl-custom-params.js');
    }

function fl_slider_settings_field( $settings, $value ) {
    $defaults = array(
        'min'        => 0,
        'max'        => 100,
        'step'       => 1,
        'value'      => 0,
        'suffix'       => '',
        'fill'       => true,
        'hide_input' => false
    );
    $settings = wp_parse_args( $settings, $defaults );
    $value = $value == null ? $settings[ 'value' ] : $value;

    $slider = '<div class="fl-vc-slider' . ( $settings[ 'hide_input' ] ? ' fl-hide-input' : '' ) . ( $settings[ 'fill' ] ? ' fl-fill' : '' ) . '">';
    $slider .= '<div class="fl-slider" data-min="' . esc_attr( $settings[ 'min' ] ) . '" data-max="' . esc_attr( $settings[ 'max' ] ) . '" data-step="' . esc_attr( $settings[ 'step' ] ) . '" data-value="' . esc_attr( $value ) . '"></div>';
    $slider .= '</div>';

    $input = '<input class="fl-value wpb_vc_param_value wpb-input ' . esc_attr( $settings[ 'param_name' ] ) . '" name="' . esc_attr( $settings[ 'param_name' ] ) . '" value="' . esc_attr( $value ) . '" type="text" />';

    $suffix = $settings[ 'suffix' ] != '' ? '<span class="fl-suffix">' . $settings[ 'suffix' ] . '</span>' : '';

    return '<div class="fl-slider-wrap">' . $slider . $input . $suffix  . '</div>';
}