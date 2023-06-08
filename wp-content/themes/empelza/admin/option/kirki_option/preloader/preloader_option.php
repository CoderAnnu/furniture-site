<?php
/*------------------------------------------------------------------

            Preloader

-------------------------------------------------------------------*/
EMPELZA_Options::add_section('page_preloader', array(
    'title'          => esc_attr__( 'Page Preloader', 'empelza' ),
    'description'    => esc_attr__( 'Page Preloader Seating', 'empelza' ),
    'priority'       => 9,
    'panel'          => '',
    'icon'           => 'fa fa-spinner'
));


EMPELZA_Options::add_field( array(
    'type'          => 'toggle',
    'settings'      => 'preloader_page_show',
    'label'         => esc_attr__('Site Preloader', 'empelza'),
    'section'       => 'page_preloader',
    'default'       => 'off',
    'priority'      => 199,
));

EMPELZA_Options::add_field( array(
    'type'          => 'color',
    'settings'      => 'site_preloader_body_style',
    'label'         => esc_attr__('Body Preloader color', 'empelza'),
    'section'       => 'page_preloader',
    'default'       => '#ffffff',
    'priority'      => 201,
    'multiple'      => 0,
    'active_callback' => array(
        array(
            'setting'               => 'preloader_page_show',
            'operator'              => '==',
            'value'                 => true,
        ),
    ),
    'output' => array(
        array(
            'element'               => '#fl-page--preloader .fl-top-background-preloader,#fl-page--preloader .fl-bottom-background-preloader',
            'property'              => 'background-color',
        ),
    ),
));


EMPELZA_Options::add_field( array(
    'type'          => 'color',
    'settings'      => 'site_preloader_progress_bg',
    'label'         => esc_attr__('Preloader progress Background Color', 'empelza'),
    'section'       => 'page_preloader',
    'default'       => '#f33f4c',
    'priority'      => 201,
    'multiple'      => 0,
    'active_callback' => array(
        array(
            'setting'               => 'preloader_page_show',
            'operator'              => '==',
            'value'                 => true,
        ),
    ),
    'output' => array(
        array(
            'element'               => '#fl-page--preloader .fl-top-progress .fl-loader_left, #fl-page--preloader .fl-top-progress .fl-loader_right,#fl-page--preloader .fl--preloader-progress-bar span',
            'property'              => 'background-color',
            'suffix'                => '!important',
        ),
    ),
));