<?php
if ( function_exists('register_sidebar') ) {

    register_sidebar(array(
        'name'              => 'Main Sidebar',
        'id'                => 'main-sidebar',
        'description'       => 'Appears as the left sidebar on Blog pages',
        'before_widget'     => '<div id="%1$s" class="widget %2$s">',
        'after_widget'      => '</div>',
        'before_title'      => '<h6 class="widget-title fl-text-semi-bold-style">',
        'after_title'       => '</h6>',
    ));

    if ( class_exists('Fl_Helping_Addons')) {
        // Header
        register_sidebar(array(
            'name' => 'Header Sidebar Left Column',
            'id' => 'header-sidebar-1',
            'description' => 'Appears as the sidebar on header.',
            'before_widget' => '<div id="%1$s" class="widget %2$s">',
            'after_widget' => '</div>',
            'before_title' => '<h5 class="header-widget--title">',
            'after_title' => '</h5>',
        ));
        register_sidebar(array(
            'name' => 'Header Sidebar Right Column',
            'id' => 'header-sidebar-2',
            'description' => 'Appears as the sidebar on header.',
            'before_widget' => '<div id="%1$s" class="widget %2$s">',
            'after_widget' => '</div>',
            'before_title' => '<h5 class="header-widget--title">',
            'after_title' => '</h5>',
        ));
        // Footer Sidebar
        register_sidebar(array(
            'name' => 'Footer Sidebar First Column',
            'id' => 'footer-sidebar-1',
            'description' => 'Appears as the sidebar on footer.',
            'before_widget' => '<div id="%1$s" class="widget %2$s">',
            'after_widget' => '</div>',
            'before_title' => '<h5 class="footer-widget--title">',
            'after_title' => '</h5>',
        ));

        register_sidebar(array(
            'name' => 'Footer Sidebar Second Column',
            'id' => 'footer-sidebar-2',
            'description' => 'Appears as the sidebar on footer.',
            'before_widget' => '<div id="%1$s" class="widget %2$s">',
            'after_widget' => '</div>',
            'before_title' => '<h5 class="footer-widget--title">',
            'after_title' => '</h5>',
        ));

        register_sidebar(array(
            'name' => 'Footer Sidebar Third Column',
            'id' => 'footer-sidebar-3',
            'description' => 'Appears as the sidebar on footer.',
            'before_widget' => '<div id="%1$s" class="widget %2$s">',
            'after_widget' => '</div>',
            'before_title' => '<h5 class="footer-widget--title">',
            'after_title' => '</h5>',
        ));


        register_sidebar(array(
            'name' => 'Footer Sidebar Fourth Column',
            'id' => 'footer-sidebar-4',
            'description' => 'Appears as the sidebar on footer.',
            'before_widget' => '<div id="%1$s" class="widget %2$s">',
            'after_widget' => '</div>',
            'before_title' => '<h5 class="footer-widget--title">',
            'after_title' => '</h5>',
        ));


    }

}




function empelza_categories_post_count_filter ($variable) {
    $variable = str_replace('(', '<span class="fl-categories-post-count fl-font-style-regular"> ', $variable);
    $variable = str_replace(')', '</span>', $variable);
    return $variable;
}



function empelza_archive_post_count_filter ($variable) {
    $variable = str_replace ('(', '<span class="fl-archive-post-count fl-font-style-regular">', $variable);
    $variable = str_replace (')', '</span>', $variable);
    return $variable;
}



add_filter ('get_archives_link', 'empelza_archive_post_count_filter');
add_filter('wp_list_categories','empelza_categories_post_count_filter');





/**
 * Register Theme Widgets
 */
function empelza_init_widgets() {

}

add_action('widgets_init', 'empelza_init_widgets');


