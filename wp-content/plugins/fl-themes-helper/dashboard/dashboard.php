<?php

class TVK_Dashboard{

    const DASHBOARD_DIRECTORY_URI = '/dashboard/';
    const DASHBOARD_DIRECTORY = '/dashboard/';


    public function __construct(){
        $this->dashboard_init_data();
        add_action( 'admin_init', array($this, 'dashboard_install_plugin_init' ));
    }

    public $plugin_path;
    public $plugin_url;
    public $plugin_name;




    public function dashboard_init_data(){

        $this->plugin_path      = plugin_dir_path(__FILE__);
        $this->plugin_url       = plugin_dir_url(__FILE__);
        $this->dashboard_dir    = (dirname(__FILE__)) . self::DASHBOARD_DIRECTORY;
        $theme_info             = wp_get_theme();
        $theme_parent           = $theme_info->parent();
        if(!empty($theme_parent)) {
            $theme_info         = $theme_parent;
        }

        $this->theme_name       = $theme_info['Name'];
        $this->theme_version    = $theme_info['Version'];
        $this->theme_slug       = $theme_info['Slug'];
        $this->theme_is_child   = !empty($theme_parent);
        $this->theme_slug       = $theme_info->get_stylesheet();
        $this->dashboard_slug   = 'theme-dashboard';
        $this->tgmslug          = 'theme-plugin-install';

        $this->strings = array(
            'plugin_install_page'                           =>    dirname(__FILE__) . '/pages/plugin_install.php',
        );


    }

    public function let_to_num ($size) {
        $l   = substr( $size, -1 );
        $ret = substr( $size, 0, -1 );
        switch ( strtoupper( $l ) ) {
            case 'P': $ret *= 1024;
            case 'T': $ret *= 1024;
            case 'G': $ret *= 1024;
            case 'M': $ret *= 1024;
            case 'K': $ret *= 1024;
        }
        return $ret;
    }



    public function dashboard_admin_init () {
        $this->plugin_path              = plugin_dir_path(__FILE__);
        $this->plugin_url               = plugin_dir_url(__FILE__);

        $data                           = get_plugin_data(__FILE__);
        $this->plugin_name              = $data['Name'];
        $this->plugin_version           = $data['Version'];
        $this->plugin_description       = $data['Description'];

        $this->plugin_slug              = plugin_basename(__FILE__, '.php');
        $this->plugin_name_sanitized    = basename(__FILE__, '.php');


        $this->theme_s = get_locale();

        $this->updater();

    }


    public function dashboard_install_plugin_init() {
        if ( isset( $_GET['fl-plugin-deactivate'] ) && 'deactivate-plugin' == $_GET['fl-plugin-deactivate'] ) {
            check_admin_referer( 'fl-plugin-deactivate', 'fl-plugin-deactivate-nonce' );

            $plugins = TGM_Plugin_Activation::$instance->plugins;

            foreach ( $plugins as $plugin ) {
                if ( $plugin['slug'] == $_GET['plugin'] ) {
                    deactivate_plugins( $plugin['file_path'] );
                }
            }
        }
        if ( isset( $_GET['fl-plugin-activate'] ) && 'activate-plugin' == $_GET['fl-plugin-activate'] ) {
            check_admin_referer( 'fl-plugin-activate', 'fl-plugin-activate-nonce' );

            $plugins = TGM_Plugin_Activation::$instance->plugins;

            foreach ( $plugins as $plugin ) {
                if ( isset( $_GET['plugin'] ) && $plugin['slug'] == $_GET['plugin'] ) {
                    activate_plugin( $plugin['file_path'] );

                    wp_redirect( admin_url( 'admin.php?page=tvk-all-plugin-info' ) );
                    exit;
                }
            }
        }
    }
};

function tvk_dashboard(){
    return new TVK_Dashboard();
}
tvk_dashboard();