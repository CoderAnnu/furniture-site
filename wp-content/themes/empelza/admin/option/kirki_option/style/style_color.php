<?php
EMPELZA_Options::add_section('style_setting', array(
    'title'         => esc_attr__('Theme Style', 'empelza'),
    'priority'      => 8,
    'icon'          => 'fa fa-paint-brush'
));

EMPELZA_Options::add_field( array(
    'type'          => 'color',
    'settings'      => 'first_color_setting',
    'label'         => esc_attr__( 'First Color Setting', 'empelza' ),
    'section'       => 'style_setting',
    'priority'      => 1,
    'default'       => '#f33f4c',
    'choices'     => array(
        'alpha' => true,
    ),
) );

EMPELZA_Options::add_field( array(
    'type'          => 'color',
    'settings'      => 'first_light_color_setting',
    'label'         => esc_attr__( 'First Light Color Setting', 'empelza' ),
    'section'       => 'style_setting',
    'priority'      => 1,
    'default'       => '#fff2f3',
    'choices'     => array(
        'alpha' => true,
    ),
) );

EMPELZA_Options::add_field( array(
    'type'          => 'color',
    'settings'      => 'first_light_two_color_setting',
    'label'         => esc_attr__( 'First Light Color Two Setting', 'empelza' ),
    'section'       => 'style_setting',
    'priority'      => 1,
    'default'       => '#ffe5e7',
    'choices'     => array(
        'alpha' => true,
    ),
) );

EMPELZA_Options::add_field( array(
    'type'          => 'color',
    'settings'      => 'second_color_setting',
    'label'         => esc_attr__( 'Second Color Setting', 'empelza' ),
    'section'       => 'style_setting',
    'priority'      => 1,
    'default'       => '#ff9b0c',
    'choices'     => array(
        'alpha' => true,
    ),
) );

EMPELZA_Options::add_field( array(
    'type'          => 'color',
    'settings'      => 'second_light_color_setting',
    'label'         => esc_attr__( 'Second Light Color Setting', 'empelza' ),
    'section'       => 'style_setting',
    'priority'      => 1,
    'default'       => '#fff6e9',
    'choices'     => array(
        'alpha' => true,
    ),
) );

EMPELZA_Options::add_field( array(
    'type'          => 'color',
    'settings'      => 'second_light_two_color_setting',
    'label'         => esc_attr__( 'Second Light Two Color Setting', 'empelza' ),
    'section'       => 'style_setting',
    'priority'      => 1,
    'default'       => '#fff7ec',
    'choices'     => array(
        'alpha' => true,
    ),
) );

EMPELZA_Options::add_field( array(
    'type'          => 'color',
    'settings'      => 'third_color_setting',
    'label'         => esc_attr__( 'Third Color Setting', 'empelza' ),
    'section'       => 'style_setting',
    'priority'      => 1,
    'default'       => '#318eee',
    'choices'     => array(
        'alpha' => true,
    ),
) );

EMPELZA_Options::add_field( array(
    'type'          => 'color',
    'settings'      => 'third_different_shade_color_setting',
    'label'         => esc_attr__( 'Third Color Different Shade Setting', 'empelza' ),
    'section'       => 'style_setting',
    'priority'      => 1,
    'default'       => '#1b62db',
    'choices'     => array(
        'alpha' => true,
    ),
) );

EMPELZA_Options::add_field( array(
    'type'          => 'color',
    'settings'      => 'third_light_color_setting',
    'label'         => esc_attr__( 'Third Light Color Setting', 'empelza' ),
    'section'       => 'style_setting',
    'priority'      => 1,
    'default'       => '#e5f7ff',
    'choices'     => array(
        'alpha' => true,
    ),
) );

EMPELZA_Options::add_field( array(
    'type'          => 'color',
    'settings'      => 'third_light_two_color_setting',
    'label'         => esc_attr__( 'Third Light Two Color Setting', 'empelza' ),
    'section'       => 'style_setting',
    'priority'      => 1,
    'default'       => '#dfebff',
    'choices'     => array(
        'alpha' => true,
    ),
) );


EMPELZA_Options::add_field( array(
    'type'          => 'color',
    'settings'      => 'dark_color_setting',
    'label'         => esc_attr__( 'Dark Color Setting', 'empelza' ),
    'section'       => 'style_setting',
    'priority'      => 1,
    'default'       => '#00173e',
    'choices'     => array(
        'alpha' => true,
    ),
) );


EMPELZA_Options::add_field( array(
    'type'          => 'color',
    'settings'      => 'fourth_color_setting',
    'label'         => esc_attr__( 'Fourth Color Setting', 'empelza' ),
    'section'       => 'style_setting',
    'priority'      => 1,
    'default'       => '#681bdb',
    'choices'     => array(
        'alpha' => true,
    ),
) );

EMPELZA_Options::add_field( array(
    'type'        => 'multicolor',
    'settings'    => 'gradient_blue_mask',
    'label'       => esc_html__( 'Gradient Mask Background', 'empelza' ),
    'section'       => 'style_setting',
    'priority'    => 10,
    'choices'     => [
        'start_gradient'    => esc_html__( 'Start Gradient', 'empelza' ),
        'end_gradient'      => esc_html__( 'End Gradient', 'empelza' ),
    ],
    'default'     => [
        'start_gradient'    => '#1b62db',
        'end_gradient'      => '#6091e3',
    ],
) );







