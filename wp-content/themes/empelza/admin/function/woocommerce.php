<?php
/**
 * Create a woo img container hover style
 */
if ( class_exists('WooCommerce') ) {

    //Declare WooCommerce support
    add_action( 'after_setup_theme', 'empelza_woocommerce_support' );
    function empelza_woocommerce_support() {
        add_theme_support( 'woocommerce' );
    }

}