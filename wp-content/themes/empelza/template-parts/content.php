<div <?php post_class('cf'); ?> id="post-<?php the_ID()?>" data-post-id="<?php the_ID()?>">

    <div class="fl_content_story fl-story-page-inner cf">
        <div class="inner_content cf">
            <div class="fl-content">
                <?php the_content(); ?>
            </div>
        </div>
        <?php wp_link_pages(array(
            'before'        => '<p class="page-inner-pagination">'.'<span class="pagination-text">' . esc_html__('Pages:', 'empelza').'</span>',
            'after'	        => '</p>',
            'link_before'   => '',
            'link_after'    => '',
            'pagelink'      => '<span class="page-numbers">'.'%'.'</span>', 

        )) ?>
    </div>

</div><!-- #post-<?php the_ID(); ?> -->
