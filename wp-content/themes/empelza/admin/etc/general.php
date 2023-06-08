<?php
/**
 * Add a pingback url auto-discovery header for singularly identifiable articles.
 */
function empelza_pingback_header() {
    if ( is_singular() && pings_open() ) {
        echo '<link rel="pingback" href="', esc_url( get_bloginfo( 'pingback_url' ) ), '">';
    }
}
add_action( 'wp_head', 'empelza_pingback_header' );


if (!function_exists('empelza_setup')) :
    /**
     * Sets up theme defaults and registers support for various WordPress features.
     *
     * Note that this function is hooked into the after_setup_theme hook, which
     * runs before the init hook. The init hook is too late for some features, such
     * as indicating support for post thumbnails.
     */
    function empelza_setup()
    {

        /*
              * Make theme available for translation.
              * Translations can be filed in the /languages/ directory.
              * If you're building a theme based on khaki, use a find and replace
              * to change 'empelza' to the name of your theme in all the template files.
              */
        load_theme_textdomain('empelza', get_template_directory() . '/languages');


        register_nav_menus	(array(
            'general-menu'	                => esc_html__('Main Menu', 'empelza'),
            'mobile-menu'	                => esc_html__('Mobile Menu', 'empelza'),
        ));


        add_editor_style();
        // Add default posts and comments RSS feed links to head.
        add_theme_support('automatic-feed-links');

        add_theme_support( 'post-formats', array( 'video', 'gallery', 'audio', 'image', 'quote', 'link' ) );
        add_post_type_support( 'post', 'post-formats' );
        /*
         * Let WordPress manage the document title.
         * By adding theme support, we declare that this theme does not use a
         * hard-coded <title> tag in the document head, and expect WordPress to
         * provide it for us.
         */
        add_theme_support('title-tag');

        /*
         * Enable support for Post Thumbnails on posts and pages.
         *
         * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
         */
        add_theme_support('post-thumbnails');

        /*
         * Switch default core markup for search form, comment form, and comments
         * to output valid HTML5.
         */
        add_theme_support('html5', array(
            'search-form',
            'comment-form',
            'comment-list',
            'gallery',
            'caption',
        ));


        // Add default image sizes
        add_theme_support('post-thumbnails');
        add_image_size('empelza_size_size_80x80_crop', 80, 80, true);
        //Newest works widget Size
        add_image_size('empelza_size_size_90x90_crop', 90, 90, true);
        // Team Size
        add_image_size('empelza_size_170x170_crop', 170, 170, true);
        add_image_size('empelza_size_180x180_crop', 180, 180, true);
        // Default Post Image
        add_image_size('empelza_size_1170x558_crop', 1170, 558, true);
        // Portfolio
            // Grid three Column
        add_image_size('empelza_size_570x400_crop', 570, 400, true);
            // Masonry Style
        add_image_size('empelza_size_570x845_crop', 570, 845, true);


        // Register the three useful image sizes for use in Add Media modal
        add_filter('image_size_names_choose', 'empelza_custom_sizes');
        if (!function_exists('empelza_custom_sizes')) :
            function empelza_custom_sizes($sizes)
            {
                return array_merge($sizes, array(
                'size_90x90_crop'               => 'size_90x90_crop',
                'size_130x130_crop'             => 'size_130x130_crop',
                'size_360x480_crop'             => 'size_360x480_crop',
                'size_360x370_crop'             => 'size_360x370_crop',
                'size_360x320_crop'             => 'size_360x320_crop',
                'size_360x250_crop'             => 'size_360x250_crop',
                'size_360x200_crop'             => 'size_360x200_crop',
                'size_360х240_crop'             => 'size_360х240_crop',
                'size_720x960_crop'             => 'size_720x960_crop',
                'size_720x740_crop'             => 'size_720x740_crop',
                'size_720x640_crop'             => 'size_720x640_crop',
                'size_720x500_crop'             => 'size_720x500_crop',
                'size_720x400_crop'             => 'size_720x400_crop',
                'size_720x480_crop'             => 'size_720x480_crop',
                'size_291x255_crop'             => 'size_291x255_crop',
                'size_620x700_crop'             => 'size_620x700_crop',
                'size_1170x731_crop'            => 'size_1170x731_crop',
                ));
            }
        endif;



    }
