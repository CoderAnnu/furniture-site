<?php

function empelza_ajax_pagination($wp_query = null,$btn_position = 'left',$btn_style = 'primary') {

            if($wp_query == null) {

                global $wp_query;

            } else {

                $wp_query = $wp_query;

            }

            if($btn_position == 'left'){
                $button_position = 'text-left';
            }elseif($btn_position == 'right'){
                $button_position = 'text-right';
            }else{
                $button_position = 'text-center';
            }

            if($btn_style == 'secondary'){
                $btn_html_class = 'secondary-style';
            }elseif($btn_style == 'ternary'){
                $btn_html_class = 'ternary-style';
            }else {
                $btn_html_class = 'primary-style';
            }

			$max_num_pages = $wp_query->max_num_pages;
			$page = get_query_var('paged');
			$paged = ($page > 1) ? $page : 1;

            wp_register_script('ajax-pagination', get_template_directory_uri().'/assets/js/load-more.js', array('jquery'), null, true);


			wp_localize_script(
                'ajax-pagination',
                'empelza_pagination_data',
                array(
                    'startPage'                 => $paged,
                    'maxPages'                  => $max_num_pages,
                    'nextLink'                  => next_posts($max_num_pages, false),
                    'button_text'               => empelza_get_theme_mod('load_more_text'),
                    'button_text_no_post'       => empelza_get_theme_mod('load_more_text_blog'),
                    'button_loading'            => empelza_get_theme_mod('load_more_loading_text'),
                    'button_text_no_portfolio'  => empelza_get_theme_mod('load_more_text_portfolio'),
                    'container'                 => '.post-wrapper,.fl--portfolio-wrap,.products',
                )
            );

			wp_enqueue_script('ajax-pagination');
				echo '<div class="fl-pagination ajax-pagination '.$button_position.'">'
                    . '<span id="fl-ajax-load-more-pagination" class="fl-custom-btn fl-font-style-bolt-two '.$btn_html_class.'"><span>'.empelza_get_theme_mod('load_more_text').'</span></span>'
                    . '</div>';
		}