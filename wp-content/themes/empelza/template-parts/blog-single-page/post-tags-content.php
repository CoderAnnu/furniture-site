<?php if(get_the_tags()){ ?>
    <div class="post-tags-content">
            <div class="tags-single-blog">
            <i class="fa fa-tags" aria-hidden="true"></i>
            <span class="tags-content-text fl-text-medium-style">
               <?php echo esc_html__('Post Tags: ','empelza') ?>
            </span>
                <?php the_tags('<span class="tags-content fl-primary-color">', ', ', '</span>') ;?>
            </div>
    </div>
<?php } ?>