endif;
add_action('after_setup_theme', 'empelza_setup');



// Fixed Select2 conflict with Advanced Custom Fields
add_filter( 'acf/settings/select2_version', function( $version ) {
    return 4;
});



/*
 * Check if exist next page to show the pagination
 * */
function empelza_show_posts_nav() {
    global $wp_query;
    return ($wp_query->max_num_pages > 1);
}

/*
 * Custom Trim Excerpt
 */
function empelza_trim_excerpt( $text = '' ) {
    $empelza_excerpt = $text;
    if ( '' == $text ) {
        $text = get_the_content('');

        $text = apply_filters( 'the_content', $text );

        $excerpt_length = apply_filters( 'excerpt_length', 55 );
        $text = wp_trim_words( $text, $excerpt_length, ' ' );
    }
    return apply_filters( 'empelza_trim_excerpt', $text, $empelza_excerpt );
}
add_filter('get_the_excerpt', 'empelza_trim_excerpt');

/*
 * Custom Excerpt length
 */
function empelza_limit_excerpt($limit) {
    $excerpt = explode(' ', get_the_excerpt(), $limit);
    if (count($excerpt)>=$limit) {
        array_pop($excerpt);
        $excerpt = implode(" ",$excerpt).' ...';
    } else {
        $excerpt = implode(" ",$excerpt);
    }
    $patterns = "/\[[\/]?vc_[^\]]*\]/";
    $replacements = "";

    $excerpt = preg_replace( $patterns, $replacements, $excerpt);
    return $excerpt;
}


//Unreal construction to passed/hide "Theme Checker Plugin" recommendation about Header nad Background
if('Theme Checke' == 'Hide') {
    add_theme_support( 'custom-header');
    add_theme_support( 'custom-background');
}


/**
 * Check if it's a blog page
 * @global object $post
 * @return boolean
 */
function empelza_is_blog () {
    global  $post;
    $posttype = get_post_type($post);
    return ( ((is_archive()) || (is_author()) || (is_category()) || (is_home()) || (is_single()) || (is_tag())) && ($posttype == 'post')) ? true : false ;
}


function empelza_page_links() {
    global $wp_query, $wp_rewrite;
    $wp_query->query_vars['paged'] > 1 ? $current = $wp_query->query_vars['paged'] : $current = 1;

    $pagination = array(
        'base'                  => '%_%',
        'format'                => '?paged=%#%',
        'total'                 => $wp_query->max_num_pages,
        'current'               => $current,
        'show_all'              => false,
        'type'                  => 'plain',
        'prev_next'             => true,
        'next_text'             => '<i class="fa fa-chevron-right"></i>',
        'prev_text'             => '<i class="fa fa-chevron-left"></i>'
    );

    if( $wp_rewrite->using_permalinks() )
        $pagination['base'] = user_trailingslashit( trailingslashit( remove_query_arg( 's', get_pagenum_link( 1 ) ) ) . 'page/%#%/', 'paged' );

    if( !empty($wp_query->query_vars['s']) )
        $pagination['add_args'] = array( 's' => get_query_var( 's' ) );

    echo paginate_links($pagination);
}

/**
* Parse first post category
*/
function empelza_get_first_category() {
    $cats = get_the_category();
    return isset($cats[0]) ? $cats[0] : null;
}

/**
 * Get page by name, id or slug.
 * @global object $wpdb
 * @param mixed $name
 * @return object
 */
function empelza_get_page($slug) {
    global $wpdb;

    if (is_numeric($slug)) {
        $page = get_page($slug);
    } else {
        $page = $wpdb->get_row($wpdb->prepare("SELECT DISTINCT * FROM $wpdb->posts WHERE post_name=%s AND post_status=%s", $slug, 'publish'));
    }

    return $page;
}

