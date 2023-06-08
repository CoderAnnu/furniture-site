<?php
EMPELZA_Options::add_panel('header_option', array(
    'title'     => esc_attr__('Heading Setting', 'empelza'),
    'priority'  => 9,
    'icon'      => 'fa fa-header',
));

// Blog Archive
EMPELZA_Options::add_section('blog_archive_page_heading_setting', array(
    'title'             => esc_attr__( 'Blog Archive Heading', 'empelza' ),
    'priority'          => 9,
    'panel'             => 'header_option',
));
EMPELZA_Options::add_field( array(
    'type'        => 'select',
    'settings'    => 'blog_header_opacity_scroll',
    'label'       => esc_attr__( 'Content Header Scroll Opacity', 'empelza' ),
    'section'     => 'blog_archive_page_heading_setting',
    'default'     => 'disable',
    'priority'    => 1,
    'multiple'    => 1,
    'choices' => array(
        'disable'                    => esc_attr__('Disable','empelza'),
        'enable'                     => esc_attr__('Enable','empelza'),
    ),
) );

EMPELZA_Options::add_field( array(
    'type'              => 'text',
    'settings'          => 'blog_title',
    'label'             => esc_attr__( 'Blog Archive Page Title', 'empelza' ),
    'description'       => esc_attr__( 'Specify the title for Blog archive page', 'empelza' ),
    'section'           => 'blog_archive_page_heading_setting',
    'default'           => esc_attr__( 'Latest News', 'empelza' ),
    'priority'          => 1,
) );

EMPELZA_Options::add_field( array(
    'type'              => 'textarea',
    'settings'          => 'blog_title_description',
    'label'             => esc_attr__( 'Blog Archive Page Description', 'empelza' ),
    'section'           => 'blog_archive_page_heading_setting',
    'default'           => '',
    'priority'          => 1,
) );

EMPELZA_Options::add_field( array(
    'type'        => 'image',
    'settings'    => 'blog_archive_page_background_img',
    'label'       => esc_attr__( 'Archive Blog Image', 'empelza' ),
    'section'     => 'blog_archive_page_heading_setting',
    'default'     => '',
    'priority'    => 1,
) );

EMPELZA_Options::add_field( array(
    'type'        => 'image',
    'settings'    => 'blog_archive_page_parallax_hover_img',
    'label'       => esc_attr__( 'Archive Blog Image Hover Image Decor', 'empelza' ),
    'section'     => 'blog_archive_page_heading_setting',
    'default'     => '',
    'priority'    => 1,
) );
EMPELZA_Options::add_field( array(
    'type'        => 'select',
    'settings'    => 'blog_header_mask_style_bg',
    'label'       => esc_attr__( 'Blog Archive Background Mask Style', 'empelza' ),
    'section'     => 'blog_archive_page_heading_setting',
    'default'     => 'disable',
    'priority'    => 1,
    'multiple'    => 1,
    'choices' => array(
        'disable'                    => esc_attr__('Disable','empelza'),
        'blue-gradient'              => esc_attr__('Blue Gradient','empelza'),
        'purple'                     => esc_attr__('Purple','empelza'),
        'custom'                     => esc_attr__('Custom','empelza'),
    ),
) );

EMPELZA_Options::add_field( array(
    'type'        => 'color',
    'settings'    => 'custom_color_bg_mask',
    'label'       => esc_attr__( 'Custom Mask Header BG Color', 'empelza' ),
    'section'     => 'blog_archive_page_heading_setting',
    'default'     => '#0088CC',
    'active_callback' => array(
        array(
            'setting'           => 'blog_header_mask_style_bg',
            'operator'          => '==',
            'value'             => 'custom',
        ),
    ),
    'choices'     => [
        'alpha' => true,
    ],
) );

// Blog single
EMPELZA_Options::add_section('blog_single_page_heading_setting', array(
    'title'             => esc_attr__( 'Blog Single Heading', 'empelza' ),
    'priority'          => 9,
    'panel'             => 'header_option',
));
EMPELZA_Options::add_field( array(
    'type'        => 'select',
    'settings'    => 'blog_single_header_opacity_scroll',
    'label'       => esc_attr__( 'Content Header Scroll Opacity', 'empelza' ),
    'section'     => 'blog_single_page_heading_setting',
    'default'     => 'disable',
    'priority'    => 1,
    'multiple'    => 1,
    'choices' => array(
        'disable'                    => esc_attr__('Disable','empelza'),
        'enable'                     => esc_attr__('Enable','empelza'),
    ),
) );

