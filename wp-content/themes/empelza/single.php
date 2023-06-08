<?php get_header();
//Header
$header = 'enable';
if (empelza_get_theme_mod('post_single_header_custom_style', true) == 'custom') {
    $header = empelza_get_theme_mod('post_single_header', true);
}
if ($header != 'disable') {
    get_template_part('template-parts/header/header_content');
}

$css_classes[]= $bottom_css_classes[]='';
//Sidebar position
$sidebar_float = 'no';

if ( is_active_sidebar( 'main-sidebar' ) and empelza_get_theme_mod('blog_single_sidebar_position') !='no' ) {
    $sidebar_float = empelza_get_theme_mod('blog_single_sidebar_position');
}


if($sidebar_float !='no'){
    $sidebar_float =='right' ? $css_classes[] = 'col-md-9 right-sidebar' : $css_classes[] = 'col-md-9 left-sidebar';
} else {
    $css_classes[] = 'col-md-12';
}

if( !class_exists('Fl_Helping_Addons')){
    $css_classes[] = 'plugin-disable';
}

$css_class = preg_replace( '/\s+/', ' ', implode( ' ', array_filter( array_unique( $css_classes ) ) ) );


?>
<!--Padding top Start-->
<?php if (empelza_get_theme_mod('post_single_padding_top',true) != 'false') { ?>
    <div class="fl-page-padding top"></div>
<?php } ?>
<!--Padding top End-->
<!-- Content -->
<div class="container">
    <div class="fl-blog-post-div row">
        <!--Left sidebar -->
        <?php if($sidebar_float == 'left'){
            get_template_part( 'sidebar');
        } ?>
        <!--Left sidebar End-->
        <div class="single-post-wrapper <?php echo esc_attr(trim($css_class)); ?>">
            <!-- Top Content -->
            <div class="post-content-top">
                <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
                    <article <?php post_class('cf'); ?> id="post-<?php the_ID()?>" data-post-id="<?php the_ID()?>">
                        <h3 class="post--title"><?php esc_attr(the_title()); ?></h3>
                        <?php get_template_part('template-parts/blog-single-page/post-top-info')?>
                        <?php get_template_part('template-parts/blog-single-page/post-holder')?>
                        <div class="post-inner_content cf">
                            <?php the_content(); ?>
                        </div>

                        <?php wp_link_pages(array(
                            'before'        => '<p class="post-inner-pagination">'.'<span class="pagination-text">' . esc_html__('Post Pages:', 'empelza').'</span>',
                            'after'	        => '</p>',
                            'link_before'   => '',
                            'link_after'    => '',
                            'pagelink'      => '<span class="page-numbers">'.'%'.'</span>',

                        )) ?>

                    </article><!-- #post-<?php the_ID(); ?> -->
                <?php endwhile; else: ?>
                    <?php get_template_part('template-parts/content', 'none')?>
                <?php endif; ?>
            </div>
            <?php get_template_part('template-parts/blog-single-page/post-tags-content')?>
            <!-- Bottom Content -->
            <div class="post-content-bottom">
                <?php if (comments_open() || get_comments_number()) :
                    comments_template();
                endif; ?>
            </div>
            <!-- Bottom Content End -->
        </div>
        <!--Right sidebar -->
        <?php if($sidebar_float == 'right'){
            get_template_part( 'sidebar');
        } ?>
        <!--Right sidebar End-->
    </div>
</div>
<!-- Content End-->
<!--Padding bottom Start-->
<?php if (empelza_get_theme_mod('post_single_padding_bottom',true) != 'false') { ?>
    <div class="fl-page-padding bottom"></div>
<?php } ?>
<!--Padding bottom End-->

<!--Footer Start-->
<?php get_footer(); ?>
<!--Footer End-->
