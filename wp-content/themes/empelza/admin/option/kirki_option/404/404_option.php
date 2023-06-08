<?php

EMPELZA_Options::add_section('404_setting', array(
    'title'           => esc_attr__( '404 Page', 'empelza' ),
    'priority'        => 10,
    'icon'            => 'fa fa-bug'
));


 //404 Background
EMPELZA_Options::add_field( array(
    'type'          => 'textarea',
    'settings'      => '404_top_text_title',
    'label'         => esc_attr__( 'Top Text Title', 'empelza' ),
    'section'       => '404_setting',
    'default'       => esc_attr__( 'OOOPS!', 'empelza' ),
) );
EMPELZA_Options::add_field( array(
    'type'          => 'textarea',
    'settings'      => '404_text_title',
    'label'         => esc_attr__( 'Text Title', 'empelza' ),
    'section'       => '404_setting',
    'default'       => esc_attr__( '404', 'empelza' ),
) );

EMPELZA_Options::add_field( array(
    'type'          => 'textarea',
    'settings'      => '404_text',
    'label'         => esc_attr__( '404 Text', 'empelza' ),
    'section'       => '404_setting',
    'default'       => esc_attr__( 'The page you’re looking for cannot be found.', 'empelza' ),
) );
EMPELZA_Options::add_field( array(
    'type'          => 'textarea',
    'settings'      => '404_btn_text',
    'label'         => esc_attr__( '404 Button Text', 'empelza' ),
    'section'       => '404_setting',
    'default'       => esc_attr__( 'Back To Homepage', 'empelza' ),
) );