EMPELZA_Options::add_field( array(
    'type'              => 'text',
    'settings'          => 'blog_single_title',
    'label'             => esc_attr__( 'Blog Single Page Title', 'empelza' ),
    'description'       => esc_attr__( 'Specify the title for Blog single page', 'empelza' ),
    'section'           => 'blog_single_page_heading_setting',
    'default'           => esc_attr__( 'Latest News', 'empelza' ),
    'priority'          => 1,
) );

EMPELZA_Options::add_field( array(
    'type'              => 'textarea',
    'settings'          => 'blog_single_title_description',
    'label'             => esc_attr__( 'Blog Single Page Description', 'empelza' ),
    'section'           => 'blog_single_page_heading_setting',
    'default'           => '',
    'priority'          => 1,
) );

EMPELZA_Options::add_field( array(
    'type'        => 'image',
    'settings'    => 'blog_single_page_background_img',
    'label'       => esc_attr__( 'Single Blog Image', 'empelza' ),
    'section'     => 'blog_single_page_heading_setting',
    'default'     => '',
    'priority'    => 1,
) );

EMPELZA_Options::add_field( array(
    'type'        => 'image',
    'settings'    => 'blog_single_page_parallax_hover_img',
    'label'       => esc_attr__( 'Single Blog Image Hover Image Decor', 'empelza' ),
    'section'     => 'blog_single_page_heading_setting',
    'default'     => '',
    'priority'    => 1,
) );
EMPELZA_Options::add_field( array(
    'type'        => 'select',
    'settings'    => 'blog_single_header_mask_style_bg',
    'label'       => esc_attr__( 'Blog Single Background Mask Style', 'empelza' ),
    'section'     => 'blog_single_page_heading_setting',
    'default'     => 'disable',
    'priority'    => 1,
    'multiple'    => 1,
    'choices' => array(
        'disable'                    => esc_attr__('Disable','empelza'),
        'blue-gradient'              => esc_attr__('Blue Gradient','empelza'),
        'purple'                     => esc_attr__('Purple','empelza'),
        'custom'                     => esc_attr__('Custom','empelza'),
    ),
) );

EMPELZA_Options::add_field( array(
    'type'        => 'color',
    'settings'    => 'blog_single_custom_color_bg_mask',
    'label'       => esc_attr__( 'Custom Mask Header BG Color', 'empelza' ),
    'section'     => 'blog_single_page_heading_setting',
    'default'     => '#0088CC',
    'active_callback' => array(
        array(
            'setting'           => 'blog_single_header_mask_style_bg',
            'operator'          => '==',
            'value'             => 'custom',
        ),
    ),
    'choices'     => [
        'alpha' => true,
    ],
) );


// Portfolio Archive
EMPELZA_Options::add_section('portfolio_archive_page_heading_setting', array(
    'title'             => esc_attr__( 'Portfolio Archive Heading', 'empelza' ),
    'priority'          => 9,
    'panel'             => 'header_option',
));
EMPELZA_Options::add_field( array(
    'type'        => 'select',
    'settings'    => 'portfolio_header_opacity_scroll',
    'label'       => esc_attr__( 'Content Header Scroll Opacity', 'empelza' ),
    'section'     => 'portfolio_archive_page_heading_setting',
    'default'     => 'disable',
    'priority'    => 1,
    'multiple'    => 1,
    'choices' => array(
        'disable'                    => esc_attr__('Disable','empelza'),
        'enable'                     => esc_attr__('Enable','empelza'),
    ),
) );

EMPELZA_Options::add_field( array(
    'type'              => 'text',
    'settings'          => 'portfolio_title',
    'label'             => esc_attr__( 'Portfolio Archive Page Title', 'empelza' ),
    'description'       => esc_attr__( 'Specify the title for Portfolio archive page', 'empelza' ),
    'section'           => 'portfolio_archive_page_heading_setting',
    'default'           => esc_attr__( 'Portfolio', 'empelza' ),
    'priority'          => 1,
) );

