<?php
add_theme_support( 'post-thumbnails', 'portfolio' );


add_action( 'init', 'fl_portfolio_init', 0 );

if( !function_exists('fl_portfolio_init') ){
    function fl_portfolio_init() {

        $labels = array(
            // 'name'                  => esc_html__( 'Portfolio', 'fl-themes-helper' ),

            'name'                  => esc_html__( 'Product', 'fl-themes-helper' ),
            'singular_name'         => esc_html__( 'Product Item', 'fl-themes-helper' ),
            'add_new'               => esc_html__( 'Add New Item', 'fl-themes-helper' ),
            'add_new_item'          => esc_html__( 'Add New Product Item', 'fl-themes-helper' ),
            'edit_item'             => esc_html__( 'Edit Product Item', 'fl-themes-helper' ),
            'new_item'              => esc_html__( 'Add New Product Item', 'fl-themes-helper' ),
            'view_item'             => esc_html__( 'View Item', 'fl-themes-helper' ),
            'search_items'          => esc_html__( 'Search Product', 'fl-themes-helper' ),
            'not_found'             => esc_html__( 'No Product items found', 'fl-themes-helper' ),
            'not_found_in_trash'    => esc_html__( 'No Product items found in trash', 'fl-themes-helper' )
        );

        $args = array(
            'labels'                => $labels,
            'public'                => true,
            'supports'              => array( 'title', 'editor', 'thumbnail', 'author',), //'revisions'),
            'capability_type'       => 'post',
            'menu_position'         => 5,
            'has_archive'           => true,
            'menu_icon'             => 'dashicons-schedule',
        );

        $args = apply_filters('fl_args', $args);

        register_post_type('portfolio', $args);
        flush_rewrite_rules();


        /**
         * Register a taxonomy for portfolio Categories
         * http://codex.wordpress.org/Function_Reference/register_taxonomy
         */

        $taxonomy_portfolio_category_labels = array(
            'name'                          => esc_html__( 'Product Categories', 'fl-themes-helper' ),
            'singular_name'                 => esc_html__( 'Product Category', 'fl-themes-helper' ),
            'search_items'                  => esc_html__( 'Search Product Categories', 'fl-themes-helper' ),
            'popular_items'                 => esc_html__( 'Popular Product Categories', 'fl-themes-helper' ),
            'all_items'                     => esc_html__( 'All Product Categories', 'fl-themes-helper' ),
            'parent_item'                   => esc_html__( 'Parent Product Category', 'fl-themes-helper' ),
            'parent_item_colon'             => esc_html__( 'Parent Product Category:', 'fl-themes-helper' ),
            'edit_item'                     => esc_html__( 'Edit Product Category', 'fl-themes-helper' ),
            'update_item'                   => esc_html__( 'Update Product Category', 'fl-themes-helper' ),
            'add_new_item'                  => esc_html__( 'Add New Product Category', 'fl-themes-helper' ),
            'new_item_name'                 => esc_html__( 'New Product Category Name', 'fl-themes-helper' ),
            'separate_items_with_commas'    => esc_html__( 'Separate Product categories with commas', 'fl-themes-helper' ),
            'add_or_remove_items'           => esc_html__( 'Add or remove Product categories', 'fl-themes-helper' ),
            'choose_from_most_used'         => esc_html__( 'Choose from the most used Product categories', 'fl-themes-helper' ),
            'menu_name'                     => esc_html__( 'Product Categories', 'fl-themes-helper' ),
        );

        $taxonomy_portfolio_category_args = array(
            'labels'            => $taxonomy_portfolio_category_labels,
            'public'            => true,
            'show_in_nav_menus' => true,
            'show_ui'           => true,
            'show_admin_column' => true,
            'show_tagcloud'     => true,
            'hierarchical'      => true,
            'query_var'         => true,
            'rewrite'           => false,
        );
        register_taxonomy( 'portfolio-category', array( 'portfolio' ), $taxonomy_portfolio_category_args );
    }
}




add_filter( 'manage_posts_columns', 'fl_add_thumbnail_column', 10, 1 );

if( !function_exists('fl_add_thumbnail_column') ){
    function fl_add_thumbnail_column( $columns ) {

        $column_thumbnail = array( 'thumbnail' => esc_html__('Thumbnail','fl-themes-helper' ) );
        $columns = array_slice( $columns, 0, 2, true ) + $column_thumbnail + array_slice( $columns, 1, NULL, true );
        return $columns;
    }
}



add_action( 'manage_posts_custom_column', 'fl_display_thumbnail', 10, 1 );

if( !function_exists('fl_display_thumbnail') ){
    function fl_display_thumbnail( $column ) {
        global $post;
        switch ( $column ) {
            case 'thumbnail':
                echo get_the_post_thumbnail( $post->ID, array(50, 50) );
                break;
        }
    }
}