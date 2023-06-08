<?php

/*
*  ACF Color Picker Field Class
*
*  All the logic for this field type
*
*  @class 		acf_field_extended_color_picker
*  @extends		acf_field
*  @package		ACF
*  @subpackage	Fields
*/

if ( ! class_exists( 'fl_helping_acf_field_extended_color_picker' ) ) :

	class fl_helping_acf_field_extended_color_picker extends acf_field {


		/*
		*  __construct
		*
		*  This function will setup the field type data
		*
		*  @type	function
		*  @date	5/03/2014
		*  @since	5.0.0
		*
		*  @param	n/a
		*  @return	n/a
		*/

		public function __construct() {

			// vars
			$this->name     = 'extended-color-picker';
			$this->label    = esc_html__('RGBA Color Picker', 'fl-themes-helper');
            $this->category = "Basic";
			$this->defaults = [
				'default_value' => '',
			];

			$this->settings = [
				'version' => '2.1.2',
				'url'     => plugin_dir_url( __DIR__ )
			];


			$palette    = apply_filters( 'acf/extended_color_picker/palette', true );
			$this->l10n = [
				'palette' => $palette
			];


			// do not delete!
			parent::__construct();

		}

		/*
		*  input_admin_enqueue_scripts
		*
		*  description
		*
		*  @type	function
		*  @date	16/12/2015
		*  @since	5.3.2
		*
		*  @param	$post_id (int)
		*  @return	$post_id (int)
		*/

		public function input_admin_enqueue_scripts() {

			// globals
			global $wp_scripts, $wp_styles;


			// register if not already (on front end)
			// http://wordpress.stackexchange.com/questions/82718/how-do-i-implement-the-wordpress-iris-picker-into-my-plugin-on-the-front-end
			if ( ! isset( $wp_scripts->registered['iris'] ) ) {

				// styles
				wp_register_style( 'wp-color-picker', admin_url( 'css/color-picker.css' ), [], '', true );

				// scripts
				wp_register_script( 'iris', admin_url( 'js/iris.min.js' ), [
					'jquery-ui-draggable',
					'jquery-ui-slider',
					'jquery-touch-punch'
				], '1.0.7', true );
				wp_register_script( 'wp-color-picker', admin_url( 'js/color-picker.min.js' ), [ 'iris' ], '', true );

				// localize
				wp_localize_script( 'wp-color-picker', 'wpColorPickerL10n', [
					'clear'         => esc_html__('Clear', 'fl-themes-helper'),
					'defaultString' => esc_html__('Default', 'fl-themes-helper'),
					'pick'          => esc_html__('Select Color', 'fl-themes-helper'),
					'current'       => esc_html__('Current Color', 'fl-themes-helper'),
				] );

			}

			$url     = apply_filters( 'acf/extended_color_picker/url', $this->settings['url'] );
			$version = $this->settings['version'];


			// Add the Alpha Color Picker JS
			wp_enqueue_script( 'wp-color-picker-alpha',$this->settings['url']. "rgba-color-master/assets/js/wp-color-picker-alpha.min.js", [ 'wp-color-picker' ], '1.2.2', true );

			// register Extended Color Picker CSS
			wp_register_style( 'acf-extended-color-picker-style',$this->settings['url']. "rgba-color-master/assets/css/acf-extended-color-picker.css", false, $version );

			// register Extended Color Picker JS
			wp_register_script( 'acf-extended-color-picker-script', $this->settings['url']."rgba-color-master/assets/js/acf-extended-color-picker.js", [ 'wp-color-picker-alpha' ], $version, true );

			// enqueue styles & scripts
			wp_enqueue_style( 'wp-color-picker' );
			wp_enqueue_style( 'acf-extended-color-picker-style' );
			wp_enqueue_script( 'wp-color-picker' );
			wp_enqueue_script( 'acf-extended-color-picker-script' );

		}

		/*
		*  render_field()
		*
		*  Create the HTML interface for your field
		*
		*  @param	$field - an array holding all the field's data
		*
		*  @type	action
		*  @since	3.6
		*  @date	23/01/13
		*/

		public function render_field( $field ) {

			// vars
			$text   = acf_get_sub_array( $field, [ 'id', 'class', 'name', 'value' ] );
			$hidden = acf_get_sub_array( $field, [ 'name', 'class', 'value' ] );

			$text['class']   = 'valuetarget';
			$hidden['class'] = 'hiddentarget';

			// render
			?>
            <div class="acf-color_picker" data-target="target">
				<?php acf_hidden_input( $hidden ); ?>
                <input type="text" <?php echo acf_esc_attr( $text ); ?> data-alpha="true"/>
            </div>
			<?php
		}

		/*
		*  render_field_settings()
		*
		*  Create extra options for your field. This is rendered when editing a field.
		*  The value of $field['name'] can be used (like bellow) to save extra data to the $field
		*
		*  @type	action
		*  @since	3.6
		*  @date	23/01/13
		*
		*  @param	$field	- an array holding all the field's data
		*/

		public function render_field_settings( $field ) {

			// display_format
			acf_render_field_setting( $field, [
				'label'        => esc_html__('Default Value', 'fl-themes-helper'),
				'instructions' => '',
				'type'         => 'text',
				'name'         => 'default_value',
				'placeholder'  => '#FFFFFF'
			] );

		}

	}

// initialize
	acf_register_field_type( new fl_helping_acf_field_extended_color_picker() );

endif; // class_exists check