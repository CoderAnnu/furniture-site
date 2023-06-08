<?php
EMPELZA_Options::add_section('navigator_section', array(
    'title'         => esc_attr__('Navigation Setting', 'empelza'),
    'priority'      => 8,
    'icon'          => 'fa fa-bars'
));
EMPELZA_Options::add_field( array(
    'type'              => 'radio-buttonset',
    'settings'          => 'nav_style',
    'label'             => esc_attr__( 'Navigator Style', 'empelza' ),
    'section'           => 'navigator_section',
    'priority'          => 1,
    'choices'     => [
        'absolute'          => esc_html__( 'Absolute', 'empelza' ),
        'relative'          => esc_html__( 'Relative With Top Sidebar', 'empelza' ),
    ],
    'default'           => 'absolute',
) );

EMPELZA_Options::add_field( array(
    'type'              => 'radio-buttonset',
    'settings'          => 'menu_color',
    'label'             => esc_attr__( 'Menu Color', 'empelza' ),
    'section'           => 'navigator_section',
    'priority'          => 1,
    'choices'     => [
        'dark'          => esc_html__( 'Dark', 'empelza' ),
        'light'         => esc_html__( 'Light', 'empelza' ),
    ],
    'default'           => 'light',
    'active_callback' => array(
        array(
            'setting'           => 'nav_style',
            'operator'          => '!=',
            'value'             => 'relative',
        ),
    ),
) );



EMPELZA_Options::add_field( array(
    'type'              => 'typography',
    'settings'          => 'navigation_typography',
    'label'             => esc_attr__( 'Navigation Typography', 'empelza' ),
    'section'           => 'navigator_section',
    'default'     => array(
        'font-family'                   => 'Hind',
        'font-size'                     => '14px',
        'variant'                       => '500',
        'text-transform'                => 'uppercase',
        'subsets'                       => array( 'latin-ext' ),
    ),
    'priority'          => 10,
    'output'            => array(
        array(
            'element'                   => '.fl--header .nav-menu li a',
        ),
    ),
) );

EMPELZA_Options::add_field( array(
    'type'              => 'typography',
    'settings'          => 'syb_megamenu_first_child_font',
    'label'             => esc_attr__('Mega Menu First Child Font Style', 'empelza'),
    'section'           => 'navigator_section',
    'priority'          => 10,
    'transport'         => 'auto',
    'default' => array(
        'font-family'                       => 'Hind',
        'variant'                           => '700',
        'color'                             => '#222222',
        'font-size'                         => '10px',
    ),
    'output' => array(
        array(
            'element'                           => '.fl-mega-menu>ul>li .sub-nav>ul.sub-menu-wide>li>a'
        ),
    ),
));


EMPELZA_Options::add_field( array(
    'type'              => 'typography',
    'settings'          => 'sub_menu_navigation_typography',
    'label'             => esc_attr__( 'Sub Menu Typography', 'empelza' ),
    'section'           => 'navigator_section',
    'default'     => array(
        'font-family'                   => 'Montserrat',
        'variant'                       => '500',
        'font-size'                     => '12px',
        'text-transform'                => 'none',
        'subsets'                       => array( 'latin-ext' ),
    ),
    'priority'          => 10,
    'output'            => array(
        array(
            'element'                   => '.fl--header .nav-menu li .sub-menu li a,.fl--header .nav-menu li .sub-menu li .sub-sub-menu',
        ),
    ),
) );

EMPELZA_Options::add_field( array(
    'type'              => 'typography',
    'settings'          => 'mobile_menu_navigation_typography',
    'label'             => esc_attr__( 'Mobile Menu Typography', 'empelza' ),
    'section'           => 'navigator_section',
    'default'     => array(
        'font-family'                   => 'Montserrat',
        'variant'                       => '500',
        'font-size'                     => '11px',
        'text-transform'                => 'uppercase',
        'subsets'                       => array( 'latin-ext' ),
    ),
    'priority'          => 10,
    'output'            => array(
        array(
            'element'                   => '.fl--mobile-menu li a',
        ),
    ),
) );

EMPELZA_Options::add_field( array(
    'type'              => 'typography',
    'settings'          => 'mobile_sub_menu_navigation_typography',
    'label'             => esc_attr__( 'Mobile Sub Menu Typography', 'empelza' ),
    'section'           => 'navigator_section',
    'default'     => array(
        'font-family'                   => 'Montserrat',
        'variant'                       => '500',
        'font-size'                     => '11px',
        'text-transform'                => 'none',
        'subsets'                       => array( 'latin-ext' ),
    ),
    'priority'          => 10,
    'output'            => array(
        array(
            'element'                   => '.fl--mobile-menu li .sub-menu li a',
        ),
    ),
) );


EMPELZA_Options::add_field( array(
    'type'              => 'toggle',
    'settings'          => 'menu_search_icon',
    'label'             => esc_attr__( 'Search Icon', 'empelza' ),
    'section'           => 'navigator_section',
    'priority'          => 10,
    'choices'     => [
        'enable'          => esc_html__( 'Enable', 'empelza' ),
        'disable'         => esc_html__( 'Disable', 'empelza' ),
    ],
    'default'           => 'disable',
) );

