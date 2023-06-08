<?php
if ( ! defined( 'ABSPATH' ) ) { exit; }

if(!class_exists('Fl_Vc_Param_Hotspot')) {
    class Fl_Vc_Param_Hotspot {
        function __construct() {
            if(function_exists('vc_add_shortcode_param')) {
                vc_add_shortcode_param('fl_hotspot_param', array(&$this, 'fl_hotspot_param'), FL_THEME_HELPER_ROOT_DIR.'/assets/params/js/fl-param_hotspot_params.js');
                add_action('admin_enqueue_scripts', array($this, 'load_assets'));
            }
        }

        function fl_hotspot_param($settings, $value) {
            $value = isset($value) && !empty($value) ? $value : '';

            $id = uniqid('fl_hotspot_ls_var-');

            $html = '<div class="fl-hotspot-param-wrapper clearfix">';
            $html .= '<div class="fl-hotspot-image-holder" data-popup-title="'.esc_attr__('Hotspot tooltip content', 'fl-native').'" data-save-text="'.esc_attr__('Save changes', 'fl-native').'" data-close-text="'.esc_attr__('Close','fl-native').'"></div>';
            $html .= '<input type="hidden" id="'.esc_attr($id).'" name="'.$settings['param_name'].'" class="wpb_vc_param_value fl_hotspot_ls_var '.$settings['param_name'].' '.$settings['type'].'_field" value=\''.$value.'\' />';
            $html .= '</div>';
            return $html;
        }

        function load_assets() {
            wp_enqueue_script('fl_hotspot_param_js', FL_THEME_HELPER_ROOT_DIR . '/assets/params/js/jquery.hotspot.js', array('jquery'), null, true);
        }
    }
}

if(class_exists('Fl_Vc_Param_Hotspot')) {
    $Fl_Vc_Param_Hotspot = new Fl_Vc_Param_Hotspot();
}
