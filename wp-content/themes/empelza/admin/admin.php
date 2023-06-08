<?php

if(!class_exists('EMPELZA_Admin')):
class EMPELZA_Admin {
    /**
     * The single class instance.
     *
     * @since 1.0.0
     * @access private
     *
     * @var object
     */
    private static $_instance = null;

    /**
    * Main Instance
    * Ensures only one instance of this class exists in memory at any one time.
    *
    */
    public static function instance () {
        if ( is_null( self::$_instance ) ) {
            self::$_instance = new self();
            self::$_instance->init_globals();
            self::$_instance->init_includes();
            self::$_instance->init_actions();
        }
        return self::$_instance;
    }

    private function __construct () {
        /* We do nothing here! */
        $this->admin_path = get_template_directory() . '/admin';

        // get theme data
        $theme_data = wp_get_theme();
        $theme_parent = $theme_data->parent();
        if(!empty($theme_parent)) {
            $theme_data = $theme_parent;
        }

        $this->theme_slug = $theme_data->get_stylesheet();
        $this->theme_name = $theme_data['Name'];
        $this->theme_version = $theme_data['Version'];
        $this->theme_uri = $theme_data->get('ThemeURI');
        $this->theme_is_child = !empty($theme_parent);
    }

    /**
     * Init Global variables
     */
    private function init_globals () {
        $extra_headers = get_file_data(get_template_directory() . '/style.css', array(
            'Theme ID' => 'Theme ID'
        ), 'fL_theme');
        $this->theme_id = $extra_headers['Theme ID'];
    }

    /**
     * Init Included Files
     */
    private function init_includes () {
        require $this->admin_path . '/option/options-setting.php';
        require $this->admin_path . '/option/kirki-options.php';
        require $this->admin_path . '/option/acf-metaboxes.php';
    }

    /**
     * Setup the hooks, actions and filters.
     */
    private function init_actions () {
        add_action('wp_enqueue_scripts', array($this, 'empelza_enqueue_scripts'));
        add_action('wp_enqueue_scripts', array($this, 'empelza_enqueue_styles'));

        if (is_admin()) {
            add_action('admin_print_styles', array($this, 'admin_print_styles'));
        }
    }

    /**
     * Print Styles
     */
    public function admin_print_styles () {
        wp_enqueue_media();
        wp_enqueue_style('fontawesome', get_template_directory_uri() . '/assets/css/libs/font-awesome.css', array(), '4.7');
        wp_enqueue_style('empelza-theme-admin-style', get_template_directory_uri() . '/admin/assets/css/style.css', array(), '1.0');
        if(class_exists('Kirki')){
            wp_enqueue_style('empelza-customize-icon-admin-style', get_template_directory_uri() . '/admin/assets/css/customize-icon-style.css', array(), '1.0');
        }
        wp_enqueue_script('empelza-admin-script', get_template_directory_uri() . '/admin/assets/js/admin-scripts.js', '', '', true);
        //Icon Picker
        wp_enqueue_script('fonticonpicker', get_template_directory_uri() . '/admin/assets/js/libs/fonticonpicker.js', '', '', true);
        wp_enqueue_style('icon-piker', get_template_directory_uri() . '/admin/assets/css/libs/icon-piker.css', array(), '1.0');



    }

    public function empelza_save_google_fonts_url() {
        $fonts_url = '';
        $fonts = array();
        $subsets = 'latin-ext';
        $fonts[] = 'Hind:300,400,500,600,700';
        if ( $fonts ) {
            $fonts_url = add_query_arg( array(
                'family' => urlencode( implode( '|', $fonts ) ),
                'subset' => urlencode( $subsets ),
            ), '//fonts.googleapis.com/css' );
        }
        return $fonts_url;
    }

    public function empelza_enqueue_styles() {

        //CSS Libs
        wp_enqueue_style( 'bootstrap', get_template_directory_uri() . '/assets/css/libs/bootstrap.css', array(), '4.0');
        wp_enqueue_style( 'font-awesome', get_template_directory_uri() . '/assets/css/libs/font-awesome.css', array(), '4.7');
        wp_enqueue_style( 'empelza-custom-icon-font', get_template_directory_uri() . '/assets/css/libs/fl-custom-icon-font.css', array(), '1.0');
        wp_enqueue_style( 'essential-set-icon', get_template_directory_uri() . '/assets/css/libs/essential-set-icon.css', array(), '1.0');
        wp_enqueue_style( 'modal-box', get_template_directory_uri() . '/assets/css/libs/modal-box.css', array(), '1.1.0');
        wp_enqueue_style( 'venobox', get_template_directory_uri() . '/assets/css/libs/venobox.css', array(), '1.8.6');

        // Preloader
        if(empelza_get_theme_mod('preloader_page_show') == 'true') {
            wp_enqueue_style( 'empelza-page-loader', get_template_directory_uri() . '/assets/css/page-preloader.css', array(), '1.0');}


        // General css
        wp_enqueue_style( 'empelza-general', get_template_directory_uri() . '/assets/css/general.css', array(), '1.0');
        wp_enqueue_style( 'empelza-vc-page-builder-style', get_template_directory_uri() . '/assets/css/vc-page-builder-style.css', array(), '1.0');

        // Kirki Save if plugin not active
        if ( !class_exists( 'Kirki' ) ) {
            wp_enqueue_style( 'empelza-save-google-fonts', $this->empelza_save_google_fonts_url(), false, '1.0' );
            wp_enqueue_style( 'empelza-save-kirki-customizer', get_template_directory_uri() .'/assets/css/kirki-save.css', array(), '1.0');
        }
    }