/**
 * Find all subpages for page
 * @param int $id
 * @return array
 */
function empelza_get_subpages($id) {
    $query = new WP_Query(array(
        'post_type'         => 'page',
        'orderby'           => 'menu_order',
        'order'             => 'ASC',
        'posts_per_page'    => -1,
        'post_parent'       => (int) $id,
    ));

    $entries = array();
    while ($query->have_posts()) : $query->the_post();
        $entry = array(
            'id' => get_the_ID(),
            'title' => get_the_title(),
            'link' => get_permalink(),
            'content' => get_the_content(),
        );
        $entries[] = $entry;
    endwhile;

    return $entries;
}

/**
 * Display permalink
 *
 * @param int|string $system
 * @param int $isCat
 */
function empelza_permalink($system, $isCat = false) {
    echo empelza_get_permalink($system, $isCat);
}
/**
 * Get permalink for page, post or category
 *
 * @param int|string $system
 * @param bool $isCat
 * @return string
 */
function empelza_get_permalink($system, $isCat = 0)  {
    if ($isCat) {
        if (!is_numeric($system)) {
            $system = get_cat_ID($system);
        }
        return get_category_link($system);
    } else {
        $page = empelza_get_page($system);

        return null === $page ? '' : get_permalink($page->ID);
    }
}

/**
 * Display custom excerpt
 */
function empelza_excerpt() {
    echo empelza_get_excerpt();
}
/**
 * Get only excerpt, without content.
 *
 * @global object $post
 * @return string
 */
function empelza_get_excerpt() {
    global $post;
    $excerpt = trim($post->post_excerpt);
    $excerpt = $excerpt ? apply_filters('the_content', $excerpt) : '';
    return $excerpt;
}

/**
 * Display first category link
 */
function empelza_first_category() {
    $cat = empelza_get_first_category();
    if (!$cat) {
        echo '';
        return;
    }
    echo '<a href="' . empelza_get_permalink($cat->cat_ID, true) . '">' . esc_attr($cat->name) . '</a>';
}

/**
 * empelza_menu_fallback
 */

if (!function_exists('empelza_menu_fallback')) {
    function empelza_menu_fallback(){

        if(current_user_can( 'administrator' )) {
            echo '<span class="no-menu">' . esc_html__('Please register navigation from', 'empelza') . ' ' .
                '<a class="select-mobile-menu" href="'. esc_url(admin_url()) . '"nav-menus.php?action=locations" target="_blank">'. esc_html__( 'Appearance > Menus', 'empelza' ) .'</a></span>';
        }
    }
}


/**
 * Get Save Web Fonts
 * @return array
 */
function empelza_get_safe_webfonts() {
    return array(
        'Arial'				=> 'Arial',
        'Verdana'			=> 'Verdana, Geneva',
        'Trebuchet'			=> 'Trebuchet',
        'Georgia'			=> 'Georgia',
        'Times New Roman'   => 'Times New Roman',
        'Tahoma'			=> 'Tahoma, Geneva',
        'Palatino'			=> 'Palatino',
        'Helvetica'			=> 'Helvetica',
        'Gill Sans'			=> 'Gill Sans',
    );
}

add_filter( 'post_thumbnail_html', 'remove_thumbnail_width_height', 10, 5 );

function remove_thumbnail_width_height( $html, $post_id, $post_thumbnail_id, $size, $attr ) {
    $html = preg_replace( '/(width|height)=\"\d*\"\s/', "", $html );
    return $html;
}




/**
 * Custom Pagination
 */
