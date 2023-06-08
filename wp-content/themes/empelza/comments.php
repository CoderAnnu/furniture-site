<?php
/**
 * The template for displaying comments.
 *
 * This is the template that displays the area of the page that contains both the current comments
 * and the comment form.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package empelza
 */

/*
 * If the current post is protected by a password and
 * the visitor has not yet entered the password we will
 * return early without loading the comments.
 */
if (post_password_required()) {
    return;
}
if( !class_exists('Fl_Helping_Addons')){
    $comment_html_class = 'comment-without-back';
} else {
    $comment_html_class = '';
}

add_filter( 'comment_form_defaults', 'empelza_custom_reply_title' );
function empelza_custom_reply_title( $defaults ){
    $defaults['title_reply_before'] = '<h4 id="reply-title" class="comment-reply-title fl-text-semi-bold-style">';
    $defaults['title_reply_after'] = '</h4>';
    return $defaults;
}
?>

<div class="comments-container <?php echo esc_attr($comment_html_class);?>" id="comments" data-coment-content="<?php esc_attr(bloginfo('title'));?>">
    <?php
    // You can start editing here -- including this comment!

    if (have_comments()) : ?>
        <h4 class="comment-title fl-text-semi-bold-style">
            <?php

                    $num_comments = get_comments_number();
                    $text_comments = '';
                    if ( comments_open() ) {
                        if ( $num_comments == 1 ){
                            $text_comments = '('.$num_comments.')'.esc_html__(' Comment', 'empelza');
                        }elseif ( $num_comments >= 2 ) {
                            $text_comments = '('.$num_comments.')'.esc_html__(' Comments', 'empelza');
                        }
                    } else {
                        $text_comments =  esc_html__('Comments are off for this post.', 'empelza');
                    }
                    echo esc_html($text_comments);
            ?>
        </h4>

        <div class="comments-list">
            <?php
            wp_list_comments(array(
                'walker' => new empelza_walker_comment(),
                'short_ping' => true,
                'avatar_size' => 60
            ));
            ?>
         </div>
        <!-- .comment-list -->

        <?php if (get_comment_pages_count() > 1 && get_option('page_comments')) : // Are there comments to navigate through? ?>

            <nav id="comment-nav-below" class="navigation comment-navigation" role="navigation">
                <h2 class="sr-only"><?php esc_html_e('Comment navigation', 'empelza'); ?></h2>
                <?php
                $page = get_query_var('cpage');
                ?>
                <?php if (isset($page)): ?>
                    <div class="fl-comment-pagination cf">
                        <?php previous_comments_link('<i class="fa fa-angle-left"></i>'.esc_html__('Older Comments', 'empelza'));?>
                        <?php next_comments_link(esc_html__('Newer Comments', 'empelza').'<i class="fa fa-angle-right"></i>');?>
                    </div><!-- .nav-links -->
                <?php endif; ?>
            </nav><!-- #comment-nav-below -->
            <?php
        endif; // Check for comment navigation.

    endif; // Check for have_comments().


    // If comments are closed and there are comments, let's leave a little note, shall we?
    if (!comments_open() && get_comments_number() && post_type_supports(get_post_type(), 'comments')) : ?>

        <p class="no-comments"><?php esc_html_e('Comments are closed', 'empelza'); ?></p>
        <?php
    endif;
    $commenter = wp_get_current_commenter();
    ?> <div class="fl-form-comment-reply">
        <?php
        comment_form(array(
            'title_reply' => '' . esc_html__('Add Comment', 'empelza') . '',
            'comment_notes_before' => '',

            'fields' => array('<div class="comment-field-wrapper">',
                'author' => '<div class="author-name"> 
                                <input type="text" class="required" name="author" value="' . esc_attr($commenter['comment_author']) .'" placeholder="'.esc_attr__('Your Name *', 'empelza').'">
				             </div>',
                'email' => '<div class="author-email">
                                <input type="email" class="required" name="email" value="' . esc_attr($commenter['comment_author_email']) .'" placeholder="'.esc_attr__('Email Address *', 'empelza').'">
                            </div>',
                'url'    => '<div class="author-website">
                                <input type="text" name="url" value="' . esc_attr($commenter['comment_author_url']) .'" placeholder="'.esc_attr__('Website', 'empelza').'">
                            </div>',
                '</div>'),
            'class_submit'  => 'hidden button',
            'class_form'    => 'fl-comment-form',
            'comment_field' => '<div class="author-comment">       
                                    <textarea class="required" name="comment" rows="5" aria-required="true" placeholder="'.esc_attr__('Enter your comment *', 'empelza').'"></textarea>
                                </div>',
            'comment_notes_after' => '<div class="submit-btn-container">
                                            <button type="submit" class="fl-custom-btn fl-font-style-bolt-two primary-style"><span>' . esc_html__('Submit comment', 'empelza') . '</span></button>
                                       </div>'
        ));

        ?>
    </div>
</div><!-- #comments -->

