<?php
/**
 * Plugin Name: Fl Themes Helper
 * Plugin URI:: https://themeforest.net/user/themesvk
 * Description: Helper plugin for Themes VK and Templines themes.Don't delete this plugin.
 * Version: 1.0
 * Author:Themes VK
 * Author URI: https://themeforest.net/user/themesvk
 * License: GPL v2
 */

/**====================================================================
==  Make sure we don't expose any info if called directly
====================================================================*/
if ( !function_exists( 'add_action' ) ) {
    echo 'Hi there!  I\'m just a plugin, not much I can do when called directly.';
    exit;
}

/**====================================================================
==  Load Text domain
====================================================================*/
add_action('plugins_loaded', 'fl_helper_load_textdomain');
function fl_helper_load_textdomain() {
    load_plugin_textdomain( 'fl-themes-helper', false, dirname( plugin_basename(__FILE__) ) . '/languages/' );
}

define('FL_THEME_HELPER_PLUGIN_PATH',plugin_dir_path(__FILE__));
defined('FL_HELPING_PLUGIN_VERSION' )   or define( 'FL_HELPING_PLUGIN_VERSION', '1.0');
defined('FL_THEME_HELPER_ROOT_DIR' )    or define( 'FL_THEME_HELPER_ROOT_DIR', plugins_url() . '/fl-themes-helper');
defined('FL_HELPING_PREVIEW_IMAGE')     or define('FL_HELPING_PREVIEW_IMAGE', plugin_dir_url(__FILE__) . '/assets/images/presentation-images');
defined('FL_THEME_HELPER_URL' )         or define( 'FL_THEME_HELPER_URL', plugin_dir_url( __FILE__ ));



/**====================================================================
==  Require Fl theme
====================================================================*/
if( !class_exists('Fl_Helping_Addons') ) {

    class Fl_Helping_Addons {

        // Construct
        public function __construct() {

            $this->addSocial();
            $this->addLike();
            $this->addCustomFunction();
            $this->addCustomTaxonomyWorks();
            $this->addWidgets();

            add_action('after_setup_theme', array($this, 'addVcCustomElements'));
            // Version 5 ACF PRO
            add_action('acf/include_field_types',  array($this, 'include_field_types'));
            /**
             *  register_fields()
             *
             *  @since: 1.0.0
             */
        }


        function include_field_types( $version ) {
            include_once('afc_custom_fields/icon_picker/acf-fonticonpicker-v5.php');
            include_once('afc_custom_fields/image_selector/acf-image_select-v5.php');
            //include_once('afc_custom_fields/rgba-color-master/acf-extended-color-picker-v5.php');
        }
        /** Add Social Share Function*/
        public function addSocial() {
            require_once(FL_THEME_HELPER_PLUGIN_PATH.'function/social-share/social.php');
        }
        /** Add Like Function*/
        public function addLike() {
            require_once(FL_THEME_HELPER_PLUGIN_PATH.'function/like/post-like.php');
        }
        /** Add Custom Function*/
        public function addCustomFunction() {
            require_once(FL_THEME_HELPER_PLUGIN_PATH.'function/custom_function.php');
            require_once(FL_THEME_HELPER_PLUGIN_PATH.'function/public_function.php');
            require_once(FL_THEME_HELPER_PLUGIN_PATH.'function/load-more-car.php');
        }

        /** Add Custom Taxonomy Work*/
        public function addCustomTaxonomyWorks() {
            require_once(FL_THEME_HELPER_PLUGIN_PATH.'custom_taxonomy/portfolio.php');
        }
        /** Add Custom Widgets*/
        public function addWidgets() {
            require_once(FL_THEME_HELPER_PLUGIN_PATH.'widgets/widgets.php');
        }


        public function fl_helping_addons_init() {
            // Load Custom Maps.php For VC.
            $this->fl_helping_addons_vc_integration();
        }

        public function fl_helping_addons_vc_integration()
        {
            require_once(FL_THEME_HELPER_PLUGIN_PATH.'vc_custom/vc_include.php');
        }

        /** Add custom VC Function and elements*/
        public function addVcCustomElements() {
            if ( class_exists( 'Vc_Manager', false ) ) {
                require_once(FL_THEME_HELPER_PLUGIN_PATH.'vc_custom/vc.php');
                require_once(FL_THEME_HELPER_PLUGIN_PATH.'vc_custom/custom_params_option.php');
            }
            if(class_exists('Vc_Manager')){
                add_action('init', array($this,'fl_helping_addons_init'),40);
            }

        }

    } // end of class

} // end of class_exists

function fl_helping_addons(){
    return new Fl_Helping_Addons();
}


fl_helping_addons();


add_filter( 'script_loader_tag', 'fl_helping_remove_type', 10, 3 );
add_filter( 'style_loader_tag', 'fl_helping_remove_type', 10, 3 );  // Ignore the $media argument to allow for a common function.
function fl_helping_remove_type( $markup, $handle, $href ) {
    //error_log( 'Markup: ' . $markup );
    //error_log( 'Handle: ' . $handle );
    //error_log( 'Href: ' . $href );
    // Remove the 'type' attribute.
    $markup = str_replace( " type='text/javascript'", '', $markup );
    $markup = str_replace( " type='text/css'", '', $markup );
    return $markup;
}
// Store and process wp_head output to operate on inline scripts and styles.
add_action( 'wp_head', 'fl_helping_wp_head_ob_start', 0 );
function fl_helping_wp_head_ob_start() {
    ob_start();
}
add_action( 'wp_head', 'fl_helping_wp_head_ob_end', 10000 );
function fl_helping_wp_head_ob_end() {
    $wp_head_markup = ob_get_contents();
    ob_end_clean();

    // Remove the 'type' attribute. Note the use of single and double quotes.
    $wp_head_markup = str_replace( " type='text/javascript'", '', $wp_head_markup );
    $wp_head_markup = str_replace( ' type="text/javascript"', '', $wp_head_markup );
    $wp_head_markup = str_replace( ' type="text/css"', '', $wp_head_markup );
    $wp_head_markup = str_replace( " type='text/css'", '', $wp_head_markup );
    echo $wp_head_markup;
}


// Store and process wp_footer output to operate on inline scripts and styles.
add_action( 'wp_footer', 'fl_helping_wp_footer_ob_start', 0 );
function fl_helping_wp_footer_ob_start() {
    ob_start();
}

add_action( 'wp_footer', 'fl_helping_wp_footer_ob_end', 10000 );
function fl_helping_wp_footer_ob_end() {
    $wp_footer_markup = ob_get_contents();
    ob_end_clean();

    // Remove the 'type' attribute. Note the use of single and double quotes.
    $wp_footer_markup = str_replace( " type='text/javascript'", '', $wp_footer_markup );
    $wp_footer_markup = str_replace( ' type="text/javascript"', '', $wp_footer_markup );
    $wp_footer_markup = str_replace( ' type="text/css"', '', $wp_footer_markup );
    $wp_footer_markup = str_replace( " type='text/css'", '', $wp_footer_markup );
    echo $wp_footer_markup;
}


