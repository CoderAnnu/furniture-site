<?php
if ( ! defined( 'ABSPATH' ) ) { exit; }
if ( ! class_exists( 'Fl_Helping_Radio_Image_Param' ) ) {

	/**
	 * Class Ultimate_Radio_Image_Param
	 */
	class Fl_Helping_Radio_Image_Param {

		/**
		 * Add shortcode parameter for Visual Composer.
		 */
		function __construct() {
			if ( function_exists( 'vc_add_shortcode_param' ) ) {
				vc_add_shortcode_param( 'fl_radio_image_select', array( &$this, 'fl_radio_image_settings_field' ),  FL_THEME_HELPER_ROOT_DIR . '/assets/params/js/fl-param_icon_picker.js' );
			}
		}

		/**
		 * Parsing settings field.
		 *
		 * @param array $settings Settings array.
		 * @param array $value    Values array.
		 *
		 * @return string
		 */
		function fl_radio_image_settings_field( $settings, $value ) {

			$options      = isset( $settings['options'] ) ? $settings['options'] : '';
			$useextension = ( isset( $settings['useextension'] ) && '' !== $settings['useextension'] ) ? $settings['useextension'] : 'true';
			$simple = ( isset( $settings['simple_mode'] ) && '' !== $settings['simple_mode'] ) ? $settings['simple_mode'] : true;
			

			$class      = isset( $settings['class'] ) ? $settings['class'] : '';

			$output = $selected = '';
			$css_option = str_replace( '#', 'hash-', vc_get_dropdown_option( $settings, $value ) );

			$output .= '<select name="'. $settings['param_name'].'" class="wpb_vc_param_value wpb-input wpb-select ' . $class. ' ' .$settings['param_name']. ' ' . $settings['type']. ' ' . $css_option. '" data-option="' . $css_option . '">';

			if ( is_array( $options ) ) {
				foreach ( $options as $key => $val ) {
					if ( 'true' !== $useextension ) {
						$temp          = pathinfo( $key );
						$temp_filename = $temp['filename'];
						$key           = $temp_filename;
					}

					if ( '' !== $css_option && $css_option === $key ) {
						$selected = ' selected="selected"';
					} else {
						$selected = '';
					}
					
					if($simple) {
						$img_url = $val;
					} else {
						$img_url = $val['src'];
					}

					$output .= '<option data-img-src="' . esc_url($img_url) . '"  value="' . esc_attr($key) . '" ' . $selected . '>';
				}
			}
			$output .= '</select>';

			return $output;
		}
	}
}


if ( class_exists( 'Fl_Helping_Radio_Image_Param' ) ) {
	$Fl_Helping_Radio_Image_Param = new Fl_Helping_Radio_Image_Param();
}
