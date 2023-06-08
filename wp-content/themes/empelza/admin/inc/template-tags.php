<?php

if (!function_exists('empelza_posted_on')) :
    /**
     * Prints HTML with meta information for the current post-date/time and author.
     */
    function empelza_posted_on($get = false, $showDate = true, $showByline = true)
    {
        $time_string = '<time class="entry-date published updated" datetime="%1$s">%2$s</time>';
        if (get_the_time('U') !== get_the_modified_time('U')) {
            $time_string = '<time class="entry-date published" datetime="%1$s">%2$s</time>';
        }

        $time_string = sprintf($time_string,
            esc_attr(get_the_date('c')),
            esc_html(get_the_date())
        );

        $posted_on = '<span class="posted-on">' . sprintf(esc_html_x('%s %s', 'post date', 'empelza'), '<i class="fa fa-calendar"></i>', $time_string) . '</span>';

        $byline = '<span class="byline"> ' .
            sprintf(esc_html_x('by %s', 'post author', 'empelza'), '<span class="author vcard"><a class="url fn n" href="' . esc_url(get_author_posts_url(get_the_author_meta('ID'))) . '">' . esc_html(get_the_author()) . '</a></span>') .
            '</span>';

        if ($get) {
            return ($showDate ? $posted_on : '') . ($showByline ? $byline : '');
        } else {
            echo (empelza_return_text($showDate ? $posted_on : '') . ($showByline ? $byline : ''));
        }
    }
endif;



if ( ! function_exists( 'empelza_comment_text' ) ) :
    function empelza_comment_text($text = null) {
        if($text == null) {
            $text = get_comment_text();
        }
        return empelza_return_text( $text );
    }
endif;