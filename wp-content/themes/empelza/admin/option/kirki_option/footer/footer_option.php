<?php

EMPELZA_Options::add_section('footer_setting', array(
    'title'             => esc_attr__( 'Footer', 'empelza' ),
    'priority'          => 11,
    'panel'             => '',
    'icon'              => 'fa fa-copyright'
));

EMPELZA_Options::add_field( array(
    'type'              => 'select',
    'settings'          => 'footer_style',
    'label'             => esc_attr__( 'Footer Top Content Style', 'empelza' ),
    'section'           => 'footer_setting',
    'priority'          => 1,
    'choices'     => [
        'three-column'          => esc_html__( 'Three Column', 'empelza' ),
        'four-column'           => esc_html__( 'Four Column', 'empelza' ),
    ],
    'default'           => 'three-column',
) );


EMPELZA_Options::add_field( array(
    'type'        => 'select',
    'settings'    => 'animation_widget',
    'label'       => esc_html__( 'Widget Animation', 'empelza' ),
    'section'     => 'footer_setting',
    'default'     => 'disable',
    'priority'    => 1,
    'multiple'    => 1,
    'choices'     => [
        'disable'                =>         esc_attr__('Disable','empelza'),
        'fadeIn'                 =>         esc_attr__('fadeIn','empelza'),
        'flipXIn'                =>         esc_attr__('flipXIn','empelza'),
        'flipYIn'                =>         esc_attr__('flipYIn','empelza'),
        'flipBounceXIn'          =>         esc_attr__('flipBounceXIn','empelza'),
        'flipBounceYIn'          =>         esc_attr__('flipBounceYIn','empelza'),
        'swoopIn'                =>         esc_attr__('swoopIn','empelza'),
        'raise'                  =>         esc_attr__('raise','empelza'),
        'whirlIn'                =>         esc_attr__('whirlIn','empelza'),
        'shrinkIn'               =>         esc_attr__('shrinkIn','empelza'),
        'expandIn'               =>         esc_attr__('expandIn','empelza'),
        'bounceIn'               =>         esc_attr__('bounceIn','empelza'),
        'bounceUpIn'             =>         esc_attr__('bounceUpIn','empelza'),
        'bounceDownIn'           =>         esc_attr__('bounceDownIn','empelza'),
        'bounceLeftIn'           =>         esc_attr__('bounceLeftIn','empelza'),
        'bounceRightIn'          =>         esc_attr__('bounceRightIn','empelza'),
        'slideUpIn'              =>         esc_attr__('slideUpIn','empelza'),
        'slideDownIn'            =>         esc_attr__('slideDownIn','empelza'),
        'slideLeftIn'            =>         esc_attr__('slideLeftIn','empelza'),
        'slideRightIn'           =>         esc_attr__('slideRightIn','empelza'),
        'slideUpBigIn'           =>         esc_attr__('slideUpBigIn','empelza'),
        'slideDownBigIn'         =>         esc_attr__('slideDownBigIn','empelza'),
        'slideLeftBigIn'         =>         esc_attr__('slideLeftBigIn','empelza'),
        'slideRightBigIn'        =>         esc_attr__('slideRightBigIn','empelza'),
        'perspectiveUpIn'        =>         esc_attr__('perspectiveUpIn','empelza'),
        'perspectiveDownIn'      =>         esc_attr__('perspectiveDownIn','empelza'),
        'perspectiveLeftIn'      =>         esc_attr__('perspectiveLeftIn','empelza'),
        'perspectiveRightIn'     =>         esc_attr__('perspectiveRightIn','empelza'),
        'zoomIn'                 =>         esc_attr__('zoomIn','empelza'),
        'slideInRightVeryBig'    =>         esc_attr__('slideInRightVeryBig','empelza'),
        'slideInLeftVeryBig'     =>         esc_attr__('slideInLeftVeryBig','empelza'),
    ],
) );

EMPELZA_Options::add_field( array(
    'type'              => 'image',
    'settings'          => 'footer_bg',
    'label'             => esc_attr__( 'Footer Decor Background Image', 'empelza' ),
    'section'           => 'footer_setting',
    'transport'         => 'auto',
    'default'           =>  '',
) );

EMPELZA_Options::add_field( array(
    'type'              => 'textarea',
    'settings'          => 'footer_copyrights',
    'label'             => esc_attr__( 'Copyrights', 'empelza' ),
    'description'       => esc_attr__( 'Insert the Copyrights text.', 'empelza' ),
    'section'           => 'footer_setting',
    'default'           => esc_html__( 'Copyrights © 2020 Empelza Templines. All rights reserved.', 'empelza' ),
    'priority'          => 10,
) );