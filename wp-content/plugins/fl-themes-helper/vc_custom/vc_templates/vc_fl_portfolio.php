<?php

if ( ! function_exists( 'vc_fl_portfolio_function' ) ) {
    function vc_fl_portfolio_function($atts, $content = null)
    {

        $i = '1';

        $css_classes[] = 'fl--portfolio-content-vc-wrap';

        $portfolio_wrapper_css_classes[] = 'fl--portfolio-vc-content-wrap';

        $portfolio_item_css_classes[] = 'fl--portfolio-item fl-grid-item';

        global $fl_helping_responsive_style;

        $atts = vc_map_get_attributes('vc_fl_portfolio', $atts);

        extract($atts);

        $result = $wrapper_attributes[] = $responsive_style = $output_filter='';

        $css_classes[] .= fl_get_css_tab_class($atts);

        if(isset($id) && $id != '') {
            $wrapper_attributes[] = 'id="'.fl_sanitize_class($id).'"';
        }

        if(isset($class) && $class != '') {
            $css_classes[] = fl_sanitize_class($class);
        }

        // Responsive CSS Box
        if(isset($custom_responsive_option) && $custom_responsive_option !='off') {
            if( !empty( $responsive_css ) && $responsive_css != '' ) {
                $responsive_id = $idf = uniqid('fl-helping-alert-responsive-').'-'.rand(100,9999);
                $column_selector = $responsive_id;
                $responsive_style = fl_helping__addons_get_responsive_style($responsive_css, $column_selector);
                $css_classes[] = $responsive_id;
            }
        }

        // Animation option
        if ( ! empty( $animation ) and ($animation !='none')) {
            $css_classes[] = 'fl-animated-item-velocity';
            $wrapper_attributes[] = 'data-animate-type="'.$animation.'"';
            $wrapper_attributes[] = 'data-item-for-animated="article"';

            if ( ! empty( $custom_delay ) and ( $custom_delay !='off')) {
                if ( ! empty( $animation_delay ) and ($animation_delay !='')) {
                    $wrapper_attributes[] = 'data-item-delay="'.$animation_delay.'"';
                }
            }
        }

        // Box Shadow
        if ( ! empty( $box_shadow_param ) and $box_shadow_param !='' ) {
            $box_shadow_html = uniqid('fl-custom-shadow-').'-'.rand(100,9999);
            $css_classes[] = $box_shadow_html;
            $fl_helping_css_style[] = '.' . $box_shadow_html . ' {'. $box_shadow_param. '}';
        }

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

        // Load More Button Style
        if($btn_align == 'left'){
            $button_position = 'text-left';
        }elseif($btn_align == 'right'){
            $button_position = 'text-right';
        }else{
            $button_position = 'text-center';
        }

        if($btn_color_style == 'secondary'){
            $btn_html_class = 'secondary-style';
        }elseif($btn_color_style== 'ternary'){
            $btn_html_class = 'ternary-style';
        }else {
            $btn_html_class = 'primary-style';
        }

        $max_page = new WP_Query($pages = array('post_type' => 'portfolio', 'posts_per_page' => $post_per_page,));
        $args = array(
            'nonce'                     => wp_create_nonce('portfolio-load-mote-nonce'),
            'url'                       => admin_url('admin-ajax.php'),
            'button_text'               => ($btn_text) ? $btn_text : esc_attr__( 'Show More', 'fl-themes-helper' ),
            'button_text_no_post'       => ($btn_text_end) ? $btn_text_end : esc_attr__( 'All Works Is Loaded', 'fl-themes-helper' ),
            'button_loading'            => ($btn_text_loading) ? $btn_text_loading : esc_attr__( 'Loading...', 'fl-themes-helper' ),

            'post_type'                 => 'portfolio',
            'post_status'               => 'publish',
            'works_category'            => 'portfolio-category',
            'maxpage'                   => $max_page->max_num_pages,
            'posts_per_page'            => $post_per_page,
            'paged'                     => (get_query_var('paged')) ? get_query_var('paged') : 1
        );

        $portfolio_item = new WP_Query($args);


        // Filter Start
        $categories = get_categories(array('taxonomy' => 'portfolio-category'));
        foreach ($categories as $category) {
            $output_filter .= '<li class="fl-filter--btn" data-filter=".portfolio-category-' . $category->slug . '"><span>' . $category->name . '</span></li>';
        }

        $css_class = preg_replace( '/\s+/', ' ', implode( ' ', array_filter( array_unique( $css_classes ) ) ) );
        $portfolio_wrapper_css_class = preg_replace( '/\s+/', ' ', implode( ' ', array_filter( array_unique( $portfolio_wrapper_css_classes ) ) ) );
        $portfolio_item_css_class = preg_replace( '/\s+/', ' ', implode( ' ', array_filter( array_unique( $portfolio_item_css_classes ) ) ) );
        ob_start();
        ?>
        <div class="<?php echo esc_attr( trim( $css_class ) );?>" <?php echo implode(' ', $wrapper_attributes );?>>

            <?php if ( ! empty( $filter ) and ( $filter !='disable') ) { ?>
                <div class="fl-filter-group-wrapper fl-filter-blog--group fl-text-regular-style">
                    <ul class="filter-ul" id="main">
                        <li class="fl-filter--btn active" data-filter="*"><span><?php echo esc_html($first_btn_text);?></span></li>
                        <?php
                        echo $output_filter;
                        ?>
                    </ul>
                </div>
            <?php } ;?>
            <div class="fl-isotope-wrapper <?php echo esc_attr( trim( $portfolio_wrapper_css_class ) );?>">
                <div class="grid-sizer cf"></div>
                <div class="gutter-sizer"></div>
                <?php if ($portfolio_item->have_posts()) { while ($portfolio_item->have_posts()) {$portfolio_item->the_post(); ?>
                        <article <?php post_class(esc_attr( trim( $portfolio_item_css_class ) )) ?> id="portfolio-post-<?php echo get_the_ID() ?>" data-post-id="<?php echo get_the_ID() ?>">
                                <div class="entry-content">
                                    <?php
                                    if(! empty($portfolio_style) and $portfolio_style =='portfolio-masonry-style'){
                                        if($i == '2'){
                                            echo get_the_post_thumbnail($portfolio_item->ID, 'empelza_size_570x845_crop');
                                        }else{
                                            echo get_the_post_thumbnail($portfolio_item->ID, 'empelza_size_570x400_crop');
                                        }
                                    }else{
                                        echo get_the_post_thumbnail($portfolio_item->ID, 'empelza_size_570x400_crop');
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
                        <span><?php esc_html_e('Add some posts in portfolio section', 'fl-themes-helper') ?></span>
                    </div>
                <?php }
                ?>

            </div>
            <?php
            if ( ! empty($load_more_btn) and $load_more_btn =='enable') {
                if ( $portfolio_item->max_num_pages > 1 ) {
                    wp_enqueue_script('fl-load-more-vc', plugins_url('../../assets/js/load-more/load-more-vc.js', __FILE__));
                    wp_localize_script('fl-load-more-vc', 'portfolioloadmorevc', $args);
                    echo '<div class="fl-pagination ajax-pagination '.$button_position.'">'
                        . '<span id="fl-load-more-vc-enable" class="fl-load-more-vc-enable fl-custom-btn fl-font-style-bolt-two '.$btn_html_class.'" data-post-per-page="'.$post_per_page.'" data-portfolio-style="'.$portfolio_style.'"><span>'.$btn_text.'</span></span>'
                        . '</div>';
                }
            }?>
        </div>
        <?php
        // Responsive CSS Box
        if(isset($custom_responsive_option) && $custom_responsive_option !='off') {
            $fl_helping_responsive_style .= $responsive_style;
        }


        $result .= ob_get_clean();


        return $result;

    }
}
add_shortcode('vc_fl_portfolio', 'vc_fl_portfolio_function');