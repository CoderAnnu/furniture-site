<?php

/****************************************************************
 * DO NOT DELETE
 ****************************************************************/

// include system functions
if (!isset($content_width)) $content_width = 1140;


/**
 * Load Theme Variable Data
 * @param string $var
 * @return string
 */
function empelza_theme_data_variable($var)
{
    if (!is_file(STYLESHEETPATH . '/style.css')) {
        return '';
    }

    $theme_data = wp_get_theme();
    return $theme_data->{$var};
}
/****************************************************************
 * Define Constants
 ****************************************************************/

define("EMPELZA_THEME_URL", get_template_directory_uri());
define('EMPELZA_THEME_VERSION', empelza_theme_data_variable('Version'));

/****************************************************************
 * Require Needed Files & Libraries
 ****************************************************************/
/**
 * Admin References & CSS and JS files register
 */
require  get_template_directory() . '/admin/admin.php';
/**
 * General
 */
require get_template_directory() . '/admin/etc/general.php';
/**
 * Register Sidebar
 */
require get_template_directory() . '/admin/option/sidebar.php';
/**
 * Woocommerce register plugin
 */
require get_template_directory() . '/admin/function/woocommerce.php';
/**
 * Load More
 */
require get_template_directory() . '/admin/etc/load_more_function.php';
/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/admin/inc/extras.php';
/**
 * Load Jetpack compatibility file.
 */
require get_template_directory() . '/admin/inc/jetpack.php';
/**
 * Comments walker
 */
require get_template_directory() . '/admin/inc/comments-walker.php';
/**
 * Mega Menu
 */
require get_template_directory() . '/admin/menu/menu.php';
/**
 * About Theme Option
 */
require get_template_directory() . '/admin/theme-dashboard/dashboard.php';
/**
 * Custom Css Option
 */
require get_template_directory() . '/admin/etc/custom_css_option.php';





//////////////////////// shortcode for image and there text  //////////////////

// add css product images section 
add_action('admin_head', 'my_custom_fonts');

function my_custom_fonts()
{
    echo '<style>
  .prodct-images-admin  {
      width: 80px!important;
    } 
  </style>';
}

add_theme_support('widgets');

// Shortcode in HTML-Widget
add_filter('widget_text', 'do_shortcode');
// Shortcode in HTML-Widget End


// shortcode for Image 
add_shortcode('post_descriptions', 'furniture_image_section');
function furniture_image_section($atts)
{
    ob_start();
    global $image_content;
    $image_content = get_field('post_description_detailss');
    $image = $image_content['image'];
    if (!empty($image)) : ?>
        <img class="single_product_image" src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" />
<?php endif;
    $field_content = ob_get_contents();
    ob_end_clean();
    return $field_content;
}
