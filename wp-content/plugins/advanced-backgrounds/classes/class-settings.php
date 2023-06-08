<?php
/**
 * AWB Settings
 *
 * @package advanced-backgrounds
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

require_once nk_awb()->plugin_path . 'vendors/class-settings-api.php';

/**
 * Class AWB_Settings
 */
class AWB_Settings {
    /**
     * Settings API instance
     *
     * @var object
     */
    public $settings_api;

    /**
     * AWB_Settings constructor.
     */
    public function __construct() {
        $this->init_actions();
    }

    /**
     * Get Option Value
     *
     * @param string $option - option name.
     * @param string $section - section name.
     * @param string $default - default option value.
     *
     * @return bool|string
     */
    public static function get_option( $option, $section, $default = '' ) {
        $options = get_option( $section );

        if ( isset( $options[ $option ] ) ) {
            return 'off' === $options[ $option ] ? false : ( 'on' === $options[ $option ] ? true : $options[ $option ] );
        }

        return $default;
    }

    /**
     * Init actions
     */
    public function init_actions() {
        $this->settings_api = new AWB_Settings_API();

        add_action( 'admin_init', array( $this, 'admin_init' ) );
        add_action( 'admin_menu', array( $this, 'admin_menu' ) );
    }

    /**
     * Initialize the settings
     *
     * @return void
     */
    public function admin_init() {
        // set the settings.
        $this->settings_api->set_sections( $this->get_settings_sections() );
        $this->settings_api->set_fields( $this->get_settings_fields() );

        // initialize settings.
        $this->settings_api->admin_init();
    }

    /**
     * Register the admin settings menu
     *
     * @return void
     */
    public function admin_menu() {
        add_options_page(
            esc_html__( 'AWB Settings', 'advanced-backgrounds' ),
            esc_html__( 'AWB', 'advanced-backgrounds' ),
            'manage_options',
            'advanced-backgrounds-settings',
            array( $this, 'print_settings_page' )
        );
    }

    /**
     * Plugin settings sections
     *
     * @return array
     */
    public function get_settings_sections() {
        $sections = array(
            array(
                'id'    => 'awb_general',
                'title' => esc_html__( 'General', 'advanced-backgrounds' ),
            ),
        );

        return $sections;
    }

    /**
     * Returns all the settings fields
     *
     * @return array settings fields
     */
    public function get_settings_fields() {
        $settings_fields = array(
            'awb_general' => array(
                array(
                    'name'     => 'disable_parallax',
                    'label'    => esc_html__( 'Disable parallax', 'advanced-backgrounds' ),
                    'type'     => 'multicheck',
                    'options'  => array(
                        'everywhere' => 'Everywhere',
                        'mobile'     => 'Mobile',
                        'ie'         => 'IE',
                        'edge'       => 'Edge',
                        'firefox'    => 'FireFox',
                        'safari'     => 'Safari',
                        'chrome'     => 'Chrome',
                        'opera'      => 'Opera',
                    ),
                    'default'  => array(),
                ),
                array(
                    'name'     => 'disable_videos',
                    'label'    => esc_html__( 'Disable video', 'advanced-backgrounds' ),
                    'type'     => 'multicheck',
                    'options'  => array(
                        'everywhere' => 'Everywhere',
                        'mobile'     => 'Mobile',
                        'ie'         => 'IE',
                        'edge'       => 'Edge',
                        'firefox'    => 'FireFox',
                        'safari'     => 'Safari',
                        'chrome'     => 'Chrome',
                        'opera'      => 'Opera',
                    ),
                    'default'  => array(),
                ),
            ),
        );

        return $settings_fields;
    }

    /**
     * The plugin page handler
     *
     * @return void
     */
    public function print_settings_page() {
        echo '<div class="wrap">';
        echo '<h2>' . esc_html__( 'Advanced WordPress Backgrounds Settings', 'advanced-backgrounds' ) . '</h2>';

        $this->settings_api->show_navigation();
        $this->settings_api->show_forms();

        echo '</div>';

        wp_enqueue_style( 'nk-awb-settings', nk_awb()->plugin_url . 'assets/admin/settings/style.min.css', array(), '1.11.4' );
        wp_enqueue_script( 'nk-awb-settings', nk_awb()->plugin_url . 'assets/admin/settings/script.min.js', array( 'jquery' ), '1.11.4', true );
    }
}
new AWB_Settings();
