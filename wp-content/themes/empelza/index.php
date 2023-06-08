<?php
get_header();
$sidebar_float = 'disable';
$css_classes[] = $wrapper_attributes[] = $post_wrapper_css_classes[]='';

$blog_html_div = $animation_type = $animation_delay = '';

$excerpt = empelza_get_theme_mod('custom_blog_excerpt_count');
$archive_year  = get_the_time('Y');
$archive_month = get_the_time('m');
$archive_day   = get_the_time('d');
// Get header
get_template_part('template-parts/header/header_content');


if ( is_active_sidebar( 'main-sidebar' ) and empelza_get_theme_mod('blog_archive_sidebar_position') !='disable' ) {
    $sidebar_float = empelza_get_theme_mod('blog_archive_sidebar_position');
}

if($sidebar_float !='disable'){
    $sidebar_float =='right' ? $css_classes[] = 'col-md-9 right-sidebar' : $css_classes[] = 'col-md-9 left-sidebar';
} else {
    $css_classes[] = 'col-md-12';
}

// Animation
$post_animation = empelza_get_theme_mod('blog_animation');
if (!empty($post_animation) and ($post_animation != 'disable')) {
    $post_wrapper_css_classes[] = 'fl-animated-item-velocity';
    $wrapper_attributes[]       = 'data-animate-type="' . $post_animation . '"';
    $wrapper_attributes[]       = 'data-item-for-animated=".fl-post--item"';
}

$css_class = preg_replace( '/\s+/', ' ', implode( ' ', array_filter( array_unique( $css_classes ) ) ) );
$post_wrapper_css_class = preg_replace( '/\s+/', ' ', implode( ' ', array_filter( array_unique( $post_wrapper_css_classes ) ) ) );
?>
    <!--Padding Top Start-->
    <?php if (empelza_get_theme_mod('blog_archive_padding_top', true) != 'disable') { ?>
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
                        <?php if (have_posts()) : while (have_posts()) : the_post();?>
                            <article <?php post_class('fl-post--item') ?> id="post-<?php the_ID() ?>" data-post-id="<?php the_ID() ?>">
                                <?php if(!empelza_get_theme_mod('content_post_quotes_text',true !='')){?>
                                    <h3 class="post--title">
                                        <a class="title-link"
                                           href="<?php esc_url(the_permalink()); ?>">
                                            <?php esc_attr(the_title()); ?>
                                        </a>
                                    </h3>
                                    <div class="post-top-info">
                                        <!--Date -->
                                        <div class="post-date-content">
                                            <i class="essential-set-icon-calendar-6"></i>
                                            <a class="fl-secondary-color-hv" href="<?php echo esc_url(get_day_link( $archive_year, $archive_month, $archive_day)); ?>"><?php echo esc_attr(get_the_date());?></a>
                                        </div>
                                        <!--Date end-->
                                        <!--Author -->
                                        <div class="author-post-content">
                                            <i class="essential-set-icon-user"></i>
                                            <span class="author-prefix"><?php echo esc_html__('By','empelza');?></span>
                                            <span class="author-link">
                    <a href="<?php echo esc_url(get_author_posts_url(get_the_author_meta('ID'))) ?>"><?php echo esc_html(get_the_author()); ?></a>
                </span>
                                        </div>
                                        <!--Author end-->
                                        <div class="post-info-category">
                                            <i class="essential-set-icon-folder-10"></i>
                                            <!--Category -->

                                                <?php the_category(', ', '') ;?>

                                            <!--Category end-->
                                        </div>
                                        <?php if(function_exists('process_simple_like')){?>
                                            <div class="post-like-wrap">
                                           <span class="fl-post-like">
                                                <?php echo get_simple_likes_button( $post->ID );?>
                                           </span>
                                            </div>
                                        <?php }?>

                                    </div>
                                <?php }
                                get_template_part('template-parts/blog-entry-content/post-holder') ?>
                                <?php if(!empelza_get_theme_mod('content_post_quotes_text',true !='')){?>
                                    <div class="post-bottom-content">
                                        <div class="post-text--content fl-font-style-regular">
                                            <?php echo empelza_limit_excerpt($excerpt); ?>
                                        </div>
                                        <div class="post-btn-read-more fl-font-style-bolt-two">
                                            <a class="fl-custom-btn primary-border-style" href="<?php the_permalink(); ?>">
                                                <span><?php echo esc_html__('Read More', 'empelza') ?></span>
                                            </a>
                                        </div>
                                    </div>
                                <?php } ?>
                            </article>
                            <!--Post End-->
                        <?php endwhile;
                        // If no content, include the "No posts found" template.
                        else : get_template_part('template-parts/content', 'none'); endif; ?>
                    </div>
                    <?php get_template_part( 'template-parts/content','pagination'); ?>
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
    <!--Padding Bottom Start-->
    <?php if (empelza_get_theme_mod('blog_archive_padding_bottom', true) != 'disable') { ?>
        <div class="fl-page-padding bottom"></div>
    <?php } ?>
    <!--Padding Bottom End-->

<?php get_footer(); ?>


