<?php

EMPELZA_Options::add_field( array(
    'type'              => 'image',
    'settings'          => 'site_logo',
    'label'             => esc_attr__( 'Site Logo Light', 'empelza' ),
    'description'       => esc_attr__('Upload site logo.', 'empelza' ),
    'section'           => 'title_tagline',
    'default'           => '',
    'priority'          => 2,
) );

EMPELZA_Options::add_field( array(
    'type'              => 'image',
    'settings'          => 'site_logo_dark',
    'label'             => esc_attr__( 'Site Logo Dark', 'empelza' ),
    'description'       => esc_attr__('Upload site logo.', 'empelza' ),
    'section'           => 'title_tagline',
    'default'           => '',
    'priority'          => 2,
) );

EMPELZA_Options::add_field( array(
    'type'              => 'text',
    'settings'          => 'logo_wth',
    'label'             => esc_attr__('Max width Logotype', 'empelza' ),
    'description'       => esc_attr__('Site logo width in px.', 'empelza' ),
    'section'           => 'title_tagline',
    'default'           => '125',
    'priority'          => 2,
    'output'      => array(
        array(
            'element'               => '.fl--logo-container img',
            'property'              => 'max-width',
            'suffix'                => 'px',
        ),
    ),
) );

EMPELZA_Options::add_field( array(
    'type'              => 'textarea',
    'settings'          => 'google_api_key',
    'label'             => esc_attr__( 'Apikey', 'empelza' ),
    'description'       => esc_attr__( 'Insert Google Maps Apikey.', 'empelza' ),
    'section'           => 'title_tagline',
    'default'           => 'AIzaSyDBuVQgQSnzG2ngl4hzn-A00IIhYVk8RaE',
    'priority'          => 3,
) );

EMPELZA_Options::add_field( array(
    'type'              => 'textarea',
    'settings'          => 'search_text',
    'label'             => esc_attr__( 'Search Text', 'empelza' ),
    'section'           => 'title_tagline',
    'default'           => esc_html__( 'Hit enter to search or ESC to close', 'empelza' ),
    'priority'          => 3,
) );