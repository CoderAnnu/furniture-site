<?php

EMPELZA_Options::add_section('portfolio_archive_option', array(
    'title'             => esc_attr__( 'Portfolio Setting', 'empelza' ),
    'priority'          => 10,
    'icon'              => 'fa fa-th'
));
EMPELZA_Options::add_field( array(
    'type'              => 'select',
    'settings'          => 'portfolio_archive_style',
    'label'             => esc_attr__( 'Portfolio Style', 'empelza' ),
    'section'           => 'portfolio_archive_option',
    'default'           => 'portfolio-masonry-style',
    'priority'          => 1,
    'multiple'          => 1,
    'choices' => array(
            "portfolio-grid-three-column"                       => esc_attr__("Style Grid Three Column", "empelza"),
            "portfolio-grid-four-column"                        => esc_attr__("Style Grid Four Column", "empelza"),
            "portfolio-masonry-style"                           => esc_attr__("Style Masonry", "empelza"),
    ),
) );

EMPELZA_Options::add_field( array(
    'type'        => 'select',
    'settings'    => 'animation_portfolio',
    'label'       => esc_html__( 'Portfolio Item Animation', 'empelza' ),
    'section'     => 'portfolio_archive_option',
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
    'type'              => 'select',
    'settings'          => 'portfolio_filter',
    'label'             => esc_attr__( 'Portfolio Filter', 'empelza' ),
    'section'           => 'portfolio_archive_option',
    'default'           => 'enable',
    'priority'          => 1,
    'multiple'          => 1,
    'choices' => array(
            "enable"                            => esc_attr__("Enable", "empelza"),
            "disable"                           => esc_attr__("Disable", "empelza"),
    ),
) );


EMPELZA_Options::add_field( array(
    'type'              => 'text',
    'settings'          => 'first_filter_text',
    'label'             => esc_html__( 'First Filter Text', 'empelza' ),
    'section'           => 'portfolio_archive_option',
    'priority'          => 1,
    'default'           => esc_attr__('All Works', "empelza"),
    'active_callback' => array(
        array(
            'setting'           => 'portfolio_filter',
            'operator'          => '!=',
            'value'             => 'disable',
        ),
    ),
) );