EMPELZA_Options::add_field( array(
    'type'              => 'textarea',
    'settings'          => 'portfolio_title_description',
    'label'             => esc_attr__( 'Portfolio Archive Page Description', 'empelza' ),
    'section'           => 'portfolio_archive_page_heading_setting',
    'default'           => '',
    'priority'          => 1,
) );

EMPELZA_Options::add_field( array(
    'type'        => 'image',
    'settings'    => 'portfolio_archive_page_background_img',
    'label'       => esc_attr__( 'Archive Portfolio Image', 'empelza' ),
    'section'     => 'portfolio_archive_page_heading_setting',
    'default'     => '',
    'priority'    => 1,
) );

EMPELZA_Options::add_field( array(
    'type'        => 'image',
    'settings'    => 'portfolio_archive_page_parallax_hover_img',
    'label'       => esc_attr__( 'Archive Portfolio Image Hover Image Decor', 'empelza' ),
    'section'     => 'portfolio_archive_page_heading_setting',
    'default'     => '',
    'priority'    => 1,
) );
EMPELZA_Options::add_field( array(
    'type'        => 'select',
    'settings'    => 'portfolio_header_mask_style_bg',
    'label'       => esc_attr__( 'Portfolio Archive Background Mask Style', 'empelza' ),
    'section'     => 'portfolio_archive_page_heading_setting',
    'default'     => 'disable',
    'priority'    => 1,
    'multiple'    => 1,
    'choices' => array(
        'disable'                    => esc_attr__('Disable','empelza'),
        'blue-gradient'              => esc_attr__('Blue Gradient','empelza'),
        'purple'                     => esc_attr__('Purple','empelza'),
        'custom'                     => esc_attr__('Custom','empelza'),
    ),
) );

EMPELZA_Options::add_field( array(
    'type'        => 'color',
    'settings'    => 'custom_color_bg_mask',
    'label'       => esc_attr__( 'Custom Mask Header BG Color', 'empelza' ),
    'section'     => 'portfolio_archive_page_heading_setting',
    'default'     => '#0088CC',
    'active_callback' => array(
        array(
            'setting'           => 'portfolio_header_mask_style_bg',
            'operator'          => '==',
            'value'             => 'custom',
        ),
    ),
    'choices'     => [
        'alpha' => true,
    ],
) );


// Portfolio single
EMPELZA_Options::add_section('portfolio_single_page_heading_setting', array(
    'title'             => esc_attr__( 'Portfolio Single Heading', 'empelza' ),
    'priority'          => 9,
    'panel'             => 'header_option',
));
EMPELZA_Options::add_field( array(
    'type'        => 'select',
    'settings'    => 'portfolio_single_header_opacity_scroll',
    'label'       => esc_attr__( 'Content Header Scroll Opacity', 'empelza' ),
    'section'     => 'portfolio_single_page_heading_setting',
    'default'     => 'disable',
    'priority'    => 1,
    'multiple'    => 1,
    'choices' => array(
        'disable'                    => esc_attr__('Disable','empelza'),
        'enable'                     => esc_attr__('Enable','empelza'),
    ),
) );


EMPELZA_Options::add_field( array(
    'type'              => 'textarea',
    'settings'          => 'portfolio_single_title_description',
    'label'             => esc_attr__( 'Portfolio Single Page Description', 'empelza' ),
    'section'           => 'portfolio_single_page_heading_setting',
    'default'           => '',
    'priority'          => 1,
) );

EMPELZA_Options::add_field( array(
    'type'        => 'image',
    'settings'    => 'portfolio_single_page_background_img',
    'label'       => esc_attr__( 'Single Portfolio Image', 'empelza' ),
    'section'     => 'portfolio_single_page_heading_setting',
    'default'     => '',
    'priority'    => 1,
) );

EMPELZA_Options::add_field( array(
    'type'        => 'image',
    'settings'    => 'portfolio_single_page_parallax_hover_img',
    'label'       => esc_attr__( 'Single Portfolio Image Hover Image Decor', 'empelza' ),
    'section'     => 'portfolio_single_page_heading_setting',
    'default'     => '',
    'priority'    => 1,
) );
EMPELZA_Options::add_field( array(
    'type'        => 'select',
    'settings'    => 'portfolio_single_header_mask_style_bg',
    'label'       => esc_attr__( 'Portfolio Single Background Mask Style', 'empelza' ),
    'section'     => 'portfolio_single_page_heading_setting',
    'default'     => 'disable',
    'priority'    => 1,
    'multiple'    => 1,
    'choices' => array(
        'disable'                    => esc_attr__('Disable','empelza'),
        'blue-gradient'              => esc_attr__('Blue Gradient','empelza'),
        'purple'                     => esc_attr__('Purple','empelza'),
        'custom'                     => esc_attr__('Custom','empelza'),
    ),
) );

