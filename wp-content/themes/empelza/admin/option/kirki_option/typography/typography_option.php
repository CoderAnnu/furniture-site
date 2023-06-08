<?php
    EMPELZA_Options::add_section('typography_setting', array(
        'title'             => esc_attr__( 'Typography', 'empelza' ),
        'priority'          => 8,
        'panel'             => '',
        'icon'              => 'fa fa-font'
    ));

    EMPELZA_Options::add_field( array(
        'type'              => 'typography',
        'settings'          => 'body_typography',
        'label'             => esc_attr__( 'Body', 'empelza' ),
        'section'           => 'typography_setting',
        'default'     => array(
            'font-family'                       => 'Hind',
            'variant'                           => '300',
            'font-size'                         => '16px',
            'line-height'                       => '28px',
            'letter-spacing'                    => '',
            'color'                             => '#666666',
            'text-transform'                    => 'none',
            'text-align'                        => 'left',
        ),
        'priority'    => 1,
        'output'      => array(
            array(
                'element'                           => 'body',
            ),
        ),
    ) );

    EMPELZA_Options::add_field( array(
        'type'              => 'typography',
        'settings'          => 'light_font_typography',
        'label'             => esc_attr__( 'Light Font Style', 'empelza' ),
        'section'           => 'typography_setting',
        'priority'          => 10,
        'default' => array(
            'font-family'                       => 'Hind',
            'variant'                           => '300',
        ),
        'output'    => array(
            array(
                'element' => '.fl-text-light-style',
            ),
        ),
    ) );

    EMPELZA_Options::add_field( array(
        'type'              => 'typography',
        'settings'          => 'regular_font_typography',
        'label'             => esc_attr__( 'Regular Font Style', 'empelza' ),
        'section'           => 'typography_setting',
        'priority'          => 10,
        'default' => array(
            'font-family'                       => 'Hind',
            'variant'                           => 'regular',
        ),
        'output'    => array(
            array(
                'element' => '.fl-text-regular-style,blockquote,.sidebar .widget ul li',
            ),
        ),
    ) );

    EMPELZA_Options::add_field( array(
        'type'              => 'typography',
        'settings'          => 'medium_font_typography',
        'label'             => esc_attr__( 'Medium Font Style', 'empelza' ),
        'section'           => 'typography_setting',
        'priority'          => 10,
        'default' => array(
            'font-family'                       => 'Hind',
            'variant'                           => '500',
        ),
        'output'    => array(
            array(
                'element' => '.fl-text-medium-style,.fl-custom-btn,.fl-default-pagination .page-numbers,.sidebar .widget_tag_cloud .tagcloud a,.sidebar .widget_calendar .calendar_wrap #wp-calendar tbody tr td,.comment-reply-title #cancel-comment-reply-link,.booked-calendar-shortcode-wrap .booked-appt-list .timeslot .timeslot-people button',
            ),
        ),
    ) );

