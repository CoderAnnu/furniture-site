<?php
if (function_exists('fl_post_taxonomy')){
    echo fl_post_taxonomy($post->ID, 'portfolio-category', ', ', 'name', true);
}