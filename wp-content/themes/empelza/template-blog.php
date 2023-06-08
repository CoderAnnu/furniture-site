<?php
/*
* Template name: Blog Template
* */

get_header();
$sidebar_float = 'disable';
$css_classes[] = $wrapper_attributes[] = $post_wrapper_css_classes[]='';

$blog_html_div = $animation_type = $animation_delay = '';

// Get header
get_template_part('template-parts/header/header_content');



//Post Style
$post_count = empelza_get_theme_mod('post_per_page',true);

$max_page = new WP_Query($pages = array('post_type' => 'post', 'posts_per_page' => $post_count,));
$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
$query = new WP_Query(array(
    'posts_per_page'		    => $post_count,
    'ignore_sticky_posts'	    => 1,
    'post_status'               => 'publish',
    'post_type'                 => 'post',
    'max_page'                  => $max_page,
    'paged'                     => $paged
));



if ( is_active_sidebar( 'main-sidebar' ) and empelza_get_theme_mod('blog_template_sidebar',true) !='disable' ) {
    $sidebar_float = empelza_get_theme_mod('blog_template_sidebar',true);
}

if($sidebar_float !='disable'){
    $sidebar_float =='right' ? $css_classes[] = 'col-md-9 right-sidebar' : $css_classes[] = 'col-md-9 left-sidebar';
} else {
    $css_classes[] = 'col-md-12';
}

// Blog Style
$style  = empelza_get_theme_mod('blog_archive_style',true);
if($style =='default'){
    $post_style                 = 'default';
    $post_wrapper_css_classes[] = 'post-style-default';
} else {
    $post_style                 = 'grid';
    $post_wrapper_css_classes[] = 'post-style-grid';
}

if($style =='default'){
    $post_style                 = 'default';
    $post_wrapper_css_classes[] = 'post-style-default';
} elseif($style =='default-two'){
    $post_style                 = 'default-two';
    $post_wrapper_css_classes[] = 'post-style-default-two';
}else {
    $post_style                 = 'grid';
    $post_wrapper_css_classes[] = 'post-style-grid';
}

// Animation
$post_animation = empelza_get_theme_mod('blog_animation',true);
if (!empty($post_animation) and ($post_animation != 'disable')) {
    $post_wrapper_css_classes[] = 'fl-animated-item-velocity';
    $wrapper_attributes[]       = 'data-animate-type="' . $post_animation . '"';
    $wrapper_attributes[]       = 'data-item-for-animated=".fl-post--item"';
}

// Pagination
$pagination = empelza_get_theme_mod('blog_pagination',true);

$css_class = preg_replace( '/\s+/', ' ', implode( ' ', array_filter( array_unique( $css_classes ) ) ) );

$post_wrapper_css_class = preg_replace( '/\s+/', ' ', implode( ' ', array_filter( array_unique( $post_wrapper_css_classes ) ) ) );

    ?>



<!--Padding Top Start-->
<?php if (empelza_get_theme_mod('page_padding_top',true) != 'false') { ?>
    <div class="fl-page-padding top"></div>
<?php } ?>
    <!--Padding Top End-->
    <!-- Content -->
    <div class="container">
        <div class="fl-blog-post-div row">
            <!--Left sidebar -->
            <?php if($sidebar_float == 'left'){
                get_template_part( 'sidebar');
            } ?>
            <!--Left sidebar End-->

            <div class="<?php echo esc_attr(trim($css_class)); ?>">
                <div class="post-wrapper <?php echo esc_attr(trim($post_wrapper_css_class)); ?>" <?php echo implode(' ', $wrapper_attributes); ?>>
                    <?php if ($query->have_posts() )  while ( $query->have_posts()) { $query->the_post();
                        get_template_part('template-parts/blog-entry-content/post', $post_style);
                    } wp_reset_postdata();
                    ?>
                </div>
                <!--Blog pagination Start-->
                <?php if ($query->max_num_pages > 1) { ?>
                    <?php if($pagination == 'standard'){ ?>
                        <div class="fl-blog-post-pagination text-left">
                            <div class="fl-blog-post-pagination">
                                <div class="pagination fl-default-pagination cf">
                                    <?php empelza_custom_pagination($query->max_num_pages); ?>
                                </div>
                            </div>
                        </div>
                    <?php } elseif ($pagination == 'load_more'){
                        echo '<div class="fl-blog-post-pagination text-center">';
                        empelza_ajax_pagination($query);
                        echo '</div>';
                    } ?>
                <?php } ?>
                <!--Blog pagination End-->
            </div>
            <!--Right sidebar -->
            <!--Left sidebar -->
            <?php if($sidebar_float == 'right'){
                get_template_part( 'sidebar');
            } ?>
            <!--Left sidebar End-->

            <!--Right sidebar End-->
        </div>
    </div>
    <!-- Content End-->

<?php if (empelza_get_theme_mod('page_padding_bottom',true) != 'false') { ?>
    <!--Padding bottom Start-->
    <div class="fl-page-padding bottom"></div>
    <!--Padding bottom End-->
<?php } ?>

<?php get_footer(); ?>