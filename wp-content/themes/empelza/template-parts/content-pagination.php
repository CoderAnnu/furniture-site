<?php

$fl_pagination_style = empelza_get_theme_mod('blog_pagination');
$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;

    if(empelza_show_posts_nav()) { ?>
        <div class="fl-blog-post-pagination">
            <?php  if($fl_pagination_style == 'loadmore') {
                echo empelza_ajax_pagination();
            } else { ?>
                <div class="pagination fl-default-pagination cf">
                    <?php empelza_page_links(); ?>
                </div>
            <?php } ?>
        </div>
    <?php } ?>

