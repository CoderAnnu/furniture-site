<?php
EMPELZA_Options::add_panel('blog_panel_archive', array(
    'title'     => esc_attr__('Blog Archive Setting', 'empelza'),
    'priority'  => 10,
    'icon'      => 'fa fa-newspaper-o'
));


//Blog Archive Animation
EMPELZA_Options::add_section('blog_archive_animation', array(
    'title'             => esc_attr__( 'Blog Animation', 'empelza' ),
    'priority'          => 10,
    'panel'             => 'blog_panel_archive',
));

EMPELZA_Options::add_field( array(
    'type'              => 'select',
    'settings'          => 'blog_animation',
    'label'             => esc_attr__( 'Blog Animation', 'empelza' ),
    'section'           => 'blog_archive_animation',
    'default'           => 'disable',
    'priority'          => 1,
    'multiple'          => 1,
    'choices' => array(
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
    ),

) );
//Blog Archive Post Setting
EMPELZA_Options::add_section('blog_archive_post_setting', array(
    'title'             => esc_attr__( 'Blog Post Setting', 'empelza' ),
    'priority'          => 10,
    'panel'             => 'blog_panel_archive',
));
EMPELZA_Options::add_field( array(
    'type'        => 'select',
    'settings'    => 'blog_archive_style',
    'label'       => esc_attr__( 'Blog Style', 'empelza' ),
    'section'     => 'blog_archive_post_setting',
    'default'     => 'default',
    'priority'    => 1,
    'multiple'    => 1,
    'choices' => array(
        'default'                => esc_attr__('Standard','empelza'),
        'default-two'            => esc_attr__('Standard Two','empelza'),
        'grid'                   => esc_attr__('Grid','empelza'),
    ),
) );

EMPELZA_Options::add_field( array(
    'type'              => 'text',
    'settings'          => 'custom_blog_excerpt_count',
    'label'             => esc_attr__( 'Number of Words in Description', 'empelza' ),
    'description'       => esc_attr__( 'Specify the Number of Words for Description blog per post.', 'empelza' ),
    'section'           => 'blog_archive_post_setting',
    'default'           => '52',
    'priority'          => 1,
) );

EMPELZA_Options::add_field( array(
    'type'        => 'select',
    'settings'    => 'blog_archive_padding_top',
    'label'       => esc_attr__( 'Padding top', 'empelza' ),
    'section'     => 'blog_archive_post_setting',
    'default'     => 'enable',
    'priority'    => 1,
    'multiple'    => 1,
    'choices' => array(
        'enable'                => esc_attr__('Enable','empelza'),
        'disable'               => esc_attr__('Disable','empelza'),
    ),
) );
EMPELZA_Options::add_field( array(
    'type'        => 'select',
    'settings'    => 'blog_archive_padding_bottom',
    'label'       => esc_attr__( 'Padding bottom', 'empelza' ),
    'section'     => 'blog_archive_post_setting',
    'default'     => 'enable',
    'priority'    => 1,
    'multiple'    => 1,
    'choices'  => array(
        'enable'                => esc_attr__('Enable','empelza'),
        'disable'               => esc_attr__('Disable','empelza'),
    ),
) );
EMPELZA_Options::add_field( array(
    'type'              => 'select',
    'settings'          => 'blog_pagination',
    'label'             => esc_attr__( 'Pagination Settings', 'empelza' ),
    'description'       => esc_attr__( 'Select the Pagination Type for Blog Archives', 'empelza' ),
    'section'           => 'blog_archive_post_setting',
    'default'           => 'pagination',
    'priority'          => 1,
    'multiple'          => 1,
    'choices' => array(
        'pagination'        => esc_attr__('Pagination','empelza'),
        'loadmore'          => esc_attr__('Load More Button','empelza'),
    ),
) );
//Blog Archive Sidebar Setting
EMPELZA_Options::add_section('blog_archive_post_sidebar_setting', array(
    'title'             => esc_attr__( 'Blog Archive Sidebar Setting', 'empelza' ),
    'priority'          => 10,
    'panel'             => 'blog_panel_archive',
));
EMPELZA_Options::add_field( array(
    'type'              => 'select',
    'settings'          => 'blog_archive_sidebar_position',
    'label'             => esc_attr__( 'Sidebar position', 'empelza' ),
    'section'           => 'blog_archive_post_sidebar_setting',
    'default'           => 'right',
    'priority'          => 1,
    'multiple'          => 1,
    'choices' => array(
        'left'              => esc_attr__('Left','empelza'),
        'right'             => esc_attr__('Right','empelza'),
        'disable'           => esc_attr__('Disable','empelza'),
    ),

) );
EMPELZA_Options::add_field( array(
    'type'              => 'select',
    'settings'          => 'blog_archive_sidebar_sticky',
    'label'             => esc_attr__( 'Sidebar sticky', 'empelza' ),
    'section'           => 'blog_archive_post_sidebar_setting',
    'default'           => 'default',
    'priority'          => 1,
    'multiple'          => 1,
    'choices'  => array(
        'sticky'            => esc_attr__('Sticky sidebar','empelza'),
        'default'           => esc_attr__('Default Sidebar','empelza'),
    ),
    'active_callback' => array(
        array(
            'setting'           => 'blog_archive_sidebar_position',
            'operator'          => '!=',
            'value'             => 'disable',
        ),
    ),
) );