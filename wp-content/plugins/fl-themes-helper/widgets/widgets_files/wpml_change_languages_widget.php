<?php
if ( ! defined( 'ABSPATH' ) ) { exit; }

class FL_THEME_HELPER_WMPL_Change_Languages extends SB_WP_Widget {
	protected $widget_base_id = 'FL_THEME_HELPER_WMPL_Change_Languages';
	protected $widget_name = 'Custom : WPML Changer Languages';
	
	protected $options;

    /**
     * Register widget with WordPress.
     */
    public function __construct() {
		$this->options = array(
			array(
				'title', 'text', '',
				'label'		=> esc_html__('Title', 'fl-themes-helper'),
				'input'		=> 'text',
				'filters'	=> 'widget_title',
				'on_update'	=> 'esc_attr'
			),
            array(
                'changer_style', 'text', 'list-style',
                'label'		=> esc_html__('Changer Style', 'fl-themes-helper'),
                'input'		=> 'custom_select',
                'values'	=>	array(
                    'list-style'		=> esc_html__('List Style', 'fl-themes-helper'),
                    'inline-style'	    => esc_html__('Inline Style', 'fl-themes-helper'),
                ),
                'on_update'	=> 'esc_attr'
            ),
		);
		
        parent::__construct();
    }
	
    /**
     * Display widget
     */
    function widget( $args, $instance ) {

		
        extract( $args );
		$this->setInstances($instance, 'filter');
		
        echo wp_kses($before_widget, array(
				'div' => array('id' => array(), 'class' => array()),
				'section' => array('id' => array(), 'class' => array())
			));
		
		$title = $this->getInstance('title');
        $changer_style = $this->getInstance('changer_style');

		echo (!empty($title)) ? $before_title . $title . $after_title : '';


		/*HTML*/

                $result = $flag_html = $active_result = $active_item = $active_flag = '';
                if(isset($changer_style) && $changer_style == 'list-style') {
                    $html_class = 'list-style-changer';
                }
                if(isset($changer_style) && $changer_style == 'inline-style') {
                    $html_class = 'inline-style-changer';
                }

                if (function_exists('icl_get_languages')) {
                    $languages = icl_get_languages('skip_missing=0&orderby=code');
                    echo  '<div class="language-selector '.$html_class.'">';
                    if (!empty($languages)) {
                        foreach ($languages as $lan) {
                            $li_class = '';
                            if(strcmp($lan['active'], '0') != 0) {
                                $active_item = $lan['translated_name'];
                                $active_flag = $lan['country_flag_url'];
                                $li_class = 'active-language';
                                $active_result = '<a href="'.esc_url($lan['url']).'"><span class="language-flag" style="background: transparent url('.esc_url($active_flag).') center center no-repeat; background-size: cover;"></span><span class="language-name">'.esc_html($active_item).'</span></a>';
                            }

                            $flag_html = '<span class="language-flag" style="background: transparent url('.$lan['country_flag_url'].') center center no-repeat;"></span>';

                            $lan_text = '<span class="language-text">'.$lan['translated_name'].'</span>';

                            $result .= '<li class="'.esc_attr($li_class).'">';
                            $result .= '<a href="' . esc_url($lan['url']) . '">';
                            $result .= $flag_html;
                            if(isset($changer_style) && $changer_style == 'list-style') {
                                $result .= $lan_text;
                            }
                            $result .= '</a>';
                            $result .= '</li>';
                        }
                    }
                    echo (!empty($active_result)) ? $active_result : '';
                    echo !empty($result) ? '<ul>'.$result.'</ul>' : '';
                    echo '</div>';
                } else {

                    if(isset($changer_style) && $changer_style == 'list-style') {
                        $result .= '<a href="#">';
                        $result .= '<span class="language-flag"></span>';
                        $result .= '<span class="language-text">'.esc_html__('ENG', 'fl-themes-helper').'</span>';
                        $result .= '</a>';
                        $result .= '<ul>';
                        $result .= '<li>';
                        $result .= '<a href="#">';
                        $result .= '<span class="language-flag"></span>';
                        $result .= '<span class="language-text">'.esc_html__('French', 'fl-themes-helper').'</span>';
                        $result .= '</a>';
                        $result .= '</li>';
                        $result .= '<li  class="active-language">';
                        $result .= '<a href="#">';
                        $result .= '<span class="language-flag"></span>';
                        $result .= '<span class="language-text">'.esc_html__('ENGLISH', 'fl-themes-helper').'</span>';
                        $result .= '</a>';
                        $result .= '</li>';
                        $result .= '<li>';
                        $result .= '<a href="#">';
                        $result .= '<span class="language-flag"></span>';
                        $result .= '<span class="language-text">'.esc_html__('German', 'fl-themes-helper').'</span>';
                        $result .= '</a>';
                        $result .= '</li>';
                        $result .= '</ul>';
                    }else{
                        $result .= '<ul>';
                        $result .= '<li class="active-language">';
                        $result .= '<a href="#" class="active-language">';
                        $result .= '<span class="language-flag"></span>';
                        $result .= '</a>';
                        $result .= '</li>';
                        $result .= '<li>';
                        $result .= '<a href="#">';
                        $result .= '<span class="language-flag"></span>';
                        $result .= '</a>';
                        $result .= '</li>';
                        $result .= '<li>';
                        $result .= '<a href="#">';
                        $result .= '<span class="language-flag"></span>';
                        $result .= '</a>';
                        $result .= '</li>';
                        $result .= '</ul>';
                    }
                    echo '<div class="demo-language-selector '.$html_class.'">';
                    echo !empty($result) ? $result : '';
                    echo '</div>';
                }


        echo wp_kses($after_widget, array(
				'div' => array('id' => array(), 'class' => array()),
				'section' => array('id' => array(), 'class' => array())
			));
    }
}