    public function empelza_enqueue_scripts() {

        $api_key = empelza_get_theme_mod('google_api_key');

        if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
            wp_enqueue_script( 'comment-reply' );
        }

        wp_enqueue_script( 'imagesloaded' );
        wp_enqueue_script( 'jquery-ui-widget' );


        // Plugin Custom Js
        wp_enqueue_script( 'bootstrap-bundle', get_template_directory_uri() . '/assets/js/vendors-libs/bootstrap-bundle.js', array( 'jquery' ), '4.0', true );
        wp_enqueue_script( 'slick', get_template_directory_uri()  . '/assets/js/vendors-libs/slick.js', array( 'jquery' ), '1.8.0', true );

        wp_enqueue_script( 'isotope', get_template_directory_uri() . '/assets/js/vendors-libs/isotope.js', array( 'jquery' ), '3.0.6', true );
        wp_enqueue_script( 'count-to', get_template_directory_uri() . '/assets/js/vendors-libs/count-to.js', array( 'jquery' ), '1.0', true );
        wp_enqueue_script( 'magnific-popup', get_template_directory_uri() . '/assets/js/vendors-libs/magnific-popup.js', array( 'jquery' ), '1.1.0', true );
        wp_enqueue_script( 'waypoints', get_template_directory_uri() . '/assets/js/vendors-libs/waypoints.js', array( 'jquery' ), '4.0.1', true );
        wp_enqueue_script( 'mega-menu', get_template_directory_uri() . '/assets/js/vendors-libs/mega-menu.js', array( 'jquery' ), '1.0', true );
        wp_enqueue_script( 'theia-sticky-sidebar', get_template_directory_uri() . '/assets/js/vendors-libs/theia-sticky-sidebar.js', array( 'jquery' ), '1.7.0', true );
        wp_enqueue_script( 'tween-max', get_template_directory_uri() . '/assets/js/vendors-libs/TweenMax.js', array( 'jquery' ), '2.0.2', true );
        wp_enqueue_script( 'velocity', get_template_directory_uri() . '/assets/js/vendors-libs/velocity.js', array( 'jquery' ), '1.5.0', true );
        wp_enqueue_script( 'velocity-pack', get_template_directory_uri() . '/assets/js/vendors-libs/velocity-ui-pack.js', array( 'jquery' ), '5.0.4', true );
        wp_enqueue_script( 'w-numb', get_template_directory_uri() . '/assets/js/vendors-libs/w-numb.js', array( 'jquery' ), '1.0', true );

        wp_enqueue_script( 'parallax-background', get_template_directory_uri() . '/assets/js/vendors-libs/parallax_background.js', array( 'jquery' ), '1.0', true );
        wp_enqueue_script( 'jarallax', get_template_directory_uri() . '/assets/js/vendors-libs/jarallax.js', array( 'jquery' ), '1.0', true );

        wp_enqueue_script( 'venobox', get_template_directory_uri() . '/assets/js/vendors-libs/venobox.js', array( 'jquery' ), '1.8.6', true );


        //Mega Menu
        wp_enqueue_script( 'mega-menu-start', get_template_directory_uri() . '/assets/js/vendors-libs/mega-menu/mega-menu-start.js', array( 'jquery' ),'1.0', true );

        // Preloader
        if(empelza_get_theme_mod('preloader_page_show') == 'true') {
            wp_register_script( 'empelza-page-loader', get_template_directory_uri() . '/assets/js/vendors-libs/empelza-page-loader.js', array( 'jquery' ), '1.0', true );
        }


        // Theme Js Custom File
        wp_enqueue_script( 'empelza-custom-scripts', get_template_directory_uri() . '/assets/js/scripts.js', array( 'jquery' ), '1.0', true );

        // Google Api Key
        if ($api_key !=''){
            // Google Maps
            wp_register_script( 'gmap3', get_template_directory_uri() . '/assets/js/vendors-libs/gmap3.js', array( 'jquery' ), '', true );
            wp_register_script( 'google-maps-api', '//maps.googleapis.com/maps/api/js?key='.esc_attr($api_key) );
        }


    }


    /**
     * Returns the login form
     */

    public static function empelza_login_form() {
    $args = array(
        'redirect'                      =>  esc_url( wp_login_url( get_permalink() ) ),
        'form_id'                       => 'loginform-custom',
        'label_username'                => '',
        'label_password'                => '',
    );

    if (class_exists('Fl_Login_Form_Widget')) {
        $args = array(
            'label_log_in'              => esc_html__('Sign in', 'empelza'),
            'label_lost_password'       => esc_html__('Forgot password', 'empelza').'?',
        );

        $empelza_login_widget = new Fl_Login_Form_Widget();

        $empelza_login_widget->wp_login_form($args);
    } else {
        wp_login_form($args);
    }

    }



}
endif;
if ( ! function_exists( 'empelza_admin' ) ) :
function empelza_admin() {
	return EMPELZA_Admin::instance();
}
endif;

EMPELZA_admin();



function empelza_google_map_url() {
    $map_key = empelza_get_theme_mod('google_api_key');
    $map_url = '//maps.googleapis.com/maps/api/js?key='.$map_key.'&callback=initMap';
    return esc_url_raw( $map_url );
}

