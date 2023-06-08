<?php

if ( ! function_exists( 'empelza_comment_text' ) ) :
    function empelza_comment_text($text = null) {
        if($text == null) {
            $text = get_comment_text();
        }
        return empelza_return_text( $text );
    }
endif;

add_filter( 'comment_form_fields', 'empelza_move_comment_field_to_bottom' );
if (!function_exists('empelza_move_comment_field_to_bottom')):
    function empelza_move_comment_field_to_bottom( $fields ) {
        $comment_field = $fields['comment'];
        unset( $fields['comment'] );
        $fields['comment'] = $comment_field;
        return $fields;
    }
endif;

/** COMMENTS WALKER */
class empelza_walker_comment extends Walker_Comment
{

    // init classwide variables
    var $tree_type = 'comment';
    var $db_fields = array('parent' => 'comment_parent', 'id' => 'comment_ID');

    /** CONSTRUCTOR
     * You'll have to use this if you plan to get to the top of the comments list, as
     * start_lvl() only goes as high as 1 deep nested comments */
    function __construct()
    { ?>

        <!--<ul class="comments-list">-->

    <?php }

    /** START_LVL
     * Starts the list before the CHILD elements are added. */
    function start_lvl(&$output, $depth = 0, $args = array())
    {
        $GLOBALS['comment_depth'] = $depth + 1; ?>

        <!--<ul class="child-comment">-->

    <?php }

    /** END_LVL
     * Ends the children list of after the elements are added. */
    function end_lvl(&$output, $depth = 0, $args = array())
    {
        $GLOBALS['comment_depth'] = $depth + 1; ?>

        <!-- /.children -->

    <?php }

    /** START_EL */
    function start_el(&$output, $comment, $depth = 0, $args = Array(), $id = 0)
    {
        $depth++;
        $GLOBALS['comment_depth'] = $depth;
        $GLOBALS['comment'] = $comment;
        $parent_class = (empty($args['has_children']) ? '' : 'parent'); ?>

        <div <?php comment_class($parent_class . ' fl-comment'); ?> id="comment-<?php comment_ID() ?>">

        <div class="comment-container">
            <div class="comment-avatar">
                <?php echo(empelza_return_text($args['avatar_size'] != 0 ? get_avatar($comment, $args['avatar_size']) : '')); ?>
            </div>
            <div class="comment-meta cf">
                <div class="comments--reply-wrapper">
                        <span class="comment-author-name fl-text-semi-bold-style"><?php echo get_comment_author_link(); ?></span>
                        <span class="comment--time fl-text-regular-style">
                            <a href="<?php echo htmlspecialchars( get_comment_link( $comment->comment_ID ) ); ?>" class="fl-link-comment">
                                <?php printf( esc_html__('%1$s', 'empelza').'%2$s'. esc_html__('%3$s', 'empelza'), '<span class="comment-date">'.get_comment_date().'</span>','<span class="comment-delimiter">'.esc_html__('at', 'empelza').'</span>','<span class="comment-time">'.get_comment_time().'</span>' ); ?>
                            </a>
                            <?php edit_comment_link( esc_html__( '(Edit)', 'empelza' ), '  ', '' );
                            ?>
                        </span>

                </div>

                <div class="comment-moderation">
                    <?php if (!$comment->comment_approved) : ?>
                        <em class="comment-awaiting-moderation"><?php echo esc_html__("Your comment is awaiting moderation.", 'empelza');?></em>
                    <?php else:
                        echo empelza_comment_text();
                        ?>
                    <?php endif; ?>
                    <div class="comment--reply-wrap fl-text-medium-style">
                                <div class="reply-link-wrap">
                                    <?php
                                    comment_reply_link(array_merge($args, array(
                                        'add_below' => isset($args['add_below']) ? $args['add_below'] : 'comment',
                                        'depth' => $depth,
                                        'max_depth' => $args['max_depth'],
                                        'reply_text' => ''.sprintf(esc_html__('%s Reply', 'empelza'), '')
                                    )), $comment->comment_ID);?>
                                </div>
                     </div>
                </div>

            </div>
        </div>

    <?php }

    function end_el(&$output, $comment, $depth = 0, $args = array())
    { ?>

        </div>

    <?php }

    /** DESTRUCTOR
     * I'm just using this since we needed to use the constructor to reach the top
     * of the comments list, just seems to balance out nicely:) */
    function __destruct()
    { ?>

        <!-- /#comment-list -->

    <?php }
}
