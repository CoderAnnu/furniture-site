<?php


EMPELZA_Options::add_section('background_setting', array(
    'title'             => esc_attr__( 'Background', 'empelza' ),
    'priority'          => 8,
    'panel'             => '',
    'icon'              => 'fa fa-picture-o'
));

EMPELZA_Options::add_field( array(
    'type'              => 'select',
    'settings'          => 'show_background_page',
    'label'             => esc_attr__( 'Background page', 'empelza' ),
    'section'           => 'background_setting',
    'default'           => 'disable',
    'priority'          => 1,
    'multiple'          => 1,
    'choices' => array(
            'disable'                   => esc_attr__('Disable background','empelza'),
            'enable'                    => esc_attr__('Enable background','empelza'),
    ),
) );


EMPELZA_Options::add_field( array(
    'type'              => 'background',
    'settings'          => 'body_bg',
    'label'             => esc_attr__( 'Body Background Image', 'empelza' ),
    'section'           => 'background_setting',
    'transport'         => 'auto',
    'default'  => array(
            'background-image'          => '',
            'background-color'          => '',
            'background-repeat'         => 'repeat-all',
            'background-size'           => 'auto',
            'background-attachment'     => 'fixed',
            'background-position'       => 'left top',
    ),
    'active_callback' => array(
        array(
            'setting'                   => 'show_background_page',
            'operator'                  => '==',
            'value'                     => 'enable',
        ),
    ),
    'output'  => array(
        array(
            'element'                   => 'body',
        ),
    ),
) );