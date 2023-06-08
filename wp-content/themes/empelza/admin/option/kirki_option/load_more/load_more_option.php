<?php
EMPELZA_Options::add_section('load_more_section', array(
    'title'         => esc_attr__('Load More Setting', 'empelza'),
    'priority'      => 8,
    'icon'          => 'fa fa-spinner'
));

EMPELZA_Options::add_field( array(
        'type'     => 'text',
        'settings' => 'load_more_text',
        'label'    => esc_html__( 'Load More Text', 'empelza' ),
        'section'  => 'load_more_section',
        'default'  => esc_html__( 'LOAD MORE', 'empelza' ),
        'priority' => 10,
    )
);


EMPELZA_Options::add_field( array(
        'type'     => 'text',
        'settings' => 'load_more_loading_text',
        'label'    => esc_html__( 'Load More Loading Text', 'empelza' ),
        'section'  => 'load_more_section',
        'default'  => 'LOADING...',
        'priority' => 10,
    )
);

EMPELZA_Options::add_field( array(
        'type'     => 'text',
        'settings' => 'load_more_text_blog',
        'label'    => esc_html__( 'Blog Last Page Text', 'empelza' ),
        'section'  => 'load_more_section',
        'default'  => esc_html__( 'NO MORE POST', 'empelza' ),
        'priority' => 10,
    )
);


EMPELZA_Options::add_field( array(
        'type'     => 'text',
        'settings' => 'load_more_text_portfolio',
        'label'    => esc_html__( 'Portfolio Last Page Text', 'empelza' ),
        'section'  => 'load_more_section',
        'default'  => esc_html__( 'NO MORE WORKS', 'empelza' ),
        'priority' => 10,
    )
);
