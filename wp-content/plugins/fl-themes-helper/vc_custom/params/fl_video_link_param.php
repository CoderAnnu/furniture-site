<?php

    if(function_exists('vc_add_shortcode_param')) {
        vc_add_shortcode_param('fl_video_tutorial_param' , 'fl_video_tutorial_param_callback');
    }

    function fl_video_tutorial_param_callback($settings, $value) {
        $param_name = isset($settings['param_name']) ? $settings['param_name'] : '';
        $class = isset($settings['class']) ? $settings['class'] : '';
        $document_link = isset($settings['document_link']) ? $settings['document_link'] : '';
        $video_link = isset($settings['video_link']) ? $settings['video_link'] : '';

        $output = '<div class="fl-video-tutorials-wrapper">';

        if($document_link != '') {
            $output .= '<div class="fl-documentation-link"><i class="fa fa-file-o"></i><a href="'.esc_html($doc_link).'">'.esc_html__('Theme documentation','fl-themes-helper').'</a></div>';
        }

        if($video_link != '') {
            $output .= '<div class="fl-video-tutorial-link"><i class="fa fa-youtube-play"></i><a href="'.esc_html($video_link).'">'.esc_html__('Video tutorial','fl-themes-helper').'</a></div>';
        }

        $output .= '</div>';

        return $output;
    }