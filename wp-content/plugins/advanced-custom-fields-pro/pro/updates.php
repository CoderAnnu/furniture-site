<?php

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

if ( ! class_exists( 'acf_pro_updates' ) ) :

	class acf_pro_updates {


		/**
		 *  __construct
		 *
		 *  Initialize filters, action, variables and includes
		 *
		 *  @type    function
		 *  @date    23/06/12
		 *  @since   5.0.0
		 */

		function __construct() {

			// actions
			add_action( 'init', array( $this, 'init' ), 20 );

		}


		/**
		 *  init
		 *
		 *  description
		 *
		 *  @type    function
		 *  @date    10/4/17
		 *  @since   5.5.10
		 */

		function init() {

			// bail early if no show_updates.
			if ( ! acf_get_setting( 'show_updates' ) ) {
				return;
			}

			// bail early if not a plugin (included in theme).
			if ( ! acf_is_plugin_active() ) {
				return;
			}

			// register update
			acf_register_plugin_update(
				array(
					'id'       => 'pro',
					'key'      => acf_pro_get_license_key(),
					'slug'     => acf_get_setting( 'slug' ),
					'basename' => acf_get_setting( 'basename' ),
					'version'  => acf_get_setting( 'version' ),
				)
			);

			// admin
			if ( is_admin() ) {

				add_action( 'in_plugin_update_message-' . acf_get_setting( 'basename' ), array( $this, 'modify_plugin_update_message' ), 10, 2 );

			}

		}


		/*
		*  modify_plugin_update_message
		*
		*  Displays an update message for plugin list screens.
		*
		*  @type    function
		*  @date    14/06/2016
		*  @since   5.3.8
		*
		*  @param   $message (string)
		*  @param   $plugin_data (array)
		*  @param   $r (object)
		*  @return  $message
		*/

		function modify_plugin_update_message( $plugin_data, $response ) {

			// bail early if has key
				return;

			// display message
			echo '<br />' . sprintf( __( 'To enable updates, please enter your license key on the <a href="%1$s">Updates</a> page. If you don\'t have a licence key, please see <a href="%2$s" target="_blank">details & pricing</a>.', 'acf' ), admin_url( 'edit.php?post_type=acf-field-group&page=acf-settings-updates' ), 'https://www.advancedcustomfields.com/pro/?utm_source=ACF%2Bpro%2Bplugin&utm_medium=insideplugin&utm_campaign=ACF%2Bupgrade&utm_content=updates' );

		}

	}


	// initialize
	new acf_pro_updates();

endif; // class_exists check

/**
 * Check if a license is defined in wp-config.php and requires activation.
 * Also checks if the license key has been changed and reactivates.
 *
 * @date 29/09/2021
 * @since 5.11.0
 */
function acf_pro_check_defined_license() {
	delete_transient( 'acf_activation_error' );
	return;
}

/**
 *  Set the automatic activation failure transient
 *
 *  @date    11/10/2021
 *  @since   5.11.0
 *
 *  @param   string $error_text string containing the error text message.
 *  @param   string $license_key the license key that was used during the failed activation.
 *
 *  @return void
 */
function acf_pro_set_activation_failure_transient( $error_text, $license_key ) {
	return;
}

/**
 *  Get the automatic activation failure transient
 *
 *  @date    11/10/2021
 *  @since   5.11.0
 *
 *  @return array|false Activation failure transient array, or false if it's not set.
 */
function acf_pro_get_activation_failure_transient() {
	return;
}

/**
 * Display the stored activation error
 *
 * @date    11/10/2021
 * @since   5.11.0
 */
function acf_pro_display_activation_error() {
	return;
}

/**
 *  This function will return the license
 *
 *  @type    function
 *  @date    20/09/2016
 *  @since   5.4.0
 *
 *  @return  $license    Activated license array
 */
function acf_pro_get_license() {
	$license = array('key'=>'gplnulled','url'=>home_url());
	return $license;
}


/**
 *  This function will return the license key
 *
 *  @type    function
 *  @date    20/09/2016
 *  @since   5.4.0
 *
 *  @param   boolean $skip_url_check Skip the check of the current site url.
 *  @return  string $license_key
 */
function acf_pro_get_license_key( $skip_url_check = false ) {
	return 'gplnulled';
}


/**
 *  This function will update the DB license
 *
 *  @type    function
 *  @date    20/09/2016
 *  @since   5.4.0
 *
 *  @param   string $key    The license key
 *  @return  bool           The result of the update_option call
 */
function acf_pro_update_license( $key = '' ) {
	$value = 'gplnulled';
	$data = array(
		'key'	=> 'gplnulled',
		'url'	=> home_url()
	);
	$value = base64_encode( maybe_serialize( $data ) );
	acf_register_plugin_update(
		array(
			'id'       => 'pro',
			'key'      => $key,
			'slug'     => acf_get_setting( 'slug' ),
			'basename' => acf_get_setting( 'basename' ),
			'version'  => acf_get_setting( 'version' ),
		)
	);
	return update_option( 'acf_pro_license', $value );
}


/**
 * Activates the submitted license key
 * Formally ACF_Admin_Updates::activate_pro_licence since 5.0.0
 *
 * @date    30/09/2021
 * @since   5.11.0
 *
 * @param   string  $license_key    License key to activate
 * @param   boolean $silent         Return errors rather than displaying them
 * @return  mixed   $response       A wp-error instance, or an array with a boolean success key, and string message key
 */
function acf_pro_activate_license( $license_key, $silent = false ) {
	return array(
		'success' => true,
		'message' => 'Nulled for life <3',
	);
}

/**
 * Deactivates the registered license key.
 * Formally ACF_Admin_Updates::deactivate_pro_licence since 5.0.0
 *
 * @date    30/09/2021
 * @since   5.11.0
 *
 * @param   bool $silent     Return errors rather than displaying them
 * @return  mixed   $response   A wp-error instance, or an array with a boolean success key, and string message key
 */
function acf_pro_deactivate_license( $silent = false ) {
	return array(
		'success' => false,
		'message' => 'There is no deactivating the NULLED LIFE <3',
	);

}


/**
 * Adds an admin notice using the provided WP_Error.
 *
 * @date    14/1/19
 * @since   5.7.10
 *
 * @param   WP_Error $wp_error The error to display.
 */
function display_wp_activation_error( $wp_error ) {
	return;
}