EMPELZA_Options::add_field( array(
    'type'        => 'color',
    'settings'    => 'portfolio_single_custom_color_bg_mask',
    'label'       => esc_attr__( 'Custom Mask Header BG Color', 'empelza' ),
    'section'     => 'portfolio_single_page_heading_setting',
    'default'     => '#0088CC',
    'active_callback' => array(
        array(
            'setting'           => 'portfolio_single_header_mask_style_bg',
            'operator'          => '==',
            'value'             => 'custom',
        ),
    ),
    'choices'     => [
        'alpha' => true,
    ],
) );

// 404 Page
EMPELZA_Options::add_section('404_page_heading_setting', array(
    'title'             => esc_attr__( '404 Heading', 'empelza' ),
    'priority'          => 9,
    'panel'             => 'header_option',
));
EMPELZA_Options::add_field( array(
    'type'        => 'select',
    'settings'    => '404_header_opacity_scroll',
    'label'       => esc_attr__( 'Content Header Scroll Opacity', 'empelza' ),
    'section'     => '404_page_heading_setting',
    'default'     => 'disable',
    'priority'    => 1,
    'multiple'    => 1,
    'choices' => array(
        'disable'                    => esc_attr__('Disable','empelza'),
        'enable'                     => esc_attr__('Enable','empelza'),
    ),
) );

EMPELZA_Options::add_field( array(
    'type'              => 'text',
    'settings'          => '404_title',
    'label'             => esc_attr__( 'Blog Archive Page Title', 'empelza' ),
    'description'       => esc_attr__( 'Specify the title for Blog archive page', 'empelza' ),
    'section'           => '404_page_heading_setting',
    'default'           => esc_attr__( 'Page Not Found', 'empelza' ),
    'priority'          => 1,
) );

EMPELZA_Options::add_field( array(
    'type'              => 'textarea',
    'settings'          => '404_title_description',
    'label'             => esc_attr__( 'Blog Archive Page Description', 'empelza' ),
    'section'           => '404_page_heading_setting',
    'default'           => '',
    'priority'          => 1,
) );

EMPELZA_Options::add_field( array(
    'type'        => 'image',
    'settings'    => '404_archive_page_background_img',
    'label'       => esc_attr__( 'Archive Blog Image', 'empelza' ),
    'section'     => '404_page_heading_setting',
    'default'     => '',
    'priority'    => 1,
) );

EMPELZA_Options::add_field( array(
    'type'        => 'image',
    'settings'    => '404_archive_page_parallax_hover_img',
    'label'       => esc_attr__( 'Archive Blog Image Hover Image Decor', 'empelza' ),
    'section'     => '404_page_heading_setting',
    'default'     => '',
    'priority'    => 1,
) );
EMPELZA_Options::add_field( array(
    'type'        => 'select',
    'settings'    => '404_header_mask_style_bg',
    'label'       => esc_attr__( 'Blog Archive Background Mask Style', 'empelza' ),
    'section'     => '404_page_heading_setting',
    'default'     => 'disable',
    'priority'    => 1,
    'multiple'    => 1,
    'choices' => array(
        'disable'                    => esc_attr__('Disable','empelza'),
        'blue-gradient'              => esc_attr__('Blue Gradient','empelza'),
        'purple'                     => esc_attr__('Purple','empelza'),
        'custom'                     => esc_attr__('Custom','empelza'),
    ),
) );

EMPELZA_Options::add_field( array(
    'type'        => 'color',
    'settings'    => '404_custom_color_bg_mask',
    'label'       => esc_attr__( 'Custom Mask Header BG Color', 'empelza' ),
    'section'     => '404_page_heading_setting',
    'default'     => '#0088CC',
    'active_callback' => array(
        array(
            'setting'           => '404_header_mask_style_bg',
            'operator'          => '==',
            'value'             => 'custom',
        ),
    ),
    'choices'     => [
        'alpha' => true,
    ],
) );