EMPELZA_Options::add_field( array(
    'type'              => 'typography',
    'settings'          => 'semi_bold_font_typography',
    'label'             => esc_attr__( 'Semi Bold Font Style', 'empelza' ),
    'section'           => 'typography_setting',
    'priority'          => 10,
    'default' => array(
        'font-family'                       => 'Hind',
        'variant'                           => '600',
    ),
    'output'    => array(
        array(
            'element' => '.fl-text-semi-bold-style',
        ),
    ),
) );

    EMPELZA_Options::add_field( array(
        'type'              => 'typography',
        'settings'          => 'bold_font_typography',
        'label'             => esc_attr__( 'Bold Font Style', 'empelza' ),
        'section'           => 'typography_setting',
        'priority'          => 10,
        'default' => array(
            'font-family'                       => 'Hind',
            'variant'                           => '700',
        ),
        'output'    => array(
            array(
                'element' => '.fl-text-bold-style',
            ),
        ),
    ) );

    EMPELZA_Options::add_field( array(
        'type'              => 'typography',
        'settings'          => 'header_typography',
        'label'             => esc_attr__( 'Header Titles', 'empelza' ),
        'section'           => 'typography_setting',
        'priority'          => 10,
        'default' => array(
            'font-family'                       => 'Hind',
            'variant'                           => '700',
            'color'                             => '#222222',
            'text-transform'                    => 'none',
            'subsets'                           => false,
        ),
        'output'    => array(
            array(
                'element' => 'h1, .h1, h2, .h2, h3, .h3, h4, .h4, h5, .h5, h6, .h6,.fl-text-title-style',
            ),
        ),
    ) );


    EMPELZA_Options::add_field( array(
        'type'              => 'slider',
        'settings'          => 'h1_size_typography',
        'label'             => esc_attr__('H1 Size', 'empelza'),
        'section'           => 'typography_setting',
        'default'           => 64,
        'priority'          => 10,
        'choices' => array(
                'min'                               => '15',
                'max'                               => '75',
                'step'                              => '1',
        ),
        'output'      => array(
            array(
                'element'                           => 'h1, .h1',
                'property'                          => 'font-size',
                'units'                             => 'px',
            ),
        ),
    ));

    EMPELZA_Options::add_field( array(
        'type'              => 'slider',
        'settings'          => 'h2_size_typography',
        'label'             => esc_attr__('H2 Size', 'empelza'),
        'section'           => 'typography_setting',
        'default'           => 44,
        'priority'          => 10,
        'choices' => array(
                'min'                               => '15',
                'max'                               => '75',
                'step'                              => '1',
        ),
        'output'      => array(
            array(
                'element'                           => 'h2, .h2',
                'property'                          => 'font-size',
                'units'                             => 'px',
            ),
        ),
    ));

    EMPELZA_Options::add_field( array(
        'type'              => 'slider',
        'settings'          => 'h3_size_typography',
        'label'             => esc_attr__('H3 Size', 'empelza'),
        'section'           => 'typography_setting',
        'default'           => 36,
        'priority'          => 10,
        'choices' => array(
                'min'                               => '15',
                'max'                               => '75',
                'step'                              => '1',
        ),
        'output'      => array(
            array(
                'element'                           => 'h3, .h3',
                'property'                          => 'font-size',
                'units'                             => 'px',
            ),
        ),
    ));

    EMPELZA_Options::add_field( array(
        'type'              => 'slider',
        'settings'          => 'h4_size_typography',
        'label'             => esc_attr__('H4 Size', 'empelza'),
        'section'           => 'typography_setting',
        'default'           => 32,
        'priority'          => 10,
        'choices' => array(
                'min'                               => '15',
                'max'                               => '75',
                'step'                              => '1',
        ),
        'output'      => array(
            array(
                'element'                           => 'h4, .h4',
                'property'                          => 'font-size',
                'units'                             => 'px',
            ),
        ),
    ));

    EMPELZA_Options::add_field( array(
        'type'              => 'slider',
        'settings'          => 'h5_size_typography',
        'label'             => esc_attr__('H5 Size', 'empelza'),
        'section'           => 'typography_setting',
        'default'           => 26,
        'priority'          => 10,
        'choices' => array(
                'min'                               => '15',
                'max'                               => '75',
                'step'                              => '1',
        ),
        'output'      => array(
            array(
                'element'                           => 'h5, .h5',
                'property'                          => 'font-size',
                'units'                             => 'px',
            ),
        ),
    ));

    EMPELZA_Options::add_field( array(
        'type'              => 'slider',
        'settings'          => 'h6_size_typography',
        'label'             => esc_attr__('H6 Size', 'empelza'),
        'section'           => 'typography_setting',
        'default'           => 24,
        'priority'          => 10,
        'choices' => array(
                'min'                               => '15',
                'max'                               => '75',
                'step'                              => '1',
        ),
        'output'      => array(
            array(
                'element'                           => 'h6, .h6',
                'property'                          => 'font-size',
                'units'                             => 'px',
            ),
        ),
    ));