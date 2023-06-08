<?php

EMPELZA_Options::add_section('blog_single', array(
    'title'             => esc_attr__( 'Blog Single Setting', 'empelza' ),
    'priority'          => 10,
    'icon'              => 'fa fa-file-archive-o'
));
EMPELZA_Options::add_field( array(
    'type'              => 'radio-buttonset',
    'settings'          => 'blog_single_sidebar_position',
    'label'             => esc_attr__( 'Sidebar Settings', 'empelza' ),
    'description'       => esc_attr__( 'Select a sidebar position for Blog pages', 'empelza' ),
    'section'           => 'blog_single',
    'default'           => 'right',
    'priority'          => 1,
    'multiple'          => 1,
    'choices' => array(
        'no'                => esc_attr__('No Sidebar','empelza'),
        'left'              => esc_attr__('Left Sidebar','empelza'),
        'right'             => esc_attr__('Right Sidebar','empelza'),
    ),
) );

EMPELZA_Options::add_field( array(
    'type'              => 'radio-buttonset',
    'settings'          => 'blog_single_sticky',
    'label'             => esc_attr__( 'Sticky sidebar', 'empelza' ),
    'section'           => 'blog_single',
    'default'           => 'default',
    'priority'          => 1,
    'multiple'          => 1,
    'choices'     => array(
        'default'           => esc_attr__('Default Sidebar','empelza'),
        'sticky'            => esc_attr__('Sticky Sidebar','empelza'),
    ),
    'active_callback' => array(
        array(
            'setting'           => 'blog_single_sidebar_position',
            'operator'          => '!==',
            'value'             => 'no',
        ),
    ),
) );