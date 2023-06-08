<?php

add_action( 'wp_ajax_portfolio_ajax_load_more_vc', 'portfolio_ajax_load_more_vc');
add_action( 'wp_ajax_nopriv_portfolio_ajax_load_more_vc', 'portfolio_ajax_load_more_vc');
function portfolio_ajax_load_more_vc() {

    check_ajax_referer( 'portfolio-load-mote-nonce', 'nonce' );
    $args                       = isset( $_POST['query'] ) ? array_map( 'esc_attr', $_POST['query'] ) : array();
    $args['post_type']          = isset( $args['post_type'] ) ? esc_attr( $args['post_type'] ) : 'portfolio';
    $args['paged']              = esc_attr( $_POST['page'] );
    $args['post_status']        = 'publish';
    $args['post_per_page']      = esc_attr( $_POST['post_per_page'] );
    $args['portfolio-style']    = $_POST['portfolio_style'];
    $i = '0';

    $portfolio_style = $_POST['portfolio_style'];

    $portfolio_item_css_classes[] = 'fl--portfolio-item fl-grid-item';
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
    $posts = new WP_Query( $args );
    $portfolio_item_css_class = preg_replace( '/\s+/', ' ', implode( ' ', array_filter( array_unique( $portfolio_item_css_classes ) ) ) );


    ob_start();
   if ( $posts->have_posts() ) :  while ( $posts->have_posts() ): $posts->the_post(); $i++;?>
        <article <?php post_class(esc_attr( trim( $portfolio_item_css_class ) )) ?> id="portfolio-post-<?php echo get_the_ID() ?>" data-post-id="<?php echo get_the_ID() ?>">
            <div class="entry-content">
                <?php
                if(! empty($portfolio_style) and $portfolio_style =='portfolio-masonry-style'){
                    if($i == '2'){
                        echo get_the_post_thumbnail($posts->ID, 'empelza_size_570x845_crop');
                    }else{
                        echo get_the_post_thumbnail($posts->ID, 'empelza_size_570x400_crop');
                    }
                }else{
                    echo get_the_post_thumbnail($posts->ID, 'empelza_size_570x400_crop');
                }
                ?>
                <div class="portfolio-mask-content">
                    <h5 class="portfolio-title"><a class="portfolio-title-link fl-text-title-style" href="<?php esc_url(the_permalink()); ?>"><?php esc_attr(the_title()); ?></a></h5>
                    <div class="portfolio-category-wrap fl-text-medium-style"><?php get_template_part('template-parts/portfolio/category'); ?></div>
                </div>
            </div>
        </article>
    <?php
    endwhile; endif;
    wp_reset_postdata();
    $data = ob_get_clean();
    wp_send_json_success( $data );

    wp_die();

}