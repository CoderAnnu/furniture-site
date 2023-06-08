<?php get_header();
$portfolio_wrapper_css_classes[] = 'fl--portfolio-wrap';
$portfolio_item_css_classes[] = 'fl--portfolio-item fl-grid-item';
// Filter Start
$categories = get_categories(array('taxonomy' => 'portfolio-category'));
$i = '1';
$css_classes[] = $wrapper_attributes[] =$output_filter='';
// Get header
get_template_part('template-parts/header/header_content');
$portfolio_style = empelza_get_theme_mod('portfolio_archive_style');


$filter = empelza_get_theme_mod('portfolio_filter');
// HTML
if(! empty($portfolio_style) and $portfolio_style =='portfolio-grid-three-column'){
    $portfolio_wrapper_css_classes[] = 'fl-portfolio-three-column-style';
    $portfolio_item_css_classes[] = 'fl-item-three-column-style';
}
if(! empty($portfolio_style) and $portfolio_style =='portfolio-grid-four-column'){
    $portfolio_wrapper_css_classes[] = 'fl-portfolio-four-column-style';
    $portfolio_item_css_classes[] = 'fl-item-four-column-style';
}
if(! empty($portfolio_style) and $portfolio_style =='portfolio-masonry-style'){
    $portfolio_wrapper_css_classes[] = 'fl-portfolio-masonry-style';
    $portfolio_item_css_classes[] = 'fl-item-masonry-style';
}

//Animation Style
$portfolio_animation = empelza_get_theme_mod('animation_portfolio');
if($portfolio_animation     !='disable'){
    $css_classes[]          ='fl-animated-item-velocity';
    $wrapper_attributes[]   = 'data-animate-type="'.$portfolio_animation.'"';
    $wrapper_attributes[]   = 'data-item-for-animated=".fl-grid-item"';
}




$css_class = preg_replace( '/\s+/', ' ', implode( ' ', array_filter( array_unique( $css_classes ) ) ) );
$portfolio_wrapper_css_class = preg_replace( '/\s+/', ' ', implode( ' ', array_filter( array_unique( $portfolio_wrapper_css_classes ) ) ) );
$portfolio_item_css_class = preg_replace( '/\s+/', ' ', implode( ' ', array_filter( array_unique( $portfolio_item_css_classes ) ) ) );

?>

    <!-- Content -->
    <div class="fl-page-padding"></div>
<div class="fl--portfolio-content-wrap <?php echo esc_attr( trim( $css_class ) );?>" <?php echo implode(' ', $wrapper_attributes );?>>

    <?php if ( ! empty( $filter ) and ( $filter !='disable') ) { ?>
        <div class="fl-filter-group-wrapper fl-filter-blog--group fl-text-regular-style">
            <ul class="filter-ul" id="main">
                <li class="fl-filter--btn active" data-filter="*"><span><?php echo esc_attr(empelza_get_theme_mod('first_filter_text')); ?></span></li>
                <?php
                foreach ($categories as $category) {
                   echo '<li class="fl-filter--btn" data-filter=".portfolio-category-' . $category->slug . '"><span>' . $category->name . '</span></li>';
                }
                ?>
            </ul>
        </div>
    <?php } ;?>

    <div class="fl-isotope-wrapper <?php echo esc_attr( trim( $portfolio_wrapper_css_class ) );?>">
        <div class="grid-sizer cf"></div>
        <div class="gutter-sizer"></div>
        <?php if (have_posts()) { while (have_posts()) {the_post(); ?>
            <article <?php post_class(esc_attr( trim( $portfolio_item_css_class ) )) ?> id="portfolio-post-<?php the_ID() ?>" data-post-id="<?php the_ID() ?>">
                <div class="entry-content">
                    <?php
                    if(! empty($portfolio_style) and $portfolio_style =='portfolio-masonry-style'){
                        if($i == '2'){
                            echo get_the_post_thumbnail(get_the_ID(), 'empelza_size_570x845_crop');
                        }else{
                            echo get_the_post_thumbnail(get_the_ID(), 'empelza_size_570x400_crop');
                        }
                    }else{
                        echo get_the_post_thumbnail(get_the_ID(), 'empelza_size_570x400_crop');
                    }
                    ?>
                    <div class="portfolio-mask-content">
                        <h5 class="portfolio-title"><a class="portfolio-title-link fl-text-title-style" href="<?php esc_url(the_permalink()); ?>"><?php esc_attr(the_title()); ?></a></h5>
                        <div class="portfolio-category-wrap fl-text-medium-style"><?php get_template_part('template-parts/portfolio/category'); ?></div>
                    </div>
                </div>
            </article>


            <?php wp_reset_postdata();
            $i++;
        } ?>
        <?php } else { ?>
            <div class="cf">
                <span><?php esc_html_e('Add some posts in portfolio section', 'empelza') ?></span>
            </div>
        <?php }
        ?>
    </div>
    <?php echo empelza_ajax_pagination('','center');?>
</div>
    <div class="fl-page-padding"></div>
    <!-- Content End-->
<?php get_footer(); ?>