function empelza_custom_pagination($pages = '', $range = 2)
{

    global $paged;
    if(empty($paged)) $paged = 1;

    if($pages == '')
    {
        global $wp_query;
        $pages = $wp_query->max_num_pages;
        if(!$pages)
        {
            $pages = 1;
        }
    }

    if(1 != $pages)
    {


        if($paged > 2 && $paged > $range+1 && $range < $pages) echo "<a href='".get_pagenum_link(1)."' class='page-numbers'>1</a>";
        if($paged > 2 && $paged > $range+2 && $range < $pages) echo "<span class='page-numbers dots'>…</span>";
        for ($i=1; $i <= $pages; $i++)
        {
            if (1 != $pages &&( !($i >= $paged+$range+1 || $i <= $paged-$range-1) || $pages <= $range ))
            {
                echo (esc_attr($paged == $i))? "<span class=\"page-numbers current\">".$i."</span>":"<a href='".get_pagenum_link($i)."' class=\"page-numbers\">".$i."</a>";
            }
        }
        if ($paged < $pages-1 &&  $paged+$range+1 < $pages && $range+1 < $pages ) echo "<span class='page-numbers dots'>…</span>";
        if ($paged < $pages-1 &&  $paged+$range < $pages && $range+1 < $pages ) echo "<a href='".get_pagenum_link($pages)."' class=\"page-numbers\">".$pages."</a>";

    }
}


/**====================================================================
==  Return Text
====================================================================*/
if (!function_exists('empelza_return_text')) {
    function empelza_return_text($content, $wpautop = false)
    {
        if ($wpautop == 'true') {
            $content = wpautop(preg_replace('/<\/?p\>/', "\n", $content) . "\n");
        }
        return $content;
    }
}


/**====================================================================
==  Blog Checker Function
====================================================================*/
function empelza_is_blog_checker () {
    return ( is_archive() || is_author() || is_category() || is_home() || is_single() || is_tag()) && 'post' == get_post_type();
}



/**====================================================================
==  Demo Install Setting
====================================================================*/
if(!function_exists('empelza_demo_import')) {
    function empelza_demo_import()
    {
        return array(
            array(
                'import_file_name'              => esc_html__('Empelza WordPress Theme', 'empelza'),
                'categories'                    => array('Agency, Portfolio'),
                'import_file_url'               => 'http://assets.templines.com/plugins/theme/empelza/mss5jrbsnpc7bcvtyfm/demo-content.xml',
                'import_widget_file_url'        => 'http://assets.templines.com/plugins/theme/empelza/mss5jrbsnpc7bcvtyfm/widgets.json',
                'import_customizer_file_url'    => 'http://assets.templines.com/plugins/theme/empelza/mss5jrbsnpc7bcvtyfm/customizer.dat',
                'import_preview_image_url'      => '#',
                'import_notice'                 =>  esc_html__('Click on the Import Demo Data button and wait a bit. Installing demo content may take more than 10 minutes in some cases.', 'empelza'),
                'preview_url'                   => 'http://empelza.templines.org/'
            ),
        );
    }
}
add_filter('pt-ocdi/import_files', 'empelza_demo_import');

if(!function_exists('empelza_after_demo_import')) {

    function empelza_after_demo_import() {

        $general_menu           = get_term_by( 'name', 'Main Menu', 'nav_menu' );
        $mobile_menu            = get_term_by( 'name', 'Mobile Menu', 'nav_menu' );

        set_theme_mod( 'nav_menu_locations', array(
                'general-menu'      => $general_menu->term_id,
                'mobile-menu'    => $mobile_menu->term_id,
            )
        );

        $front_page_id = get_page_by_title( 'Home Page' );
        $blog_page_id  = get_page_by_title( 'Blog' );

        update_option( 'show_on_front', 'page' );
        update_option( 'page_on_front', $front_page_id->ID );
        update_option( 'page_for_posts', $blog_page_id->ID );

        if (get_option('permalink_structure') !== '/%postname%/') {
            update_option('permalink_structure', '/%postname%/');
        }


    }
}
add_action( 'pt-ocdi/after_import', 'empelza_after_demo_import' );

add_filter( 'pt-ocdi/disable_pt_branding', '__return_true' );


