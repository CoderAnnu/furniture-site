<?php

    if ( ! function_exists( 'vc_fl_blog_posts_function' ) ) {
        function vc_fl_blog_posts_function($atts, $content = null)
        {
            $css_classes[] = 'fl-home-page-posts-content-vc';

            global $fl_helping_responsive_style,$post;

            $atts = vc_map_get_attributes('vc_fl_blog_posts', $atts);

            extract($atts);

            $result = $wrapper_attributes[] = $css_classes[] = $responsive_style = '';

            $css_classes[] .= fl_get_css_tab_class($atts);

            if(isset($id) && $id != '') {
                $wrapper_attributes[] .= 'id="'.fl_sanitize_class($id).'"';
            }

            if(isset($class) && $class != '') {
                $css_classes[] .= fl_sanitize_class($class);
            }

            // Responsive CSS Box
            if(isset($custom_responsive_option) && $custom_responsive_option !='off') {
                if( !empty( $responsive_css ) && $responsive_css != '' ) {
                    $responsive_id = uniqid('fl-post-responsive-').'-'.rand(100,9999);
                    $column_selector = $responsive_id;
                    $responsive_style = fl_helping__addons_get_responsive_style($responsive_css, $column_selector);
                    $css_classes[] .= $responsive_id;
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
            // Bg Position Option
            if ( ! empty( $desktop_bg_image_position ) and $desktop_bg_image_position !='' ) {
                $css_classes[] = $desktop_bg_image_position;
            }
            // Min Height Option
            if ( ! empty( $desktop_height ) and $desktop_height !='' ) {
                $wrapper_attributes[]   = 'style="min-height:'.$desktop_height.';"';
            }


            // Slider Style
            if ( ! empty( $woo_product_slider_style ) and ($woo_product_slider_style !='')) {
                $slider_css_classes[] = $woo_product_slider_style;
            }



            $max_page = new WP_Query($pages = array('post_type' => 'product', 'posts_per_page' => $count_post,));
            $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
            $args = array(
                'post_type'                 => 'post',
                'post_status'               => 'publish',
                'ignore_sticky_posts'       => 1,
                'maxpage'                   => $max_page->max_num_pages,
                'posts_per_page'            => $count_post,
                'paged'                     => $paged,
            );
            $posts = new WP_Query( $args );
            $css_class = preg_replace( '/\s+/', ' ', implode( ' ', array_filter( array_unique( $css_classes ) ) ) );
            ob_start();
            ?>
            <div class="<?php echo esc_attr( trim( $css_class ) )?>" <?php echo implode( ' ', $wrapper_attributes)?>>
                <div class="home-page-post-container">
            <?php if( $posts->have_posts() ) : while( $posts->have_posts() ) : $posts->the_post();?>
                    <article <?php post_class('fl-post--item') ?> id="home-page-post-<?php echo get_the_ID() ?>" data-post-id="<?php echo get_the_ID() ?>">
                                <div class="left-content">
                                    <div class="top-date-wrap fl-text-regular-style"><?php echo get_the_date( 'd', $posts->ID )?></div>
                                    <div class="bottom-date-wrap fl-text-medium-style"><?php echo get_the_date( 'F ‘y', $posts->ID )?></div>
                                </div>
                                <div class="right-content">
                                    <div class="top-post-content">
                                        <div class="author-wrap"><i class="essential-set-icon-user"></i><span class="prefix-author"><?php echo esc_html__('By','fl-themes-helper');?></span><?php echo get_the_author_posts_link();?></div>
                                        <div class="category-wrap"><i class="essential-set-icon-folder-10"></i><?php echo the_category(', ','',$posts->ID)?></div>
                                    </div>
                                    <div class="bottom-content">
                                        <h5 class="post-title">
                                            <a class="title-link"
                                               href="<?php esc_url(the_permalink()); ?>">
                                                <?php esc_attr(the_title()); ?>
                                            </a>
                                        </h5>
                                    </div>
                                </div>
                    </article>
                  <?php endwhile; endif;
                    wp_reset_query();?>
            </div>

            </div>
<?php
            $result .= ob_get_clean();


            // Responsive CSS Box
            if(isset($custom_responsive_option) && $custom_responsive_option !='off') {
                $fl_helping_responsive_style .= $responsive_style;
            }

            return $result;
        }
    }
    add_shortcode('vc_fl_blog_posts', 'vc_fl_blog_posts_function');

