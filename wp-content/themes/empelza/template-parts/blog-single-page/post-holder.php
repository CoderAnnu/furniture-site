<?php
if( has_post_format( 'video' ) ){?>
    <div class="post--holder">
        <?php echo get_the_post_thumbnail(get_the_ID(), 'empelza_size_1170x558_crop'); ?>
        <?php if(empelza_get_theme_mod('content_post_video',true) !=''){?>
            <div class="video-btn-wrap">
                <a class="video-btn venobox ternary-video-btn-style" data-vbtype="video" data-autoplay="true" href="<?php echo esc_url(empelza_get_theme_mod('content_post_video',true));?>"><i class="fa fa-play"></i><div class="pulsing-bg"></div></a>
            </div>
        <?php } ?>
    </div>
 <?php } elseif( has_post_format( 'gallery' ) ){
    if(empelza_get_theme_mod('content_post_gallery',true) !='') {?>
        <div class="post--holder">
            <div class="fl-post-image-slider">
                    <?php
                    $images = empelza_get_theme_mod('content_post_gallery',true);
                    if( $images ): ?>
                        <?php foreach( $images as $image ): ?>
                            <div class="slider-image"> <?php echo wp_get_attachment_image( $image['ID'], 'empelza_size_1170x558_crop' ); ?></div>
                        <?php endforeach; ?>
                    <?php endif; ?>
            </div>
            <ul class="post-arrow-slider">
                <li class="post-prev-slider-btn"><i class="fa fa-chevron-left"></i></li>
                <li class="post-next-slider-btn"><i class="fa fa-chevron-right"></i></li>
            </ul>
        </div>
    <?php } elseif (has_post_thumbnail()) { ?>
        <div class="post--holder">
            <?php echo get_the_post_thumbnail(get_the_ID(), 'empelza_size_1170x558_crop'); ?>
            <a class="image-post-link" href="<?php esc_url(the_permalink()); ?>">
            </a>
        </div>
    <?php }

}elseif( has_post_format( 'quote' ) and empelza_get_theme_mod('content_post_quotes_text',true) !=''){?>
    <a class="image-post-link" href="<?php esc_url(the_permalink()); ?>">
   <?php echo '<blockquote class="post-blockquote"><div class="quotes-text">'.empelza_get_theme_mod('content_post_quotes_text',true).'</div>';
            if(empelza_get_theme_mod('content_post_quotes_author',true)!=''){
                echo '<div class="quotes-author">'.empelza_get_theme_mod('content_post_quotes_author',true).'</div>';
            }
    echo '</blockquote>'; ?>
    </a>
<?php }else{
    if (has_post_thumbnail()) { ?>
            <div class="post--holder">
                <?php echo get_the_post_thumbnail(get_the_ID(), 'empelza_size_1170x558_crop'); ?>
                <a class="image-post-link" href="<?php esc_url(the_permalink()); ?>">
                </a>
            </div>
<?php }
}?>