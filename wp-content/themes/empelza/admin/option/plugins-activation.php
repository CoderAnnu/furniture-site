<?php



/**
 * Register Required Plugins
 */
add_action( 'tgmpa_register', 'empelza_register_required_plugins' );
if ( ! function_exists( 'empelza_register_required_plugins' ) ) :
function empelza_register_required_plugins() {



    $str_plugin_url = 'http://support.templines.com/plugins-load/';
    if(function_exists('empelza_theme_code_info')){
        $theme_code = empelza_theme_code_info();
        $get_params = array(
            'edd_action'        => 'plugins_activation',
            'license_key'       => $theme_code['envato_code'],
            'theme'             => $theme_code['theme'],
            'theme_id'          => $theme_code['theme_id'],
            'url'               => home_url()
        );
        $str_get_params = '';
        if(!empty($theme_code['envato_code']) && !empty($theme_code['theme_id']) && !empty($theme_code['theme']) ){
            $str_get_params = '?' . http_build_query($get_params);
        }
        $str_plugin_url .= $str_get_params;
    }


    /**
     * Array of plugin arrays. Required keys are name and slug.
     * If the source is NOT from the .org repo, then source is also required.
     */
    $plugins = array(
        // Kirki
        array(
            'name'                  => 'Kirki',
            'slug'                  => 'kirki',
            'required'              => true,
        ),

        // Demo Import
        array(
            'name'                  => 'One Click Demo Import',
            'slug'                  => 'one-click-demo-import',
            'required'              => false,
        ),

        // Mail Chimp
        array(
            'name'                  => 'Mailchimp for Wordpress',
            'slug'                  => 'mailchimp-for-wp',
            'required'              => false,
        ),

		// Contact Form 7
        array(
            'name'                  => 'Contact Form 7',
            'slug'                  => 'contact-form-7',
            'required'              => false,
        ),
        // Background
        array(
            'name'                  => 'Advanced WordPress Backgrounds',
            'slug'                  => 'advanced-backgrounds',
            'required'              => true,
        ),
        // Theme plugin from our library
        // ACF PRO Plugin
        array(
            'name'                  => 'Advanced Custom Fields PRO',
            'slug'                  => 'advanced-custom-fields-pro',
            'required'              => true,
            'source'                => 'http://assets.templines.com/plugins/advanced-custom-fields-pro.zip',
        ),

        // Visual Composer Plugin
        array(
            'name'                  => 'WPBakery Visual Composer',
            'slug'                  => 'js_composer',
            'required'              => true,
            'source'                => 'http://assets.templines.com/plugins/js_composer.zip'
        ),
        //Kaswara
        array(
            'name'                  => 'Kaswara Modern VC Addons',
            'slug'                  => 'kaswara',
            'required'              =>  false,
            'source'                => 'http://assets.templines.com/plugins/kaswara.zip'
        ),
        // FL Helper Plugin
        array(
            'name'                  => 'Fl Themes Helper',
            'slug'                  => 'fl-themes-helper',
            'required'              => true,
            'external_url'          => '',
            'source'                => 'http://assets.templines.com/plugins/theme/empelza/mss5jrbsnpc7bcvtyfm/fl-themes-helper.zip', // The plugin source
        ),
        // Mail Chimp For Wordpress
        array(
            'name'                  => 'Mailchimp for Wordpress',
            'slug'                  => 'mailchimp-for-wp',
            'required'              => false,
        ),
    );

    /**
     * Array of configuration settings. Amend each line as needed.
     * If you want the default strings to be available under your own theme domain,
     * leave the strings uncommented.
     * Some of the strings are added into a sprintf, so see the comments at the
     * end of each line for what each argument will be.
     */
    $config = array(
        'id' => 'tgmpa', // Unique ID for hashing notices for multiple instances of TGMPA.
        'default_path' => '', // Default absolute path to pre-packaged plugins.
        'has_notices' => true, // Show admin notices or not.
        'dismissable' => true, // If false, a user cannot dismiss the nag message.
        'dismiss_msg' => '', // If 'dismissable' is false, this message will be output at top of nag.
        'is_automatic' => true, // Automatically activate plugins after installation or not.
        'message' => '', // Message to output right before the plugins table.
    );





    tgmpa( $plugins, $config );
}
endif;


// Visual Composer as theme
add_action( 'vc_before_init', 'empelza_vc_setastheme' );
function empelza_vc_setastheme() {
    vc_set_as_theme();
}

// Revolution Slider as theme
if(function_exists( 'set_revslider_as_theme' )) {
    add_action( 'init', 'empelza_rev_setastheme' );
    function empelza_rev_setastheme() {
        set_revslider_as_theme();
    }
}
