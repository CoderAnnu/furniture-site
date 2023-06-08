<?php
$archive_year = get_the_time('Y');
$archive_month = get_the_time('m');
$archive_day   = get_the_time('d');
?>
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